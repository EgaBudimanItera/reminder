<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
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
			'page' => 'laporan/penjualan/index',
			'link' => 'Laporan Penjualan',
            'script' => '',
		);
	    $this->load->view('template/wrapper', $data);
    }

    public function report(){
        $daritanggal=$this->input->post('daritanggal',true);
        $hinggatanggal=$this->input->post('hinggatanggal',true);
        $query=$this->db->select('*,sum(harga*qty) as subtotal')
                ->from('tb_order_detail')
                ->join('tb_order','tb_order_detail.id_order=tb_order.id_order')
                ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_order.id_pelanggan')
                ->join('tb_produk','tb_order_detail.id_produk=tb_produk.id_produk')
                ->join('tb_satuan','tb_produk.id_satuan=tb_satuan.id_satuan')
                ->join('tb_kendaraan','tb_order.id_kendaraan=tb_kendaraan.id_kendaraan')
                ->join('tb_driver','tb_kendaraan.id_driver=tb_driver.id_driver')
                ->where(array('tgl_faktur>='=>$daritanggal,'tgl_faktur<='=>$hinggatanggal))
                ->group_by('tb_order.id_order')
                ->get();
        $data = array(
            'data'=>$query,
		);
	    $this->load->view('laporan/penjualan/report', $data);
    }
}