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
 * Theme customizer header-primary js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/header-primary', ['jquery', './utils'], function($, Utils) {

    /**
     * Selectors
     */
    var SELECTOR = {
        BASE: 'header-primary',
        IFRAME: '#customizer-frame',
        LAYOUTDESKTOP: 'header-primary-layout-desktop',
        BORDERBOTTOMSIZE: 'header-primary-border-bottom-size',
        BORDERBOTTOMCOLOR: 'header-primary-border-bottom-color'
    };

    /**
     * Header border bottom size and color handler.
     */
    function headerBorderColorHandler() {
        let bordersize = $(`[name="${SELECTOR.BORDERBOTTOMSIZE}"]`).val();
        let color = $(`[name="${SELECTOR.BORDERBOTTOMCOLOR}"]`).spectrum('get').toString();

        let content = `
            nav.navbar {
                box-shadow: 0 0 4px ${bordersize}rem ${color};
            }
        `;

        // Tablet.
        bordersize = $(`[name='${SELECTOR.BORDERBOTTOMSIZE}-tablet']`).val();
        if (bordersize != '') {
            content += `\n
                @media screen and (min-width: ${Utils.deviceWidth.mobile + 1}px) and (max-width: ${Utils.deviceWidth.tablet}px) {
                    nav.navbar {
                        box-shadow: 0 0 4px ${bordersize}rem ${color};
                    }
                }
            `;
        }

        // Mobile.
        bordersize = $(`[name='${SELECTOR.BORDERBOTTOMSIZE}-mobile']`).val();
        if (bordersize != '') {
            content += `\n
                @media screen and (max-width: ${Utils.deviceWidth.mobile}px) {
                    nav.navbar {
                        box-shadow: 0 0 4px ${bordersize}rem ${color};
                    }
                }
            `;
        }
        Utils.putStyle(SELECTOR.BASE, content);
    }

    /**
     * Apply settings.
     */
    function apply() {
        let body = $(Utils.getDocument()).find('body');
        let layoutdesktop = $(`[name="${SELECTOR.LAYOUTDESKTOP}"]`).val();
        $(body).removeClass(`
            ${SELECTOR.LAYOUTDESKTOP}-left
            ${SELECTOR.LAYOUTDESKTOP}-right
        `).addClass(`
            ${SELECTOR.LAYOUTDESKTOP}-${layoutdesktop}
        `);
        Utils.showLoader();
        $(SELECTOR.IFRAME).attr('style', 'width: 99% !important;');
        Utils.getWindow().dispatchEvent(new Event('resize'));
        setTimeout(function() {
            $(SELECTOR.IFRAME).removeAttr('style');
            Utils.hideLoader();
        }, 200);
        headerBorderColorHandler();
    }

    /**
     * Initialize events.
     */
    function init() {
        apply();
        $(`[name='${SELECTOR.LAYOUTDESKTOP}']`).on('change', apply);
        $(`
            [name="${SELECTOR.BORDERBOTTOMSIZE}"],
            [name="${SELECTOR.BORDERBOTTOMSIZE}-tablet"],
            [name="${SELECTOR.BORDERBOTTOMSIZE}-mobile"]
        `).on('input', headerBorderColorHandler);
        $(`[name="${SELECTOR.BORDERBOTTOMCOLOR}"]`).on('color.changed', headerBorderColorHandler);
    }

    return {
        init: init,
        apply: apply
    };
});
