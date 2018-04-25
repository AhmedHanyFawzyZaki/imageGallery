<?php
$this->breadcrumbs=array(
	'Image Options'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ImageOption','url'=>array('index')),
);
?>

<?php $this->pageTitlecrumbs = 'Create ImageOption';?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>