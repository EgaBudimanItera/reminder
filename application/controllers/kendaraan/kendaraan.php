<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kendaraan extends CI_Controller
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
        $query = $this->db->query('SELECT * from tb_kendaraan JOIN tb_driver on tb_kendaraan.id_driver=tb_driver.id_driver');
        $driver = $this->db->get('tb_driver');

        $data = array(
			'page' => 'kendaraan/index',
			'link' => 'kendaraan',
			'script' => 'kendaraan/script',
            'data' => $query,
            'ref_driver' => $driver,
        );
        
		$this->load->view('template/wrapper', $data);
    }

    public function store(){
        $this->db->trans_begin();
        $data_to_save = array(
            'id_driver'=>$this->input->post('id_driver', true),
            'merk_kendaraan' => $this->input->post('merk_kendaraan', true), 
            'tahun' => $this->input->post('tahun', true), 
        );
        $simpan = $this->db->insert('tb_kendaraan', $data_to_save);
        
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
        $this->db->from('tb_kendaraan');
        $this->db->join('tb_driver','tb_driver.id_driver=tb_kendaraan.id_driver');
        $this->db->where(array('tb_kendaraan.id_kendaraan' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function update(){
        $this->db->trans_begin();
        $data_to_save = array(
            'id_driver'=>$this->input->post('id_driver', true),
            'merk_kendaraan' => $this->input->post('merk_kendaraan', true), 
            'tahun' => $this->input->post('tahun', true), 
        );
        $simpan = $this->db->update('tb_kendaraan', $data_to_save, array('id_kendaraan' => $this->input->post('id_kendaraan', true)));
        
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
        $id_kendaraan = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_kendaraan', array('id_kendaraan' => $id_kendaraan));
        
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
