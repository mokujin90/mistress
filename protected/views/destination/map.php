<?php
/**
 *
 * @var OrderController $this
 * @var Destinations $model
 * @var CActiveForm $form
 */
?>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        html, body, #map-canvas {
            height: 95%;
            margin: 0px;
            padding: 0px
        }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script>
    <script>
        function initialize() {
            var myLatlng = new google.maps.LatLng(47.233333,39.700000);
            var mapOptions = {
                zoom: 10,
                center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Hello World!',
                draggable:true
            });
            google.maps.event.addListener(marker, 'dragend', function (event) {
                $('#Destinations_lat').val(this.getPosition().lat());
                $('#Destinations_lng').val(this.getPosition().lng());
            });

        }

        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>
<body>
<div id="map-canvas"></div>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'map-form',
    'htmlOptions'=>array(
        'class'=>'form-horizontal'
    )
)); ?>
    <?=$form->hiddenField($model,'lat');?>
    <?=$form->hiddenField($model,'lng');?>

<?php $this->endWidget(); ?>
<div class="button-panel">
    <a id="save-marker" class="btn btn-success btn-lg" href="#">Сохранить</a>
</div>
</body>
</html>