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

/**
 * Main js for template importer
 *
 * @module     local/edwisersiteimporter
 * @package    local_edwisersiteimporter
 * @author     Yogesh Shirsath
 * @copyright  (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'jquery',
    'core/modal_factory',
    'core/modal_events',
    'core/fragment',
    'core/templates',
    'core/notification',
    'core/ajax',
    'core/modal_save_cancel'
], function($,
    ModalFactory,
    ModalEvents,
    Fragment,
    Templates,
    Notification,
    Ajax
) {

    /**
     * Promises declaration.
     */
    let PROMISES = {
        /**
         * Refresh templates list.
         * @returns {Promise} Ajax promise
         */
        // eslint-disable-next-line camelcase
        refresh_templates: function() {
            return Ajax.call([{
                'methodname': 'local_edwisersiteimporter_refresh_templates',
                'args': {}
            }])[0];
        }
    };

    /**
     * Check whether importer content is loaded.
     */
    let loaded = false;

    /**
     * Show template importer modal
     * @param {DOM}    element Template element
     * @param {string} html    HTML content
     * @param {string} js      Javascript content
     */
    function showTemplateModal(element, html, js) {
        var type = $(element).data('type');
        // Invoke template importer
        require(['local_edwisersiteimporter/' + type], function(template) {
            ModalFactory.create({
                title: M.util.get_string('import' + type, 'local_edwisersiteimporter'),
                type: ModalFactory.types.SAVE_CANCEL
            }, $('#create')).done(function(modal) {
                Templates.replaceNodeContents(modal.body, html, js);
                modal.show();
                modal.setSaveButtonText(M.util.get_string('import', 'local_edwisersiteimporter'));
                modal.getRoot().on(ModalEvents.save, function(e) {
                    // Stop the default save button behaviour which is to close the modal.
                    e.preventDefault();
                    template.importTemplate($(element).data(), modal);
                });

                // Destroy modal when hidden.
                modal.getRoot().on(ModalEvents.hidden, function() {
                    modal.destroy();
                });
            });
        });
    }
    /**
     * Initialize template chooser
     */
    function initTemplateChooser() {
        $('.view-template').on('click', function(event) {
            var _this = this;
            event.preventDefault();
            var type = $(this).data('type');
            Templates.render(
                'local_edwisersiteimporter/' + type + '_modal',
                $(this).data()
            ).done(function(html, js) {
                showTemplateModal(_this, html, js);
            }).fail(Notification.exception);
            return false;
        });
    }

    /**
     * Load view
     */
    function loadView() {
        if (loaded == true) {
            return;
        }
        $('#edwisersiteimporter .templates-list').hide();
        $('#edwisersiteimporter .loader-wrapper').show();
        Fragment.loadFragment('local_edwisersiteimporter', 'load_view', 1, {})
        .done(function(html, js) {
            Templates.replaceNodeContents('#edwisersiteimporter .templates-list', html, js);
            $('#edwisersiteimporter .loader-wrapper').hide();
            $('#edwisersiteimporter .templates-list').show();
            loaded = true;
        }).fail(Notification.exception);
    }

    /**
     * Initialize events.
     * @param {string} root Importer root element id
     */
    function initEvents(root) {

        // Initialize tabs.
        $(root + ' .nav-tabs a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });

        // Initialize refresh button.
        $(root + ' #refresh-templates').on('click', function() {
            PROMISES.refresh_templates()
            .done(function(status) {
                if (status) {
                    loaded = false;
                    loadView();
                }
            })
            .fail(Notification.exception);
        });

    }

    /**
     * Initialize view loader.
     */
    function initLoader() {
        $(document).ready(function() {
            $('[href="#edwisersiteimporter"]').on('click', function() {
                loadView();
            });
            if ($('[href="#edwisersiteimporter"]').is('.active')) {
                loadView();
            }
        });
    }
    return {
        init: function(root) {
            initTemplateChooser();
            initEvents(root);
        },
        initLoader: initLoader
    };
});
