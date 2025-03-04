class LayoutPopup {
    popupBtnNodes: NodeListOf<HTMLAnchorElement>;
    dropMenuContainer: NodeListOf<HTMLDivElement>;
    constructor() {
        this.popupBtnNodes = document.querySelectorAll(".drop-menu-container .dm-toggler")! as NodeListOf<HTMLAnchorElement>;
        this.dropMenuContainer = document.querySelectorAll(".drop-menu-container")! as NodeListOf<HTMLDivElement>;
        this.events();
    }
    private closeAllPopups(openItems: NodeListOf<HTMLDivElement> | null = null): void {
        if (openItems) {
            openItems.forEach(element => element.classList.remove("dm-show"));
        } else {
            document.querySelectorAll(".drop-menu-container.dm-show").forEach(element => element.classList.remove("dm-show"));
        }
    }
    private events(): void {
        this.popupBtnNodes.forEach(element => element.addEventListener("click", this.popupBtnClickHandler.bind(this)));
        document.addEventListener("click", this.closeByClickOutside.bind(this));
        window.addEventListener("resize", this.resizeWindow.bind(this));
    }
    private popupBtnClickHandler(e: Event) {
        e.preventDefault();
        const target = (<HTMLAnchorElement>e.currentTarget).parentElement! as HTMLDivElement;
        if (target.classList.contains("dm-show")) {
            target.classList.remove("dm-show");
        } else {
            this.closeAllPopups();
            target.classList.add("dm-show");
        }
    }
    private resizeWindow() {
        if (window.matchMedia("(min-width: 768px)").matches) {
            this.closeAllPopups();
        }
    }
    private closeByClickOutside(e: Event) {
        const openItems = document.querySelectorAll(".drop-menu-container.dm-show") as NodeListOf<HTMLDivElement>;
        if (openItems.length) {
            let doesClickedOutside = true;
            for (let i = 0; i < openItems.length; i++) {
                if (openItems[i].contains(<HTMLElement>e.target)) {
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
    passVisibilityBtn: HTMLButtonElement;
    input: HTMLInputElement;
    showIcon: HTMLImageElement;
    hideIcon: HTMLImageElement;

    constructor(element: HTMLButtonElement) {
        this.passVisibilityBtn = element;
        this.hideIcon = element.children[0]! as HTMLImageElement;
        this.showIcon = element.children[1]! as HTMLImageElement;
        this.input = element.parentElement!.querySelector('input[type="password"]')! as HTMLInputElement;
        this.events();
    }
    private events() {
        this.passVisibilityBtn.addEventListener("click", this.clickHandler.bind(this));
    }
    private clickHandler() {
        this.hideIcon.classList.toggle("d-none");
        this.showIcon.classList.toggle("d-none");
        if (this.input.type == "password") {
            this.input.type = "text";
        } else {
            this.input.type = "password";
        }
    }
    public static init_pass_visibility() {
        document.querySelectorAll("button.password-visibility").forEach(element => new PassVisibility(<HTMLButtonElement>element));
    }
}
class Switch {
    switchBtn: HTMLAnchorElement;
    switchTarget: HTMLFormElement | null;
    constructor(Element: HTMLAnchorElement) {
        this.switchBtn = Element;
        this.switchTarget = document.querySelector(Element.getAttribute("href")!);
        this.events();
    }
    private events() {
        this.switchBtn.addEventListener("click", this.clickHandler.bind(this));
    }
    private clickHandler() {
        const activeForm: JQuery<HTMLFormElement> = jQuery('.form-active');
        activeForm.addClass('processing').block({
            message: "",
            overlayCSS: {
                background: '#fff',
                opacity: 0.6
            }
        });
        setTimeout(this.timeoutHandler.bind(this, activeForm), 3000);
    }
    private timeoutHandler(activeForm: JQuery<HTMLFormElement>) {
        activeForm.removeClass('form-active processing').unblock();
        this.switchTarget?.classList.add("form-active");
    }
    public static initSwitch() {
        switch (window.location.hash) {
            case "#woocommerce-form-register":
                const doesFormExist = document.querySelector("#woocommerce-form-register");
                if (doesFormExist) {
                    doesFormExist.classList.add("form-active");
                } else {
                    document.querySelector("#woocommerce-form-login")!.classList.add("form-active");
                }
                break;
            case "#woocommerce-form-reset-password":
                document.querySelector("#woocommerce-form-reset-password")!.classList.add("form-active");
                break;
            default:
                document.querySelector("#woocommerce-form-login")?.classList.add("form-active");
                break;
        }
        document.querySelectorAll(".switch-form").forEach((Element) => {
            new Switch(<HTMLAnchorElement>Element);
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