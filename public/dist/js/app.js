/**
 *
 *  Project name: Tinno - HTML5 Chat App Template
 *
 *  File name: app.js
 *
 *  Description: The Javascript codes in this file are the basic codes of the application.
 *  Changing these codes is not recommended.
 *  We used a different file for the examples (examples.js).
 *
 *  Autor: Laborasyon
 *
 *  Portfolio: https://themeforest.net/user/laborasyon/portfolio
 *
 */
'use strict'; // PerfectScrollbar

var perfectScrollbarInit = function perfectScrollbarInit(selector) {
  return new PerfectScrollbar(selector);
};

(function ($) {
  var __window = $(window);

  var __document = $(document);

  var __body = $('body'); // Preloader


  __window.on('load', function () {
    setTimeout(function () {
      $('.preloader').fadeOut(300, function () {
        $(this).remove();
      });
    }, 1000);
  }); // Chat body scroll init


  if (__window.width() >= 1200 && $('.chat .chat-body').length) {
    var chat_body = '.chat .chat-body';
    perfectScrollbarInit(chat_body);
    $(chat_body).scrollTop($(chat_body)[0].scrollHeight);
  } // Sidebar scroll init


  if (__window.width() >= 1200 && $('.left-sidebar-content').length) {
    document.querySelectorAll('.left-sidebar-content').forEach(function (container) {
      return perfectScrollbarInit(container);
    });
  } // Right sidebar scroll init


  if (__window.width() >= 1200 && $('.right-sidebar-content').length) {
    document.querySelectorAll('.right-sidebar-content').forEach(function (container) {
      return perfectScrollbarInit(container);
    });
  } // Small change in RTL version.


  if (__body.hasClass('rtl')) {
    $('.dropdown-menu.dropdown-menu-right').removeClass('dropdown-menu-right');
  } // Feather icon init


  feather.replace({
    'stroke-width': 1.3
  }); // Let's remove the blur effect in the mobile version

  if (__window.width() < 768) {
    __body.addClass('no-blur-effect');
  } // Bootstrap tooltip


  $('[data-toggle="tooltip"]').tooltip(); // Clicking on the tooltip applied object to cancel the tooltip

  __document.on('click', '[data-toggle="tooltip"]', function (e) {
    $(e.currentTarget).tooltip('hide');
  }); // Opening the left sidebar


  __document.on('click', '[data-left-sidebar]', function (e) {
    var target = $(e.currentTarget).data('left-sidebar'),
        sidebar = $('.left-sidebar#' + target);
    $('.left-sidebar').removeClass('open');
    sidebar.addClass('open');
    $('[data-left-sidebar]').removeClass('active');
    $('[data-left-sidebar="' + target + '"]').addClass('active');

    if ($('.story-block .story-items').length) {
      setTimeout(function () {
        $('.story-block .story-items').slick('unslick').slick({
          slidesToShow: 4,
          slidesToScroll: 1,
          arrows: false,
          rtl: __body.hasClass('rtl') ? true : false
        });
      }, 100);
    }

    return false;
  }); // Opening the right sidebar


  __document.on('click', '[data-right-sidebar]', function (e) {
    var id = $(e.currentTarget).data('right-sidebar'),
        sidebar = $('.right-sidebar#' + id); // Let's close the open panels first

    $('.right-sidebar').not(sidebar).removeClass('open'); // Let's open the panel that needs to be opened later.

    sidebar.addClass('open');
    $('[data-toggle="dropdown"]').dropdown('hide');
    $('[data-toggle="tooltip"]').tooltip('hide');
    return false;
  }); // Closing the right sidebar


  __document.on('click', '.right-sidebar-close', function (e) {
    $(e.currentTarget).closest('.right-sidebar').removeClass('open');
    return false;
  }); // Clicking anywhere to close the right sidebar


  __document.on('click', '*', function (e) {
    if (!$(e.target).is($('.right-sidebar, .right-sidebar *, [data-right-sidebar], [data-right-sidebar] *'))) {
      $('.right-sidebar').removeClass('open');
    }
  });
})(jQuery);