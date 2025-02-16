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
document.addEventListener('DOMContentLoaded', () => {
    PassVisibility.init_pass_visibility();
    new LayoutPopup();
});