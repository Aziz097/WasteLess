<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/splashscreen.css">
</head>

<body onload="myFunction()" style="margin:0;">

    <div id="loader">
        <img src="images/spwasteless.png" alt="logo" class="logo-image">
        <img src="images/tagline.png" alt="tagline" class="tagline">
    </div>

    <div style="display:none;" id="myDiv" class="animate-bottom">
        <img src="images/Logo wasteless.png" alt="">
            <div class="slideshow-container">

                <div class="mySlides fade">
                  <img src="images/carousel1.png" style="width:100%">
                </div>
                
                <div class="mySlides fade">
                  <img src="images/carousel2.png" style="width:100%">
                </div>
                
                <div class="mySlides fade">
                  <img src="images/carousel3.png" style="width:100%">
                </div>
                <div class="mySlides fade">
                    <img src="images/carousel4.png" style="width:100%">
                  </div>
                
            </div>
                <div style="text-align:center">
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span> 
                  <span class="dot"></span> 
            </div>
        <div class="button-submit">
            <button class="masuk-button" onclick="window.location.href='{{ url('/signin') }}'">Masuk</button>
            <button class="daftar-button" onclick="window.location.href='{{ url('/signup') }}'">Daftar</button>
        </div>
        <p class="terms">
            Dengan masuk atau mendaftar, kamu menyetujui <a href="#">Ketentuan layanan</a> dan <a href="#">Kebijakan privasi</a>.
        </p>
    </div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
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
  setTimeout(showSlides, 2000);
}

</script>
</body>
</html>
