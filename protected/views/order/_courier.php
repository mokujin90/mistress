<?
/**
 * @var $from Destinations
 * @var $where Destinations
 * @var $form CActiveForm
 */
?>
<div class="content-subheading"> <i class="icon-user fa"></i> <strong>Откуда</strong> </div>
<?=$this->renderPartial('_destination',array('model'=>$from,'form'=>$form))?>
<div class="content-subheading"> <i class="icon-user fa"></i> <strong>Куда</strong> </div>
<?foreach($where as $whereOne):?>
    <?=$this->renderPartial('_destination',array('model'=>$whereOne,'form'=>$form))?>
<?endforeach;?>


