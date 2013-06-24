(function(){

var AppDemo = (function () {

    var AppDemo = function (options) {
        this.options = {
            start: '.app-demo-start',
            end: '.app-demo-end',
            active: 'app-demo-started',
            container: '#site'
        };

        this.options = _.extend(this.options, options);

        this.el = {
            container: $(this.options.container),
            start: $(this.options.start),
            end: $(this.options.end)
        };

        if (this.el.start.length === 0) {
            return false;
        }

        this.setScrollPositions();

        this.el.container.on('resize', _.bind(this.setScrollPositions, this));
        this.el.container.on('scroll', _.bind(this.detectScroll, this));

        // this.animate();
    };

    AppDemo.prototype.setScrollPositions = function () {
        this.startPosition = this.el.start.offset().top;
        this.endPosition = this.el.end.offset().top;
    };

    AppDemo.prototype.detectScroll = function () {
        var scrollPos = this.el.container.scrollTop();

        if (scrollPos >= this.startPosition && scrollPos < this.endPosition && !this.el.container.hasClass(this.options.active)) {
            this.el.container.addClass(this.options.active);
        }

        if ((scrollPos > this.endPosition || scrollPos < this.startPosition) && this.el.container.hasClass(this.options.active)) {
            this.el.container.removeClass(this.options.active);
        }

        if ($('body.show-logo').length === 0) {
            if (scrollPos > 500) {
                $('body').addClass('show-logo');
            } else {
                $('body').removeClass('show-logo');
            }
        }
    };

    AppDemo.prototype.animate = function () {
        var scrollorama = $.scrollorama({
            blocks: '.scrollblock',
            enablePin:false
        });

        scrollorama.animate('#block1', {
            duration: 200,
            property: 'right',
            start: -1000,
            end: 30,
            easing: "bounce baby"
        });

        scrollorama.animate('#block1', {
            duration: 200,
            property: 'opacity',
            start: 0,
            end: 1
        });

        scrollorama.animate('#block2', {
            delay: 700,
            duration: 200,
            property:'left',
            start:-1000,
            end: 30,
            easing: "bounce baby"
        });

        scrollorama.animate('#block2', {
            delay: 730,
            duration: 200,
            property:'opacity',
            start:0,
            end: 1

        });


        scrollorama.animate('#block3',{
            delay: 700,
            duration: 200,
            property:'right',
            start:-1000,
            end: 0,
            easing: "bounce baby"

        });
        scrollorama.animate('#block4',{
            delay: 750,
            duration: 200,
            property:'right',
            start:-1000,
            end: 0,
            easing: "bounce baby"

        });
        scrollorama.animate('#block5',{
            delay: 800,
            duration: 200,
            property:'right',
            start:-1000,
            end: 0,
            easing: "bounce baby"

        });

        scrollorama.animate('#block3',{
            delay: 730,
            duration: 200,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"

        });
        scrollorama.animate('#block4',{
            delay: 780,
            duration: 200,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"

        });
        scrollorama.animate('#block5',{
            delay: 830,
            duration: 200,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"

        });

        scrollorama.animate('#block6',{
            delay: 830,
            duration: 80,
            property:'bottom',
            start:-400,
            easing: "bounce baby"
        });
        scrollorama.animate('#block7',{
            delay: 860,
            duration: 80,
            property:'bottom',
            start:-400,
            easing: "bounce baby"
        });
        scrollorama.animate('#block8',{
            delay: 890,
            duration: 80,
            property:'bottom',
            start:-400,
            easing: "bounce baby"
        });

        scrollorama.animate('#block6',{
            delay: 840,
            duration: 80,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"
        });
        scrollorama.animate('#block7',{
            delay: 870,
            duration: 80,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"
        });
        scrollorama.animate('#block8',{
            delay: 890,
            duration: 80,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"
        });

        scrollorama.animate('#block9',{
            delay: 700,
            duration: 200,
            property:'right',
            start:-1000,
            end: 0,
            easing: "bounce baby"

        });
    };

    return AppDemo;

}());

/* globals Rating */
/* globals Settings */

var Gallery = (function () {

    var Gallery = function (options) {
        _.bindAll(this);
        this.options = {
            gallery: '.gallery',
            item: '.gallery-item'
        };

        this.activeElement = 0;
        this.settings = new Settings();

        this.el = {
            gallery: $(this.options.gallery)
        };

        // Create a rating element for each gallery item
        this.el.gallery.find(this.options.item).each(function () {
            var rating = new Rating(null, {rating: $(this).find('.rate')});
        });

        if(window.location.hash !== '') {
            this.loadPageFromHash();
        }

        if(this.el.gallery.length === 0) {
            return false;
        }

        this.equalHeight();
        this.bind();
    };

    Gallery.prototype.bind = function () {
        this.el.gallery.on('click', '.gallery-share-button', this.showShare);
        this.el.gallery.find('select[name="filter-festival"]').on('change', function () {
            window.location = $(this).val();
        });
        this.el.gallery.on('click', '.pagination-item a', this.loadPage);
        $(window).on('hashchange', this.loadPageFromHash);

        $(document).keydown(_.bind(function(e){
            if(e.keyCode === 37) {
                this.triggerprevious();
            } else if(e.keyCode === 39) {
                this.triggerNext();
            }
        }, this));
    };

    Gallery.prototype.showShare = function (e) {
        e.preventDefault();

        var title = encodeURIComponent('Mr. Burger Festi Food'),
            description = encodeURIComponent('Rate my burger and help me get my festival ticket refunded!'),
            image = 'https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn1/1013389_197379410418361_837255109_n.png',
            top = $(window).height() * 0.5 - 150,
            left = $(window).width() * 0.5 - 200;

        window.open($(this).attr('href') + '&p[images][0]=' + image + '&p[summary]=' + description + '&p[title]=' + title, 'Share this burger!', 'width=400,height=300,scrollbars=no,toolbar=no,location=no,top=' + top + ',left=' + left);

        return false;
    };

    Gallery.prototype.equalHeight = function () {
        var height = 0,
            items = $(this.options.item);

        items.each(function () {
            var tempHeight = $(this).height();

            height = (tempHeight > height) ? tempHeight : height;
        });

        items.height(height);
    };

    Gallery.prototype.loadPage = function(e, pageNumber) {
        e.preventDefault();

        var $el = $(e.target);
        var url = $el.attr('href').split(':');
        console.log(url);
        window.location.hash = "page" + url[url.length - 1];
    };

    Gallery.prototype.loadPageFromHash = function() {
        var hash = window.location.hash;
        var page = hash.replace('#page', '');

        $.ajax({
            type: 'GET',
            url: this.settings.URI + '/gallery/page:' + page,
            success: function(data) {
                var gallery = $(data).find('.gallery-grid');
                var pagination = $(data).find('.pagination');

                $('.gallery-grid').empty().html(gallery);
                $('.pagination').empty().html(pagination);
            }
        });
    };

    Gallery.prototype.triggerNext = function(e) {
        var hash = window.location.hash;
        var page = hash.replace('#page', '');
        if(!($(".pagination-item-active").next().hasClass('pagination-item-disabled'))) {
            console.log('ik mag volgende');
            window.location.hash = "page" + (parseInt(page, 10) + 1);
        }
    };

    Gallery.prototype.triggerprevious = function(e) {
        var hash = window.location.hash;
        var page = hash.replace('#page', '');
        if(!($(".pagination-item-active").prev().hasClass('pagination-item-disabled'))) {
            console.log('ik mag vorige');
            window.location.hash = "page" + (parseInt(page, 10) - 1);
        }
    };

    return Gallery;

})();

var HorizontalSlider = (function () {

    var HorizontalSlider = function (options) {
        this.options = {
            // ID prefix
            prefix: 'hs-',
            // Slider
            slider: '.horizontal-slider',
            item: '.horizontal-slider-item',
            // Classes
            current: 'horizontal-slider-item-shown',
            previous: 'horizontal-slider-item-previous',
            next: 'horizontal-slider-item-next',
            // Buttons
            previousButton: '.horizontal-slider-previous-button',
            nextButton: '.horizontal-slider-next-button',
            // Navigation
            navigation: '.horizontal-slider-navigation',
            navigationItem: '.horizontal-slider-navigation-item',
            navigationActive: 'horizontal-slider-navigation-item-active'
        };

        this.activeElement = 0;

        this.el = {
            slider: $(this.options.slider),
            previousButton: $(this.options.previousButton),
            nextButton: $(this.options.nextButton),
            navigation: $(this.options.navigation)
        };

        this.bind();
        this.checkButtons();
    };

    HorizontalSlider.prototype.bind = function () {
        this.el.previousButton.on('click', _.bind(this.showPrevious, this));
        this.el.nextButton.on('click', _.bind(this.showNext, this));

        $(document).keydown(_.bind(function(e){
            if(e.keyCode === 37) {
                this.showPrevious(null);
            } else if(e.keyCode === 39) {
                this.showNext(null);
            }
        }, this));

        if (this.el.navigation.length > 0) {
            this.el.navigation.on('click', this.options.navigationItem, _.bind(this.navigation, this));
        }
    };

    HorizontalSlider.prototype.checkButtons = function () {
        var current = this.el.slider.find('.' + this.options.current);

        if (current.next(this.options.item).length > 0) {
            this.el.nextButton.show();
        } else {
            this.el.nextButton.hide();
        }

        if (current.prev(this.options.item).length > 0) {
            this.el.previousButton.show();
        } else {
            this.el.previousButton.hide();
        }

    };

    HorizontalSlider.prototype.showPrevious = function (e) {
        if(e) {
            e.preventDefault();
        }

        var currentElement = this.el.slider.find('.' + this.options.current),
            previousElement = this.el.slider.find('.' + this.options.previous);

        this.activeElement--;

        // Remove next class, current element becomes next element
        this.el.slider.find('.' + this.options.next).removeClass(this.options.next);
        currentElement.removeClass(this.options.current).addClass(this.options.next);

        // Previous becomes current
        previousElement.removeClass(this.options.previous).addClass(this.options.current);

        previousElement.prev(this.options.item).addClass(this.options.previous);

        this.el.navigation.find('.' + this.options.navigationActive)
            .removeClass(this.options.navigationActive)
            .closest('li')
            .prev('li').find(this.options.navigationItem)
            .addClass(this.options.navigationActive);

        this.checkButtons();
    };

    HorizontalSlider.prototype.showNext = function (e) {
        if(e) {
            e.preventDefault();
        }

        var currentElement = this.el.slider.find('.' + this.options.current),
            nextElement = this.el.slider.find('.' + this.options.next);

        this.activeElement++;

        // Remove previous class, current element becomes previous element
        this.el.slider.find('.' + this.options.previous).removeClass(this.options.previous);
        currentElement.removeClass(this.options.current).addClass(this.options.previous);

        // Next becomes current
        nextElement.removeClass(this.options.next).addClass(this.options.current);

        nextElement.next(this.options.item).addClass(this.options.next);

        this.el.navigation.find('.' + this.options.navigationActive)
            .removeClass(this.options.navigationActive)
            .closest('li')
            .next('li').find(this.options.navigationItem)
            .addClass(this.options.navigationActive);

        this.checkButtons();
    };

    HorizontalSlider.prototype.navigation = function (e) {
        e.preventDefault();

        var active = $(e.target),
            id = active.attr('href'),
            show = this.el.slider.find(active.attr('href'));

        if (active.hasClass(this.options.navigationActive)) {
            return false;
        }

        var previousElement = this.activeElement,
            direction = 'next';

        this.activeElement = parseInt(id.replace('#' + this.options.prefix, '') ,10);

        direction = (this.activeElement < previousElement) ? 'previous' : 'next';

        this.el.navigation.find('.' + this.options.navigationActive)
            .removeClass(this.options.navigationActive);

        active.addClass(this.options.navigationActive);

        if (direction === 'next') {
            // Remove next class from current next
            // And add it to our target
            this.el.slider.find('.' + this.options.next).removeClass(this.options.next);

            show.removeClass(this.options.previous + ' ' + this.options.next)
                .addClass(this.options.next);

            this.el.slider.find('.' + this.options.previous)
                .removeClass(this.options.previous);

            this.el.slider.find('.' + this.options.current)
                .removeClass(this.options.current)
                .addClass(this.options.previous);

            setTimeout(_.bind(function() {
                show.removeClass(this.options.next).addClass(this.options.current);
            }, this), 1);
        } else {
            this.el.slider.find('.' + this.options.previous).removeClass(this.options.previous);

            show.removeClass(this.options.previous + ' ' + this.options.next)
                .addClass(this.options.previous);

            this.el.slider.find('.' + this.options.next)
                .removeClass(this.options.next);

            this.el.slider.find('.' + this.options.current)
                .removeClass(this.options.current)
                .addClass(this.options.next);

            setTimeout(_.bind(function() {
                show.removeClass(this.options.previous).addClass(this.options.current);
            }, this), 1);
        }

        setTimeout(_.bind(function () {
            this.el.slider.find('.' + this.options.previous).removeClass(this.options.previous);
            this.el.slider.find('.' + this.options.next).removeClass(this.options.next);

            show.next(this.options.item).addClass(this.options.next);
            show.prev(this.options.item).addClass(this.options.previous);

            this.checkButtons();
        }, this), 440);
    };

    return HorizontalSlider;

})();

var Navigation = (function () {

    var Navigation = function (options, el) {
        this.el = {
            navItems: $('.nav-item')
        };

        this.bind();
    };

    Navigation.prototype.bind = function() {
        this.el.navItems.on('click', _.bind(this.catchClick, this));
    };

    Navigation.prototype.catchClick = function(e) {
        //e.preventDefault();
        console.log('click');
    };

    return Navigation;
})();

var Rating = (function () {

    var Rating = function (options, el) {
        this.options = {
            plusButton: '.rate-plus-button',
            minRating: 0,
            maxRating: 5,
            ratingView: '.rate-visual'
        };

        this.el = el;

        this.el = _.extend(this.el, {
            plusButton: this.el.rating.find(this.options.plusButton),
            inputRating: this.el.rating.find('input[name="rating"]'),
            ratingView: this.el.rating.find('.rate-visual')
        });

        this.el.rating.find('.rate-rating').hide();

        this.bind();
    };

    Rating.prototype.bind = function() {
        this.el.plusButton.on('click', _.bind(this.addRate, this));
    };

    Rating.prototype.addRate = function (e) {
        e.preventDefault();

        var current = parseInt(this.el.inputRating.val(), 10);

        if (current === this.options.maxRating) {
            current = this.options.minRating;
        }

        if (current >= this.options.minRating && current < this.options.maxRating) {
            var rating = current + 1;

            this.el.inputRating.val(rating);
            this.el.ratingView.css('background-position', -rating * 60 + 'px 0px');
            this.el.plusButton.css('top', 60 - rating * 10);

            this.el.rating.find('.rate-rating').fadeIn(220).html(rating + '<span>/5</span>');
        }

    };

    return Rating;
})();

var Settings =(function () {

    var Settings = function () {

        this.URI = 'http://localhost/Devine/_MAMP_JAAR2/_SEM2/MAIV/mrburger/maiv-site';
        //this.api = 'http://192.168.2.8/maiv_oostende/api/';
        //this.api = 'http://192.168.2.4/rolstende/api/';
    };

    return Settings;

})();

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

})();