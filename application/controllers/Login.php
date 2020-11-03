<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
        if($this->session->userdata('level') == 'Admin'){
			echo '<script>alert("Maaf, anda tidak diizinkan mengakses halaman ini")</script>';
            echo'<script>window.location.href="'.base_url().'welcome";</script>';
        }
	}
	
	public function index()
	{
		$data = array(
			'page' => 'dashboard_stisla',
			'link' => 'dashboard'
		);
		$this->load->view('login', $data);
	}

	public function proses(){
		$username = $this->input->post('email', true);
		$password = $this->input->post('password', true);
		
		//$lev = $this->db->get_where('tb_login', array('username' => $username));

		$this->db->from('tb_login');
		
		$this->db->where(array('tb_login.username' => $username));
		$lev = $this->db->get();
		// var_dump($lev->row());
		// die();
		if($lev->num_rows() != 0){
			if ($password== $lev->row()->password){
				$sess = array(
					'username' => $username,
					'is_login' => true,
					
					'level' => $lev->row()->is_level,
					'id_login'=>$lev->row()->id_login
				);
				$this->session->set_userdata($sess);
				echo '<script>alert("Berhasil Login...");window.location.href = "'.base_url().'welcome";</script>';
			}else{
				echo '<script>alert("Password Salah !!");window.location.href = "'.base_url().'login";</script>';
			}
			
		}else{
			echo '<script>alert("Username Tidak Ada !!");window.location.href = "'.base_url().'login";</script>';
		}
	}

}