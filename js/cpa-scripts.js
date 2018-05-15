jQuery(document).ready(function($){

  // Slick Slider settings
  $('.slider-for').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: true,
   fade: true,
   asNavFor: '.slider-nav'
 });

 $('.slider-nav').slick({
   slidesToScroll: 1,
   asNavFor: '.slider-for',
   dots: true,
   focusOnSelect: true,
   arrows: true,
   autoplay: false
 });

 // Search Toggle
 $('.search-toggle').click(function() {
   $('.header-nav').toggleClass('show');
   //$('.search-form').slideDown('slow');
 });

 $('.search-close').click(function() {
   $('.header-nav').toggleClass('show');
 });

 // Mobile Toggles
 $('.mobile-toggle').click(function() {
   $('.mobile-main-nav').slideToggle('slow');
 })
});