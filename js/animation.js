var registration = true;

$(window).scroll(function(){
  if ( $(window).scrollTop() >= 10 ){
      $('#navigationPanel').addClass('scroll');
      $('#showSigninPanel').addClass('scroll');
      $('#userNamePanel').addClass('scroll');
      $('#logo').animate({opacity:'hide'}, 500);
      $('#mainBanner').removeClass('blur');
      $('#mainBanner').addClass('grayscale');
   } else {
      $('#navigationPanel').removeClass('scroll');
      $('#showSigninPanel').removeClass('scroll');
      $('#userNamePanel').removeClass('scroll');
      $('#logo').animate({opacity:'show'}, 500);
      $('#mainBanner').addClass('blur');
      $('#mainBanner').removeClass('grayscale');
   }
});

$('#showSigninPanel').click(function(){
  if($(this).find('i').html() == 'person'){
    $(this).find('i').html('close')
                     .addClass('active');

    if(registration){
      $('#registration').animate({'opacity':'show'}, 0);
    } else {
      $('#enter').animate({'opacity':'show'}, 0);
    }
    $('#signinPanel').animate({opacity:'show'}, 500);
    $('#signinPanel').find('input').first().focus();
  } else {
    $(this).find('i').html('person')
                     .removeClass('active');
    $('#signinPanel').animate({opacity:'hide'}, 500);
  }
});

$('.accountMode').click(function(){
  if(registration){
    $('#registration').animate({'opacity':'hide'}, 0);
    $('#enter').animate({'opacity':'show'}, 500);
    registration = false;
  } else {
    $('#enter').animate({'opacity':'hide'}, 0);
    $('#registration').animate({'opacity':'show'}, 500);
    registration = true;
  }
});

$('.menuItem').hover(function() {
  $(this).find('.submenu').animate({'opacity':'show'}, 500);
}, function() {
  $(this).find('.submenu').css({'display':'none'});
});

$('.submenu').hover(function(){

}, function(){
  $(this).css({'display':'none'});
})

var banner = 0;
var oldBanner = banner;
$('#banner'+banner).animate({opacity:'show'},500);
setInterval(function(){
  oldBanner = banner;
  if(banner+1 < $('.banners').length)
    banner++;
  else
    banner = 0;

  $('#banner'+oldBanner).animate({opacity:'hide'}, 500);
  $('#banner'+banner).animate({opacity:'show'},500);
},10000);



//tarkik ☮ 2016
