
<script type="text/javascript">

	var table;
	$(document).ready(function() {
		select_pelanggan();
		table = $('#table-penjualan').DataTable({
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
                "url": "<?= base_url('admin/Penjualan/get_penjualan')?>",
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

		function select_pelanggan() {
			var select = $('[name="id_pelanggan"]');
			$.ajax({
				url: '<?= site_url('admin/Pelanggan/selectPelanggan') ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					for (var i = 0; i < data.length; i++) {
						select.append('<option value="'+data[i].id+'">'+data[i].nama_lengkap+'</option>');
					}
				}
			});
		}

		function key_total() {
			var total = $('[name="jumlah"]').val()*5000;
			$('#harga').val(total);
		}

		$('[name="jumlah"]').on('keyup', function() {
			key_total();
		});

		function actionData(formData, action) {
			$.ajax({
				url: '<?= base_url("admin/Penjualan/") ?>'+action+'',
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

	            	$('#form-'+action)[0].reset();

					reload_table();
				}
			});
		}

		$('#form-addPenjualan').submit(function() {
			
			var formData = new FormData();
	            formData.append('id_pelanggan', $('[name="id_pelanggan"]').val()); 
	            formData.append('jumlah', $('[name="jumlah"]').val()); 

        	actionData(formData, 'addPenjualan');
        	return false;
		});

		$('#form-deletePenjualan').submit(function() {
			var formData = new FormData();
	            formData.append('id', $('[name="id_penjualan"]').val());

			actionData(formData, 'deletePenjualan');
			$('#modal-deletePenjualan').modal('hide');

        	return false;
		});

		$('#table-data-penjualan').on('click', '.delete-data', function() {
			var id = $(this).attr('data-id');
			var nama = $(this).attr('data-nama');

			$('#penjualan-delete').html(nama);
			$('[name="id_penjualan"]').val(id);

			$('#modal-deletePenjualan').modal('show');
		});

	});
</script>
<script src="<?= site_url('assets/assets/vendor/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') ?>"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.3.3/js/dataTables.fixedColumns.min.js"></script>
<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>