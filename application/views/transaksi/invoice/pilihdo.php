<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Semua DO</h4>
	            <!-- <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button> -->
				<!-- <a href='<?=base_url()?>transaksi/invoice/tambah' class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a> -->
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
					
						<thead>
							<tr>
								<td>No</td>
								<td>Tanggal</td>
								<td>Nomor DO</td>
								<td>Nomor Plat Mobil</td>
								<td>Tagihan</td>
								
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
						<?php $no=1;foreach($do->result() as $row_riwayat){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_riwayat->tgl_do?></td>
								<td><?=$row_riwayat->nama_pelanggan?></td>
								<td><?=$row_riwayat->nomor_plat?> </td>
								<td>
                                <?=$row_riwayat->subtotal?>
								</td>
								
								<td>
                                    <button class="btn btn-success btn-pilih-do" id="<?=$row_riwayat->id_do?>" data-invoice="<?=$invoice->id_invoice?>"><i class="fa fa-edit"></i> Masukkan Ke Invoice</button>
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
    <section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>DO Dalam Invoice</h4>
	            <!-- <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button> -->
				<!-- <a href='<?=base_url()?>transaksi/invoice/tambah' class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a> -->
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
					
						<thead>
							<tr>
								<td>No</td>
								<td>Tanggal</td>
								<td>Nomor DO</td>
								<td>Nomor Plat Mobil</td>
								<td>Tagihan</td>
								
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
						<?php $no=1;foreach($doterpilih->result() as $row_riwayat){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_riwayat->tgl_do?></td>
								<td><?=$row_riwayat->nama_pelanggan?></td>
								<td><?=$row_riwayat->nomor_plat?> </td>
								<td>
                                <?=$row_riwayat->subtotal?>
								</td>
								
								<td>
                                <button class="btn btn-danger btn-hapus-invoice" id="<?=$row_riwayat->id_do?>" data-invoice="<?=$invoice->id_invoice?>"><i class="fa fa-trash"></i> Hapus Dari Invoice</button>
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


<div class="modal fade" tabindex="-1" role="dialog" id="modal-pilih-do">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data DO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<p>Apakah anda yakin akan memasukkan DO ini dalam Invoice?</p>
			<div class="notif"></div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-primary ya-hapus-pilih-do">Ya</button>
		</div>
    </div>
  </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-pilih-do">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data DO Dalam Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<p>Apakah anda yakin akan menghapus DO dalam Invoice ini?</p>
			<div class="notif"></div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-primary ya-hapus-pilih-do-2">Ya</button>
		</div>
    </div>
  </div>
</div>