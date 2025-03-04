"use strict";
class LayoutPopup {
    constructor() {
        this.popupBtnNodes = document.querySelectorAll(".drop-menu-container .dm-toggler");
        this.dropMenuContainer = document.querySelectorAll(".drop-menu-container");
        this.events();
    }
    closeAllPopups(openItems = null) {
        if (openItems) {
            openItems.forEach(element => element.classList.remove("dm-show"));
        }
        else {
            document.querySelectorAll(".drop-menu-container.dm-show").forEach(element => element.classList.remove("dm-show"));
        }
    }
    events() {
        this.popupBtnNodes.forEach(element => element.addEventListener("click", this.popupBtnClickHandler.bind(this)));
        document.addEventListener("click", this.closeByClickOutside.bind(this));
        window.addEventListener("resize", this.resizeWindow.bind(this));
    }
    popupBtnClickHandler(e) {
        e.preventDefault();
        const target = e.currentTarget.parentElement;
        if (target.classList.contains("dm-show")) {
            target.classList.remove("dm-show");
        }
        else {
            this.closeAllPopups();
            target.classList.add("dm-show");
        }
    }
    resizeWindow() {
        if (window.matchMedia("(min-width: 768px)").matches) {
            this.closeAllPopups();
        }
    }
    closeByClickOutside(e) {
        const openItems = document.querySelectorAll(".drop-menu-container.dm-show");
        if (openItems.length) {
            let doesClickedOutside = true;
            for (let i = 0; i < openItems.length; i++) {
                if (openItems[i].contains(e.target)) {
                    doesClickedOutside = false;
                    break;
                }
            }
            if (doesClickedOutside) {
                this.closeAllPopups(openItems);
            }
        }
    }
}
class PassVisibility {
    constructor(element) {
        this.passVisibilityBtn = element;
        this.hideIcon = element.children[0];
        this.showIcon = element.children[1];
        this.input = element.parentElement.querySelector('input[type="password"]');
        this.events();
    }
    events() {
        this.passVisibilityBtn.addEventListener("click", this.clickHandler.bind(this));
    }
    clickHandler() {
        this.hideIcon.classList.toggle("d-none");
        this.showIcon.classList.toggle("d-none");
        if (this.input.type == "password") {
            this.input.type = "text";
        }
        else {
            this.input.type = "password";
        }
    }
    static init_pass_visibility() {
        document.querySelectorAll("button.password-visibility").forEach(element => new PassVisibility(element));
    }
}
class Switch {
    constructor(Element) {
        this.switchBtn = Element;
        this.switchTarget = document.querySelector(Element.getAttribute("href"));
        this.events();
    }
    events() {
        this.switchBtn.addEventListener("click", this.clickHandler.bind(this));
    }
    clickHandler() {
        const activeForm = jQuery('.form-active');
        activeForm.addClass('processing').block({
            message: "",
            overlayCSS: {
                background: '#fff',
                opacity: 0.6
            }
        });
        setTimeout(this.timeoutHandler.bind(this, activeForm), 3000);
    }
    timeoutHandler(activeForm) {
        var _a;
        activeForm.removeClass('form-active processing').unblock();
        (_a = this.switchTarget) === null || _a === void 0 ? void 0 : _a.classList.add("form-active");
    }
    static initSwitch() {
        var _a;
        switch (window.location.hash) {
            case "#woocommerce-form-register":
                const doesFormExist = document.querySelector("#woocommerce-form-register");
                if (doesFormExist) {
                    doesFormExist.classList.add("form-active");
                }
                else {
                    document.querySelector("#woocommerce-form-login").classList.add("form-active");
                }
                break;
            case "#woocommerce-form-reset-password":
                document.querySelector("#woocommerce-form-reset-password").classList.add("form-active");
                break;
            default:
                (_a = document.querySelector("#woocommerce-form-login")) === null || _a === void 0 ? void 0 : _a.classList.add("form-active");
                break;
        }
        document.querySelectorAll(".switch-form").forEach((Element) => {
            new Switch(Element);
        });
    }
}
document.addEventListener('DOMContentLoaded', () => {
    PassVisibility.init_pass_visibility();
    new LayoutPopup();
    Switch.initSwitch();
    if (document.body.classList.contains('home')) {
        // @ts-ignore:
        new Swiper('.hero .swiper', {
            slidesPerView: 1,
            loop: true,
            effect: 'fade',
        });
        // @ts-ignore:
        new Swiper('.trending-products .swiper', {
            slidesPerView: 5,
            spaceBetween: 16
        });
    }
});
