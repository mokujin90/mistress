<?
/**
 * @var $model Destinations
 * @var $form CActiveForm
 */
?>

<div class="content-subheading"> <i class="icon-user fa"></i> <strong>
        <?if($model->type = Destinations::T_FROM):?>Откуда<?else:?>Куда<?endif;?>
</strong></div>

<div class="from-block">
    <?if(!$model->isNewRecord):?>
        <?=$form->hiddenField($model,'id',array('name'=>Candy::modelNames($model,'id')))?>
    <?endif;?>
    <?=$form->hiddenField($model,'type',array('name'=>Candy::modelNames($model,'type')))?>
    <div class="form-group">
        <?=$form->labelEx($model,'name',array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-8">
            <?=$form->textField($model,'name',array('class'=>'form-control input-md','name'=>Candy::modelNames($model,'name')))?>
            <?php echo $form->error($model,'name'); ?>
        </div>
    </div>
    <div class="form-group">
        <?=$form->labelEx($model,'description',array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-8">
            <?=$form->textArea($model,'description',array('class'=>'form-control','name'=>Candy::modelNames($model,'description')))?>
            <?php echo $form->error($model,'description'); ?>
        </div>
    </div>
    <div class="form-group">
        <?=$form->labelEx($model,'weight',array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-4">
            <div class="input-group"> <span class="input-group-addon">$</span>
                <?=$form->textField($model,'weight',array('class'=>'form-control','name'=>Candy::modelNames($model,'weight')))?>
                <?php echo $form->error($model,'weight'); ?>
            </div>
        </div>
        <div class="col-md-4">
            <?=$form->labelEx($model,'price',array('class'=>'col-md-4 control-label'))?>
            <div class="input-group"> <span class="input-group-addon">$</span>
                <?=$form->textField($model,'price',array('class'=>'form-control','name'=>Candy::modelNames($model,'price')))?>
                <?php echo $form->error($model,'price'); ?>
            </div>
        </div>
    </div>
    <div class="form-group">
        <?=$form->labelEx($model,'contact_name',array('class'=>'col-md-3 control-label'))?>
        <div class="col-md-4">
            <div class="input-group"> <span class="input-group-addon">$</span>
                <?=$form->textField($model,'contact_name',array('class'=>'form-control','name'=>Candy::modelNames($model,'contact_name')))?>
                <?php echo $form->error($model,'contact_name'); ?>
            </div>
        </div>
        <div class="col-md-4">
            <?=$form->labelEx($model,'contact_phone',array('class'=>'col-md-4 control-label'))?>
            <div class="input-group"> <span class="input-group-addon">$</span>
                <?=$form->textField($model,'contact_phone',array('class'=>'form-control','name'=>Candy::modelNames($model,'contact_phone')))?>
                <?php echo $form->error($model,'contact_phone'); ?>
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
            <?php echo $form->error($model,'date'); ?>
        </div>
        <div class="col-md-2">
            <?=$form->labelEx($model,'time_from',array('class'=>'col-md-2 control-label'))?>
            <div class="input-group">
                <?=$form->textField($model,'time_from',array('class'=>'form-control','name'=>Candy::modelNames($model,'time_from')))?>
                <?php echo $form->error($model,'time_from'); ?>
            </div>
        </div>
        <div class="col-md-2">
            <?=$form->labelEx($model,'time_to',array('class'=>'col-md-2 control-label'))?>
            <div class="input-group">
                <?=$form->textField($model,'time_to',array('class'=>'form-control','name'=>Candy::modelNames($model,'time_to')))?>
                <?php echo $form->error($model,'time_to'); ?>
            </div>
        </div>
    </div>


</div>