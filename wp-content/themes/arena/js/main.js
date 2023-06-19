import Swiper from 'swiper/bundle';
import GLightbox from "glightbox";
import * as AOS from 'aos/dist/aos.js';


import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
import { ScrollSmoother } from "gsap/ScrollSmoother";
gsap.registerPlugin(ScrollTrigger, ScrollSmoother);

/** Include any other scripts here - this will combine them via Webpack for the final output script. */

((window, document, $, undefined) => {

  /*******************************************************************************/
  /* MODULE
  /*******************************************************************************/

  const Base = (() => {

    const loadMore = (
      loadMoreButton,
      loadMoreContainer,
      loadMoreElement,
      postsToShow,
      more
    ) => {
      $(loadMoreContainer)
        .find(loadMoreElement)
        .hide()
        .slice(0, postsToShow)
        .fadeIn()
        .addClass("lm-visible");
      if (!$(loadMoreContainer).find(loadMoreElement).not(".lm-visible").length) {
        $(loadMoreButton).addClass('!hidden');
      }
      $(loadMoreButton).on("click", function () {
        $(loadMoreContainer)
          .find(loadMoreElement)
          .not(".lm-visible")
          .slice(0, more)
          .fadeIn()
          .addClass("lm-visible");
        if (!$(loadMoreContainer).find(loadMoreElement).not(".lm-visible").length) {
          $(loadMoreButton).addClass('!hidden');
        } else {
          $(loadMoreButton).show();
        }
      });
    };

    /**
     * Runs when the document is ready.
     */
    const ready = () => {
      console.log('document ready!');

      if($('.projects-archive').length){
        loadMore('#load-more', '.post-list', '.post-list__single', 8, 4)
      }else{
        loadMore('#load-more', '.post-list', '.post-list__single', 9, 6)
      }

      if($(window).width() >300){
        let smoother = ScrollSmoother.create({
          smooth: 1.5,
          effects: true,
          smoothTouch: false,
          smoothing: 0.8,
          friction: 0.5,
        })

        //anchoring section
  
        let anchor_links = document.querySelectorAll('.anchor-link');

        anchor_links.forEach((link, i) => {
          link.addEventListener('click', function(e){
            e.preventDefault();
  
            let data_attr = link.getAttribute('anchor-next-section');

            if(data_attr == null){
              var scroll_to = document.querySelector(data_attr);
              smoother.scrollTo(scroll_to, true, "top 0%");
            }else{
              var scroll_to = $(this).closest("section").next();
              smoother.scrollTo(scroll_to, true, "top 0%");
            }
          })
        })
      }else{
        //anchoring section
  
        let anchor_links = document.querySelectorAll('.anchor-link');
  
        anchor_links.forEach((link, i) => {
          link.addEventListener('click', function(e){
            e.preventDefault();
  
            let data_attr = link.getAttribute('href');
            var scroll_to = $(this).closest("section").next();

            jQuery('html, body').animate({scrollTop: $(scroll_to).offset().top - 50})
          })
        })
      }

      AOS.init({
        duration: 600, // Animation duration in milliseconds
        offset: 100, // Offset (in pixels) from the original trigger point
        easing: 'ease-out', // Easing function for the animation
        delay: 0, // Delay (in milliseconds) before animation starts
        once: true, // Whether to only animate elements once
        mirror: false, // Whether elements should animate out while scrolling past them in reverse
      });

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


      $('.ham').click(function(){
        $(this).toggleClass('active')
        $('.site-header').toggleClass('open')
        $('html').toggleClass('overflow-hidden-html');
        $('.site-header').addClass('up');
      })

      var lastScroll = $(window).scrollTop();

      document.addEventListener('scroll', function(){
        if(($(window).scrollTop() > 30 )){
          $('.site-header').addClass('scrolling');
         }else{
          if(($(window).scrollTop() < 30 )){
            $('.site-header').removeClass('scrolling');
           }
         }
         if(lastScroll > $(window).scrollTop()){
          $('.site-header').addClass('up');
         }else{
          $('.site-header').removeClass('up');
         }
         lastScroll = $(window).scrollTop();
      });
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
