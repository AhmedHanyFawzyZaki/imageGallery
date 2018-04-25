<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'settings-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'slider_banner_image_width',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'slider_banner_image_height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'logo_image_width',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'logo_image_height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'inner_page_image_width',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'inner_page_image_height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'testimonial_image_width',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'testimonial_image_height',array('class'=>'span5','maxlength'=>10)); ?>
        <hr>
        <?php echo $form->textFieldRow($model,'border_max_width',array('class'=>'span5','maxlength'=>10,'append'=>'px')); ?>
        
        <?php echo $form->textFieldRow($model,'border_max_radius',array('class'=>'span5','maxlength'=>10,'append'=>'px')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
