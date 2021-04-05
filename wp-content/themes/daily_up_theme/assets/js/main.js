$(document).ready(function () {
  $(function () {
    if (!$("body").hasClass("home")) {
      var target = $(".side-column"); //ここに追尾したい要素名を記載
      var footer = $("footer"); //フッターでストップさせる
      var targetHeight = target.outerHeight(true);
      var targetTop = target.offset().top;

      $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > targetTop) {
          // 動的にコンテンツが追加されてもいいように、常に計算する
          var footerTop = footer.offset().top;

          if (scrollTop + targetHeight > footerTop) {
            target.addClass("fixed_side");
          } else {
            target.addClass("fixed_side");
          }
        } else {
          target.removeClass("fixed_side");
        }
      });
    }
  });
});
