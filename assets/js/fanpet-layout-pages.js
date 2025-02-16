"use strict";
class LayoutPopup {
    constructor () {
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
    constructor (element) {
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
document.addEventListener('DOMContentLoaded', () => {
    PassVisibility.init_pass_visibility();
    new LayoutPopup();

    if (document.body.classList.contains('home')) {
        new Swiper('.swiper', {
            slidesPerView: 1,
            loop: true,
            effect: 'fade',
        });
    }
});