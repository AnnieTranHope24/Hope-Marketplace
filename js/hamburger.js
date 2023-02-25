
function details(){
  const x = document.querySelector(".more-details");
    if (x.style.display === "none") {
      x.style.display = "flex";
    } else {
      x.style.display = "none"
    }
  }

  function details1(){
    const x = document.querySelector(".more-details1");
    const y = document.querySelector(".botton1");
      if (x.style.display === "none") {
        x.style.display = "flex";
      } else {
        x.style.display = "none"
      }
    }
    
    function myFunction() {
      var x = document.getElementById("myLinks");
      if (x.style.display === "block") {
        x.style.display = "none";
      } else {
        x.style.display = "block";
      }
    }

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");

hamburger.addEventListener("click", mobileMenu);

function mobileMenu() {
    hamburger.classList.toggle("active");
    navMenu.classList.toggle("active");
}

function addItem(amount) {
  var item = document.getElementById('item-counter');
  var count = parseInt(item.textContent);
  if(amount > 0){
  count++;
  item.textContent = count;
  }
  document.getElementById("add-btn").style.display = "none";
  document.getElementById("remove-btn").style.display = "inline";
}

function removeItem(amount) {
  var item = document.getElementById('item-counter');
  var count = parseInt(item.textContent);
  if (count > 0 & amount > 0) {
    count-= amount;
    item.textContent = count;
  }
  document.getElementById("add-btn").style.display = "inline";
  document.getElementById("remove-btn").style.display = "none";
}

