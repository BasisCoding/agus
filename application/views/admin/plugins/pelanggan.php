
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		
		 // $('#table-pelanggan').scrollbar();

		table = $('#table-pelanggan').DataTable({
			"processing": true, 
            "serverSide": true,
            // "scrollX": true,
            // "fixedColumns": {
            // 	 "leftColumns": 1,
            // 	 "rightColumns": 1
            // },
            "responsive": true,
            // "lengthChange": false,
            "order": [],
            "autoWidth" : true,
             
            "ajax": {
                "url": "<?= base_url('admin/Pelanggan/get_pelanggan')?>",
                "type": "POST"
            },

            "language": {
		        "paginate": {
		            "previous": '<i class="fas fa-angle-left"></i>',
      				"next": '<i class="fas fa-angle-right"></i>'
		        },
		        "aria": {
		            "paginate": {
		                "previous": 'Previous',
		                "next":     'Next'
		            }
		        }
		    },
		});

		function reload_table() {
			table.ajax.reload();
		}

		function actionData(formData, action) {
			$.ajax({
				url: '<?= base_url("admin/Pelanggan/") ?>'+action+'',
				type: 'POST',
				dataType: 'JSON',
				data: formData,
				processData: false,
		        contentType: false,
				success:function (response) {
					$.notify({
	                    icon: 'ni ni-bell-55',
	                    message:response.message
	                },{
	                    type:response.type,
	                    placement: {
	                      from: "top",
	                      align: "right"
	                },
	                    animate: {
	                      enter: 'animated fadeInDown',
	                      exit: 'animated fadeOutUp'
	                 	}
	                });

					if (response.type == 'success') {
						$('#modal-'+action).modal('hide');
	            		$('#form-'+action)[0].reset();
					}

					reload_table();
				}
			});
		}

		$('#form-addPelanggan').submit(function() {
			
			var formData = new FormData();
	            formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
	            formData.append('hp', $('[name="hp"]').val()); 
	            formData.append('alamat', $('[name="alamat"]').val());

        	actionData(formData, 'addPelanggan');
        	return false;
		});

		$('#form-updatePelanggan').submit(function() {
			
			var formData = new FormData();
	            formData.append('id', $('[name="id_update"]').val()); 
	            formData.append('nama_lengkap', $('[name="nama_lengkap_update"]').val()); 
	            formData.append('hp', $('[name="hp_update"]').val()); 
	            formData.append('alamat', $('[name="alamat_update"]').val());

            actionData(formData, 'updatePelanggan');
            return false;
		});

		$('#form-deletePelanggan').submit(function() {
			var formData = new FormData();
	            formData.append('id', $('[name="id_pelanggan_delete"]').val());
			actionData(formData, 'deletePelanggan');
        	return false;
		});

		$('#table-data-pelanggan').on('click', '.update-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');
			var hp = $(this).attr('data-hp');
			var alamat = $(this).attr('data-alamat');
			
			$('[name="id_update"]').val(id);
			$('[name="nama_lengkap_update"]').val(nama);
			$('[name="hp_update"]').val(hp);
			$('[name="alamat_update"]').val(alamat);

			$('#modal-updatePelanggan').modal('show');
		});

		$('#table-data-pelanggan').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');

			$('#pelanggan-delete').html(nama);
			$('[name="id_pelanggan_delete"]').val(id);

			$('#modal-deletePelanggan').modal('show');
		});

		$('#table-data-pelanggan').on('click', '.edit-data', function() {
			var id = $(this).attr('data-id');
			$.ajax({
				url: '<?= base_url("admin/MasterData/getpelangganById") ?>',
				type: 'GET',
				dataType: 'JSON',
				data:{id:id},
				success:function (data) {
					$('[name="id_update"]').val(id);
					$('[name="nama_lengkap_update"]').val(data.nama_lengkap);
					$('[name="username_update"]').val(data.username);
					$('[name="email_update"]').val(data.email);
					$('[name="hp_update"]').val(data.hp);
					$('[name="tempat_lahir_update"]').val(data.tempat_lahir);
					$('[name="tanggal_lahir_update"]').val(data.tanggal_lahir);
					$('[name="alamat_update"]').val(data.alamat);
					$('[name="foto_lama"]').val(data.foto);
					
					if(data.jenis_kelamin == 'L'){
						$('#laki-laki_update').prop('checked', true);
					}else{
						$('#perempuan_update').prop('checked', true)
					}
					
					if (data.foto == null) {
						$('.foto-preview').attr('src', '<?= base_url("assets/assets/img/users/pelanggan/default.png") ?>');
					}else{
						$('.foto-preview').attr('src', '<?= base_url("assets/assets/img/users/pelanggan/") ?>'+data.foto+'');
					}
					
					$('#modal-updatepelanggan').modal('show');
				}
			});
		});

	});
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>

<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>