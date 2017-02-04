/*
| ----------------------------------------------------------------------------------
| TABLE OF CONTENT
| ----------------------------------------------------------------------------------

01.SETTING
02.LOADER
03.HOME PAGE
04.SLIDER
05.PARALLAX
06.STICKY HEADER
07.DD MENU
08.WAYPOINT
09.ANIMATED
10.ISOTOPE FILTER
11.CHART START
12.SEARCH
13.SELECT
14.ACCORDION
15.ZOOM
16.WOW

*/
 /////////////////////////////////////
    //  HOME PAGE SLIDER
    /////////////////////////////////////

	var sliderpro1 = $('#sliderpro1') ;


    if (sliderpro1.length > 0) {

        sliderpro1.sliderPro({
            width: 2000,
            height: 900,
            fade: true,
            arrows: true,
            buttons: false,
            waitForLayers: false,
            thumbnailPointer: false,
            touchSwipe: false,
            autoplay: true,
            autoScaleLayers: true

        });

    }


$(document).ready(function() {

    "use strict";

    /////////////////////////////////////////////////////////////////
    // SETTING
    /////////////////////////////////////////////////////////////////

    var windowHeight = $(window).height();
    var windowWidth = $(window).width();
    var tabletWidth = 767;
    var mobileWidth = 640;


    var Core = {

        initialized: false,

        initialize: function() {

            if (this.initialized) return;
            this.initialized = true;

            this.build();




      /////////////////////////////////////
    //  LOADER
    /////////////////////////////////////

		jQuery("#page-preloader").addClass("animated flipOutX");



     /////////////////////////////////////
    //  HOME PAGE SLIDER
    /////////////////////////////////////

    var sliderpro1 = $('#sliderpro1') ;


    if (sliderpro1.length > 0) {

        sliderpro1.sliderPro({
            width: 2000,
            height: 900,
            fade: true,
            arrows: true,
            buttons: false,
            waitForLayers: false,
            thumbnailPointer: false,
            touchSwipe: false,
            autoplay: true,
            autoScaleLayers: true

        });

    }

    /////////////////////////////////////
    //  CONTACT FORM
    /////////////////////////////////////

    var contactForm = $('#contactForm');
    contactForm.submit(function(e)
    {
        var formData = {
            'name'    : $('#contactForm input[name=name]').val(),
            'subject' : $('#contactForm input[name=subject]').val(),
            'message' : $('#contactForm textarea[name=message]').val()
        };
        $.ajax({
                type: "POST",
                url: "assets/mailer.php",
                data: formData,
                success: function(data)
                {
                    $('#contactForm :input').attr('disabled', 'disabled');
                    $('#contactForm').fadeTo( "slow", 0.15, function() {
                        $('#success').fadeIn();
                    });
                },
                error: function()
                {
                    $('#contactForm').fadeTo( "slow", 0.15, function() {
                        $('#error').fadeIn();
                    });
                }
            });
        e.preventDefault();
    });

    /////////////////////////////////////
    //  QUERY FORM
    /////////////////////////////////////

    var queryForm = $('#queryForm');
    queryForm.submit(function(e)
    {
        var keyword = $('#queryForm input[name=key]');
        var queryfield = $('#queryForm input[name=q]');
        var txt = keyword.val().replace(/[^a-z0-9\+\-\.\#]/ig,'');
        if(txt)
        {
            $("<span/>",{text:txt.toLowerCase(), insertBefore:queryForm});
            queryfield.val(queryfield.val() + "," + txt);
            keyword.val("");
        }

        var formData = {
            'q'    : queryfield.val()
        };
        $.ajax({
                type: "POST",
                url: "assets/QuerySearch.php",
                data: formData,
                success: function(data)
                {
                    alert(data);
                    $('#search_results').empty('');

                }
            });

        e.preventDefault();
    });

    $('#querytags').on('click', 'span', function()
    {
        if(confirm("Remove "+ $(this).text() +"?"))
        {
            var queryfield = $('#queryForm input[name=q]');
            queryfield.val(queryfield.val().replace($(this).text(), ''));
            queryForm.submit();
            $(this).remove();
        }
    });

    /////////////////////////////////////
    //  PARALLAX
    /////////////////////////////////////

    $('.section-parallax').each(function() {
        var $bgobj = $(this);
        $(window).scroll(function() {
            var yPos = -($(window).scrollTop() / $bgobj.data('speed'));
            var coords = 'center ' + yPos + 'px';
            $bgobj.css({
                backgroundPosition: coords
            });
        });
    });


	/////////////////////////////////////
    //  STICKY HEADER
    /////////////////////////////////////



    /*
    if (windowWidth > tabletWidth) {

        var headerSticky = $(".layout-theme").data("header");
        var headerTop = $(".layout-theme").data("header-top");

        if (headerSticky.length) {
            $(window).on('scroll', function() {
                var winH = $(window).scrollTop();
                var $pageHeader = $('.header');
                if (winH > headerTop) {

                    $pageHeader.addClass("sticky");

                } else {

                    $pageHeader.removeClass('sticky');
                }
            });
        }
    }*/

    ////////////////////////////////////////////
    // ISOTOPE FILTER
    ///////////////////////////////////////////

    var $container = $('.isotope-filter');

    $container.imagesLoaded(function() {
        $container.isotope({
            // options
            itemSelector: '.isotope-item'
        });
    });



    $('#filter a').on('click', function(e) {


        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector
        });
        return false;


    });



		/////////////////////////////////////
    //  CHART START
    /////////////////////////////////////


	var chart = $('.chart') ;


    if ($('body').length) {
        $(window).on('scroll', function() {
            var winH = $(window).scrollTop();

            $('.list-progress').waypoint(function() {
                chart.each(function() {
                    CharsStart();
                });
            }, {
                offset: '80%'
            });
        });
    }


    function CharsStart() {
         chart.easyPieChart({
            barColor: false,
            trackColor: false,
            scaleColor: false,
            scaleLength: false,
            lineCap: false,
            lineWidth: false,
            size: false,
            animate: 7000,

            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });

    }





		/////////////////////////////////////
    //  SEARCH
    /////////////////////////////////////


    $('#search-open, #search-close').on('click', function(e) {
        e.preventDefault();
		var  headerSearch = $('.header-search ') ;
       headerSearch.toggleClass('open-search');
        headerSearch.toggleClass('open');
    });




		/////////////////////////////////////
    //  SELECT
    /////////////////////////////////////

    $('.jelect').jelect();



		/////////////////////////////////////
    //  ZOOM
    /////////////////////////////////////


    $("a[rel^='prettyPhoto']").prettyPhoto({
        animation_speed: 'normal',
        theme: 'light_square',
        slideshow: 3000
    });



		/////////////////////////////////////
    //  ACCORDION
    /////////////////////////////////////

    $(".btn-collapse").on('click', function() {
        $(this).parents('.panel-group').children('.panel').removeClass('panel-default');
        $(this).parents('.panel').addClass('panel-default');
        if ($(this).is(".collapsed")) {
            $('.panel-title').removeClass('panel-passive');
        } else {
            $(this).next().toggleClass('panel-passive');
        };
    });

        },

        build: function() {

            // OWL CAROUSEL

            this.initOwlCarousel();
        },
        initOwlCarousel: function(options) {

            $(".enable-owl-carousel").each(function(i) {
                var $owl = $(this);

                var itemsData = $owl.data('items');
                var navigationData = $owl.data('navigation');
                var paginationData = $owl.data('pagination');
                var singleItemData = $owl.data('single-item');
                var autoPlayData = $owl.data('auto-play');
                var transitionStyleData = $owl.data('transition-style');
                var mainSliderData = $owl.data('main-text-animation');
                var afterInitDelay = $owl.data('after-init-delay');
                var stopOnHoverData = $owl.data('stop-on-hover');
                var min480 = $owl.data('min480');
                var min768 = $owl.data('min768');
                var min992 = $owl.data('min992');
                var min1200 = $owl.data('min1200');

                $owl.owlCarousel({
                    navigation: navigationData,
                    pagination: paginationData,
                    singleItem: singleItemData,
                    autoPlay: autoPlayData,
                    transitionStyle: transitionStyleData,
                    stopOnHover: stopOnHoverData,
                    navigationText: ["<i></i>", "<i></i>"],
                    items: itemsData,
                    itemsCustom: [
                        [0, 1],
                        [465, min480],
                        [750, min768],
                        [975, min992],
                        [1185, min1200]
                    ],
                    afterInit: function(elem) {
                        if (mainSliderData) {
                            setTimeout(function() {
                                $('.main-slider_zoomIn').css('visibility', 'visible').removeClass('zoomIn').addClass('zoomIn');
                                $('.main-slider_fadeInLeft').css('visibility', 'visible').removeClass('fadeInLeft').addClass('fadeInLeft');
                                $('.main-slider_fadeInLeftBig').css('visibility', 'visible').removeClass('fadeInLeftBig').addClass('fadeInLeftBig');
                                $('.main-slider_fadeInRightBig').css('visibility', 'visible').removeClass('fadeInRightBig').addClass('fadeInRightBig');
                            }, afterInitDelay);
                        }
                    },
                    beforeMove: function(elem) {
                        if (mainSliderData) {
                            $('.main-slider_zoomIn').css('visibility', 'hidden').removeClass('zoomIn');
                            $('.main-slider_slideInUp').css('visibility', 'hidden').removeClass('slideInUp');
                            $('.main-slider_fadeInLeft').css('visibility', 'hidden').removeClass('fadeInLeft');
                            $('.main-slider_fadeInRight').css('visibility', 'hidden').removeClass('fadeInRight');
                            $('.main-slider_fadeInLeftBig').css('visibility', 'hidden').removeClass('fadeInLeftBig');
                            $('.main-slider_fadeInRightBig').css('visibility', 'hidden').removeClass('fadeInRightBig');
                        }
                    },
                    afterMove: sliderContentAnimate,
                    afterUpdate: sliderContentAnimate,
                });
            });

            function sliderContentAnimate(elem) {
                var $elem = elem;
                var afterMoveDelay = $elem.data('after-move-delay');
                var mainSliderData = $elem.data('main-text-animation');
                if (mainSliderData) {
                    setTimeout(function() {
                        $('.main-slider_zoomIn').css('visibility', 'visible').addClass('zoomIn');
                        $('.main-slider_slideInUp').css('visibility', 'visible').addClass('slideInUp');
                        $('.main-slider_fadeInLeft').css('visibility', 'visible').addClass('fadeInLeft');
                        $('.main-slider_fadeInRight').css('visibility', 'visible').addClass('fadeInRight');
                        $('.main-slider_fadeInLeftBig').css('visibility', 'visible').addClass('fadeInLeftBig');
                        $('.main-slider_fadeInRightBig').css('visibility', 'visible').addClass('fadeInRightBig');
                    }, afterMoveDelay);
                }
            }
        },

    };

    Core.initialize();

});



/////////////////////////////////////////////////////////////////
// Animated WOW
/////////////////////////////////////////////////////////////////
new WOW().init();
