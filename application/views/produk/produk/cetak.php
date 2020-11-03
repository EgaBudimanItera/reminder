<table border="1">
    <thead>
        <tr>
            <td style="width :10px;">No</td>
            <td style="width :100px;">Kode Produk</>
            <td style="width :200px;">Nama Produk</td>
            
            <td style="width :200px;">Barcode</td>
            
            
        </tr>
    </thead>
    <tbody>
        <?php $no=1; foreach($data->result() as $row_data){
            /*$query_stok = $this->db->get_where('view_total_stok', array('id_produk' => $row_data->id_produk))->row();*/
            // $stok = $query_stok->stok_awal + $query_stok->pembelian - $query_stok->penjualan;	
        ?>
        <tr>
            <td><?=$no++?>.</td>
            <td><?=$row_data->kode_produk?></td>
            <td><?=$row_data->nama_produk?></td>
            
            <td>
                <img src="<?=base_url()?>produk/produk/generatebarcode/<?=$row_data->kode_produk?>" alt="">
            </td>
           
            
            
        </tr>
        <?php }?>
    </tbody>
</table>