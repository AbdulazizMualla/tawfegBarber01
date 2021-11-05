/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/admin.js ***!
  \*******************************/
(function ($) {
  "use strict";

  var fullHeight = function fullHeight() {
    $('.js-fullheight').css('height', $(window).height());
    $(window).resize(function () {
      $('.js-fullheight').css('height', $(window).height());
    });
  };

  fullHeight();
  $('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
  });
})(jQuery);

document.addEventListener('click', function (e) {
  var target = e.target;

  if (target && target.classList.contains('fa-search')) {
    getReservation();
  }
});

function getReservation() {
  var id = document.querySelector('#idReservation');
  var idTbody = document.querySelector('#idTbody').children;

  for (var i = 0; i < idTbody.length; i++) {
    var idTr = idTbody[i].children;
    console.log(idTr[0].id);

    if (idTr[0].id === id.value) {
      var idElement = idTr[0].id;
      var el = document.getElementById(idElement).parentElement;
      el.tabIndex = "-1";
      el.focus();
      el.scrollIntoView(idElement);
    }
  }
}

function scrollIntoView(eleID) {
  var e = document.getElementById(eleID);

  if (!!e && e.scrollIntoView) {
    e.scrollIntoView();
  }
}
/******/ })()
;