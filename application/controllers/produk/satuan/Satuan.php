<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Admin'){
            echo '<script>alert("Maaf, anda tidak diizinkan mengakses halaman ini")</script>';
            echo'<script>window.location.href="'.base_url().'";</script>';
        }   
    }

    public function index()
    {
        //$this->db->from('tb_satuan');
        //$query = $this->db->get();
        // $query = $this->db->query('select tb_satuan.*, tb_user.nama_lengkap from tb_satuan
                    // join tb_user on tb_user.id_user=tb_satuan.created_by');
        $query = $this->db->get('tb_satuan');

        $data = array(
			'page' => 'produk/satuan/index',
			'link' => 'setting_satuan',
			'script' => 'produk/satuan/script',
			'data' => $query,
		);
		$this->load->view('template/wrapper', $data);
    }

    public function file_pendukung($id_satuan)
    {
        $this->db->from('tb_satuan');
        $this->db->join('tb_user', 'tb_user.id_user = tb_satuan.created_by');
        $this->db->where(array('tb_satuan.id_satuan' => $id_satuan));
        $query = $this->db->get();

        $this->db->from('tb_file_satuan');
        $this->db->where(array('id_satuan' => $id_satuan));
        $file = $this->db->get();
        $data = array(
			'page' => 'satuan/file_pendukung/index',
			'link' => 'satuan',
			'script' => 'satuan/file_pendukung/script',
            'data' => $query,
            'file' => $file,
            'id_satuan' =>$id_satuan
		);
		$this->load->view('template/wrapper', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Tambah Pasien';
        $data['script'] = 'pasien/script';
        
        $this->load->view('_layout_sifa/header', $data);
        $this->load->view('_layout_sifa/sidebar', $data);
        $this->load->view('_layout_sifa/topbar', $data);
        $this->load->view('pasien/tambah', $data);
        $this->load->view('_layout_sifa/footer', $data);
    }

    public function store(){
        $this->db->trans_begin();
        $data_to_save = array(
            'nama_satuan' => $this->input->post('nama_satuan', true), 
            'keterangan' => $this->input->post('keterangan', true), 
            'date_created' => date('Y-m-d H:i:s'), 
        );
        $simpan = $this->db->insert('tb_satuan', $data_to_save);
        
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
        $this->db->from('tb_satuan');
        $this->db->where(array('tb_satuan.id_satuan' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function update(){
        $this->db->trans_begin();
        $data_to_save = array(
            'nama_satuan' => $this->input->post('nama_satuan', true), 
            'keterangan' => $this->input->post('keterangan', true), 
            'date_modified' => date('Y-m-d H:i:s'), 
        );
        $simpan = $this->db->update('tb_satuan', $data_to_save, array('id_satuan' => $this->input->post('id_satuan', true)));
        
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
        $id_satuan = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_satuan', array('id_satuan' => $id_satuan));
        
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

    public function detail($id_satuan){
        //$id_presensi = decrypt_param($id_presensi);
        $this->db->from('tb_satuan');        
        $this->db->join('tb_user', 'tb_user.id_user = tb_satuan.created_by');
        $this->db->where(array('tb_satuan.id_satuan' => $id_satuan));
        $query = $this->db->get();
        
        $data = array(
             'page' => 'satuan/detail',
             'link' => 'satuan',
             'script' => 'satuan/script',
             'data' => $query,             
         );
         $this->load->view('template/wrapper', $data);
    }

    

    
}
