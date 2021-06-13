<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Delivery Order</h4>
	            <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button>
				<!-- <a href='<?=base_url()?>transaksi/delivery/tambah' class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a> -->
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
					
						<thead>
							<tr>
								<td>No</td>
								<td>Tanggal</td>
								<td>Pelanggan</td>
								<td>No DO</td>
								<td>Kendaraan</td>
								
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
						<?php $no=1;foreach($data->result() as $row_riwayat){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_riwayat->tgl_do?></td>
								<td><?=$row_riwayat->nama_pelanggan?></td>
								<td><?=$row_riwayat->no_do?> </td>
								<td>
                                <?=$row_riwayat->nomor_plat?>
								</td>
								
								<td>
                                <a href="<?=base_url()?>transaksi/delivery/detail/<?=$row_riwayat->id_do?>" 
									class="btn btn-outline-danger" id="<?=$row_riwayat->id_do?>">
									<i class="fa fa-eye"></i>Muatan</a>
                                <?php
                                    if($row_riwayat->status_do=="belum"){
                                ?>
                                
								<button class="btn btn-success btn-selesai" id="<?=$row_riwayat->id_do?>"><i class="fa fa-edit"></i> Selesaikan DO</button>
                                
								<?php
                                    }
                                ?>
								<button class="btn btn-danger btn-hapus" id="<?=$row_riwayat->id_do?>"><i class="fa fa-trash"></i> Hapus</button>
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
        <h5 class="modal-title">Data Delivery Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-delivery">
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" name="aksi" id="aksi">
				<input type="hidden" name="id_do" id="id_do">
				<label for="">Nomor DO:</label>
				<input type="text" name="no_do" id="no_do" value="<?="DO-".$no_do ?>" class="form-control" required>
			</div>
            <div class="form-group">
                <label for="">Tanggal:</label>
                <input type="date" name="tgl_do" id="tgl_do" class="form-control" require>
            </div>
			<div class="form-group">
				<label for="">Pelanggan:</label>
				<select name="id_pelanggan" id="id_pelanggan" class="form-control" required>
					<option value="">--pilih--</option>
					<?php foreach($pelanggan->result() as $row_pelanggan){?>
						<option value="<?=$row_pelanggan->id_pelanggan?>"><?=$row_pelanggan->nama_pelanggan?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Kendaraan:</label>
				<select name="id_kendaraan" id="id_kendaraan" class="form-control" required>
					<option value="">--pilih--</option>
					<?php foreach($kendaraan->result() as $row_kendaraan){?>
						<option value="<?=$row_kendaraan->id_kendaraan?>"><?=$row_kendaraan->nomor_plat?></option>
					<?php }?>
				</select>
			</div>
			<div class="form-group">
				<label for="">Keterangan:</label>
				<textarea name="keterangan" id="keterangan" class="form-control" cols="10" rows="3"></textarea>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-selesai-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data kendaraan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<p>Apakah anda yakin akan menyelesaikan data DO ini?</p>
			<div class="notif"></div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-primary ya-selesai">Ya</button>
		</div>
    </div>
  </div>
</div>