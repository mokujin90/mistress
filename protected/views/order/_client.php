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


