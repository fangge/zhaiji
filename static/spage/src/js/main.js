(function($){

    "use strict";

    $(window).load(function() {

        $.fn.postLike = function() {
            // if ($(this).hasClass('done')) {
            //     alert('您已赞过该文章');
            //     return false;
            // } else {
            //     $(this).addClass('done');
            //     var id = $(this).data("id"),
            //         action = $(this).data('action'),
            //         rateHolder = $(this).children('.count');
            //     var ajax_data = {
            //         action: "specs_zan",
            //         um_id: id,
            //         um_action: action
            //     };
            //     $.post("http://www.hx-h.com/zhaiji_v2/wp-admin/admin-ajax.php", ajax_data,
            //         function(data) {
            //             $(rateHolder).html(data);
            //         });
            //     return false;
            // }

            if (!$(this).hasClass('done'))$(this).addClass('done');
            var id = $(this).data("id"),
                action = $(this).data('action'),
                rateHolder = $(this).children('.count');
            var ajax_data = {
                action: "specs_zan",
                um_id: id,
                um_action: action
            };
            $.post("http://www.hx-h.com/zhaiji_v2/wp-admin/admin-ajax.php", ajax_data,
                function(data) {
                    $(rateHolder).html(data);
                });
            return false;
        };

        $(document).on("click", ".specsZan",
            function() {
                $(this).postLike();
        });

        // Preloader
        $('.loader').fadeOut();
        $('.loader-mask').delay(100).fadeOut('fast');

        $(window).trigger("resize");
        masonry();
        initOwlCarousel();
        initMasonry();
        wow.init();

    });


    $(window).resize(function(){

        container_full_height_init();
        $.stellar('refresh');
        megaMenu();
        megaMenuWide();

        var windowWidth = $(window).width();
        if (windowWidth <= 974) {
            $('.dropdown-toggle').attr('data-toggle', 'dropdown');
            $('.navigation').removeClass("sticky");
        }
        if (windowWidth > 974) {
            $('.dropdown-toggle').removeAttr('data-toggle', 'dropdown');
            $('.dropdown').removeClass('open');
        }

        /* Mobile Menu Resize
        -------------------------------------------------------*/
        $(".navbar .navbar-collapse").css("max-height", $(window).height() - $(".navbar-header").height() );

    });

    if(!$('body').hasClass('list') && !$('body').hasClass('art')){
        var value = location.search.match(new RegExp(`[?&]${"nav"}=([^&]*)(&?)`, 'i'));
        value = value ? decodeURIComponent(value[1]) : value;
        setTimeout(function () {
            $('html,body').animate({'scrollTop':$('.'+value).offset().top},400);
        },1000)
    }



    $('.navbar-nav').find('a').on('click',function () {
        var top,t = $(this);
        if($('body').hasClass('list') || $('body').hasClass('art')){
            location.href='/?nav='+t.data('scroll');
        }else{
            top = $('.'+t.data('scroll')).offset().top
            $('html,body').animate({'scrollTop':top},400)
        }

    })


    /* Sticky Navigation
    -------------------------------------------------------*/
    $(window).scroll(function(){

        var windowWidth = $(window).width();
        if ($(window).scrollTop() > 190 & windowWidth > 974){
            $('.navigation').addClass("sticky");
            $('.logo-wrap').addClass("shrink");
        } else {
            $('.navigation').removeClass("sticky");
            $('.logo-wrap').removeClass("shrink");
        }

        if ($(window).scrollTop() > 200 & windowWidth > 974){
            $('.navigation').addClass("offset");
        } else {
            $('.navigation').removeClass("offset");
        }

        if ($(window).scrollTop() > 500 & windowWidth > 974){
            $('.navigation').addClass("scrolling");
        } else {
            $('.navigation').removeClass("scrolling");
        }


        if ($(window).scrollTop() > 190 ){
            $('.navbar-fixed-top').addClass("sticky");
        } else {
            $('.navbar-fixed-top').removeClass("sticky");
        }

    });

    /* Onepage Nav
    -------------------------------------------------------*/
    $('.onepage-nav .navbar-collapse ul li a').on('click',function() {
        $(".navbar-collapse").collapse('hide');
    });


    // Smooth Scroll Navigation
    $('.local-scroll').localScroll({offset: {top: -60},duration: 1500,easing:'easeInOutExpo'});


    /* Full screen Navigation
    -------------------------------------------------------*/
    $('#nav-icon, .overlay-menu').on("click", function(){
        $('#nav-icon, #overlay').toggleClass('open');

        $(function(){

            var delay = 0

            $('.overlay-menu > ul > li').each(function(){
                $(this).css({animationDelay: delay+'s'})
                delay += 0.1
            })

        })

    });


    /* Bootstrap Dropdown Navigation
    -------------------------------------------------------*/

    $('.dropdown-submenu > a').submenupicker();


    /* Search
    -------------------------------------------------------*/
    $('.search-trigger').on('click',function(e){
        e.preventDefault();
        $('.search-wrap').animate({opacity: 'toggle'},500);
        $('.nav-search, #search-close').addClass("open");
        $('.search-wrap .form-control').focus();

    });

    $('.search-close').on('click',function(e){
        e.preventDefault();
        $('.search-wrap').animate({opacity: 'toggle'},500);
        $('.nav-search, #search-close').removeClass("open");

    });

    function closeSearch(){
        $('.search-wrap').fadeOut(200);
        $('.nav-search, #search-close').removeClass("open");
    }

    $(document.body).on('click',function(e) {
        closeSearch();
    });

    $(".search-wrap, .search-trigger").on('click',function(e) {
        e.stopPropagation();
    });



    /* Sidenav
    -------------------------------------------------------*/

    $(".nav-icon-trigger, #sidenav-close").on('click', function(e) {
        e.preventDefault();
        $(".sidenav").toggleClass('opened');
        $('.main-wrapper').toggleClass('sidenav-opened');
    });

    $("#sidenav-close").on('click', function() {
        $('#nav-icon').removeClass('open');
    });

    $(window).scroll(function () {
        if ($(window).scrollTop() ){
            $(".sidenav").removeClass('opened');
            $('.main-wrapper').removeClass('sidenav-opened');
            $('#nav-icon').removeClass('open');
        } else {
            return false;
        }
    });


    /* Mobile Navigation
    -------------------------------------------------------*/
    $('.dropdown-toggle').on('click', function(e){ e.preventDefault(); });


    /* Mobile Detect
    -------------------------------------------------------*/
    if (/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i.test(navigator.userAgent || navigator.vendor || window.opera)) {
        $("html").addClass("mobile");
        $('.dropdown-toggle').attr('data-toggle', 'dropdown');
    }
    else {
        $("html").removeClass("mobile");
    }

    /* IE Detect
    -------------------------------------------------------*/
    if(Function('/*@cc_on return document.documentMode===10@*/')()){ $("html").addClass("ie"); }


    /* Mega Menu
    -------------------------------------------------------*/
    function megaMenu(){

        $('.megamenu').each(function () {
            $(this).css('width', $('.container').width());
            var offset = $(this).closest('.dropdown').offset();
            offset = offset.left;
            var containerOffset = $(window).width() - $('.container').outerWidth();
            containerOffset = containerOffset /2;
            offset = offset - containerOffset - 15;
            $(this).css('left', -offset);
        });

    }

    function megaMenuWide(){

        $('.megamenu-wide').each(function () {
            $(this).css('width', $('.container-fluid').width());
            var offset = $(this).closest('.dropdown').offset();
            offset = offset.left;
            var containerOffset = $(window).width() - $('.container-fluid').outerWidth();
            containerOffset = containerOffset /2;
            offset = offset - containerOffset - 50;
            $(this).css('left', -offset);
        });

    }


    /* Text Rotator
    -------------------------------------------------------*/
    $(".rotate").textrotator({
        animation: "dissolve", // You can pick the way it animates when rotating through words. Options are dissolve (default), fade, flip, flipUp, flipCube, flipCubeUp and spin.
        separator: ",",
        speed: 3000
    });


    /* Typing Text
    -------------------------------------------------------*/
    $(function(){
        $(".typing-text").typed({
            strings: ["Landing Page", "Startup Site", "Onepage"],
            typeSpeed: 30,
            backDelay: 1500,
            loop: true
        });
    });


    /* Counters
    -------------------------------------------------------*/
    $('.statistic').appear(function() {
        $('.timer').countTo({
            speed: 4000,
            refreshInterval: 60,
            formatter: function (value, options) {
                return value.toFixed(options.decimals);
            }
        });
    });


    /* Owl Carousel
    -------------------------------------------------------*/

    function initOwlCarousel(){
        (function($){
            "use strict";

            /* Promo with Laptop
            -------------------------------------------------------*/
            var owlpromo = $("#owl-promo")
            owlpromo.owlCarousel({

                pagination: false,
                singleItem: true

            })


            /* Featured Works
            -------------------------------------------------------*/
            $("#owl-featured-works").owlCarousel({

                pagination: false,
                navigation: true,
                navigationText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
                itemsCustom: [
                    [0, 1],
                    [550, 2],
                    [700, 2],
                    [850, 2],
                    [1000, 3],
                    [1200, 4],
                    [1600, 4]
                ],

            })


            /* Testimonials
            -------------------------------------------------------*/

            $("#owl-testimonials").owlCarousel({

                navigation: true,
                navigationText: ["<i class='prev-btn'></i>", "<i class='next-btn'></i>"],
                autoHeight: true,
                slideSpeed: 300,
                pagination: false,
                paginationSpeed: 400,
                singleItem: true,
                stopOnHover: true

            })

            // 2 Boxes
            $("#owl-testimonials-boxes-2").owlCarousel({

                navigation: false,
                slideSpeed: 300,
                pagination: true,
                paginationSpeed: 400,
                stopOnHover: true,
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [700, 2],
                    [1200, 2]
                ],

            })

            // 1 Box
            $("#owl-testimonials-box").owlCarousel({

                navigation: false,
                slideSpeed: 300,
                pagination: true,
                singleItem: true,
                stopOnHover: true

            })

            // 3 Boxes
            $("#owl-testimonials-boxes-3").owlCarousel({

                navigation: false,
                slideSpeed: 300,
                pagination: true,
                paginationSpeed: 400,
                stopOnHover: true,
                itemsCustom: [
                    [0, 1],
                    [450, 1],
                    [700, 2],
                    [1200, 3]
                ],

            })


            /* Partners Logo
            -------------------------------------------------------*/

            $("#owl-partners").owlCarousel({

                autoPlay: 3000,
                pagination: false,
                itemsCustom: [
                    [0, 2],
                    [370, 3],
                    [550, 4],
                    [700, 5],
                    [1000, 6]
                ],

            })


            /* Shop Items Slider
            -------------------------------------------------------*/

            $("#owl-shop-items-slider").owlCarousel({

                pagination: false,
                navigation: true,
                navigationText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
                itemsCustom: [
                    [0, 1],
                    [370, 2],
                    [550, 3],
                    [700, 4],
                    [1000, 4]
                ],

            })


            /* Team Slider
            -------------------------------------------------------*/

            $("#owl-team-slider").owlCarousel({

                pagination: true,
                navigation: false,
                navigationText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
                itemsCustom: [
                    [0, 1],
                    [370, 2],
                    [550, 3],
                    [700, 4],
                    [1000, 4]
                ],

            })


            /* Single Image
            -------------------------------------------------------*/

            $("#owl-single").owlCarousel({

                navigation: true,
                pagination: false,
                slideSpeed: 300,
                paginationSpeed: 400,
                singleItem: true,
                navigationText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"]

            })

            // Custom Navigation Events
            $(".next").on('click',function(){
                owlpromo.trigger('owl.next');
            })
            $(".prev").on('click',function(){
                owlpromo.trigger('owl.prev');
            });


        })(jQuery);
    };


    /* FlexSlider
    -------------------------------------------------------*/

    function masonry() {
        var $container = $('.masonry');
        $container.imagesLoaded( function() {
            $container.isotope({
                itemSelector: '.masonry-item',
                layoutMode: 'masonry'
            });
        });
    }


    // Tabs Slider
    $('#tabs-slider').flexslider({
        animation: "slide",
        manualControls: ".flex-control-nav li",
        useCSS: false, /* Chrome fix*/
        animationSpeed: 200,
        touch: true,
        directionNav: false,
        slideshow: false
    });


    // Flexslider / Masonry
    $('#flexslider').flexslider({
        animation: "slide",
        directionNav: true,
        touch: true,
        slideshow: false,
        prevText: ["<i class='ti-angle-left'></i>"],
        nextText: ["<i class='ti-angle-right'></i>"],
        start: function(){
            var $container = $('.masonry');
            $container.imagesLoaded( function() {
                $container.isotope({
                    itemSelector: '.masonry-item',
                    layoutMode: 'masonry'
                });
            });
        }
    });


    /* Flickity Slider
    -------------------------------------------------------*/

    var $gallery = $('#showcases-slider').flickity({
        cellAlign: 'center',
        contain: true,
        wrapAround: true,
        autoPlay: false,
        prevNextButtons: false,
        percentPosition: true,
        imagesLoaded: true,
        lazyLoad: 1,
        pageDots: true,
        selectedAttraction : 0.1,
        friction: 0.6,
        rightToLeft: false,
        arrowShape: 'M 10,50 L 55,95 L 60,90 L 20,50  L 60,10 L 55,5 Z'
    });


    // main large image (shop product)
    var $gallery = $('#gallery-main').flickity({
        cellAlign: 'center',
        contain: true,
        wrapAround: true,
        autoPlay: false,
        prevNextButtons: true,
        percentPosition: true,
        imagesLoaded: true,
        lazyLoad: 1,
        pageDots: false,
        selectedAttraction : 0.1,
        friction: 0.6,
        rightToLeft: false,
        arrowShape: 'M 10,50 L 60,100 L 65,95 L 20,50  L 65,5 L 60,0 Z'
    });

    // thumbs
    $('.gallery-thumbs').flickity({
        asNavFor: '#gallery-main',
        contain: true,
        cellAlign: 'left',
        wrapAround: false,
        autoPlay: false,
        prevNextButtons: false,
        percentPosition: true,
        imagesLoaded: true,
        pageDots: false,
        selectedAttraction : 0.1,
        friction: 0.6,
        rightToLeft: false
    });


    // magnific popup bug fix
    var popupItems = $.map( $gallery.find('.gallery-cell a'), function( link ) {
        return {
            src: link.href,
            type: $(link).attr('data-popup-type') || 'image'
        }
    });

    $gallery.on('staticClick', function(event, pointer, cellElement, cellIndex) {
        if (!cellElement) {
            return;
        }
        $.magnificPopup.open({
            items: popupItems,
            gallery: {
                enabled: true
            },
            callbacks: {
                open: function () {
                    $.magnificPopup.instance.goTo( cellIndex );
                }
            }
        });
    });

    // prevent links from opening
    $gallery.on( 'click', 'a', function(event) {
        event.preventDefault();
    });


    /* Payment Method Accordion
    -------------------------------------------------------*/
    var Methods = $(".payment_methods > li > .payment_box").hide();
    Methods.first().slideDown("easeOutExpo");

    $(".payment_methods > li > input").change(function(){

        var current = $(this).parent().children(".payment_box");
        Methods.not(current).slideUp("easeInExpo");
        $(this).parent().children(".payment_box").slideDown("easeOutExpo");

        return false;

    });


    /* Quantity
    -------------------------------------------------------*/
    $(function() {

        // Increase
        jQuery(document).on('click', '.plus', function(e) {
            e.preventDefault();
            var quantityInput = jQuery(this).parents('.quantity').find('input.qty'),
                newValue = parseInt(quantityInput.val(), 10) + 1,
                maxValue = parseInt(quantityInput.attr('max'), 10);

            if (!maxValue) {
                maxValue = 9999999999;
            }

            if ( newValue <= maxValue ) {
                quantityInput.val(newValue);
                quantityInput.change();
            }
        });

        // Decrease
        jQuery(document).on('click', '.minus', function(e) {
            e.preventDefault();
            var quantityInput = jQuery(this).parents('.quantity').find('input.qty'),
                newValue = parseInt(quantityInput.val(), 10) - 1,
                minValue = parseInt(quantityInput.attr('min'), 10);

            if (!minValue) {
                minValue = 1;
            }

            if ( newValue >= minValue ) {
                quantityInput.val(newValue);
                quantityInput.change();
            }
        });

    });



    /* Progress Bars
    -------------------------------------------------------*/
    var $section = $('#animated-skills').appear(function() {

        var bar = $('.progress-bar');
        var bar_width = $(this);

        function loadDaBars() {

            $(bar).each(function(){
                bar_width = $(this).attr('aria-valuenow');
                $(this).width(bar_width + '%');
            });
        }
        loadDaBars();
    });


    /* Pie Charts
    -------------------------------------------------------*/
    $('.chart').appear(function() {

        $(this).easyPieChart({

            animate:{
                duration:1500,
                enabled:true
            },
            scaleColor:false,
            trackColor:'#f5f5f5',
            easing: 'easeOutBounce',
            lineWidth: 3,
            size: 160,
            lineCap: 'square',

            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
        var chart = window.chart = $('.chart').data('easyPieChart');
        $('.js_update').on('click', function() {
            chart.update(Math.random()*200-100);
        });
    });


    /* Accordion
    -------------------------------------------------------*/
    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("a")
            .toggleClass('plus minus');
    }
    $('#accordion').on('hide.bs.collapse', toggleChevron);
    $('#accordion').on('show.bs.collapse', toggleChevron);


    /* Toggle
    -------------------------------------------------------*/
    var allToggles = $(".toggle > .panel-content").hide();

    $(".toggle > .acc-panel > a").on('click', function(){

        if ($(this).hasClass("active")) {
            $(this).parent().next().slideUp("easeOutExpo");
            $(this).removeClass("active");
        }

        else {
            $(this).parent().next(".panel-content");
            $(this).addClass("active");
            $(this).parent().next().slideDown("easeOutExpo");
        }

        return false;
    });


    /* Nav Toggles
    -------------------------------------------------------*/
    $(".nav-item-submenu").hide();

    $(".nav-item-toggle > a").on('click', function(e){
        e.preventDefault();
        if ($(this).hasClass("active")) {
            $(this).next().slideUp("easeOutExpo");
            $(this).removeClass("active");
        }

        else {
            $(this).next(".nav-item-submenu");
            $(this).addClass("active");
            $(this).next().slideDown("easeOutExpo");
        }

    });

    /* Lightbox popup
    -------------------------------------------------------*/

    $('.lightbox-gallery').magnificPopup({
        type: 'image',
        tLoading: 'Loading image #%curr%...',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1]
        },
        image: {
            titleSrc: 'title'
        }
    });


    $(".lightbox-video").magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });

    /* Tooltip
    -------------------------------------------------------*/
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })


    /* Portfolio Isotope
    -------------------------------------------------------*/

    var $portfolio = $('#portfolio-container');
    $portfolio.imagesLoaded( function() {
        $portfolio.isotope({
            isOriginLeft: true,
            stagger: 30
        });
        $portfolio.isotope();

    });

    // Isotope filter
    $('#portfolio1 .portfolio-filter').on( 'click', 'a', function(e) {
        e.preventDefault();
        var filterValue = $(this).attr('data-filter');
        $portfolio.isotope({ filter: filterValue });

        $('#portfolio1 .portfolio-filter a').removeClass('active');
        $(this).closest('a').addClass('active');

    });

    /* Inifnite Scroll
   -------------------------------------------------------*/
    if($('body').hasClass('list')){
        var $portfolio2 = $('#portfolio-container2');
        $portfolio2.imagesLoaded( function() {
            $portfolio2.isotope({
                isOriginLeft: true,
                stagger: 30
            });
            $portfolio2.isotope();

        });
        $portfolio2.infiniteScroll({
                path: '.pagination__next',
                append:'.work-item',
                history: false,
                status: '.page-load-status'
            }
        );
        $portfolio2.on('load.infiniteScroll',function (event,response,path) {
            var $items = $( response ).find('.work-item');
            $items.imagesLoaded( function() {
                $portfolio2.append( $items );
                $portfolio2.isotope( 'insert', $items );
            });
        })
        $('#portfolio2 .portfolio-filter').on( 'click', 'a', function(e) {
            e.preventDefault();
            var filterValue = $(this).attr('data-filter');
            $portfolio2.isotope({ filter: filterValue });

            $('#portfolio2 .portfolio-filter a').removeClass('active');
            $(this).closest('a').addClass('active');

        });
    }


    /* Masonry
    -------------------------------------------------------*/
    function initMasonry(){

        var $masonry = $('.masonry-grid');
        $masonry.imagesLoaded( function() {
            $masonry.isotope({
                itemSelector: '.work-item',
                layoutMode: 'masonry',
                percentPosition: true,
                resizable: false,
                isResizeBound: false,
                masonry: { columnWidth: '.work-item.quarter' }
            });

        });

        $masonry.isotope();
    }


    /* Grid/list Switch
    -------------------------------------------------------*/
    function get_grid(){
        $('.list').removeClass('list-active');
        $('.grid').addClass('grid-active');
        $('.product-item').animate({opacity:0},function(){
            $('.shop-catalogue').removeClass('list-view').addClass('grid-view');
            $('.product').addClass('product-grid').removeClass('product-list');
            $('.product-item').stop().animate({opacity:1});
        });
    }

    function get_list(){
        $('.grid').removeClass('grid-active');
        $('.list').addClass('list-active');
        $('.product-item').animate({opacity:0},function(){
            $('.shop-catalogue').removeClass('grid-view').addClass('list-view');
            $('.product').addClass('product-list').removeClass('product-grid');
            $('.product-item').stop().animate({opacity:1});
        });
    }

    $('#list').on('click', function(){
        get_list();
    });

    $('#grid').on('click', function(){
        get_grid();
    });


    /* Price Slider
    -------------------------------------------------------*/

    $(function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 1500,
            values: [ 160, 800 ],
            slide: function( event, ui ) {
                $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
            " - $" + $( "#slider-range" ).slider( "values", 1 ) );
    });


    /* Parallax
    -------------------------------------------------------*/

    $.stellar({
        horizontalScrolling: false,
        hideDistantElements: false
    });


    $(window).load(function() {

        setTimeout(function() {
            $.stellar('refresh');
        }, 1000);

    });


    // Wow Animations

    var wow = new WOW({
        offset: 50,
        mobile: false
    });



    /* FitVIds
    -------------------------------------------------------*/
    $(".video-wrap").fitVids();


    /* Contact Form
    -------------------------------------------------------*/

    var submitContact = $('#submit-message'),
        message = $('#msg');

    submitContact.on('click', function(e){
        e.preventDefault();

        var $this = $(this);

        $.ajax({
            type: "POST",
            url: 'contact.php',
            dataType: 'json',
            cache: false,
            data: $('#contact-form').serialize(),
            success: function(data) {

                if(data.info !== 'error'){
                    $this.parents('form').find('input[type=text],input[type=email],textarea,select').filter(':visible').val('');
                    message.hide().removeClass('success').removeClass('error').addClass('success').html(data.msg).fadeIn('slow').delay(5000).fadeOut('slow');
                } else {
                    message.hide().removeClass('success').removeClass('error').addClass('error').html(data.msg).fadeIn('slow').delay(5000).fadeOut('slow');
                }
            }
        });
    });


})(jQuery);


