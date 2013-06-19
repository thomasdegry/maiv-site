/* globals AppDemo */

$(window).load(function () {

    var appDemo = new AppDemo();

    $(window).on('scroll', function () {
        if ($(window).scrollTop() > 500) {
            $('body').addClass('show-logo');
        } else {
            $('body').removeClass('show-logo');
        }
    });

});