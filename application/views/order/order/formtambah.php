<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Tambah Penjualan</h4>
	            
	          </div>
	          <div class="card-body">
                <form action="<?=base_url()?>order/order/addneworder" role="form" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label for="">Pelanggan</label>
                        <select name="id_pelanggan" id="id_pelanggan" class="form-control" require>
                            <option value="">--pilih--</option>
                            <?php foreach($pelanggan->result() as $row_pelanggan){?>
                                <option value="<?=$row_pelanggan->id_pelanggan?>"><?=$row_pelanggan->nama_pelanggan?></option>
                            <?php }?>
                        </select>
                    </div>
                   
                    <button class="btn btn-success btn-tambah-produk float-right"> <i class="fa fa-plus"></i> Tambah Produk</button>
                    <div id="tampilpenjualan">

                    </div>
                    
                    <!-- <button type="submit" class="btn btn-primary">Simpan Order</button> -->
                </form>
                <button class="btn btn-success" onclick="simpanorder()">Simpan Order</button>
			  </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-add-produk">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-add-produk">
		<div class="modal-body">
			<div class="form-group">
          <label for="">Produk</label>
          <select name="id_produk" id="id_produk" class="form-control" >
              <option value="">--pilih--</option>
              <?php foreach($produk->result() as $row_produk){?>
                  <option value="<?=$row_produk->id_produk?>"><?=$row_produk->nama_produk?></option>
              <?php }?>
          </select>
      </div>
			<div class="form-group">
          <label for="">Qty</label>
          <input type="number" name="qty" id="qty" class="form-control" required>
      </div>
          
			<div class="notif"></div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
			<button type="submit" class="btn btn-primary">Simpan</button>
		</div>
		</form>
    </div>
  </div>
</div>