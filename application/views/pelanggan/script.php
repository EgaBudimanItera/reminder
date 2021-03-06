<script type="text/javascript">
	$(document).ready( function () {

		$(document).on('click', '.btn-tambah', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('tambah');
			$('#password').prop('required', true);
			$('.ket_pass').html();
			$('#form-pelanggan')[0].reset();
		});

		$(document).on('click', '.btn-tambah-muatan', function(e){
			e.preventDefault();
			$('#modal-tambah-data-muatan').modal();
			$('#aksi').val('tambah');
			$('#form-muatan')[0].reset();
		});

		$(document).on('click', '.btn-edit', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('edit');
			$('#password').prop('required', false);
			$('.ket_pass').html('(Isi hanya jika anda ingin mengubah password)');
			var id = $(this).attr('id');
			$('#id_pelanggan').val(id);
			$.ajax({
				url: '<?=base_url()?>pelanggan/pelanggan/get',
				data: 'id='+id,
				type: 'POST',
				dataType: 'JSON',
				success: function(msg){
					$('#kode_pelanggan').val(msg.kode_pelanggan);
					$('#nama_pelanggan').val(msg.nama_pelanggan);
					$('#alamat_pelanggan').val(msg.alamat_pelanggan);
					$('#no_telp').val(msg.no_telp);	
				}
			});
		});

		$(document).on('click', '.btn-edit-muatan', function(e){
			e.preventDefault();
			$('#modal-tambah-data-muatan').modal();
			$('#aksi').val('edit');
			
			var id = $(this).attr('id');
			$('#id_muatan').val(id);
			$.ajax({
				url: '<?=base_url()?>pelanggan/muatan/get',
				data: 'id='+id,
				type: 'POST',
				dataType: 'JSON',
				success: function(msg){
					// $('#dari').val(msg.dari);
					// $('#tujuan').val(msg.tujuan);
					// $('#muatan').val(msg.muatan);
					// $('#tarif').val(msg.tarif);	
					// $('#keterangan').val(msg.keterangan);	
					// $('id_satuan').val(msg.id_satuan);
					$.each( msg, function( key, value ) {
						// alert( key + ": " + value );
						$('#'+key).val(value);
					});
				}
			});
		});

	    $(document).on('submit', '#form-pelanggan', function(e){
	    	e.preventDefault();
	    	var data = $('#form-pelanggan').serialize();
			$('.notif').html('Loading...');
			var aksi = $('#aksi').val();
			if(aksi == 'tambah'){
				$.ajax({
					url: '<?=base_url()?>pelanggan/pelanggan/store',
					data: data,
					type: 'POST',
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'success'){
							$('.notif').html(msg.text);
							location.reload();
						}else{
							$('.notif').html(msg.text);
						}
					}
				});
			}else if(aksi == 'edit'){
				$.ajax({
					url: '<?=base_url()?>pelanggan/pelanggan/update',
					data: data,
					type: 'POST',
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'success'){
							$('.notif').html(msg.text);
							location.reload();
						}else{
							$('.notif').html(msg.text);
						}
					}
				});
			}
			
	    });
		$(document).on('submit', '#form-muatan', function(e){
	    	e.preventDefault();
	    	var data = $('#form-muatan').serialize();
			$('.notif').html('Loading...');
			var aksi = $('#aksi').val();
			if(aksi == 'tambah'){
				$.ajax({
					url: '<?=base_url()?>pelanggan/muatan/store',
					data: data,
					type: 'POST',
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'success'){
							$('.notif').html(msg.text);
							location.reload();
						}else{
							$('.notif').html(msg.text);
						}
					}
				});
			}else if(aksi == 'edit'){
				$.ajax({
					url: '<?=base_url()?>pelanggan/muatan/update',
					data: data,
					type: 'POST',
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'success'){
							$('.notif').html(msg.text);
							location.reload();
						}else{
							$('.notif').html(msg.text);
						}
					}
				});
			}
			
	    });

		$(document).on('click', '.btn-hapus', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			$('#modal-hapus-data').modal();
			
			$(document).on('click', '.ya-hapus', function(e){
				e.preventDefault();
				$('.notif').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>pelanggan/pelanggan/remove',
					data: 'id='+id,
					type: 'POST',
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'success'){
							$('.notif').html(msg.text);
							location.reload();
						}else{
							$('.notif').html(msg.text);
						}
					}
				});
			});
		});

		$(document).on('click', '.btn-hapus-muatan', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			$('#modal-hapus-data-muatan').modal();
			
			$(document).on('click', '.ya-hapus-muatan', function(e){
				e.preventDefault();
				$('.notif').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>pelanggan/muatan/remove',
					data: 'id='+id,
					type: 'POST',
					dataType: 'JSON',
					success: function(msg){
						if(msg.status == 'success'){
							$('.notif').html(msg.text);
							location.reload();
						}else{
							$('.notif').html(msg.text);
						}
					}
				});
			});
		});
	});
</script>