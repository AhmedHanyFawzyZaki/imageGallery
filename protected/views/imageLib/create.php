<?php
$this->breadcrumbs=array(
	'Image Libs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ImageLib','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create ImageLib';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>