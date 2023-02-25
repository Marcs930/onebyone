//jsファイルをimportする場合には.js拡張子は省略可能
// import Swiper from "swiper/bundle";
// import "swiper/css/bundle";
// import "@scss/style";
// import { forEach } from "core-js/core/array";
// import utils from './utils/index.js';
// resolveのmodules設定により、srcフォルダまでパスが通っている
import "js/utils/header_fixed";
import "js/utils/spnav";
import "js/utils/swiper";
import "js/utils/scroll";
import "js/utils/side";
import { ScrollObserver } from "js/utils/scroll";
import { ScrollToggleClass } from "js/utils/side";
import { ClickHandler } from "js/utils/spnav";
import { HeaderFixed } from "js/utils/header_fixed";

class Main {
    constructor() {
        this.header = document.querySelector(".header");
        this.main = document.querySelector(".main");
        this.side = document.querySelector(".side");
        this._observers = [];
        this._scrollInit();
        this._scrollToggleClassInit();
        this._clickHandlerInit();
        this._headerFixedInit();
    }

    _sideAnimation(el, inview) {
        if (inview) {
            this.side.classList.add("inview");
        } else {
            this.side.classList.remove("inview");
        }
    }
    _inviewAnimation(el, inview) {
        if (inview) {
            el.classList.add("inview");
        } else {
            el.classList.remove("inview");
        }
    }
    _scrollInit() {
        this._observers.push(
            new ScrollObserver(".appear", this._inviewAnimation, {
                rootMargin: "0px 0px -100px 0px",
                once: true,
            })
        );
    }
    _scrollToggleClassInit() {
        new ScrollToggleClass(".side", 350);
    }
    _clickHandlerInit() {
        new ClickHandler(".js-spbtn", "header", "js-spnav-active");
    }
    _headerFixedInit() {
        new HeaderFixed();
    }
}

new Main();

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
