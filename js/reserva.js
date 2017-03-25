

var $mainHeader = $(".main-header");
var $mainNav = $(".main-nav");
var $hostReserve = $(".host-reserve");
var $navHostReserve = $(".host-reserve > .nav");
var $captionReserve = $(".caption-reserve");
var $mainFooter = $(".main-footer");

function pageScroll(){

  scrollStarts = $(this).scrollTop();
  console.log("Host : "+($navHostReserve.offset().top + $captionReserve.height()));
  console.log("Foot : " + $mainFooter.offset().top);
  $mainHeader.css('position', 'absolute');
  $hostReserve.css('position', 'absolute');

  if(scrollStarts > $hostReserve.offset().top){
    $hostReserve.css({'position':'fixed','top' : 0});
  }else{
    //añadir la clase change cuando el scrool sea mejor a 20.
    $hostReserve.css({'top' : '60px','position':'absolute'});
  }



$(document).ready(function() {

  //pageScroll();
});

$(document).scroll(function(){
  pageScroll();
});
