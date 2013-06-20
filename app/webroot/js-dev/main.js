/* globals AppDemo */
/* globals HorizontalSlider */

$(window).load(function () {

    // Init app demo (should only work on index)
    var appDemo = new AppDemo();

    // Show logo on scroll if it isn't shown already
    if ($('body.show-logo').length === 0) {
        $(window).on('scroll', function () {
            if ($(window).scrollTop() > 500) {
                $('body').addClass('show-logo');
            } else {
                $('body').removeClass('show-logo');
            }
        });
    }

    var horizontalSlider = new HorizontalSlider();

    $('.toggle-nav a').sidr();
    $("body").on("click", function(){
        console.log("click");
        $.sidr('close', 'sidr');
    });

    $('.toggle-nav').on('click', 'a', function () {
        $('.toggle-nav').toggleClass('is-collapsed');
        $('.toggle-nav').toggleClass('is-expanded');
    });
});