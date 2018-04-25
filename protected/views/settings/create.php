<?php
$this->breadcrumbs=array(
	'Settings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Settings','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create Settings';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>