/**
 *
 *  Project name: Tinno - HTML5 Chat App Template
 *
 *  File name: landing-page.js
 *
 *  Autor: Laborasyon
 *
 *  Portfolio: https://themeforest.net/user/laborasyon/portfolio
 *
 */
'use strict';

(function ($) {
  var __body = $('body');

  if ($('.customers-feedback').length) {
    $('.customers-feedback').slick({
      infinite: true,
      slidesToShow: 3,
      slidesToScroll: 3,
      rtl: __body.hasClass('rtl') ? true : false,
      responsive: [{
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      }, {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }]
    });
  }

  if (__body.hasClass('rtl')) {
    $('.mdi-arrow-right').addClass('mdi-arrow-left').removeClass('mdi-arrow-right');
  }

  $(document).on('click', '[name="priceChangeSwitch"]', function (e) {
    var prices = {
      'monthly': [99, 199],
      'yearly': [199, 399]
    };

    if ($(e.currentTarget).val() == 1) {
      $('[data-price1-text]').text('$' + prices.monthly[0]);
      $('[data-price2-text]').text('$' + prices.monthly[1]);
      $('[data-price1-label], [data-price2-label]').text('Monthly');
    } else if ($(e.currentTarget).val() == 2) {
      $('[data-price1-text]').text('$' + prices.yearly[0]);
      $('[data-price2-text]').text('$' + prices.yearly[1]);
      $('[data-price1-label], [data-price2-label]').text('Yearly');
    }
  });
  typeof AOS != 'undefined' ? AOS.init() : '';
})(jQuery);