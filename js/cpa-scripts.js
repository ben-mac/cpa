jQuery(document).ready(function($){

  // Slick Slider settings
$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  autoplay: false,
  prevArrow: $('.prev'),
  nextArrow: $('.next'),
});

 // Search Toggle
 $('.search-toggle').click(function() {
   $('.header-nav').toggleClass('show');
 });

 $('.search-close').click(function() {
   $('.header-nav').toggleClass('show');
 });

 // Mobile Toggles
 $('.mobile-toggle').click(function() {
   $('.mobile-main-nav').slideToggle('slow');
 });

 $('.mobile-toggle__content').click(function() {
    $('.main-navigation ul').slideToggle('slow');
 });
});