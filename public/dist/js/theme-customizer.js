/**
 *
 *  Project name: Tinno - HTML5 Chat App Template
 *
 *  File name: theme-customizer.js
 *
 *  Description: This is a theme customization file.
 *
 *  Autor: Laborasyon
 *
 *  Portfolio: https://themeforest.net/user/laborasyon/portfolio
 *
 */
'use strict';

var introJsInit = function introJsInit() {
  introJs().setOptions({
    steps: [{
      element: document.querySelector('[data-intro-js="1"]'),
      intro: 'Start a chat, create groups or add friends.',
      position: 'right'
    }, {
      element: document.querySelector('[data-intro-js="2"]'),
      intro: "See the chat list."
    }, {
      element: document.querySelector('[data-intro-js="3"]'),
      intro: "Manage your account"
    }, {
      element: document.querySelector('[data-intro-js="4"]'),
      intro: "Check out other people\'s stories!"
    }, {
      element: document.querySelector('[data-intro-js="5"]'),
      intro: "Choose a chat."
    }, {
      element: document.querySelector('[data-intro-js="6"]'),
      intro: "Send messages in the chat."
    }, {
      element: document.querySelector('[data-intro-js="7"]'),
      intro: "Check out other operations."
    }]
  }).setOption("disableInteraction", true).start();
};

(function ($) {
  var __document = $(document);

  var __window = $(window);

  var __body = $('body');

  var demo = window.location.search;
  demo = demo.replace('?demo=', '');

  __window.on('load', function () {
    if (demo === 'disconnect') {
      setTimeout(function () {
        return $('#disconnected').modal('show');
      }, 1300);
    } else if (demo === 'add-group') {
      setTimeout(function () {
        return $('#newGroup').modal('show');
      }, 1300);
    } else if (demo === 'invite-users') {
      setTimeout(function () {
        return $('#intiveUsers').modal('show');
      }, 1300);
    } else if (demo === 'edit-profile') {
      setTimeout(function () {
        return $('#editProfile').modal('show');
      }, 1300);
    } else if (demo === 'settings') {
      setTimeout(function () {
        return $('#settingsModal').modal('show');
      }, 1300);
    } else if (demo === 'call-reguest') {
      setTimeout(function () {
        return $('#videoCallRequest').modal('show');
      }, 1300);
    } else if (demo === 'video-call') {
      setTimeout(function () {
        $('#videoCall').modal('show');
        $('.chat-stopwatch').stopwatch().stopwatch('start');
      }, 1300);
    } else if (demo === 'voice-call') {
      setTimeout(function () {
        $('#voiceCall').modal('show');
        $('.chat-stopwatch').stopwatch().stopwatch('start');
      }, 1300);
    } else if (demo === 'disconnected') {
      setTimeout(function () {
        return $('#disconnected').modal('show');
      }, 1300);
    } else if (demo === 'dark') {
      __body.addClass('dark');
    } else if (demo === 'rtl') {
      __body.addClass('rtl');
    } else if (demo === 'page-tour') {
      setTimeout(function () {
        return introJsInit();
      }, 1300);
    }
  });

  var theme_customizer_html = "<div class=\"theme-customizer\">\n    <div class=\"theme-customizer-button\">\n        <button class=\"theme-customizer-toggle\" title=\"Theme Customizer\">\n            <i class=\"mdi mdi-cog spin\"></i>\n        </button>\n        <button onclick=\"window.location.href='http://laborasyon.com/demo/tinno'\" title=\"Demos\">\n            <i class=\"mdi mdi-vector-arrange-below\"></i>\n        </button>\n        <button title=\"Purchase Now\">\n            <i class=\"mdi mdi-basket-outline\"></i>\n        </button>\n    </div>\n    <div class=\"theme-customizer-body\">\n        <h4 class=\"mb-5\">Theme Customizer</h4> \n        <div class=\"mb-4\">\n            <p>Theme Colors</p>\n            <div class=\"theme-colors\">\n                <a href=\"#\" title=\"Default\" data-color=\"default\" class=\"selected\" style=\"background-color: #ff5252\"></a>\n                <a href=\"#\" title=\"Green\" data-color=\"green\" style=\"background-color: #20c345\"></a>\n                <a href=\"#\" title=\"Purple\" data-color=\"purple\" style=\"background-color: #6610f2\"></a>\n                <a href=\"#\" title=\"Blue\" data-color=\"blue\" style=\"background-color: #0f79fd\"></a>\n                <a href=\"#\" title=\"Orange\" data-color=\"orange\" style=\"background-color: #ff8d4b\"></a>\n            </div>\n        </div>\n        <div class=\"mb-4\">\n            <p>Layouts</p>\n            <div class=\"d-flex\">";

  if (typeof LANDING_PAGE === 'undefined') {
    theme_customizer_html += "<div class=\"custom-control custom-switch mr-4\">\n            <input type=\"checkbox\" class=\"custom-control-input\" " + (__body.hasClass('dark') || demo === 'dark' ? 'checked' : '') + " id=\"switchDark\">\n            <label class=\"custom-control-label\" for=\"switchDark\">Dark</label>\n        </div>";
  }

  theme_customizer_html += "<div class=\"custom-control custom-switch\">\n                <input type=\"checkbox\" class=\"custom-control-input\" " + (__body.hasClass('rtl') || demo === 'rtl' ? 'checked' : '') + " id=\"switchRtl\">\n                <label class=\"custom-control-label\" for=\"switchRtl\">RTL</label>\n            </div>\n        </div>\n    </div>\n    <div class=\"mb-4\">";

  if (typeof LANDING_PAGE !== 'undefined') {
    theme_customizer_html += "<p>Chat App</p>\n        <p>\n            <a href=\"../../chat.html\">\n                <img src=\"../../dist/media/img/chat-app.jpg\" class=\"img-fluid img-thumbnail\" alt=\"...\">\n            </a>\n        </p>";
  } else {
    theme_customizer_html += "<p>Landing Page</p>\n        <p>\n            <a href=\"../../index.html\">\n                <img src=\"../../dist/media/img/tinno-landing-page.jpg\" class=\"img-fluid img-thumbnail\" alt=\"...\">\n            </a>\n        </p>";
  }

  theme_customizer_html += "</div></div>";

  __body.append(theme_customizer_html);

  __document.on('click', '.theme-customizer-toggle', function () {
    $('.theme-customizer').toggleClass('open');
    return false;
  });

  __document.on('click', '#switchDark', function (e) {
    var dark_status = $(e.currentTarget).prop('checked');
    dark_status ? window.location.href = window.location.origin + window.location.pathname + '?demo=dark' : window.location.href = window.location.origin + window.location.pathname;
  });

  __document.on('click', '#switchRtl', function (e) {
    var rtl_status = $(e.currentTarget).prop('checked');
    rtl_status ? window.location.href = window.location.origin + window.location.pathname + '?demo=rtl' : window.location.href = window.location.origin + window.location.pathname;
  });

  __document.on('click', '.theme-customizer .theme-colors a', function (e) {
    $('.theme-customizer .theme-colors a').removeClass('selected');
    $(e.currentTarget).addClass('selected');
    var color = $(e.currentTarget).data('color');
    $('[data-theme-color]').remove();

    if (color !== 'default') {
      if (typeof LANDING_PAGE !== 'undefined') {
        $('head').append('<link href="./dist/css/landing-page-' + color + '.min.css" data-theme-color rel="stylesheet">');
      } else {
        $('head').append('<link href="./dist/css/app-' + color + '.min.css" data-theme-color rel="stylesheet">');
      }
    }

    return false;
  });
})(jQuery);