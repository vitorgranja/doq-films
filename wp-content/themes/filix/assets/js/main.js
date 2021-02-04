(function ( $ ) {
    "use strict";

    $(document).ready(function() {

        function menu_fixed() {
            var h_m_f = $('.header_style_one');
            function menu_scroll_fixed(e) {
                var windowTop = $(window).scrollTop();
                var adDcl = "fixedMenu";
                if (windowTop > 0) {
                    e.addClass(adDcl);
                }
                else {
                    e.removeClass(adDcl);
                }
            }
            menu_scroll_fixed(h_m_f);

            $(window).scroll(function () {
                menu_scroll_fixed(h_m_f);
            });
        }

        menu_fixed();

        function scrollSmoothTop() {
            if (('.scroll_down').length > 0) {
                //js for scroll to section content
                jQuery('.scroll_down a[href^="#"], .go_to_top a[href^="#"]').on('click', function (event) {
                    var target = $(this.getAttribute('href'));
                    if (target.length) {
                        event.preventDefault();
                        $('html, body').stop().animate({
                            scrollTop: target.offset().top
                        }, 500);
                    }
                });
            }
        }
        scrollSmoothTop();


        $(window).on('scroll', function () {
            var $scTop = $(window).scrollTop();
            var $opcn = 1 - $scTop / 700;
            $(".hero_warp").css("opacity", $opcn);
            if ($opcn < 0) {
                $(".hero_warp").addClass('hide');
            }
            else {
                $(".hero_warp").removeClass('hide');
            }
            if ($scTop < 120) {
                $('.go_to_top').hide(300);
            }
            else {
                $('.go_to_top').show(300);
            }
        });


        function menUOpen() {
            if (('.hamburger').length > 0) {
                $('.hamburger').on('click', function () {
                    $('.header').toggleClass('menu_open');
                    $('body').toggleClass('menu_open');
                });
            }
        }

        menUOpen();

        function active_dropdown() {
            if ($(window).width()) {
                $('.menu_item li.submenu > a').on('click',function(event){
                    event.preventDefault()
                    $(this).parent().find('ul').first().toggle(700);
                    $(this).parent().siblings().find('ul').hide(700);
                });
            }
        }
        active_dropdown();

    });
}( jQuery ));