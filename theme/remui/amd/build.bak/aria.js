"use strict";define(["jquery","core/pending"],function(e,t){return{init:function(){var n=!1;e('[data-toggle="dropdown"]').keydown(function(t){var o,r=t.which||t.keyCode;38==r&&(n=!0),27==r&&(o=e(t.target).attr("aria-expanded"),t.preventDefault(),"false"==o&&e(t.target).click()),32!=r&&13!=r||(t.preventDefault(),e(t.target).click())});var o=function(n){var o=function(t){e(this).focus(),t.resolve()}.bind(n);setTimeout(o,50,new t("core/aria:delayed-focus"))};e(".dropdown").on("shown.bs.dropdown",function(t){var r,i=e(t.target).find('[role="menu"]'),a=!1,d=!1;i&&(a=e(i).find('[role="menuitem"]')),a&&a.length>0&&(r=n,n=!1,d=r?a[a.length-1]:a[0]),d&&o(d)}),e('.dropdown [role="menu"] [role="menuitem"]').keypress(function(t){var n,r,i=String.fromCharCode(t.which||t.keyCode),a=e(t.target).closest('[role="menu"]'),d=0;if(a&&(n=e(a).find('[role="menuitem"]')))for(i=i.toLowerCase(),d=0;d<n.length;d++)if(0==(r=e(n[d])).text().trim().toLowerCase().indexOf(i)){o(r);break}}),e('.dropdown [role="menu"] [role="menuitem"]').keydown(function(t){var n,r=t.which||t.keyCode,i=!1,a=e(t.target).closest('[role="menu"]'),d=0;if(a&&(n=e(a).find('[role="menuitem"]'))){if(40==r){for(d=0;d<n.length-1;d++)if(n[d]==t.target){i=n[d+1];break}i||(i=n[0])}else if(38==r){for(d=1;d<n.length;d++)if(n[d]==t.target){i=n[d-1];break}i||(i=n[n.length-1])}else 36==r?i=n[0]:35==r&&(i=n[n.length-1]);i&&(t.preventDefault(),o(i))}}),e(".dropdown").on("hidden.bs.dropdown",function(t){var n=e(t.target).find('[data-toggle="dropdown"]');n&&o(n)}),e(function(){window.setTimeout(function(t){var n=e('[role="alert"][data-aria-autofocus="true"]');n.length>0&&(e(n[0]).attr("tabindex","0"),e(n[0]).focus()),t.resolve()},300,new t("core/aria:delayed-focus"))})}}});