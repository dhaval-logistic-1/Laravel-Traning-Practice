import $ from "jquery";
(window as any).$ = $;
(window as any).jQuery = $;



document.addEventListener('DOMContentLoaded', () => {
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';

    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };

    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

    const isMobile = window.innerWidth <= 992;

    if (
        sidebarWrapper &&
        (window as any).OverlayScrollbarsGlobal?.OverlayScrollbars &&
        !isMobile
    ) {
        (window as any).OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: Default.scrollbarTheme,
                autoHide: Default.scrollbarAutoHide,
                clickScroll: Default.scrollbarClickScroll,
            },
        });
    }

    // Dark mode toggle (jQuery)
    $("#dark-mode-toggle").on("change", function () {
        $("body").toggleClass("dark-mode layout-navbar-fixed", (this as HTMLInputElement).checked);
        $("body").toggleClass("dark-mode", (this as HTMLInputElement).checked);
        $(".main-sidebar").toggleClass("sidebar-dark-primary", (this as HTMLInputElement).checked);
    });

    const controlSidebar = document.getElementById("control-sidebar");
    const sidebarMenu = document.getElementById("sidebar-menu");
    const overlay = document.getElementById("cs-overlay");
    const body = document.getElementById("body");
    const nav = document.getElementById("navbar");
    const appSidebar = document.querySelector(".app-sidebar");

    function openCustomizer() {
        controlSidebar?.classList.add("control-sidebar-open");
        overlay?.classList.add("show");
    }

    function closeCustomizer() {
        controlSidebar?.classList.remove("control-sidebar-open");
        overlay?.classList.remove("show");
    }

    document.getElementById("open-customizer")?.addEventListener("click", (e) => {
        e.preventDefault();
        openCustomizer();
    });

    document.getElementById("close-customizer")?.addEventListener("click", closeCustomizer);
    overlay?.addEventListener("click", closeCustomizer);

    document.getElementById("dark-mode-toggle")?.addEventListener("change", function () {
        const isDark = (this as HTMLInputElement).checked;
        document.documentElement.setAttribute("data-bs-theme", isDark ? "dark" : "light");
        appSidebar?.setAttribute("data-bs-theme", isDark ? "dark" : "light");
    });

    document.querySelectorAll(".navbar-option").forEach((input) => {
        input.addEventListener("change", function (this: HTMLInputElement) {
            const value = this.value;
            const bodyClasses = ["fixed-header", "dropdown-legacy"];
            const navClasses = ["border-bottom-0"];

            if (bodyClasses.includes(value)) {
                body?.classList.toggle(value, this.checked);
            } else if (navClasses.includes(value)) {
                nav?.classList.toggle(value, this.checked);
            }
        });
    });

    document.querySelectorAll(".footer-variant").forEach((input) => {
        input.addEventListener("change", function (this: HTMLInputElement) {
            body?.classList.toggle("fixed-footer", this.checked);
        });
    });

    document.querySelectorAll(".sidebar-variant").forEach((input) => {
        input.addEventListener("change", function (this: HTMLInputElement) {
            const value = this.value;
            if (!value) return;
            this.checked ? applyClass(value) : removeClass(value);
        });
    });

    function applyClass(value: string) {
        switch (value) {
            case "sidebar-collapse":
                body?.classList.add("sidebar-collapse");
                break;
            case "sidebar-fixed":
                body?.classList.add("layout-fixed", "sidebar-expand-lg", "bg-body-tertiary");
                break;
            case "sidebar-mini":
                body?.classList.add("sidebar-mini");
                break;
            case "nav-compact":
                sidebarMenu?.classList.add("nav-compact");
                break;
        }
    }

    function removeClass(value: string) {
        switch (value) {
            case "sidebar-collapse":
                body?.classList.remove("sidebar-collapse");
                break;
            case "sidebar-fixed":
                body?.classList.remove("layout-fixed", "sidebar-expand-lg", "bg-body-tertiary");
                break;
            case "sidebar-mini":
                body?.classList.remove("sidebar-mini");
                break;
            case "nav-compact":
                sidebarMenu?.classList.remove("nav-compact");
                break;
        }
    }

    const navbarClasses = [
        "navbar-light",
        "bg-body",
        "bg-white",
        "bg-primary",
        "bg-secondary",
        "bg-info",
        "bg-success",
        "bg-danger",
        "bg-warning",
    ];

    document.getElementById("navbar-variant")?.addEventListener("change", function (this: HTMLSelectElement) {
        nav?.classList.remove(...navbarClasses);
        if (this.value) nav?.classList.add(...this.value.split(" "));
    });
});