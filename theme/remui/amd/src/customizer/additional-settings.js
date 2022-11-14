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
 * Theme customizer additional-settings js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/additional-settings', ['jquery', './utils'], function($, Utils) {

    /**
     * Selectors
     */
    var SELECTOR = {
        CUSTOMCSS: 'customcss'
    };

    /**
     * Apply settings.
     */
    function apply() {
        Utils.putStyle(SELECTOR.CUSTOMCSS, $(`[name='${SELECTOR.CUSTOMCSS}']`).val());
    }

    /**
     * Initialize events.
     */
    function init() {
        $(`[name='${SELECTOR.CUSTOMCSS}']`).on('input', function() {
            apply();
        });
    }
    return {
        init: init,
        apply: apply
    };
});
