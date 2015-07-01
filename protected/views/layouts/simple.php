<?php
/* @var $this Controller */
Yii::app()->clientScript->registerCssFile('/css/bootstrap.min.css');
Yii::app()->clientScript->registerCssFile('/css/normalize.css');
Yii::app()->clientScript->registerCssFile('/css/style.css');
Yii::app()->clientScript->registerCssFile('/css/vendor/jquery.fancybox.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->clientScript->getCoreScriptUrl(). '/jui/css/base/jquery-ui.css');


#JS
Yii::app()->clientScript->registerScriptFile('/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_HEAD);
Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerScriptFile('/js/bootstrap.min.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('/js/vendor/jquery.fancybox.pack.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('/js/confirmDialog.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('/js/plugins.js', CClientScript::POS_END);
Yii::app()->clientScript->registerScriptFile('/js/components.js', CClientScript::POS_END); //js-скрипт для внешней части сайта
Yii::app()->clientScript->registerScriptFile('/js/controllers.js', CClientScript::POS_END); //js-файл с основными компонентами-синглтонами
Yii::app()->clientScript->registerScript('route', "route.initJs('".Yii::app()->controller->id."Controller','".$this->getActionName()."')", CClientScript::POS_END);
?>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/test/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body class="pace-done">
    <?=$content;?>
</body>
</html>