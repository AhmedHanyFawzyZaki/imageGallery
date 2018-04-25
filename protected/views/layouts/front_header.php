<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="ahme hany">
        <title><?= Yii::app()->name; ?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?= Yii::app()->getBaseUrl(true); ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?= Yii::app()->getBaseUrl(true); ?>/css/font-awesome.css" rel="stylesheet">
        <!-- Documentation extras -->
        <link href="<?= Yii::app()->getBaseUrl(true); ?>/css/style_front.css" rel="stylesheet">
        <link href="<?= Yii::app()->getBaseUrl(true); ?>/css/animate.css" rel="stylesheet">
        <link href="<?= Yii::app()->getBaseUrl(true); ?>/css/open-sans.css" rel='stylesheet'>
        <link rel="shortcut icon" href="favicon.png">
        <?php
        /*      * ******************fancyBox Class********************** */
        $this->widget('application.extensions.fancybox.EFancyBox', array(
            'target' => '.thumb_img_cont',
            'config' => array(
                'maxWidth' => '98%',
                'maxHeight' => 650,
                'fitToView' => false,
                'width' => '80%',
                'height' => '100%',
                'autoSize' => false,
                'closeClick' => false,
                'openEffect' => 'none',
                'closeEffect' => 'none',
                'type' => 'iframe',
            ),
        ));
        $this->widget('application.extensions.fancybox.EFancyBox', array(
            'target' => '.edit_img',
            'config' => array(
                'maxWidth' => '90%',
                'maxHeight' => 650,
                'fitToView' => false,
                'width' => '72%',
                'height' => '100%',
                'autoSize' => false,
                'closeClick' => false,
                'openEffect' => 'none',
                'closeEffect' => 'none',
                'type' => 'iframe',
            ),
        ));
        ?>
    </head>
    <body>
        <div class="col-md-12 col-xs-12 menu">
            <div class="container">
                <div class="wrap">
                    <nav class="navbar navbar-default" role="navigation">
                        
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <a href="<?=Yii::app()->request->baseUrl?>/dashboard/logout" class="pull-right">Logout</a>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        
                    </nav>
                </div>
            </div>
        </div><!--end menu-->