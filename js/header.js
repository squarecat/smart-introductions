(function () {
  'use strict';

  var $headerLinks = $('.c-header__links');
  
  $('.c-header__select').on('change', function (e) {
    var page = $(e.currentTarget).val() - 1;
    window.location.hash = $headerLinks.find('.c-header__link').eq(page).find('a').attr('href')
  });

})();