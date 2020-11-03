<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Data Satuan</h4>
	            <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button>
	          </div>
	          <div class="card-body">
			  <div class="table-responsive">
	            <table class="table-striped table table-bordered dataTables">
					<thead>
						<tr>
							<td>No</td>
							<td>Nama Satuan</td>
							<td>Keterangan</td>
							<td>Aksi</td>
						</tr>
					</thead>
					<tbody>
						<?php $no=1; foreach($data->result() as $row_data){?>
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$row_data->nama_satuan?></td>
							<td><?=$row_data->keterangan?></td>
							<td>
								<button class="btn btn-info btn-edit" id="<?=$row_data->id_satuan?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-hapus" id="<?=$row_data->id_satuan?>"><i class="fa fa-trash"></i> Hapus</button>
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
        <h5 class="modal-title">Data Satuan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-satuan">
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" name="aksi" id="aksi">
				<input type="hidden" name="id_satuan" id="id_satuan">
				<label for="">Nama Satuan:</label>
				<input type="text" name="nama_satuan" id="nama_satuan" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Keterangan:</label>
				<input type="text" name="keterangan" id="keterangan" class="form-control" required>
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
        <h5 class="modal-title">Data Satuan</h5>
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