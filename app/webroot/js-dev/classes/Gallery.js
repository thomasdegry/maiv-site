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