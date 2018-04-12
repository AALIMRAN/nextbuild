(function($) {
"use strict";

/* ==============================================
ACCORDION -->
=============================================== */

    function toggleChevron(e) {
        $(e.target)
            .prev('.panel-heading')
            .find("i.indicator")
            .toggleClass('fa-minus fa-plus');
    }
    $('#accordion').bind('hidden.bs.collapse', toggleChevron);
    $('#accordion').bind('shown.bs.collapse', toggleChevron);

/* ==============================================
MENU -->
=============================================== */

    $("#cssmenu").menumaker({
    title: "Menu",              // The text of the button which toggles the menu
    breakpoint: 768,            // The breakpoint for switching to the mobile view
    format: "multitoggle"       // It takes three values: dropdown for a simple toggle menu, select for select list menu, multitoggle for a menu where each submenu can be toggled separately
});

/* ==============================================
LOADER -->
=============================================== */

    $(window).load(function() {
        $('#loader').delay(300).fadeOut('slow');
        $('#loader-container').delay(200).fadeOut('slow');
        $('body').delay(300).css({'overflow':'visible'});
    })

/* ==============================================
TOOLTIP -->
=============================================== */

	$('body').tooltip({
		selector: "[data-tooltip=tooltip]",
		container: "body"
	});

/* ==============================================
slider -->
=============================================== */
    jQuery(document).ready(function() {
        jQuery('.tp-banner').show().revolution(
            {
            dottedOverlay:"none",
            delay:16000,
            startwidth:1170,
            startheight:660,
            hideThumbs:200,
            thumbWidth:100,
            thumbHeight:50,
            thumbAmount:5,
            navigationType:"none",
            navigationArrows:"solo",
            navigationStyle:"preview4",
            touchenabled:"on",
            onHoverStop:"on",
            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,
            parallax:"mouse",
            parallaxBgFreeze:"on",
            parallaxLevels:[10,7,4,3,2,5,4,3,2,1],
            parallaxDisableOnMobile:"off",
            keyboardNavigation:"off",
            navigationHAlign:"center",
            navigationVAlign:"bottom",
            navigationHOffset:0,
            navigationVOffset:20,
            soloArrowLeftHalign:"left",
            soloArrowLeftValign:"center",
            soloArrowLeftHOffset:20,
            soloArrowLeftVOffset:0,
            soloArrowRightHalign:"right",
            soloArrowRightValign:"center",
            soloArrowRightHOffset:20,
            soloArrowRightVOffset:0,
            shadow:0,
            fullWidth:"on",
            fullScreen:"off",
            spinner:"spinner4",
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,
            shuffle:"off",
            autoHeight:"off",
            forceFullWidth:"off",
            hideThumbsOnMobile:"off",
            hideNavDelayOnMobile:1500,
            hideBulletsOnMobile:"off",
            hideArrowsOnMobile:"off",
            hideThumbsUnderResolution:0,
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            startWithSlide:0,
            fullScreenOffsetContainer: ""
            });
        });
/* ==============================================
Date picker -->
=============================================== */

    

        jQuery(document).ready(function($) {
            $('.selectpicker').selectpicker();
            if ($.fn.datepicker) {
            $( "#datepicker" ).datepicker();
            }
            $('.blog-list').isotope();

            jQuery(window).on('scroll', function() {

                if ($(this).scrollTop() > 100) {
                    $('.header').addClass("stickyheader");
                } else {
                    $('.header').removeClass("stickyheader");
                }
            });

        });

})(jQuery);