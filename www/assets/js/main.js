//jsファイルをimportする場合には.js拡張子は省略可能
// import Swiper from "swiper/bundle";
// import "swiper/css/bundle";
// import "@scss/style";
// import { forEach } from "core-./core/array";
// import utils from './utils/index.js';
// resolveのmodules設定により、srcフォルダまでパスが通っている
// import "./utils/spnav";
// import "./utils/header_fixed";
// import "./utils/swiper";
// import "./utils/scroll";
// import "./utils/side";
// import { ScrollObserver } from "./utils/scroll";
// import { ScrollToggleClass } from "./utils/side";
// import { ClickHandler } from "./utils/spnav";
// import { HeaderFixed } from "./utils/header_fixed";

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

console.log(contents);
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

const searchParamsMore = document.querySelector(".searchParams__more");
const searchParamsMoreTarget = document.querySelector(".searchParams--hidden");

searchParamsMore.addEventListener("click", () => {
  searchParamsMoreTarget.classList.toggle("js-searchParamsMore");
});


// const options = {
//   root: null,
//   rootMargin: "0px",
//   threshold: [1, 1]
// }

// const callback = (entries, observer) => {
//   entries.forEach(entry => {
//     console.log("first")
//   })
// };

// const observer = new IntersectionObserver(callback, options);

// const target = document.querySelector(".main");

// observer.observe(target);
// export class ClickHandler {
//     constructor(observe, target, className) {
//         this.observe = document.querySelector(observe);
//         this.target = document.querySelector(target);
//         this.className = className;
//         this._init();
//     }
//     _init() {
//         this.observe.addEventListener("click", () => {
//            this.target.classList.toggle(this.className);
//         });
//     }
// }

// const btn = document.querySelector(".js-spbtn");
// const target = document.querySelector("header");
// const className = "js-spnav-active";
// const body = document.querySelector("body");
// const headerHeight = document.querySelector('header').clientHeight;
// let bodyHeight; //ウィンドウの高さを入れる場所
// let scrollPos; //スクロールの位置を入れる場所
// console.log(body);
// btn.addEventListener("click", () => {
//     target.classList.toggle(className);
//     if (target.classList.contains(className)) {
//         console.log("true");
//         scrollPos = window.pageYOffset;
//         body.classList.add("js-spnav-open");
//         body.style.top = scrollPos * -1 + "px";
//         // bodyHeight = window.innerHeight;
//     } else {
//         console.log("false");
//         body.classList.remove("js-spnav-open");
//         window.scrollTo(0, scrollPos);
//     }
// });
