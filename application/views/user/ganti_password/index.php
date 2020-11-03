<!-- Main Content -->
<div class="main-content">
	<section class="section">
	  <div class="section-body">
	  	<div class="card">
	        <div class="card-wrap">
	          <div class="card-header">
	            <h4>Ganti Password</h4>
	            
	          </div>
	          <div class="card-body">
	            <form id="form-reset-password">
	            	<div class="form-group">
	            		<label>Username:</label>
	            		<input type="text" name="username" value="<?=$data->row()->username?>" readonly required class="form-control"/>
	            	</div>
	            	<div class="form-group">
	            		<label>Password:</label>
	            		<input type="password" name="password" required class="form-control"/>
	            	</div>
	            	<div class="form-group">
	            		<label>Konfirmasi Password:</label>
	            		<input type="password" name="confirm_password" required class="form-control"/>
	            	</div>
	            	<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
	            </form>
	          </div>
	        </div>
	    </div>
	  </div>
	</section>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal-ganti-password-siswa">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ganti Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-tambah-kategori">
	      <div class="modal-body">
	        	<p>Apakah anda yakin akan mengganti password?</p>
	        	<div class="notif"></div>
	      </div>
	      <div class="modal-footer bg-whitesmoke br">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
	        <button type="submit" class="btn btn-primary btn-ya-ganti-password">Ya</button>
	      </div>
      </form>
    </div>
  </div>
</div>