<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class FrontController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';

   
    public function init() {
        $parameters = Settings::model()->findByPk(1);

        Yii::app()->params['slider_banner_image_width'] = $parameters['slider_banner_image_width'];
        Yii::app()->params['slider_banner_image_height'] = $parameters['slider_banner_image_height'];
        Yii::app()->params['logo_image_width'] = $parameters['logo_image_width'];
        Yii::app()->params['logo_image_height'] = $parameters['logo_image_height'];
        Yii::app()->params['inner_page_image_width'] = $parameters['inner_page_image_width'];
        Yii::app()->params['inner_page_image_height'] = $parameters['inner_page_image_height'];
        Yii::app()->params['testimonial_image_width'] = $parameters['testimonial_image_width'];
        Yii::app()->params['testimonial_image_height'] = $parameters['testimonial_image_height'];
        Yii::app()->params['border_max_width'] = $parameters['border_max_width'];
        Yii::app()->params['border_max_radius'] = $parameters['border_max_radius'];
    }
    
    
    
     protected function registerMainScripts() {
        /**
         * libs
         */
        //Yii::app()->clientScript->registerCoreScript('jquery'); //jQuery
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/libs/bootstrap/bootstrap.js', CClientScript::POS_END); //Bootstrab
        /**
         * ui files
         */
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/front/jquery.transit.min.js', CClientScript::POS_END);
        /**
         * dev files
         */
        //Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . '/js/front/dev.js', CClientScript::POS_END); //Custom js file for developers
    }

}
