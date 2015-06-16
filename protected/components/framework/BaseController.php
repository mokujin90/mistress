<?php

class BaseController extends CController
{
    public $layout = '//layouts/column2';

    public $breadcrumbs = array();

    public $mailer;
    /**
     * @var User
     */
    public $user;

    public function init()
    {
        header('Content-Type: text/html; charset=utf-8');
        if (!Yii::app()->user->isGuest) {
            $this->user = User::model()->findByPk(Yii::app()->user->id);
        }

        parent::init();
    }

    public function redirectByRole()
    {
        $this->redirect('/');
    }

    public function getPageTitle()
    {
        $path = array();
        $breadcrumbs = $this->breadcrumbs;
        foreach ($breadcrumbs as $item) {
            $path = array_merge(array($item['name']), $path);
        }

        $title = implode(' | ', array_merge($path, array(Yii::app()->name)));

        return $title;
    }


    public function loadModel($modelName, $paramName = null, $id = null)
    {
        if (!$id) {
            if (isset($paramName) && isset($_GET[$paramName])) {
                $id = $_GET[$paramName];
            } else if (isset($_GET['modelId'])) {
                $id = $_GET['modelId'];
            }
        }
        if ($id) {
            $criteria = new CDbCriteria();
            $criteria->addColumnCondition(array('id' => $id));
            $model = CActiveRecord::model($modelName)->find($criteria);
        }
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Иногда при загрузки формы через fancybox и нахождения в ней CActiveForm назло второй раз прогружается jquery
     */
    public function blockJquery()
    {
        if (Yii::app()->request->isAjaxRequest) {
            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery.ui.min.js'] = false;
            Yii::app()->clientScript->scriptMap['jquery.ui.js'] = false;
        }
    }

    /**
     * Сахар для ajax-валидации и закрытия приложения
     * @param array $data
     */
    public function renderJSON($data)
    {
        header('Content-type: application/json');
        echo CJSON::encode($data);
        foreach (Yii::app()->log->routes as $route) {
            if ($route instanceof CWebLogRoute) {
                $route->enabled = false; // закрыть ведени всех логов
            }
        }
        Yii::app()->end();
    }

    /**
     * Геттер для куки
     * @param $name
     * @return string
     */
    public function getCookie($name)
    {
        $cookie = Yii::app()->request->cookies[$name];
        return $cookie->value;
    }

    /**
     * Сеттер для cookie
     * @param $name
     * @param $value
     */
    public function setCookie($name, $value)
    {
        $cookie = new CHttpCookie($name, $value);
        Yii::app()->request->cookies[$name] = $cookie;
    }

    /**
     * Сахар, который поможет в создании пейджера на страницах с обычной критерией
     *
     * @param CDbCriteria|CDbCommand $criteria ссылка на критерию, к которой применится applyLimit
     * @param str $modelName название модели
     * @param int $pageCount необходимое количество элементов на странице
     * @return $pager CPagination
     *
     * @see http://rmcreative.ru/blog/post/postranichnaja-razbivka-v-yii
     */
    public function applyLimit(CComponent &$query, $modelName = null, $pageCount = 10)
    {
        $pages = new CPagination();
        if (is_a($query, 'CDbCriteria')) {
            #все из-за проблемы, и того что запрос не исполняется если там если там GROUP BY + CActiveRecord::count()
            $count = $query->group == '' ? CActiveRecord::model($modelName)->count($query) : count(CActiveRecord::model($modelName)->findAll($query));
            $pages->setItemCount($count);
            $pages->pageSize = $pageCount; // элементов на страницу
            $pages->applyLimit($query);
        } elseif (is_a($query, 'CDbCommand')) {
            $dataProvider = new CArrayDataProvider($query->queryAll(), array(
                'pagination' => array(
                    'pageSize' => $pageCount,
                ),
            ));
            $query = $dataProvider->getData();
            return $dataProvider->pagination;
        }
        return $pages;
    }

    public function getActionName()
    {
        return Yii::app()->controller->action->id;
    }

    /**
     * Вернуть новую ссылку вместе с текущим гетов
     * @param $route новый путь
     * @param array $params новые параметры
     * @param string $ampersand
     * @return string
     */
    public function createMergeUrl($route,$params=array(), $ampersand='&'){
        $paramsWithGet = $_GET;

        foreach($params as $key => $value){
            $paramsWithGet[$key] = $value;
        }
        return $this->createUrl($route,array(),$ampersand)."?".http_build_query($paramsWithGet);

    }
}