<?
/**
 * @var $model Destinations
 * @var $form CActiveForm
 * @var $this OrderController
 */
?>

<div class="content-subheading"> <i class="icon-user fa"></i> <strong>
        <?if($model->type == Destinations::T_FROM):?>Откуда<?else:?>Куда<?endif;?>
</strong></div>
<div class="from-block destination-block">
    <?=$form->hiddenField($model,'id',array('name'=>Candy::modelNames($model,'id')))?>
    <?=$form->hiddenField($model,'type',array('name'=>Candy::modelNames($model,'type')))?>
    <?=$form->hiddenField($model,'lat',array('name'=>Candy::modelNames($model,'lat'),'class'=>'lat'))?>
    <?=$form->hiddenField($model,'lng',array('name'=>Candy::modelNames($model,'lng'),'class'=>'lng'))?>
    <?=$form->hiddenField($model,'pos_country',array('name'=>Candy::modelNames($model,'pos_country'),'class'=>'country'))?>
    <?=$form->hiddenField($model,'pos_region',array('name'=>Candy::modelNames($model,'pos_region'),'class'=>'region'))?>
    <?=$form->hiddenField($model,'pos_city',array('name'=>Candy::modelNames($model,'pos_city'),'class'=>'city'))?>
    <?=$form->hiddenField($model,'pos_address',array('name'=>Candy::modelNames($model,'pos_address'),'class'=>'address'))?>
    <div class="form-group">

        <?=$form->labelEx($model,'name',array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-8">
            <div class="input-group">
                <span class="input-group-addon check-map" data-href="<?=$this->createUrl('destination/map');?>"><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></span>
                <?=CHtml::textField('name',$model->getName(),array('class'=>'form-control input-md name-value','name'=>Candy::modelNames($model,'name')))?>
            </div>
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
            </div>
            <?=Candy::error($model,'contact_name'); ?>
        </div>
        <div class="col-md-4">
            <?=$form->labelEx($model,'contact_phone',array('class'=>'col-md-4 control-label'))?>
            <div class="input-group"> <span class="input-group-addon">$</span>
                <?=$form->textField($model,'contact_phone',array('class'=>'form-control','name'=>Candy::modelNames($model,'contact_phone')))?>
            </div>
            <?=Candy::error($model,'contact_phone'); ?>
        </div>
    </div>
    <div class="form-group">
        <?=$form->labelEx($model,'date',array('class'=>'col-md-3 control-label','for'=>Makeup::id()))?>
        <div class="col-md-3">
            <?=$form->textField($model,'date',array('class'=>'form-control datepicker','name'=>Candy::modelNames($model,'date'),'id'=>Makeup::id()))?>
            <?=Candy::error($model,'date'); ?>
        </div>
        <div class="col-md-2">
            <?=$form->labelEx($model,'time_from',array('class'=>'col-md-2 control-label'))?>
            <div class="input-group">
                <?=$form->textField($model,'time_from',array('class'=>'form-control mask-time','name'=>Candy::modelNames($model,'time_from')))?>
            </div>
            <?=Candy::error($model,'time_from'); ?>
        </div>
        <div class="col-md-2">
            <?=$form->labelEx($model,'time_to',array('class'=>'col-md-2 control-label'))?>
            <div class="input-group">
                <?=$form->textField($model,'time_to',array('class'=>'form-control mask-time','name'=>Candy::modelNames($model,'time_to')))?>
            </div>
            <?=Candy::error($model,'time_to'); ?>
        </div>
    </div>


</div>