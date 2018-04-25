<?php
$this->breadcrumbs=array(
	'Image Options'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImageOption','url'=>array('index')),
	array('label'=>'Create ImageOption','url'=>array('create')),
	array('label'=>'View ImageOption','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update ImageOption #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>