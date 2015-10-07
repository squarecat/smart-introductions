(function () {
  'use strict';

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

})();