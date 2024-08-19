$(document).ready(function () {
    //Init the carousel
    $("#bid-s").owlCarousel({
        rtl: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        dots: false,
        onInitialized: startProgressBar,
        onTranslate: resetProgressBar,
        onTranslated: startProgressBar
    });
    
    function startProgressBar() {
      $(".slide-progress").css({
        width: "100%",
        transition: "width 5000ms"
      });
    }

    function resetProgressBar() {
      $(".slide-progress").css({
        width: 0,
        transition: "width 0s"
      });
    }
    // **************  product slider
    $(".product-carousel-catgory").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: ['<i class="now-ui-icons arrows-1_minimal-right"></i>', '<i class="now-ui-icons arrows-1_minimal-left"></i>'],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 2,
                slideBy: 1
            },
            768: {
                items: 4,
                slideBy: 2
            },
            992: {
                items: 4,
                slideBy: 2
            },
            1400: {
                items: 5,
                slideBy: 3
            }
        }
    });
    // **************  product slider
    $(".product-carousel").owlCarousel({
        rtl: true,
        margin: 10,
        nav: true,
        navText: ['<i class="now-ui-icons arrows-1_minimal-right"></i>', '<i class="now-ui-icons arrows-1_minimal-left"></i>'],
        dots: false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
                slideBy: 1
            },
            576: {
                items: 2,
                slideBy: 1
            },
            768: {
                items: 4,
                slideBy: 2
            },
            992: {
                items: 5,
                slideBy: 2
            },
            1400: {
                items: 6,
                slideBy: 3
            }
        }
    });


    $('.brand-slider-cat .owl-carousel').owlCarousel({
        rtl: true,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 200,
        responsive: {
            0: { items: 1 },
            1200: { items: 5 },
            992: { items: 5 },
            768: { items: 5 },
            600: { items: 3 },
            480: { items: 2 }
        }
    });

    $('.brand-slider-cat2 .owl-carousel').owlCarousel({
        rtl: true,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 600,
        responsive: {
            0: { items: 1 },
            1200: { items: 4 },
            992: { items: 4 },
            768: { items: 5 },
            600: { items: 4 },
            480: { items: 2 }
        }
    });

    $('.brand-slider .owl-carousel').owlCarousel({
        rtl: true,
        dots: false,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 200,
        responsive: {
            0: { items: 1 },
            1200: { items: 7 },
            992: { items: 6 },
            768: { items: 5 },
            600: { items: 3 },
            480: { items: 2 }
        }
    });


    $('.back-to-top').click(function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 800, 'easeInExpo');
    });

    if ($("#img-product-zoom").length) {
        $("#img-product-zoom").ezPlus({
            zoomType: "inner",
            containLensZoom: true,
            gallery: 'gallery_01f',
            cursor: "crosshair",
            galleryActiveClass: "active",
            responsive: true,
            imageCrossfade: true,
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500
        });
    }

    $(".sum-more").click(function () {
        var sumaryBox = $(this).parents('.parent-expert');
        sumaryBox.find('.content-expert').toggleClass('active');
        sumaryBox.find('.shadow-box').fadeToggle();

        $(this).find('i').toggleClass('active');

        $(this).find('.show-more').fadeToggle(0);
        $(this).find('.show-less').fadeToggle(0);

    });

    $('nav.header-responsive li.active').addClass('open').children('ul').show();

    $("nav.header-responsive li.sub-menu> a").on('click', function () {
        $(this).removeAttr('href');
        var e = $(this).parent('li');
        if (e.hasClass('open')) {
            e.removeClass('open');
            e.find('li').removeClass('open');
            e.find('ul').slideUp(400);

        } else {
            e.addClass('open');
            e.children('ul').slideDown(400);
            e.siblings('li').children('ul').slideUp(400);
            e.siblings('li').removeClass('open');
        }
    });

    // Start scroll

    $(window).scroll(function () {
        if ($(this).scrollTop() > 60) {
            $("nav.header-responsive").css({ height: '60px' });
            $("nav.header-responsive .search-nav").css({ opacity: '0', visibility: 'hidden' });
        } else {
            $("nav.header-responsive").css({ height: '110px' });
            $("nav.header-responsive .search-nav").css({ opacity: '1', visibility: 'visible' });
        }
    });

    // End scroll
    
    // favorites product
    
    $("ul.gallery-options button.add-favorites").on("click",function () {
        $(this).toggleClass("favorites");
    });
    
    // favorites product

});







if (jQuery('.slider_main').length > 0) {
    jQuery(".slider_main").owlCarousel({
        rtl: true,
        dots: true,
        loop: true,
        autoplay: true,
        autoplayHoverPause: true,
        smartSpeed: 100,
        mouseDrag: true, 
        nav: true,
        navText: ["<div class='nav-btn prev-slide '><i class='fa fa-chevron-right'></i></div>", "<div class='nav-btn next-slide '><i class='fa fa-chevron-left'></i></div>"],
        responsive: {
            0: { items: 1, dots: false },
            1200: { items: 1},
            767: { items: 1},
            600: { items: 1, dots: false },
            480: { items: 1, dots: false }
        }
    });
}

jQuery(".recent-nav .next").on("click", function () {
    jQuery(".slider_main").trigger('next.owl.carousel');
});
jQuery(".recent-nav .prev").on("click", function () {
    jQuery(".slider_main").trigger('prev.owl.carousel');
});



var slider = document.getElementById('slider');

noUiSlider.create(slider, {
    start: [12000, 42500],
    tooltips: true, step: 500,
    connect: true,

    range: {
        'min': 1000,
        'max': 50000
    },
    format: {
        to: function(value) {
            return (parseInt(value)+" تومان");
        },
        from: (v) => v | 0
    }
});

 
/*slider speed*/
$('.carousel').carousel({
    interval: 50000
})



