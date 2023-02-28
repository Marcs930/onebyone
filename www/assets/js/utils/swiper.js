const swiper = new Swiper(".swiper", {
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
