<script type="text/javascript">
	$(document).ready(function() {
		getTotal();
		function getTotal() {
			$.ajax({
				url: '<?= site_url("admin/Dashboard/getTotal") ?>',
				type: 'GET',
				dataType: 'JSON',
				success:function (data) {
					$('#total-penjualan').html(data.penjualan);
				}
			});
			
		}
	});
</script>
<script src="<?= site_url('assets/assets/js/argon.js?v=1.1.0') ?>"></script>

</body>
</html>