<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 login-box">
                <div class="panel panel-default">
                    <div class="panel-intro text-center">
                        <h2 class="logo-title">

                            <span class="logo-icon"><i class="icon icon-search-1 ln-shadow-logo shape-0"></i> </span> BOOT<span>CLASSIFIED </span> </h2>
                    </div>
                    <div class="panel-body">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'login-form',
                            'htmlOptions'=>array(
                                'role'=>'form'
                            )
                        )); ?>
                            <div class="form-group">
                                <label for="sender-email" class="control-label"><?php echo $form->labelEx($model,'username'); ?>:</label>
                                <div class="input-icon"> <i class="icon-user fa"></i>
                                    <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'username'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="user-pass" class="control-label"><?php echo $form->labelEx($model,'password'); ?>:</label>
                                <div class="input-icon"> <i class="icon-lock fa"></i>
                                    <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                                    <?php echo $form->error($model,'password'); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?=CHtml::submitButton('Войти',array('class'=>'btn btn-primary  btn-block'))?>
                            </div>
                        <?php $this->endWidget(); ?>
                    </div>
                    <div class="panel-footer">
                        <label class="checkbox pull-left">
                            <?php echo $form->checkBox($model,'rememberMe'); ?>
                            <?php echo $form->error($model,'rememberMe'); ?>
                            <?=$model->getAttributeLabel('rememberMe')?> </label>
                        <p class="text-center pull-right"> <a href="forgot-password.html"> Lost your password? </a> </p>
                        <div style=" clear:both"></div>
                    </div>
                </div>
                <div class="login-box-btm text-center">
                    <p> Don't have an account? <br>
                        <a href="signup.html"><strong>Sign Up !</strong> </a> </p>
                </div>
            </div>
        </div>
    </div>
</div>