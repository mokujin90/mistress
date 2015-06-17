<?php
    /* @var $this Controller */
    Yii::app()->clientScript->registerCssFile('/css/bootstrap.min.css');
    Yii::app()->clientScript->registerCssFile('/css/bootstrap-theme.min.css');
    Yii::app()->clientScript->registerCssFile('/css/normalize.css');
    Yii::app()->clientScript->registerCssFile('/css/style.css');


    #JS
    Yii::app()->clientScript->registerScriptFile('/js/vendor/modernizr-2.6.2.min.js', CClientScript::POS_HEAD);
    Yii::app()->clientScript->registerCoreScript('jquery');
    Yii::app()->clientScript->registerScriptFile('/js/bootstrap.min.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile('/js/plugins.js', CClientScript::POS_END);
    Yii::app()->clientScript->registerScriptFile('/js/components.js', CClientScript::POS_END); //js-файл с основными компонентами-синглтонами
    Yii::app()->clientScript->registerScriptFile('/js/main.js', CClientScript::POS_END); //js-скрипт для внешней части сайта
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

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?$model = new LoginForm;?>
                                            <?php $form=$this->beginWidget('CActiveForm', array(
                                                'id'=>'login-form',
                                                'htmlOptions'=>array(
                                                    'role'=>'form',
                                                    'class'=>'login-form',
                                                    'accept-charset'=>'UTF-8'
                                                )
                                            )); ?>

                                                <div class="form-group">
                                                    <?php echo $form->labelEx($model,'username',array('class'=>'sr-only')); ?>
                                                    <?php echo $form->textField($model,'username',array('class'=>'form-control','placeholder'=>'Логин')); ?>
                                                    <?php echo $form->error($model,'username'); ?>
                                                </div>
                                                <div class="form-group">
                                                    <?php echo $form->labelEx($model,'password',array('class'=>'sr-only')); ?>
                                                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control','placeholder'=>'Пароль')); ?>
                                                    <?php echo $form->error($model,'password'); ?>
                                                    <label class="sr-only" for="exampleInputPassword2">Пароль</label>
                                                    <div class="help-block text-right"><a href="#">Забыли пароль?</a></div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block">Войти</button>
                                                </div>
                                                <div class="checkbox">



                                                </div>
                                                    <label>
                                                        <?php echo $form->checkBox($model,'rememberMe'); ?> Запомнить меня
                                                    </label>
                                                    <?php echo $form->error($model,'rememberMe'); ?>
                                                </div>
                                            <?php $this->endWidget(); ?>
                                        </div>
                                        <div class="bottom text-center">
                                            Нет аккаунта? <?php echo CHtml::link(Yii::t('main','Зарегестрироваться'),'user/register',array())?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
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
