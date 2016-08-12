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

/*
jQuery(document).ready(function() {

  jQuery(".snd-submit").click(function() {
    var name = jQuery("#dname").val();
    jQuery.ajax({
      type: 'POST', // Adding Post method
      url: MyAjax.ajaxurl, // Including ajax file
      data: {
        "action": "post_word_count",
        "dname": name
      }, // Sending data dname to post_word_count function.
      success: function(data) { // Show returned data using the function.
        alert(data);
      }
    });
  });

});

*/
/*
(function($) {
  $(document).ready(function() {
    $('.snd-submit').click(function() {
      $.post(
        PT_Ajax.ajaxurl, {
          // wp ajax action
          action: 'ajax-inputtitleSubmit',

          // vars
          name: $('input[name=name]').val(),
          link: $('input[name=link]').val(),
          content: $('textarea').val(),
          type: $("input:checked").val(),

          // send the nonce along with the request
          nextNonce: PT_Ajax.nextNonce
        },
        function(response) {
          console.log(response);
        }
      );
      return false;
    });

  });
})(jQuery);
*/


/*
function qc_process(e){
  var data = {
      action: "my_qc_form",
      name: e["name"].value,
      email:e["email"].value,
      message:e["message"].value
  };
  jQuery.post("'.admin_url("admin-ajax.php").'", data, function(response) {
      jQuery("#qc_form").html(response);
  });
}
*/


jQuery(document).on('click', '.snd-button', function(event){
  event.preventDefault(); // stop post action

  var postdata = {
    'name' : jQuery('input[name=name]').val(),
    'text' : jQuery('textarea[name=content]').val(),
    'url' : jQuery('input[name=link]').val(),
  }

  jQuery.ajax({
    type: "POST",
    url: ajaxurl,
    data: {
      'action': 'ajax_form',
      'data': postdata,
      'cache': false
    },

    beforeSend: function(data) {
      console.log(data);
      console.log('before')
    },

    success: function(data){
      console.log(data);
      console.log('success')
    },

    error: function(data){
      console.log(data);
      console.log('error')
    },
  });


});
