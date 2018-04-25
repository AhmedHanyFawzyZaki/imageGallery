<?php
class DashboardController extends Controller
{
    public $pageTitlecrumbs;
    public function init(){
        // set the default theme for any other controller that inherit the admin controller
        Yii::app()->theme = 'bootstrap';
    }
    

    public function actionIndex()
    {
        $this->layout='column2';
        //$this->render('index');
        //groups id 1 form super admin and 2 for admin 
        if((! Yii::app()->user->isGuest)  and (Yii::app()->user->getState('group') == 1 or Yii::app()->user->getState('group') == 2) )
        {
            $this->render('dashboard');
        }elseif((! Yii::app()->user->isGuest))
        {
            $this->redirect(array('/home'));
        }else{
            $model=new LoginForm;
            // if it is ajax validation request
            if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
            // collect user input data
            if(isset($_POST['LoginForm']))
            {
                $model->attributes=$_POST['LoginForm'];
                // validate user input and redirect to the previous page if valid
                if($model->validate() && $model->login())
                $this->redirect(array('/home/index')	);
            }

            // display the login form
            $this->renderPartial('login',array('model'=>$model));
        }
    }

    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl.'/dashboard');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('dashboard/error', $error);
        }
    }

    public function actionAjaxRequest() 
    {
        if (Yii::app()->user->getState('wide_screen') == 1) {
            Yii::app()->user->setState('wide_screen', '0');
        } else if (Yii::app()->user->getState('wide_screen') == 0) {
            Yii::app()->user->setState('wide_screen', '1');
        }
        Yii::app()->end();
    }
    
    public function actionReset($hash)
    {
        //$this->layout='column2';
        $criteria=new CDbCriteria;
        $criteria->condition='pass_code=:Hash and pass_reset=1';
        $criteria->params=array(':Hash'=>$hash);
        $user_found=User::model()->find($criteria);
        if(count($user_found) ==0){
            $flag=0;
            Yii::app()->user->setFlash('ErrorMsg','Sorry you have followed a wrong link .');
        }else{
            $flag=1;
        }
        $model= new User('passreset');
        if(isset($_POST['User']) and count($user_found)!=0)
        {
            $model->attributes=$_POST['User'];
            $user_found->pass_reset=0;
            $user_found->pass_code='';
            $user_found->password=$model->newpassword=$_POST['User']['newpassword'];

            $user_found->save(false);
            Yii::app()->user->setFlash('ErrorMsg', ' Please Login with your new credentials');

            $this->redirect(array('index'));
        }
        $this->renderPartial('resetpass' ,array('model'=>$model,'flag'=>$flag));
	}
}
