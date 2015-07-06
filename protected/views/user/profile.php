<?
/**
 * @var $model User
 * @var $this UserController
 * @var $form CActiveForm
 */
?>

    <div class="inner-box">
        <div class="welcome-msg">
            <h3 class="page-sub-header2 clearfix no-padding">Добрый день, <?=$model->personName;?> </h3>
            <?if($model->lastLogin):?>
                <span class="page-sub-header-sub small">Последний раз Вы заходили <?=Candy::formatDate($model->lastLogin->start_date,Candy::NORMALTIME);?></span>
            <?endif;?>

        </div>
        <div id="accordion" class="panel-group">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB1" data-toggle="collapse"> My details </a> </h4>
                </div>
                <div class="panel-collapse collapse in" id="collapseB1">
                    <div class="panel-body">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'profile-form',
                            'htmlOptions'=>array(
                                'class'=>'form-horizontal',
                                'role'=>'form'
                            )
                        )); ?>
                            <div class="form-group">
                                <?=$form->label($model,'photo_id',array('class'=>'col-sm-3 control-label'));?>
                                <div class="col-sm-9">
                                    <div id="logo_block" class="profile-image">
                                        <span class="rel">
                                            <div class="avatar">
                                                <?=Candy::preview(array($model->photo, 'scale' => User::AVATAR_SIZE),'user')?>
                                            </div>

                                            <?=CHtml::button('Изменить',array('class'=>'btn open-dialog','id'=>'change-photo'));?>

                                            <?php
                                                $this->widget('application.components.MediaEditor.MediaEditor',
                                                    array('data' => array(
                                                        'items' => null,
                                                        'field' => 'photo_id',
                                                        'item_container_id' => 'logo_block',
                                                        'button_image_url' => '/images/intro.png',
                                                        'button_width' => 28,
                                                        'button_height' => 28,
                                                    ),
                                                        'scale' => User::AVATAR_SIZE,
                                                        'scaleMode' => 'in',
                                                        'needfields' => 'false',
                                                        'crop'=>false
                                                    ));
                                            ?>

                                            <?=CHtml::hiddenField('photo_id',$model->photo_id)?>
                                        </span>

                                    </div>
                                    <?=Candy::error($model,'photo_id');?>
                                </div>
                            </div>

                            <div class="form-group">
                                <?=$form->label($model,'name',array('class'=>'col-sm-3 control-label'));?>
                                <div class="col-sm-9">
                                    <?=$form->textField($model,'name',array('class'=>'form-control'));?>
                                    <?=Candy::error($model,'name');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?=$form->label($model,'last_name',array('class'=>'col-sm-3 control-label'));?>
                                <div class="col-sm-9">
                                    <?=$form->textField($model,'last_name',array('class'=>'form-control'));?>
                                    <?=Candy::error($model,'last_name');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?=$form->label($model,'email',array('class'=>'col-sm-3 control-label'));?>
                                <div class="col-sm-9">
                                    <?=$form->emailField($model,'email',array('class'=>'form-control'));?>
                                    <?=Candy::error($model,'email');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <?=$form->label($model,'phone',array('class'=>'col-sm-3 control-label'));?>
                                <div class="col-sm-9">
                                    <?=$form->textField($model,'phone',array('class'=>'form-control','data-mask'=>Candy::MASK_PHONE));?>
                                    <?=Candy::error($model,'phone');?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <?=CHtml::submitButton('Сохранить',array('class'=>"btn btn-default"));?>
                                </div>
                            </div>

                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB2" data-toggle="collapse"> Settings </a> </h4>
                </div>
                <div class="panel-collapse collapse" id="collapseB2">
                    <div class="panel-body">
                        <form class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                            Comments are enabled on my ads </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Confirm Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-9">
                                    <button type="submit" class="btn btn-default">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"> <a href="#collapseB3" data-toggle="collapse"> Preferences </a> </h4>
                </div>
                <div class="panel-collapse collapse" id="collapseB3">
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">
                                        I want to receive newsletter. </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">
                                        I want to receive advice on buying and selling. </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
