<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Category','url'=>array('index')),
	array('label'=>'Create Category','url'=>array('create')),
	array('label'=>'View Category','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update Category #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>