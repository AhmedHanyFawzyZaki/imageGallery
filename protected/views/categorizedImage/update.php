<?php
$this->breadcrumbs=array(
	'Categorized Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategorizedImage','url'=>array('index')),
	array('label'=>'Create CategorizedImage','url'=>array('create')),
	array('label'=>'View CategorizedImage','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->pageTitlecrumbs = 'Update CategorizedImage #'. $model->id; ?>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>