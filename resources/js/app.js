import Sortable from 'sortablejs';
// ---------------TABS-------------
document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".tab-link");
    const panels = document.querySelectorAll(".tab-panel");

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            tabs.forEach(t => t.classList.remove("text-primary", "border-b-2", "border-primary"));
            this.classList.add("text-primary", "border-b-2", "border-primary");
            panels.forEach(panel => panel.classList.add("hidden"));
            const target = this.getAttribute("data-tab");
            document.getElementById(target).classList.remove("hidden");
        });
    });
});
