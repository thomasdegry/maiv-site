/* globals AppDemo */
/* globals HorizontalSlider */
/* globals Gallery */
/* globals FastClick */
/* globals Navigation */
/* globals Settings */
/* globals FeatureSlider */

$(window).load(function () {
    var settings = new Settings();

    // Init app demo (should only work on index)
    var appDemo = new AppDemo();
    var horizontalSlider = new HorizontalSlider();
    var gallery = new Gallery();
    var navigation = new Navigation();
    var featureSlider = new FeatureSlider();

    $('.toggle-nav').sidr({
        name: 'sidr-main',
        source: '.site-header'
    });

    if($(".horizontal-slider-container").length > 0){
        $.deck('.slide');
    }


    FastClick.attach(document.body);



});