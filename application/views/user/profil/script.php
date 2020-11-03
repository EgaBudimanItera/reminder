<script type="text/javascript">
	$(document).ready( function () {

		$(document).on('click', '.btn-tambah', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('tambah');
			$('#password').prop('required', true);
			$('.ket_pass').html();
			$('#form-user')[0].reset();
		});

		$(document).on('click', '.btn-edit', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('edit');
			$('#password').prop('required', false);
			$('.ket_pass').html('(Isi hanya jika anda ingin mengubah password)');
			var id = $(this).attr('id');
			$('#id_login').val(id);
			$.ajax({
				url: '<?=base_url()?>user/user/get',
				data: 'id='+id,
				type: 'POST',
				dataType: 'JSON',
				success: function(msg){
					$('#email').val(msg.email);
					$('#username').val(msg.username);
					$('#is_level').val(msg.is_level);
					$('#status').val(msg.is_status);
				}
			});
		});

	    $(document).on('submit', '#form-user', function(e){
	    	e.preventDefault();
	    	var data = $('#form-user').serialize();
			$('.notif').html('Loading...');
			var aksi = $('#aksi').val();
			if(aksi == 'tambah'){
				$.ajax({
					url: '<?=base_url()?>user/user/store',
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
					url: '<?=base_url()?>user/user/update',
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
					url: '<?=base_url()?>user/user/remove',
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