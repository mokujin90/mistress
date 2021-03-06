/**
 * Синглтон, для эмуляции фабрики виджетов
 */
var route = {
    initJs: function (controller, action) {
        if (typeof window[controller] != 'undefined') {
            if (typeof window[controller][action] != 'undefined')
                window[controller][action]()
        }
    }
};
var view = {
    login: function () {
        $(document).on('click', '#login-form .ajax-login', function () {
            var $form = $(this).closest('form');
            $.post($form.attr('action'), $form.serializeArray(), function () {
                location.reload();
            });
            return false;
        });
    }

};
var fancybox = {
        /**
         * Совместно с $.extend поможет сократить код для стандартных fancybox'ов, которые будут изменяться.
         * @param addClass
         * @returns {{closeClick: boolean, closeBtn: boolean, wrapCSS: *, helpers: {title: {type: string, position: string}}}}
         */
        init: function (addClass) {

            addClass = typeof addClass !== 'undefined' ? " " + addClass : '';
            return {
                type:'ajx',
                fitToView: false,//отключаем автоопределение ширины
                autoSize: false,
                scrolling: 'no',
                closeBtn: true,
                wrapCSS: 'action' + addClass,
                helpers: {
                    title: {
                        type: 'inside',
                        position: 'top'
                    },
                    overlay: {
                        locked: true,
                        fixed: true
                    }
                },
                beforeLoad: function () {
                    $(document).on('click.fancybox', '.close-fancy', function () {
                        $.fancybox.close()
                    });
                }
            }
        },
        /**
         * Обновим высоту фэнсибокса в зависимости от какого либо объекта
         * @param $element
         */
        changeSize: function ($element) {
            var $fancybox = $('div.fancybox-inner');
            $fancybox.attr('style', function (i, s) {
                return s + 'height: ' + $element.innerHeight() + 'px !important;'
            });
            $.fancybox.reposition();
        }
    }
var form = {
        ajaxError: function (data, formSelector, noExit, isFancy) {
            noExit = get(noExit, true);
            isFancy = get(isFancy, false);
            var $form = $(formSelector);
            $form.find(".errorMessage").hide();
            if (data.error != '[]') {
                var error = $.parseJSON(data.error);
                $.each(error, function (key, val) {
                    $form.find("#" + key + "_em_").text(val).show();
                });
            }
            else if (data.status == true && noExit) {
                location.href = data.url;
            }
            else if (isFancy) {
                $.fancybox.close();
            }
        },
        localization: function () {
            if (typeof $.datepicker != 'undefined') {
                $.datepicker.regional['ru'] = {
                    closeText: 'Закрыть',
                    prevText: '&#x3c;Пред',
                    nextText: 'След&#x3e;',
                    currentText: 'Сегодня',
                    monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                        'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
                    monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
                        'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
                    dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
                    dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
                    dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
                    weekHeader: 'Не',
                    dateFormat: 'dd.mm.yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''
                };
                $.datepicker.setDefaults($.datepicker.regional['ru']);
            }
        },
        datepicker: function () {
            if ($(".datepicker").length > 0) {
                $(".datepicker").datepicker({
                    buttonText: "Выберите дату",
                    dateFormat: "yy-mm-dd"
                });
            }
        },
        clearValidate: function () {
            $('.errorMessage').html('').hide();
        },
        media:function(){
            $('.open-dialog').click(function(){
                $(this).siblings('.photos').find('span').click();
            });
        }
    }
var map ={
    init:function(){

        /**
         * Развесим ивенты на ссылку, откывающую карту
         */
        $(document).on('click.map','.check-map',function(){
            var $this = $(this),
                $destinationBlock = $this.closest('.destination-block');
            $.fancybox.open( $.extend(fancybox.init(), {
                    href:$this.data('href'),
                    width:'50%',
                    height:'60%',
                    type:'iframe',
                    'afterClose':function(){
                        $destinationBlock.find('.lat').val(localStorage['lat']);
                        $destinationBlock.find('.lng').val(localStorage['lng']);
                        var structure = [localStorage['country'], localStorage['region'], localStorage['city'], localStorage['address']];
                        $destinationBlock.find('.region').val(localStorage['region']);
                        $destinationBlock.find('.country').val(localStorage['country']);
                        $destinationBlock.find('.city').val(localStorage['city']);
                        $destinationBlock.find('.address').val(localStorage['address']);
                        $destinationBlock.find('.name-value').val(structure.join(", "));
                        localStorage.removeItem('lat');
                        localStorage.removeItem('lng');
                        localStorage.removeItem('region');
                        localStorage.removeItem('country');
                        localStorage.removeItem('city');
                        localStorage.removeItem('address');
                    }
                }));

        });
    }
}
