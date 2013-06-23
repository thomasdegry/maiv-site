/* globals AppDemo */
/* globals HorizontalSlider */
/* globals Gallery */
/* globals FastClick */

$(window).load(function () {

    // Init app demo (should only work on index)
    var appDemo = new AppDemo();
    var horizontalSlider = new HorizontalSlider();
    var gallery = new Gallery();

    $('.toggle-nav').sidr({
        name: 'sidr-main',
        source: '.site-header'
    });

    //leap
    $.deck('.slide');


    if($(".app-demo").length > 0){


            var scrollorama = $.scrollorama({
                blocks:'.scrollblock',
                enablePin:false
            });

            scrollorama.animate('#block1',{
                duration: 200,
                property:'right',
                start:-1000,
                end: 30,
                easing: "bounce baby"

            });
            scrollorama.animate('#block1',{
                duration: 200,
                property:'opacity',
                start:0,
                end: 1

            });

            scrollorama.animate('#block2',{
                delay: 700,
                duration: 200,
                property:'left',
                start:-1000,
                end: 30,
                easing: "bounce baby"

            });
            scrollorama.animate('#block2',{
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
    }

    FastClick.attach(document.body);

    // @todo in class
    $('.sliding-doors').on('click', '.sliding-door-toggle', function (e) {
        e.preventDefault();
        $(this).closest('.sliding-doors').toggleClass('sliding-doors-open');
    });

});