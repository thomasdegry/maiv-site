var Forms = (function () {

    var Forms = function () {
        _.bindAll(this);

        this.el = {
            dates: $(".datepicker"),
            btnPush: $("#btnSendPush"),
            loader: $("#loader")
        };

        if(this.el.dates.length === 0 && this.el.btnPush.length === 0) {
            return false;
        }

        this.initDates();

        $("#btnSendPush").click(this.sendPushes);
    };

    Forms.prototype.initDates = function() {
        this.el.dates.pickadate({
            format: 'dd mmmm, yyyy',
            formatSubmit: 'yyyy/mm/dd'
        });
    };

    Forms.prototype.sendPushes = function() {
        console.log('hallo');
        this.el.btnPush.addClass('disabled');
        this.el.loader.addClass('show');

        setTimeout(_.bind(function() {
            this.el.btnPush.attr('disabled', 'disabled');
        }, this), 10);
    };

    return Forms;

})();