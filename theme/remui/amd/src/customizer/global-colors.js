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
 * Theme customizer global-colors js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/global-colors', ['jquery', './utils'], function($, Utils) {

    var SELECTOR = {
        SITECOLOR: 'sitecolorhex',
        BACKGROUNDCHOOSE: 'global-colors-pagebackground',
        BACKGROUNDCOLOR: 'global-colors-pagebackgroundcolor',
        BACKGROUNDGRAD1: 'global-colors-pagebackgroundgradient1',
        BACKGROUNDGRAD2: 'global-colors-pagebackgroundgradient2',
        BACKGROUNDIMAGE: 'global-colors-pagebackgroundimage',
        BACKGROUNDIMAGEATTACHMENT: 'global-colors-pagebackgroundimageattachment'
    };

    /**
     * Get site color content.
     * @returns {String}
     */
    function getSiteColorContent() {
        let color = $(`[name='${SELECTOR.SITECOLOR}']`).spectrum('get').toString();
        return `.collection thead th, .generaltable thead th, .navbar-brand, .nav-inverse, #page-footer,
        .bg-primary, .btn-primary, .td.today, .drawer-right-toggle button,.drawer-left-toggle button, table.dataTable thead th,
        table.dataTable tfoot th, .page-item.active .page-link {
            background-color: ${color} !important;
        }
        .nav-tabs .nav-link.active, .btn-primary, .checkbox-custom input[type=checkbox]:checked+label::before,
        .radio-custom input[type=radio]:checked+label::before, .page-item.active .page-link {
            border-color: ${color} !important;
        }' +
        .text-primary, .nav-tabs .nav-link.active, .nav-tabs .nav-link.active .fa, [data-region="drawer"]:not(.dark)
        .list-group-item.active, [data-region="drawer"]:not(.dark) .list-group-item.active .icon {
            color: ${color} !important;
        }`;
    }

    /**
     * Handle background color.
     */
    function handleBackground() {
        let color, color1, color2, itemid, attachment;
        $(`
            [name='${SELECTOR.BACKGROUNDCOLOR}'],
            [name='${SELECTOR.BACKGROUNDGRAD1}'],
            [name='${SELECTOR.BACKGROUNDGRAD2}'],
            [name='${SELECTOR.BACKGROUNDIMAGE}'],
            [name='${SELECTOR.BACKGROUNDIMAGEATTACHMENT}']
        `).closest('.setting-item').addClass('d-none');
        switch ($(`[name='${SELECTOR.BACKGROUNDCHOOSE}']`).val()) {
            case 'color':
                $(`[name='${SELECTOR.BACKGROUNDCOLOR}']`).closest('.setting-item').removeClass('d-none');
                color = $(`[name='${SELECTOR.BACKGROUNDCOLOR}']`).spectrum('get').toString();
                Utils.putStyle(SELECTOR.BACKGROUNDCHOOSE, `
                    #page {
                        background-color: ${color};
                    }
                `);
                break;
            case 'gradient':
                $(`
                    [name='${SELECTOR.BACKGROUNDGRAD1}'],
                    [name='${SELECTOR.BACKGROUNDGRAD2}']
                `).closest('.setting-item').removeClass('d-none');
                color1 = $(`[name='${SELECTOR.BACKGROUNDGRAD1}']`).spectrum('get').toString();
                color2 = $(`[name='${SELECTOR.BACKGROUNDGRAD2}']`).spectrum('get').toString();
                Utils.putStyle(SELECTOR.BACKGROUNDCHOOSE, `
                    #page {
                        background: linear-gradient(100deg, ${color1}, ${color2});
                    }
                `);
                break;
            case 'image':
                $(`
                    [name='${SELECTOR.BACKGROUNDIMAGE}'],
                    [name='${SELECTOR.BACKGROUNDIMAGEATTACHMENT}']
                `).closest('.setting-item').removeClass('d-none');
                itemid = $(`[name='${SELECTOR.BACKGROUNDIMAGE}']`).val();
                attachment = $(`[name='${SELECTOR.BACKGROUNDIMAGEATTACHMENT}']`).val();
                Utils.getFileURL(itemid).done(function(response) {
                    if (response == '') {
                        response = M.cfg.wwwroot + '/theme/remui/pix/placeholder.png';
                    }

                    Utils.putStyle(SELECTOR.BACKGROUNDCHOOSE, `
                        #page {
                            background: url('${response}');
                            background-attachment: ${attachment};
                            background-position: top;
                            background-size: ${attachment == 'fixed' ? 'cover' : 'auto'};
                        }
                    `);
                });
                break;
        }
    }

    /**
     * Apply settings.
     */
    function apply() {
        Utils.putStyle(SELECTOR.SITECOLOR, getSiteColorContent());
        handleBackground();
    }

    /**
     * Initialize events.
     */
    function init() {
        // Site color.
        $(`
            [name='${SELECTOR.SITECOLOR}']
        `).bind('color.changed', function() {
            apply();
        });

        $(`
            [name='${SELECTOR.BACKGROUNDCOLOR}'],
            [name='${SELECTOR.BACKGROUNDGRAD1}'],
            [name='${SELECTOR.BACKGROUNDGRAD2}']
        `).on('color.changed', function() {
            handleBackground();
        });

        // Navbar inverse.
        $(`
            [name='${SELECTOR.BACKGROUNDCHOOSE}'],
            [name='${SELECTOR.BACKGROUNDIMAGEATTACHMENT}']
        `).on('input', function() {
            handleBackground();
        });

        // Background image observer.
        Utils.fileObserver($(`[name='${SELECTOR.BACKGROUNDIMAGE}']`).siblings('.filemanager')[0], handleBackground);
    }

    return {
        init: init,
        apply: apply
    };
});
