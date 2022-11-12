let sidebar = document.querySelector(".sidebar-sb");
let dim = document.querySelector(".dim");
let closeBtn = document.querySelector("#btn");
let nav = document.querySelector(".search-nav-pos");
let homeSection = document.querySelector(".home-section-sb");
const x = window.matchMedia("(max-width: 1000px)");
x.addEventListener('change', testFunction());

function testFunction() {
    console.log(x.matches);

}


closeBtn.addEventListener("click", () => {
    sidebar.classList.toggle("open");
    dim.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
});

function Toggle() {
    sidebar.classList.toggle("open");
    dim.classList.toggle("open");
    menuBtnChange(); //calling the function(optional)
}

function navToggle() {
    nav.classList.toggle("open");
    homeSection.classList.toggle("open");
    console.log(x);
}

// following are the code to change sidebar button(optional)
function menuBtnChange() {
    if (sidebar.classList.contains("open")) {
        closeBtn.classList.replace("bx-menu", "bx-menu-alt-right"); //replacing the iocns class
    } else {
        closeBtn.classList.replace("bx-menu-alt-right", "bx-menu"); //replacing the iocns class
    }
}