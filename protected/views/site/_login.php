<div class="row">
    <div class="col-md-12">
        <?$model = new LoginForm;?>
        <?php $form=$this->beginWidget('CActiveForm', array(
            'id'=>'login-form',
            'action'=>$this->createUrl('user/login'),
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
            <?=CHtml::submitButton('Войти',array('class'=>"btn btn-primary btn-block ajax-login"))?>
        </div>
        <div class="checkbox">
            <label>
                <?php echo $form->checkBox($model,'rememberMe'); ?> Запомнить меня
            </label>
            <?php echo $form->error($model,'rememberMe'); ?>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div class="bottom text-center">
        Нет аккаунта? <?php echo CHtml::link(Yii::t('main','Зарегестрироваться'),array('user/register'),array())?>
    </div>
</div>