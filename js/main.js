(function () {
  'use strict';

  // Header
  var $headerLinks = $('.c-header__links');

  $('.c-header__select').on('change', function (e) {
    var page = $(e.currentTarget).val() - 1;
    window.location.hash = $headerLinks.find('.c-header__link').eq(page).find('a').attr('href')
  });


  // Smart Way
  $('.smartway__links').on('click', '.smartway__link', function (e) {
    var $target = $(e.currentTarget);
    if($target.hasClass('smartway__link--active')) {
      $target.removeClass('smartway__link--active');
    }
    else{
      $('.smartway__link--active').removeClass('smartway__link--active');
      $target.toggleClass('smartway__link--active');
    }
  })


  // Register
  $('.js-register-submit').on('click', function () {
    $('.register__form').submit()
  });

  $('.js-register-clear').on('click', function () {
    $('.register__form').clear()
  });

})();