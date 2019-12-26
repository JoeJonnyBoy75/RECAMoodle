"use strict";define(["exports","jquery","./util"],function(e,t,n){Object.defineProperty(e,"__esModule",{value:!0});var r=o(t),a=o(n);function o(e){return e&&e.__esModule?e:{default:e}}function l(e,t){for(var n=0;n<t.length;n++){var r=t[n];r.enumerable=r.enumerable||!1,r.configurable=!0,"value"in r&&(r.writable=!0),Object.defineProperty(e,r.key,r)}}var i=function(e){var t=".".concat("bs.alert"),n=e.fn.alert,r={CLOSE:"close".concat(t),CLOSED:"closed".concat(t),CLICK_DATA_API:"click".concat(t).concat(".data-api")},o="alert",i="fade",u="show",s=function(){function t(e){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,t),this._element=e}var n,s,c;return n=t,c=[{key:"_jQueryInterface",value:function(n){return this.each(function(){var r=e(this),a=r.data("bs.alert");a||(a=new t(this),r.data("bs.alert",a)),"close"===n&&a[n](this)})}},{key:"_handleDismiss",value:function(e){return function(t){t&&t.preventDefault(),e.close(this)}}},{key:"VERSION",get:function(){return"4.0.0"}}],(s=[{key:"close",value:function(e){e=e||this._element;var t=this._getRootElement(e);this._triggerCloseEvent(t).isDefaultPrevented()||this._removeElement(t)}},{key:"dispose",value:function(){e.removeData(this._element,"bs.alert"),this._element=null}},{key:"_getRootElement",value:function(t){var n=a.default.getSelectorFromElement(t),r=!1;return n&&(r=e(n)[0]),r||(r=e(t).closest(".".concat(o))[0]),r}},{key:"_triggerCloseEvent",value:function(t){var n=e.Event(r.CLOSE);return e(t).trigger(n),n}},{key:"_removeElement",value:function(t){var n=this;e(t).removeClass(u),a.default.supportsTransitionEnd()&&e(t).hasClass(i)?e(t).one(a.default.TRANSITION_END,function(e){return n._destroyElement(t,e)}).emulateTransitionEnd(150):this._destroyElement(t)}},{key:"_destroyElement",value:function(t){e(t).detach().trigger(r.CLOSED).remove()}}])&&l(n.prototype,s),c&&l(n,c),t}();return e(document).on(r.CLICK_DATA_API,'[data-dismiss="alert"]',s._handleDismiss(new s)),e.fn.alert=s._jQueryInterface,e.fn.alert.Constructor=s,e.fn.alert.noConflict=function(){return e.fn.alert=n,s._jQueryInterface},s}(r.default);e.default=i});