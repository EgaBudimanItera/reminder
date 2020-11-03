<script type="text/javascript">
	$(document).ready( function () {

	    $(document).on('submit', '#form-reset-password', function(e){
	    	e.preventDefault();
	    	$('#modal-ganti-password-siswa').modal();
	    	var data = $('#form-reset-password').serialize();
	    	$(document).on('click', '.btn-ya-ganti-password', function(e){
	    		e.preventDefault();
	    		$('.notif').html('Loading...');
		    	$.ajax({
		    		url: '<?=base_url()?>profil_siswa/update_password',
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
	    	
	    });
	});
</script>