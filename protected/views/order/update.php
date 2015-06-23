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
                                <?=CHtml::radioButton('Order[type]',$model->type==Order::T_CLIENT,array('id'=>'radios-0'))?>
                                <?=Order::getType(Order::T_CLIENT)?> </label>
                            <label class="radio-inline" for="radios-1">
                                <?=CHtml::radioButton('Order[type]',$model->type==Order::T_COURIER,array('id'=>'radios-1'))?>
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

                    </div>
<div class="form-group">
    <label class="col-md-3 control-label" for="Price">Price</label>
    <div class="col-md-4">
        <div class="input-group"> <span class="input-group-addon">$</span>
            <input id="Price" name="Price" class="form-control" placeholder="placeholder" required="" type="text">
        </div>
    </div>
    <div class="col-md-4">
        <div class="checkbox">
            <label>
                <input type="checkbox">
                Negotiable </label>
        </div>
    </div>
</div>

<div class="content-subheading"> <i class="icon-user fa"></i> <strong>Seller information</strong> </div>

<div class="form-group">
    <label class="col-md-3 control-label" for="textinput-name">Name</label>
    <div class="col-md-8">
        <input id="textinput-name" name="textinput-name" placeholder="Seller Name" class="form-control input-md" required="" type="text">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="seller-email"> Seller Email</label>
    <div class="col-md-8">
        <input id="seller-email" name="seller-email" class="form-control" placeholder="Email" required="" type="text">
        <div class="checkbox">
            <label>
                <input type="checkbox" value="">
                <small> Hide the phone number on this ads.</small> </label>
        </div>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="seller-Number">Phone Number</label>
    <div class="col-md-8">
        <input id="seller-Number" name="seller-Number" placeholder="Phone Number" class="form-control input-md" required="" type="text">
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="seller-Location">Location</label>
    <div class="col-md-8">
        <select id="seller-Location" name="seller-Location" class="form-control">
            <option value="1">Option one</option>
            <option value="2">Option two</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label" for="seller-area">City</label>
    <div class="col-md-8">
        <select id="seller-area" name="seller-area" class="form-control">
            <option value="1">Option one</option>
            <option value="2">Option two</option>
        </select>
    </div>
</div>
<div class="well">
    <h3><i class=" icon-certificate icon-color-1"></i> Make your Ad Premium </h3>
    <p>Premium ads help sellers promote their product or service by getting their ads more visibility with more
        buyers and sell what they want faster. <a href="help.html">Learn more</a></p>
    <div class="form-group">
        <table class="table table-hover checkboxtable">
            <tbody><tr>
                <td><div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios0" value="option0" checked="">
                            <strong>Regular List </strong> </label>
                    </div></td>
                <td><p>$00.00</p></td>
            </tr>
            <tr>
                <td><div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
                            <strong>Urgent Ad </strong> </label>
                    </div></td>
                <td><p>$10.00</p></td>
            </tr>
            <tr>
                <td><div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                            <strong>Top of the Page Ad </strong> </label>
                    </div></td>
                <td><p>$20.00</p></td>
            </tr>
            <tr>
                <td><div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                            <strong>Top of the Page Ad + Urgent Ad </strong> </label>
                    </div></td>
                <td><p>$40.00</p></td>
            </tr>
            <tr>
                <td><div class="form-group">
                        <div class="col-md-8">
                            <select class="form-control" name="Method" id="PaymentMethod">
                                <option value="2">Select Payment Method</option>
                                <option value="3">Credit / Debit Card </option>
                                <option value="5">Paypal</option>
                            </select>
                        </div>
                    </div></td>
                <td><p> <strong>Payable Amount : $40.00</strong></p></td>
            </tr>
            </tbody></table>
    </div>
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
    <div class="col-md-8"> <a href="posting-success.html" id="button1id" class="btn btn-success btn-lg">Submit</a> </div>
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