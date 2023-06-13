import Swiper from 'swiper/bundle';
import GLightbox from "glightbox";
import * as AOS from 'aos/dist/aos.js';
/** Include any other scripts here - this will combine them via Webpack for the final output script. */

((window, document, $, undefined) => {

  /*******************************************************************************/
  /* MODULE
  /*******************************************************************************/

  const Base = (() => {

    /**
     * Runs when the document is ready.
     */
    const ready = () => {
      console.log('document ready!');

      AOS.init();

      // const swiper = new Swiper()
    };

    /**
     * Runs when the window is loaded.
     */
    const accordionJS = () => {
      const blocks = $('.accordion-block');
      if(blocks.length) {

        const headings = $('.accordions__single--heading');

        headings.on('click', function () {
          // Checks if current elem is the active one or not
          if($(this).parent().hasClass('active')) {
            // Removes active from current item
            $(this).parent().toggleClass('active')
            $(this).parent().find('.accordions__single--content').stop().fadeToggle()

          } else {
            // Removes existing active state from current active element
            $(this).parents('.accordions').find('.active').find('.accordions__single--content').stop().fadeToggle()
            $(this).parents('.accordions').find('.active').toggleClass('active')
            // Adds active state on clicked item
            $(this).parent().toggleClass('active')
            $(this).parent().find('.accordions__single--content').stop().fadeToggle()

          }
        })
      }
    };



    const load = () => {
      console.log('document load!');
    };

    /**
     * Return our module's publicly accessible functions.
     */
    return {
      ready: ready,
      accordionJS: accordionJS,
      load: load
    };

  })();

  /*******************************************************************************/
  /* MODULE INITIALISE
  /*******************************************************************************/

  jQuery(document).ready(function($) {
    Base.ready();
    Base.accordionJS();
  });

  jQuery(window).on('load', function($) {
    Base.load();
  });

})(window, document, jQuery);
