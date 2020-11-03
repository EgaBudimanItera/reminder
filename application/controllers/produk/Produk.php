<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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

        $kodeProduk = 'KP-'.$this->M_Api->buatKodeProduk();
        $query = $this->db->select('*')->from('tb_produk')
                ->join('tb_satuan','tb_produk.id_satuan=tb_satuan.id_satuan')
                ->join('tb_kategori','tb_kategori.id_kategori=tb_produk.id_kategori')
                
                ->get();
        $satuan = $this->db->get('tb_satuan');
        $kategori = $this->db->get('tb_kategori');

        $data = array(
			'page' => 'produk/produk/index',
			'link' => 'tambah_produk',
			'script' => 'produk/produk/script',
            'data' => $query,
            'ref_satuan' => $satuan,
            'ref_kategori' => $kategori,
            'kodeProduk' => $kodeProduk,
		);
		$this->load->view('template/wrapper', $data);
    }

    public function store(){
        $this->db->trans_begin();
        $kodeProduk = 'KP-'.$this->M_Api->buatKodeProduk();
        $data_to_save = array(
            'kode_produk' => $kodeProduk, 
            'id_kategori' => $this->input->post('id_kategori', true), 
            'id_satuan' => $this->input->post('id_satuan', true), 
            'nama_produk' => $this->input->post('nama_produk', true), 
            'keterangan' => $this->input->post('keterangan', true), 
            'harga_jual'=>$this->input->post('harga_jual', true),
            'stok_minimum'=>$this->input->post('stok_minimum',true),
            'stok'=>$this->input->post('stok',true),
        );        
        $simpan = $this->db->insert('tb_produk', $data_to_save);
        
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
        
        $data_to_save = array(
            'id_kategori' => $this->input->post('id_kategori', true), 
            'id_satuan' => $this->input->post('id_satuan', true), 
            'nama_produk' => $this->input->post('nama_produk', true), 
            'keterangan' => $this->input->post('keterangan', true), 
            'stok_minimum'=>$this->input->post('stok_minimum',true),
            'stok'=>$this->input->post('stok',true),
        );   

        $simpan = $this->db->update('tb_produk', $data_to_save, 
                array('id_produk' => $this->input->post('id_produk', true)));
        
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

    public function remove($id_produk){
        $this->db->trans_begin();
        // $id_produk = $this->input->post('id', true);
       
        $hapus = $this->db->delete('tb_produk', array('id_produk' => $id_produk));
       
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            echo "<script>
            alert('Berhasil Di Hapus');
            window.location.href='".base_url()."produk/produk';
            </script>";
        }else {
            $this->db->trans_commit();
            echo "<script>
            alert('Berhasil Di Hapus');
            window.location.href='".base_url()."produk/produk';
            </script>";
        }
    }

    

    public function generatebarcode($kode_produk){
        $this->load->library('zend');
		//load in folder Zend
		$this->zend->load('Zend/Barcode');
		//generate barcode
		// Zend_Barcode::render('ean8', 'image', array('text'=>$kode_produk), array());
        Zend_Barcode::render('code128', 'image', array('text' => $kode_produk), array());
        
    }

    public function cetak(){
        $query = $this->db->select('*')->from('tb_produk')
                ->join('tb_satuan','tb_produk.id_satuan=tb_satuan.id_satuan')
                ->join('tb_kategori','tb_kategori.id_kategori=tb_produk.id_kategori')
                ->get();
        $data=array(
            'data'=>$query,
        );
        $this->load->view('produk/produk/cetak',$data);
    }
    
    public function viewprintbarcode(){
        $kategori = $this->db->get_where('tb_kategori',array('tipe_kategori'=>'2'));
        $query = $this->db->select('*')->from('tb_produk')
                ->join('tb_satuan','tb_produk.id_satuan=tb_satuan.id_satuan')
                ->join('tb_kategori','tb_kategori.id_kategori=tb_produk.id_kategori')
                ->get();
        $satuan = $this->db->get('tb_satuan');
        $data = array(
			'page' => 'produk/produk/printbarcode',
			'link' => 'print_barcode',
            'script' => '',
            'ref_satuan' => $satuan,
            'data' => $query,
            'ref_kategori' => $kategori,
		);
		$this->load->view('template/wrapper', $data);
    }

    
}
