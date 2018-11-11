$(document).ready(function(){
  $('.navbar-nav .nav-item').click(function(){
      $('.navbar-nav .nav-item').removeClass('active');
      $(this).addClass('active');
  })
});

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
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}

/*
function ClearBoxes() {
  for (i = 0; i < document.forms.selecao.elements.length; i++)
    if (document.forms.selecao.elements[i].type == "checkbox")
      document.forms.selecao.elements[i].checked = false;
}
*/

function ClearBoxes() {
  var inputs = $('input[type=checkbox]');

  inputs.attr('checked', false);
  inputs.prop('checked', false);
}
