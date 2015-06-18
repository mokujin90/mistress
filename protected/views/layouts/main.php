<?php
    /* @var $this Controller */
    Yii::app()->clientScript->registerCssFile('/css/bootstrap.min.css');
    Yii::app()->clientScript->registerCssFile('/css/bootstrap-theme.min.css');
    Yii::app()->clientScript->registerCssFile('/css/normalize.css');
    Yii::app()->clientScript->registerCssFile('/css/style.css');
    Yii::app()->clientScript->registerCssFile('/css/vendor/jquery.fancybox.css');


    #JS
    Yii::app()->clientScript->registerScriptFile('/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCoreScript('jquery');
    Yii::app()->clientScript->registerScriptFile('/js/bootstrap.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile('/js/vendor/jquery.fancybox.pack.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile('/js/confirmDialog.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile('/js/plugins.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile('/js/components.js', CClientScript::POS_END); //js-скрипт для внешней части сайта
    Yii::app()->clientScript->registerScriptFile('/js/controllers.js', CClientScript::POS_END); //js-файл с основными компонентами-синглтонами
    Yii::app()->clientScript->registerScript('route', "route.initJs('".Yii::app()->controller->id."Controller','".$this->getActionName()."')", CClientScript::POS_END);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta name="language" content="ru" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    </head>
    <body>
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-default navbar-inverse" role="navigation">
            <div class="container-fluid">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Оказия</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#">Правила</a></li>
                        <li><a href="#">О проекте</a></li>
                        <li><a href="#">Обратная связь</a></li>
                    </ul>
                    <?if(Yii::app()->user->isGuest):?>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Войти</b> <span class="caret"></span></a>
                                <ul id="login-dp" class="dropdown-menu">
                                    <li>
                                        <?$this->renderPartial('/site/_login')?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?else:?>
                        <ul class="nav navbar-nav navbar-right">
                            <li><?=CHtml::link('Профиль',array('user/profile'))?></li>
                            <li><?=CHtml::link('Выйти',array('user/logout'))?></li>
                        </ul>
                    <?endif;?>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div id="wrap">

            <?php echo $content; ?>

        </div>


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            /*(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
                function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
                e=o.createElement(i);r=o.getElementsByTagName(i)[0];
                e.src='//www.google-analytics.com/analytics.js';
                r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');*/
        </script>
    </body>
</html>
