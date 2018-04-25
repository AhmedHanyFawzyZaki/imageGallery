<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Settings','url'=>array('index')),
	
);
?>

<?php $this->pageTitlecrumbs = 'View Settings ';?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'slider_banner_image_width',
		'slider_banner_image_height',
		'logo_image_width',
		'logo_image_height',
		'inner_page_image_width',
		'inner_page_image_height',
		'testimonial_image_width',
		'testimonial_image_height',
	),
)); ?>
