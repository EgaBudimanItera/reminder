<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Laporan DO</h4>
	            
	          </div>
	          <div class="card-body">
                <form action="<?=base_url()?>laporan/delivery/report" target="_blank" role="form" method="post" class="form-horizontal">
                    <!-- <div class="form-group">
                        <label for="">Pelanggan</label>
                        <select name="id_pelanggan" id="id_pelanggan" class="form-control" require>
                            <option value="">--Pilih Pelanggan--</option>
                            <?php
                            foreach ($pelanggan as $p){
                            ?>
                            <option value="<?=$p->id_pelanggan?>"><?=$p->nama_pelanggan?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label for="">Dari Tanggal</label>
                        <input type="date" name="daritanggal" class="form-control" require>
                    </div>
                    <div class="form-group">
                        <label for="">Hingga Tanggal</label>
                        <input type="date" name="hinggatanggal" class="form-control" require>
                    </div>
                    <input type="submit" value="Cetak" class="btn btn-primary"> 
              </form>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>