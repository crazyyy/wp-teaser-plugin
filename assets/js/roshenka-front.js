if (typeof jQuery === 'undefined') {
  console.warn('jQuery hasn\'t loaded');
} else {
  console.log('jQuery has loaded');
}
var $ = jQuery;

// $(window).scroll(function() {
//   var $widget = $(".roshenka");
//   var window_offset = $widget.offset().top - $(window).scrollTop();
//   if ( window_offset <= 0 ) {
//     $widget.css({
//       position: 'fixed',
//       top: '0'
//     });
//   } else {
//     $widget.css({
//       position: 'relative',
//       top: 'auto'
//     });
//   }
//   console.log(window_offset);
// });
