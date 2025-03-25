import Sortable from 'sortablejs';
// ---------------TABS-------------
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".tab-button");
    const contents = document.querySelectorAll(".tab-content");

    function showTab(tabId) {
        contents.forEach(content => content.classList.add("hidden"));
        document.getElementById(tabId).classList.remove("hidden");
    }

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            buttons.forEach(btn => btn.classList.remove("border-b-4" , "border-primary"));
            this.classList.add("border-b-4" , "border-primary");
            showTab(this.dataset.tab);
        });
    });

    buttons[0].click();
});

// ---------------TOAST-------------
const toastSuccess = document.getElementById('toast-success');
const toastClose = document.querySelector('.toastClose');
if (toastClose) {
    toastClose.addEventListener('click', function () {
        console.log('Toast closed');
        toastSuccess.classList.add('hidden');
    });
    if (toastSuccess) {
        setTimeout(() => {
            toastSuccess.style.display = 'none';
        }, 3000);
    }

}
// ---------------SORTABLE-------------
let tableBody = document.getElementById("table-body");
new Sortable(tableBody, {
    animation: 200,
    handle: ".drag-handle",
    ghostClass: "bg-gray-200",
});


