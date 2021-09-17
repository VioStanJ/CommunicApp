/**
 *
 *  Project name: Tinno - HTML5 Chat App Template
 *
 *  File name: example.js
 *
 *  Description: It contains some examples of the use of the item.
 *
 *  Autor: Laborasyon
 *
 *  Portfolio: https://themeforest.net/user/laborasyon/portfolio
 *
 */
'use strict';

var _this = void 0;

(function ($) {
  var __document = $(document);

  var __window = $(window);

  $('.story-block .story-items').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    rtl: $('body').hasClass('rtl') ? true : false
  });

  __document.on('click', '.example-delete-chat', function (e) {
    var chat_card = $(e.target).closest('li');
    Swal.fire({
      title: 'Do you want to delete the chat?',
      showCancelButton: true,
      confirmButtonText: 'Delete',
      animation: false
    }).then(function (result) {
      if (result.isConfirmed) {
        if (chat_card.hasClass('active')) {
          selected_close_chat();
        }

        chat_card.slideUp(200, function () {
          chat_card.remove();
        });
      }
    });
    return false;
  });

  __document.on('click', '.example-delete-message', function (e) {
    var message_card = $(e.target).closest('.message-item');
    Swal.fire({
      title: 'Do you want to delete the message?',
      showCancelButton: true,
      confirmButtonText: 'Delete from me',
      animation: false
    }).then(function (result) {
      if (result.isConfirmed) {
        ps_chat_content.update();
        message_card.remove();
      }
    });
    return false;
  });

  __document.on('click', '.example-block-user', function () {
    Swal.fire({
      title: 'Do you want to block this user?',
      showCancelButton: true,
      confirmButtonText: 'Block',
      animation: false
    }).then(function (result) {
      if (result.isConfirmed) {
        Swal.fire('Blocked!', '', 'success');
      }
    });
    return false;
  });

  __document.on('click', '.video-call-request', function () {
    $('#videoCallRequest').modal('show');
    return false;
  });

  __document.on('click', '.video-call-request-accept', function () {
    $('#videoCallRequest').modal('hide');
    setTimeout(function () {
      $('#videoCall').modal('show');
      $('.chat-stopwatch').stopwatch().stopwatch('start');
    }, 500);
    return false;
  });

  __document.on('click', '.voice-call-request', function () {
    $('#voiceCallRequest').modal('show');
    return false;
  });

  __document.on('click', '.voice-call-accept', function () {
    $('#voiceCallRequest').modal('hide');
    setTimeout(function () {
      $('#voiceCall').modal('show');
      $('.chat-stopwatch').stopwatch().stopwatch('start');
    }, 500);
    return false;
  });

  __document.on('click', '.mute-event', function () {
    $(_this).find('svg').replaceWith(feather.icons['volume-x'].toSvg());
    $(_this).removeClass('mute-event');
    $(_this).addClass('unmute-event');
  });

  __document.on('click', '.unmute-event', function () {
    $(_this).find('svg').replaceWith(feather.icons['volume-2'].toSvg());
    $(_this).removeClass('unmute-event');
    $(_this).addClass('mute-event');
  });

  var send_message = function send_message(msg) {
    if (msg.type === 'in-typing') {
      $('.messages').append("<div class=\"message-item in in-typing\">\n                <div class=\"message-content\">\n                    <div class=\"message-text\">\n                        <div class=\"writing-animation\">\n                            <div class=\"writing-animation-line\"></div>\n                            <div class=\"writing-animation-line\"></div>\n                            <div class=\"writing-animation-line\"></div>\n                        </div>\n                    </div>\n                </div>\n            </div>");
    } else {
      $('.messages .message-item.in-typing').remove();
      $('.messages').append("<div class=\"message-item " + msg.type + "\">\n                <div class=\"message-avatar\">\n                    <figure class=\"avatar avatar-sm\">\n                        <img src=\"./dist/media/img/" + msg.avatar + "\" class=\"rounded-circle\" alt=\"image\">\n                    </figure>\n                    <div>\n                        <h5>" + msg.name + "</h5>\n                        <div class=\"time\">\n                            Now\n                            " + (msg.type === 'out' ? "<i class=\"ti-double-check text-info\"></i>" : "") + "\n                        </div>\n                    </div>\n                </div>\n                <div class=\"message-content\">\n                    <div class=\"message-text\">" + msg.text + "</div>\n                    <div class=\"dropdown\">\n                        <a href=\"#\" data-toggle=\"dropdown\">\n                            <i class=\"mdi mdi-dots-horizontal\"></i>\n                        </a>\n                        <div class=\"dropdown-menu dropdown-menu-right\">\n                            <a href=\"#\" class=\"dropdown-item\">Reply</a>\n                            <a href=\"#\" class=\"dropdown-item\">Forward</a>\n                            <a href=\"#\" class=\"dropdown-item\">Copy</a>\n                            <a href=\"#\" class=\"dropdown-item\">Starred</a>\n                            <a href=\"#\" class=\"dropdown-item example-delete-message\">Delete</a>\n                        </div>\n                    </div>\n                </div>\n            </div>");
    }
  };

