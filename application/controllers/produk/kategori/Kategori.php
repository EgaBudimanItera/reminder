<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
       
        $query = $this->db->get('tb_kategori');

        $kodeKategori = 'KD-'.$this->M_Api->buatKodeKategori();
        $data = array(
			'page' => 'produk/kategori/index',
			'link' => 'setting_kategori',
			'script' => 'produk/kategori/script',
            'data' => $query,
            'kodeKategori' => $kodeKategori,
		);
		$this->load->view('template/wrapper', $data);
    }

    
    public function store(){
        $kodeKategori = 'KD-'.$this->M_Api->buatKodeKategori();
        $this->db->trans_begin();
        $data_to_save = array(
            'kode_kategori' => $kodeKategori, 
            'keterangan' => $this->input->post('keterangan', true), 
            'nama_kategori' => $this->input->post('nama_kategori', true), 
        );
        $simpan = $this->db->insert('tb_kategori', $data_to_save);
        
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal disimpan</div>'
			);
			echo json_encode($return);
        }else {
            $this->db->trans_commit();
            $return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil disimpan</div>'
			);
			echo json_encode($return);
        }
		
    }

    public function get(){
        $id = $this->input->post('id', true);
        $this->db->from('tb_kategori');
        $this->db->where(array('tb_kategori.id_kategori' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function update(){
        $this->db->trans_begin();
        $data_to_save = array(
            //'kode_kategori' => $this->input->post('kode_kategori', true), 
            'keterangan' => $this->input->post('keterangan', true), 
            'nama_kategori' => $this->input->post('nama_kategori', true), 
        );
        $simpan = $this->db->update('tb_kategori', $data_to_save, array('id_kategori' => $this->input->post('id_kategori', true)));
        
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
        $id_kategori = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_kategori', array('id_kategori' => $id_kategori));
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
}
