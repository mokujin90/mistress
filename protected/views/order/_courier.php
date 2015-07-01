<?
/**
 * @var $from Destinations
 * @var $where Destinations
 * @var $form CActiveForm
 */
?>
<?=$this->renderPartial('_destination',array('model'=>$from,'form'=>$form))?>
<?foreach($where as $whereOne):?>
    <?=$this->renderPartial('_destination',array('model'=>$whereOne,'form'=>$form))?>
<?endforeach;?>
<div class="advanced-destination">

</div>
<a class="btn btn-block btn-border btn-post btn-danger add-destination" href="#">Добавить направление</a>

