function AddNewRow(e,n){var a=e,t='<tr class="newest"><td>'+a+" "+n.name+'</td><td><span class="shortcode">[sandorik id="'+a+'" '+n.name+']</span></td><td><button class="snd-button snd-edit" title="edit '+n.name+'" data-id="'+a+'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td><td><button class="snd-button snd-remove" title="remove '+n.name+'" data-id="'+a+'"><i class="fa fa-trash" aria-hidden="true"></i></button></td></tr>';jQuery(".snd-list-blocks table").append(t)}!function(){for(var e,n=function(){},a=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeline","timelineEnd","timeStamp","trace","warn"],t=a.length,r=window.console=window.console||{};t--;)e=a[t],r[e]||(r[e]=n)}(),"undefined"==typeof jQuery?console.warn("jQuery hasn't loaded"):console.log("jQuery has loaded"),jQuery(document).ready(function(e){e(".snd-form-container input[type=radio]").on("click",function(){e(".snd-form-container input").each(function(n,a){e(this).attr("checked",!1)}),e(this).attr("checked",!0);var n=e(this).val();e(".block-type").val(n),e(".form-config").fadeOut("fast"),e(".form-config").removeClass("horizontal-left").removeClass("horizontal-right").removeClass("vertical-top").removeClass("vertical-bottom").addClass(n),e(".form-config").fadeIn("slow")}),e(".snd-add").click(function(n){n.preventDefault(),e(".snd-form-container").fadeIn("fast")}),e("#upload-btn").click(function(n){n.preventDefault();var a=wp.media({title:"Upload Image",multiple:!1}).open().on("select",function(n){var t=a.state().get("selection").first();console.log(t);var r=t.toJSON().url;e("#image_url").val(r);var o="url("+r+")";e(".image-upload").css("background-image",o)})})}),jQuery(document).on("click",".snd-submit",function(e){e.preventDefault();var n={name:jQuery("input[name=name]").val(),text:jQuery("textarea[name=content]").val(),url:jQuery("input[name=link]").val(),image:jQuery("input[name=image_url]").val(),type:jQuery("input[name=block-type]").val()};console.log(n),jQuery.ajax({type:"POST",url:ajaxurl,data:{action:"snd_form_add",data:n,cache:!1},beforeSend:function(e){},success:function(e){AddNewRow(e,n),ClearForm(),console.log("success")},error:function(e){}})}),jQuery(document).on("click",".snd-remove",function(e){e.preventDefault();var n=jQuery(this).parent("td").parent("tr"),a=parseInt(jQuery(this).attr("data-id")),t={id:a};jQuery.ajax({type:"POST",url:ajaxurl,data:{action:"snd_form_remove",data:t,cache:!1},beforeSend:function(e){console.log("before")},success:function(e){n.fadeOut("fast"),console.log("success")},error:function(e){console.log("error")}})}),jQuery(document).on("click",".snd-edit",function(e){e.preventDefault();var n=jQuery(this).parent("td").parent("tr"),a=parseInt(jQuery(this).attr("data-id")),t={id:a};jQuery(".snd-form-container").fadeOut("fast"),jQuery.ajax({type:"POST",url:ajaxurl,data:{action:"snd_form_edit",data:t,cache:!1},beforeSend:function(e){console.log("before")},success:function(e){n.addClass("edited-row");var t=jQuery.parseJSON(e);jQuery("input[name=id]").val(a),jQuery(".snd-form-container input[name=name]").val(t.name+" "+a),jQuery(".snd-form-container input[name=link]").val(t.url),jQuery(".snd-form-container textarea[name=content]").val(t.text),jQuery(".snd-form-container input[type=radio]").each(function(e,n){jQuery(this).attr("checked",!1)});var r='.snd-form-container input[name="'+t.type+'"]';console.log(r),jQuery(r).attr("checked",!0),jQuery(".snd-form-container .block-type").val(t.type),jQuery(".snd-form-container .form-config").removeClass("horizontal-left").removeClass("horizontal-right").removeClass("vertical-top").removeClass("vertical-bottom").addClass(t.type),jQuery(".snd-form-container .block-type").val(t.type),jQuery(".snd-form-container .block-type").val(t.type),jQuery("#image_url").val(t.image);var o="url("+t.image+")";jQuery(".image-upload").css("background-image",o),jQuery(".snd-form-container .snd-submit").addClass("snd-update").removeClass("snd-submit"),jQuery(".snd-form-container").fadeIn("fast"),console.log("success")},error:function(e){console.log("error")}})}),jQuery(document).on("click",".snd-update",function(e){e.preventDefault();var n={id:jQuery("input[name=id]").val(),name:jQuery("input[name=name]").val(),text:jQuery("textarea[name=content]").val(),url:jQuery("input[name=link]").val(),image:jQuery("input[name=image_url]").val(),type:jQuery("input[name=block-type]").val()};console.log(n),jQuery.ajax({type:"POST",url:ajaxurl,data:{action:"snd_form_update",data:n,cache:!1},beforeSend:function(e){},success:function(e){ClearForm(),console.log("success")},error:function(e){}})});var ClearForm=function(){jQuery('.snd-form-container input[name="name"]').val(""),jQuery('.snd-form-container input[name="link"]').val(""),jQuery('.snd-form-container textarea[name="content"]').val(""),jQuery(".snd-form-container").fadeOut("fast")};
//# sourceMappingURL=maps/roshenka-admin.js.map
