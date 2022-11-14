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
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/global-body', ['jquery', './utils'], function($, Utils) {

    var SELECTOR = {
        BASE: 'global-typography-body',
        FONTFAMILY: 'global-typography-body-fontfamily',
        FONTSIZE: 'global-typography-body-fontsize',
        FONTWEIGHT: 'global-typography-body-fontweight',
        TEXTTRANSFORM: "global-typography-body-text-transform",
        LINEHEIGHT: "global-typography-body-lineheight",
        TEXTCOLOR: "global-typography-body-textcolor",
        LINKCOLOR: "global-typography-body-linkcolor",
        LINKHOVERCOLOR: "global-typography-body-linkhovercolor"
    };

    /**
     * Get body text color css content.
     * @returns {String}
     */
    function getTextColorContent() {
        let color = $(`[name='${SELECTOR.TEXTCOLOR}']`).spectrum('get').toString();
        return `
            body, input:not([class*='btn-']), select, .dropdown-item, .text-muted, textarea, td {
                color: ${color};
            }
            input[type="checkbox"] {
                border-color: ${color};
            }
            .btn-outline-secondary:not(:disabled):not(.disabled).active,
            .btn-outline-secondary:not(:disabled):not(.disabled):active,
            .show>.btn-outline-secondary.dropdown-toggle {
                color: white;
            }
        `;
    }

    /**
     * Get body link color css content.
     * @returns {String}
     */
    function getLinkColorContent() {
        let linkColor = $(`[name='${SELECTOR.LINKCOLOR}']`).spectrum('get').toString();
        let linkHoverColor = $(`[name='${SELECTOR.LINKHOVERCOLOR}']`).spectrum('get').toString();
        return `
            a {
                color: ${linkColor};
            }
            a:hover {
                color: ${linkHoverColor};
            }
        `;
    }

    /**
     * Get global font name.
     * @return {String} Font name
     */
     function getGlobalFont() {
        let fontFamily = $(`[name='${SELECTOR.FONTFAMILY}']`).val();
        if (fontFamily.toLocaleLowerCase() == 'inherit' || fontFamily.toLocaleLowerCase() == 'standard') {
            // eslint-disable-next-line no-undef
            if (remuiFontSelect == 1) {
                return 'Roboto';
            }
            // eslint-disable-next-line no-undef
            if (remuiFontName == '') {
                return 'Roboto';
            }
            // eslint-disable-next-line no-undef
            return remuiFontName;
        }
        return fontFamily;
    }

    /**
     * Get site body content.
     * @return {string} site body content
     */
    function getContent() {
        let fontFamily = getGlobalFont();
        let fontSize = $(`[name='${SELECTOR.FONTSIZE}']`).val();
        let fontWeight = $(`[name='${SELECTOR.FONTWEIGHT}']`).val();
        let textTransform = $(`[name='${SELECTOR.TEXTTRANSFORM}']`).val();
        let lineHeight = $(`[name='${SELECTOR.LINEHEIGHT}']`).val();

        let content = `
            @import url('https://fonts.googleapis.com/css2?family=${fontFamily.replaceAll(' ', '+')}&display=swap');
            html {
                font-size: ${fontSize}px;
                text-transform: ${textTransform};
            }
            body {
                font-family: "${fontFamily}",sans-serif;
                line-height: ${lineHeight};
                font-weight: ${fontWeight};
            }
        `;

        // Tablet.
        fontSize = $(`[name='${SELECTOR.FONTSIZE}-tablet']`).val();
        if (fontSize != '') {
            content += `\n
                @media screen and (min-width: ${Utils.deviceWidth.mobile + 1}px) and (max-width: ${Utils.deviceWidth.tablet}px) {
                    html {
                        font-size: ${fontSize}px;
                    }
                }
            `;
        }

        // Mobile.
        fontSize = $(`[name='${SELECTOR.FONTSIZE}-mobile']`).val();
        if (fontSize != '') {
            content += `\n
                @media screen and (max-width: ${Utils.deviceWidth.mobile}px) {
                    html {
                        font-size: ${fontSize}px;
                    }
                }
            `;
        }
        return content;
    }

    /**
     * Apply settings.
     */
    function apply() {
        Utils.putStyle(SELECTOR.BASE, getContent());
        Utils.putStyle(SELECTOR.TEXTCOLOR, getTextColorContent());
        Utils.putStyle(SELECTOR.LINKCOLOR, getLinkColorContent());
    }

    /**
     * Initialize events.
     */
    function init() {

        // Color observer.
        $(`
            [name='${SELECTOR.TEXTCOLOR}'],
            [name='${SELECTOR.LINKCOLOR}'],
            [name='${SELECTOR.LINKHOVERCOLOR}']
        `).bind('color.changed', function() {
            apply();
        });

        $(`
            [name='${SELECTOR.FONTSIZE}'],
            [name='${SELECTOR.FONTSIZE}-tablet'],
            [name='${SELECTOR.FONTSIZE}-mobile'],
            [name='${SELECTOR.FONTWEIGHT}'],
            [name='${SELECTOR.TEXTTRANSFORM}'],
            [name='${SELECTOR.LINEHEIGHT}'],
            [name='${SELECTOR.FONTFAMILY}']
        `).on('input', function() {
            apply();
        });
    }

    return {
        init: init,
        apply: apply
    };
});
