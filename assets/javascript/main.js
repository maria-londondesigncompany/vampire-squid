$(function () {
  $('.slick').each(function () {
    var slidesToShow = $(this).data('slides-to-show') || 3;

    var options = {
      infinite: true,
      arrows: true,
      slidesToShow,
      slidesToScroll: 1,
      dots: $(this).data('append-dots') !== false,
      variableWidth: $(this).data('variable-width') || false,
      autoplay: $(this).data('ride') || false,
      appendArrows: $(this).data('append-arrows') && $($(this).data('append-arrows')) || $(this),
      appendDots: $(this).data('append-dots') && $($(this).data('append-dots')) || $(this).data('append-dots') !== false && $(this),

      responsive: [
        {
          breakpoint: 991,
          settings: {
            slidesToShow: slidesToShow > 1 ? --slidesToShow : slidesToShow,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: slidesToShow > 1 ? --slidesToShow : slidesToShow,
            slidesToScroll: 1
          }
        },
      ]
    };

    if($(this).data('slick'))
    {
      Object.assign(options, $(this).data('slick'));
    }

    $(this).slick(options);
  });
});

$(window).on('load', function () {
  $('video.d-none + picture').each(function () {
    var $image = $(this);

    $(this).prev().each(function () {
      this.oncanplaythrough = function () {
        $image.addClass('d-none');
        $(this).removeClass('d-none');
        this.play();
      };

      this.load();
    });
  })
});

$(window).scroll(function () {
  var scroll = window.scrollY || window.pageYOffset;

  $('body').toggleClass('scrolled-to-top', scroll == 0 && $('main > .mega:first-child > section:first-child.block-hero').length > 0);
});

$(function () {
  $(window).scroll();
});

$(document).on('show.bs.collapse', '#navbarCollapse', function( event ) {
  $('body').addClass('menu-open');
});

$(document).on('hidden.bs.collapse', '#navbarCollapse', function( event ) {
  $('body').removeClass('menu-open');
});

