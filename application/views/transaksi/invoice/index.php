<!-- Main Content -->

<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Invoice</h4>
	            <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button>
				<!-- <a href='<?=base_url()?>transaksi/invoice/tambah' class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a> -->
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
					
						<thead>
							<tr>
								<td>No</td>
								<td>Tanggal</td>
								<td>Pelanggan</td>
								<td>No Invoice</td>
                                <td>Total Tagihan</td>
								<td>Akumulasi Bayar</td>
								<td>Tagihan Selanjutnya</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
						<?php $no=1;foreach($data->result() as $row_riwayat){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_riwayat->tgl_invoice?></td>
								<td><?=$row_riwayat->nama_pelanggan?></td>
								<td><?=$row_riwayat->nomor_invoice?> </td>
                                <td><?=$row_riwayat->total_bayar?></td>
                                <!-- <td></td> -->
								<td>
                                <?=$row_riwayat->akumulasi_bayar?>
								</td>
								<td>
                                <?=$row_riwayat->next_tagih?>
								</td>
								<td>
                                    <a href="<?=base_url()?>transaksi/invoice/pilihdo/<?=$row_riwayat->id_invoice?>" 
									class="btn btn-outline-danger" id="<?=$row_riwayat->id_invoice?>">
									<i class="fa fa-eye"></i> Pilih DO</a>
                                    <button class="btn btn-outline-success btn-bayar" id="<?=$row_riwayat->id_invoice?>"><i class="fa fa-money"></i> Bayar Tagihan</button>
									<a href="<?=base_url()?>transaksi/invoice/cetakInvoice/<?=$row_riwayat->id_invoice?>" 
									class="btn btn-outline-warning" target="_blank">
									<i class="fa fa-print"></i> Cetak Invoice</a>
									<button class="btn btn-danger btn-hapus-all" id="<?=$row_riwayat->id_invoice?>"><i class="fa fa-trash"></i> Hapus</button>
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


<div class="modal fade" tabindex="-1" role="dialog" id="modal-bayar">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-bayar">
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" name="aksi" id="aksi">
				<input type="hidden" name="id_invoice" id="id_invoice">
				<label for="">Jumlah Bayar:</label>
				<input type="number" name="jumlahbayar" id="jumlahbayar"  class="form-control" required>
			</div>
            
            <div class="form-group">
                <label for="">Tanggal Jatuh Tempo Berikutnya:</label>
                <input type="date" name="next_tagih" id="next_tagih" class="form-control" require>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-tambah-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Data Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-invoice">
		<div class="modal-body">
			<div class="form-group">
				<input type="hidden" name="aksi2" id="aksi2">
				<input type="hidden" name="id_invoice2" id="id_invoice2">
				<label for="">No Invoice:</label>
				<input type="text" name="nomor_invoice2" id="nomor_invoice2" value="<?=$nomor_invoice?>" class="form-control" required>
			</div>
            
            <div class="form-group">
                <label for="">Tanggal Invoice:</label>
                <input type="date" name="tgl_invoice2" id="tgl_invoice2" class="form-control" require>
            </div>

			<div class="form-group">
                <label for="">Pelanggan:</label>
                <select name="id_pelanggan2" id="id_pelanggan2" class="form-control">
					<option value="">--Pilih Pelanggan--</option>
					<?php
						foreach($pelanggan->result() as $p){
					?>
					<option value="<?=$p->id_pelanggan?>"><?=$p->nama_pelanggan?></option>
					<?php
						}
					?>
				</select>
            </div>
			<div class="form-group">
                <label for="">Tanggal Jatuh Tempo :</label>
                <input type="date" name="next_tagih2" id="next_tagih2" class="form-control" require>
            </div>
			<div class="form-group">
                <label for="">Keterangan:</label>
                <textarea name="keterangan2" id="keterangan2"  rows="10" class="form-control"></textarea>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-hapus-all">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"> Invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
		<div class="modal-body">
			<p>Apakah anda yakin akan menghapus Invoice ini?</p>
			<div class="notif"></div>
		</div>
		<div class="modal-footer bg-whitesmoke br">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
			<button type="button" class="btn btn-primary ya-hapus-all">Ya</button>
		</div>
    </div>
  </div>
</div>