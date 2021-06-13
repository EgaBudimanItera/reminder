<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function __construct()
    {
        parent::__construct();
        if(empty($this->session->userdata('is_login'))){
            echo '<script>alert("Maaf, anda tidak diizinkan mengakses halaman ini")</script>';
            echo'<script>window.location.href="'.base_url().'";</script>';
        }   
	}
	
	public function index()
	{
	
		$this->db->from('tb_pelanggan');
		$get_outlet = $this->db->get();

		$this->db->from('tb_produk');
		$get_produk = $this->db->get();

		$this->db->from('tb_invoice')->where(array('month(tgl_invoice)'=>date('m')));
		$get_penjualan = $this->db->get();

		$dateminggudpn=date('Y-m-d',strtotime('+7 days'));
		
		$this->db	->select('*')
					->from('tb_invoice')
					->join('tb_pelanggan','tb_invoice.id_pelanggan=tb_pelanggan.id_pelanggan')
					->where(array('next_tagih<='=>$dateminggudpn));
		$get_penjualan_tagih = $this->db->get();
		
		$dobelumselesai=$this->db->query("SELECT * FROM `tb_do` JOIN `tb_pelanggan` ON `tb_pelanggan`.`id_pelanggan`=`tb_do`.`id_pelanggan` 
		WHERE `tb_do`.`status_do` = 'belum' AND `tgl_do` <DATE_SUB(CURDATE(), INTERVAL 7 DAY)");
		// var_dump($dobelumselesai->result());
		// die();
		$data = array(
			'page' => 'welcome',
			'link' => 'welcome',
			'script' => 'script',
			'outlet' => $get_outlet,
			'produk' => $get_produk,
			'penjualan'=>$get_penjualan,
			'penjualan_tagih'=>$get_penjualan_tagih,
			'dobelum'=>$dobelumselesai,
		);
		$this->load->view('template/wrapper', $data);
	}

	
	public function logout(){
		$this->session->sess_destroy();
		echo '<script>alert("Berhasil Logout...");window.location.href = "'.base_url().'login";</script>';
	}

}
