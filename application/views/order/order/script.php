<style>
    .bigdrop {
        width: 300px !important;
    }
</style>
<script type="text/javascript">
    function loadTable() {
        $('#tampilpenjualan').load('<?=base_url()?>order/order/tabeldetailtemp',function(){});
        loadgrandtotal();
    };

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function loadgrandtotal(){
        $.ajax({
            url: "<?=base_url()?>order/order/grandtotal/",
            type: 'GET',
            dataType: 'JSON',
            success: function(msg)
            {
                console.log(msg);
                document.getElementById('grandtotal').innerHTML = numberWithCommas(msg.nilai);
            }
        });

    }

    function simpanorder(){
       
        var g = document.getElementById("id_pelanggan");
        var id_pelanggan = g.options[g.selectedIndex].value;
        $.ajax({
            // data:  {'diskontipetotal':diskontipetotal,'diskonakhir':f,
            //         'id_pelanggan':id_pelanggan,'status_bayar':status_bayar,'total':total},
            url: "<?=base_url()?>order/order/addneworder/"+id_pelanggan,
            type: 'GET',
            dataType: 'JSON',
            success: function(msg)
            {
                if(msg.status == 'success'){
                    alert("Order Berhasil Disimpan");
                    location.reload();
                }else{
                    alert("Order Gagal Disimpan");
                    location.reload();
                }
            }
        });
    };
    function hapustemp(id) {
        $.ajax({
            url: "<?=base_url()?>order/order/hapustemp/"+id,
            type: "GET",
            dataType: 'JSON',
            success: function(msg) {
                if(msg.status == 'success'){
                    loadTable();                    
                }else if(msg.status == 'fail'){
                   loadTable();
                   alert('gagal hapus data');
                }
            }
        })
    } ; 
    $(document).ready( function () {
        loadTable();
		$(document).on('click', '.btn-edit-detail', function(e){
            e.preventDefault();
            $('#modal-tambah-data').modal();
			var id = $(this).attr('id');
			$('#id_produk').val(id);
			$.ajax({
				url: '<?=base_url()?>order/order/get',
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

        $(document).on('click', '.btn-tambah-produk', function(e){
			e.preventDefault();
			$('#modal-add-produk').modal();
			$('#aksi').val('tambah');
			
			$('#form-add-produk')[0].reset();
		});


        $(document).on('click', '.btn-approve', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            $('#modal-hapus-data').modal();


            $(document).on('click', '.ya-hapus', function(e){
                e.preventDefault();
                $.ajax({
                    url: '<?=base_url()?>order/order/respon/'+id+'/1',
                    // data: 'id_order='+id,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(msg){
                        if(msg.status == 'success'){
                            $('.notif_order').html(msg.text);
                            location.reload();
                        }else{
                            $('.notif_order').html(msg.text);
                        }
                    }
                });
            });
        });
        
        $(document).on('click', '.btn-reject', function(e){
            e.preventDefault();
            var id = $(this).attr('id');
            $('#modal-Reject-data').modal();

            
            $(document).on('click', '.ya-reject', function(e){
                e.preventDefault();
                $.ajax({
                    url: '<?=base_url()?>order/order/respon/'+id+'/2',
                    // data: 'id_order='+id,
                    type: 'POST',
                    dataType: 'JSON',
                    success: function(msg){
                        if(msg.status == 'success'){
                            $('.notif_order').html(msg.text);
                            location.reload();
                        }else{
                            $('.notif_order').html(msg.text);
                        }
                    }
                });
            });
		});

        $(document).on('submit', '#form-detail-order', function(e){
	    	e.preventDefault();
	    	var data = $('#form-detail-order').serialize();
			$('.notif').html('Loading...');
			$.ajax({
                url: '<?=base_url()?>order/order/store',
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


        $(document).on('submit', '#form-add-produk', function(e){
	    	e.preventDefault();
	    	var data = $('#form-add-produk').serialize();
            console.log(data);
			$('.notif').html('Loading...');
			$.ajax({
                url: '<?=base_url()?>order/order/storeproduk',
                data: data,
                type: 'POST',
                dataType: 'JSON',
                success: function(msg){
                    if(msg.status == 'success'){
                        $('.notif').html(msg.text);
                        loadTable();
                        $('#modal-add-produk').modal('hide');
                    }else{
                        $('.notif').html(msg.text);
                        $('#modal-add-produk').modal('hide');
                    }
                }
			});
	    });
		
	});
</script>