class ClickHandler {
  constructor(observe, target, className) {
    this.observe = document.querySelector(observe);
    //js-hamburgerBtn
    this.target = document.querySelector(target);
    //.container
    this.className = className;
    //.is-open
    this._init();
  }
  _init() {
    let scrollPos;
    this.observe.addEventListener("click", () => {
      this.target.classList.toggle(this.className);
      if (this.target.classList.contains(this.className)) {
        scrollPos = window.pageYOffset;
        //  this.target.classList.add("js-spnav-open");
        // document.body.style.top = scrollPos * -1 + "px";
        // console.log("opened");
      } else {
        // this.target.classList.remove("js-spnav-open");
        window.scrollTo(0, scrollPos);
        // メニューを閉じたら、メニューを開く前の位置までスクロール
        // console.log("closed");
      }
    });
  }
}

//アコーディオンをクリックした時の動作
const qa = document.querySelector(".qa-qa__question");
if (qa) {
  $(".qa-qa__question").on("click", function () {
    //タイトル要素をクリックしたら
    var findElm = $(this).next(".qa-qa__answer"); //直後のアコーディオンを行うエリアを取得し
    $(findElm).slideToggle(); //アコーディオンの上下動作

    if ($(this).hasClass("--close")) {
      //タイトル要素にクラス名closeがあれば
      $(this).removeClass("--close"); //クラス名を除去し
    } else {
      //それ以外は
      $(this).addClass("--close"); //クラス名closeを付与
    }
  });
}

//ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
// $(window).on('load', function(){
//   $('.faq li').addClass("open"); //faqのはじめのliにあるsectionにopenクラスを追加
//   $(".open").each(function(index, element){ //openクラスを取得
//     var Title =$(element).children('.title-box'); //openクラスの子要素のtitleクラスを取得
//     $(Title).addClass('close');       //タイトルにクラス名closeを付与し
//     var Box =$(element).children('.box'); //openクラスの子要素boxクラスを取得
//     $(Box).slideDown(500);          //アコーディオンを開く
//   });
// });

//アコーディオンをクリックした時の動作

// const searchTableSecondaryList = document.querySelectorAll('.searchTable__secondaryList');
// console.log(searchTableSecondaryList);
// for(let i = 0; i < searchTableSecondaryList.length; i++) {
//   if(!(searchTableSecondaryList[i].classList.contains('--open'))) {
//     searchTableSecondaryList[i].style.display= 'none';

//   }
// }

// $('.searchTable__primaryList').on('click', function() {//タイトル要素をクリックしたら
//   var findElm = $(this).children(".searchTable__secondaryList");//直後のアコーディオンを行うエリアを取得し
//   $(findElm).slideToggle();//アコーディオンの上下動作

//   if($(this).hasClass('--close')){//タイトル要素にクラス名closeがあれば
//     $(this).removeClass('--close');//クラス名を除去し
//   }else{//それ以外は
//     $(this).addClass('--close');//クラス名closeを付与
//   }
// });

// //ページが読み込まれた際にopenクラスをつけ、openがついていたら開く動作※不必要なら下記全て削除
// $(window).on('load', function(){
//   $('.searchTable__primaryList').addClass("open"); //faqのはじめのliにあるsectionにopenクラスを追加
//   $(".open").each(function(index, element){ //openクラスを取得
//     var Title =$(element).children('.searchTable__secondaryList'); //openクラスの子要素のtitleクラスを取得
//     $(Title).addClass('close');       //タイトルにクラス名closeを付与し
//     var Box =$(element).children('.searchTable__secondaryList'); //openクラスの子要素boxクラスを取得
//     $(Box).slideDown(500);          //アコーディオンを開く
//   });
// });

// mbr-qa accordion
const searchTable = document.querySelector(".searchTable");
if (searchTable) {
  $(function () {
    // 初期表示させる
    $(".searchTable__primaryList.--open")
      .children(".searchTable__secondaryListContainer")
      .show();
    // slideToggle,toggleClass
    $(".searchTable__primaryItem__bg").on("click", function () {
      $(this).parent().toggleClass("--open");
      $(this).next().next().slideToggle();
    });
  });
}

