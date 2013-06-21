/* globals AppDemo */
/* globals HorizontalSlider */
/* globals FastClick */

$(window).load(function () {

    // Init app demo (should only work on index)
    var appDemo = new AppDemo();

    var horizontalSlider = new HorizontalSlider();

    $('.toggle-nav').sidr({
        name: 'sidr-main',
        source: '.site-header'
    });

    FastClick.attach(document.body);
});