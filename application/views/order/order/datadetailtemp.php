<div class="table-responsive">
    <table class="table-striped table table-bordered">
       
        <thead>
            <tr>
                <td>No</td>
                <td>Kode Produk</td>
                <td>Nama Produk</td>
                <td>Qty</td>
                <td>Harga</td>
                <td>Subtotal</td>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
        <?php $no=1;$subtotal=0;foreach($data->result() as $row_riwayat){?>
            <tr>
                <td><?=$no++?>.</td>
                <td><?=$row_riwayat->kode_produk?></td>
                
                <td><?=$row_riwayat->nama_produk?></td>
                <td><?=$row_riwayat->qty?></td>
               
                <td><?=number_format($row_riwayat->harga)?> 
                <td><?=number_format(($row_riwayat->harga*$row_riwayat->qty)-$row_riwayat->diskon)?>
                <td>
                    <a href="#" class="btn btn-danger" onclick="if(confirm('Apakah anda yakin?')) hapustemp('<?=$row_riwayat->id_order_detail?>');">
                        <i class="fa fa-trash"></i>
                    </a> 
                </td>
                
            </tr>
            
            <?php 
                $subtotal+=($row_riwayat->harga*$row_riwayat->qty)-$row_riwayat->diskon;
            }
            
            ?>
        <tr>
            <td colspan="6">Total</td>
            <td colspan="2"><?=number_format($subtotal)?><input type="hidden" id="total" value="<?=$subtotal?>"></td>
        </tr>
        
        <tr>
            <td colspan="6">Grand Total</td>
            <td colspan="2">
               <label for="grandtotal" id="grandtotal">0</label>
            </td>
        </tr>
        </tbody>
    </table> 
</div>
