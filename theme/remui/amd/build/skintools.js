!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e:e(jQuery)}(function(s){"use strict";var n=s(".site-menubar"),a=s(".site-navbar"),i=s(".site-footer"),t=(s(".site-navbar"),"bg-primary-600 bg-brown-600 bg-cyan-600 bg-green-600 bg-grey-600 bg-indigo-600 bg-orange-600 bg-pink-600 bg-purple-600 bg-red-600 bg-teal-600 bg-yellow-800 bg-customcolor-600");function r(e,o){if(/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i.test(n=o))var n="customcolor";s.ajax({type:"GET",async:!0,url:M.cfg.wwwroot+"/theme/remui/request_handler.php?action=set_setting_ajax&configname="+e+"&configvalue="+n+"&sesskey="+M.cfg.sesskey,success:function(e){console.log("saved")}}),"sitecolor"==e&&(o="primary"==o?"62a8ea":"brown"==o?"8d6658":"cyan"==o?"57c7d4":"green"==o?"46be8a":"grey"==o?"757575":"indigo"==o?"677ae4":"orange"==o?"f2a654":"pink"==o?"f96197":"purple"==o?"926dde":"red"==o?"f96868":"teal"==o?"3aa99e":"yellow"==o?"e98f2e":o.replace("#",""),s.ajax({type:"GET",async:!0,url:M.cfg.wwwroot+"/theme/remui/request_handler.php?action=set_setting_ajax&configname=sitecolorhex&configvalue="+o+"&sesskey="+M.cfg.sesskey,success:function(e){console.log("saved")}}))}function e(e){var o=s(e).val();!function(e){/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/i.test(e)&&(e="customcolor");var o="bg-"+e+"-600";"yellow"===e&&(o="bg-yellow-800");a.removeClass(t).addClass(o),i.removeClass(t).addClass(o)}(o),r("sitecolor",o)}s(document).on("click","#skintoolsSidebar input",function(){!function(e){var o=s(e).val();(function(e){"site-menubar-light"===e?n.addClass(e):n.removeClass("site-menubar-light")})(o),r("sidebarcolor",o)}(this)}),s(document).on("click","#skintoolsSiteColor input",function(){"customcolor"==s(this).val()?s(".site-colorpicker").show():(s(".site-colorpicker").hide(),e(this))}),s(document).on("change",".site-colorpicker",function(){e(this)}),s(document).on("click","#skintoolsNavbar input",function(){!function(e){var o=s(e).prop("checked");if(o)var n=s(e).val();else var n="";(function(e){e?a.addClass("navbar-inverse"):a.removeClass("navbar-inverse")})(o),r("navbarinverse",n)}(this)})});