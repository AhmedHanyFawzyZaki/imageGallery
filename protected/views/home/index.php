<html>
    <head>
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->request->baseUrl ?>/css/new.css" />
    </head>

    <body>
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#our" role="tab" data-toggle="tab">Free From Ours</a></li>
            <li><a href="#my" role="tab" data-toggle="tab">My Images</a></li>
        </ul>
        
        <div class="tab-content">
            <div class="tab-pane active" id="our">
                <div class="our_images">
                    <div class="left">
                    <?php
                        echo '<a href="javascript:void(0);" onclick="filterCategory(0)">All Categories</a>';
                        if($categories){
                            foreach ($categories as $cat){
                                echo '<a href="javascript:void(0);" onclick="filterCategory('.$cat->id.')">'.$cat->title.'</a>';
                            }
                        ?>
                    
                    <?php
                        }
                    ?>
                    </div>
                    <?php
                        if($our_images){
                    ?>
                    <div id="our_images_filter" class="our_images_div">
                        <?php
                            foreach ($our_images as $oi){
                                echo '<div class="image_container1" onmouseover="showThumb(\'cat_th_'.$oi->id.'\')" onmouseout="hideThumbs()">
                                            <span onclick="enlarge(\''.Yii::app()->request->baseUrl.'/media/'.$oi->image.'\')" class="enlarger">
                                                <i class="fa fa-search-plus"></i>
                                            </span>
                                            <a href="'.Yii::app()->request->baseUrl.'/home/editImage/'.$oi->id.'?type=cat" class="edit_img">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="'.Yii::app()->request->baseUrl.'/home/crop/'.$oi->id.'?type=cat" class="thumb_img_cont">
                                                <img src="'.Yii::app()->request->baseUrl.'/media/small_thumb/'.$oi->image.'" class="thumb_img">
                                            </a>
                                            <div class="new_thumb" id="cat_th_'.$oi->id.'">
                                              <img src="'.Yii::app()->request->baseUrl.'/media/large_thumb/'.$oi->image.'" width="250">
                                            </div>
                                      </div>';
                            }
                        ?>
                    </div>
                    <?php
                        }else{
                            echo '<span class="empty_our_image">No images found.</span>';
                        }
                    ?>
                    
                </div>
            </div>
            <div class="tab-pane" id="my">
                <!---if the img_lib div contains images set this input with zero--->
                <?php
                    if(count($my_images)>0)
                        echo '<input type="hidden" id="empty_img_lib" value="0">';
                    else
                        echo '<input type="hidden" id="empty_img_lib" value="1">';
                ?>
                <input type="hidden" id="empty_img_lib" value="1">
                <div class="image_lib" id="img_lib">
                    <?php
                        if($my_images)
                        {
                            foreach ($my_images as $my_image){
                                //echo '<a href="'.Yii::app()->request->baseUrl.'/home/'.$my_image->id.'" class="thumb_img_cont"><img src="'.Yii::app()->request->baseUrl.'/media/'.$my_image->image.'" class="thumb_img"></a>';
                                echo '
                                <div class="image_container" onmouseover="showThumb(\'my_th_'.$my_image->id.'\')" onmouseout="hideThumbs()">
                                    <span onclick="enlarge(\''.Yii::app()->request->baseUrl.'/media/'.$my_image->image.'\')" class="enlarger">
                                        <i class="fa fa-search-plus"></i>
                                    </span>
                                    <a href="'.Yii::app()->request->baseUrl.'/home/editImage/'.$my_image->id.'?type=lib" class="edit_img">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="'.Yii::app()->request->baseUrl.'/home/crop/'.$my_image->id.'?type=lib" class="thumb_img_cont">
                                        <img src="'.Yii::app()->request->baseUrl.'/media/small_thumb/'.$my_image->image.'" class="thumb_img">
                                    </a>
                                    <div class="new_thumb" id="my_th_'.$my_image->id.'">
                                        <img src="'.Yii::app()->request->baseUrl.'/media/large_thumb/'.$my_image->image.'" width="250">
                                    </div>
                                </div>';
                            }
                            $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
                                'contentSelector' => '#img_lib',
                                'itemSelector' => 'div.image_container',
                                'loadingText' => '',
                                'donetext' => '',
                                'pages' => $myimages_pages,
                            ));
                        }else{
                            echo '<span class="empty_image_lib">No images uploaded</span>';
                        }
                    ?>
                </div>
                <div id="dragandrophandler"><span class="pull-left">Drag & Drop Images Here &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;OR </span><input class="pull-left input-file" onchange="uploadImage(this)" type="file"></div>
                <br><br>
                <div id="status1"></div>
            </div>
        </div>
        <script>
            function sendFileToServer(formData, status, image_name)
            {
                var uploadURL = "<?= Yii::app()->request->baseUrl ?>/home/imageUpload"; //Upload URL
                var extraData = {}; //Extra Data.
                var jqXHR = $.ajax({
                    xhr: function() {
                        var xhrobj = $.ajaxSettings.xhr();
                        if (xhrobj.upload) {
                            xhrobj.upload.addEventListener('progress', function(event) {
                                var percent = 0;
                                var position = event.loaded || event.position;
                                var total = event.total;
                                if (event.lengthComputable) {
                                    percent = Math.ceil(position / total * 100);
                                }
                                //Set progress
                                status.setProgress(percent);
                            }, false);
                        }
                        return xhrobj;
                    },
                    url: uploadURL,
                    type: "POST",
                    contentType: false,
                    processData: false,
                    cache: false,
                    data: formData, //"image="+ formData+"&name="+image_name,
                    success: function(data) {
                        status.setProgress(100);
                        var arr=jQuery.parseJSON(data);
                        if(arr['status']=='success'){
                            if($('#empty_img_lib').val()=='1'){
                                $('#img_lib').html('<div class="image_container" onmouseover="showThumb(\'my_th_'+arr['id']+'\')" onmouseout="hideThumbs()"><span onclick="enlarge(\'<?=Yii::app()->request->baseUrl?>/media/'+arr['content']+'\')" class="enlarger"><i class="fa fa-search-plus"></i></span><a href="<?=Yii::app()->request->baseUrl?>/home/editImage/'+arr['id']+'?type=lib" class="edit_img"><i class="fa fa-pencil"></i></a><a href="<?=Yii::app()->request->baseUrl?>/home/crop/'+arr['id']+'?type=lib" class="thumb_img_cont"><img src="<?=Yii::app()->request->baseUrl?>/media/small_thumb/'+arr['content']+'" class="thumb_img"></a><div class="new_thumb" id="my_th_'+arr['id']+'"><img src="<?=Yii::app()->request->baseUrl?>/media/large_thumb/'+arr['content']+'" width="250"></div></div>');
                                $('#empty_img_lib').val(0);

                            }else{
                                $('#img_lib').append('<div class="image_container" onmouseover="showThumb(\'my_th_'+arr['id']+'\')" onmouseout="hideThumbs()"><span onclick="enlarge(\'<?=Yii::app()->request->baseUrl?>/media/'+arr['content']+'\')" class="enlarger"><i class="fa fa-search-plus"></i></span><a href="<?=Yii::app()->request->baseUrl?>/home/editImage/'+arr['id']+'?type=lib" class="edit_img"><i class="fa fa-pencil"></i></a><a href="<?=Yii::app()->request->baseUrl?>/home/crop/'+arr['id']+'?type=lib" class="thumb_img_cont"><img src="<?=Yii::app()->request->baseUrl?>/media/small_thumb/'+arr['content']+'" class="thumb_img"></a><div class="new_thumb" id="my_th_'+arr['id']+'"><img src="<?=Yii::app()->request->baseUrl?>/media/large_thumb/'+arr['content']+'" width="250"></div></div>');
                            }
                        }else{
                            alert(arr['content']);
                        }
                        //$("#status1").append("File upload Done<br>");        
                    }
                });

                status.setAbort(jqXHR);
            }

            var rowCount = 0;
            function createStatusbar(obj)
            {
                rowCount++;
                var row = "odd";
                if (rowCount % 2 == 0)
                    row = "even";
                this.statusbar = $("<div class='statusbar " + row + "'></div>");
                this.filename = $("<div class='filename'></div>").appendTo(this.statusbar);
                this.size = $("<div class='filesize'></div>").appendTo(this.statusbar);
                this.progressBar = $("<div class='progressBar'><div></div></div>").appendTo(this.statusbar);
                this.abort = $("<div class='abort'>Abort</div>").appendTo(this.statusbar);
                obj.after(this.statusbar);

                this.setFileNameSize = function(name, size)
                {
                    var sizeStr = "";
                    var sizeKB = size / 1024;
                    if (parseInt(sizeKB) > 1024)
                    {
                        var sizeMB = sizeKB / 1024;
                        sizeStr = sizeMB.toFixed(2) + " MB";
                    }
                    else
                    {
                        sizeStr = sizeKB.toFixed(2) + " KB";
                    }

                    this.filename.html(name);
                    this.size.html(sizeStr);
                }
                this.setProgress = function(progress)
                {
                    var progressBarWidth = progress * this.progressBar.width() / 100;
                    this.progressBar.find('div').animate({width: progressBarWidth}, 10).html(progress + "% ");
                    if (parseInt(progress) >= 100)
                    {
                        this.abort.hide();
                    }
                }
                this.setAbort = function(jqxhr)
                {
                    var sb = this.statusbar;
                    this.abort.click(function()
                    {
                        jqxhr.abort();
                        sb.hide();
                    });
                }
            }
            function handleFileUpload(files, obj)
            {
                /***Remove the following condition if more than a file should be uploaded at a time, and keep track from the upload handler php action***/
                if (files.length == 1) {
                    for (var i = 0; i < files.length; i++)
                    {
                        var fd = new FormData();
                        fd.append('file', files[i]);

                        var status = new createStatusbar(obj); //Using this we can set progress.
                        status.setFileNameSize(files[i].name, files[i].size);
                        sendFileToServer(fd, status, files[i].name);

                    }
                }else{
                    alert("Only one image can be uploaded a time.");
                }
            }
            function uploadImage(input){
                var files=input.files;
                //console.log(files);
                var obj = $("#dragandrophandler");
                handleFileUpload(files, obj);
            }
            $(document).ready(function()
            {
                var obj = $("#dragandrophandler");
                obj.on('dragenter', function(e)
                {
                    e.stopPropagation();
                    e.preventDefault();
                    $(this).css('border', '2px solid #0B85A1');
                });
                obj.on('dragover', function(e)
                {
                    e.stopPropagation();
                    e.preventDefault();
                });
                obj.on('drop', function(e)
                {

                    $(this).css('border', '2px dotted #0B85A1');
                    e.preventDefault();
                    var files = e.originalEvent.dataTransfer.files;

                    //We need to send dropped files to Server
                    handleFileUpload(files, obj);
                });
                $(document).on('dragenter', function(e)
                {
                    e.stopPropagation();
                    e.preventDefault();
                });
                $(document).on('dragover', function(e)
                {
                    e.stopPropagation();
                    e.preventDefault();
                    obj.css('border', '2px dotted #0B85A1');
                });
                $(document).on('drop', function(e)
                {
                    e.stopPropagation();
                    e.preventDefault();
                });

            });

            function filterCategory(id){
                $.ajax({
                    url: '<?=Yii::app()->request->baseUrl?>/home/filterCategory?id='+id,
                    success: function(data){
                        $('#our_images_filter').html(data);
                    }
                });
            }
            
            function enlarge(pic){
                $('#enlarge_image').attr('src',pic);
                $('#enlarge_modal').click();
            }
        </script>
        <script>
            function showThumb(id){
                $('.new_thumb').css('visibility','hidden');
                $('#'+id).css('visibility','visible');
            }
            function hideThumbs(){
                $('.new_thumb').css('visibility','hidden');
            }
        </script>
        
        <!-- Button trigger modal -->
        <button class="btn btn-primary btn-lg" data-toggle="modal" id="enlarge_modal" style="display:none;" data-target="#myModal">
          Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content " style="border: 0px;">
                <div class="modal-body" style="padding: 0px;">
                  <span style="text-align: center;float: left;width: 100%;">
                    <img src="" id="enlarge_image" style="max-width: 570px;">
                    <button type="button" class="close close-modal-btn" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  </span>
              </div>
            </div>
          </div>
        </div>
        
    </body>
</html>
