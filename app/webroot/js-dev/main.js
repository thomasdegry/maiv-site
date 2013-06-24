/* globals AppDemo */
/* globals HorizontalSlider */
/* globals Gallery */
/* globals FastClick */
/* globals Navigation */
/* globals Settings */

$(window).load(function () {
    var settings = new Settings();

    // Init app demo (should only work on index)
    var appDemo = new AppDemo();
    var horizontalSlider = new HorizontalSlider();
    var gallery = new Gallery();
    var navigation = new Navigation();

    $('.toggle-nav').sidr({
        name: 'sidr-main',
        source: '.site-header'
    });

    //leap
    $.deck('.slide');

    FastClick.attach(document.body);

    // @todo in class
    $('.sliding-doors').on('click', '.sliding-door-toggle', function (e) {
        e.preventDefault();
        $('.sliding-doors-open').removeClass('sliding-doors-open');
        $(this).closest('.sliding-doors').toggleClass('sliding-doors-open');
    });

});