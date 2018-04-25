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
            <form method="POST" action="<?= Yii::app()->request->baseUrl ?>/home/applyCrop">
                <input type="text" class="pull-left padd10" id="custom_width" placeholder="width in px">
                <input type="text" class="pull-left padd10" id="custom_height" placeholder="height in px">
                <input type="text" class="pull-left padd10" name="destination_image_name" required="required" placeholder="Cropped Image Name">
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <input type="hidden" name="image" value="large_thumb/<?= $image ?>">
                <input type="submit" class="btn btn-success pull-right padd10" value="Crop">
                <input type="button" id="custom_apply" class="btn btn-info pull-right padd10" value="Apply">
            </form>
        </div>
        <div class="clear"></div>
        <div class="our_images">
            <div class="left">
                <a href="javascript:void(0);" class="changeCrop" id="<?=Yii::app()->params['slider_banner_image_width']?>_<?=Yii::app()->params['slider_banner_image_height']?>" >Slider banner image</a>
                <a href="javascript:void(0);" class="changeCrop" id="<?=Yii::app()->params['logo_image_width']?>_<?=Yii::app()->params['logo_image_height']?>">Logo image</a>
                <a href="javascript:void(0);" class="changeCrop" id="<?=Yii::app()->params['inner_page_image_width']?>_<?=Yii::app()->params['inner_page_image_height']?>">Inner page image</a>
                <a href="javascript:void(0);" class="changeCrop" id="<?=Yii::app()->params['testimonial_image_width']?>_<?=Yii::app()->params['testimonial_image_height']?>">Testimonial image</a>
                <a href="javascript:void(0);" class="changeCrop" id="">Custom size</a>
            </div>
            <div style="float: left;height: 480px;overflow-y: scroll;width: 87%;">
                <span style="width: 100%;text-align: center;float: left;padding: 20px 50px;"><img id="target" src="<?= Yii::app()->request->baseUrl ?>/media/large_thumb/<?= $image ?>" style="max-width: 735px;"> </span>
            </div>
        </div>
    </div>
</div>

<script src="<?= Yii::app()->getBaseUrl(true); ?>/js/jcrop/js/jquery.min.js"></script>
<script src="<?= Yii::app()->getBaseUrl(true); ?>/js/jcrop/js/jquery.Jcrop.js"></script>
<script type="text/javascript">
  jQuery(function($){

    // The variable jcrop_api will hold a reference to the
    // Jcrop API once Jcrop is instantiated.
    var jcrop_api;

    // In this example, since Jcrop may be attached or detached
    // at the whim of the user, I've wrapped the call into a function
    initJcrop();
    
    // The function is pretty simple
    function initJcrop()//{{{
    {
      // Hide any interface elements that require Jcrop
      // (This is for the local user interface portion.)
      //$('.requiresjcrop').hide();

      // Invoke Jcrop in typical fashion
      $('#target').Jcrop({
        //onRelease: releaseCheck,
        onSelect: updateCoords
      },function(){

        jcrop_api = this;
        jcrop_api.animateTo([100,100,400,300]);
        setCoords(100,100,400,300);
        jcrop_api.setOptions({ allowSelect: false, allowResize:false, allowMove: true});

      });

    };
    // the onRelease callback if you use allowSelect: false
    function updateCoords(c)
    {
        setCoords(c.x,c.y,c.w,c.h);
    };
    
    function setCoords(x,y,w,h){
        $('#x').val(x);
        $('#y').val(y);
        $('#w').val(w);
        $('#h').val(h);
        
        if($('#custom_width').val() && $('#custom_height').val()){
            $('#custom_width').val(w);
            $('#custom_height').val(h);
        }
    };
    
    $('.changeCrop').click(function(e) {
        if(this.id==''){
            //jcrop_api.animateTo([0,0,0,0]);
            jcrop_api.setOptions({ allowSelect: false, allowResize:true, allowMove: true});
        }else{
            //console.log(parseFloat(this.id));
            var arr=this.id.split('_');
            jcrop_api.animateTo([0,0,arr[0],arr[1]]);
            setCoords(0,0,arr[0],arr[1]);
            jcrop_api.setOptions({ allowSelect: false, allowResize:false, allowMove: true});
            $('#custom_width').val('');
            $('#custom_height').val('');
        }
    });
    
    $('#custom_apply').click(function(e){
        var wid=$('#custom_width').val();
        var he=$('#custom_height').val();
        if(wid!='' && he!=''){
            jcrop_api.animateTo([0,0,wid,he]);
            setCoords(0,0,wid,he);
            jcrop_api.setOptions({ allowSelect: false, allowResize:true, allowMove: true});
        }else{
            alert('Please enter your custom width and height then press apply button!');
        }
    });
    
  });

</script>
<link rel="stylesheet" href="<?= Yii::app()->getBaseUrl(true); ?>/js/jcrop/css/jquery.Jcrop.css" type="text/css" />