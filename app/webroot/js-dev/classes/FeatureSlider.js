var FeatureSlider = (function () {

    var FeatureSlider = function (options, el) {
        this.options = {
            slogans: [
                'Be social, create a new<br /><span>flavour</span> and get a free burger!',
                'Rate your <span>favorite</span> burger<br />in the burger pile'
            ]
        };

        this.el = {
            slider: $("ul.feature-slider"),
            navigationItems: $(".feature-slider-navigation-item"),
            slogan: $('.feature-slogan'),
            graphic: $('.feature-graphic')
        };

        this.currentIndex = 0;

        $('.feature-slider-navigation-item').eq(this.currentIndex).addClass('active');

        console.log($('.feature-slider-navigation-item').eq(this.currentIndex));

        this.bind();

        setInterval(_.bind(this.showNext, this), 4000);
    };

    FeatureSlider.prototype.bind = function() {
        this.el.navigationItems.on('click', _.bind(this.showNext, this));
    };

    FeatureSlider.prototype.showNext = function (e) {
        if (e) {
            e.preventDefault();
        }

        this.currentIndex = (this.currentIndex === 0) ? 1 : 0;

        var newSlogan = this.options.slogans[this.currentIndex];

        this.el.slogan.fadeOut(440, _.bind(function () {
            this.el.slogan.html(newSlogan);

            this.el.slogan.fadeIn(440);
        }, this));

        if (this.currentIndex === 0) {
            $('#mayonaisse').css('right', '15%');
            $('#mayonaisse').animate({
                opacity: '0',
                right: '-100%'
            }, 440, _.bind(function () {
                $('#mayonaisse').hide();
                $('#iphone-startscreen').show().animate({
                    right: '-1em',
                    opacity: '1'
                }, 220);
            }, 440, this));
        } else {
            $('#iphone-startscreen').animate({
                opacity: '0',
                right: '-100%'
            }, 440, _.bind(function () {
                $('#iphone-startscreen').hide();
                $('#mayonaisse').show().animate({
                    right: '15%',
                    opacity: '1'
                }, 220);
            }, 440, this));
        }

        $('.feature-slider-navigation-item').removeClass('active').eq(this.currentIndex).addClass('active');

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