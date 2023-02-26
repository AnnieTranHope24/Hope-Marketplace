
function details(num){
  const detail1 = document.querySelector(".more-details");
  const detail2 = document.querySelector(".more-details1");
  if(num == 1){
    if (detail1.style.display === "none") {
      detail1.style.display = "flex";
    } else {
      detail1.style.display = "none"
    }
  }else {    if (detail2.style.display === "none") {
    detail2.style.display = "flex";
  } else {
    detail2.style.display = "none"
  }
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

const adds = document.querySelectorAll(".add");

adds.forEach((add) => {
  let isAdded = false;
 add.addEventListener("click",() => {
  var item = document.getElementById('item-counter');
  var count = parseInt(item.textContent);
  if(!isAdded) {
    add.textContent = "Remove Item";
    add.style.backgroundColor = "#f35a5a";
    isAdded = true;
    count++;
    item.textContent = count;
  }else {
    add.textContent = "Add Item";
    add.style.backgroundColor = "lightblue";
    isAdded = false;
    count--;
    item.textContent = count;
  }
 });
});