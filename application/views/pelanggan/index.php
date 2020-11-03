<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Data Pelanggan</h4>
	            <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button>
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
						<thead>
							<tr>
								<td>No</td>
								<td>Kode</td>
								<td>Nama pelanggan</td>
								<td>Alamat</td>
								<td>No Telp</td>
								
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;foreach($data->result() as $row_data){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_data->kode_pelanggan?></td>
								<td><?=$row_data->nama_pelanggan?></td>
								<td><?=$row_data->alamat_pelanggan?></td>
								<td><?=$row_data->no_telp?></td>
								
								<td>
									<button class="btn btn-info btn-edit" id="<?=$row_data->id_pelanggan?>"><i class="fa fa-edit"></i> Edit</button>
									<!-- <a href="<?=base_url()?>pelanggan/pelanggan/detail/<?=$row_data->id_pelanggan?>" class="btn btn-warning" id="<?=$row_data->id_pelanggan?>"><i class="fa fa-eye"></i> Detail</a> -->
									<button class="btn btn-danger btn-hapus" id="<?=$row_data->id_pelanggan?>"><i class="fa fa-trash"></i> Hapus</button>
									
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
        <h5 class="modal-title">Data pelanggan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-pelanggan">
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" name="aksi" id="aksi">
				<input type="hidden" name="id_pelanggan" id="id_pelanggan">
				<label for="">Kode pelanggan:</label>
				<input type="text" name="kode_pelanggan" id="kode_pelanggan" value="<?=$kode_pelanggan;?>" class="form-control" readonly required>
			</div>
			<div class="form-group">
				<label for="">Nama pelanggan:</label>
				<input type="text" name="nama_pelanggan" id="nama_pelanggan" class="form-control" required>
			</div>
			
			<div class="form-group">
				<label for="">No Telp:</label>
				<input type="number" name="no_telp" id="no_telp" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Alamat pelanggan:</label>
				<textarea name="alamat_pelanggan" id="alamat_pelanggan" class="form-control" required></textarea>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data pelanggan</h5>
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