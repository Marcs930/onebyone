export class ClickHandler {
    constructor(observe, target, className) {
        this.observe = document.querySelector(observe);
        this.target = document.querySelector(target);
        this.className = className;
        this._init();
    }
    _init() {
        let scrollPos;
        this.observe.addEventListener("click", () => {
            this.target.classList.toggle(this.className);
            if (this.target.classList.contains(this.className)) {
                scrollPos = window.pageYOffset;
                document.body.classList.add("js-spnav-open");
                document.body.style.top = scrollPos * -1 + "px";
                console.log("opened");
            } else {
                document.body.classList.remove("js-spnav-open");
                window.scrollTo(0, scrollPos);
                console.log("closed");
            }
        });
    }
}
