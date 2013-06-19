var AppDemo = (function () {

    var AppDemo = function (options) {
        this.options = {
            start: '.app-demo-start',
            end: '.app-demo-end',
            active: 'app-demo-started',
            container: 'body'
        };

        this.options = _.extend(this.options, options);

        this.elements = {
            container: $(this.options.container),
            start: $(this.options.start),
            end: $(this.options.end)
        };

        this.setScrollPositions();

        $(window).on('resize', _.bind(this.setScrollPositions, this));
        $(window).on('scroll', _.bind(this.detectScroll, this));
    };

    AppDemo.prototype.setScrollPositions = function () {
        this.startPosition = this.elements.start.offset().top;
        this.endPosition = this.elements.end.offset().top;
    };

    AppDemo.prototype.detectScroll = function () {
        var scrollPos = $(window).scrollTop();

        if (scrollPos >= this.startPosition && scrollPos < this.endPosition && !this.elements.container.hasClass(this.options.active)) {
            this.elements.container.addClass(this.options.active);
        }

        if ((scrollPos > this.endPosition || scrollPos < this.startPosition) && this.elements.container.hasClass(this.options.active)) {
            this.elements.container.removeClass(this.options.active);
        }
    };

    return AppDemo;

}());