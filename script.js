(function($){

  // Scrolling with animation for header menu
  var kc_scroll_position = 0;
  $(document).scroll(function() {
    kc_scroll_position = $(this).scrollTop();
    if(kc_scroll_position > 160) {
      $("body").addClass('is-scrolled');
    } else {
      $("body").removeClass('is-scrolled');
    }
  });

  // Cache the window object
  var $window = $(window);

  // Parallax background effect
  // from: Udemy - Course by Brad Hussey, from this tutorial:
  // https://code.tutsplus.com/tutorials/a-simple-parallax-scrolling-technique--net-27641
  $('section[data-type="background"]').each(function() {

    var $bgobj = $(this); // assigning the object

    $(window).scroll(function() {

      // scroll the background at var speed
      // the yPos is a negative value because we're scrolling it UP!

      var yPos = -($window.scrollTop() / $bgobj.data('speed'));

      // Put toghether our final background position
      var coords = '50%' + yPos + 'px';

      // Move the background
      $bgobj.css({ backgroundPosition: coords });

    }); // end window scroll
  });

  // Smooth scrolling when clicking an anchor link

  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();

      document.querySelector(this.getAttribute('href')).scrollIntoView({
        behavior: 'smooth'
      });
    });
  });
  // Smooth scrolling for older browser support
  $(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
      scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
  });

  // Magnific popup by Dmitry Semenov for video gallery
  $('.popup-youtube, .popup-vimeo, .popup-video').magnificPopup({
    type: 'iframe',
    iframe: {
      markup: '<div class="mfp-iframe-scaler">'+
        '<div class="mfp-close"></div>'+
        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
        '<div class="mfp-title">Some caption</div>'+
      '</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: 'v=',
          src: '//www.youtube.com/embed/%id%?autoplay=1&showinfo=0&rel=0'
        },
        vimeo: {
          index: 'vimeo.com/',
          id: '/',
          src: '//player.vimeo.com/video/%id%?autoplay=1&title=0&byline=0&portrait=0'
        }
      },
      srcAction: 'iframe_src',
    },
    callbacks: {
      markupParse: function(template, values, item) {
        values.title = item.el.attr('title');
      }
    },

  gallery:{enabled:true},

  });

  // Magnific popup by Dmitry Semenov for image gallery
  $('.gallery').each(function() { // the containers for all your galleries
    $(this).magnificPopup({
      delegate: 'a', // the selector for gallery item
      type: 'image',
      gallery: {
        enabled:true
      }
    });
  });


  // Slider Siema dal framework Alux

  var next = document.querySelector(".container-siema__next");
  var prev = document.querySelector(".container-siema__prev");
  var slideCount = document.querySelector(".siema").children.length - 1;

  var mySiema = new Siema({
    loop: true,
  });

  prev.addEventListener("click", function () {
    return mySiema.prev();
  });

  next.addEventListener("click", function () {
    return mySiema.next();
  });


}(jQuery));
