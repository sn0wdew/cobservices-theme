$( document ).ready(function() {
  $('#menu').slicknav({
    label: '',
    appendTo: '.main-nav .container'
  });
  $('.slicknav_btn').click(function(){
      $(".main-nav").toggleClass("bk-main");
      $(".slicknav_icon-bar:eq(0)").toggleClass("nav-swing-1");
      $(".slicknav_icon-bar:eq(1)").toggleClass("nav-swing-2");
      $(".slicknav_icon-bar:eq(2)").toggleClass("nav-swing-3");
  });
});

$( document ).ready(function() {
    $('.all-services .ft-service').click(function(){
        $(this).addClass('service-clicked');
    });
    $('.all-services .ft-service').one("mouseenter", function(){
        $(this).addClass('service-clicked');
    });
});
