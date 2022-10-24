<!DOCTYPE html>
<html lang="en">

<head>
	<?php
	$this->renderPartial("//layouts/header", array());
	?>
</head>

<body>

	<!-- Begin page -->
	<div id="wrapper">


		<?php
		$this->renderPartial("//layouts/topo", array());
		?>

		<!-- ========== Left Sidebar Start ========== -->
		<?php
		$this->renderPartial("//layouts/menu");
		?>
		<!-- Left Sidebar End -->

		<!-- ============================================================== -->
		<!-- Start Page Content here -->
		<!-- ============================================================== -->

		<div class="content-page">
			<div class="content">

				<!-- Start Content-->
				<div class="container-fluid">

					<!-- start page title -->
					<?php
					$this->renderPartial("//layouts/caminho");
					?>
					<!-- end page title -->

					<?php echo $content; ?>



				</div>
				<!-- end container-fluid -->

			</div>
			<!-- end content -->



			<!-- Footer Start -->
			<?php
			$this->renderPartial("//layouts/footer");
			?>

			<!-- end Footer -->

		</div>

		<!-- ============================================================== -->
		<!-- End Page content -->
		<!-- ============================================================== -->

	</div>
	<!-- END wrapper -->

	<?php
	$this->renderPartial("//layouts/scripts");
	?>

</body>

</html>