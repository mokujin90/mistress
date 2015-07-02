$(window).load(function () {

});

$(document).ready(function () {
    view.login();
    map.init();
});

var siteController = {
    index: function () {

    }
}
var userController = {
    profile: function () {
        var $btnSets = $('#responsive'),
            $btnLinks = $btnSets.find('a');

        $btnLinks.click(function (e) {
            e.preventDefault();
            $(this).siblings('a.active').removeClass("active");
            $(this).addClass("active");
            var index = $(this).index();
            $("div.user-menu>div.user-menu-content").removeClass("active");
            $("div.user-menu>div.user-menu-content").eq(index).addClass("active");
        });
        $("[rel='tooltip']").tooltip();

        $('.view').hover(
            function () {
                $(this).find('.caption').slideDown(250); //.fadeIn(250)
            },
            function () {
                $(this).find('.caption').slideUp(250); //.fadeOut(205)
            }
        );
    }
}
var orderController = {
    init:function(){
        form.datepicker();
        $('.mask-time').mask('00:00');

    },
    update: function () {
        orderController.init();
        /**
         * Смена типа заказа
         */
        $('.type-order').change(function () {
            var val = $(this).val();
            $.get('/order/ajaxType', {type: val}, function (data) {
                $.when($('#ajax-setting').html(data)).then(function(){
                    orderController.init();
                    $('#ajax-setting').find('[data-mask]').mask({});
                })
            });
        });
        /**
         * Добавление нового типа направления когда мы выступаем в качестве курьера
         */
        $(document).on('click.order', '.add-destination', function () {
            $.get('/order/ajaxAddDestination', function (data) {
                $('.advanced-destination').append(data);
            });
            return false;
        });
        $('#ajax-save').click(function () {
            var $this = $(this), $form = $this.closest('form');
            $.post($form.attr('action'), $form.serializeArray(), function (data) {
                form.clearValidate();
                if (data.error == 0) {
                    location.href = data.href;
                }
                else {
                    if (typeof data.errors_order != 'undefined') {
                        var $error = $('.order-block');
                        $.each(data.errors_order, function (attr, text) {
                            $error.find("[data-attribute='Order_" + attr + "']").html(text).show();
                        });
                    }
                    if (typeof data.errors != 'undefined') {
                        $.each(data.errors, function (i, val) { //перебираем блоки и ищем поля с ошибками по направлениям
                            var $destination = $('.destination-block').eq(i);
                            $.each(val, function (attr, text) {
                                var $error = $destination.find("[data-attribute='Destinations_" + attr + "']");
                                $error.html(text).show();
                            });
                        });
                    }
                }
            });
            return false;
        });
    }
}
var destinationController={
    map:function(){
        $('#save-marker').click(function(){
            var lat = $('#Destinations_lat').val(),
                lng = $('#Destinations_lng').val(),
                geocoder = new google.maps.Geocoder(),
                latlng = new google.maps.LatLng(lat, lng),
                structure = {a:1},
                city = '';
            var geocodingAPI = "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lng;
            localStorage.setItem('lat',lat);
            localStorage.setItem('lng',lng);
            $.getJSON(geocodingAPI, function (json) {
                if (json.status == "OK") {
                    //Check result 0
                    var result = json.results[0];
                    //look for locality tag and administrative_area_level_1
                    var city = "";
                    var state = "";
                    localStorage.setItem('country',(result.address_components[5].long_name));
                    localStorage.setItem('region',(result.address_components[4].long_name));
                    localStorage.setItem('city',(result.address_components[2].long_name));
                    localStorage.setItem('address',(result.address_components[1].long_name+" "+result.address_components[0].long_name));
                    parent.jQuery.fancybox.close();
                }
            });
            return false;
        });
    }
}