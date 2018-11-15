'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

var Drawer = function () {
  function Drawer() {
    var open = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '#js-hamburger-button';

    _classCallCheck(this, Drawer);

    this.open = open;
  }

  _createClass(Drawer, [{
    key: 'setEvent',
    value: function setEvent() {
      $(this.open).on('click.drawer', function (e) {
        if (!$(e.currentTarget).hasClass('is-opened')) {
          $(e.currentTarget).addClass('is-opened');
          $('#js-drawer-nav').attr('aria-hidden', false).attr('aria-expanded', true);
        } else {
          $(e.currentTarget).removeClass('is-opened');
          $('#js-drawer-nav').attr('aria-hidden', true).attr('aria-expanded', false);
        }
      });
    }
  }]);

  return Drawer;
}();

var drawer = new Drawer();
drawer.setEvent();

var Gnavi = function () {
  function Gnavi() {
    var navi = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.gnavi__item';

    _classCallCheck(this, Gnavi);

    this.navi = navi;
  }

  _createClass(Gnavi, [{
    key: 'setEvent',
    value: function setEvent() {
      $(this.navi).on('mouseenter.gnavi', function () {
        if ($(this).children('.gnavi__child')[0]) {
          $(this).children('.gnavi__child').addClass('is-active');
        }
      }).on('mouseleave.gnavi', function () {
        if ($(this).children('.gnavi__child')[0]) {
          $(this).children('.gnavi__child').removeClass('is-active');
        }
      });
    }
  }]);

  return Gnavi;
}();

var gnavi = new Gnavi();
gnavi.setEvent();

var GnaviCurrent = function () {
  function GnaviCurrent() {
    var navi = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : '.gnavi__item';

    _classCallCheck(this, GnaviCurrent);

    this.navi = navi;
  }

  _createClass(GnaviCurrent, [{
    key: 'setEvent',
    value: function setEvent() {
      var path = location.pathname;
      var pathArray = path.split('/').splice(1);
      $(this.navi).find('a[href="/' + pathArray[0] + '"]').addClass('is-current');
    }
  }]);

  return GnaviCurrent;
}();

var gnavicur = new GnaviCurrent();
gnavicur.setEvent();

var smoothscroll = function () {
  function smoothscroll() {
    var target = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 'a[href^="#"]';

    _classCallCheck(this, smoothscroll);

    this.target = target;
  }

  _createClass(smoothscroll, [{
    key: 'setEvent',
    value: function setEvent() {
      $(this.target).on('click.smoothScroll', function (e) {
        e.preventDefault();
        var href = $(this).attr('href');
        var target = $('#pagetop' === href || '' === href ? 'html' : href);
        var speed = 500;
        var position = target.offset().top;

        $('body, html').animate({
          scrollTop: position
        }, speed, 'swing');
      });
    }
  }]);

  return smoothscroll;
}();

var smscroll = new smoothscroll();
smscroll.setEvent();