"use strict";function _typeof2(e){return(_typeof2="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}define(["exports","jquery","./util"],function(e,t,i){Object.defineProperty(e,"__esModule",{value:!0});var n=a(t),s=a(i);function a(e){return e&&e.__esModule?e:{default:e}}function o(e){return(o="function"==typeof Symbol&&"symbol"===_typeof2(Symbol.iterator)?function(e){return _typeof2(e)}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":_typeof2(e)})(e)}function r(){return(r=Object.assign||function(e){for(var t=1;t<arguments.length;t++){var i=arguments[t];for(var n in i)Object.prototype.hasOwnProperty.call(i,n)&&(e[n]=i[n])}return e}).apply(this,arguments)}function l(e,t){for(var i=0;i<t.length;i++){var n=t[i];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}var u=function(e){var t="carousel",i="bs.carousel",n=".".concat(i),a=e.fn[t],u={interval:5e3,keyboard:!0,slide:!1,pause:"hover",wrap:!0},c={interval:"(number|boolean)",keyboard:"boolean",slide:"(boolean|string)",pause:"(string|boolean)",wrap:"boolean"},h="next",f="prev",d="left",_="right",m={SLIDE:"slide".concat(n),SLID:"slid".concat(n),KEYDOWN:"keydown".concat(n),MOUSEENTER:"mouseenter".concat(n),MOUSELEAVE:"mouseleave".concat(n),TOUCHEND:"touchend".concat(n),LOAD_DATA_API:"load".concat(n).concat(".data-api"),CLICK_DATA_API:"click".concat(n).concat(".data-api")},v="carousel",y="active",g="slide",E="carousel-item-right",p="carousel-item-left",I="carousel-item-next",T="carousel-item-prev",b={ACTIVE:".active",ACTIVE_ITEM:".active.carousel-item",ITEM:".carousel-item",NEXT_PREV:".carousel-item-next, .carousel-item-prev",INDICATORS:".carousel-indicators",DATA_SLIDE:"[data-slide], [data-slide-to]",DATA_RIDE:'[data-ride="carousel"]'},A=function(){function a(t,i){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,a),this._items=null,this._interval=null,this._activeElement=null,this._isPaused=!1,this._isSliding=!1,this.touchTimeout=null,this._config=this._getConfig(i),this._element=e(t)[0],this._indicatorsElement=e(this._element).find(b.INDICATORS)[0],this._addEventListeners()}var A,S,C;return A=a,C=[{key:"_jQueryInterface",value:function(t){return this.each(function(){var n=e(this).data(i),s=r({},u,e(this).data());"object"===o(t)&&(s=r({},s,t));var l="string"==typeof t?t:s.slide;if(n||(n=new a(this,s),e(this).data(i,n)),"number"==typeof t)n.to(t);else if("string"==typeof l){if(void 0===n[l])throw new TypeError('No method named "'.concat(l,'"'));n[l]()}else s.interval&&(n.pause(),n.cycle())})}},{key:"_dataApiClickHandler",value:function(t){var n=s.default.getSelectorFromElement(this);if(n){var o=e(n)[0];if(o&&e(o).hasClass(v)){var l=r({},e(o).data(),e(this).data()),u=this.getAttribute("data-slide-to");u&&(l.interval=!1),a._jQueryInterface.call(e(o),l),u&&e(o).data(i).to(u),t.preventDefault()}}}},{key:"VERSION",get:function(){return"4.0.0"}},{key:"Default",get:function(){return u}}],(S=[{key:"next",value:function(){this._isSliding||this._slide(h)}},{key:"nextWhenVisible",value:function(){!document.hidden&&e(this._element).is(":visible")&&"hidden"!==e(this._element).css("visibility")&&this.next()}},{key:"prev",value:function(){this._isSliding||this._slide(f)}},{key:"pause",value:function(t){t||(this._isPaused=!0),e(this._element).find(b.NEXT_PREV)[0]&&s.default.supportsTransitionEnd()&&(s.default.triggerTransitionEnd(this._element),this.cycle(!0)),clearInterval(this._interval),this._interval=null}},{key:"cycle",value:function(e){e||(this._isPaused=!1),this._interval&&(clearInterval(this._interval),this._interval=null),this._config.interval&&!this._isPaused&&(this._interval=setInterval((document.visibilityState?this.nextWhenVisible:this.next).bind(this),this._config.interval))}},{key:"to",value:function(t){var i=this;this._activeElement=e(this._element).find(b.ACTIVE_ITEM)[0];var n=this._getItemIndex(this._activeElement);if(!(t>this._items.length-1||t<0))if(this._isSliding)e(this._element).one(m.SLID,function(){return i.to(t)});else{if(n===t)return this.pause(),void this.cycle();var s=t>n?h:f;this._slide(s,this._items[t])}}},{key:"dispose",value:function(){e(this._element).off(n),e.removeData(this._element,i),this._items=null,this._config=null,this._element=null,this._interval=null,this._isPaused=null,this._isSliding=null,this._activeElement=null,this._indicatorsElement=null}},{key:"_getConfig",value:function(e){return e=r({},u,e),s.default.typeCheckConfig(t,e,c),e}},{key:"_addEventListeners",value:function(){var t=this;this._config.keyboard&&e(this._element).on(m.KEYDOWN,function(e){return t._keydown(e)}),"hover"===this._config.pause&&(e(this._element).on(m.MOUSEENTER,function(e){return t.pause(e)}).on(m.MOUSELEAVE,function(e){return t.cycle(e)}),"ontouchstart"in document.documentElement&&e(this._element).on(m.TOUCHEND,function(){t.pause(),t.touchTimeout&&clearTimeout(t.touchTimeout),t.touchTimeout=setTimeout(function(e){return t.cycle(e)},500+t._config.interval)}))}},{key:"_keydown",value:function(e){if(!/input|textarea/i.test(e.target.tagName))switch(e.which){case 37:e.preventDefault(),this.prev();break;case 39:e.preventDefault(),this.next()}}},{key:"_getItemIndex",value:function(t){return this._items=e.makeArray(e(t).parent().find(b.ITEM)),this._items.indexOf(t)}},{key:"_getItemByDirection",value:function(e,t){var i=e===h,n=e===f,s=this._getItemIndex(t),a=this._items.length-1;if((n&&0===s||i&&s===a)&&!this._config.wrap)return t;var o=(s+(e===f?-1:1))%this._items.length;return-1===o?this._items[this._items.length-1]:this._items[o]}},{key:"_triggerSlideEvent",value:function(t,i){var n=this._getItemIndex(t),s=this._getItemIndex(e(this._element).find(b.ACTIVE_ITEM)[0]),a=e.Event(m.SLIDE,{relatedTarget:t,direction:i,from:s,to:n});return e(this._element).trigger(a),a}},{key:"_setActiveIndicatorElement",value:function(t){if(this._indicatorsElement){e(this._indicatorsElement).find(b.ACTIVE).removeClass(y);var i=this._indicatorsElement.children[this._getItemIndex(t)];i&&e(i).addClass(y)}}},{key:"_slide",value:function(t,i){var n,a,o,r=this,l=e(this._element).find(b.ACTIVE_ITEM)[0],u=this._getItemIndex(l),c=i||l&&this._getItemByDirection(t,l),f=this._getItemIndex(c),v=Boolean(this._interval);if(t===h?(n=p,a=I,o=d):(n=E,a=T,o=_),c&&e(c).hasClass(y))this._isSliding=!1;else if(!this._triggerSlideEvent(c,o).isDefaultPrevented()&&l&&c){this._isSliding=!0,v&&this.pause(),this._setActiveIndicatorElement(c);var A=e.Event(m.SLID,{relatedTarget:c,direction:o,from:u,to:f});s.default.supportsTransitionEnd()&&e(this._element).hasClass(g)?(e(c).addClass(a),s.default.reflow(c),e(l).addClass(n),e(c).addClass(n),e(l).one(s.default.TRANSITION_END,function(){e(c).removeClass("".concat(n," ").concat(a)).addClass(y),e(l).removeClass("".concat(y," ").concat(a," ").concat(n)),r._isSliding=!1,setTimeout(function(){return e(r._element).trigger(A)},0)}).emulateTransitionEnd(600)):(e(l).removeClass(y),e(c).addClass(y),this._isSliding=!1,e(this._element).trigger(A)),v&&this.cycle()}}}])&&l(A.prototype,S),C&&l(A,C),a}();return e(document).on(m.CLICK_DATA_API,b.DATA_SLIDE,A._dataApiClickHandler),e(window).on(m.LOAD_DATA_API,function(){e(b.DATA_RIDE).each(function(){var t=e(this);A._jQueryInterface.call(t,t.data())})}),e.fn[t]=A._jQueryInterface,e.fn[t].Constructor=A,e.fn[t].noConflict=function(){return e.fn[t]=a,A._jQueryInterface},A}(n.default);e.default=u});