<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Print Barcode</h4>
	          </div>
	          <div class="card-body">
              <!-- <?=var_dump($link)?> -->
                <form action="<?=base_url()?>produk/produk/cetak" target="_blank" role="form" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="">Kategori Produk</label>
                        <select name="id_kategori" id="id_kategori" class="form-control" require>
                            <option value="">--pilih--</option>
                            <?php foreach($ref_kategori->result() as $row_outlet){?>
                                <option value="<?=$row_outlet->id_kategori?>"><?=$row_outlet->nama_kategori?></option>
                            <?php }?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cetak Barcode</button>
                </form>
			  </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>
