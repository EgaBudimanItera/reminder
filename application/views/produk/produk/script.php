<script type="text/javascript">
	$(document).ready( function () {

		$(document).on('click', '.btn-tambah', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('tambah');
			$('#password').prop('required', true);
			$('.ket_pass').html();
			$('#form-produk')[0].reset();
		});

		$(document).on('click', '.btn-edit', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('edit');
			$('#password').prop('required', false);
			$('.ket_pass').html('(Isi hanya jika anda ingin mengubah password)');
			var id = $(this).attr('id');
			$('#id_produk').val(id);
			$.ajax({
				url: '<?=base_url()?>produk/produk/get',
				data: 'id='+id,
				type: 'POST',
				dataType: 'JSON',
				success: function(msg){
					$.each( msg, function( key, value ) {
						// alert( key + ": " + value );
						$('#'+key).val(value);
					});
					
				}
			});
		});

	    $(document).on('submit', '#form-produk', function(e){
	    	e.preventDefault();
	    	var data = $('#form-produk').serialize();
			$('.notif').html('Loading...');
			var aksi = $('#aksi').val();
			if(aksi == 'tambah'){
				$.ajax({
					url: '<?=base_url()?>produk/produk/store',
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
					url: '<?=base_url()?>produk/produk/update',
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
			$('#modal-hapus-data-produk').modal();
			
			$(document).on('click', '.ya-hapus', function(e){
				e.preventDefault();
				$('.notif').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>produk/produk/remove',
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