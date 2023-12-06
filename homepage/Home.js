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

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        console.log(entry);
        if(entry.isIntersecting) {
            entry.target.classList.add('show');
            entry.target.classList.add('slide');
            
        }
        else {
            entry.target.classList.remove('show');
            entry.target.classList.remove('slide');
        }
    });
});

const hiddenEl = document.querySelectorAll(".hidden");
hiddenEl.forEach((el) => observer.observe(el));

const itemEl = document.querySelectorAll(".item");
itemEl.forEach((el) => observer.observe(el));