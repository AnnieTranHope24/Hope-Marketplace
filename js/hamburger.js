/* Bereket Bessie - Function is called on click to add or remove an item from the cart item-counter. */
const adds = document.querySelectorAll(".add");
// Forloop that goes through all individual add buttons
adds.forEach((add) => {
  let isAdded = false;
  // Adding a click event listener to detail-btn2
  add.addEventListener("click", () => {
    var item = document.getElementById('item-counter');
    // Getting the current number of item in the cart
    var count = parseInt(item.textContent);
    // If isAdded is false, sets the text content and background color of the button to indicate that the item has been added, increments the count variable, and updates the text content of the 'item-counter' element. 
    if (!isAdded) {
      add.textContent = "Remove Item";
      add.style.backgroundColor = "#f35a5a";
      isAdded = true;
      count++;
      item.textContent = count;
    } else {
      // Otherwise, reverts the changes made to the button, decrements the count variable, and update the text content of the 'item-counter' element
      add.textContent = "Add Item";
      add.style.backgroundColor = "lightblue";
      isAdded = false;
      count--;
      item.textContent = count;
    }
  });
});

/* Bereket Bessie - Function is called onclick to display menu items. */
const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
// Adding a click event listener to hamburger bars
hamburger.addEventListener("click", function () {
  //Setting individual hamburger bar to their specified animation
  hamburger.classList.toggle("active");
  //Setting navMenu style left to 0
  navMenu.classList.toggle("active");
});

/* Bereket Bessie - Function is called onclick to display or remove personal info about the creators of this website. */
const detail1 = document.querySelector(".more-details");
const btn1 = document.querySelector(".detail-btn1");
// Adding a click event listener to detail-btn1
btn1.addEventListener("click", function () {
  // Getting the current display style of more-details
  const displayStyle = detail1.style.display;

  // If the display style is not "none", set it to "none" and set text content of button to "View Details"
  if (displayStyle !== "none") {
    detail1.style.display = "none";
    btn1.textContent = "View Details"
  } else {
    // Otherwise, set it to "inline" and set text content of button to "Hide Details"
    detail1.style.display = "flex";
    btn1.textContent = "Hide Details"
  }
});


const detail2 = document.querySelector(".more-details1");
const btn2 = document.querySelector(".detail-btn2");

// Adding a click event listener to detail-btn2
btn2.addEventListener("click", function () {
  // Getting the current display style of more-details1
  const displayStyle = detail2.style.display;

  // If the display style is not "none", set it to "none" and set text content of button to "View Details"
  if (displayStyle !== "none") {
    detail2.style.display = "none";
    btn2.textContent = "View Details"
  } else {
    // Otherwise, set it to "inline" and set text content of button to "Hide Details"
    detail2.style.display = "flex";
    btn2.textContent = "Hide Details"
  }
});