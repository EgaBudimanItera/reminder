<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="card">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Detail Order Produk</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            Nama Pelanggan : <?=$pelanggan?>
                        </div>
                        <div>
                            Tagihan Selanjutnya : <?=$next?>
                        </div>
                        <div>
                            Total Bayar : <?=$akumulasi?>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table-striped table table-bordered dataTables">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Kode Produk</td>
                                    <td>Nama Produk</td>
                                    <td>Qty</td>
                                    
                                    <td>Harga</td>
                                    <td>Subtotal</td>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal=0;$no=1;
                                foreach($data->result() as $row_riwayat){
                                ?>
                                <tr>
                                    <td><?=$no++?>.</td>
                                    <td><?=$row_riwayat->kode_produk?></td>
                                    
                                    <td><?=$row_riwayat->nama_produk?></td>
                                    <td><?=$row_riwayat->qty?></td>
                                    
                                    <td><?=number_format($row_riwayat->harga)?> 
                                    <td><?=number_format($row_riwayat->harga*$row_riwayat->qty)?></td>
                                    
                                </tr>
                                <?php
                                }?>
                                
                                
                            </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>