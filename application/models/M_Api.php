<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class M_Api extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
 
    public function buatKodePelanggan(){
      $this->db->select('RIGHT(id_pelanggan,5) as kode', FALSE);
      $this->db->order_by('id_pelanggan','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_pelanggan');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = $kodemax;
      return $kodejadi;
    }

    public function buatNomorDo(){
      $this->db->select('RIGHT(no_do,10) as kode', FALSE);
      $this->db->order_by('no_do','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_do');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 10, "0", STR_PAD_LEFT);
      $kodejadi = $kodemax;
      return $kodejadi;
    }

    public function buatKodeKategori(){
      $this->db->select('RIGHT(id_kategori,5) as kode', FALSE);
      
      $this->db->order_by('id_kategori','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_kategori');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = $kodemax;
      return $kodejadi;
    }

    

    public function buatKodeProduk(){
      $this->db->select('RIGHT(id_produk,5) as kode', FALSE);
      $this->db->order_by('id_produk','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_produk');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = $kodemax;
      return $kodejadi;
    }

    public function buatKodeBahan(){
      $this->db->select('RIGHT(id_produk,5) as kode', FALSE);
      $this->db->where(array('tipe_produk'=>'0'));
      $this->db->order_by('id_produk','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_produk');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = $kodemax;
      return $kodejadi;
    }
    public function buatKodeStokAwal(){
      //SA 09 20 00001
      $bulantahun=date('my');
      $this->db->select('RIGHT(kode_stok_awal,5) as kode', FALSE);
      $this->db->like('kode_stok_awal',$bulantahun);
      $this->db->order_by('kode_stok_awal','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_stok_awal_produk');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = "SA".$bulantahun.$kodemax;
      return $kodejadi;
    }

    public function buatNomorBayarPenjualan(){
      //BY 09 20 00001
      $bulantahun=date('my');
      $this->db->select('RIGHT(nomor_bayar,5) as kode', FALSE);
      $this->db->like('nomor_bayar',$bulantahun);
      $this->db->order_by('nomor_bayar','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_bayar_penjualan');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = "BY".$bulantahun.$kodemax;
      return $kodejadi;
    }

    public function buatNomorReturPenjualan(){
      //BY 09 20 00001
      $bulantahun=date('my');
      $this->db->select('RIGHT(no_retur,5) as kode', FALSE);
      $this->db->like('no_retur',$bulantahun);
      $this->db->order_by('no_retur','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_retur_penjualan');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = "RJ".$bulantahun.$kodemax;
      return $kodejadi;
    }
    public function buatKodePenyesuaianStok(){
      //PS 09 20 00001
      $bulantahun=date('my');
      $this->db->select('RIGHT(kode_penyesuaian,5) as kode', FALSE);
      $this->db->like('kode_penyesuaian',$bulantahun);
      $this->db->order_by('kode_penyesuaian','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_penyesuaian_stok');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = "PS".$bulantahun.$kodemax;
      return $kodejadi;
    }


    //order no faktur ega
    public function buatKodeOrderPenjualan(){
      //PS 09 20 00001
      $bulantahun=date('my');
      $this->db->select('RIGHT(nomor_faktur,5) as kode', FALSE);
      $this->db->like('nomor_faktur',$bulantahun);
      $this->db->order_by('nomor_faktur','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_order');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = $bulantahun.$kodemax;
      return $kodejadi;
    }
    //order no faktur ega
    public function buatNoInvoice(){
      //IN 09 20 00001
      $bulantahun=date('my');
      $this->db->select('RIGHT(nomor_invoice,5) as kode', FALSE);
      $this->db->like('nomor_invoice',$bulantahun);
      $this->db->order_by('nomor_invoice','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_invoice');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = $bulantahun.$kodemax;
      return $kodejadi;
    }
    public function buatKodeFakturStok(){
      $this->db->select('RIGHT(id_stok_awal,5) as kode', FALSE);
      $this->db->order_by('id_stok_awal','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_stok_awal_produk');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = $kodemax;
      return $kodejadi;
    }

    public function update_harga_jual(){
      return $this->db->query("UPDATE    
                                  tb_harga_jual s, tb_produk p
                        SET       s.harga_jual = p.harga_jual
                        WHERE     s.harga_jual is null");
    }

    public function buatKodeFakturOrder(){
      $this->db->select('RIGHT(id_order,5) as kode', FALSE);
      $this->db->order_by('id_order','DESC');
      $this->db->limit(1);
      $query = $this->db->get('tb_order');
      if($query->num_rows() <> 0){      
        $data = $query->row();
        $kode = intval($data->kode) + 1;
      }
      else {       
        $kode = 1;
      }
      $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
      $kodejadi = $kodemax;
      return $kodejadi;
    }
}