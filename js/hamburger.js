//Getting value from "ajax.php".


function fill(Value) {


  //Assigning value to "search" div in "search.php" file.
 
 
   $('#search').val(Value);
 
 
  //Hiding "display" div in "search.php" file.
 
 
   $('#display').hide();
 
 
 }
 
 
 $(document).ready(function() {
 
 
  //On pressing a key on "Search box" in "search.php" file. This function will be called.
 
 
   $("#search").keyup(function() {
 
 
      //Assigning search box value to javascript variable named as "name".
 
 
       var name = $('#search').val();
 
 
      //Validating, if "name" is empty.
 
 
       if (name == "") {
 
 
          //Assigning empty value to "display" div in "search.php" file.
 
 
           $("#display").html("");
 
 
       }
 
 
      //If name is not empty.
 
 
       else {
 
 
          //AJAX is called.
 
 
           $.ajax({
 
 
              //AJAX type is "Post".
 
 
               type: "POST",
 
 
              //Data will be sent to "ajax.php".
 
 
               url: "ajax.php",
 
 
              //Data, that will be sent to "ajax.php".
 
              data: {


                //Assigning value of "name" into "search" variable.


                 search: name


             },


            //If result found, this funtion will be called.


             success: function(html) {


                //Assigning result to "display" div in "search.php" file.


                 $("#display").html(html).show();


             }


         });


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



const toggleSwitch = document.querySelector('input[type="checkbox"]');
toggleSwitch.addEventListener('change', () => {
 if (toggleSwitch.checked) {
     board.style.display = "flex";


   }else {
     board.style.display = "none";
   }
});


const request = document.querySelector('.request-button')
const board = document.querySelector('.card-container ');
const title = document.querySelector('.request-title');
const toggle = document.querySelector('.toggle');


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

