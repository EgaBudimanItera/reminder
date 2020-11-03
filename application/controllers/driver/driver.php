<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Driver extends CI_Controller
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

    public function index()
    {
        $query = $this->db->query('select tb_driver.* from tb_driver');
        $data = array(
			'page' => 'driver/index',
			'link' => 'driver',
			'script' => 'driver/script',
            'data' => $query,
            
        );
        
		$this->load->view('template/wrapper', $data);
    }

    public function store(){
        $this->db->trans_begin();
        $data_to_save = array(
            'nama_driver' => $this->input->post('nama_driver', true), 
            'no_telp' => $this->input->post('no_telp', true), 
        );
        $simpan = $this->db->insert('tb_driver', $data_to_save);
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal Disimpan</div>'
			);
			echo json_encode($return);
        }else {
            $this->db->trans_commit();
            $return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil Disimpan</div>'
			);
			echo json_encode($return);
        }
		
    }

    public function get(){
        $id = $this->input->post('id', true);
        $this->db->from('tb_driver');
        $this->db->where(array('tb_driver.id_driver' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function update(){
        $this->db->trans_begin();
        $data_to_save = array(
            'nama_driver' => $this->input->post('nama_driver', true), 
            'no_telp' => $this->input->post('no_telp', true), 
        );
        $simpan = $this->db->update('tb_driver', $data_to_save, array('id_driver' => $this->input->post('id_driver', true)));
        
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
        $id_driver = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_driver', array('id_driver' => $id_driver));
        
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
