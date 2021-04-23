<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Delivery extends CI_Controller
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
			'page' => 'laporan/delivery/index',
			'link' => 'DO',
            'script' => '',
            'pelanggan'=>$this->db->get('tb_pelanggan')->result(),
		);
	    $this->load->view('template/wrapper', $data);
    }

    public function report(){
        $daritanggal=$this->input->post('daritanggal',true);
        $hinggatanggal=$this->input->post('hinggatanggal',true);
        $output=array();
        $do_arr=array();
        $pelanggan=$this->db->select('nama_pelanggan,tb_do.id_pelanggan')
                    ->from('tb_do')
                    ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_do.id_pelanggan')
                    ->where(array('tgl_do>='=>$daritanggal,'tgl_do<='=>$hinggatanggal))
                    ->group_by('tb_do.id_pelanggan')
                    ->order_by('tb_do.id_pelanggan','ASC')
                    ->get()->result();
        
        foreach($pelanggan as $p){
            
            
            $query=$this->db->select('*')
                ->from('tb_det_do')
                ->join('tb_do','tb_do.id_do=tb_det_do.id_do')
                
                ->join('tb_det_muatan','tb_det_muatan.id_muatan=tb_det_do.id_muatan')
                ->join('tb_kendaraan','tb_do.id_kendaraan=tb_kendaraan.id_kendaraan')
                ->join('tb_driver','tb_driver.id_driver=tb_kendaraan.id_driver')
                ->join('tb_satuan','tb_satuan.id_satuan=tb_det_muatan.id_satuan')
                ->where(array('tgl_do>='=>$daritanggal,'tgl_do<='=>$hinggatanggal,'tb_do.id_pelanggan'=>$p->id_pelanggan))
                ->order_by('tb_do.id_pelanggan','ASC')
                ->order_by('tb_det_do.id_det_do','ASC')
                ->get()->result();
            // $p->do=$query;
            $no=0;
            foreach($query as $q){
                $p->pel=$q;
            }
           
        }
        
        // var_dump($pelanggan);
        // die();
        $data = array(
            'data'=>$pelanggan,
            'daritanggal'=>$daritanggal,
            'hinggatanggal'=>$hinggatanggal,
		);
	    $this->load->view('laporan/delivery/report', $data);
    }
}