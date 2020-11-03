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
                            Akumulasi Bayar : <?=$akumulasi?>
                        </div>
                        <div>
                            Total Bayar : <?=$total?>
                        </div>
                    </div>
                    <div class="card-body">
                    <form action="<?=base_url()?>order/order/updatetagih"  role="form" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label for="">Next Tagih</label>
                            <input type="date" name="next_tagih" class="form-control" require>
                            <input type="hidden" name="id_order" value=<?=$id_order?> class="form-control" require>
                            <input type="hidden" name="akumulasi" value=<?=$akumulasi?> class="form-control" require>
                            <input type="hidden" name="total" value=<?=$total?> class="form-control" require>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Bayar</label>
                            <input type="text" name="jumlahbayar" class="form-control" require>
                        </div>
                        <input type="submit" value="Bayar" class="btn btn-primary"> 
                </form>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
</div>