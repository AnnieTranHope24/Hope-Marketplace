const hamburger = document.getElementsByClassName("menu").addEventListener("click", openMenu);
const sidebar = document.getElementsByClassName("sidebar")
const overlay = document.getElementsByClassName("overlay")

let menuOpen = false

function openMenu(){
    menuOpen = true
    overlay.style.display = "block"
    sidebar.style.width = "250px";
}

function closeMenu(){
    menuOpen = true
    overlay.style.display = "none"
    sidebar.style.width = "0";
}

hamburger.addEventListener('click', function () {
    if(!menuOpen){
        openMenu()
    }
})

.addEventListener('click', function () {
    if(menuOpen){
        closeMenu()
    }
})

function burger() {
    this.classList.toggle("change");
  }
