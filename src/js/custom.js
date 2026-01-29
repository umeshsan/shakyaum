$(document).ready(function() {
    initScrollToTop();

    //sticky navigation-menu
    function stickyNav() {
        const scrollTop = $(window).scrollTop();
        const $header = $('.header-navigation');

        if (scrollTop > 200) {
            $header.addClass('is-sticky shadow');
        } else {
            $header.removeClass('is-sticky shadow');
        }
    }
    stickyNav();
    $(window).on('scroll', stickyNav);

    //gsap effects
    gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

    // Initialize ScrollSmoother
    ScrollSmoother.create({
        wrapper: '.smooth-wrapper',
        content: '.smooth-content',
        smooth: 2, // how smooth the scroll is
        effects: true, // enable data-speed and data-lag attributes for parallax effects
    });


    // AOS EFFECTS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out-sine',
        once: true
    });

    // Smooth scroll for anchor links (same page)
    $('a[href^="#"]').on('click', function(e) {
        const targetId = this.getAttribute('href');

        // ignore empty hash or "#"
        if (targetId.length <= 1) return;

        const $target = $(targetId);
        if ($target.length) {
            e.preventDefault();

            $('html, body').stop().animate({
                scrollTop: $target.offset().top - getHeaderOffset()
            }, 800);
        }
    });


    // Smooth scroll when coming from another page with hash
    if (window.location.hash) {
        const hash = window.location.hash;

        setTimeout(function() {
            const $target = $(hash);
            if ($target.length) {
                $('html, body').stop().animate({
                    scrollTop: $target.offset().top - getHeaderOffset()
                }, 800);
            }
        }, 300); // wait for page layout
    }

});


function getHeaderOffset() {
    const $header = $('.header-navigation');
    return $header.length ? $header.outerHeight() : 0;
}


// Scroll to top button functionality
function debounce(func, wait) {
    let timeout;
    return function() {
        const context = this;
        const args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(context, args), wait);
    };
}


function initScrollToTop() {
    const $topButton = $('.topTop');
    if (!$topButton.length) return;

    $(window).scroll(debounce(function() {
        const scrollTop = $(window).scrollTop();
        const docHeight = $(document).height();
        const winHeight = $(window).height();
        const scrollPercent = Math.round((scrollTop / (docHeight - winHeight)) * 100);

        $topButton.css({
            opacity: scrollPercent > 15 ? 1 : 0,
            transform: scrollPercent > 15 ? 'translateY(0)' : 'translateY(calc(100% + 5px))'
        });
    }, 100));

    $topButton.click(function() {
        $('html, body').stop().animate({ scrollTop: 0 }, 1000);
        return false;
    });
}