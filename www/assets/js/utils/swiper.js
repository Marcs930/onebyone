const mvSwiper = new Swiper(".mv__slider", {
  // Optional parameters
  direction: "horizontal",
  effect: 'fade',
  speed: '2000',
  loop: true,
  slidesPerView: 1,
  autoplay: {
    delay: 5000,
    loop: true,
  },
  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
});

// サムネイル
const sliderThumbnail = new Swiper(".buildingSlider__thumbnail", {
  slidesPerView: 5, // サムネイルの枚数
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  spaceBetween: 6, breakpoints: {
    // スライドの表示枚数：500px以上の場合
    768: {
      slidesPerView: 6,
    }
  }

});
// スライダー
// const slider = new Swiper(".slider", {
//   loop: true,
//   // 前後の矢印
//   navigation: {
//     nextEl: ".swiper-button-next",
//     prevEl: ".swiper-button-prev",
//   },
//   thumbs: {
//     swiper: sliderThumbnail,
//   },
// });

const buildingSwiper = new Swiper(".buildingSlider", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  slidesPerView: 1,
  autoplay: {
    delay: 30000,
    loop: true,
  },
  // If we need pagination
  // pagination: {
  //     el: ".swiper-pagination",
  //     clickable: true,
  // },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

  thumbs: {
    swiper: sliderThumbnail,
  },
});
