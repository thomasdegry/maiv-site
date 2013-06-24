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

         this.animate();
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

    AppDemo.prototype.animate = function () {
        var scrollorama = $.scrollorama({
            blocks: '.scrollblock',
            enablePin:false
        });

        scrollorama.animate('#block1', {
            duration: 200,
            property: 'right',
            start: -1000,
            end: 30,
            easing: "bounce baby"
        });

        scrollorama.animate('#block1', {
            duration: 200,
            property: 'opacity',
            start: 0,
            end: 1
        });

        scrollorama.animate('#block2', {
            delay: 700,
            duration: 200,
            property:'left',
            start:-1000,
            end: 30,
            easing: "bounce baby"
        });

        scrollorama.animate('#block2', {
            delay: 730,
            duration: 200,
            property:'opacity',
            start:0,
            end: 1

        });


        scrollorama.animate('#block3',{
            delay: 700,
            duration: 200,
            property:'right',
            start:-1000,
            end: 0,
            easing: "bounce baby"

        });
        scrollorama.animate('#block4',{
            delay: 750,
            duration: 200,
            property:'right',
            start:-1000,
            end: 0,
            easing: "bounce baby"

        });
        scrollorama.animate('#block5',{
            delay: 800,
            duration: 200,
            property:'right',
            start:-1000,
            end: 0,
            easing: "bounce baby"

        });

        scrollorama.animate('#block3',{
            delay: 730,
            duration: 200,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"

        });
        scrollorama.animate('#block4',{
            delay: 780,
            duration: 200,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"

        });
        scrollorama.animate('#block5',{
            delay: 830,
            duration: 200,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"

        });

        scrollorama.animate('#block6',{
            delay: 830,
            duration: 80,
            property:'bottom',
            start:-400,
            easing: "bounce baby"
        });
        scrollorama.animate('#block7',{
            delay: 860,
            duration: 80,
            property:'bottom',
            start:-400,
            easing: "bounce baby"
        });
        scrollorama.animate('#block8',{
            delay: 890,
            duration: 80,
            property:'bottom',
            start:-400,
            easing: "bounce baby"
        });

        scrollorama.animate('#block6',{
            delay: 840,
            duration: 80,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"
        });
        scrollorama.animate('#block7',{
            delay: 870,
            duration: 80,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"
        });
        scrollorama.animate('#block8',{
            delay: 890,
            duration: 80,
            property:'opacity',
            start:0,
            end: 1,
            easing: "bounce baby"
        });

        scrollorama.animate('#block9',{
            delay: 700,
            duration: 200,
            property:'right',
            start:-1000,
            end: 0,
            easing: "bounce baby"

        });



    };


    if ($("#mrburgervideo").length > 0) {
        var currenttime = 0;
        console.log(currenttime);
        var video = $(video)[0];
        $("video")[0].load();
        $(video).bind("ended", function(){
            console.log("video ended");
            $("#mrburgervideo").hide();
            $('.btn-play').show();
        });

        $("video").bind("pause", function(){
            var video = document.getElementsByTagName('video')[0];
            var now = video.currentTime;
            console.log("video paused on " + now);

            $("#mrburgervideo").hide();
            $('.btn-play').show();
            currenttime = now;
        });


        $('.btn-play').click(function () {
            console.log('play from ' + currenttime);
            $(this).hide();
            $("#mrburgervideo").show();
            $("video")[0].currentTime = parseInt(currenttime, 10);
            $("video")[0].play();
        });
    }


    return AppDemo;

}());