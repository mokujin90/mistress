<?php
/* @var $this Controller */
Yii::app()->clientScript->registerCssFile('/css/bootstrap.min.css');
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

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BOOTCLASIFIED - Responsive Classified Theme</title>
    <link href="/css/test/style.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body class="pace-done">
<div class="pace pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div>
</div>
<div id="wrapper">
    <div class="header">
        <nav class="navbar navbar-site navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a href="/" class="navbar-brand logo logo-title">
                        <span class="logo-icon"><i class="fa fa-refresh fa-spin"></i> </span>
                        OCCA<span>SION</span>
                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="login.html">Login</a></li>
                        <li><a href="signup.html">Signup</a></li>
                        <li class="postadd">
                            <a class="btn btn-block btn-border btn-post btn-danger" href="post-ads.html">Новое объявлние</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <?php echo $content; ?>
    <div class="page-bottom-info">
        <div class="page-bottom-info-inner">
            <div class="page-bottom-info-content text-center">
                <div class="col-md-12 text-center">
                    <a href="/" class="social-link"><i class=" fa fa-twitter"></i></a>
                    <a href="/" class="social-link"><i class=" fa fa-facebook"></i></a>
                    <a href="/" class="social-link"><i class=" fa fa-vk"></i></a>
                    <a href="/" class="social-link"><i class=" fa fa-youtube"></i></a>
                    <a href="/" class="social-link"><i class=" fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer" id="footer">
        <div class="container">
            <ul class=" pull-left navbar-link footer-nav">
                <li><a href="index.html"> Home </a> <a href="about-us.html"> About us </a> <a href="#"> Terms and
                        Conditions </a> <a href="#"> Privacy Policy </a> <a href="contact.html"> Contact us </a> <a
                        href="faq.html"> FAQ </a>
                </li>
            </ul>
            <ul class=" pull-right navbar-link footer-nav">
                <li> © 2015 BootClassified</li>
            </ul>
        </div>
    </div>

</div>
</body>
</html>