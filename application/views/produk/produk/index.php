<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Data Produk</h4>
	            <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button>
				<a href='<?=base_url()?>produk/produk/cetak' class="btn btn-info" target="_blank"> <i class="fa fa-print"></i> Print Barcode</a>
	          </div>
	          <div class="card-body">
			  <div class="table-responsive">
	            <table class="table-striped table table-bordered dataTables">
					<thead>
						<tr>
							<td>No</td>
							<td>Kode Produk</>
							<td>Nama Produk</td>
							<td>Kategori Produk</td>
							<td>Satuan Produk</td>
							<td>Stok Tersedia</td>
							<td>Stok Minimum</td>
							<td>HPP</td>
							<td>Harga Jual</td>
							<td>Barcode</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($data->result() as $row_data){
						?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$row_data->kode_produk?></td>
							<td><?=$row_data->nama_produk?></td>
							<td><?=$row_data->nama_kategori?></td>
							<td><?=$row_data->nama_satuan?></td>
							<td><?=!empty($row_data->stok)? number_format($row_data->stok):'0'?>
							<td><?=$row_data->stok_minimum?></td>
							<td><?=!empty($row_data->hpp)? number_format($row_data->hpp):'0'?>
							<td><?=!empty($row_data->harga_jual)? number_format($row_data->harga_jual):'0'?>
							<td>
								<img src="<?=base_url()?>produk/produk/generatebarcode/<?=$row_data->kode_produk?>" alt="">
							</td>
							<td>
								<button class="btn btn-info btn-edit btn-sm" id="<?=$row_data->id_produk?>"><i class="fa fa-edit"></i> Edit</button>
								<!-- <button class="btn btn-danger btn-hapus btn-sm" id="<?=$row_data->id_produk?>"><i class="fa fa-trash"></i> Hapus</button> -->
								<a href="<?=base_url()?>produk/produk/remove/<?=$row_data->id_produk?>" class="btn btn-danger btn-sm" onclick="return confirm('yakin akan menghapus data ini?')"><i class="fa fa-trash"></i> Hapus</a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
				</div>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-produk">
		<div class="modal-body">
			<div class="form-group">
				<label for="">Kode Produk:</label>
				<input type="text" name="kode_produk" id="kode_produk" class="form-control" value="<?=$kodeProduk?>" readonly required>
			</div>
			<div class="form-group">
				<input type="hidden" name="aksi" id="aksi">
				<input type="hidden" name="id_produk" id="id_produk">

				<label for="">Nama Produk:</label>
				<input type="text" name="nama_produk" id="nama_produk" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Kategori:</label>
				<select name="id_kategori" id="id_kategori" class="form-control" required>
					<option value="">--pilih--</option>
					<?php foreach($ref_kategori->result() as $row_kategori){?>
						<option value="<?=$row_kategori->id_kategori?>"><?=$row_kategori->nama_kategori?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Satuan:</label>
				<select name="id_satuan" id="id_satuan" class="form-control" required>
					<option value="">--pilih--</option>
					<?php foreach($ref_satuan->result() as $row_satuan){?>
						<option value="<?=$row_satuan->id_satuan?>"><?=$row_satuan->nama_satuan?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Harga Jual:</label>
				<input type="number" name="harga_jual" id="harga_jual" class="form-control" required>
			<div>
			<div class="form-group">
				<label for="">Stok Tersedia:</label>
				<input type="number" name="stok" id="stok" class="form-control" required>
			<div>
			<div class="form-group">
				<label for="">Stok Minimum:</label>
				<input type="number" name="stok_minimum" id="stok_minimum" class="form-control" required>
			<div>
			<div class="form-group">
				<label for="">Keterangan:</label>
				<textarea name="keterangan" id="keterangan" class="form-control" required></textarea>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-data-produk">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<p>Apakah anda yakin akan menghapus data ini?</p>
			<div class="notif"></div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-primary ya-hapus">Ya</button>
		</div>
    </div>
  </div>
</div>