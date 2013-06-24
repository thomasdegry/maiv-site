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

    Gallery.prototype.loadPageFromHash = function(e) {
        e.preventDefault();

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

    return Gallery;

})();