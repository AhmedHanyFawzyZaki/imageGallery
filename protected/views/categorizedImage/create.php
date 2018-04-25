<?php
$this->breadcrumbs=array(
	'Categorized Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategorizedImage','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create CategorizedImage';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>