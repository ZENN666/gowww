document.addEventListener("DOMContentLoaded", function () {
    const openBtn = document.getElementById("openMenu");
    const closeBtn = document.getElementById("closeMenu");
    const menu = document.getElementById("navMenu");

    if (!openBtn || !menu) return;

    openBtn.addEventListener("click", () => {
        menu.classList.add("active");
        openBtn.style.display = "none";
    });

    if (closeBtn) {
        closeBtn.addEventListener("click", () => {
            menu.classList.remove("active");
            openBtn.style.display = "block";
        });
    }
});
