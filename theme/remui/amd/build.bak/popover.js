"use strict";function _typeof2(t){return(_typeof2="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(t){return typeof t}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":typeof t})(t)}define(["exports","jquery","./tooltip"],function(t,e,n){Object.defineProperty(t,"__esModule",{value:!0});var o=i(e),r=i(n);function i(t){return t&&t.__esModule?t:{default:t}}function c(t){return(c="function"==typeof Symbol&&"symbol"===_typeof2(Symbol.iterator)?function(t){return _typeof2(t)}:function(t){return t&&"function"==typeof Symbol&&t.constructor===Symbol&&t!==Symbol.prototype?"symbol":_typeof2(t)})(t)}function u(t,e){for(var n=0;n<e.length;n++){var o=e[n];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(t,o.key,o)}}function a(){return(a=Object.assign||function(t){for(var e=1;e<arguments.length;e++){var n=arguments[e];for(var o in n)Object.prototype.hasOwnProperty.call(n,o)&&(t[o]=n[o])}return t}).apply(this,arguments)}var f=function(t){var e="popover",n=".".concat("bs.popover"),o=t.fn[e],i=new RegExp("(^|\\s)".concat("bs-popover","\\S+"),"g"),f=a({},r.default.Default,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>'}),l=a({},r.default.DefaultType,{content:"(string|element|function)"}),s="fade",p="show",y=".popover-header",h=".popover-body",v={HIDE:"hide".concat(n),HIDDEN:"hidden".concat(n),SHOW:"show".concat(n),SHOWN:"shown".concat(n),INSERTED:"inserted".concat(n),CLICK:"click".concat(n),FOCUSIN:"focusin".concat(n),FOCUSOUT:"focusout".concat(n),MOUSEENTER:"mouseenter".concat(n),MOUSELEAVE:"mouseleave".concat(n)},b=function(o){function a(){return function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,a),function(t,e){if(e&&("object"===c(e)||"function"==typeof e))return e;if(void 0===t)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return t}(this,(a.__proto__||Object.getPrototypeOf(a)).apply(this,arguments))}var b,d,m;return function(t,e){if("function"!=typeof e&&null!==e)throw new TypeError("Super expression must either be null or a function");t.prototype=Object.create(e&&e.prototype,{constructor:{value:t,enumerable:!1,writable:!0,configurable:!0}}),e&&(Object.setPrototypeOf?Object.setPrototypeOf(t,e):t.__proto__=e)}(a,r["default"]),b=a,m=[{key:"_jQueryInterface",value:function(e){return this.each(function(){var n=t(this).data("bs.popover"),o="object"===c(e)?e:null;if((n||!/destroy|hide/.test(e))&&(n||(n=new a(this,o),t(this).data("bs.popover",n)),"string"==typeof e)){if(void 0===n[e])throw new TypeError('No method named "'.concat(e,'"'));n[e]()}})}},{key:"VERSION",get:function(){return"4.0.0"}},{key:"Default",get:function(){return f}},{key:"NAME",get:function(){return e}},{key:"DATA_KEY",get:function(){return"bs.popover"}},{key:"Event",get:function(){return v}},{key:"EVENT_KEY",get:function(){return n}},{key:"DefaultType",get:function(){return l}}],(d=[{key:"isWithContent",value:function(){return this.getTitle()||this._getContent()}},{key:"addAttachmentClass",value:function(e){t(this.getTipElement()).addClass("".concat("bs-popover","-").concat(e))}},{key:"getTipElement",value:function(){return this.tip=this.tip||t(this.config.template)[0],this.tip}},{key:"setContent",value:function(){var e=t(this.getTipElement());this.setElementContent(e.find(y),this.getTitle());var n=this._getContent();"function"==typeof n&&(n=n.call(this.element)),this.setElementContent(e.find(h),n),e.removeClass("".concat(s," ").concat(p))}},{key:"_getContent",value:function(){return this.element.getAttribute("data-content")||this.config.content}},{key:"_cleanTipClass",value:function(){var e=t(this.getTipElement()),n=e.attr("class").match(i);null!==n&&n.length>0&&e.removeClass(n.join(""))}}])&&u(b.prototype,d),m&&u(b,m),a}();return t.fn[e]=b._jQueryInterface,t.fn[e].Constructor=b,t.fn[e].noConflict=function(){return t.fn[e]=o,b._jQueryInterface},b}(o.default);t.default=f});