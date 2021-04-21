<script type="text/javascript">
	$(document).ready( function () {

		$(document).on('click', '.btn-tambah', function(e){
			e.preventDefault();
			$('#modal-tambah-data').modal();
			$('#aksi').val('tambah');
			$('#form-delivery')[0].reset();
		});

        $(document).on('click', '.btn-bayar', function(e){
			e.preventDefault();
			$('#modal-bayar').modal();
			$('#aksi').val('edit');
			var id = $(this).attr('id');
			$('#id_invoice').val(id);
			
		});
		
        $(document).on('submit', '#form-bayar', function(e){
	    	e.preventDefault();
	    	var data = $('#form-bayar').serialize();
			$('.notif').html('Loading...');
			var aksi = $('#aksi').val();
            $.ajax({
                url: '<?=base_url()?>transaksi/invoice/bayarTagihan',
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

		$(document).on('click', '.btn-pilih-do', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
            var invoice=$(this).attr('data-invoice');
			$('#modal-pilih-do').modal();
			
			$(document).on('click', '.ya-hapus-pilih-do', function(e){
				e.preventDefault();
				$('.notif').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>transaksi/invoice/pilihDoKeInvoice',
					data: 'id='+id+"&id_invoice="+invoice,
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

        $(document).on('click', '.btn-hapus-invoice', function(e){
			e.preventDefault();
			var id = $(this).attr('id');
            var invoice=$(this).attr('data-invoice');
			$('#modal-hapus-pilih-do').modal();
			
			$(document).on('click', '.ya-hapus-pilih-do-2', function(e){
				e.preventDefault();
				$('.notif').html('Loading...');
				$.ajax({
					url: '<?=base_url()?>transaksi/invoice/hapusPilihDoKeInvoice',
					data: 'id='+id+"&id_invoice="+invoice,
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