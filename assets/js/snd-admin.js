// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function() {};
  var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());
if (typeof jQuery === 'undefined') {
  console.warn('jQuery hasn\'t loaded');
} else {
  console.log('jQuery has loaded');
}
// Place any jQuery/helper plugins in here.

jQuery(document).ready(function($) {
  jQuery('.snd-form-container input[type=radio]').on('click', function() {
    $('.snd-form-container input').each(function(index, el) {
      $(this).attr('checked', false);
    });
    $(this).attr('checked', true);
    var value = $(this).val();
    $('.form-config').fadeOut('fast');
    $('.form-config').removeClass('horizontal-left').removeClass('horizontal-right').removeClass('vertical-top').removeClass('vertical-bottom').addClass(value);
    $('.form-config').fadeIn('slow');

  })
});
