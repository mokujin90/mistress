<?
/**
 * @var User $model
 * @var CActiveForm $form
 */
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8 page-content">
                <div class="inner-box category-content">
                    <h2 class="title-2"> <i class="icon-user-add"></i> Регистрация </h2>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'register-form',
                                'htmlOptions'=>array(
                                    'class'=>'form-horizontal'
                                )
                            )); ?>
                                <fieldset>
                                    <div class="form-group required">
                                        <?php echo $form->labelEx($model,'name',array('class'=>'col-md-4 control-label')); ?>
                                        <div class="col-md-6">
                                            <?php echo $form->textField($model,'name',array('class'=>'form-control input-md')); ?>
                                            <?php echo $form->error($model,'name'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <?php echo $form->labelEx($model,'last_name',array('class'=>'col-md-4 control-label')); ?>
                                        <div class="col-md-6">
                                            <?php echo $form->textField($model,'last_name',array('class'=>'form-control input-md')); ?>
                                            <?php echo $form->error($model,'last_name'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <?php echo $form->labelEx($model,'phone',array('class'=>'col-md-4 control-label')); ?>
                                        <div class="col-md-6">
                                            <?php echo $form->textField($model,'phone',array('class'=>'form-control input-md','data-mask'=>'+0 (000) - 000 - 0000')); ?>
                                            <?php echo $form->error($model,'phone'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <?php echo $form->labelEx($model,'email',array('class'=>'col-md-4 control-label')); ?>
                                        <div class="col-md-6">
                                            <?php echo $form->emailField($model,'email',array('class'=>'form-control input-md')); ?>
                                            <?php echo $form->error($model,'email'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <?php echo $form->labelEx($model,'login',array('class'=>'col-md-4 control-label')); ?>
                                        <div class="col-md-6">
                                            <?php echo $form->textField($model,'login',array('class'=>'form-control input-md')); ?>
                                            <?php echo $form->error($model,'login'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <?php echo $form->labelEx($model,'password',array('class'=>'col-md-4 control-label')); ?>
                                        <div class="col-md-6">
                                            <?php echo $form->passwordField($model,'password',array('class'=>'form-control input-md')); ?>
                                            <?php echo $form->error($model,'password'); ?>
                                            <p class="help-block">At least 5 characters  </p>
                                        </div>
                                    </div>

                                    <div class="form-group required">
                                        <?php echo $form->labelEx($model,'password_repeat',array('class'=>'col-md-4 control-label')); ?>
                                        <div class="col-md-6">
                                            <?php echo $form->passwordField($model,'password_repeat',array('class'=>'form-control input-md')); ?>
                                            <?php echo $form->error($model,'password_repeat'); ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label"></label>
                                        <div class="col-md-8">
                                            <div class="termbox mb10">
                                                <label class="checkbox-inline" for="checkboxes-1">
                                                    <input name="checkboxes" id="checkboxes-1" value="1" type="checkbox">
                                                    I have read and agree to the <a href="http://templatecycle.com/demo/bootclassified/terms-conditions.html">Terms &amp; Conditions</a> </label>
                                            </div>
                                            <div style="clear:both"></div>
                                            <?=CHtml::submitButton('Регистрация',array('class'=>"btn btn-primary"))?>
                                    </div>
                                </fieldset>
                            <?php $this->endWidget(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 reg-sidebar">
                <div class="reg-sidebar-inner text-center">
                    <div class="promo-text-box"> <i class=" icon-picture fa fa-4x icon-color-1"></i>
                        <h3><strong>Post a Free Classified</strong></h3>
                        <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    </div>
                    <div class="promo-text-box"> <i class=" icon-pencil-circled fa fa-4x icon-color-2"></i>
                        <h3><strong>Create and Manage Items</strong></h3>
                        <p> Nam sit amet dui vel orci venenatis ullamcorper eget in lacus.
                            Praesent tristique elit pharetra magna efficitur laoreet.</p>
                    </div>
                    <div class="promo-text-box"> <i class="  icon-heart-2 fa fa-4x icon-color-3"></i>
                        <h3><strong>Create your Favorite ads list.</strong></h3>
                        <p> PostNullam quis orci ut ipsum mollis malesuada varius eget metus.
                            Nulla aliquet dui sed quam iaculis, ut finibus massa tincidunt.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>`