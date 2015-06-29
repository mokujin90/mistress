$(window).load(function () {

});

$(document).ready(function () {
    view.login();
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
    update: function () {
        /**
         * Смена типа заказа
         */
        $('.type-order').change(function () {
            var val = $(this).val();
            $.get('/order/ajaxType', {type: val}, function (data) {
                $('#ajax-setting').html(data);
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