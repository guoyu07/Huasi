$(document).ready(function() {

  var $mainHeader = $(".main-header");
  var $mainNav = $(".main-nav");
  var $hostReserve = $(".host-reserve");
  var $navHostReserve = $(".host-reserve > .nav");
  var $captionReserve = $(".caption-reserve");
  var $mainHeaderBottom;
  var $lastComentOffset;
  var $navHostReserveOffset;
  var $navHostReserveHeight;
  var $navHostReserveBottom;
  var $captionReserveOffset;
  var $captionReserveHeight;
  var $captionReserveBottom;
  var $test;

  function updateVariables(){
    $mainHeaderBottom = $mainHeader.offset().top + $mainHeader.outerHeight();
    $navHostReserveOffset = $navHostReserve.offset().top;
    $navHostReserveHeight = $navHostReserve.outerHeight();
    $navHostReserveBottom = $navHostReserveHeight + $navHostReserveOffset;
    $captionReserveOffset = $captionReserve.offset().top;
    $captionReserveHeight = $captionReserve.outerHeight();
    $captionReserveBottom = $captionReserveOffset + $captionReserveHeight;
    $lastComentOffset = $("#evaluaciones > .host-coment:last-of-type").offset().top;
    $test = $('.host-reserve > .col-3').offset().left;

  }

  function headerScroll(){


    scrollStarts = $(this).scrollTop();
    //console.log("nav h: " + $navHostReserveBottom);
    //console.log("capt: " + $captionReserveOffset);
    //console.log($mainHeaderBottom);
    //console.log(scrollStarts);
    //console.log($navHostReserveOffsetLeft);

    $mainHeader.css('position', 'absolute');
    $hostReserve.css('position', 'absolute');



    if(scrollStarts > $mainHeaderBottom){
      $hostReserve.css({'position':'fixed','top' : 0});
    }else{
      //añadir la clase change cuando el scrool sea mejor a 20.
      $hostReserve.css({'top' : '60px','position':'absolute'});
    }

  }

  function captionScroll(){
    scrollStarts = $(this).scrollTop();
    //console.log("nav h: " + $navHostReserveBottom);
    //console.log("capt: " + $captionReserveOffset);
    //console.log("comentn: " + $lastComentOffset);


    if(scrollStarts >= $lastComentOffset - 300){
      $captionReserve.slideUp(200);

    }else{
      $captionReserve.css('top', $navHostReserveHeight);
      $captionReserve.slideDown();
      $captionReserve.css('left', $test);
    }
  }

  function coolScroll(target, speed){
    $('html, body').animate({
      scrollTop: target.offset().top - $hostReserve.outerHeight()
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

  $(window).resize(function(){
    updateVariables();
    captionScroll();
  });

  $(document).scroll(function(){
    updateVariables();
    headerScroll();
    captionScroll();
  });



});
