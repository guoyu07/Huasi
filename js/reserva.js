$(document).ready(function() {

  var $mainHeader = $(".main-header");
  var $mainNav = $(".main-nav");
  var $hostReserve = $(".host-reserve");
  var $navHostReserve = $(".host-reserve > .nav");
  var $captionReserve = $(".caption-reserve");
  var $lastComentOffset;
  var $navHostReserveOffset;
  var $navHostReserveHeight;
  var $navHostReserveBottom;
  var $captionReserveOffset;
  var $captionReserveHeight;
  var $captionReserveBottom;

  function updateVariables(){
    $navHostReserveOffset = $navHostReserve.offset().top;
    $navHostReserveHeight = $navHostReserve.height();
    $navHostReserveBottom = $navHostReserveHeight + $navHostReserveOffset;
    $captionReserveOffset = $captionReserve.offset().top;
    $captionReserveHeight = $captionReserve.height();
    $captionReserveBottom = $captionReserveOffset + $captionReserveHeight;
    $lastComentOffset = $("#evaluaciones > .host-coment:last-of-type").offset().top;

  }

  function headerScroll(){


    scrollStarts = $(this).scrollTop();
    console.log("nav h: " + $navHostReserveBottom);
    console.log("capt: " + $captionReserveOffset);

    $mainHeader.css('position', 'absolute');
    $hostReserve.css('position', 'absolute');
    $captionReserve.css('top', $navHostReserveHeight);


    if(scrollStarts > $hostReserve.offset().top){
      $hostReserve.css({'position':'fixed','top' : 0});
    }else{
      //añadir la clase change cuando el scrool sea mejor a 20.
      $hostReserve.css({'top' : '60px','position':'absolute'});
    }

  }

  function captionScroll(){
    scrollStarts = $(this).scrollTop();
    console.log("nav h: " + $navHostReserveBottom);
    console.log("capt: " + $captionReserveOffset);

    if(scrollStarts >= $lastComentOffset - 300){
      $captionReserve.css({'position':'absolute', 'top': $lastComentOffset});
    }
  }

  function coolScroll(target, speed){
    $('html, body').animate({
      scrollTop: target.offset().top - $hostReserve.height()
    }, speed);
  }

  //Coll Scroll
  $('[href^="#"] ').click(function(){
    var target = $($(this).attr('href'));
    if(target.length) {
      event.preventDefault();
      coolScroll(target, 1000);
    }
  });



  updateVariables();
  captionScroll();
  headerScroll();


  $(document).scroll(function(){
    updateVariables();
    headerScroll();
    captionScroll();
  });



});
