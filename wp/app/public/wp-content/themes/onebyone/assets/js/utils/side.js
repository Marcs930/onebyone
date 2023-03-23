class ScrollToggleClass {
    constructor(els, threshold) {
        this.els = document.querySelectorAll(els);
        this.threshold  = threshold;
        this._init();
    }
    _init() {
        document.addEventListener("scroll", () => {
            let scrollY = window.pageYOffset;
            this._cb(scrollY);
        });
    }
    _cb(scrollY) {
        if (scrollY >= this. threshold) {
            this.els.forEach((el) => {
                el.classList.add("inview");
            })
        } else {
            this.els.forEach((el) => {
                el.classList.remove("inview");
            })
        }
    }
}
