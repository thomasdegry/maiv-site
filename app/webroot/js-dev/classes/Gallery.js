/* globals Rating */

var Gallery = (function () {

    var Gallery = function (options) {
        this.options = {
            gallery: '.gallery',
            item: '.gallery-item'
        };

        this.activeElement = 0;

        this.el = {
            gallery: $(this.options.gallery)
        };

        // Create a rating element for each gallery item
        this.el.gallery.find(this.options.item).each(function () {
            var rating = new Rating(null, {rating: $(this).find('.rate')});
        });

        this.equalHeight();
        this.bind();
    };

    Gallery.prototype.bind = function () {
        this.el.gallery.on('click', '.gallery-share-button', this.showShare);
        this.el.gallery.find('select[name="filter-festival"]').on('change', function () {
            window.location = $(this).val();
        });
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

    return Gallery;

})();