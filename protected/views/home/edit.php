<!-- Bootstrap core CSS -->
<link href="<?= Yii::app()->getBaseUrl(true); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?= Yii::app()->getBaseUrl(true); ?>/css/font-awesome.css" rel="stylesheet">
<!-- Documentation extras -->
<link href="<?= Yii::app()->getBaseUrl(true); ?>/css/style_front.css" rel="stylesheet">
<link href="<?= Yii::app()->getBaseUrl(true); ?>/css/animate.css" rel="stylesheet">
<link href="<?= Yii::app()->getBaseUrl(true); ?>/css/open-sans.css" rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/new.css" />

<div class="tab-content">
    <div class="tab-pane active" id="our">
        <div class="top">
            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                    'id'=>'image-option-form',
                    'enableAjaxValidation'=>false,
                    'type'=>'horizontal',
            )); ?>
                <?php echo $form->errorSummary($model); ?>

                <?php echo $form->hiddenField($model,'image_id'); ?>

                <?php echo $form->hiddenField($model,'user_id'); ?>

                <?php echo $form->hiddenField($model,'type'); ?>

                <?php echo $form->textFieldRow($model,'title',array('class'=>'span5','maxlength'=>255)); ?>

                <?php echo $form->textFieldRow($model,'alt_text',array('class'=>'span5','maxlength'=>255)); ?>

                <?php echo $form->dropDownListRow($model,'action_performed',array('1'=>'Zoom in','2'=>'Open larger image in popup','3'=>'Go to the URL'),
                        array('class'=>'span5','onchange'=>'toggleUrl(this.value)')); ?>
                <?php
                    $nn=$model->action_performed==3?'block':'none';
                ?>
                <div id="url" style="display: <?=$nn?>">
                    <?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>255)); ?>
                </div>
            
                <hr>
                <div class="col-xs-7">
                    <?php echo $form->dropDownListRow($model,'border',array('unset'=>'Unset','solid'=>'Solid','inset'=>'Inset','outset'=>'Outset','groove'=>'Groove','dashed'=>'Dashed','dotted'=>'Dotted','ridge'=>'Ridge','none'=>'None'),
                        array('class'=>'span5')); ?>
                    <div class="control-group">
                        <?php echo $form->labelEx($model,'border_color')?>
                        <div class="controls">
                        <?php
                        $this->widget('ext.SMiniColors.SActiveColorPicker', array(
                            'model' => $model,
                            'attribute' => 'border_color',
                            'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
                            'options' => array(), // jQuery plugin options
                            'htmlOptions' => array(), // html attributes
                        ));
                        ?>
                        </div>
                    </div>

                    <?php echo $form->dropDownListRow($model,'border_width',  Helper::borderWidth(),array('class'=>'pull-left','maxlength'=>255)); ?>

                    <?php //echo $form->textField($model,'border_radius[]',array('class'=>'span5','maxlength'=>255)); ?>
                    <div class="input-group col-xs-12 topMarg50">
                        <label class="col-xs-12">Corner Sizes:<br></label>
                        <div class="input-group col-xs-5 pull-left">
                            <a href="javascript:void(0)" onclick="increaseRadius('r1')" class="input-group-addon">+</a>
                            <input type="text" onchange="changeRadius('r1')" id="r1" class="form-control" value="<?=  Helper::BorderRadius($model->border_radius,1)?>" name="r[]">
                            <a href="javascript:void(0)" onclick="decreaseRadius('r1')" class="input-group-addon">-</a>
                        </div>
                        <div class="input-group col-xs-5 pull-right">
                            <a href="javascript:void(0)" onclick="increaseRadius('r2')" class="input-group-addon">+</a>
                            <input type="text" onchange="changeRadius('r2')" id="r2" class="form-control" value="<?=  Helper::BorderRadius($model->border_radius,2)?>" name="r[]">
                            <a href="javascript:void(0)" onclick="decreaseRadius('r2')" class="input-group-addon">-</a>
                        </div>
                        <div class="clearfix"><br><br><br><br></div>
                        <div class="input-group col-xs-5 pull-left">
                            <a href="javascript:void(0)" onclick="increaseRadius('r3')" class="input-group-addon">+</a>
                            <input type="text" onchange="changeRadius('r3')" id="r3" class="form-control" value="<?=  Helper::BorderRadius($model->border_radius,3)?>" name="r[]">
                            <a href="javascript:void(0)" onclick="decreaseRadius('r3')" class="input-group-addon">-</a>
                        </div>
                        <div class="input-group col-xs-5 pull-right">
                            <a href="javascript:void(0)" onclick="increaseRadius('r4')" class="input-group-addon">+</a>
                            <input type="text" onchange="changeRadius('r4')" id="r4" class="form-control" value="<?=  Helper::BorderRadius($model->border_radius,4)?>" name="r[]">
                            <a href="javascript:void(0)" onclick="decreaseRadius('r4')" class="input-group-addon">-</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-5">
                    <img id="target" src="<?= Yii::app()->request->baseUrl ?>/media/small_thumb/<?= $image ?>" style="max-width: 735px;">
                </div>

                <?php //echo $form->textFieldRow($model,'shadow',array('class'=>'span5','maxlength'=>255)); ?>
                <div class="clearfix"></div><br>
                <input type="button" class="btn btn-info pull-left padd50 margin50" value="Apply" onclick="changeBorder()">
                <input type="submit" class="btn btn-success pull-right padd50 margin50" value="Save">
            <?php $this->endWidget(); ?>
        </div>
        <div class="clear"></div>
        <!--<div class="our_images">
            
            <div style="float: left;height: 480px;overflow-y: scroll;">
                <span style="width: 100%;text-align: center;float: left;padding: 20px 50px;"><img id="target" src="<?= Yii::app()->request->baseUrl ?>/media/large_thumb/<?= $image ?>" style="max-width: 735px;"> </span>
            </div>
        </div>-->
    </div>
