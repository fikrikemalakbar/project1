function openModalfloor() {
    document.getElementById("myModalfloor").style.display = "block";
  }
  
  function closeModalfloor() {
    document.getElementById("myModalfloor").style.display = "none";
  }
  
  var slideIndexfloor = 1;
  showSlidesfloor(slideIndexfloor);
  
  function plusSlidesfloor(n) {
    showSlidesfloor(slideIndexfloor += n);
  }
  
  function currentSlidefloor(n) {
    showSlidesfloor(slideIndexfloor = n);
  }
  
  function showSlidesfloor(n) {
    var i;
    var slidesfloor = document.getElementsByClassName("mySlidesfloor");
    var dotsfloor = document.getElementsByClassName("demofloor");
    var captionTextfloor = document.getElementById("captionfloor");
    if (n > slidesfloor.length) {slideIndexfloor = 1}
    if (n < 1) {slideIndexfloor = slidesfloor.length}
    for (i = 0; i < slidesfloor.length; i++) {
        slidesfloor[i].style.display = "none";
    }
    for (i = 0; i < dotsfloor.length; i++) {
        dotsfloor[i].className = dotsfloor[i].className.replace(" activefloor", "");
    }
    slidesfloor[slideIndexfloor-1].style.display = "block";
    dotsfloor[slideIndexfloor-1].className += " activefloor";
    captionTextfloor.innerHTML = dotsfloor[slideIndexfloor-1].alt;
  }


  function openModalfloortwo() {
    document.getElementById("myModalfloortwo").style.display = "block";
  }
  
  function closeModalfloortwo() {
    document.getElementById("myModalfloortwo").style.display = "none";
  }
  
  var slideIndexfloortwo = 1;
  showSlidesfloortwo(slideIndexfloortwo);
  
  function plusSlidesfloortwo(n) {
    showSlidesfloortwo(slideIndexfloortwo += n);
  }
  
  function currentSlidefloortwo(n) {
    showSlidesfloortwo(slideIndexfloortwo = n);
  }
  
  function showSlidesfloortwo(n) {
    var i;
    var slidesfloortwo = document.getElementsByClassName("mySlidesfloortwo");
    var dotsfloortwo = document.getElementsByClassName("demofloortwo");
    var captionTextfloortwo = document.getElementById("captionfloortwo");
    if (n > slidesfloortwo.length) {slideIndexfloortwo = 1}
    if (n < 1) {slideIndexfloortwo = slidesfloortwo.length}
    for (i = 0; i < slidesfloortwo.length; i++) {
        slidesfloortwo[i].style.display = "none";
    }
    for (i = 0; i < dotsfloortwo.length; i++) {
        dotsfloortwo[i].className = dotsfloortwo[i].className.replace(" activefloortwo", "");
    }
    slidesfloortwo[slideIndexfloortwo-1].style.display = "block";
    dotsfloortwo[slideIndexfloortwo-1].className += " activefloortwo";
    captionTextfloortwo.innerHTML = dotsfloortwo[slideIndexfloortwo-1].alt;
  }

  
  function openModalgallery() {
    document.getElementById("myModalgallery").style.display = "block";
  }
  
  function closeModalgallery() {
    document.getElementById("myModalgallery").style.display = "none";
  }
  
  var slideIndexgallery = 1;
  showSlidesgallery(slideIndexgallery);
  
  function plusSlidesgallery(n) {
    showSlidesgallery(slideIndexgallery += n);
  }
  
  function currentSlidegallery(n) {
    showSlidesgallery(slideIndexgallery = n);
  }
  
  function showSlidesgallery(n) {
    var i;
    var slidesgallery = document.getElementsByClassName("mySlidesgallery");
    var dotsgallery = document.getElementsByClassName("demogallery");
    var captionTextgallery = document.getElementById("captiongallery");
    if (n > slidesgallery.length) {slideIndexgallery = 1}
    if (n < 1) {slideIndexgallery = slidesgallery.length}
    for (i = 0; i < slidesgallery.length; i++) {
        slidesgallery[i].style.display = "none";
    }
    for (i = 0; i < dotsgallery.length; i++) {
        dotsgallery[i].className = dotsgallery[i].className.replace(" activegallery", "");
    }
    slidesgallery[slideIndexgallery-1].style.display = "block";
    dotsgallery[slideIndexgallery-1].className += " activegallery";
    captionTextgallery.innerHTML = dotsgallery[slideIndexgallery-1].alt;
  }

  
  function openModalsite() {
    document.getElementById("myModalsite").style.display = "block";
  }
  
  function closeModalsite() {
    document.getElementById("myModalsite").style.display = "none";
  }
  
  var slideIndexsite = 1;
  showSlidessite(slideIndexsite);
  
  function plusSlidessite(n) {
    showSlidessite(slideIndexsite += n);
  }
  
  function currentSlidesite(n) {
    showSlidessite(slideIndexsite = n);
  }
  
  function showSlidessite(n) {
    var i;
    var slidessite = document.getElementsByClassName("mySlidessite");
    var dotssite = document.getElementsByClassName("demosite");
    var captionTextsite = document.getElementById("captionsite");
    if (n > slidessite.length) {slideIndexsite = 1}
    if (n < 1) {slideIndexsite = slidessite.length}
    for (i = 0; i < slidessite.length; i++) {
        slidessite[i].style.display = "none";
    }
    for (i = 0; i < dotssite.length; i++) {
        dotssite[i].className = dotssite[i].className.replace(" activesite", "");
    }
    slidessite[slideIndexsite-1].style.display = "block";
    dotssite[slideIndexsite-1].className += " activesite";
    captionTextsite.innerHTML = dotssite[slideIndexsite-1].alt;
  }


  
  function openModalsitemobile() {
    document.getElementById("myModalsitemobile").style.display = "block";
  }
  
  function closeModalsitemobile() {
    document.getElementById("myModalsitemobile").style.display = "none";
  }
  
  var slideIndexsitemobile = 1;
  showSlidessitemobile(slideIndexsitemobile);
  
  function plusSlidessitemobile(n) {
    showSlidessitemobile(slideIndexsitemobile += n);
  }
  
  function currentSlidesitemobile(n) {
    showSlidessitemobile(slideIndexsitemobile = n);
  }
  
  function showSlidessitemobile(n) {
    var i;
    var slidessitemobile = document.getElementsByClassName("mySlidessitemobile");
    var dotssitemobile = document.getElementsByClassName("demositemobile");
    var captionTextsitemobile = document.getElementById("captionsitemobile");
    if (n > slidessitemobile.length) {slideIndexsitemobile = 1}
    if (n < 1) {slideIndexsitemobile = slidessitemobile.length}
    for (i = 0; i < slidessitemobile.length; i++) {
        slidessitemobile[i].style.display = "none";
    }
    for (i = 0; i < dotssitemobile.length; i++) {
        dotssitemobile[i].className = dotssitemobile[i].className.replace(" activesitemobile", "");
    }
    slidessitemobile[slideIndexsitemobile-1].style.display = "block";
    dotssitemobile[slideIndexsitemobile-1].className += " activesitemobile";
    captionTextsitemobile.innerHTML = dotssitemobile[slideIndexsitemobile-1].alt;
  }


  function openModalmarketing() {
    document.getElementById("myModalmarketing").style.display = "block";
  }
  
  function closeModalmarketing() {
    document.getElementById("myModalmarketing").style.display = "none";
  }
  
  var slideIndexmarketing = 1;
  showSlidesmarketing(slideIndexmarketing);
  
  function plusSlidesmarketing(n) {
    showSlidesmarketing(slideIndexmarketing += n);
  }
  
  function currentSlidemarketing(n) {
    showSlidesmarketing(slideIndexmarketing = n);
  }
  
  function showSlidesmarketing(n) {
    var i;
    var slidesmarketing = document.getElementsByClassName("mySlidesmarketing");
    var dotsmarketing = document.getElementsByClassName("demomarketing");
    var captionTextmarketing = document.getElementById("captionmarketing");
    if (n > slidesmarketing.length) {slideIndexmarketing = 1}
    if (n < 1) {slideIndexmarketing = slidesmarketing.length}
    for (i = 0; i < slidesmarketing.length; i++) {
        slidesmarketing[i].style.display = "none";
    }
    for (i = 0; i < dotsmarketing.length; i++) {
        dotsmarketing[i].className = dotsmarketing[i].className.replace(" activemarketing", "");
    }
    slidesmarketing[slideIndexmarketing-1].style.display = "block";
    dotsmarketing[slideIndexmarketing-1].className += " activemarketing";
    captionTextmarketing.innerHTML = dotsmarketing[slideIndexmarketing-1].alt;
  }


 var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000); // Change image every 2 seconds
}