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
 * Theme customizer global-heading js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/global-heading', ['jquery', './utils'], function($, Utils) {

    /**
     * Headings list
     */
    var headings = ['all', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

    /**
     * Selectors
     */
    var SELECTOR = {
        HEADING: 'typography-heading'
    };

    // Add heading in selector.
    headings.forEach(function(heading) {
        SELECTOR['FONTFAMILY' + heading] = `typography-heading-${heading}-fontfamily`;
        SELECTOR['FONTSIZE' + heading] = `typography-heading-${heading}-fontsize`;
        SELECTOR['FONTWEIGHT' + heading] = `typography-heading-${heading}-fontweight`;
        SELECTOR['TEXTTRANSFORM' + heading] = `typography-heading-${heading}-text-transform`;
        SELECTOR['LINEHEIGHT' + heading] = `typography-heading-${heading}-lineheight`;
        SELECTOR['CUSTOMCOLOR' + heading] = `typography-heading-${heading}-custom-color`;
        SELECTOR['TEXTCOLOR' + heading] = `typography-heading-${heading}-textcolor`;
    });

    /**
     * Get site heading content.
     * @param {string} heading Heading tag
     * @return {string} site color content
     */
    function getContent(heading) {

        let fontSize;
        let fontFamily = $(`[name='${SELECTOR['FONTFAMILY' + heading]}']`).val();
        if (fontFamily == '') {
            fontFamily = 'Inherit';
        }
        if (fontFamily.toLowerCase() == 'standard') {
            fontFamily = 'Roboto';
        }

        let tag = heading == 'all' ? 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6' : `${heading}, .${heading}`;
        let content = '';

        if (fontFamily.toLowerCase() != 'inherit') {
            content += `\n@import url('https://fonts.googleapis.com/css2?family=${fontFamily.replaceAll(' ', '+')}&display=swap');`;
        }

        content += `\n
            ${tag} {
        `;

        if (fontFamily.toLowerCase() != 'inherit') {
            content += `\nfont-family: "${fontFamily}",sans-serif`;
            if (heading != 'all') {
                content += ' !important';
            }
            content += ';';
        }

        if (heading != 'all') {
            fontSize = $(`[name='${SELECTOR['FONTSIZE' + heading]}']`).val();
            content += `\nfont-size: ${fontSize}rem;`;
        }

        let fontWeight = $(`[name='${SELECTOR['FONTWEIGHT' + heading]}']`).val();
        if (fontWeight != 'inherit') {
            content += `\nfont-weight: ${fontWeight};`;
        }

        let textTransform = $(`[name='${SELECTOR['TEXTTRANSFORM' + heading]}']`).val();
        if (textTransform != 'inherit') {
            content += `\ntext-transform: ${textTransform};`;
        }

        let lineHeight = $(`[name='${SELECTOR['LINEHEIGHT' + heading]}']`).val();
        if (lineHeight != '') {
            content += `\nline-height: ${lineHeight};`;
        }

        let customcolor = true;
        if (heading != 'all') {
            customcolor = $(`[name='${SELECTOR['CUSTOMCOLOR' + heading]}']`).is(':checked');
            if (customcolor == true) {
                $(`[name='${SELECTOR['TEXTCOLOR' + heading]}']`).closest('.setting-item').slideDown(100);
            } else {
                $(`[name='${SELECTOR['TEXTCOLOR' + heading]}']`).closest('.setting-item').slideUp(100);
            }
        }
        if (customcolor == true) {
            let textColor = $(`[name='${SELECTOR['TEXTCOLOR' + heading]}']`).val();
            content += `\ncolor: ${textColor}`;
            if (heading != 'all') {
                content += ' !important';
            }
            content += ';';
        }

        content += `\n
            }
        `;

        // Tablet.
        if (heading != 'all') {
            fontSize = $(`[name='${SELECTOR['FONTSIZE' + heading]}-tablet']`).val();
            if (fontSize != '') {
                content += `\n
                    @media screen and (min-width: ${Utils.deviceWidth.mobile + 1}px)
                    and (max-width: ${Utils.deviceWidth.tablet}px) {
                        ${tag} {
                            font-size: ${fontSize}rem;
                        }
                    }
                `;
            }
            // Mobile.
            fontSize = $(`[name='${SELECTOR['FONTSIZE' + heading]}-mobile']`).val();
            if (fontSize != '') {
                content += `\n
                    @media screen and (max-width: ${Utils.deviceWidth.mobile}px) {
                        ${tag} {
                            font-size: ${fontSize}rem;
                        }
                    }
                `;
            }
        }
        return content;
    }

    /**
     * Apply settings.
     */
    function apply() {
        headings.forEach(function(heading) {
            Utils.putStyle(SELECTOR.HEADING + heading, getContent(heading));
        });
    }

    /**
     * Initialize events.
     */
    function init() {
        var select = [];
        var color = [];
        headings.forEach(function(heading) {
            select.push(`
                [name='${SELECTOR['FONTFAMILY' + heading]}'],
                [name='${SELECTOR['FONTSIZE' + heading]}'],
                [name='${SELECTOR['FONTSIZE' + heading]}-tablet'],
                [name='${SELECTOR['FONTSIZE' + heading]}-mobile'],
                [name='${SELECTOR['FONTWEIGHT' + heading]}'],
                [name='${SELECTOR['TEXTTRANSFORM' + heading]}'],
                [name='${SELECTOR['LINEHEIGHT' + heading]}'],
                [name='${SELECTOR['CUSTOMCOLOR' + heading]}']
            `);
            color.push(`[name='${SELECTOR['TEXTCOLOR' + heading]}']`);
        });
        $(select.join(', ')).on('input', function() {
            apply();
        });

        $(color.join(', ')).on('color.changed', function() {
            apply();
        });
    }

    return {
        init: init,
        apply: apply
    };
});
