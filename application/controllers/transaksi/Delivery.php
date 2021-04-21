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

    public function index()
    {
        $query=$this->db->select('*')
                ->from('tb_do')
               
                ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_do.id_pelanggan')
                ->join('tb_kendaraan','tb_kendaraan.id_kendaraan=tb_do.id_kendaraan')
                ->join('tb_driver','tb_driver.id_driver=tb_kendaraan.id_driver')
                ->get();
        $pelanggan=$this->db->get('tb_pelanggan');
        $kendaraan=$this->db->get('tb_kendaraan');
        $data = array(
			'page' => 'transaksi/delivery/index',
			'link' => 'DO',
            'script' => 'transaksi/delivery/script',
            'pelanggan'=>$pelanggan,
            'kendaraan'=>$kendaraan,
            'data' => $query,
            'no_do'=>$this->M_Api->buatNomorDo(),
            
		);
	    $this->load->view('template/wrapper', $data);
    }
    public function detail($id_do){
        //$id_presensi = decrypt_param($id_presensi);
        $this->db->select('tb_det_do.*,muatan,dari,tujuan,tb_det_muatan.tarif as tarifmuatan,tb_satuan.*');
        $this->db->from('tb_det_do');        
        $this->db->join('tb_det_muatan', 'tb_det_muatan.id_muatan = tb_det_do.id_muatan');
        $this->db->join('tb_satuan', 'tb_det_muatan.id_satuan = tb_satuan.id_satuan');
        $this->db->where(array('tb_det_do.id_do' => $id_do));
        $query = $this->db->get();

        $satuan=$this->db->get('tb_satuan');
        $pelanggan=$this->db->get_where('tb_do',array('id_do'=>$id_do))->row()->id_pelanggan;

        $this->db->from('tb_det_muatan');        
        $this->db->join('tb_pelanggan', 'tb_det_muatan.id_pelanggan = tb_pelanggan.id_pelanggan');
        $this->db->join('tb_satuan', 'tb_det_muatan.id_satuan = tb_satuan.id_satuan');
        $this->db->where(array('tb_det_muatan.id_pelanggan' => $pelanggan));
        $muatan = $this->db->get();

        $dorder=$this->db->get_where('tb_do',array('id_do'=>$id_do));
        $data = array(
             'page' => 'transaksi/delivery/detail',
             'link' => 'DO',
             'script' => 'transaksi/delivery/script',
             'data' => $query, 
             'muatan'=>$muatan,    
             'pelanggan'=>$pelanggan,   
             'id_do'=>$id_do,  
             'do'=>$dorder,   
         );
         $this->load->view('template/wrapper', $data);
    }
    public function store(){
        $this->db->trans_begin();
        $data_to_save = array(
            'no_do'=>$this->input->post('no_do', true),
            'tgl_do' => $this->input->post('tgl_do', true), 
            'id_pelanggan' => $this->input->post('id_pelanggan', true), 
            'keterangan' => $this->input->post('keterangan', true), 
            'id_kendaraan' => $this->input->post('id_kendaraan', true), 
            'status_do' => "belum", 
            
        );
        $simpan = $this->db->insert('tb_do', $data_to_save);
        
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

    public function storemuatan(){
        $this->db->trans_begin();
        $data_to_save = array(
            'id_do'=>$this->input->post('id_do', true),
            'id_muatan' => $this->input->post('id_muatan', true), 
            'tarif' => $this->input->post('tarif', true), 
            'jumlah' => $this->input->post('jumlah', true), 
            
            
        );
        $simpan = $this->db->insert('tb_det_do', $data_to_save);
        
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

    public function remove(){
        $this->db->trans_begin();
        $id_do = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_do', array('id_do' => $id_do));
        
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

    public function selesai(){
        $this->db->trans_begin();
        $data_to_save = array(
            'status_do' => "sudah", 
        );
        $simpan = $this->db->update('tb_do', $data_to_save, array('id_do' => $this->input->post('id', true)));
        
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

    public function removemuatan(){
        $this->db->trans_begin();
        $id_do = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_det_do', array('id_det_do' => $id_do));
        
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