(function () {
  'use strict';

  $('.js-register-submit').on('click', function () {
    $('.register__form').submit()
  })

  $('.js-register-clear').on('click', function () {
    $('.register__form').clear()
  })

})();