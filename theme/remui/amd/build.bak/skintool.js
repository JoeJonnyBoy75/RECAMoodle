"use strict";define(["jquery","core/ajax"],function(o,e){var r,a=[{color:"primary",hex:"62a8ea"},{color:"brown",hex:"8d6658"},{color:"cyan",hex:"57c7d4"},{color:"green",hex:"46be8a"},{color:"grey",hex:"757575"},{color:"indigo",hex:"677ae4"},{color:"orange",hex:"f2a654"},{color:"pink",hex:"f96197"},{color:"purple",hex:"926dde"},{color:"red",hex:"f96868"},{color:"teal",hex:"3aa99e"}];function n(o,r){e.call([{methodname:"theme_remui_set_setting",args:{configname:o,configvalue:r}}])}o('#skintoolsSiteColor input[type="radio"][name="skintoolsNavbar"]').on("change",function(){var e=this.value;"customcolor"==e?o(".site-colorpicker").show():(o(".site-colorpicker").hide(),n("sitecolor",e),n("sitecolorhex",r=(r=a.filter(function(o){return o.color==e})).length?r[0].hex:"1177d1"),o(".navbar-brand").attr("style","background-color: #".concat(r," !important")),o(".nav-inverse").attr("style","background-color: #".concat(r," !important")),o("#page-footer").attr("style","background-color: #".concat(r," !important")))}),o(document).on("change",".site-colorpicker",function(){var o=this.value.split("#")[1];n("sitecolor","customcolor"),n("sitecolorhex",o)}),o("#skintoolsNavbar-inverse").on("change",function(){var e,a=this.value;this.checked?e=r:(a="",e="ffffff"),n("navbarinverse",a),o(".navbar").toggleClass("nav-inverse"),null!=r&&o(".navbar").attr("style","background-color: #".concat(e," !important"))}),o('#skintoolsSidebar input[type="radio"][name="skintoolsSidebar"]').on("change",function(){"site-menubar-light"==this.value?(o("#nav-drawer").removeClass("dark"),n("sidebarcolor","site-menubar-light")):(o("#nav-drawer").addClass("dark"),n("sidebarcolor",""))})});