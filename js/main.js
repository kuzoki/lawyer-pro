(function ($) {

    $(".questions-col div").first().addClass("active");
    $(".answers-col div").first().addClass("active");
    // TEAM SLIDER
    var tl = new TimelineMax();

    

    $('.flexslider-team').flexslider({
        animation: "fade",
        controlNav: false,
        smoothHeight: true,
        animationLoop: true,
        slideshow: false,
        controlsContainer: $(".custom-controls-container"),
        customDirectionNav: $(".custom-navigation a"),
        animationSpeed: 0,

        start: function () {

            var sliderScene = new ScrollMagic.Scene({
                triggerElement: '#flexslider-team',
                triggerHook: 1,
                reverse: false
            })
                // .setTween(trustTL.staggerTo('.trust-badges img', 0.5, { autoAlpha: 1, ease: Power0.easeIn }, 0.3))
                .setTween(
                    tl.to(".slide-content .sec-title", 1, { ease: Power2.easeOut,  opacity: 1 })
                      .to(".slide-content .quote", 0.7, { ease: Power2.easeOut,  opacity: 1, delay: "-0.7" })
                      .to(".slide-content .body-text", 0.7, { ease: Power2.easeOut,  opacity: 1, delay: "-0.5" })
                      .to(".slide-content .read-more-btn", 0.7, { opacity: 1, ease: Power2.easeInOut, delay: "-1" })
                    

                      .to(".square-pattern", 1, { width: 160, opacity: 1, ease: Power2.easeOut, delay: "-1.6" })
                      .to(".slide-image img", 0.5, { opacity: 1, ease: Power2.easeIn, delay: "-1.3" })
                )
                
                .addTo(controller);
            tl.restart();
        },

        after: function () {
            tl.restart();
        }
    });

    // SCROLL MAGIC
    var controller = new ScrollMagic.Controller();
    var navTl = new TimelineMax();

    // STICK NAVBAR
    // var ourScene = new ScrollMagic.Scene({
    //     triggerElement: '#main-navbar',
    //     triggerHook: 0
    // })
    //     .setPin('#main-navbar')
    //     .addTo(controller);

    // RESPONSIVE MENU
    var menuTl = new TimelineMax({paused: true});

    menuTl.to('.line-1', 0.2, {
        y: 10,
        rotation: 45,
        ease: Power0.easeOut
    })
    menuTl.to('.line-2', 0.2, {
        autoAlpha: 0,
        delay: "-0.2",
        ease: Power0.easeOut
    })
    menuTl.to('.line-3', 0.2, {
        y: -10,
        rotation: -45,
        ease: Power0.easeOut,
        delay: "-0.2"
    })
    menuTl.to('.responsive-nav', 0.3, {
        top: "0%",
        ease: Expo.easeIn,
        delay: "-0.2"
    })
    menuTl.staggerTo('.menu-data .menu-items > li', 0.3, { opacity: 1, delay: "0.3"}, 0.2)

    menuTl.reverse();

    $(document).on("click", ".toggle-btn", function() {
        menuTl.reversed(!menuTl.reversed());
    });
    $(document).on("click", ".menu-data a", function () {
        menuTl.reversed(!menuTl.reversed());
    });

    // HERO TEXT EFFECTS
    var heroTL = new TimelineMax();

    heroTL.to('.hero-content', 0.2, {
        autoAlpha: 1, 
    })
        .from('.eyebrow', 0.4, {
        y: -20, 
        autoAlpha: 0, 
        ease: Power0.easeOut
        
    })
        .from('.hero-content h2', 0.4, {
        y: -20, 
        autoAlpha: 0, 
        ease: Power0.easeOut
        // delay: '-0.4'
    })
        .from('.hero-title-underline', 0.4, {
        y: -20, 
        autoAlpha: 0, 
        ease: Power0.easeOut
        // delay: '-0.4'
    })
        .from('.hero-content .cta-btn', 0.4, {
        y: 0, 
        autoAlpha: 0, 
        ease: Power0.easeOut
        // delay: '-0.4'
    });

    // TRUST BADGES
    var trustTL = new TimelineMax();

    var trustScene = new ScrollMagic.Scene({
        triggerElement: '#trusted-sec img',
        triggerHook: 1,
        reverse: false
    })
        .setTween(trustTL.staggerTo('.trust-badges img', 0.5, { autoAlpha: 1, ease: Power0.easeIn }, 0.3))
        .addTo(controller);

    // ABOUT
    var aboutTL = new TimelineMax();
    var aboutScene = new ScrollMagic.Scene({
        triggerElement: '#about-sec',
        triggerHook: 1,
        reverse: false
    })
        .setTween(
            aboutTL.from('.about-img', 1, { y: 120, ease: Power2.easeInOut })
                .from('.about-text', 1, { autoAlpha: 0, y: 120, ease: Power2.easeInOut, delay: '-1' })
                .from('.rec-shape', 1, { width: 0, ease: Power2.easeInOut, delay: -1 })
                .from('.why-us-sec', 1, { autoAlpha: 0, y: 120, ease: Power2.easeInOut })
                .from('.featured-sec', 1, { autoAlpha: 0, y: 120, ease: Power2.easeInOut })
        )
        .addTo(controller);

    // FAQ
    // FAQ ANIMATION
    var faqTL = new TimelineMax();

    faqTL.from('.answer.active', 1, {
        autoAlpha: 0,
    });

    $('.questions-col').find('.question').on('click', function(e) {
        $(this).data('ques-nbr');
        $(this).addClass('active').siblings().removeClass('active');
        // $(this).find('.number').addClass('active').siblings().removeClass('active');
        var _question = $(this).data('ques-nbr');

        $('.answers-col').find('.answer').each(function(i) {
            var _answer = $(this).data('answer-nbr');
            if (_answer == _question) {
                $(this).addClass('active').siblings().removeClass('active');
                
                var faqTL = new TimelineMax();
                faqTL.from('.answer.active', 1, {
                    autoAlpha: 0,
                    y: -30
                });
            }
        })
    })

    // TESTIMONIALS
    // store the slider in a local variable
    var $window = $(window),
        flexslider = { vars: {} };

    // tiny helper function to add breakpoints
    function getGridSize() {
        return  (window.innerWidth < 550) ? 1 : 
                (window.innerWidth < 850) ? 1 :
                (window.innerWidth < 1200) ? 2 : 3;
    }

    // $(function () {
    //     SyntaxHighlighter.all();
    // });

    $('.flexslider-tes').flexslider({
        animation: "slide",
        animationLoop: true,
        controlNav: false,
        
        slideshowSpeed:4000,
        // directionNav: false,
        itemWidth: 210,
        itemMargin: 30,
        // controlsContainer: $(".custom-nav-container"),
        customDirectionNav: $(".custom-nav a"),
        minItems: getGridSize(), // use function to pull in initial value
        maxItems: getGridSize() // use function to pull in initial value
    });

    // check grid size on resize event
    $window.resize(function () {
        var gridSize = getGridSize();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
    });


    // BLOG
    var blogTL = new TimelineMax();

    var blogScene = new ScrollMagic.Scene({
        triggerElement: '#blog-sec',
        triggerHook: 1,
        reverse: false
    })
        .setTween(blogTL.staggerTo('.blog-sec .single-post', 1, { autoAlpha: 1, ease: Power4.easeIn }, 0.3))
        .addTo(controller);


    // PRACTICE AREAS
    var practiceTL = new TimelineMax();

    var practiceScene = new ScrollMagic.Scene({
        triggerElement: '#practice-sec',
        triggerHook: 1,
        reverse: false
    })
        .setTween(
            practiceTL.from('.shape', 1.2, { x: 800, ease: Power3.easeInOut })
                .staggerFrom('.practice-slider ul li', .7, { y: -80, autoAlpha: 0, ease: Sine.easeOut, delay: '-0.2'}, 0.4)
                .from('.practice-slider .custom-control', .7, { autoAlpha: 0, ease: Sine.easeOut, delay: '-0.8'})
        )
        .addTo(controller);

    // store the slider in a local variable
    var $window = $(window),
        flexslider = { vars: {} };

    // tiny helper function to add breakpoints
    function getGridSize2() {
        return  (window.innerWidth < 550) ? 1 :
                // (window.innerWidth < 768) ? 2 :
                (window.innerWidth < 1200) ? 2 : 3;
    }

    // $(function () {
    //     SyntaxHighlighter.all();
    // });

    $('.flexslider-practice').flexslider({
        animation: "slide",
        animationLoop: false,
        controlNav: false,
        slideshow: false,
        itemWidth: 210,
        itemMargin: 30,
        customDirectionNav: $(".custom-control a"),
        minItems: getGridSize2(), // use function to pull in initial value
        maxItems: getGridSize2() // use function to pull in initial value
    });

    // check grid size on resize event
    $window.resize(function () {
        var gridSize = getGridSize2();

        flexslider.vars.minItems = gridSize;
        flexslider.vars.maxItems = gridSize;
    });


    

})(jQuery);