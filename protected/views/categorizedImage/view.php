<?php
$this->breadcrumbs=array(
	'Categorized Images'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CategorizedImage','url'=>array('index')),
	array('label'=>'Create CategorizedImage','url'=>array('create')),
	array('label'=>'Update CategorizedImage','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete CategorizedImage','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<?php $this->pageTitlecrumbs = 'View CategorizedImage #'. $model->id; ?>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'image',
		'cat_id',
	),
)); ?>
