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