(function ($) {
  "use strict";

  jQuery(document).on("ready", function () {
    /*---canvas menu activation---*/
    jQuery(".binduz-er-news-canvas_open").on("click", function () {
      jQuery(
        ".binduz-er-news-offcanvas_menu_wrapper,.binduz-er-news-off_canvars_overlay"
      ).addClass("binduz-er-news-active");
    });

    jQuery(
      ".binduz-er-news-canvas_close,.binduz-er-news-off_canvars_overlay"
    ).on("click", function () {
      jQuery(
        ".binduz-er-news-offcanvas_menu_wrapper,.binduz-er-news-off_canvars_overlay"
      ).removeClass("binduz-er-news-active");
    });

    /*---Off Canvas Menu---*/
    var $offcanvasNav = jQuery(".binduz-er-news-offcanvas_main_menu"),
      $offcanvasNavSubMenu = $offcanvasNav.find(".binduz-er-news-sub-menu");
    $offcanvasNavSubMenu
      .parent()
      .prepend(
        '<span class="menu-expand"><i class="fas fa-angle-down"></i></span>'
      );

    $offcanvasNavSubMenu.slideUp();

    $offcanvasNav.on("click", "li a, li .menu-expand", function (e) {
      var $this = jQuery(this);
      if (
        $this
          .parent()
          .attr("class")
          .match(
            /\b(binduz-er-news-menu-item-has-children|has-children|has-sub-menu)\b/
          ) &&
        ($this.attr("href") === "#" || $this.hasClass("menu-expand"))
      ) {
        e.preventDefault();
        if ($this.siblings("ul:visible").length) {
          $this.siblings("ul").slideUp("binduz-er-news-slow");
        } else {
          $this
            .closest("li")
            .siblings("li")
            .find("ul:visible")
            .slideUp("binduz-er-news-slow");
          $this.siblings("ul").slideDown("binduz-er-news-slow");
        }
      }
      if (
        $this.is("a") ||
        $this.is("span") ||
        $this.attr("clas").match(/\b(binduz-er-news-menu-expand)\b/)
      ) {
        $this.parent().toggleClass("binduz-er-news-menu-open");
      } else if (
        $this.is("li") &&
        $this
          .attr("class")
          .match(/\b('binduz-er-news-menu-item-has-children')\b/)
      ) {
        $this.toggleClass("binduz-er-news-menu-open");
      }
    });

    var tren_nav = binduz_obj.newsticker_nav === 'yes'? true:false;
   
    //===== Service Active slick slider
    var topbar_headline1 = jQuery(".binduz-er-topbar-headline-slider");
    topbar_headline1.slick({
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: tren_nav,
      prevArrow: '<span class="prev"><i class="fas fa-angle-left"></i></span>',
      nextArrow: '<span class="next"><i class="fas fa-angle-right"></i></span>',
      speed: 1500,
      slidesToShow: 1,
      slidesToScroll: 1,
      vertical: true,
      verticalSwiping: true,
    });

    //===== Service Active slick slider
    var topbar_headline2 = jQuery(".binduz-er-topbar-headline-slider2");
    topbar_headline2.slick({
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: tren_nav,
      speed: 1500,
      slidesToScroll: 1,
      prevArrow: '<span class="prev"><i class="fas fa-angle-left"></i></span>',
      nextArrow: '<span class="next"><i class="fas fa-angle-right"></i></span>',
      vertical: true,
      verticalSwiping: true,
    });

    //===== Service Active slick slider
    var topbar_headline = jQuery(".binduz-er-blog-related-post-slide");
    topbar_headline.slick({
      dots: false,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 5000,
      arrows: false,
      speed: 1500,
      slidesToShow: 3,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1201,
          settings: {
            arrows: false,
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            slidesToShow: 1,
          },
        },
      ],
    });

    //===== shop details slide slick slider
    var topbar_headline1 = jQuery(".hero-slide-active");
    topbar_headline1.slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: ".hero-portal-active",
    });
    var topbar_headline2 = jQuery(".hero-portal-active");
    topbar_headline2.slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      asNavFor: ".hero-slide-active",
      dots: false,
      centerMode: false,
      arrows: false,
      centerPadding: "0",
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });

    //===== Isotope Project 1

    jQuery(".container").imagesLoaded(function () {
      var $grid = jQuery(".binduz-er-grid").isotope({
        // options
        transitionDuration: "1s",
      });

      // filter items on button click
      jQuery(".binduz-er-project-menu ul").on("click", "li", function () {
        var filterValue = jQuery(this).attr("data-filter");
        $grid.isotope({
          filter: filterValue,
        });
      });

      //for menu active class
      jQuery(".binduz-er-project-menu ul li").on("click", function (event) {
        jQuery(this)
          .siblings(".binduz-er-active")
          .removeClass("binduz-er-active");
        jQuery(this).addClass("binduz-er-active");
        event.preventDefault();
      });
    });

    //===== MAGNIFIC POPUP

    jQuery(".binduz-er-video-popup").magnificPopup({
      type: "iframe",
    });

    //===== MAGNIFIC POPUP

    jQuery(".binduz-er-image-popup").magnificPopup({
      type: "image",
      gallery: {
        enabled: true,
      },
    });

    //===== SEARCH

    jQuery(".binduz-er-news-search-open").on("click", function () {
      jQuery(".binduz-er-news-search-box").addClass("open");
      return false;
    });

    jQuery(".binduz-er-news-search-close-btn").on("click", function () {
      jQuery(".binduz-er-news-search-box").removeClass("open");
    });

    //===== NICE SELECT
    jQuery(".binduz-er-select-item select").niceSelect();

    //===== BACK TO TOP

    var back = jQuery(".binduz-er-back-to-top"),
      body = jQuery("body, html");
    jQuery(window).on("scroll", function () {
      if (jQuery(window).scrollTop() > jQuery(window).height()) {
        back.css({
          bottom: "220px",
          opacity: "1",
          visibility: "visible",
        });
      } else {
        back.css({
          bottom: "-20px",
          opacity: "0",
          visibility: "hidden",
        });
      }
    });
    body.on("click", ".binduz-er-back-to-top", function (e) {
      e.preventDefault();
      body.animate(
        {
          scrollTop: 0,
        },
        1500
      );
      return false;
    });
  });

  //===== PRELOADER
  jQuery(window).on("load", function (event) {
    jQuery(".binduz-preloader").delay(500).fadeOut(500);
  });
})(jQuery);
