import Swiper from 'swiper/bundle';

const gallery = (() => {
    const ctaCarousel = new Swiper('.gallery-container', {
        slidesPerView: 'auto',
        loop: true,
        autoplay: {
            delay: 0,
        },
        speed: 12000,
    });

})();