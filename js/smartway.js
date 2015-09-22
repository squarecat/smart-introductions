(function () {
  'use strict';

  $('.smartway__links').on('click', '.smartway__link', function (e) {
    $('.smartway__link--active').removeClass('smartway__link--active');
    $(e.currentTarget).addClass('smartway__link--active');
  })
  

})();