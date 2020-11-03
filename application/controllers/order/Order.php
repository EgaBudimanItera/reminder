<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
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
        
        $query=$this->db->select('tb_order.*,coalesce(total_bayar,0) as total_bayar,nama_pelanggan')
                ->from('tb_order')
               
                ->join('tb_pelanggan','tb_pelanggan.id_pelanggan=tb_order.id_pelanggan')
                ->get();
        
        $data = array(
			'page' => 'order/order/index',
			'link' => 'Order Produk',
            'script' => 'order/order/script',
            
            'data' => $query,
            
		);
	    $this->load->view('template/wrapper', $data);
    }

    public function detailbayar($id_order){
        $query=$this->db->select('tb_order_detail.*,kode_produk,nama_produk,stok,harga_jual')
                ->from('tb_order_detail')
                ->join('tb_produk','tb_order_detail.id_produk=tb_produk.id_produk')
                ->join('tb_order','tb_order.id_order=tb_order_detail.id_order')
                ->where('tb_order_detail.id_order',$id_order)
                ->get();
        $query2=$this->db->select('*')
                ->from('tb_order')
                ->join('tb_pelanggan','tb_order.id_pelanggan=tb_pelanggan.id_pelanggan')
                ->where('id_order',$id_order)
                ->get()->row();
        $data = array(
            'page' => 'order/order/detailbayar',
            'link' => 'Order Produk',
            'script' => 'order/order/script',
            'id_order'=>$query2->id_order,
            'pelanggan'=>$query2->nama_pelanggan,
            'akumulasi'=>$query2->akumulasi_bayar,
            'next'=>$query2->next_tagih,
            'id_order_master'=>$query2->id_order,
            'data' => $query,
            'total'=>$query2->total_bayar
        );
        // var_dump($data);
        $this->load->view('template/wrapper', $data);
    
    }

    public function tambah(){
        $pelanggan=$this->db->get('tb_pelanggan');
        $produk=$this->db->get('tb_produk');
        $data = array(
			'page' => 'order/order/formtambah',
			'link' => 'Order Produk',
            'script' => 'order/order/script',
            'pelanggan'=>$pelanggan,
            'produk'=>$produk,
		);
	    $this->load->view('template/wrapper', $data);
    }
    public function tabeldetailtemp(){
        $user=$this->session->userdata('username');
        $query=$this->db->select('tb_order_detail_temp.*,kode_produk,nama_produk')
                ->from('tb_order_detail_temp')
               
                ->join('tb_produk','tb_produk.id_produk=tb_order_detail_temp.id_produk')
                ->where('tb_order_detail_temp.created_by',$user)
                ->get();
        $data=array(
            'data'=>$query,
        );
        $this->load->view('order/order/datadetailtemp',$data);
    }

    public function updatetagih(){
        $next_tagih=$this->input->post('next_tagih');
        $id_order=$this->input->post('id_order');
        $jumlahbayar=$this->input->post('jumlahbayar');
        $akumulasi=$this->input->post('akumulasi');
        $total_bayar=$this->input->post('total');

        $total=$jumlahbayar+$akumulasi;
        if($total>$total_bayar){
            $total=$total_bayar;
        }
        $data=array(
            'next_tagih'=>$next_tagih,
            'akumulasi_bayar'=>$total,
        );
        $this->db->trans_begin();
        $simpan = $this->db->update('tb_order', $data, array('id_order' => $id_order));
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            echo "<script>
            alert('Berhasil Di Hapus');
            window.location.href='".base_url()."order/order';
            </script>";
        }else {
            $this->db->trans_commit();
            echo "<script>
            alert('Berhasil Di Hapus');
            window.location.href='".base_url()."order/order';
            </script>";
        }
    }

    public function detail($id_order){
        $query=$this->db->select('tb_order_detail.*,kode_produk,nama_produk,stok,harga_jual')
                ->from('tb_order_detail')
                ->join('tb_produk','tb_order_detail.id_produk=tb_produk.id_produk')
                ->join('tb_order','tb_order.id_order=tb_order_detail.id_order')
                ->where('tb_order_detail.id_order',$id_order)
                ->get();
        $query2=$this->db->select('*')
                ->from('tb_order')
                ->join('tb_pelanggan','tb_order.id_pelanggan=tb_pelanggan.id_pelanggan')
                ->where('id_order',$id_order)
                ->get()->row();
        $data = array(
            'page' => 'order/order/detail',
            'link' => 'Order Produk',
            'script' => 'order/order/script',
            
            'pelanggan'=>$query2->nama_pelanggan,
            'akumulasi'=>$query2->akumulasi_bayar,
            'next'=>$query2->next_tagih,
            'id_order_master'=>$query2->id_order,
            'data' => $query,
            
        );
        // var_dump($data);
        $this->load->view('template/wrapper', $data);
    }

    public function get(){
        $id = $this->input->post('id', true);
        $this->db   ->select('tb_order_detail.*,tb_order_detail.keterangan as ket_order,kode_produk,nama_produk,(stok-stok_in_cup) as stok')
                    ->from('tb_order_detail')
                    ->join('tb_produk','tb_produk.id_produk=tb_order_detail.id_produk')
                    ->where(array('md5(id_order_detail)' => $id));
        $get = $this->db->get();
        echo json_encode($get->row());
    }

    public function store(){
        

        $this->db->trans_begin();
        
        $this->db->select('tb_produk.hpp')
            ->from('tb_order_detail')
            ->join('tb_produk','tb_produk.id_produk=tb_order_detail.id_produk','left')
            ->where('id_order_detail',$id_order_detail);
        $hpp=$this->db->get()->row()->hpp;

        $data_to_save = array(
            'keterangan'=>$this->input->post('ket_order',true),
            'status_order'=>$status_order,
            'date_modified'=>date('Y-m-d H:i:s'),
            'hpp'=>$hpp,
        ); 

        $update=$this->db->update('tb_order_detail', $data_to_save, 
                array('id_order_detail' => $id_order_detail));

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

    public function storeproduk(){
        $user=$this->session->userdata('username');
        $qty=$this->input->post('qty',true);
        $id_produk=$this->input->post('id_produk',true);
        $produk=$this->db->get_where('tb_produk',array('id_produk'=>$id_produk))->row();
        $this->db->trans_begin();
        $data_to_save=array(
            'id_produk'=>$id_produk,
            'qty'=>$qty,
            'harga'=>$produk->harga_jual,
            'created_by'=>$user,
        );
        
        $simpan = $this->db->insert('tb_order_detail_temp', $data_to_save);
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

    public function addneworder($id_pelanggan){
        $user=$this->session->userdata('username');
        $this->db->trans_begin();

        $query=$this->db->select('COALESCE(SUM(qty*harga),0) as gt')
            ->from('tb_order_detail_temp')
            ->join('tb_produk','tb_produk.id_produk=tb_order_detail_temp.id_produk')
            ->where('tb_order_detail_temp.created_by',$user)
            ->get()->row()->gt;
        $gt=$query;
        
        //simpan ke tabel order
        $data_to_save_1=array(
            'id_pelanggan'=>$id_pelanggan,
            'nomor_faktur'=>$this->M_Api->buatKodeOrderPenjualan(),
            'akumulasi_bayar'=>0,
            'tgl_faktur'=>date('Y-m-d'), 
            'total_bayar'=>$gt,
            'next_tagih'=>date('Y-m-10',strtotime('+1 month')), 
        );
        $simpan = $this->db->insert('tb_order', $data_to_save_1);

        $id_order=$this->db->insert_id();
        $dettemorder=$this->db->get_where('tb_order_detail_temp',array('created_by'=>$user))->result();
        $i=0;
        foreach ($dettemorder as $row) {
            $ins2[$i]['id_order']              = $id_order;
            $ins2[$i]['id_produk']             = $row->id_produk;
            $ins2[$i]['harga']                 = $row->harga;
            $ins2[$i]['qty']                   = $row->qty;
            $i++;  
        } 
        $simpan_detail=$this->db->insert_batch('tb_order_detail',$ins2);
        $hapus = $this->db->delete('tb_order_detail_temp', array('created_by' => $user));
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
        //    echo '<script>alert("Order Gagal Disimpan");window.location = "'.base_url().'order/order";</script>';
            $return = array(
                    'status' => 'failed',
                    'text' => '<div class="alert alert-danger">Data gagal diupdate</div>'
            );
            echo json_encode($return);
        }else {
            $this->db->trans_commit();
            // echo '<script>alert("Order Berhasil Disimpan");window.location = "'.base_url().'order/order";</script>';
            $return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil diupdate</div>'
			);
			echo json_encode($return);
        }
    }

    public function grandtotal(){
        $user=$this->session->userdata('username');
        $query=$this->db->select('COALESCE(SUM(qty*harga),0) as gt')
                ->from('tb_order_detail_temp')
                ->join('tb_produk','tb_produk.id_produk=tb_order_detail_temp.id_produk')
                ->where('tb_order_detail_temp.created_by',$user)
                ->get()->row()->gt;
        $gt=$query;
        
        $return = array(
			'nilai' => $gt
		);
		echo json_encode($return);
    }

    public function hapustemp($id){
        $this->db->trans_begin();
        $hapus = $this->db->delete('tb_order_detail_temp', array('id_order_detail' => $id));
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

    public function respon($id_order,$aksi){
        // var_dump($id_order."-".$aksi);
        $query=$this->db->get_where('tb_order',array('md5(id_order)'=>$id_order))->row();
        
        $this->db->trans_begin();
        if($query->status_order!="Approval"){
            //aksi 1= approve
            if($aksi=="1"){
                //update tb_order
                $query_grand_total=$this->db->select('sum((qty*harga)-diskon) as total')
                                            ->from('tb_order_detail')
                                            ->where(array('md5(id_order)'=>$id_order,'status_order'=>"Approval"))
                                            ->group_by('id_order')
                                            ->get()->row();
                $data_order=array(
                    'status_order'=>'Approval',
                    'date_modified'=>date('Y-m-d H:i:s'),
                    'total_bayar'=>$query_grand_total->total,
                    'tgl_approve'=>date('Y-m-d H:i:s'),
                );
                $update_order=$this->db->update('tb_order', $data_order, 
                        array('md5(id_order)' => $id_order));
                //update stok tb_produk
                $query_detail=$this->db ->select('tb_order_detail.*,tb_produk.stok,tb_produk.stok_in_cup')
                                        ->from('tb_order_detail')
                                        ->join('tb_produk','tb_order_detail.id_produk=tb_produk.id_produk')
                                        ->where('md5(id_order)',$id_order)
                                        ->where('status_order','Approval')
                                        ->get()->result();
                foreach($query_detail as $produk){
                    $stokakhir=$produk->stok_in_cup+$produk->qty;

                    $data_produk=array(
                        // 'stok'=>$stokakhir,
                        'stok_in_cup'=>$stokakhir,
                    );
                    $update_produk=$this->db->update('tb_produk', $data_produk, 
                        array('id_produk' => $produk->id_produk));
                    
                    //simpan ke hist produk
                    // $data_hist=array(
                    //     'id_produk'=>$produk->id_produk,
                    //     'ket_hist'=>"Approval Order",
                    //     'tgl_hist'=>date('Y-m-d H:i:s'),
                    //     'no_bukti'=>$query->nomor_faktur,
                    //     'stok_awal'=>$produk->stok,
                    //     'stok_akhir'=>$stokakhir,
                    //     'created_by'=>$this->session->userdata('username'),
                    // );
                    // $simpan_hist=$this->db->insert('tb_hist_produk', $data_hist);
                }
            }
            //aksi 2=reject
            else if($aksi=="2"){
                //update tb_order
                
                $data_order=array(
                    'status_order'=>'Rejected',
                    'date_modified'=>date('Y-m-d H:i:s'),
                    'total_bayar'=>'0',
                    'tgl_approve'=>NULL,
                );
                $update_order=$this->db->update('tb_order', $data_order, 
                        array('md5(id_order)' => $id_order));
            }
            
        }else if($query->status_order=="Approval"){
            if($aksi=="2"){
                //update tb_order
                $data_order=array(
                    'status_order'=>'Rejected',
                    'date_modified'=>date('Y-m-d H:i:s'),
                    'total_bayar'=>'0',
                    'tgl_approve'=>NULL,
                );
                $update_order=$this->db->update('tb_order', $data_order, 
                        array('md5(id_order)' => $id_order));

                //update stok tb_produk
                $query_detail=$this->db ->select('tb_order_detail.*,tb_produk.stok,tb_produk.stok_in_cup')
                                        ->from('tb_order_detail')
                                        ->join('tb_produk','tb_order_detail.id_produk=tb_produk.id_produk')
                                        ->where('md5(id_order)',$id_order)
                                        ->where('status_order','Approval')
                                        ->get()->result();
                foreach($query_detail as $produk){
                    $stokakhir=$produk->stok_in_cup-$produk->qty;
                    $data_produk=array(
                        // 'stok'=>$stokakhir,
                        'stok_in_cup'=>$stokakhir,
                    );
                    $update_produk=$this->db->update('tb_produk', $data_produk, 
                        array('id_produk' => $produk->id_produk));

                    //simpan ke hist produk
                    // $data_hist=array(
                    //     'id_produk'=>$produk->id_produk,
                    //     'ket_hist'=>"Rejected Order",
                    //     'tgl_hist'=>date('Y-m-d H:i:s'),
                    //     'no_bukti'=>$query->nomor_faktur,
                    //     'stok_awal'=>$produk->stok,
                    //     'stok_akhir'=>$stokakhir,
                    //     'created_by'=>$this->session->userdata('username'),
                    // );
                    // $simpan_hist=$this->db->insert('tb_hist_produk', $data_hist);
                }
                
            }
        }
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();
            $return = array(
				'status' => 'failed',
				'text' => '<div class="alert alert-danger">Data gagal diproses</div>'
			);
			echo json_encode($return);
        }else {
            $this->db->trans_commit();
            $return = array(
				'status' => 'success',
				'text' => '<div class="alert alert-success">Data berhasil diproses</div>'
			);
			echo json_encode($return);
        }
    }


}
