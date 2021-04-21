<script type="text/javascript">
	$(document).ready( function () {

		$(document).on('click', '.btn-tambah', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('tambah');
			$('#form-delivery')[0].reset();
		});

        $(document).on('click', '.btn-tambah-detail-muatan', function(e){
			e.preventDefault();
			$('#modal-tambah-data-detail-muatan').modal();
			$('#aksi').val('tambah');
			$('#form-detail-muatan')[0].reset();
		});
		$('#id_muatan').on('change', function() {
			// alert( this.value );
			var id=this.value;
			$.ajax({
				url: '<?=base_url()?>pelanggan/muatan/get',
				data: 'id='+id,
				type: 'POST',
				dataType: 'JSON',
				success: function(msg){
					$('#tarif').val(msg.tarif);
				}
			});
		});
		$(document).on('click', '.btn-edit', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('edit');
			var id = $(this).attr('id');
			$('#id_delivery').val(id);
			$.ajax({
				url: '<?=base_url()?>kendaraan/kendaraan/get',
				data: 'id='+id,
				type: 'POST',
				dataType: 'JSON',
				success: function(msg){
					console.log(msg);
					$.each( msg, function( key, value ) {
						// alert( key + ": " + value );
						$('#'+key).val(value);
					});
				}
			});
		});

	    $(document).on('submit', '#form-delivery', function(e){
	    	e.preventDefault();
	    	var data = $('#form-delivery').serialize();
			$('.notif').html('Loading...');
			var aksi = $('#aksi').val();
			if(aksi == 'tambah'){
				$.ajax({
					url: '<?=base_url()?>transaksi/delivery/store',
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
					url: '<?=base_url()?>transaksi/delivery/update',
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

		$(document).on('submit', '#form-detail-muatan', function(e){
	    	e.preventDefault();
	    	var data = $('#form-detail-muatan').serialize();
			$('.notif').html('Loading...');
			$.ajax({
				url: '<?=base_url()?>transaksi/delivery/storemuatan',
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
	    });

		$(document).on('click', '.btn-hapus', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			$('#modal-hapus-data').modal();
			
			$(document).on('click', '.ya-hapus', function(e){
				e.preventDefault();
				$('.notif').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>transaksi/delivery/remove',
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
		$(document).on('click', '.btn-selesai', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
			$('#modal-selesai-data').modal();
			
			$(document).on('click', '.ya-selesai', function(e){
				e.preventDefault();
				$('.notif').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>transaksi/delivery/selesai',
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
			$('#modal-hapus-data-detail-muatan').modal();
			
			$(document).on('click', '.ya-hapus-detail-muatan', function(e){
				e.preventDefault();
				$('.notif').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>transaksi/delivery/removemuatan',
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