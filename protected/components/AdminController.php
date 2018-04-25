<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class AdminController extends Controller {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column2';
    public $pageTitlecrumbs;

    public function init() {
        // set the default theme for any other controller that inherit the admin controller
        Yii::app()->theme = 'bootstrap';

        $parameters = Settings::model()->findByPk(1);

        /*Yii::app()->params['twitter'] = $parameters['twitter'];
        Yii::app()->params['support_email'] = $parameters['support_email'];
        Yii::app()->params['email'] = $parameters['email'];
        Yii::app()->params['adminEmail'] = $parameters['email'];
        Yii::app()->params['facebook'] = $parameters['facebook'];
        Yii::app()->params['paypal_email'] = $parameters['paypal_email'];
        Yii::app()->params['address'] = $parameters['address'];

        Yii::app()->Paypal->apiUsername = $parameters['api_username'];
        Yii::app()->Paypal->apiPassword = $parameters['api_password'];
        Yii::app()->Paypal->apiSignature = $parameters['signature'];
        if ($parameters['paypal_live'] == 1)
            Yii::app()->Paypal->apiLive = true;
        else
            Yii::app()->Paypal->apiLive = false;*/
    }

}
