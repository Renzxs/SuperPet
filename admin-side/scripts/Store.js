let navSidebar = document.querySelector(".nav-sidebar");

document.querySelector(".menu-nav").addEventListener("click", () => {
    navSidebar.classList.toggle("open");
});

let addProductModal = document.querySelector(".add-new-product-modal");

document.getElementById("add-new-product-btn").addEventListener("click", () => {
    addProductModal.style.display = "block";
    document.getElementById("productModalback").addEventListener("click", () => {
        addProductModal.style.display = "none";
    });
});