</div>
<script>
    function toggleUrl(val){
        if(val==3){
            $('#url').css('display','block');
        }else{
            $('#url').css('display','none');
        }
    }
    function changeBorder(){
        $('#target').css('border-color',$('#ImageOption_border_color').val());
        $('#target').css('border-style',$('#ImageOption_border').val());
        $('#target').css('border-width',$('#ImageOption_border_width').val());
        var border_rad=$('#r1').val()+'px '+$('#r2').val()+'px '+$('#r3').val()+'px '+$('#r4').val()+'px';
        $('#target').css('border-radius',border_rad);
    }
    function decreaseRadius(id){
        var val=$('#'+id).val();
        if(isNaN(val)){
            alert('Border radius can be integer number only!');
            $('#'+id).focus();
        }else{
            if((val==0) || (val > <?=Yii::app()->params['border_max_radius']?>)){
                alert('Border radius should be more than 0 and less than <?=Yii::app()->params['border_max_radius']?>!');
                $('#'+id).focus();
            }else{
                $('#'+id).val(val-1);
            }
        }
    }
    function increaseRadius(id){
        var val=$('#'+id).val();
        if(isNaN(val)){
            alert('Border radius can be integer number only!');
            $('#'+id).focus();
        }else{
            if(val > (<?=Yii::app()->params['border_max_radius']?>-1)){
                alert('Border radius should be more than 0 and less than <?=Yii::app()->params['border_max_radius']?>!');
                $('#'+id).focus();
            }else{
                $('#'+id).val(parseInt(val)+1);
            }
        }
    }
    function changeRadius(id){
        var val=$('#'+id).val();
        if(isNaN(val)){
            alert('Border radius can be integer number only!');
            $('#'+id).val(0);
            $('#'+id).focus();
        }else{
            if(val > (<?=Yii::app()->params['border_max_radius']?>)){
                alert('Border radius should be more than 0 and less than <?=Yii::app()->params['border_max_radius']?>!');
                $('#'+id).val(0);
                $('#'+id).focus();
            }
        }
    }
    
    $(document).ready(function(){
        changeBorder();
    });
</script>

<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script>
    $(function() {
        var select = $( "#ImageOption_border_width" );
        var slider = $( "<div id='slider' class='pull-right col-xs-10'></div>" ).insertAfter( select ).slider({
            min: 1,
            max: <?=Yii::app()->params['border_max_width']?>,
            range: "min",
            value: select[ 0 ].selectedIndex + 1,
            slide: function( event, ui ) {
            select[ 0 ].selectedIndex = ui.value - 1;
            }
            });
        $( "#ImageOption_border_width" ).change(function() {
        slider.slider( "value", this.selectedIndex + 1 );
        });
    });
</script>