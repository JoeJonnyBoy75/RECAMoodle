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
 * Theme customizer menu js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/elements/menu', [
    'jquery',
    'core/notification',
    'core/templates',
    'core/modal_factory',
    'core/modal_events',
    'core/modal_save_cancel'
], function($, Notification, Templates, ModalFactory, ModalEvents) {

    /**
     * Selectors.
     */
    let SELECTOR = {
        ADDMENUITEM: '.add-menu-item',
        EDITMENUITEM: '.action-edit',
        MOVEUPMENUITEM: '.action-move-up',
        MOVEDOWNMENUITEM: '.action-move-down',
        DELETEMENUITEM: '.action-delete',
        FORM: '.customizer-menu-item-form',
        TEXT: '.menu-text',
        ADDRESS: '.menu-address',
        MENULIST: '.customizer-menu-item-list',
        MENUITEM: '.menu-item',
        MENURESET: '.menu-reset'
    };

    /**
     * Menu item move direction.
     */
    let DIRECTION = {
        UP: -1,
        DOWN: 1
    };

    /**
     * Generate json data of menu.
     * @param {String} root Menu root setting element
     */
    function generateMenuData(root) {
        let elements = $(root).find(SELECTOR.MENULIST).find(SELECTOR.MENUITEM);
        let menu = [];
        $.each(elements, function(index, element) {
            menu.push({
                'text': $(element).data('text'),
                'address': $(element).data('address')
            });
        });
        $(root).find('textarea').val(JSON.stringify(menu)).trigger('change');
    }

    /**
     * Regenerate menu.
     * @param {String} root Menu root setting element
     * @param {String} menu Menu items list
     */
    function regenerateMenu(root, menu) {
        if (menu == undefined) {
            $(root).find(SELECTOR.MENULIST).html('').hide();
            menu = $(root).find('textarea').val();
            try {
                menu = JSON.parse(menu);
            } catch (exception) {
                menu = [];
            }
        }
        if (menu.length == 0) {
            $(root).find(SELECTOR.MENULIST).show();
            return;
        }
        Templates.render('theme_remui/customizer/elements/menu/menu-item', menu.shift())
        .done(function(html, js) {
            Templates.appendNodeContents($(root).find(SELECTOR.MENULIST), html, js);
            regenerateMenu(root, menu);
        });
    }

    /**
     * Add menu item
     * @param {String} root Menu root setting element
     * @param {DOM} item Pass menu item if editing existing menu
     */
    function addEditMenuItem(root, item) {
        let menuitem = {};
        if (item != undefined) {
            menuitem = {
                'text': $(item).data('text'),
                'address': $(item).data('address')
            };
        }
        ModalFactory.create({
            title: M.util.get_string('customizermenuadd', 'theme_remui'),
            body: Templates.render('theme_remui/customizer/elements/menu/menu-add-edit', menuitem),
            type: ModalFactory.types.SAVE_CANCEL
        }, $('#create'))
        .done(function(modal) {
            modal.show();
            modal.getRoot().on(ModalEvents.save, function(event) {
                event.preventDefault();
                let text = $(SELECTOR.FORM).find(SELECTOR.TEXT).val();
                let address = $(SELECTOR.FORM).find(SELECTOR.ADDRESS).val();
                menuitem = {
                    'text': text,
                    'address': address
                };
                Templates.render('theme_remui/customizer/elements/menu/menu-item', menuitem)
                .done(function(html, js) {
                    if (item == undefined) {
                        Templates.appendNodeContents($(root).find(SELECTOR.MENULIST), html, js);
                    } else {
                        Templates.replaceNode($(item), html, js);
                    }
                    generateMenuData(root);
                });
                modal.hide();
            });

            // Destroy modal on hidden.
            modal.getRoot().on(ModalEvents.hidden, function() {
                modal.destroy();
            });
        });
    }

    /**
     * Move menu item up or down
     * @param {DOM}     root      Menu root setting element
     * @param {DOM}     item      Menu item
     * @param {Integer} direction Direction to move item
     */
    function moveMenuItem(root, item, direction) {
        switch (direction) {
            case DIRECTION.UP:
                if ($(item).prev().length == 0) {
                    return;
                }
                $(item).prev().insertAfter(item);
                break;
            case DIRECTION.DOWN:
                if ($(item).next().length == 0) {
                    return;
                }
                $(item).next().insertBefore(item);
                break;
        }
        generateMenuData(root);
    }

    /**
     * Initialize menu element
     * @param {String} root Menu root setting element
     */
    function init(root) {
        // Add menu item.
        $('body').on('click', root + ' ' + SELECTOR.ADDMENUITEM, function() {
            addEditMenuItem(root);
        });

        // Edit menu item.
        $('body').on('click', root + ' ' + SELECTOR.EDITMENUITEM, function() {
            addEditMenuItem(root, $(this).closest(SELECTOR.MENUITEM));
        });

        // Move up menu item.
        $('body').on('click', root + ' ' + SELECTOR.MOVEUPMENUITEM, function() {
            moveMenuItem(root, $(this).closest(SELECTOR.MENUITEM), DIRECTION.UP);
        });

        // Move down menu item.
        $('body').on('click', root + ' ' + SELECTOR.MOVEDOWNMENUITEM, function() {
            moveMenuItem(root, $(this).closest(SELECTOR.MENUITEM), DIRECTION.DOWN);
        });

        // Delete menu item.
        $('body').on('click', root + ' ' + SELECTOR.DELETEMENUITEM, function() {
            $(this).closest(SELECTOR.MENUITEM).remove();
            generateMenuData(root);
        });

        $('body').on('click', root + ' ' + SELECTOR.MENURESET, function() {
            let value = $(this).data('default');
            $(this).next().find('textarea').val(JSON.stringify(value)).trigger('input').trigger('change');
            regenerateMenu(root);
        });
    }

    return {
        init: init
    };
});
