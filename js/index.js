var slidePosition = 1;
SlideShow(slidePosition);

// forward/Back controls
function plusSlides(n) {
  SlideShow(slidePosition += n);
}

//  images controls
function currentSlide(n) {
  SlideShow(slidePosition = n);
}

function SlideShow(n) {
  var i;
  var slides = document.getElementsByClassName("Containers");
  var circles = document.getElementsByClassName("dots");
  if (n > slides.length) {slidePosition = 1}
  if (n < 1) {slidePosition = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < circles.length; i++) {
      circles[i].className = circles[i].className.replace(" enable", "");
  }
  slides[slidePosition-1].style.display = "block";
  circles[slidePosition-1].className += " enable";
} 

// code for carousel container for the best sellers
// const prev = document.querySelector(".prev");
// const next = document.querySelector(".next");
// const carousel = document.querySelector(".carousel-container");
// const track = document.querySelector(".track");
// let width = carousel.offsetWidth;
// let index = 0;
// window.addEventListener("resize", function () {
//   width = carousel.offsetWidth;
// });

CarouselSlide("#prev1", "#next1", "#carousel-container1", "#track1")
CarouselSlide("#prev2", "#next2", "#carousel-container2", "#track2")
CarouselSlide("#prev3", "#next3", "#carousel-container3", "#track3")
CarouselSlide("#prev4", "#next4", "#carousel-container4", "#track4")
CarouselSlide("#prev5", "#next5", "#carousel-container5", "#track5")
function CarouselSlide (namePrev, nameNext, nameCarousel, nameTrack){
  const prev = document.querySelector(namePrev);
  const next = document.querySelector(nameNext);
  const carousel = document.querySelector(nameCarousel);
  const track = document.querySelector(nameTrack);
  let width = carousel.offsetWidth;
  let index = 0;
  window.addEventListener("resize", function () {
    width = carousel.offsetWidth; 
  });

  next.addEventListener("click", function (e) {
    e.preventDefault();
    index = index + 1;
    prev.classList.add("show");
    track.style.transform = "translateX(" + index * -width + "px)";
    if (track.offsetWidth - index * width < index * width) {
      next.classList.add("hide");
    }
  });
  prev.addEventListener("click", function (e) {
    e.preventDefault();
    index = index - 1;
    next.classList.remove("hide");
    if (index === 0) {
      prev.classList.remove("show");
    }
    track.style.transform = "translateX(" + index * -width + "px)";
  });  
}


