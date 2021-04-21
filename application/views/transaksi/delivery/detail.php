<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Muatan Delivery Order</h4>
				<?php
					if($do->row()->status_do=="belum"){
				?>
				<button class="btn btn-success btn-tambah-detail-muatan"> <i class="fa fa-plus"></i> Tambah</button>
				<?php
					}
				?>
	            
				<!-- <a href='<?=base_url()?>transaksi/delivery/tambah' class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a> -->
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
					
						<thead>
							<tr>
								<td>No</td>
								<td>Muatan</td>
								<td>Dari</td>
								<td>Tujuan</td>
								<td>Tarif</td>
								<td>Jumlah</td>
                                <td>Subtotal</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
						<?php $no=1;foreach($data->result() as $row_riwayat){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_riwayat->muatan?></td>
								<td><?=$row_riwayat->dari?></td>
								<td><?=$row_riwayat->tujuan?> </td>
								<td>
                                	<?=$row_riwayat->tarif?>
								</td>
								<td>
                                	<?=$row_riwayat->jumlah?>
								</td>
                                <td>
                                	<?=$row_riwayat->tarif*$row_riwayat->jumlah?>
								</td>
								<td>
								<?php
									if($do->row()->status_do=="belum"){
								?>
									<button class="btn btn-danger btn-hapus-muatan" id="<?=$row_riwayat->id_det_do?>"><i class="fa fa-trash"></i> Hapus</button>
                                <?php
									}
								?>
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


<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-data-detail-muatan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Muatan Delivery Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-detail-muatan">
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" name="aksi" id="aksi">
				<input type="hidden" name="id_do" id="id_do" value="<?=$id_do?>">
				<label for="">Muatan:</label>
				<select name="id_muatan" id="id_muatan" class="form-control" required >
					<option value="">--pilih--</option>
					<?php foreach($muatan->result() as $row_pelanggan){?>
						<option value="<?=$row_pelanggan->id_muatan?>"><?=$row_pelanggan->muatan." Dari : ".$row_pelanggan->dari. " Ke : ".$row_pelanggan->tujuan?></option>
					<?php }?>
				</select>
			</div>
           
			<div class="form-group">
				<label for="">Tarif:</label>
				<input type="number" name="tarif" id="tarif" class="form-control" require>
			</div>

            <div class="form-group">
				<label for="">Jumlah:</label>
				<input type="number" name="jumlah" id="jumlah" class="form-control" require>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-data-detail-muatan">
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
			<button type="button" class="btn btn-primary ya-hapus-detail-muatan">Ya</button>
		</div>
    </div>
  </div>
</div>