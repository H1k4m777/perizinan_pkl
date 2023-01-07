<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Perizinan PKL <?= date('Y'); ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
			</div>
		</div>
	</div>
</div>



<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('sbadmin/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('sbadmin/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('sbadmin/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('sbadmin/'); ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- tabel -->
<script src="<?= base_url('sbadmin/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('sbadmin/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>


<!-- Page level custom scripts -->
<!-- tabel -->
<script src="<?= base_url('sbadmin/'); ?>js/demo/datatables-demo.js"></script>

</body>

<script>
	jQuery(document).ready(function($) {
		$(".clickable-row").click(function() {
			window.location = $(this).data("href");
		});
	});
	$(function() {
		$('#orderModal').modal({
			keyboard: true,
			backdrop: "static",
			show: false,

		}).on('show', function() { //subscribe to show method
			var getIdFromRow = $(event.target).closest('tr').data('id'); //get the id from tr
			//make your ajax call populate items or what even you need
			$(this).find('#orderDetails').html($('<b> Order Id selected: ' + getIdFromRow + '</b>'))
		});
	});
</script>

</html>