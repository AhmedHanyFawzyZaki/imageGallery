<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'categorized-image-form',
	'enableAjaxValidation'=>false,
	'type'=>'horizontal',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php
        echo $form->fileFieldRow($model, 'image', array('class' => 'span5', 'maxlength' => 255));

        if ($model->isNewRecord != '1' and $model->image != '') {
            ?>
            <div class="control-group ">
                <label class="control-label" for="Pages_intro"></label>
                <div class="controls">
                    <p id='image-cont'> <?php echo Chtml::image(Yii::app()->baseUrl . '/media/' . $model->image, '', array('width' => 200)); ?></p>
                </div>
            </div>
        <?php
        }
        ?>

	<div class="control-group ">
            <?php echo $form->labelEx($model, 'cat_id', array('class' => 'control-label')) ?>
            <?php
            $this->widget('Select2', array(
                'model' => $model,
                'attribute' => 'cat_id',
                'data' => CHtml::listData(Category::model()->findAll(), 'id', 'title'),
                'htmlOptions' => array('class' => "span4"),
            ));
            ?>
        </div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
