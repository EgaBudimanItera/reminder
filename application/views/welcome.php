<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Selamat Datang, <?=$this->session->userdata('nama_lengkap')?></h4>	            
			      </div>
	        </div>
		</div>
      <div class="row">
              
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Pelanggan</h4>
              </div>
              <div class="card-body">
                <?=$outlet->num_rows()?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Produk</h4>
              </div>
              <div class="card-body">
                  <?=$produk->num_rows()?>
              </div>
            </div>
          </div>
        </div>  
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-cart">
              <div class="card-header">
                <h4>Total Penjualan Bulan ini</h4>
              </div>
              <div class="card-body">
                <?=$penjualan->num_rows()?>
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
                <h4>Do Belum Terselesaikan</h4>	            
              </div>
            </div>
            <div class="row">
        <?php
          if(!empty($dobelum)){

          foreach($dobelum->result() as $d){
        ?>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?=$d->nama_pelanggan?></h5>
              <p class="card-text">
                Transaksi Tanggal <?=$d->tgl_do?> dengan Keterangan <?=$d->keterangan?>
              </p>
              <a href="<?=base_url()?>transaksi/delivery" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
        <?php
          }}
        ?>
      </div>
      </div>
      
	  </div>
    <hr>
    <div class="section-body">
      <div class="card">
            <div class="card-wrap">
              <div class="card-header">
                <h4>Pelanggan Akan Jatuh Tempo</h4>	            
              </div>
            </div>
            <div class="row">
        <?php
          if(!empty($penjualan_tagih)){

          foreach($penjualan_tagih->result() as $d){
        ?>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?=$d->nama_pelanggan?></h5>
              <p class="card-text">
                Transaksi Tanggal <?=$d->tgl_invoice?> dan akan jatuh tempo pada <?=$d->next_tagih?>
              </p>
              <a href="<?=base_url()?>transaksi/invoice" class="btn btn-primary">Detail</a>
            </div>
          </div>
        </div>
        <?php
          }}
        ?>
      </div>
      </div>
      
	  </div>
	</section>
</div>
