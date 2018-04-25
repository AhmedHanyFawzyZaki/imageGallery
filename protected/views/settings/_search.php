<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
        'type'=>'horizontal',
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'slider_banner_image_width',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'slider_banner_image_height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'logo_image_width',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'logo_image_height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'inner_page_image_width',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'inner_page_image_height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'testimonial_image_width',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'testimonial_image_height',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
