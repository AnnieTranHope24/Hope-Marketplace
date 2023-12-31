// Annie Tran - Take care of the cover-photo-carousel of the main page
var slidePosition = 1;
SlideShow(slidePosition);

// Annie Tran - forward/Back controls
function plusSlides(n) {
  SlideShow(slidePosition += n);
}

//  Annie Tran - images controls
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


// Annie Tran - Tiny slider for the cover carousel
let sliderCover = tns({
  container: '.my-slider-cover',
  items: 1,
  slideBy: '1', 
  autoplayButtonOutput: false,
  prevButton: document.querySelector('#slide-prev-cover'),  // Node reference
  nextButton: document.querySelector('#slide-next-cover'), 
  autoPlayTimeout: false,
  autoplay: true,
  nav: false,                          
  responsive: {
    950: {
      items: 1,
      gutter: 20
    },
    500: {
      items: 1,
      gutter: 20      
    },


  }
  
})
var buttons = document.querySelectorAll('.slider-cover button')
	buttons.forEach(function() {
		this.addEventListener('click', function(e) {
			sliderCover.play()
		})
	})

// Annie Tran - Tiny slider - take care of the slides for each Best Seller on the main page

let slider = tns({
  container: '.my-slider',
  items: 4,
  slideBy: '1',
  autoplay: false,
  prevButton: document.querySelector('#slide-prev1'),  // Node reference
  nextButton: document.querySelector('#slide-next1'), 
  nav: false,                          
  responsive: {
    950: {
      items: 4,
      gutter: 20
    },
    500: {
      items: 2,
      gutter: 20      
    },


  }
  
})
let slider2 = tns({
  container: '.my-slider2',
  items: 4,
  slideBy: '1',
  autoplay: false,
  prevButton: document.querySelector('#slide-prev2'),  // Node reference
  nextButton: document.querySelector('#slide-next2'), 
  nav: false,                         
  responsive: {
    950: {
      items: 4,
      gutter: 20
    },
    500: {
      items: 2,
      gutter: 20      
    },


  }
  
})

let slider3 = tns({
  container: '.my-slider3',
  items: 4,
  slideBy: '1',
  autoplay: false,
  prevButton: document.querySelector('#slide-prev3'),  // Node reference
  nextButton: document.querySelector('#slide-next3'), 
  nav: false,                     
  responsive: {
    950: {
      items: 4,
      gutter: 20
    },
    500: {
      items: 2,
      gutter: 20      
    },


  }
  
})

let slider4 = tns({
  container: '.my-slider4',
  items: 4,
  slideBy: '1',
  autoplay: false,
  prevButton: document.querySelector('#slide-prev4'),  // Node reference
  nextButton: document.querySelector('#slide-next4'), 
  nav: false,                     
  responsive: {
    950: {
      items: 4,
      gutter: 20
    },
    500: {
      items: 2,
      gutter: 20      
    },


  }
  
})

let slider5 = tns({
  container: '.my-slider5',
  items: 4,
  slideBy: '1',
  autoplay: false,
  prevButton: document.querySelector('#slide-prev5'),  // Node reference
  nextButton: document.querySelector('#slide-next5'), 
  nav: false,                    
  responsive: {
    950: {
      items: 4,
      gutter: 20
    },
    500: {
      items: 2,
      gutter: 20      
    },


  }
  
})