/* Scroll to Top
-------------------------------------------------------*/

(function() {
    "use strict";

    var docElem = document.documentElement,
        didScroll = false,
        changeHeaderOn = 550;
    document.querySelector( '#back-to-top' );
    function init() {
        window.addEventListener( 'scroll', function() {
            if( !didScroll ) {
                didScroll = true;
                setTimeout( scrollPage, 50 );
            }
        }, false );
    }

})();

$(window).scroll(function(event){
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $("#back-to-top").addClass("show");
    } else {
        $("#back-to-top").removeClass("show");
    }

});

$('a[href="#top"]').on('click',function(){
    $('html, body').animate({scrollTop: 0}, 1350, "easeInOutQuint");
    return false;
});


/* Full Height Container
-------------------------------------------------------*/

function container_full_height_init(){
    (function($){
        $(".container-full-height").height($(window).height());
    })(jQuery);
}

$('.read-more').on('click',function () {
    $('body,html').animate({scrollTop:$('.promo-section .title').offset().top-100},400);
})

$('article.art-cont img').each(function () {
    if($(this).parent().attr('href') != '' && $(this).parent()[0].nodeName == 'A'){
        $(this).parent().addClass('lightbox');
    }
})
$('.lightbox').swipebox();
$('article img').bind("contextmenu", function(e){ return false; })