
<script type="text/javascript">

	$(document).ready(function() {
		getProfile();
		function getProfile() {
			$.ajax({
				url: '<?= base_url("kurir/Profile/getProfile") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
	        		d = new Date();

					if (data.foto != null) {
						foto = '<?= base_url('assets/assets/img/users/') ?>'+data.foto+'?'+d.getTime();
					}else{
						foto = '<?= base_url('assets/assets/img/users/default.png') ?>';
					}

					$('.username').html(data.username);
					$('.nama-lengkap').html(data.nama_lengkap);
					$('.hp').html(data.hp);
					$('#img-users').attr('src', foto);

					$('[name="foto_lama"]').val(data.foto);
					$('[name="username"]').val(data.username);
					$('[name="nama_lengkap"]').val(data.nama_lengkap);
					$('[name="hp"]').val(data.hp);
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

			if ($('[name="password"]').val() != $('[name="password-confirm"]').val()) {
				$.notify({
                    icon: 'ni ni-bell-55',
                    message:'Password Tidak Sama, Mohon isi data dengan benar'
                },{
                    type:'danger',
                    placement: {
                      from: "top",
                      align: "right"
                },
                    animate: {
                      enter: 'animated fadeInDown',
                      exit: 'animated fadeOutUp'
                 	}
                });

                return false;
			}else{

				var data = new FormData(this);
				$.ajax({
			        url: '<?= site_url("kurir/Profile/updateProfile")?>',
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
							getProfile();
						}
	                }
			    });

			    return false;
			}

		});

	});
</script>

<script src="<?= site_url('assets/assets/vendor/bootstrap-notify/bootstrap-notify.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/vendor/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>