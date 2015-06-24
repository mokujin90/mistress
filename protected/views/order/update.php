<?php
/**
 *
 * @var OrderController $this
 * @var Order $model
 * @var Destinations $from
 * @var Destinations $where
 * @var CActiveForm $form
 */
?>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-9 page-content">
            <div class="inner-box category-content">
            <h2 class="title-2 uppercase"><strong> <i class="icon-docs"></i> Post a Free Classified Ad</strong> </h2>
                <div class="row">
                    <div class="col-sm-12">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'order-form',
                            'htmlOptions'=>array(
                                'class'=>'form-horizontal'
                            )
                        )); ?>
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"><?=$model->getAttributeLabel('type')?></label>
                                    <div class="col-md-8">
                                        <label class="radio-inline" for="radios-0">
                                            <?=CHtml::radioButton('Order[type]',$model->type==Order::T_CLIENT,array('id'=>'radios-0','class'=>'client type-order','value'=>Order::T_CLIENT,'disabled'=>!$model->isNewRecord))?>
                                            <?=Order::getType(Order::T_CLIENT)?> </label>
                                        <label class="radio-inline" for="radios-1">
                                            <?=CHtml::radioButton('Order[type]',$model->type==Order::T_COURIER,array('id'=>'radios-1','class'=>'courier type-order','value'=>Order::T_COURIER,'disabled'=>!$model->isNewRecord))?>
                                            <?=Order::getType(Order::T_COURIER)?> </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?=$form->labelEx($model,'name',array('class'=>'col-md-3 control-label'))?>
                                    <div class="col-md-8">
                                        <?=$form->textField($model,'name',array('class'=>'form-control input-md'))?>
                                        <span class="help-block">A great title needs at least 60 characters. </span> </div>
                                </div>

                                <div class="form-group">
                                    <?=$form->labelEx($model,'description',array('class'=>'col-md-3 control-label'))?>
                                    <div class="col-md-8">
                                        <?=$form->textArea($model,'description',array('class'=>'form-control'))?>
                                    </div>
                                </div>

                                <div id="ajax-setting">
                                    <?=$this->renderPartial('_client',array('from'=>$from,'where'=>$where,'form'=>$form))?>
                                </div>


                                <div class="form-group">
                                    <label class="col-md-3 control-label">Terms</label>
                                    <div class="col-md-8">
                                        <label class="checkbox-inline" for="checkboxes-0">
                                            <input name="checkboxes" id="checkboxes-0" value="Remember above contact information." type="checkbox">
                                            Remember above contact information. </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8"> <?=CHtml::submitButton($model->isNewRecord ? "Создать" : "Сохранить",array('class'=>'btn btn-success btn-lg'))?></div>
                                </div>
                            </fieldset>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
            </div>

            <div class="col-md-3 reg-sidebar">
                <div class="reg-sidebar-inner text-center">
                    <div class="promo-text-box"> <i class=" icon-picture fa fa-4x icon-color-1"></i>
                        <h3><strong>Post a Free Classified</strong></h3>
                        <p> Post your free online classified ads with us. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                    </div>
                    <div class="panel sidebar-panel">
                        <div class="panel-heading uppercase"><small><strong>How to sell quickly?</strong></small></div>
                        <div class="panel-content">
                            <div class="panel-body text-left">
                                <ul class="list-check">
                                    <li> Use a brief title and description of the item </li>
                                    <li> Make sure you post in the correct category</li>
                                    <li> Add nice photos to your ad</li>
                                    <li> Put a reasonable price</li>
                                    <li> Check the item before publish</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>