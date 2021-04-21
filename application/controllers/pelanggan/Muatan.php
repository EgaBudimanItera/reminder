<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muatan extends CI_Controller
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
        redirect('/pelanggan/pelanggan');
    }

    public function store(){
        
        $this->db->trans_begin();
        $data_to_save = array(
            'id_pelanggan' => $this->input->post('id_pelanggan', true), 
            'dari' => $this->input->post('dari', true), 
            'tujuan' => $this->input->post('tujuan', true), 
            'muatan' => $this->input->post('muatan', true), 
            'id_satuan' => $this->input->post('id_satuan', true),
            'tarif' => $this->input->post('tarif', true),
            'keterangan' => $this->input->post('keterangan', true),
        );
        $simpan = $this->db->insert('tb_det_muatan', $data_to_save);
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal ditambahkan</div>'
			);
			echo json_encode($return);
        }else {
            $this->db->trans_commit();
            $return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil ditambahkan</div>'
			);
			echo json_encode($return);
        }
		
    }

    public function get(){
        $id = $this->input->post('id', true);
        $this->db->from('tb_det_muatan');
        $this->db->JOIN('tb_satuan','tb_satuan.id_satuan=tb_det_muatan.id_satuan');
        $this->db->where(array('tb_det_muatan.id_muatan' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function update(){
        $this->db->trans_begin();
        $data_to_save = array(
            'id_pelanggan' => $this->input->post('id_pelanggan', true), 
            'dari' => $this->input->post('dari', true), 
            'tujuan' => $this->input->post('tujuan', true), 
            'muatan' => $this->input->post('muatan', true), 
            'id_satuan' => $this->input->post('id_satuan', true),
            'tarif' => $this->input->post('tarif', true),
            'keterangan' => $this->input->post('keterangan', true), 
        );
        $simpan = $this->db->update('tb_det_muatan', $data_to_save, array('id_muatan' => $this->input->post('id_muatan', true)));
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal diupdate</div>'
			);
			echo json_encode($return);
        }else {
            $this->db->trans_commit();
            $return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil diupdate</div>'
			);
			echo json_encode($return);
        }
		
    }

    public function remove(){
        $this->db->trans_begin();
        $id_muatan = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_det_muatan', array('id_muatan' => $id_muatan));
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal dihapus</div>'
			);
			echo json_encode($return);
        }else {
            $this->db->trans_commit();
            $return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil dihapus</div>'
			);
			echo json_encode($return);
        }
    }
}