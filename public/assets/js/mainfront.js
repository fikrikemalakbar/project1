const parallax = document.querySelectorAll('.parallax');
M.Parallax.init(parallax)


function openModal() {
    document.getElementById("image-myModal").style.display = "block";
  }
  
  function closeModal() {
    document.getElementById("image-myModal").style.display = "none";
  }
  
  var slideIndex = 1;
  showSlides(slideIndex);
  
  function plusSlides(n) {
    showSlides(slideIndex += n);
  }
  
  function currentSlide(n) {
    showSlides(slideIndex = n);
  }
  
  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("image-mySlides");
    var dots = document.getElementsByClassName("image-demo");
    var captionText = document.getElementById("image-caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" image-active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " image-active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }
  
//   third
function thirdopenModal() {
    document.getElementById("third-myModal").style.display = "block";
  }
  
  function thirdcloseModal() {
    document.getElementById("third-myModal").style.display = "none";
  }
  
  var slideIndex = 1;
  thirdshowSlides(slideIndex);
  
  function thirdplusSlides(n) {
    thirdshowSlides(slideIndex += n);
  }
  
  function thirdcurrentSlide(n) {
    thirdshowSlides(slideIndex = n);
  }
  
  function thirdshowSlides(n) {
    var i;
    var slides = document.getElementsByClassName("third-mySlides");
    var dots = document.getElementsByClassName("third-demo");
    var captionText = document.getElementById("third-caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" third-active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " third-active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }

  // glr
  function galleryopenModal() {
    document.getElementById("gallery-myModal").style.display = "block";
  }
  
  function gallerycloseModal() {
    document.getElementById("gallery-myModal").style.display = "none";
  }
  
  var slideIndex = 1;
  galleryshowSlides(slideIndex);
  
  function galleryplusSlides(n) {
    galleryshowSlides(slideIndex += n);
  }
  
  function gallerycurrentSlide(n) {
    galleryshowSlides(slideIndex = n);
  }
  
  function galleryshowSlides(n) {
    var i;
    var slides = document.getElementsByClassName("gallery-mySlides");
    var dots = document.getElementsByClassName("gallery-demo");
    var captionText = document.getElementById("gallery-caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" gallery-active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " gallery-active";
    captionText.innerHTML = dots[slideIndex-1].alt;
  }