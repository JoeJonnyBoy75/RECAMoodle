// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

define([
    'jquery',
    'core/ajax',
    'core/notification',
    'core/modal_factory',
    'core/modal_events',
    './customizer/utils',
    './customizer/global-site',
    './customizer/global-body',
    './customizer/global-colors',
    './customizer/global-heading',
    './customizer/global-buttons',
    './customizer/header-site-identity',
    './customizer/header-primary',
    './customizer/header-menu',
    './customizer/footer',
    './customizer/additional-settings',
    './customizer/forms-settings',
    './customizer/icon-settings',
    'core/modal_save_cancel'
], function(
    $,
    Ajax,
    Notification,
    ModalFactory,
    ModalEvents,
    Utils,
    globalSite,
    globalBody,
    globalColors,
    globalHeading,
    globalButtons,
    headerSiteIdentity,
    headerPrimary,
    headerMenu,
    footer,
    additionalSettings,
    formssettings,
    iconsettings
) {

    /**
     * Ajax promise requests
     */
    var PROMISES = {
        /**
         * Save settings to database
         * @param {String} settings Encoded settings string
         * @return {Promise}
         */
        SAVE_SETTINGS: function(settings) {
            return Ajax.call([{
                methodname: 'theme_remui_customizer_save_settings',
                args: {
                    'settings': settings
                }
            }])[0];
        }
    };

    /**
     * Selectors
     */
    var SELECTOR = {
        CUSTOMIZER: '#customizer',
        CONTROLS: '#customize-controls',
        MODE_TOGGLE: '#customize-controls .mode-toggle',
        WRAP: '#customizer-wrap',
        CLOSE_CUSTOMIZER: '.customize-controls-close',
        CUSTMIZER_TOGGLE: '.customizer-controls-toggle',
        COLOR_SETTING: '.setting-type-color',
        PUBLISH: '#publish-settings',
        IFRAME: '#customizer-frame',
        MAIN_OVERLAY: '#main-overlay',
        PANEL_LINK: '[sidebar-panel-link]',
        PANEL_BACK: '.customize-panel-back',
        PANEL: '.sidebar-panel',
        PANEL_ID: 'panel-id',
        PREVIOUS: 'previous',
        CURRENT: 'current',
        NEXT: 'next',
        SETTINGS_RESET: '#reset-settings',
        INPUT_RESET: '.input-reset',
        SELECT_RESET: '.select-reset',
        CHECKBOX_RESET: '.checkbox-reset',
        COLOR_RESET: '.color-reset',
        TEXTAREA_RESET: '.textarea-reset',
        HTMLEDITOR_RESET: '.htmleditor-reset',
        HEADING_TOGGLE: '.heading-toggle',
        RANGEINPUT: '.form-range'
    };

    /**
     * Initialize setting change handler.
     */
    function initHandlers() {
        globalSite.init();
        globalBody.init();
        globalColors.init();
        globalHeading.init();
        globalButtons.init();
        headerSiteIdentity.init();
        headerPrimary.init();
        headerMenu.init();
        footer.init();
        additionalSettings.init();
        formssettings.init();
        iconsettings.init();
        // Trigger init so external js can handle customizer init.
        $(document).trigger('edwiser.customizer.init');
    }

    /**
     * Apply settings on iframe load.
     */
    function applySettings() {
        globalSite.apply();
        globalBody.apply();
        globalColors.apply();
        globalHeading.apply();
        globalButtons.apply();
        headerSiteIdentity.apply();
        headerPrimary.apply();
        headerMenu.apply();
        footer.apply();
        additionalSettings.apply();
        formssettings.apply();
        iconsettings.apply();
        // Trigger apply so external js can handle customizer apply.
        $(document).trigger('edwiser.customizer.apply');
    }

    /**
     * Initialize events
     */
    function init() {

        // Initialize customizer only once.
        if (window['customizer-enabled'] == true) {
            return;
        }
        window['customizer-enabled'] = true;

        $(document).ready(function($) {
            initHandlers();

            // Iframe on load event.
            $(SELECTOR.IFRAME).on("load", function() {
                $(Utils.getDocument()).find('body').addClass('customizer-opened');
                $(Utils.getDocument()).find('.customizer-editing-icon').closest('a')
                .addClass('d-none').removeClass('d-flex');
                $(Utils.getDocument()).find('#sidebar-setting').addClass('d-none');
                $(document).trigger('remui-adjust-left-side');
                var contentWindow = this.contentWindow;
                setTimeout(function() {
                    // Change browser url on iframe navigation.
                    window.history.replaceState('pagechange', document.title, M.cfg.wwwroot + '/theme/remui/customizer.php?url=' +
                    encodeURI(contentWindow.location.href));

                    // Set current iframe url to customizer close button.
                    $(SELECTOR.CLOSE_CUSTOMIZER).attr('href', contentWindow.location.href);

                    // Apply setting on iframe load.
                    applySettings();

                    // Hide overlay when iframe loaded.
                    Utils.hideLoader();
                    contentWindow.onbeforeunload = function() {
                        // Show overlay when iframe loaded.
                        Utils.showLoader();
                    };
                }, 10);
            });

            $(SELECTOR.SETTINGS_RESET).on('click', function() {
                ModalFactory.create({
                    title: M.util.get_string('reset', 'moodle'),
                    body: M.util.get_string('reset-settings-description', 'theme_remui'),
                    type: ModalFactory.types.SAVE_CANCEL
                }, $('#create')).done(function(modal) {
                    modal.show();
                    modal.setSaveButtonText(M.util.get_string('yes', 'moodle'));
                    var root = modal.getRoot();
                    root.on(ModalEvents.save, function() {
                        $(SELECTOR.MAIN_OVERLAY).removeClass('d-none');
                        PROMISES.SAVE_SETTINGS(JSON.stringify([customcss])).done(function () {
                            location.reload();
                        }).fail(function(ex) {
                            Notification.exception(ex);
                            $(SELECTOR.MAIN_OVERLAY).addClass('d-none');
                        });
                    });
                });
            });

            // Open next panel.
            $(SELECTOR.PANEL_LINK).on('click', function() {
                $(SELECTOR.PANEL + '#' + $(this).data(SELECTOR.PANEL_ID)).addClass(SELECTOR.CURRENT);
                $(this).closest(SELECTOR.PANEL).removeClass(SELECTOR.CURRENT);
            });

            // Go back to previous panel.
            $(SELECTOR.PANEL_BACK).on('click', function() {
                $(SELECTOR.PANEL + ':not(' + SELECTOR.PANEL + '#' + $(this).data(SELECTOR.PANEL_ID) + ')')
                .removeClass(SELECTOR.CURRENT);
                $(SELECTOR.PANEL + '#' + $(this).data(SELECTOR.PANEL_ID)).addClass(SELECTOR.CURRENT);
            });

            // Toggle screen mode.
            $(SELECTOR.MODE_TOGGLE).on('click', function() {
                $(SELECTOR.CUSTOMIZER).removeClass('mode-desktop mode-tablet mode-mobile')
                .addClass(`mode-${$(this).data('mode')}`);
            });

            // Prevent submission.
            $(SELECTOR.CONTROLS).on('submit', function(event) {
                event.preventDefault();
                return false;
            });

            // Form change handler.
            $(`
                ${SELECTOR.CONTROLS} input[type="text"],
                ${SELECTOR.CONTROLS} input[type="number"],
                ${SELECTOR.CONTROLS} input[type="checkbox"]
                ${SELECTOR.CONTROLS} textarea,
                ${SELECTOR.CONTROLS} select
            `).on('change', function() {
                $(SELECTOR.CONTROLS).data('unsaved', true);
            });
            $(`${SELECTOR.CONTROLS} input[type="color"]`).on('color.changed', function() {
                $(SELECTOR.CONTROLS).data('unsaved', true);
            });

            // Submit settings to database.
            $(SELECTOR.PUBLISH).on('click', function() {
                $(SELECTOR.MAIN_OVERLAY).removeClass('d-none');
                let settings = $(SELECTOR.CONTROLS).serializeArray();
                settings.forEach(function(element, index) {
                    if ($(`[name="${element.name}"]`).is('.site-colorpicker')) {
                        element.value = $(`[name="${element.name}"]`).spectrum('get').toString();
                        settings[index] = element;
                    }
                });
                PROMISES.SAVE_SETTINGS(JSON.stringify(settings))
                .done(function(response) {
                    let obj = {
                        type: ModalFactory.types.ALERT
                    };
                    if (response.status == false) {
                        obj.title = M.util.get_string('error', 'theme_remui');
                        obj.body = response.errors;
                    } else {
                        obj.title = M.util.get_string('success', 'moodle');
                        obj.body = response.message;
                        $(SELECTOR.CONTROLS).data('unsaved', false);
                    }
                    ModalFactory.create(obj, $('#create'))
                    .done(function(modal) {
                        modal.show();
                        $(SELECTOR.MAIN_OVERLAY).addClass('d-none');
                    });
                })
                .fail(Notification.exception);
            });

            // Handle customizer close event.
            $(SELECTOR.CLOSE_CUSTOMIZER).on('click', function(event) {
                if ($(SELECTOR.CONTROLS).data('unsaved') == false) {
                    return true;
                }
                event.preventDefault();
                ModalFactory.create({
                    title: M.util.get_string('customizer-close-heading', 'theme_remui'),
                    body: M.util.get_string('customizer-close-description', 'theme_remui'),
                    type: ModalFactory.types.SAVE_CANCEL
                }, $('#create'))
                .done(function(modal) {
                    modal.show();
                    modal.setSaveButtonText(M.util.get_string('yes', 'moodle'));
                    var root = modal.getRoot();
                    root.on(ModalEvents.save, function() {
                        window.location = $(SELECTOR.CLOSE_CUSTOMIZER).attr('href');
                    });
                });
                return true;
            });

            // Toggle customizer.
            $(SELECTOR.CUSTMIZER_TOGGLE).on('click', function() {
                $('body').toggleClass('full-customizer');
            });

            // Color reset.
            $(SELECTOR.COLOR_RESET)
            .on('click', function() {
                let color = $(this).data('default');
                $(this).next().find('input').spectrum('set', color);
                $(this).next().find('input').trigger('color.changed', color);
            });

            // Checkbox reset.
            $(SELECTOR.CHECKBOX_RESET)
            .on('click', function() {
                let value = $(this).data('default');
                $(this).next().find('input').prop('checked', $(this).next().find('input').val() == value);
                $(this).next().find('input').trigger('change').trigger('input');
            });

            // Reset select.
            $(SELECTOR.SELECT_RESET)
            .on('click', function() {
                let value = $(this).data('default');
                $(this).next().find('select').val(value).trigger('input').trigger('change');
            });

            // Reset input.
            $(SELECTOR.INPUT_RESET)
            .on('click', function() {
                let value = $(this).data('default');
                $(this).next().find('input').val(value).trigger('input').trigger('change');
            });

            // Reset textarea.
            $(SELECTOR.TEXTAREA_RESET)
            .on('click', function() {
                let value = $(this).data('default');
                $(this).next().find('textarea').val(value).trigger('input').trigger('change');
            });

            // Reset htmleditor.
            $(SELECTOR.HTMLEDITOR_RESET)
            .on('click', function() {
                let value = $(this).data('default');
                let textarea = $(this).next().find('textarea');
                $(this).next().find(`#${textarea.attr('id')}editable`).html(value);
                textarea.val(value).trigger('input').trigger('change');
            });

            // Toggle headings.
            $(SELECTOR.HEADING_TOGGLE).on('click', function() {
                $(this).next().slideToggle('fast');
            });

            // Range slider observer.
            $('body').on('input', SELECTOR.RANGEINPUT, function() {
                let id = $(this).attr('id');
                let value = $(this).val();
                $(`#${id}-range-value`).text(value);
            });
        });
    }
    return {
        init: init
    };
});
