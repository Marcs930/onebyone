const mvSwiper = new Swiper(".mv__slider", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    slidesPerView: 1,
    autoplay: {
        delay:30000,
        loop: true,
    },
    // If we need pagination
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

});
const buildingSwiper = new Swiper(".buildingSlider", {
    // Optional parameters
    direction: "horizontal",
    loop: true,
    // slidesPerView: 1,
    // autoplay: {
    //     delay:30000,
    //     loop: true,
    // },
    // // If we need pagination
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

});