const idxMvSwiper = document.querySelector(".idx-mv__slider");
if (idxMvSwiper) {
  const mvSwiper = new Swiper(".idx-mv__slider", {
    // Optional parameters
    direction: "horizontal",
    effect: "fade",
    speed: "2000",
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
}

const buildingSlider = document.querySelector(".buildingSlider");
if (buildingSlider) {
  // サムネイル
  const sliderThumbnail = new Swiper(".buildingSlider__thumbnail", {
    slidesPerView: 5, // サムネイルの枚数
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    spaceBetween: 6,
    breakpoints: {
      // スライドの表示枚数：500px以上の場合
      768: {
        slidesPerView: 6,
      },
    },
  });

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
}

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

class ScrollObserver {
  constructor(els, cb, options) {
    this.els = document.querySelectorAll(els);
    const defaultOptions = {
      root: null,
      rootMargin: "0px 0px 0px 0px",
      threshold: 0,
      once: true,
    };
    this.cb = cb;
    this.options = Object.assign(defaultOptions, options);
    this.once = this.options.once;
    this._init();
  }
  _init() {
    const callback = (entries, observer) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          this.cb(entry.target, true);
          if (this.once) {
            observer.unobserve(entry.target);
          }
        } else {
          this.cb(entry.target, false);
        }
      });
    };
    this.io = new IntersectionObserver(callback.bind(this), this.options);
    this.els.forEach((el) => this.io.observe(el));
  }

  destroy() {
    this.io.disconnect();
  }
}

class Main {
  constructor() {
    this.header = document.querySelector(".header");
    this.main = document.querySelector(".main");
    this.side = document.querySelector(".side");
    this.container = document.querySelector(".container");
    this._observers = [];
    this._clickHandlerInit();
    this._scrollInit();
    // this._scrollToggleClassInit();
    // this._headerFixedInit();
  }

  // _sideAnimation(el, inview) {
  //     if (inview) {
  //         this.side.classList.add("inview");
  //     } else {
  //         this.side.classList.remove("inview");
  //     }
  // }
  _inviewAnimation(el, inview) {
    if (inview) {
      // el.classList.add("inview");

      this.container.classList.remove("js-bgWhite");
    } else {
      // el.classList.remove("inview");
      this.container.classList.add("js-bgWhite");
    }
  }
  _scrollInit() {
    this._observers.push(
      new ScrollObserver(
        ".js-scrollTransTarget",
        this._inviewAnimation.bind(this),
        {
          rootMargin: "0px 0px 0px 0px",
          once: false,
          threshold: [0],
        }
      )
      // _inviewAnimationでthis.containerを使いたいので、bind(this)
    );
  }
  // _scrollToggleClassInit() {
  //     new ScrollToggleClass(".side", 350);
  // }
  _clickHandlerInit() {
    new ClickHandler(".js-hamburgerBtn", ".container", "is-open");
  }
  // _headerFixedInit() {
  //     new HeaderFixed();
  // }
}

new Main();

//変数宣言
const menuItems = document.querySelectorAll(".search-tab__tab > li");
const contents = document.querySelectorAll(".search-tab__content > li");
if (menuItems) {
  //タブメニュークリック時
  menuItems.forEach((clickeditem) => {
    clickeditem.addEventListener("click", (e) => {
      //デフォルト動作キャンセル
      e.preventDefault();

      //タブメニューのclass付け替え
      menuItems.forEach((item) => {
        item.classList.remove("current");
      });
      clickeditem.classList.add("current");

      //コンテンツのclass付け替え
      contents.forEach((content) => {
        content.classList.remove("current");
      });
      document.getElementById(clickeditem.dataset.id).classList.add("current");
    });
  });
}

const searchParamsMore = document.querySelector(".searchParams__more");
const searchParamsMoreTarget = document.querySelector(".searchParams--hidden");

if (searchParamsMore) {
  searchParamsMore.addEventListener("click", () => {
    searchParamsMoreTarget.classList.toggle("js-searchParamsMore");
  });
}

const buttonOpen = document.getElementsByClassName("reviewPostBtn")[0];
// if('buttonOpen') {}
const modal = document.getElementsByClassName("arre-modal")[0];
const modalBg = document.querySelector(".modalBg");
const buttonClose = document.getElementsByClassName("modalClose")[0];
const body = document.getElementsByTagName("body")[0];
// ボタンがクリックされた時
if (buttonOpen) {
  buttonOpen.addEventListener("click", function () {
    modal.style.display = "block";
    modalBg.style.display = "block";
    body.classList.add("--open");
  });
}

const searchParamBtnOpen =
  document.getElementsByClassName("searchParamOpen")[0];
const searchParamsModal = document.getElementsByClassName("searchParams")[0];
// const buttonClose = document.getElementsByClassName('modalClose')[0];
// const body = document.getElementsByTagName('body')[0];
// ボタンがクリックされた時
if (searchParamBtnOpen) {
  searchParamBtnOpen.addEventListener("click", function () {
    searchParamsModal.style.display = "block";
    modalBg.style.display = "block";
    body.classList.add("--open");
  });
}

// バツ印がクリックされた時
// buttonClose.addEventListener('click',function(){
//   modal.style.display = 'none';
//   body.classList.remove('open');
// });

// モーダルコンテンツ以外がクリックされた時
if(modalBg) {
  modalBg.addEventListener("click", function () {
    if (modal) {
      modal.style.display = "none";
    }
    if (searchParamsModal) {
      searchParamsModal.style.display = "none";
    }
    modalBg.style.display = "none";
    body.classList.remove("--open");
  });
}
