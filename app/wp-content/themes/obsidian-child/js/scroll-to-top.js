// ===== Scroll to Top ====
(function($) {
    $( document ).ready(function() {
        $(window).scroll(function() {
          if ($(this).scrollTop() >= 500) {       // If page is scrolled more than 50px
              $('#return-to-top').fadeIn(200);    // Fade in the arrow
          } else {
              $('#return-to-top').fadeOut(200);   // Else fade out the arrow
          }
        });
        $('#return-to-top').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 'fast');
        });
    });
})(jQuery);

// Add touch class to body if on a touch screen
(function($) {
  $(document).ready(function() {
      var isTouchDevice = 'ontouchstart' in document.documentElement;

      if ( isTouchDevice ) {
        $('body').addClass('is-touch-device');
      }

  });
})(jQuery);

// // Open instagram gallery links after first click on mobile
// (function($) {
//   $(document).ready(function() {
//     setTimeout(function () {
//       $('.insta-gallery-item').on('touchend', function(e) {
//         if ( $(window).width() <= 768 ) {
//           var link = $(this).find('.insta-gallery-link').first().attr('href');
//           var newTab = window.open(link, '_blank');
//           newTab.focus(); // Opens in new tab
//           // window.location = link; // Opens in same tab
//         }
//       });
//     }, 4000);
//
//   });
// })(jQuery);
