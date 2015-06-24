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

    public function actionUpdate($id = null)
    {
        if(is_null($id)){
            $model = new Order();
            $model->user_create = Yii::app()->user->id;
            $from = Destinations::initialize(Destinations::T_FROM);
            $where = array(Destinations::initialize(Destinations::T_WHERE));
        }
        else{
            $model = $this->loadModel('Order',null,$id);
            if($model->user_create != Yii::app()->user->id){
                throw new CHttpException(403, 'Ошибка прав.');
            }
            $from = $model->from;
            $where = Destinations::model()->findAllByAttributes(array('order_id'=>$model->id,'type'=>Destinations::T_WHERE));

        }
        if(isset($_REQUEST[CHtml::modelName($model)])){
            $model->setAttributes($_REQUEST[CHtml::modelName($model)]);
            if($model->save()){
                if(isset($_REQUEST['new']['Destinations'])){
                    foreach($_REQUEST['new']['Destinations']['name'] as $key=>$value){
                        $destination = new Destinations();
                        foreach($_REQUEST['new']['Destinations'] as $attr=>$values){
                            $destination->setAttribute($attr,$values[$key]);
                        }
                        $destination->order_id = $model->id;
                        $destination->save();
                    }
                }
                if(isset($_REQUEST['Destinations'])){
                    foreach($_REQUEST['Destinations']['name'] as $key=>$value){
                        $destination = Destinations::model()->findByPk($_REQUEST['Destinations']['id'][$key]);
                        if(is_null($destination) || $destination->order_id != $model->id){
                            continue; //если нет такого направления или оно не принадлежит к текущему заказу
                        }
                        foreach($_REQUEST['Destinations'] as $attr=>$values){
                            $destination->setAttribute($attr,$values[$key]);
                        }
                        $destination->save();
                    }
                }
                $this->redirect(array('update','id'=>$model->id));
            }

        }
        $this->render('update', array('model' => $model, 'from' => $from, 'where' => $where));
    }

    public function actionAjaxType($type){
        $this->blockJquery();
        $this->renderPartial('_'.$type,array(
            'form'=>new CActiveForm(),
            'from' =>  Destinations::initialize(Destinations::T_FROM),
            'where' => array(Destinations::initialize(Destinations::T_WHERE))),
            false,true
        );
    }

    public function actionAjaxAddDestination(){

        $this->renderPartial('_destination',array('model'=>Destinations::initialize(Destinations::T_WHERE),'form'=>new CActiveForm()),false,true);
    }
}