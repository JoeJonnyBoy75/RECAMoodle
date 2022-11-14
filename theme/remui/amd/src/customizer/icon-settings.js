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
 * Theme customizer global-body js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav G
 */

define('theme_remui/customizer/icon-settings', ['jquery', './utils'], function($, Utils) {

    var SELECTOR = {
        BASE: 'icondesign',
        RADIO: 'cust-sele-input',
        STYLE1: 'remuiicon1',
        STYLE2: 'remuiicon2'
    };
    /**
     * Remove Existing Icon Classes from body tag.
     */
    function removeExistingIconClasses () {
        $(Utils.getDocument()).find('body').removeClass(`${SELECTOR.STYLE1}`);
        $(Utils.getDocument()).find('body').removeClass(`${SELECTOR.STYLE2}`);
    }
    var choosenOption = '';
    /**
     * Apply settings.
     */
    function apply() {

        removeExistingIconClasses();

        $(`input.cust-sele-input.selected[name="radio_${SELECTOR.BASE}"]`).removeClass("selected");
        $(`input.cust-sele-input[name="radio_${SELECTOR.BASE}"]:checked`).addClass("selected");

        choosenOption = $(`input.cust-sele-input[name="radio_${SELECTOR.BASE}"]:checked`).attr("data-value");

        if (choosenOption != 'default') {
            $(Utils.getDocument()).find('body').addClass(choosenOption);
        }

        $(`[name='${SELECTOR.BASE}']`).val(choosenOption); // set the value of select element
    }
    /**
     * Initialize the selector.
     */
    function initSelector() {
        $(`input.cust-sele-input.selected`).click();
        choosenOption = $(`input.cust-sele-input.selected[name="radio_${SELECTOR.BASE}"]`).attr("data-value");
        $(`[name='${SELECTOR.BASE}']`).val(choosenOption);
        apply();
    }

    /**
     * Initialize events.
     */
    function init() {
        initSelector();
        $(`[name='${SELECTOR.BASE}']`).bind('input', function() {
           apply();
        });

        $(`.${SELECTOR.RADIO}`).bind('click', function() {
            apply();
        });
    }

    return {
        init: init,
        apply: apply
    };
});
