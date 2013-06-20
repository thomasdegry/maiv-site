var Forms = (function () {

    var Forms = function () {
        _.bindAll(this);

        this.el = {
            dates: $(".datepicker")
        };

        if(this.el.dates.length === 0) {
            return false;
        }

        this.initDates();
    };

    Forms.prototype.initDates = function() {
        this.el.dates.pickadate({
            format: 'dd mmmm, yyyy',
            formatSubmit: 'yyyy/mm/dd'
        });
    };

    return Forms;

})();