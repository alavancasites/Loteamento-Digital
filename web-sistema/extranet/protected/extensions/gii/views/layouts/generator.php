<?php $this->beginContent('gii.views.layouts.main'); ?>
<div class="container">
	<div class="col-md--4">
		<div id="sidebar">
		<?php $this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Generators',
		)); ?>
			<ul>
				<?php foreach($this->module->controllerMap as $name=>$config): ?>
				<li><?php echo CHtml::link(ucwords(CHtml::encode($name).' generator'),array('/gii/'.$name));?></li>
				<?php endforeach; ?>
			</ul>
		<?php $this->endWidget(); ?>
		</div><!-- sidebar -->
	</div>
	<div class="col-md--16">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="col-md--4 last">
		&nbsp;
	</div>
</div>
<?php $this->endContent(); ?>