<?php

class DestinationController extends BaseController
{
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
                'actions' => array('*'),
                'users' => array('@'),
            ),
        );
    }

    /**
     * Отобразить карту и на ней отобразить место встречи
     * @param null $id
     */
    public function actionMap($id = null)
    {
        $this->layout = 'simple';
        $model = is_null($id) ? new Destinations() :Destinations::model()->findByPk($id);

        $this->render('map',array('model'=>$model));
    }
}