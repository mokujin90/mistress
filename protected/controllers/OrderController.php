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

    /**
     * Создание и редактирование заявки
     * @param null $id
     * @throws CHttpException
     */
    public function actionUpdate($id = null)
    {
        $this->json = array('error' => 0);
        if (is_null($id)) {
            $model = new Order();
            $model->user_create = Yii::app()->user->id;
            $from = Destinations::initialize(Destinations::T_FROM);
            $where = array(Destinations::initialize(Destinations::T_WHERE));
        } else {
            $model = $this->loadModel('Order', null, $id);
            if ($model->user_create != Yii::app()->user->id) {
                throw new CHttpException(403, 'Ошибка прав.');
            }
            $from = $model->from;
            $where = Destinations::model()->findAllByAttributes(array('order_id' => $model->id, 'type' => Destinations::T_WHERE));

        }
        if (isset($_REQUEST[CHtml::modelName($model)])) {
            $model->setAttributes($_REQUEST[CHtml::modelName($model)]);
            $destList = array(); //список всех моделей новых и нет
            //перед сохранением создадим единый массив из новых и старых
            if (isset($_REQUEST['Destinations'])) {

                //валидация заказа
                if(!$model->validate()){
                    $this->json = array('error'=>1,'errors_order'=>$model->errors);
                }
                //валидация направлений
                foreach ($_REQUEST['Destinations']['id'] as $key => $id) {
                    $destination = empty($id) ? new Destinations('insert') : Destinations::model()->findByPk($id);
                    if (is_null($destination))
                        continue;
                    foreach ($_REQUEST['Destinations'] as $attr => $values) {
                        $destination->setAttribute($attr, $values[$key]);
                    }
                    $destList[$key] = $destination;

                    $isValid = $destination->validate(array_diff(array_keys($destination->attributes),array('order_id')));
                    if (!$isValid) {
                        $this->json['error'] = 1;
                        $this->json['errors'][$key] = $destination->errors;
                    }
                }
            }
            if ($this->json['error'] == 0) { //выплюнем ошибок
                if ($model->save()) {
                    foreach ($destList as $item) {
                        $item->order_id = $model->id;
                        $item->save();
                    }
                    $this->json['href'] = $this->createUrl('update',array('id'=>$model->id));
                }
            }
            $this->renderJSON($this->json);
        }
        $this->render('update', array('model' => $model, 'from' => $from, 'where' => $where));
    }

    public function actionAjaxType($type)
    {
        $this->blockJquery();
        $this->renderPartial('_' . $type, array(
                'form' => new CActiveForm(),
                'from' => Destinations::initialize(Destinations::T_FROM),
                'where' => array(Destinations::initialize(Destinations::T_WHERE))),
            false, true
        );
    }

    public function actionAjaxAddDestination()
    {

        $this->renderPartial('_destination', array('model' => Destinations::initialize(Destinations::T_WHERE), 'form' => new CActiveForm()), false, true);
    }
}