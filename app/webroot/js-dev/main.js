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



});