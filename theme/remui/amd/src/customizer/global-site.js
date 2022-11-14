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
 * Theme customizer global-site js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/global-site', ['jquery', './utils'], function($, Utils) {

    /**
     * Selectors
     */
    var SELECTOR = {
        FAVICON: 'faviconurl'
    };

    /**
     * Apply settings.
     */
    function apply() {
        var itemid = $(`[name='${SELECTOR.FAVICON}']`).val();
        Utils.getFileURL(itemid).done(function(response) {
            if (response == '') {
                response = M.cfg.wwwroot + '/theme/remui/pix/favicon.ico';
            }
            $(document).find('[rel="shortcut icon"]').attr('href', response);
        });
    }

    /**
     * Initialize events.
     */
    function init() {
        Utils.fileObserver($(`[name='${SELECTOR.FAVICON}']`).siblings('.filemanager')[0], apply);
    }
    return {
        init: init,
        apply: apply
    };
});
