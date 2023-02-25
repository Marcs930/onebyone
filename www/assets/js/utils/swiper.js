import Swiper from "swiper/bundle";

const swiper = new Swiper(".swiper", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    slidesPerView: 2,
    spaceBetween: 20,
    autoplay: {
        delay:4000,
        loop: true,
    },
    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    // Navigation arrows
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        // when window width is >= 640px
        960: {
            slidesPerView: "auto",
            spaceBetween: 60
        },
    },
});
