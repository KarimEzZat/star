jQuery(function ($) {
    "use strict";

    /** ------- Pre Loader **/
    $(window).on('load', function () {
        $(".preloader-area").delay(200).fadeOut(500);
    });

    /** Fix Home Banner Area Height **/
    var window_width = $(window).width(),
        window_height = window.innerHeight,
        header_height = $(".default-header").height(),
        header_height_static = $(".site-header.static").outerHeight(),
        fitscreen = window_height - header_height;

    $(".fullscreen").css("height", window_height);
    $(".fitscreen").css("height", fitscreen);

    /** Custom menu are (Navigation) **/
    $('#nav-icon, .navbar-nav li a').on('click', function () {
        $('#nav-icon').toggleClass('open');
        $('.navbar-nav li a').toggleClass('open');
        $('.custom-menu-area').toggleClass('menu-open');
    });

    /*-- Smoth-Scroll --*/
    $(' a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .on('click', function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 90
                    }, 1000);
                }
            }
        });


    /** ------- Header Scroll Class  js --------**/
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 100) {
            $('#header').addClass('header-scrolled');
        } else {
            $('#header').removeClass('header-scrolled');
        }
    });

    /** ------- Gallery Area Video -------- **/
    $('.video-list .vid:first-of-type').addClass('active');
    let listVideo = document.querySelectorAll('.video-list .vid');
    let mainVideo = document.querySelector('.main-video video');
    let title = document.querySelector('.main-video .title');
    let mainDescription = document.querySelector('.main-video .description');
    listVideo.forEach(video => {
        video.onclick = () => {
            listVideo.forEach(vid => vid.classList.remove('active'));
            video.classList.add('active');
            if (video.classList.contains('active')) {
                let src = video.children[0].getAttribute('src');
                mainVideo.src = src;
                let text = video.children[1].innerHTML;
                title.innerHTML = text;
                let desc = video.children[2].innerHTML;
                mainDescription.innerHTML = desc;
            }

        };
    });
    /** ------- Go to Top -------- **/
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 100) {
            $('#header1').addClass('header-scrolled1');
            $('#back-top').addClass('back-top-animation');
        } else {
            $('#header1').removeClass('header-scrolled1');
            $('#back-top').removeClass('back-top-animation');
        }
    });

    /** ------- scroll body to 0px on click -------- **/
    $('#back-top a').on("click", function () {
        $('body,html').animate({
            scrollTop: 0
        }, 1000);
        return false;
    });


});
