export class HeaderFixed {
    constructor() {
        window.addEventListener("load", () => {
            this.header = document.querySelector(".header");
            this.headerHeight = this.header.getBoundingClientRect().top + window.pageYOffset;
            this._init();
        })
    }
    _init() {
        window.addEventListener("scroll", () => {
            let scrollY = window.pageYOffset;
            if (scrollY >= this.headerHeight) {
                this.header.classList.add("js-header-fixed");
            } else {
                if (this.header.classList.contains("js-header-fixed")) {
                    this.header.classList.remove("js-header-fixed");
                }
            }
        });
    }
}