//   __document.on('submit', '.chat .chat-footer form', function (e) {
//     e.preventDefault();
//     var input = $(e.target).find('input[type=text].form-control-main');
//     var message = input.val();
//     message = $.trim(message);

//     if (message) {
//       send_message({
//         type: 'out',
//         text: message,
//         avatar: 'avatar9.jpg',
//         name: 'Matteo Reedy'
//       });
//       input.val('');
//       $('.chat .chat-body').scrollTop($('.chat .chat-body')[0].scrollHeight);
//       setTimeout(function () {
//         send_message({
//           type: 'in-typing',
//           text: 'Hi, do you like this template?',
//           avatar: 'avatar2.jpg',
//           name: 'Maribel Mallon'
//         });
//         $('.chat .chat-body').scrollTop($('.chat .chat-body')[0].scrollHeight);
//       }, 1000);
//       setTimeout(function () {
//         send_message({
//           type: 'in',
//           text: 'Hi, do you like this template?',
//           avatar: 'avatar6.jpg',
//           name: 'Maribel Mallon'
//         });
//         $('.chat .chat-body').scrollTop($('.chat .chat-body')[0].scrollHeight);
//       }, 3000);
//     } else {
//       input.focus();
//     }
//   });

  __document.on('click', '.chat-emojis ul li', function () {
    var emoji = $(this).text();
    var input = $('.chat .chat-footer .form-control.form-control-main');
    input.val(input.val() + ' ' + emoji + ' ').focus();
  });

//   __document.on('click', '.left-sidebar .list-group .list-group-item', function (e) {
//     $('.chat').addClass('no-message');
//     $('.no-message-container').addClass('d-none');
//     $('.chat-preloader').removeClass('d-none');
//     $('.left-sidebar .list-group .list-group-item').removeClass('active');
//     $(e.currentTarget).addClass('active').removeClass('unread-chat').find('.new-message-count').remove();
//     setTimeout(function () {
//       $('.chat').addClass('open').removeClass('no-message');
//       $('.no-message-container').removeClass('d-none');
//       $('.chat-preloader').addClass('d-none');
//       $('.chat .chat-body').scrollTop($('.chat .chat-body')[0].scrollHeight);
//     }, 500);
//     return false;
//   });

  __document.on('click', '.example-close-selected-chat', function () {
    return selected_close_chat();
  }); // Turn off selected chat content on mobile


  __document.on('click', '.example-chat-close', function () {
    selected_close_chat();
    return false;
  });

  $(".chat .chat-body .messages .message-item .message-content-images a").fancybox();

  __document.on('click', '.example-app-tour-start', function () {
    introJsInit();
    $('[data-toggle="dropdown"]').dropdown('hide');
    return false;
  });

  var selected_close_chat = function selected_close_chat() {
    $('.left-sidebar .list-group .list-group-item').removeClass('active');
    $('.chat').addClass('no-message').removeClass('open');
  };

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
})(jQuery);
