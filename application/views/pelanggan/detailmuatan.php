<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Data Muatan Pelanggan</h4>
	            <button class="btn btn-success btn-tambah-muatan"> <i class="fa fa-plus"></i> Tambah</button>
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
						<thead>
							<tr>
								<td>No</td>
								<td>Dari</td>
								<td>Tujuan</td>
								<td>Muatan</td>
								<td>Tarif</td>
								<td>Satuan</td>
                                <td>Keterangan</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
							<?php $no=1;foreach($data->result() as $row_data){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_data->dari?></td>
								<td><?=$row_data->tujuan?></td>
								<td><?=$row_data->muatan?></td>
								<td><?=$row_data->tarif?></td>
								<td><?=$row_data->nama_satuan?></td>
                                <td><?=$row_data->keterangan?></td>
								<td>
									<button class="btn btn-info btn-edit-muatan" id="<?=$row_data->id_muatan?>"><i class="fa fa-edit"></i> Edit</button>
									<!-- <a href="<?=base_url()?>pelanggan/pelanggan/detailmuatan/<?=$row_data->id_muatan?>" class="btn btn-warning" id="<?=$row_data->id_muatan?>"><i class="fa fa-eye"></i> Muatan</a> -->
									<button class="btn btn-danger btn-hapus-muatan" id="<?=$row_data->id_muatan?>"><i class="fa fa-trash"></i> Hapus</button>
									
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-data-muatan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Muatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-muatan">
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" name="aksi" id="aksi">
				<input type="hidden" name="id_muatan" id="id_muatan">
                <input type="hidden" name="id_pelanggan" id="id_pelanggan" value="<?=$pelanggan?>">
				<label for="">Dari:</label>
				<input type="text" name="dari" id="dari" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Tujuan:</label>
				<input type="text" name="tujuan" id="tujuan" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Nama Muatan:</label>
				<input type="text" name="muatan" id="muatan" class="form-control" required>
			</div>
            <div class="form-group">
				<label for="">Satuan:</label>
				<select name="id_satuan" id="id_satuan" class="form-control" required>
                <option value="">--Pilih Satuan--</option>
                <?php
                    foreach($satuan->result() as $s){
                ?>
                <option value="<?=$s->id_satuan?>"><?=$s->nama_satuan?></option>
                <?php
                    }
                
                ?>
                </select>
                
			</div>
			<div class="form-group">
				<label for="">Tarif:</label>
				<input type="number" name="tarif" id="tarif" class="form-control" required>
			</div>
			<div class="form-group">
				<label for="">Keterangan:</label>
				<textarea name="keterangan" id="keterangan" class="form-control"></textarea>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-data-muatan">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Muatan</h5>
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
			<button type="button" class="btn btn-primary ya-hapus-muatan">Ya</button>
		</div>
    </div>
  </div>
</div>