<?php
$this->breadcrumbs=array(
	'Image Options'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List ImageOption','url'=>array('index')),
	array('label'=>'Create ImageOption','url'=>array('create')),
	array('label'=>'Update ImageOption','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ImageOption','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View ImageOption #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'image_id',
		'user_id',
		'type',
		'title',
		'alt_text',
		'action_performed',
		'url',
		'border_color',
		'border_width',
		'border_radius',
		'shadow',
		'border',
	),
)); ?>
