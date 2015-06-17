<?
/**
 * @var User $model
 * @var CActiveForm $form
 */
?>
<div class="container-fluid">
    <section class="container">
        <div class="container-page">
            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'register-form',
            )); ?>
            <div class="col-md-6">
                <h3 class="dark-grey">Registration</h3>

                    <div class="form-group col-lg-12">
                        <?php echo $form->labelEx($model,'login'); ?>
                        <?php echo $form->textField($model,'login',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'login'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <?php echo $form->labelEx($model,'password'); ?>
                        <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'password'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <?php echo $form->labelEx($model,'password_repeat'); ?>
                        <?php echo $form->textField($model,'password_repeat',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'password_repeat'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <?php echo $form->labelEx($model,'name'); ?>
                        <?php echo $form->textField($model,'name',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'name'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <?php echo $form->labelEx($model,'last_name'); ?>
                        <?php echo $form->textField($model,'last_name',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'last_name'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <?php echo $form->labelEx($model,'email'); ?>
                        <?php echo $form->textField($model,'email',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'email'); ?>
                    </div>

                    <div class="form-group col-lg-6">
                        <?php echo $form->labelEx($model,'phone'); ?>
                        <?php echo $form->textField($model,'phone',array('class'=>'form-control')); ?>
                        <?php echo $form->error($model,'phone'); ?>
                    </div>
            </div>

            <div class="col-md-6">
                <h3 class="dark-grey">Terms and Conditions</h3>
                <p>
                    By clicking on "Register" you agree to The Company's' Terms and Conditions
                </p>
                <p>
                    While rare, prices are subject to change based on exchange rate fluctuations -
                    should such a fluctuation happen, we may request an additional payment. You have the option to request a full refund or to pay the new price. (Paragraph 13.5.8)
                </p>
                <p>
                    Should there be an error in the description or pricing of a product, we will provide you with a full refund (Paragraph 13.5.6)
                </p>
                <p>
                    Acceptance of an order by us is dependent on our suppliers ability to provide the product. (Paragraph 13.5.6)
                </p>

                <?=CHtml::submitButton('Регистрация',array('class'=>"btn btn-primary"))?>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </section>
</div>