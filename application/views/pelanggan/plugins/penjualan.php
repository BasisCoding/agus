
<script type="text/javascript">

	var table;
	$(document).ready(function() {

		table = $('#table-penjualan').DataTable({
			"processing": true, 
            "serverSide": true,
            "scrollX": true,
            "fixedColumns": {
            	 "leftColumns": 1,
            	 "rightColumns": 1
            },
            // "responsive": true,
            // "lengthChange": false,
            "order": [],
            "autoWidth" : true,
             
            "ajax": {
                "url": "<?= base_url('pelanggan/Pemesanan/get_penjualan')?>",
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
				url: '<?= base_url("pelanggan/Pemesanan/") ?>'+action+'',
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

		$('#form-konfirmasi').submit(function() {
			var formData = new FormData();
	            formData.append('id', $('[name="id_penjualan"]').val());

			actionData(formData, 'konfirmasi');
			$('#modal-konfirmasi').modal('hide');

        	return false;
		});

		$('#table-data-penjualan').on('click', '.btn-konfirmasi', function() {
			var id = $(this).attr('data-id');

			$('[name="id_penjualan"]').val(id);

			$('#modal-konfirmasi').modal('show');
		});

		$('[name="jumlah"]').on('keyup', function(event) {
			event.preventDefault();
			var harga = <?= HARGA_SATUAN ?>;
			$('[name="harga"]').val($(this).val() * harga);
		});

		$('#form-addPemesanan').submit(function() {
			var formData = new FormData();
	            formData.append('jumlah', $('[name="jumlah"]').val());
	            formData.append('harga', $('[name="harga"]').val());

			actionData(formData, 'addPemesanan');
			$('#modal-addPemesanan').modal('hide');

        	return false;
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