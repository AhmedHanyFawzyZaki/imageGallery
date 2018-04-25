<?php
$this->breadcrumbs=array(
	'Image Options'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ImageOption','url'=>array('index')),
	array('label'=>'Create ImageOption','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('image-option-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--<h3>Manage </h3>-->

<?php $this->pageTitlecrumbs = 'Manage Image Options';?>
<p class="span11 alert">
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<br/>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn center_btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
	
)); ?>
</div><!-- search-form -->

<?php $this->widget('ext.yiisortablemodel.widgets.SortableCGridView',array(
	'id'=>'image-option-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'orderField' => 'sort',
    	'idField' => 'id',
    	'orderUrl' => 'order',
    	//'type'=>'striped  condensed',
	'columns'=>array(
		'image_id',
		'user_id',
		'type',
		'title',
		'alt_text',
		/*
		'action_performed',
		'url',
		'border_color',
		'border_width',
		'border_radius',
		'shadow',
		'border',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
