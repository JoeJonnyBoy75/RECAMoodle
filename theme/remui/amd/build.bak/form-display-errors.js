"use strict";define(["jquery","core/event"],function(a,e){return{enhance:function(t){var i=document.getElementById(t);a(i).on(e.Events.FORM_FIELD_VALIDATION,function(e,t){e.preventDefault();var r=a(i).closest(".form-group"),n=r.find(".form-control-feedback");"TEXTAREA"==a(i).prop("tagName")&&r.find("[contenteditable]")&&(i=r.find("[contenteditable]")),""!==t?(r.addClass("has-danger"),r.data("client-validation-error",!0),a(i).addClass("is-invalid"),a(i).attr("aria-describedby",n.attr("id")),a(i).attr("aria-invalid",!0),n.attr("tabindex",0),n.html(t),n.is(":visible")||(n.show(),n.focus())):!0===r.data("client-validation-error")&&(r.removeClass("has-danger"),r.data("client-validation-error",!1),a(i).removeClass("is-invalid"),a(i).removeAttr("aria-describedby"),a(i).attr("aria-invalid",!1),n.hide())})}}});