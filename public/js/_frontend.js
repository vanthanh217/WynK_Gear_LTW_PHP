//Sticky
{
  $(document).ready(() => {
    // state
    const stickyHeader = localStorage.getItem("stickyHeader");
    // on mount
    stickyHeader && $(".header-wrap").addClass("sticky");
    // handlers
    handleSrcollHeader = () => {
      if ($(this).scrollTop()) {
        $(".header-wrap").addClass("sticky");
        localStorage.setItem("stickyHeader", "sticky");
      } else {
        $(".header-wrap").removeClass("sticky");
        localStorage.removeItem("stickyHeader");
      }
    };
    $(window).scroll(() => {
      handleSrcollHeader();
    });
  });
}

//Dark Mode
{
  $(document).ready(() => {
    // state
    const theme = localStorage.getItem("theme");
    // on mount
    theme && $("body").addClass(theme);
    // handlers
    handleThemeToogle = () => {
      $("body").toggleClass("dark-mode");

      if ($("body").hasClass("dark-mode")) {
        $(".header-switch .bx")
          .removeClass("bx-moon")
          .addClass("bx-brightness");
        localStorage.setItem("theme", "dark-mode");
      } else {
        $(".header-switch .bx")
          .removeClass("bx-brightness")
          .addClass("bx-moon");
        localStorage.removeItem("theme");
      }
    };
    $(".bx-moon").click(() => {
      handleThemeToogle();
    });
  });
}

// Show Product Categories
{
  $(document).ready(() => {
    $(".menu-left").click(() => {
      $("header .menu-left .menu-list").toggle();
      $(".overlay").toggle();
    });
    $(".overlay").click(() => {
      $("header .menu-left .menu-list").toggle();
      $(".overlay").toggle();
    });
  });
}

// Banner Slider
{
  $(document).ready(() => {
    $(".banner-slider").slick({
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      prevArrow: `<button type="button" class="slick-prev pull-left"><i class="bx bxs-chevron-left"></i></button>`,
      nextArrow: `<button type="button" class="slick-next pull-right"><i class="bx bxs-chevron-right"></i></button>`,
      responsive: [
        {
          breakpoint: 991.98,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
          },
        },
      ],
    });
  });
}

// Checkout Page
{
  $(document).ready(() => {
    $(".payment-box__content input").on("click", () => {
      var value = $("[type='radio']:checked").val();
      if (value == 1) $(".bank-info").hide();
      else $(".bank-info").show();
    });
  });
}

// Product Category
{
  $(document).ready(() => {
    $("main.product-category .category-list").click(() => {
      $(".category-sub").slideToggle();
      $(".category-list .dropdown").toggleClass("rotate");
    });
  });
  $(document).ready(() => {
    $("main.product-category .brand-list").click(() => {
      $(".brand-sub").slideToggle();
      $(".brand-list .dropdown").toggleClass("rotate");
    });
  });
}

// Product Page
{
  $(document).ready(() => {
    $("main.product .brand-list").click(() => {
      $(".brand-sub").slideToggle();
      $(".brand-list .dropdown").toggleClass("rotate");
    });
  });
  $(document).ready(() => {
    $("main.product .category-list").click(() => {
      $(".category-sub").slideToggle();
      $(".category-list .dropdown").toggleClass("rotate");
    });
  });
}

// Product Detail Page
{
  $(document).ready(() => {
    $(".product-detail__wrap .btn-qty").click((e) => {
      var qty = parseInt($("#qty").val());
      if (e.target.id == "sub") {
        if (qty > 0) {
          qty = qty - 1;
        }
      } else {
        qty = qty + 1;
      }
      $("#qty").val(qty.toString());
    });
  });
}

{
  $(document).ready(() => {
    $("#header-mb .cate-list .item-title").click(() => {
      $(".sub-list").slideToggle();
      $(".dropdown").toggleClass("rotate");
    });
  });
}

// Mobile
{
  $(document).ready(() => {
    $("#header-mb .show-search").click(() => {
      $("#header-mb #search-mb").css("left", "0");
    });

    $("#header-mb .back").click(() => {
      $("#header-mb #search-mb").css("left", "-100%");
    });

    $("#header-mb .show-menu").click(() => {
      $("#header-mb .sidebar").css("left", "0");
    });

    $("#header-mb .close-sidebar .bx").click(() => {
      $("#header-mb .sidebar").css("left", "-100%");
    });
  });
}

// Mini laptop
{
  $(document).ready(() => {
    $("header #search-mini-laptop").click(() => {
      $("header .header-group .header-search").toggle();
    });
  });
}
