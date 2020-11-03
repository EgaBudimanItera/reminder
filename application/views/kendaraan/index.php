<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Data Kendaraan</h4>
	            <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button>
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
						<thead>
							<tr>
								<td>No</td>
								<td>Nama Kendaraan</td>
								<td>Nama Driver</td>
								<td>Tahun</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;foreach($data->result() as $row_data){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_data->merk_kendaraan?></td>
								<td><?=$row_data->nama_driver?></td>
								<td><?=$row_data->tahun?></td>
								<td>
									<button class="btn btn-info btn-edit" id="<?=$row_data->id_kendaraan?>"><i class="fa fa-edit"></i> Edit</button>
									<!-- <a href="<?=base_url()?>kendaraan/kendaraan/detail/<?=$row_data->id_kendaraan?>" class="btn btn-warning" id="<?=$row_data->id_kendaraan?>"><i class="fa fa-eye"></i> Detail</a> -->
									<button class="btn btn-danger btn-hapus" id="<?=$row_data->id_kendaraan?>"><i class="fa fa-trash"></i> Hapus</button>
									
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
        <h5 class="modal-title">Data kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-kendaraan">
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" name="aksi" id="aksi">
				<input type="hidden" name="id_kendaraan" id="id_kendaraan">
				<label for="">Merk kendaraan:</label>
				<input type="text" name="merk_kendaraan" id="merk_kendaraan" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Driver:</label>
				<select name="id_driver" id="id_driver" class="form-control" required>
					<option value="">--pilih--</option>
					<?php foreach($ref_driver->result() as $row_driver){?>
						<option value="<?=$row_driver->id_driver?>"><?=$row_driver->nama_driver?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Tahun Kendaraan:</label>
				<input type="number" name="tahun" id="tahun" class="form-control" required>
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
        <h5 class="modal-title">Data kendaraan</h5>
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