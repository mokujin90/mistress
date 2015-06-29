<?
/**
 * @var $model Destinations
 * @var $form CActiveForm
 */
?>

<div class="content-subheading"> <i class="icon-user fa"></i> <strong>
        <?if($model->type == Destinations::T_FROM):?>Откуда<?else:?>Куда<?endif;?>
</strong></div>
<div class="from-block destination-block">
    <?=$form->hiddenField($model,'id',array('name'=>Candy::modelNames($model,'id')))?>
    <?=$form->hiddenField($model,'type',array('name'=>Candy::modelNames($model,'type')))?>
    <div class="form-group">
        <?=$form->labelEx($model,'name',array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-8">
            <?=$form->textField($model,'name',array('class'=>'form-control input-md','name'=>Candy::modelNames($model,'name')))?>
            <?=Candy::error($model,'name'); ?>
        </div>
    </div>
    <div class="form-group">
        <?=$form->labelEx($model,'description',array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-8">
            <?=$form->textArea($model,'description',array('class'=>'form-control','name'=>Candy::modelNames($model,'description')))?>
            <?=Candy::error($model,'description'); ?>
        </div>
    </div>
    <div class="form-group">
        <?=$form->labelEx($model,'contact_name',array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-4">
            <div class="input-group"> <span class="input-group-addon">$</span>
                <?=$form->textField($model,'contact_name',array('class'=>'form-control','name'=>Candy::modelNames($model,'contact_name')))?>
                <?=Candy::error($model,'contact_name'); ?>
            </div>
        </div>
        <div class="col-md-4">
            <?=$form->labelEx($model,'contact_phone',array('class'=>'col-md-4 control-label'))?>
            <div class="input-group"> <span class="input-group-addon">$</span>
                <?=$form->textField($model,'contact_phone',array('class'=>'form-control','name'=>Candy::modelNames($model,'contact_phone')))?>
                <?=Candy::error($model,'contact_phone'); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?=CHtml::label($model->getAttributeLabel('date'),Makeup::id(),array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-3">
            <?$this->widget('zii.widgets.jui.CJuiDatePicker',array(
                'model'     => $model,
                'attribute' => 'date',
                'language'=> Yii::app()->language,
                'options'=>array(
                    'dateFormat'=> 'yy-mm-dd'
                ),
                'htmlOptions'=>array(
                    'class'=>'form-control',
                    'name'=>Candy::modelNames($model,'date'),
                    'id'=>Makeup::id()
                ),
            ));?>
            <?=Candy::error($model,'date'); ?>
        </div>
        <div class="col-md-2">
            <?=$form->labelEx($model,'time_from',array('class'=>'col-md-2 control-label'))?>
            <div class="input-group">
                <?=$form->textField($model,'time_from',array('class'=>'form-control','name'=>Candy::modelNames($model,'time_from')))?>
                <?=Candy::error($model,'time_from'); ?>
            </div>
        </div>
        <div class="col-md-2">
            <?=$form->labelEx($model,'time_to',array('class'=>'col-md-2 control-label'))?>
            <div class="input-group">
                <?=$form->textField($model,'time_to',array('class'=>'form-control','name'=>Candy::modelNames($model,'time_to')))?>
                <?=Candy::error($model,'time_to'); ?>
            </div>
        </div>
    </div>


</div>