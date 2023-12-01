let navSidebar = document.querySelector(".nav-sidebar");

document.querySelector(".menu-nav").addEventListener("click", () => {
    navSidebar.classList.toggle("open");
});


let addPetModal = document.querySelector(".add-new-pet-modal");

document.getElementById("add-new-pet-btn").addEventListener("click", () => {
    addPetModal.style.display = "block";
    document.getElementById("petModalback").addEventListener("click", () => {
        addPetModal.style.display = "none";
    });
});