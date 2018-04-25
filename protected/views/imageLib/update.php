<?php
$this->breadcrumbs=array(
	'Image Libs'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ImageLib','url'=>array('index')),
	array('label'=>'Create ImageLib','url'=>array('create')),
	array('label'=>'View ImageLib','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update ImageLib #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>