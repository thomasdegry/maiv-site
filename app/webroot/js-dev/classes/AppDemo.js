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

    return AppDemo;

}());