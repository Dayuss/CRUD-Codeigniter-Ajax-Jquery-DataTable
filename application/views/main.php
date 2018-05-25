<?php require 'component/header.php'?>

	<!-- disini kita beri container, dan margin-top -->
	<div class="container mt-4">
		<!-- lalu kita load halaman yang didefinisikan di controller -->
		<?php $this->load->view($page)?>
	</div>

<?php require 'component/footer.php'?>



