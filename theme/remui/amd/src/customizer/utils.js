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
 * Theme customizer utils js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/utils', [
        'jquery',
        'core/ajax',
        'core/notification',
        'core/modal_factory',
        'core/modal_events',
        'core/fragment',
        'core/modal_save_cancel'
    ], function($, Ajax, Notification, ModalFactory, ModalEvents, Fragment) {

    /**
     * Selectors
     */
    var SELECTOR = {
        COMPONENT: 'theme_remui',
        FORMLABEL: '.col-form-label',
        HMTLEDITOR: 'customizer_htmleditor',
        CONTROLS: '#customize-controls',
        IFRAME: '#customizer-frame',
        WRAP: '#customizer-wrap',
        IFRAME_OVERLAY: '#preview-overlay',
    };

    /**
     * Promises list.
     */
    var PROMISES = {
        /**
         * Get file url using itemid
         * @param {number} itemid Item id
         * @return {Promise}
         */
        GET_FILE_URL: function(itemid) {
            return Ajax.call([{
                methodname: 'theme_remui_customizer_get_file_from_setting',
                args: {
                    itemid: itemid
                }
            }])[0];
        }
    };

    /**
     * Device widths
     */
    var deviceWidth = {
        tablet: 768,
        mobile: 480
    };

    /**
     * Get contentDocument of iframe
     * @return {DOM} contentDocument
     */
    function getDocument() {
        return $(SELECTOR.IFRAME)[0].contentDocument;
    }

    /**
     * Get contentWindow of iframe
     * @return {DOM} contentWindow
     */
    function getWindow() {
        return $(SELECTOR.IFRAME)[0].contentWindow;
    }

    /**
     * Put style in style tag.
     * @param {String} id      Id for style tag
     * @param {String} content Style content
     */
    function putStyle(id, content) {
        id += '_style';
        let bodyDOM = $(getDocument()).find('body');

        if ($(bodyDOM).find('#' + id).length == 0) {
            $(bodyDOM).append(`<style id="${id}"></style>`);
        }
        $(bodyDOM).find('#' + id).html(content);
    }

    /**
     * Get file user from itemid
     * @param {Number} itemid file itemid
     * @return {Promise}
     */
    function getFileURL(itemid) {
        return PROMISES.GET_FILE_URL(itemid).fail(Notification.exception);
    }

    /**
     * File observer.
     * @param {DOM} targetNode Node on which observer will be applied
     * @param {function} callBack Callback method
     */
    function fileObserver(targetNode, callBack) {
        // Create an observer instance linked to the callback function
        const observer = new MutationObserver(function() {
            $(SELECTOR.CONTROLS).data('unsaved', true);
            callBack();
        });

        // Start observing the target node for configured mutations
        observer.observe(targetNode, {
            attributes: true,
            attributeFilter: ['class'],
            childList: false,
            characterData: false
        });
    }

    /**
     * Show loader.
     */
    function showLoader() {
        $(SELECTOR.IFRAME_OVERLAY).show();
    }

    /**
     * Hide loader/
     */
    function hideLoader() {
        $(SELECTOR.IFRAME_OVERLAY).hide();
    }

    /**
     * Expand html editor in modal to get more area.
     * @param {String} name Setting name.
     */
    function htmlEditorExpand(name) {
        $(`#fitem_id_${name} .btn.fa-expand`).on('click', function() {
            let content = $(`#id_${name}`).val();
            ModalFactory.create({
                title: $(`#fitem_id_${name} ${SELECTOR.FORMLABEL}`).text(),
                body: Fragment.loadFragment(SELECTOR.COMPONENT, SELECTOR.HMTLEDITOR, 1, {content: content}),
                type: ModalFactory.types.SAVE_CANCEL
            }, $('#create')).done(function(modal) {
                modal.show();
                $(modal.getModal()).addClass('modal-lg');
                var root = modal.getRoot();
                root.on(ModalEvents.save, function(event) {
                    event.preventDefault();
                    content = $(`#${SELECTOR.COMPONENT}_${SELECTOR.HMTLEDITOR}`).val();
                    $(`#id_${name}`).val(content).trigger('change');
                    $(`#id_${name}editable`).html(content);
                    modal.hide();
                });

                // Destroy modal on hidden.
                root.on(ModalEvents.hidden, function() {
                    modal.destroy();
                });
            });
        });
    }

    return {
        putStyle: putStyle,
        getDocument: getDocument,
        getWindow: getWindow,
        deviceWidth: deviceWidth,
        getFileURL: getFileURL,
        fileObserver: fileObserver,
        showLoader: showLoader,
        hideLoader: hideLoader,
        htmlEditorExpand: htmlEditorExpand
    };
});
