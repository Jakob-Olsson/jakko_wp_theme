document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector(".coordinates-container");
    const icon = container.querySelector("i");

    container.addEventListener("mouseenter", function () {
        icon.classList.add("fa-spin");
    });

    container.addEventListener("mouseleave", function () {
        icon.classList.remove("fa-spin");
    });
});