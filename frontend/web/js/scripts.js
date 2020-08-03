$(function () {
    "use strict";

    m();

    $('.banner-slider').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        nav: false,
        dots: true,
        animateOut: 'flipOutX'
    });

    $('.testimonial-area').owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplaySpeed: 3000,
        nav: false,
        dots: true,
        margin: 20,
    });

    $('.news-slider').owlCarousel({
        items: 3,
        loop: true,
        autoplay: false,
        autoplaySpeed: 2000,
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-chevron-left"></i>','<i class="fa fa-chevron-right"></i>'],
        margin: 30,
        responsive: {
            0: {items: 1},
            480: {items: 1},
            640: {items: 2},
            991: {items: 3},
            1199: {items: 3}
        }
    });

    $('.partner-slider').owlCarousel({
        items: 6,
        loop: true,
        autoplay: true,
        autoplaySpeed: 1500,
        nav: false,
        dots: false,
        margin: 30,
        responsive: {
            0:{items: 2},
            480:{items: 2},
            640:{items: 4},
            991:{items: 5},
            1199: {items: 6}
        }
    });

    $('#gotop').click(function() {
        $('html, body').animate({scrollTop:0},500);
    });
});

function m() {
    let m = $('#header'),
        h = m.outerHeight();

    // $('#main').css('padding-top', h);

    $(window).scroll(function () {
        $(this).scrollTop() > 0 ? m.addClass('sticky') : m.removeClass('sticky');
    });
}