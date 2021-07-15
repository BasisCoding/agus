
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		
		 // $('#table-Kurir').scrollbar();

		table = $('#table-kurir').DataTable({
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
                "url": "<?= base_url('admin/Kurir/get_kurir')?>",
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
				url: '<?= base_url("admin/Kurir/") ?>'+action+'',
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

		$('#form-addKurir').submit(function() {
			
			var formData = new FormData();
	            formData.append('nama_lengkap', $('[name="nama_lengkap"]').val()); 
	            formData.append('hp', $('[name="hp"]').val()); 
	            formData.append('alamat', $('[name="alamat"]').val());
	            formData.append('username', $('[name="username"]').val());
	            formData.append('password', $('[name="password"]').val());
	            formData.append('foto', $('[name="foto"]')[0].files[0]);

        	actionData(formData, 'addKurir');
        	return false;
		});

		$('#form-updateKurir').submit(function() {
			
			var formData = new FormData();
	            formData.append('id', $('[name="id_update"]').val()); 
	            formData.append('nama_lengkap', $('[name="nama_lengkap_update"]').val()); 
	            formData.append('hp', $('[name="hp_update"]').val()); 
	            formData.append('alamat', $('[name="alamat_update"]').val());
	            formData.append('username', $('[name="username_update"]').val());
	            formData.append('foto_lama', $('[name="foto_lama"]').val());
	            formData.append('foto', $('[name="foto_update"]')[0].files[0]);

            actionData(formData, 'updateKurir');
            return false;
		});

		$('#form-deleteKurir').submit(function() {
			var formData = new FormData();
	            formData.append('id', $('[name="id_kurir_delete"]').val());
	            formData.append('foto', $('[name="foto_delete"]').val());
			actionData(formData, 'deleteKurir');
        	return false;
		});

		$('#table-data-kurir').on('click', '.update-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');
			var hp = $(this).attr('data-hp');
			var alamat = $(this).attr('data-alamat');
			var username = $(this).attr('data-username');
			var foto = $(this).attr('data-foto');
			
			$('[name="id_update"]').val(id);
			$('[name="nama_lengkap_update"]').val(nama);
			$('[name="hp_update"]').val(hp);
			$('[name="alamat_update"]').val(alamat);
			$('[name="username_update"]').val(username);
			$('[name="foto_lama"]').val(foto);

			$('#modal-updateKurir').modal('show');
		});

		$('#table-data-kurir').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var foto = $(this).attr('data-foto');
			var nama = $(this).attr('data-nama');

			$('#Kurir-delete').html(nama);
			$('[name="id_kurir_delete"]').val(id);
			$('[name="foto_delete"]').val(foto);

			$('#modal-deleteKurir').modal('show');
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