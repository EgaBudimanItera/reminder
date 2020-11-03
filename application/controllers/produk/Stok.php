<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stok extends CI_Controller
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
        // $this->db->select('tb_stok_produk.*, tb_produk.nama_produk, tb_produk.kode_produk, tb_satuan.*');
        // $this->db->from('tb_stok_produk');
        // $this->db->join('tb_produk', 'tb_stok_produk.id_produk = tb_produk.id_produk');
        // $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_produk.id_satuan');
        // $this->db->where(array('tb_produk.id_produk' => $id_produk));
        // $query = $this->db->get();

        //update by ega
        $this->db->select('tb_stok_awal_produk.*,tb_stok_awal_produk.date_created as tgl,tb_produk.nama_produk, tb_produk.kode_produk, tb_satuan.*');
        $this->db->from('tb_produk');
        $this->db->join('tb_stok_awal_produk', 'tb_stok_awal_produk.id_produk = tb_produk.id_produk','left');
        $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_produk.id_satuan');
        // $this->db->join('tb_user', 'tb_user.id_user = tb_produk.created_by');
        $this->db->where(array('is_deleted' => '1'));
        $query = $this->db->get();


        $satuan = $this->db->get('tb_satuan');
        $kategori = $this->db->get('tb_kategori');

        // $this->db->select('tb_produk.nama_produk, tb_produk.kode_produk, tb_satuan.*, tb_kategori.* ');
        // $this->db->from('tb_produk');
        // $this->db->join('tb_satuan', 'tb_satuan.id_satuan = tb_produk.id_satuan');
        // $this->db->join('tb_kategori', 'tb_kategori.id_kategori = tb_produk.id_kategori');
        // $this->db->where(array('tb_produk.id_produk' => $id_produk));
        // $produk = $this->db->get();

        $kodeFaktur = 'NF000-'.$this->M_Api->buatKodeFakturStok();
        $data = array(
			'page' => 'produk/stok/index',
			'link' => 'set_stok_awal_produk',
            'script' => 'produk/stok/script',
            
            'data' => $query,
            'ref_satuan' => $satuan,
            'ref_kategori' => $kategori,
            // 'id_produk' => $id_produk,
            // 'produk' => $produk,
            'kodeFaktur' => $kodeFaktur,
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

    public function store(){
        $this->db->trans_begin();

        $kodeFaktur = 'NF000-'.$this->M_Api->buatKodeFakturStok();
        $cek = $this->db->get_where('tb_stok_produk', array('id_produk' => $this->input->post('id_produk', true)));
        if($cek->num_rows() == 0){
            $status = 'Stok Awal';
        }else{
            $status = 'Pembelian';
        }

        $data_to_save = array(
            'id_produk' => $this->input->post('id_produk', true), 
            'tgl_transaksi' => date('Y-m-d'), 
            'tgl_jatuh_tempo' => $this->input->post('tgl_jatuh_tempo', true), 
            'tgl_kadaluarsa' => $this->input->post('tgl_kadaluarsa', true), 
            'nomor_faktur' => $kodeFaktur, 
            'jumlah_produk' => $this->input->post('jumlah_produk', true), 
            'harga_beli' => $this->input->post('harga_beli', true), 
            'harga_jual' => $this->input->post('harga_jual', true), 
            'keterangan' => $this->input->post('keterangan', true), 
            'date_created' => date('Y-m-d H:i:s'), 
            'status_produk' => $status, 
        );     
        $simpan = $this->db->insert('tb_stok_produk', $data_to_save);
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
        $this->db->from('tb_produk');
        $this->db->where(array('tb_produk.id_produk' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function update(){
        $this->db->trans_begin();
        unset($_POST['aksi']);
        // unset($_POST['id_produk']);
        $_POST['date_modified'] = date('Y-m-d H:i:s');
        
        $simpan = $this->db->update('tb_produk', $_POST, array('id_produk' => $this->input->post('id_produk', true)));
        
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
        $id_produk = $this->input->post('id', true);
        $hapus = $this->db->delete('tb_produk', array('id_produk' => $id_produk));
        
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
