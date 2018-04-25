<?php

class HomeController extends FrontController {

    public $layout = '//layouts/front_main';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        
        $criteria = new CDbCriteria;
        $criteria->condition='user_id='.Yii::app()->user->id;
        $total = count(ImageLib::model()->findAll($criteria));
        $pages = new CPagination($total);
        $pages->pageSize = 21;
        $pages->applyLimit($criteria);
        $my_images = ImageLib::model()->findAll($criteria);
        
        //$my_images=ImageLib::model()->findAll(array('condition'=>'user_id='.Yii::app()->user->id));
        $our_images=  CategorizedImage::model()->findAll();
        $categories= Category::model()->findAll();
        $this->render('index', array('my_images'=>$my_images,'categories'=>$categories,'our_images'=>$our_images,'myimages_pages'=>$pages));
    }
    
    public function actionFilterCategory(){
        $id=$_REQUEST['id'];
        if($id==0)
            $our_images=  CategorizedImage::model()->findAll();
        else
            $our_images=  CategorizedImage::model()->findAll(array('condition'=>'cat_id='.$id));
        if($our_images){
            foreach ($our_images as $oi){
                echo '<div class="image_container" onmouseover="showThumb(\'cat_th_'.$oi->id.'\')" onmouseout="hideThumbs()">
                        <span onclick="enlarge(\''.Yii::app()->request->baseUrl.'/media/'.$oi->image.'\')" class="enlarger">
                            <i class="fa fa-search-plus"></i>
                        </span>
                        <a href="'.Yii::app()->request->baseUrl.'/home/crop/'.$oi->id.'?type=cat" class="thumb_img_cont">
                            <img src="'.Yii::app()->request->baseUrl.'/media/small_thumb/'.$oi->image.'" class="thumb_img">
                        </a>
                        <a href="'.Yii::app()->request->baseUrl.'/home/editImage/'.$oi->id.'?type=cat" class="edit_img">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <div class="new_thumb" id="cat_th_'.$oi->id.'">
                            <img src="'.Yii::app()->request->baseUrl.'/media/large_thumb/'.$oi->image.'" width="250">
                        </div>
                    </div>';
            }
        }else{
            echo '<span class="empty_our_image">No images found.</span>';
        }
    }

    public function actionImageUpload() {
        $output_dir = Yii::app()->basePath.'/../media/';
        if (isset($_FILES["file"])) {
            //Filter the file types , if you want.
            if ($_FILES["file"]["error"] > 0) {
                //echo "Error: " . $_FILES["file"]["error"];
                $response=array('status'=>'error','content'=>$_FILES["file"]["error"]);
            } else {
                $img_name=time().'---'.$_FILES["file"]["name"];
                if(move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir. $img_name)){
                    chmod($output_dir. $img_name, 0755);
                    //Helper::resize(735,480,$img_name);
                    // Resize Image
                    $thumb = Yii::app()->phpThumb->create(Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . '/media/' . $img_name);
    //listing image
                    $thumb->resize(735);
                    $thumb->save(Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . '/media/large_thumb/' . $img_name);
    // slider image
                    $thumb->resize(150);
                    $thumb->save(Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . '/media/small_thumb/' . $img_name);
                    $model=new ImageLib;
                    $model->image=$img_name;
                    $model->user_id=Yii::app()->user->id;
                    if($model->save(false)){
                        $response=array('status'=>'success','content'=>$img_name, 'id'=>$model->id);
                    }else{
                        $response=array('status'=>'error','content'=>'Can\'t save image to database!');
                    }
                    //echo "Uploaded File :" . $img_name;
                }else{
                    $response=array('status'=>'error','content'=>'Please verify that your upload folder exists and is writable!');
                }
            }
        }else{
            $response=array('status'=>'error','content'=>'No files uploaded!');
        }
        echo json_encode($response);
    }
    
    public function actionEditImage($id){
        $this->layout=' ';
        if(isset($_GET['type']) && $id){
            if ($_GET['type']=='cat'){
                $image= CategorizedImage::model()->findByPk($id)->image;
                $type=0;
            }elseif ($_GET['type']=='lib'){
                $image=  ImageLib::model()->findByPk($id)->image;
                $type=1;
            }
            $model=  ImageOption::model()->findByAttributes(array('image_id'=>$id,'user_id'=>Yii::app()->user->id,'type'=>$type));
            if(!$model){
                $model=new ImageOption;
                $model->image_id=$id;
                $model->user_id=Yii::app()->user->id;
                $model->type=$type;
            }
            if(isset($_POST['ImageOption'])){
                $model->attributes=$_POST['ImageOption'];
                $model->border_radius=implode('px ',$_POST['r']).'px';
                $model->save(false);
            }
            $this->render('edit',array('image'=>$image,'model'=>$model));
        }
    }
    
    public function actionCrop($id){
        $this->layout=' ';
        if(isset($_GET['type']) && $id){
            if ($_GET['type']=='cat'){
                $image= CategorizedImage::model()->findByPk($id)->image;
            }elseif ($_GET['type']=='lib'){
                $image=  ImageLib::model()->findByPk($id)->image;
            }
            $this->render('crop',array('image'=>$image));
        }
    }
    public function actionApplyCrop(){
        $this->layout=' ';
        if(isset($_POST['image'])){
            $src=Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . '/media/' .$_POST['image'];
            $dst=Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . '/media/' . $_POST['destination_image_name'];
            $thumb_width=$_POST['w'];
            $thumb_height=$_POST['h'];
            $translate_x=$_POST['x'];
            $translate_y=$_POST['y'];
            
            if($arr = getimagesize($src)){
                    //echo "Unsupported picture type!";die;
                //var_dump($arr);die;
                $w=$arr[0];
                $h=$arr[1];
            }
            $type = strtolower(substr(strrchr($src,"."),1));
            //echo $w.'w'.$h.'h'.$type;die;
            if($type == 'jpeg') 
                $type = 'jpg';
            switch($type){
              case 'bmp': $img = imagecreatefromwbmp($src); break;
              case 'gif': $img = imagecreatefromgif($src); break;
              case 'jpg': $img = imagecreatefromjpeg($src); break;
              case 'png': $img = imagecreatefrompng($src); break;
              default : return "Unsupported picture type!";
            }
            $new = imagecreatetruecolor($thumb_width, $thumb_height);
            if($type == "gif" or $type == "png"){
                imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
                imagealphablending($new, false);
                imagesavealpha($new, true);
            }
            imagecopy($new, $img, 0, 0, $translate_x, $translate_y, $w, $h);
            //imagecopyresampled($new, $img, $thumb_width/2, $thumb_height/2, $translate_x, $translate_y, $thumb_width, $thumb_height, $w, $h);
            //imagefilledrectangle($new,$translate_x, $translate_y,$translate_x+$thumb_width, $translate_y+$thumb_height,$img);
            switch($type){
                case 'bmp': imagewbmp($new, $dst.'.bmp'); break;
                case 'gif': imagegif($new, $dst.'.gif'); break;
                case 'jpg': imagejpeg($new, $dst.'.jpg'); break;
                case 'png': imagepng($new, $dst.'.png'); break;
            }
            /****Create thumb to play the same role of the uploaded images****/
            $img_name=$_POST['destination_image_name'].'.'.$type;
            $thumb = Yii::app()->phpThumb->create(Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . '/media/' . $img_name);
    //listing image
            $thumb->resize(735);
            $thumb->save(Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . '/media/large_thumb/' . $img_name);
// slider image
            $thumb->resize(150);
            $thumb->save(Yii::app()->basePath . DIRECTORY_SEPARATOR . '..' . '/media/small_thumb/' . $img_name);
            
            /**save to database for future use**/
            $model=new ImageLib;
            $model->user_id=Yii::app()->user->id;
            $model->image=$img_name;
            if($model->save(false)){
                chmod($dst.'.' .$type, 0755);
                $this->redirect('editImage/'.$model->id.'?type=lib');
            }
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $report = false;
        if (isset($_POST['Report'])) {
            $model = new Report;
            $model->attributes = $_POST['Report'];
            $model->date_create = date('Y-m-d H:i:s');
            $model->page = filter_input(INPUT_SERVER, 'HTTP_REFERER');
            if ($model->save())
                $report = true;
        }

        $error = Yii::app()->errorHandler->error;
        $error['report'] = $report;

        if (Yii::app()->request->isAjaxRequest) {
            echo $error['message'];
            return;
        }
        $this->renderPartial('error', $error);
    }
    
    protected function beforeAction(){
        if(Yii::app()->user->id){
            return true;
        }else{
            $this->redirect(array('/dashboard'));
        }
    }

    /**
     * Displays the contact page
     */
}
