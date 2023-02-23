CarouselSlide("#prev1-acc", "#next1-acc", "#carousel-container1-acc", "#track1-acc")
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