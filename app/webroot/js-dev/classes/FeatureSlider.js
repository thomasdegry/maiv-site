var FeatureSlider = (function () {

    var FeatureSlider = function (options, el) {
        this.el = {
            slider: $("ul.feature-slider"),
            navigationItems: $(".feature-slider-navigation-item")
        };

        this.bind();
    };

    FeatureSlider.prototype.bind = function() {
        this.el.navigationItems.on('click', _.bind(this.loadSlide, this));
    };

    FeatureSlider.prototype.loadSlide = function(e) {
        e.preventDefault();
        var slideToLoad = $(e.target).text(),
            $slide = $("#feature-slide-" + slideToLoad);

        $(".feature-shown").addClass('feature-hidden');
        setTimeout(function() {
            $(".feature-shown").addClass('hide').removeClass('feature-shown');
            $slide.removeClass('hide').removeClass('feature-hidden').addClass('feature-shown');
        }, 240);
    };

    return FeatureSlider;
})();