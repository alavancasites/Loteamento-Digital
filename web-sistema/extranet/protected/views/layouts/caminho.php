<div class="row">
	<div class="col-12">
		<div class="page-title-box">
			
			<div class="page-title-right">
				<ol class="breadcrumb p-0 m-0">
					<li class="breadcrumb-item"><a href="<?= Yii::app()->baseUrl . '/site' ?>">Home</a></li>
					<?
					if (isset($this->breadcrumbs)) {
						foreach ($this->breadcrumbs as $label => $url) {
							if (is_string($label) || is_array($url)) {
					?>
								<li class="breadcrumb-item">
									<a href="<?= $this->createUrlRel($url[0], array_splice($url, 1)); ?>"><?= Util::formataTexto($label); ?></a>
								</li>
							<?
							} else {
							?>

								<li class="breadcrumb-item active"><?= Util::formataTexto($url); ?></li>

					<?
							}
						}
					}
					?>

				</ol>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>