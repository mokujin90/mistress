<?php

class OrderController extends BaseController
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

    public function actionCreate()
    {
        $model = new Order();
        $from = Destinations::initialize(Destinations::T_FROM);
        $where = Destinations::initialize(Destinations::T_WHERE);
        $this->render('update',array('model'=>$model,'from'=>$from,'where'=>$where));
    }
}