/* globals Settings */
/* globals FB */

var Rating = (function () {

    var Rating = function (options, el) {
        this.options = {
            plusButton: '.rate-plus-button',
            minRating: 0,
            maxRating: 5,
            ratingView: '.rate-visual'
        };

        this.el = el;

        this.settings = new Settings();

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
        this.el.rating.on('submit', _.bind(this.submitRating, this));
    };

    Rating.prototype.submitRating = function (e) {
        e.preventDefault();

        var rate = _.bind(function (userID) {
            $.ajax(this.settings.API + '/rate', {
                method: 'POST',
                data: {
                    burger_id: this.el.rating.find('input[name="id"]').val(),
                    voter_id: userID,
                    rating: this.el.rating.find('input[name="rating"]').val()
                },
                success: _.bind(function (data) {
                    this.el.rating.find('input[type="submit"]').remove();
                    this.el.plusButton.off('click');
                    this.el.rating.trigger('rating:submit', data);
                }, this)
            });
        }, this);

        this.el.rating.find('input[type="submit"]').fadeOut();

        FB.getLoginStatus(function (response) {
            if (response.status === 'connected') {
                rate(response.authResponse.userID);
            } else {
                FB.login(function (response) {
                    if (response.authResponse) {
                        rate(response.authResponse.userID);
                    }
                });
            }
        });

        return false;
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
            this.el.ratingView.css('background-position', -rating * 72 + 'px 0px');
            this.el.plusButton.css('top', 60 - rating * 10);

            this.el.rating.find('.rate-rating').fadeIn(220).html(rating + '<span>/5</span>');
        }

    };

    return Rating;
})();