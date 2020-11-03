<script type="text/javascript">
	$(document).ready( function () {

		$(document).on('click', '.btn-tambah', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('tambah');
			$('#form-kendaraan')[0].reset();
		});

		$(document).on('click', '.btn-edit', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('edit');
			var id = $(this).attr('id');
			$('#id_kendaraan').val(id);
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

	    $(document).on('submit', '#form-kendaraan', function(e){
	    	e.preventDefault();
	    	var data = $('#form-kendaraan').serialize();
			$('.notif').html('Loading...');
			var aksi = $('#aksi').val();
			if(aksi == 'tambah'){
				$.ajax({
					url: '<?=base_url()?>kendaraan/kendaraan/store',
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
					url: '<?=base_url()?>kendaraan/kendaraan/update',
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
					url: '<?=base_url()?>kendaraan/kendaraan/remove',
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