<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Order Penjualan</h4>
	            <!-- <button class="btn btn-success btn-tambah"> <i class="fa fa-plus"></i> Tambah</button> -->
				<a href='<?=base_url()?>order/order/tambah' class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a>
	          </div>
	          <div class="card-body">
			  	<div class="table-responsive">
					<table class="table-striped table table-bordered dataTables">
					
						<thead>
							<tr>
								<td>No</td>
								<td>Tanggal</td>
								<td>Pelanggan</td>
								<td>No Faktur</td>
								<td>Status Faktur</td>
								<td>Next Penagihan</td>
								<td>Aksi</td>
							</tr>
						</thead>
						<tbody>
						<?php $no=1;foreach($data->result() as $row_riwayat){?>
							<tr>
								<td><?=$no++?>.</td>
								<td><?=$row_riwayat->tgl_faktur?></td>
								<td><?=$row_riwayat->nama_pelanggan?></td>
								<td><?=$row_riwayat->nomor_faktur?> </td>
								<td>
									<?php
										if($row_riwayat->akumulasi_bayar==$row_riwayat->total_bayar){
											echo "Lunas";
										}
										else{
											echo "Belum Lunas";
										}
									?>
								</td>
								<td><?=$row_riwayat->next_tagih?> </td>
								<td>

									<a href="<?=base_url()?>order/order/detail/<?=$row_riwayat->id_order?>" 
									class="btn btn-outline-danger" id="<?=$row_riwayat->id_order?>">
									<i class="fa fa-eye"></i> Detail</a>
									<a href="<?=base_url()?>order/order/detailbayar/<?=$row_riwayat->id_order?>" class="btn btn-outline-success">
									<i class="fa fa-cart"></i> Bayar
									</a>
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
