'use strict'
$(function(){

  //searchボタンメニュー開閉
  $('.search_link').on('click', function(){
    $('.search_menu').addClass('open');
    $('.curtain').addClass('open');
    $('html, body').css('overflow','hidden');
  });
  $('.curtain').on('click', function(){
    $('.search_menu').removeClass('open');
    $('.curtain').removeClass('open');
    $('html, body').css('overflow','auto');
  });

$(document).ready(function(){
$(function(){
    var target = $(".fix_block");//ここに追尾したい要素名を記載
    var footer = $("footer");//フッターでストップさせる
    var targetHeight = target.outerHeight(true);
    var targetTop = target.offset().top;

    $(window).scroll(function(){
        var scrollTop = $(this).scrollTop();
        if(scrollTop > targetTop){
            // 動的にコンテンツが追加されてもいいように、常に計算する
            var footerTop = footer.offset().top;

            if(scrollTop + targetHeight > footerTop){
                target.addClass('fixed_side');
            }else{
                target.addClass('fixed_side');
            }
        }else{
            target.removeClass('fixed_side');
        }
    });
});


});

  //tile
  $('.tile > *').tile();

  //ハンバーガーメニュー
  $('.sp_menu_icon').on('click', function() {
    $(this).toggleClass('close');
    $('.hdr_nav').toggleClass('open');
  });

  $('.toc').addClass('open');

  //目次ドロワーメニュー
  if (window.matchMedia('(max-width: 767px)').matches) {
    $('.toc-title').on('click', function() {
      $(this).toggleClass('active');
      $('.toc').toggleClass('open');
    });
}

$(document).ready(function() {
  var pagetop = $('.pagetop');
    $(window).scroll(function () {
       if ($(this).scrollTop() > 100) {
            pagetop.fadeIn();
       } else {
            pagetop.fadeOut();
            }
       });
       pagetop.click(function () {
           $('body, html').animate({ scrollTop: 0 }, 500);
              return false;
   });
});

var headerHight;

if(navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){
  headerHight = 140; //ヘッダの高さ
} else {
  headerHight = 0; //ヘッダの高さ
}
$('a[href^="#"]').click(function(){
    var href= $(this).attr("href");
      var target = $(href == "#" || href == "" ? 'html' : href);
       var position = target.offset().top-headerHight;
    $("html, body").animate({scrollTop:position}, 550, "swing");
       return false;
  });

});
