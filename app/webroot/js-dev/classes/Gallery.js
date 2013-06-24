/* globals Rating */
/* globals Settings */

var Gallery = (function () {

    var Gallery = function (options) {
        _.bindAll(this);
        this.options = {
            gallery: '.gallery',
            item: '.gallery-item',
            rate: '.sliding-doors',
            share: '.gallery-share-button'
        };

        this.createElements();

        this.activeElement = 0;
        this.settings = new Settings();

        if(window.location.hash !== '') {
            this.loadPageFromHash();
        }

        if(this.el.gallery.length === 0) {
            return false;
        }

        this.equalHeight();
        this.bind();

        $(window).on('hashchange', this.loadPageFromHash);

        $(document).keydown(_.bind(function(e){
            if(e.keyCode === 37) {
                this.triggerprevious();
            } else if(e.keyCode === 39) {
                this.triggerNext();
            }
        }, this));
    };

    Gallery.prototype.createElements = function () {
        this.el = {
            gallery: $(this.options.gallery),
            rate: $(this.options.rate),
            share: $(this.options.share)
        };

        // Create a rating element for each gallery item
        this.el.gallery.find(this.options.item).each(function () {
            var rating = new Rating(null, {rating: $(this).find('.rate')});
        });
    };

    Gallery.prototype.bind = function () {
        this.el.gallery.on('click', this.options.share, this.showShare);
        this.el.gallery.find('select[name="filter-festival"]').on('change', function () {
            window.location = $(this).val();
        });

        this.el.gallery.on('click', '.pagination-item a', this.loadPage);
        this.el.rate.on('click', '.sliding-door-toggle', this.showRate);
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

        var url = $(e.target).attr('href').split(':');
        window.location.hash = "page" + url[url.length - 1];
    };

    Gallery.prototype.loadPageFromHash = function() {
        var hash = window.location.hash,
            url  = window.location.href.substr(0, window.location.href.indexOf('#')),
            page = hash.replace('#page', ''),
            that = this;

        $.ajax({
            type: 'GET',
            url: url + '/page:' + page,
            success: function(data) {
                var gallery = $(data).find('.gallery-grid');
                var pagination = $(data).find('.pagination');

                $('.gallery-grid').empty().html(gallery);
                $('.pagination').empty().html(pagination);

                that.createElements();
                that.bind();
                that.equalHeight();
            }
        });
    };

    Gallery.prototype.triggerNext = function(e) {
        var hash = window.location.hash;
        var page = hash.replace('#page', '');
        if(!($(".pagination-item-active").next().hasClass('pagination-item-disabled'))) {
            window.location.hash = "page" + (parseInt(page, 10) + 1);
        }
    };

    Gallery.prototype.triggerprevious = function(e) {
        var hash = window.location.hash;
        var page = hash.replace('#page', '');
        if(!($(".pagination-item-active").prev().hasClass('pagination-item-disabled'))) {
            window.location.hash = "page" + (parseInt(page, 10) - 1);
        }
    };

    Gallery.prototype.showRate = function(e) {
        e.preventDefault();

        $('.sliding-doors-open').removeClass('sliding-doors-open');
        $(e.target).closest('.sliding-doors').toggleClass('sliding-doors-open');
    };

    return Gallery;
})();