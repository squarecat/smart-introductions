(function () {
  'use strict';

  // Header
  var $headerLinks = $('.c-header__links');

  $('.c-header__select').on('change', function (e) {
    var page = $(e.currentTarget).val() - 1;
    // window.location.hash = $headerLinks.find('.c-header__link').eq(page).find('a').attr('href')
    window.location.href = $headerLinks.find('.c-header__link').eq(page).find('a').attr('href')
  });


  // About Us
  if($('.owl-carousel').length) {
    $('.owl-carousel').owlCarousel({
      autoPlay: true,
      navigation: false,
      slideSpeed : 300,
      paginationSpeed : 500,
      singleItem: true
    });
  }

  // Smart Way
  $('.smartway__links').on('click', '.smartway__link', function (e) {
    var $target = $(e.currentTarget);
    if($target.hasClass('smartway__link--active')) {
      $target.removeClass('smartway__link--active');
    } else {
      $('.smartway__link--active').removeClass('smartway__link--active');
      $target.toggleClass('smartway__link--active');
    }
  })

  // Register
  $('.js-register-submit').on('click', function () {
    $('.register__form').submit()
  });

  $('.js-register-clear').on('click', function () {
    $('.register__form')[0].reset()
  });

  // Contact Us
  if(window.L) {
    L.mapbox.accessToken = 'pk.eyJ1Ijoiaml2aW5ncyIsImEiOiJ6dzhhM1FJIn0.irjChrcnF1fcbBbDLvjVUQ';
    // Create a map in the div #map

    L.mapbox.map('mapbox', 'jivings.nn3l32eo')
      .setView([51.543666, -0.17535200000000373], 13);
  }

})();