import './bootstrap';

import 'preline';

// swiper
const swiper = new Swiper('.swiper', {
    autoplay: {
        delay: 6000,
    },
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

});
