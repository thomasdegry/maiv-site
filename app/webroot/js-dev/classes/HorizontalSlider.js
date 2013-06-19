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
        e.preventDefault();

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
        e.preventDefault();

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