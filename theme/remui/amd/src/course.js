"use strict";
define(['jquery', 'theme_remui/notice', 'core/str', 'core/ajax'], function($, Notice, Str, Ajax) {
    return {
        init: function(action) {
            $(document).ready(function(){
                var focusmode = FocusMode(action);
                focusmode.initFocusMode();
            });
        }
    };

    /**
     * Main category filters class.
     * @return {Object} Filter object
     */
    function FocusMode(fmstatus) {

        var SELECTORS = {
            BODY: 'body',
            BUTTON_FULLSCREEN: '#toggleFullscreen',
            FM_BUTTON: '#focusmodebutton',
            FM_BUTTON_ICON: '#focusmodebutton i.fa',
            SECTION_WRAPPER: '.stepprogress-section',
            SECTION_ITEM: '.stepprogress-item',
            SECTION: '.section',
            ACTIVITY: '.activity',
            GO_BACK: '#go-back',
            FOCUS_MODE_CLASS: 'focusmode'
        };

        var _obj = {
            fmstatus: fmstatus
        };
        var strings = [
           {
               key: 'focusmodeenabled',
               component: 'theme_remui'
           },
           {
               key: 'focusmodedisabled',
               component: 'theme_remui'
           }
       ];
       
        /**
         * Initialize focus mode
         */
        _obj.initFocusMode = function() {
            Str.get_strings(strings).then(function (results) {
                strings = results;
                _obj.setupFocusMode();
                _obj.initEvents();
            });
        };

        _obj.setupFocusMode = function() {
            var action = (_obj.fmstatus) ? "activate" : "deactivate";
            
            // _obj.changeFMButtonClasses(action);
            if (action === "activate") {
                Notice.info(strings[0]);
            }
        };

        /**
         * Initialize events required for focus mode
         */
        _obj.initEvents = function() {
            // Toggle the Activation/Deactivate Focus Mode
            $(SELECTORS.FM_BUTTON).on("click", function(){
                _obj.toggleFocusMode();
            });
        };

        _obj.changeFMButtonClasses = function(action){
            if (action === "activate") {
                $(SELECTORS.BODY).addClass(SELECTORS.FOCUS_MODE_CLASS);
                $(SELECTORS.FM_BUTTON).addClass('btn-danger').removeClass('btn-primary');
                $(SELECTORS.FM_BUTTON_ICON).addClass('fa-compress').removeClass('fa-expand');
            }
            if (action === "deactivate") {
                $(SELECTORS.BODY).removeClass(SELECTORS.FOCUS_MODE_CLASS);
                $(SELECTORS.FM_BUTTON).removeClass('btn-danger').addClass('btn-primary');
                $(SELECTORS.FM_BUTTON_ICON).addClass('fa-expand').removeClass('fa-compress');
            }
        };

        _obj.toggleFocusMode = function(){
            // var inFocus = $('body').hasClass(SELECTORS.FOCUS_MODE_CLASS);
            if (_obj.fmstatus) {
                var action = "deactivate";
                var status = false;
                var tostr = strings[1];
            } else {
                var action = "activate";
                var status = true;
                var tostr = strings[0];
            }

            _obj.changeFMButtonClasses(action);

            _obj.fmstatus = status;
            M.util.set_user_preference('enable_focus_mode', _obj.fmstatus);
            Notice.info(tostr);
        };
        return _obj;
    }
});
