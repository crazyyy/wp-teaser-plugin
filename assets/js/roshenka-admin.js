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
  /** Radio Buttons on Options Page */
  $('.snd-form-container input[type=radio]').on('click', function() {
    $('.snd-form-container input').each(function(index, el) {
      $(this).attr('checked', false);
    });
    $(this).attr('checked', true);
    var value = $(this).val();
    $('.block-type').val(value);
    $('.form-config').fadeOut('fast');
    $('.form-config').removeClass('horizontal-left').removeClass('horizontal-right').removeClass('vertical-top').removeClass('vertical-bottom').addClass(value);
    $('.form-config').fadeIn('slow');
  })

  /** Add Block */
  $('.snd-add').click(function(e) {
    e.preventDefault();
    $('.snd-form-container').fadeIn('fast');
  });
  /** Add / Chanhe Image to Block */
  $('#upload-btn').click(function(e) {
    e.preventDefault();
    var image = wp.media({
        title: 'Upload Image',
        // mutiple: true if you want to upload multiple files at once
        multiple: false
      }).open()
      .on('select', function(e) {
        // This will return the selected image from the Media Uploader, the result is an object
        var uploaded_image = image.state().get('selection').first();
        // We convert uploaded_image to a JSON object to make accessing it easier
        // Output to the console uploaded_image
        console.log(uploaded_image);
        var image_url = uploaded_image.toJSON().url;
        // Let's assign the url value to the input field
        $('#image_url').val(image_url);
        var bgi = 'url(' + image_url + ')';
        $('.image-upload').css('background-image', bgi);
      });
  });
});


/** Options Form Submitting */

/** Create Form submitt */
jQuery(document).on('click', '.snd-submit', function(event) {
  event.preventDefault(); // stop post action

  var postdata = {
    'name': jQuery('input[name=name]').val(),
    'text': jQuery('textarea[name=content]').val(),
    'url': jQuery('input[name=link]').val(),
    'image': jQuery('input[name=image_url]').val(),
    'type': jQuery('input[name=block-type]').val(),
  }

  console.log(postdata);
  jQuery.ajax({
    type: "POST",
    url: ajaxurl,
    data: {
      'action': 'snd_form_add',
      'data': postdata,
      'cache': false
    },

    beforeSend: function(data) {
      // console.log('before')
    },

    success: function(data) {
      AddNewRow(data, postdata);
      ClearForm();
      console.log('success')
    },

    error: function(data) {
      // console.log('error')
    },
  });
});

 /** append new item to table */
function AddNewRow(data, postdata) {
  var ID = data;
  var newRow = '<tr class="newest"><td>' + ID + ' ' + postdata.name + '</td><td><span class="shortcode">[sandorik id="' + ID + '" ' + postdata.name + ']</span></td><td><button class="snd-button snd-edit" title="edit ' + postdata.name + '" data-id="' + ID + '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td><td><button class="snd-button snd-remove" title="remove ' + postdata.name + '" data-id="' + ID + '"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';
  jQuery('.snd-list-blocks table').append(newRow);
}

/** Delete Row from Table */
jQuery(document).on('click', '.snd-remove', function(event) {
  event.preventDefault();

  var $parentRow = jQuery(this).parent('td').parent('tr');
  var ID = parseInt(jQuery(this).attr('data-id'));
  var removedata = {
    'id': ID
  };

  jQuery.ajax({
    type: "POST",
    url: ajaxurl,
    data: {
      'action': 'snd_form_remove',
      'data': removedata,
      'cache': false
    },

    beforeSend: function(data) {
      console.log('before')
    },

    success: function(data) {
      $parentRow.fadeOut('fast');
      console.log('success')
    },

    error: function(data) {
      console.log('error')
    },
  })
})

/** Edit Row from Table */
jQuery(document).on('click', '.snd-edit', function(event) {
  event.preventDefault();

  var $parentRow = jQuery(this).parent('td').parent('tr');
  var ID = parseInt(jQuery(this).attr('data-id'));
  var editdata = {
    'id': ID
  };
  jQuery('.snd-form-container').fadeOut('fast');

  jQuery.ajax({
    type: "POST",
    url: ajaxurl,
    data: {
      'action': 'snd_form_edit',
      'data': editdata,
      'cache': false
    },

    beforeSend: function(data) {
      console.log('before')
    },

    success: function(data) {
      $parentRow.addClass('edited-row');

      var resultData = jQuery.parseJSON(data);
      jQuery('input[name=id]').val(ID)
      jQuery('.snd-form-container input[name=name]').val(resultData.name + ' ' + ID);
      jQuery('.snd-form-container input[name=link]').val(resultData.url);
      jQuery('.snd-form-container textarea[name=content]').val(resultData.text);
      jQuery('.snd-form-container input[type=radio]').each(function(index, el) {
        jQuery(this).attr('checked', false);
      });
      var checkedTypeSelector = '.snd-form-container input[name="' + resultData.type + '"]';
      console.log(checkedTypeSelector)
      jQuery(checkedTypeSelector).attr('checked', true);
      jQuery('.snd-form-container .block-type').val(resultData.type);
      jQuery('.snd-form-container .form-config').removeClass('horizontal-left').removeClass('horizontal-right').removeClass('vertical-top').removeClass('vertical-bottom').addClass(resultData.type);

      jQuery('.snd-form-container .block-type').val(resultData.type);
      jQuery('.snd-form-container .block-type').val(resultData.type);
      jQuery('#image_url').val(resultData.image);
      var bgi = 'url(' + resultData.image + ')';
      jQuery('.image-upload').css('background-image', bgi);
      jQuery('.snd-form-container .snd-submit').addClass('snd-update').removeClass('snd-submit');
      jQuery('.snd-form-container').fadeIn('fast');

      console.log('success')
    },

    error: function(data) {
      console.log('error')
    },
  })
})

/** Update Form submitt */
jQuery(document).on('click', '.snd-update', function(event) {
  event.preventDefault(); // stop post action

  var postdata = {
    'id': jQuery('input[name=id]').val(),
    'name': jQuery('input[name=name]').val(),
    'text': jQuery('textarea[name=content]').val(),
    'url': jQuery('input[name=link]').val(),
    'image': jQuery('input[name=image_url]').val(),
    'type': jQuery('input[name=block-type]').val(),
  }

  console.log(postdata);
  jQuery.ajax({
    type: "POST",
    url: ajaxurl,
    data: {
      'action': 'snd_form_update',
      'data': postdata,
      'cache': false
    },

    beforeSend: function(data) {
      // console.log('before')
    },

    success: function(data) {
      ClearForm();
      console.log('success')
    },

    error: function(data) {
      // console.log('error')
    },
  });
});


/** Clear Form After Submit */
var ClearForm = function(){
  jQuery('.snd-form-container input[name="name"]').val('');
  jQuery('.snd-form-container input[name="link"]').val('');
  jQuery('.snd-form-container textarea[name="content"]').val('');
  jQuery('.snd-form-container').fadeOut('fast');
}
