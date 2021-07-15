
<script type="text/javascript">

	$(document).ready(function() {
		getProfile();
		function getProfile() {
			$.ajax({
				url: '<?= base_url("admin/Profile/getProfile") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					$('.nama-depot').html(data.nama_depot);
					$('.nama-pimpinan').html(data.nama_pimpinan);
					$('.email').html(data.email);
					$('.telepon').html(data.telepon);

					$('[name="nama_depot"]').val(data.nama_depot);
					$('[name="nama_pimpinan"]').val(data.nama_pimpinan);
					$('[name="email"]').val(data.email);
					$('[name="telepon"]').val(data.telepon);
					$('[name="alamat"]').val(data.alamat);
				}
			});
			
		}

		function updateField() {
			$('#formProfile :input').prop('disabled', false);

			$('#btn-cancelupdateProfile').fadeIn(200, function() {
				$('#btn-updateProfile').fadeIn(120);
				$('#btn-update').fadeOut(100);
			});
		}

		function closeUpdateField() {
			$('#formProfile :input').prop('disabled', true);

			$('#btn-cancelupdateProfile').fadeOut(200, function() {
				$('#btn-updateProfile').fadeOut(120);
				$('#btn-update').fadeIn(100);
			});

			$('#btn-update').prop('disabled', false);
		}

		$('#btn-update').on('click', function() {
			updateField();
		});

		$('#btn-cancelupdateProfile').click(function() {
			closeUpdateField();
		});
		
		$('#formProfile').submit(function() {
			var data = new FormData(this);
			$.ajax({
		        url: '<?= site_url("admin/Profile/updateProfile")?>',
		        type: 'POST',
		        dataType:'JSON',
		        data: data,
		        processData: false,
		        contentType: false,
                success:function(response) {
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
						closeUpdateField();
						get_data();
					}
                }
		    });

		    return false;
		});

	});
</script>

<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>