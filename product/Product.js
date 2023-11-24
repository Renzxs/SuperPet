let menuBtn = document.getElementById("menu-nav-btn");
let mobileNav = document.querySelector(".mobile-nav");


menuBtn.addEventListener("click", () => {
    mobileNav.classList.toggle("open");
    if(mobileNav.classList.contains("open")){
        menuBtn.className = "fa-solid fa-x";
    } else {
        menuBtn.className = "fa-solid fa-bars"; // Change to "fa fa-bars" or appropriate class names
    }
}); 