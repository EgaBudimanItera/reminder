<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Piutang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Admin'){
            echo '<script>alert("Maaf, anda tidak diizinkan mengakses halaman ini")</script>';
            echo'<script>window.location.href="'.base_url().'";</script>';
        }   
        $this->load->model('M_Api');
    }

    public function index(){
        
        $data = array(
			'page' => 'laporan/piutang/index',
			'link' => 'Piutang',
            'script' => '',
		);
	    $this->load->view('template/wrapper', $data);
    }

    public function report(){
        $daritanggal=$this->input->post('daritanggal',true);
        $hinggatanggal=$this->input->post('hinggatanggal',true);
        $query=$this->db->select('*,sum(total_bayar-akumulasi_bayar) as sisa')
                ->from('tb_invoice')
                
                ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_invoice.id_pelanggan')
                
                ->where(array('tgl_invoice>='=>$daritanggal,'tgl_invoice<='=>$hinggatanggal))
                ->group_by('tb_invoice.id_invoice')
                ->get();
        $data = array(
            'data'=>$query,
            'daritanggal'=>$daritanggal,
            'hinggatanggal'=>$hinggatanggal,
		);
	    $this->load->view('laporan/piutang/report', $data);
    }
}