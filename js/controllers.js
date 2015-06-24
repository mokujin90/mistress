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
        $('.type-order').change(function(){
            var val = $(this).val();
            $.get('/order/ajaxType',{type:val},function(data){
                $('#ajax-setting').html(data);
            });
        });
        $(document).on('click.order','.add-destination',function(){
            $.get('/order/ajaxAddDestination',function(data){
               $('.advanced-destination').append(data);
            });
            return false;
        });
    }
}