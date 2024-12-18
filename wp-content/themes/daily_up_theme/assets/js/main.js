$(document).ready(function () {
  //サイドメニュー追尾処理
  $(function () {
    if (!$("body").hasClass("home")) {
      var target = $(".side-column");
      var footer = $("footer");
      var targetHeight = target.outerHeight(true);
      var targetTop = target.offset().top;

      $(window).scroll(function () {
        var scrollTop = $(this).scrollTop();
        if (scrollTop > targetTop) {
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
  if (!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) {
    window.onscroll = function () {
      //サイドメニューフッターで消える処理
      var check = window.pageYOffset;
      var docHeight = $(document).height();
      var dispHeight = $(window).height();

      if (check > docHeight - dispHeight - 100) {
        $(".side-column").fadeOut(200);
      } else {
        $(".side-column").fadeIn(200);
      }
    };
  }
  //ハンバーガーメニュー
  $(function () {
    $(".drawer-wrap").click(function () {
      $(".drawer-box").toggleClass("close");
      $(".sp-menu").fadeToggle(500);
      $("body").css("overflow") === "hidden"
        ? $("body").css("overflow", "visible")
        : $("body").css("overflow", "hidden");
    });
  });
  $(function () {
    $(".lower-drawer-wrap").click(function () {
      $(".lower-drawer-box").toggleClass("close");
      $(".sp-menu").fadeToggle(500);
      $("body").css("overflow") === "hidden"
        ? $("body").css("overflow", "visible")
        : $("body").css("overflow", "hidden");
    });
  });
  //下層関連記事スライド
  $(".slider").slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    dots: false,
    responsive: [
      {
        breakpoint: 799,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });
});
