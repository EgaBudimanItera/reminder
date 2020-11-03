<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $this->db->from('tb_login');
        $query = $this->db->get();
        $data = array(
			'page' => 'user/profil/index',
			'link' => 'user',
			'script' => 'user/profil/script',
			'data' => $query,
		);
		$this->load->view('template/wrapper', $data);
    }

    
    public function store(){
        $cek = $this->db->get_where('tb_login', array('username' => trim($this->input->post('username', true))));
        if($cek->num_rows() != 0){
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Username sudah digunakan</div>'
			);
            echo json_encode($return);
            exit();
        }

        $cek = $this->db->get_where('tb_login', array('email' => trim($this->input->post('email', true))));
        if($cek->num_rows() != 0){
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Email sudah digunakan</div>'
			);
            echo json_encode($return);
            exit();
        }

        $this->db->trans_begin();
        
        $data_to_save2 = array(
            'username' => trim($this->input->post('username', true)), 
            'password' => $this->input->post('password', true), 
            'is_level' => $this->input->post('is_level', true), 
            'email' => $this->input->post('email', true), 
        );
        $simpan = $this->db->insert('tb_login', $data_to_save2);

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

    public function get(){
        $id = $this->input->post('id', true);
        $this->db->from('tb_login');
        $this->db->where(array('id_login' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function update(){
        $this->db->trans_begin();
        
        if(!empty($this->input->post('password', true))){
            $data_to_save2 = array(
                'username' => trim($this->input->post('username', true)), 
                'password' => $this->input->post('password', true) ,
                'is_level' => $this->input->post('is_level', true), 
                'email' => $this->input->post('email', true), 
            );
        }else{
            $data_to_save2 = array(
                'username' => trim($this->input->post('username', true)), 
                'is_level' => $this->input->post('is_level', true), 
                'email' => $this->input->post('email', true), 
            );
        }
        
        $simpan = $this->db->update('tb_login', $data_to_save2, array('id_login' => $this->input->post('id_login', true)));

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
        $id_login = $this->input->post('id', true);
        
        $hapus = $this->db->delete('tb_login', array('id_login' => $id_login));
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
