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
