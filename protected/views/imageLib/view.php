<?php
$this->breadcrumbs=array(
	'Image Libs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ImageLib','url'=>array('index')),
	array('label'=>'Create ImageLib','url'=>array('create')),
	array('label'=>'Update ImageLib','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ImageLib','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View ImageLib #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'image',
		'user_id',
		'title',
		'alt_image',
		'click_event',
		'date_created',
	),
)); ?>
