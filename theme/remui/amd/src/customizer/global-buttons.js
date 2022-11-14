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
 * Theme customizer global-buttons js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/global-buttons', ['jquery', './utils'], function($, Utils) {

    /**
     * Primary button selectors
     */
    var PRIMARY = {
        BASE: 'button-primary',
        BORDERWIDTH: 'button-primary-border-width',
        BORDERRADIUS: 'button-primary-border-radius',
        FONTFAMILY: 'button-primary-fontfamily',
        FONTSIZE: 'button-primary-fontsize',
        FONTWEIGHT: 'button-primary-fontweight',
        TEXTTRANSFORM: 'button-primary-text-transform',
        LINEHEIGHT: 'button-primary-lineheight',
        LETTERSPACING: 'button-primary-letterspacing',
        PADDINGTOP: 'button-primary-padingtop',
        PADDINGRIGHT: 'button-primary-padingright',
        PADDINGBOTTOM: 'button-primary-padingbottom',
        PADDINGLEFT: 'button-primary-padingleft'
    };

    /**
     * Secondary button selectors
     */
    var SECONDARY = {
        BASE: 'button-secondary',
        TEXTCOLOR: 'button-secondary-color-text',
        TEXTHOVERCOLOR: 'button-secondary-color-texthover',
        BACKGROUNDCOLOR: 'button-secondary-color-background',
        BACKGROUNDHOVERCOLOR: 'button-secondary-color-backgroundhover',
        BORDERWIDTH: 'button-secondary-border-width',
        BORDERCOLOR: 'button-secondary-border-color',
        BORDERHOVERCOLOR: 'button-secondary-border-hovercolor',
        BORDERRADIUS: 'button-secondary-border-radius',
        FONTFAMILY: 'button-secondary-fontfamily',
        FONTSIZE: 'button-secondary-fontsize',
        FONTWEIGHT: 'button-secondary-fontweight',
        TEXTTRANSFORM: 'button-secondary-text-transform',
        LINEHEIGHT: 'button-secondary-lineheight',
        LETTERSPACING: 'button-secondary-letterspacing',
        PADDINGTOP: 'button-secondary-padingtop',
        PADDINGRIGHT: 'button-secondary-padingright',
        PADDINGBOTTOM: 'button-secondary-padingbottom',
        PADDINGLEFT: 'button-secondary-padingleft'
    };

    /**
     * Secondary button selectors
     */
    var DEFAULT = {
        BASE: 'button-default',
        TEXTCOLOR: 'button-default-color-text',
        TEXTHOVERCOLOR: 'button-default-color-texthover',
        BACKGROUNDCOLOR: 'button-default-color-background',
        BACKGROUNDHOVERCOLOR: 'button-default-color-backgroundhover',
        BORDERWIDTH: 'button-default-border-width',
        BORDERCOLOR: 'button-default-border-color',
        BORDERHOVERCOLOR: 'button-default-border-hovercolor',
        BORDERRADIUS: 'button-default-border-radius',
        FONTFAMILY: 'button-default-fontfamily',
        FONTSIZE: 'button-default-fontsize',
        FONTWEIGHT: 'button-default-fontweight',
        TEXTTRANSFORM: 'button-default-text-transform',
        LINEHEIGHT: 'button-default-lineheight',
        LETTERSPACING: 'button-default-letterspacing',
        PADDINGTOP: 'button-default-padingtop',
        PADDINGRIGHT: 'button-default-padingright',
        PADDINGBOTTOM: 'button-default-padingbottom',
        PADDINGLEFT: 'button-default-padingleft'
    };

    /**
     * Process mobile settings.
     * @param {String} type     Button type.
     * @param {Object} SELECTOR Selector object.
     * @param {String} device   Target device
     *
     * @return {String} content
     */
    function processResponsiveSettings(type, SELECTOR, device) {
        // Mobile
        let content = '';
        switch (device) {
            case 'mobile':
                content += `\n@media screen and (max-width: ${Utils.deviceWidth.mobile}px) {`;
                break;
            case 'tablet':
                content += `\n@media screen and (min-width: ${Utils.deviceWidth.mobile + 1}px)
                and (max-width: ${Utils.deviceWidth.tablet}px) {`;
                break;
        }
        content += `
                .btn-${type} {
        `;
        // Font size.
        let fontSize = $(`[name='${SELECTOR.FONTSIZE}-${device}']`).val();
        if (fontSize != '') {
            content += `\n
                font-size: ${fontSize}rem;
            `;
        }

        // Padding top.
        let paddingTop = $(`[name='${SELECTOR.PADDINGTOP}-${device}']`).val();
        if (paddingTop != '') {
            content += `\n
                padding-top: ${paddingTop}rem;
            `;
        }

        // Padding right.
        let paddingRight = $(`[name='${SELECTOR.PADDINGRIGHT}-${device}']`).val();
        if (paddingRight != '') {
            content += `\n
                padding-right: ${paddingRight}rem;
            `;
        }

        // Padding bottom.
        let paddingBottom = $(`[name='${SELECTOR.PADDINGBOTTOM}-${device}']`).val();
        if (paddingBottom != '') {
            content += `\n
                padding-bottom: ${paddingBottom}rem;
            `;
        }

        // Padding left.
        let paddingLeft = $(`[name='${SELECTOR.PADDINGLEFT}-${device}']`).val();
        if (paddingLeft != '') {
            content += `\n
                padding-left: ${paddingLeft}rem;
            `;
        }

        content += `\n}
        }\n`;
        return content;
    }

    /**
     * Process common settings.
     * @param {String} type Type of button
     * @param {Object} SELECTOR Selector object
     * @return {String}
     */
    function processCommonSettings(type, SELECTOR) {
        let borderWidth = $(`[name='${SELECTOR.BORDERWIDTH}']`).val();
        let borderRadius = $(`[name='${SELECTOR.BORDERRADIUS}']`).val();
        let textTransform = $(`[name='${SELECTOR.TEXTTRANSFORM}']`).val();
        let letterSpacing = $(`[name='${SELECTOR.LETTERSPACING}']`).val();
        let fontFamily = $(`[name='${SELECTOR.FONTFAMILY}']`).val();
        let content = '';

        // Font family.
        if (fontFamily != 'default') {
            if (fontFamily == 'Standard') {
                fontFamily = 'Roboto';
            }
            content += `
                @import url('https://fonts.googleapis.com/css2?family=${fontFamily.replaceAll(' ', '+')}&display=swap');
            `;
        }
        content += `
            .btn-${type} {
                border-width: ${borderWidth}rem;
                border-radius: ${borderRadius}rem;
                text-transform: ${textTransform};
                letter-spacing: ${letterSpacing}rem;
        `;

        // Font family.
        if (fontFamily != 'default') {
            content += `\n
            font-family: "${fontFamily}",sans-serif;
            `;
        }

        // Font size.
        let fontSize = $(`[name='${SELECTOR.FONTSIZE}']`).val();
        if (fontSize != '') {
            content += `\n
            font-size: ${fontSize}rem;
            `;
        }

        // Font weight.
        let fontWeight = $(`[name='${SELECTOR.FONTWEIGHT}']`).val();
        if (fontWeight != 'default') {
            content += `\n
            font-weight: ${fontWeight};
            `;
        }

        // Line height.
        let lineHeight = $(`[name='${SELECTOR.LINEHEIGHT}']`).val();
        if (lineHeight) {
            content += `\n
            line-height: ${lineHeight};
            `;
        }

        // Padding top.
        let paddingTop = $(`[name='${SELECTOR.PADDINGTOP}']`).val();
        if (paddingTop != '') {
            content += `\n
            padding-top: ${paddingTop}rem;
            `;
        }

        // Padding right.
        let paddingRight = $(`[name='${SELECTOR.PADDINGRIGHT}']`).val();
        if (paddingRight != '') {
            content += `\n
            padding-right: ${paddingRight}rem;
            `;
        }

        // Padding bottom.
        let paddingBottom = $(`[name='${SELECTOR.PADDINGBOTTOM}']`).val();
        if (paddingBottom != '') {
            content += `\n
            padding-bottom: ${paddingBottom}rem;
            `;
        }

        // Padding left.
        let paddingLeft = $(`[name='${SELECTOR.PADDINGLEFT}']`).val();
        if (paddingLeft != '') {
            content += `\n
                padding-left: ${paddingLeft}rem;
            `;
        }

        content += `\n
        }`;

        return content;
    }

    /**
     * Process primary button settings.
     */
    function processPrimary() {

        let content = '';

        // Process common settings.
        content += processCommonSettings('primary', PRIMARY);

        // Tablet
        content += processResponsiveSettings('primary', PRIMARY, 'tablet');

        // Mobile
        content += processResponsiveSettings('primary', PRIMARY, 'mobile');

        Utils.putStyle(PRIMARY.BASE, content);
    }

    /**
     * Process secondary button settings.
     */
    function processSecondary() {
        let textColor = $(`[name='${SECONDARY.TEXTCOLOR}']`).spectrum('get').toString();
        let textHoverColor = $(`[name='${SECONDARY.TEXTHOVERCOLOR}']`).spectrum('get').toString();
        let backgroundColor = $(`[name='${SECONDARY.BACKGROUNDCOLOR}']`).spectrum('get').toString();
        let backgroundHoverColor = $(`[name='${SECONDARY.BACKGROUNDHOVERCOLOR}']`).spectrum('get').toString();
        let borderColor = $(`[name='${SECONDARY.BORDERCOLOR}']`).spectrum('get').toString();
        let borderHoverColor = $(`[name='${SECONDARY.BORDERHOVERCOLOR}']`).spectrum('get').toString();

        let content = '';

        // Process common settings.
        content += processCommonSettings('secondary', SECONDARY);

        content += `
            .btn-secondary:hover {
                color: ${textHoverColor};
                background: ${backgroundHoverColor};
                border-color: ${borderHoverColor};
            }
            .btn-secondary {
                color: ${textColor};
                background: ${backgroundColor};
                border-color: ${borderColor};
            }
        `;

        // Tablet
        content += processResponsiveSettings('secondary', SECONDARY, 'tablet');

        // Mobile
        content += processResponsiveSettings('secondary', SECONDARY, 'mobile');

        Utils.putStyle(SECONDARY.BASE, content);
    }

    /**
     * Process default button settings.
     */
    function processDefault() {
        let textColor = $(`[name='${DEFAULT.TEXTCOLOR}']`).spectrum('get').toString();
        let textHoverColor = $(`[name='${DEFAULT.TEXTHOVERCOLOR}']`).spectrum('get').toString();
        let backgroundColor = $(`[name='${DEFAULT.BACKGROUNDCOLOR}']`).spectrum('get').toString();
        let backgroundHoverColor = $(`[name='${DEFAULT.BACKGROUNDHOVERCOLOR}']`).spectrum('get').toString();
        let borderColor = $(`[name='${DEFAULT.BORDERCOLOR}']`).spectrum('get').toString();
        let borderHoverColor = $(`[name='${DEFAULT.BORDERHOVERCOLOR}']`).spectrum('get').toString();

        let content = '';

        // Process common settings.
        content += processCommonSettings('default', DEFAULT);

        content += `
            .btn-default:hover {
                color: ${textHoverColor} !important;
                background: ${backgroundHoverColor};
                border-color: ${borderHoverColor};
            }
            .btn-default {
                color: ${textColor} !important;
                background: ${backgroundColor};
                border-color: ${borderColor};
            }
        `;

        // Tablet
        content += processResponsiveSettings('default', DEFAULT, 'tablet');

        // Mobile
        content += processResponsiveSettings('default', DEFAULT, 'mobile');

        Utils.putStyle(DEFAULT.BASE, content);
    }

    /**
     * Apply settings.
     */
    function apply() {
        processPrimary();
        processSecondary();
        processDefault();
    }

    /**
     * Initialize common settings.
     * @param {Function} callBack Callback function
     * @param {Object}   SELECTOR Selector object
     */
    function initCommonSettings(callBack, SELECTOR) {
        $(`
            [name='${SELECTOR.BORDERWIDTH}'],
            [name='${SELECTOR.BORDERRADIUS}'],
            [name='${SELECTOR.FONTFAMILY}'],
            [name='${SELECTOR.FONTSIZE}'],
            [name='${SELECTOR.FONTSIZE}-tablet'],
            [name='${SELECTOR.FONTSIZE}-mobile'],
            [name='${SELECTOR.FONTWEIGHT}'],
            [name='${SELECTOR.TEXTTRANSFORM}'],
            [name='${SELECTOR.LINEHEIGHT}'],
            [name='${SELECTOR.LETTERSPACING}'],
            [name='${SELECTOR.PADDINGTOP}'],
            [name='${SELECTOR.PADDINGTOP}-tablet'],
            [name='${SELECTOR.PADDINGTOP}-mobile'],
            [name='${SELECTOR.PADDINGRIGHT}'],
            [name='${SELECTOR.PADDINGRIGHT}-tablet'],
            [name='${SELECTOR.PADDINGRIGHT}-mobile'],
            [name='${SELECTOR.PADDINGBOTTOM}'],
            [name='${SELECTOR.PADDINGBOTTOM}-tablet'],
            [name='${SELECTOR.PADDINGBOTTOM}-mobile'],
            [name='${SELECTOR.PADDINGLEFT}'],
            [name='${SELECTOR.PADDINGLEFT}-tablet'],
            [name='${SELECTOR.PADDINGLEFT}-mobile']
        `).on('input', function() {
            callBack();
        });
    }

    /**
     * Initialize primary button's settings events.
     */
    function initPrimary() {
        initCommonSettings(processPrimary, PRIMARY);
    }

    /**
     * Initialize secondary button's settings events.
     */
    function initSecondary() {
        initCommonSettings(processSecondary, SECONDARY);
        $(`
            [name='${SECONDARY.TEXTCOLOR}'],
            [name='${SECONDARY.TEXTHOVERCOLOR}'],
            [name='${SECONDARY.BACKGROUNDCOLOR}'],
            [name='${SECONDARY.BACKGROUNDHOVERCOLOR}'],
            [name='${SECONDARY.BORDERCOLOR}'],
            [name='${SECONDARY.BORDERHOVERCOLOR}']
        `).on('color.changed', function() {
            processSecondary();
        });
    }

    /**
     * Initialize default button's settings events.
     */
    function initDefault() {
        initCommonSettings(processDefault, DEFAULT);
        $(`
            [name='${DEFAULT.TEXTCOLOR}'],
            [name='${DEFAULT.TEXTHOVERCOLOR}'],
            [name='${DEFAULT.BACKGROUNDCOLOR}'],
            [name='${DEFAULT.BACKGROUNDHOVERCOLOR}'],
            [name='${DEFAULT.BORDERCOLOR}'],
            [name='${DEFAULT.BORDERHOVERCOLOR}']
        `).on('color.changed', function() {
            processDefault();
        });
    }

    /**
     * Initialize events.
     */
    function init() {
        initPrimary();
        initSecondary();
        initDefault();
    }
    return {
        init: init,
        apply: apply
    };
});
