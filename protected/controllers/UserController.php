<?php

class UserController extends BaseController
{
    public $defaultAction = 'login';

    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('deny',
                'actions' => array('login', 'register'),
                'users' => array('@'),
            ),
        );
    }

    public function actionLogin()
    {
        if (!Yii::app()->user->isGuest) {
            $this->redirectByRole();
        }

        $model = new LoginForm;
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            if ($model->validate() && $model->login()) {
                $this->redirectByRole();
            }
        }
        $this->render('login', array('model' => $model));
    }

    public function actionLogout()
    {
        Yii::app()->user->logout(false);
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRegister()
    {
        $model = new User('signup');
        if (Yii::app()->request->isPostRequest) {
            $model->attributes = $_REQUEST[CHtml::modelName($model)];
            $model->level_id = User::DEF_LEVEL;
            if ($model->save()) {
                //Mail::send($model->email, Yii::t('main', 'Подтверждение регистрации'), 'register', array('model' => $model));
                $this->redirect($this->createUrl('site/index'));
            }
        }
        $this->render('register', array('model' => $model));
    }


    /**
     * Подтверждение от пользователя в регистрации
     * @param $id
     * @param $hash
     */
    public function actionConfirm($id, $hash)
    {
        /*$model = User::model()->findByPk($id);
        if (!$model || $model->is_active) {
            throw new CHttpException(404, Yii::t('main', 'Указанная запись не найдена'));
        }
        if ($model->hash() != $hash) {
            throw new CHttpException(403, Yii::t('main', 'Нет пути'));
        }
        $model->is_active = 1;
        if ($model->save()) {
            $model->autologin();
        }
        $this->redirect($this->createUrl('user/profile'));*/
    }
}