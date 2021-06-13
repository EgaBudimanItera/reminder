<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('level') != 'Admin'){
            echo '<script>alert("Maaf, anda tidak diizinkan mengakses halaman ini")</script>';
            echo'<script>window.location.href="'.base_url().'";</script>';
        }   
        $this->load->model('M_Api');
        $this->load->helper('function_helper');
    }

    public function index()
    {
        $query=$this->db    ->select('*')
                            ->from('tb_invoice')
                            ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_invoice.id_pelanggan')
                            ->get();
        $pelanggan=$this->db->get('tb_pelanggan');
        $kendaraan=$this->db->get('tb_kendaraan');
        $data = array(
			'page' => 'transaksi/invoice/index',
			'link' => 'DO',
            'script' => 'transaksi/invoice/script',
            'pelanggan'=>$pelanggan,
            'kendaraan'=>$kendaraan,
            'data' => $query,
            'nomor_invoice'=>"IN".$this->M_Api->buatNoInvoice(),
            
		);
	    $this->load->view('template/wrapper', $data);
    }

    public function store(){
        $this->db->trans_begin();
        $data_to_save = array(
            'id_pelanggan'=>$this->input->post('id_pelanggan2', true),
            'nomor_invoice' => $this->input->post('nomor_invoice2', true), 
            'tgl_invoice' => $this->input->post('tgl_invoice2', true), 
            'keterangan' => $this->input->post('keterangan2', true), 
            'next_tagih' => $this->input->post('next_tagih2', true), 
        );
        $simpan = $this->db->insert('tb_invoice', $data_to_save);
        
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

    public function pilihdo($id_invoice){
        $invoice=$this->db->get_where('tb_invoice',array('id_invoice'=>$id_invoice))->row();
        // $do=$this->db->get_where('tb_do',array('id_pelanggan'=>$invoice->id_pelanggan,'id_invoice'=>'0'));
        $do=$this->db   ->select('tb_det_do.*,coalesce(sum(tarif*jumlah),0) as subtotal,tgl_do,no_do,tb_pelanggan.*,tb_kendaraan.*')
                        ->from('tb_det_do')
                        ->join('tb_do','tb_do.id_do=tb_det_do.id_do')
                        ->join('tb_kendaraan','tb_do.id_kendaraan=tb_kendaraan.id_kendaraan')
                        ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_do.id_pelanggan')
                        ->where(array('tb_do.id_pelanggan'=>$invoice->id_pelanggan,'id_invoice'=>'0'))
                        ->group_by('id_do')
                        ->get();
        // $doterpilih=$this->db->get_where('tb_do',array('id_pelanggan'=>$invoice->id_pelanggan,'id_invoice'=>$id_invoice));
        $doterpilih=$this->db   ->select('tb_det_do.*,coalesce(sum(tarif*jumlah),0) as subtotal,tgl_do,no_do,tb_pelanggan.*,tb_kendaraan.*')
                                ->from('tb_det_do')
                                ->join('tb_do','tb_do.id_do=tb_det_do.id_do')
                                ->join('tb_kendaraan','tb_do.id_kendaraan=tb_kendaraan.id_kendaraan')
                                ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_do.id_pelanggan')
                                ->where(array('tb_do.id_pelanggan'=>$invoice->id_pelanggan,'id_invoice'=>$id_invoice))
                                ->group_by('id_do')
                                ->get();
        $data = array(
			'page' => 'transaksi/invoice/pilihdo',
			'link' => 'DO',
            'script' => 'transaksi/invoice/script',
            'doterpilih' => $doterpilih,
            'invoice'=>$invoice,
            'do'=>$do,
		);
	    $this->load->view('template/wrapper', $data);
    }

    public function pilihDoKeInvoice(){
        $this->db->trans_begin();
        $id_invoice=$this->input->post('id_invoice', true);
        $id_do=$this->input->post('id', true);
        $data_to_save = array(
            'id_invoice' => $this->input->post('id_invoice', true), 
        );
        $simpan = $this->db->update('tb_do', $data_to_save, array('id_do' => $this->input->post('id', true)));
        
        $invoice=$this->db->get_where('tb_invoice',array('id_invoice'=>$id_invoice))->row();
        $total_bayar=$invoice->total_bayar;

        $do=$this->db   ->select('tb_det_do.*,coalesce(sum(tarif*jumlah),0) as subtotal,tgl_do,no_do,tb_pelanggan.*,tb_kendaraan.*')
                        ->from('tb_det_do')
                        ->join('tb_do','tb_do.id_do=tb_det_do.id_do')
                        ->join('tb_kendaraan','tb_do.id_kendaraan=tb_kendaraan.id_kendaraan')
                        ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_do.id_pelanggan')
                        ->where(array('tb_do.id_do'=>$id_do))
                        ->group_by('id_do')
                        ->get()->row();
        $subtotal=$do->subtotal;
        $total_bayar=$total_bayar+$subtotal;
        $data_to_save2 = array(
            'total_bayar' =>$total_bayar,
        );
        $simpan2 = $this->db->update('tb_invoice', $data_to_save2, array('id_invoice' => $id_invoice));

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
    public function hapusPilihDoKeInvoice(){
        $this->db->trans_begin();
        $id_invoice=$this->input->post('id_invoice', true);
        $id_do=$this->input->post('id', true);
        $data_to_save = array(
            'id_invoice' => "0", 
        );
        $simpan = $this->db->update('tb_do', $data_to_save, array('id_do' => $this->input->post('id', true)));

        $invoice=$this->db->get_where('tb_invoice',array('id_invoice'=>$id_invoice))->row();
        $total_bayar=$invoice->total_bayar;

        $do=$this->db   ->select('tb_det_do.*,coalesce(sum(tarif*jumlah),0) as subtotal,tgl_do,no_do,tb_pelanggan.*,tb_kendaraan.*')
                        ->from('tb_det_do')
                        ->join('tb_do','tb_do.id_do=tb_det_do.id_do')
                        ->join('tb_kendaraan','tb_do.id_kendaraan=tb_kendaraan.id_kendaraan')
                        ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_do.id_pelanggan')
                        ->where(array('tb_do.id_do'=>$id_do))
                        ->group_by('id_do')
                        ->get()->row();
        $subtotal=$do->subtotal;
        $total_bayar=$total_bayar-$subtotal;
        $data_to_save2 = array(
            'total_bayar' =>$total_bayar,
        );
        $simpan2 = $this->db->update('tb_invoice', $data_to_save2, array('id_invoice' => $id_invoice));
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

    public function bayarTagihan(){
        $id_invoice=$this->input->post('id_invoice', true);
        $invoice=$this->db->get_where('tb_invoice',array('id_invoice'=>$id_invoice))->row();
        $akumulasi_bayar=$invoice->akumulasi_bayar;

        
        $subtotal=$this->input->post('jumlahbayar', true);
        $akumulasi_bayar=$akumulasi_bayar+$subtotal;
        $total_bayar=$invoice->total_bayar;
        $data_to_save2 = array(
            'akumulasi_bayar' =>$akumulasi_bayar,
            'next_tagih'=>$this->input->post('next_tagih', true),
        );
        $simpan2 = $this->db->update('tb_invoice', $data_to_save2, array('id_invoice' => $id_invoice));

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

    public function cetakInvoice($id){
        $invoice=$this->db->get_where('tb_invoice',array('id_invoice'=>$id))->row();
        $pelanggan=$this->db->get_where('tb_pelanggan',array('id_pelanggan'=>$invoice->id_pelanggan))->row();
        $doterpilih=$this->db   ->select('tb_det_do.*,coalesce(sum(tarif*jumlah),0) as subtotal,tgl_do,no_do,tb_pelanggan.*,tb_kendaraan.*')
                                ->from('tb_det_do')
                                ->join('tb_do','tb_do.id_do=tb_det_do.id_do')
                                ->join('tb_kendaraan','tb_do.id_kendaraan=tb_kendaraan.id_kendaraan')
                                ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_do.id_pelanggan')
                                ->where(array('tb_do.id_pelanggan'=>$invoice->id_pelanggan,'id_invoice'=>$id))
                                ->group_by('id_do')
                                ->get();
        $data = array(
            'data'=>$doterpilih,
            'pelanggan'=>$pelanggan,
            'invoice'>$invoice,
        );
        $this->load->view('transaksi/invoice/report', $data);
    }
}