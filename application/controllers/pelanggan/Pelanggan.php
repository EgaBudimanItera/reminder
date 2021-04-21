<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
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
        
        $query = $this->db->query('select tb_pelanggan.* from tb_pelanggan');

        $kode_pelanggan = 'KP-'.$this->M_Api->buatKodepelanggan();
        $data = array(
			'page' => 'pelanggan/index',
			'link' => 'pelanggan',
			'script' => 'pelanggan/script',
            'data' => $query,
            'kode_pelanggan'=>$kode_pelanggan,
        );
        
		$this->load->view('template/wrapper', $data);
    }

    public function store(){
        $cek = $this->db->get_where('tb_pelanggan', array('kode_pelanggan' => trim($this->input->post('kode_pelanggan', true))));
        if($cek->num_rows() != 0){
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Kode sudah digunakan</div>'
			);
            echo json_encode($return);
            exit();
        }

        $kode_pelanggan = 'KP-'.$this->M_Api->buatKodepelanggan();

        $this->db->trans_begin();
        $data_to_save = array(
            'kode_pelanggan' => $kode_pelanggan, 
            'nama_pelanggan' => $this->input->post('nama_pelanggan', true), 
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan', true), 
            'no_telp' => $this->input->post('no_telp', true), 
        );
        $simpan = $this->db->insert('tb_pelanggan', $data_to_save);
        
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
        $this->db->from('tb_pelanggan');
        $this->db->where(array('tb_pelanggan.id_pelanggan' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function update(){
        $this->db->trans_begin();
        $data_to_save = array(
            'kode_pelanggan' => $this->input->post('kode_pelanggan', true), 
            'nama_pelanggan' => $this->input->post('nama_pelanggan', true), 
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan', true), 
            'no_telp' => $this->input->post('no_telp', true), 
        );
        $simpan = $this->db->update('tb_pelanggan', $data_to_save, array('id_pelanggan' => $this->input->post('id_pelanggan', true)));
        
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
        $id_pelanggan = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_pelanggan', array('id_pelanggan' => $id_pelanggan));
        
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

    public function detailmuatan($id_pelanggan){
        //$id_presensi = decrypt_param($id_presensi);
        $this->db->from('tb_det_muatan');        
        $this->db->join('tb_pelanggan', 'tb_det_muatan.id_pelanggan = tb_pelanggan.id_pelanggan');
        $this->db->join('tb_satuan', 'tb_det_muatan.id_satuan = tb_satuan.id_satuan');
        $this->db->where(array('tb_det_muatan.id_pelanggan' => $id_pelanggan));
        $query = $this->db->get();
        $satuan=$this->db->get('tb_satuan');
        $data = array(
             'page' => 'pelanggan/detailmuatan',
             'link' => 'pelanggan',
             'script' => 'pelanggan/script',
             'data' => $query, 
             'satuan'=>$satuan,    
             'pelanggan'=>$id_pelanggan,        
         );
         $this->load->view('template/wrapper', $data);
    }

    

    
}
