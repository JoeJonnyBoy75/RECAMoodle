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
 * Theme customizer header-site-identity js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/header-site-identity', ['jquery', './utils'], function($, Utils) {

    /**
     * Selectors
     */
    var SELECTOR = {
        BASE: 'header-site-identy',
        IDENTITYPREFIX: 'header-site-identity',
        LOGOORSITENAME: 'logoorsitename',
        ICON: 'siteicon',
        FONTSIZE: 'header-site-identity-fontsize',
        LOGO: 'logo',
        LOGOMINI: 'logomini',
        BACKGROUNDCOLOR: 'header-background-color'
    };

    /**
     * Handle site logo selector.
     */
    function logoSelectorHandler() {
        $(`
            [name='${SELECTOR.ICON}'],
            [name='${SELECTOR.FONTSIZE}'],
            [name='${SELECTOR.LOGO}'],
            [name='${SELECTOR.LOGOMINI}'],
            [name='${SELECTOR.BACKGROUNDCOLOR}']
        `).closest('.setting-item').addClass('d-none');
        switch ($(`[name='${SELECTOR.LOGOORSITENAME}']`).val()) {
            case 'logo':
                $(`
                    [name='${SELECTOR.LOGO}']
                `).closest('.setting-item').removeClass('d-none');
                break;
            case 'logomini':
                $(`
                    [name='${SELECTOR.LOGOMINI}']
                `).closest('.setting-item').removeClass('d-none');
                break;
            case 'icononly':
                $(`
                    [name='${SELECTOR.ICON}'],
                    [name='${SELECTOR.FONTSIZE}']
                `).closest('.setting-item').removeClass('d-none');
                break;
            case 'iconsitename':
                $(`
                    [name='${SELECTOR.ICON}'],
                    [name='${SELECTOR.FONTSIZE}']
                `).closest('.setting-item').removeClass('d-none');
                break;
        }
        let body = $(Utils.getDocument()).find('body');
        body.removeClass(`
            ${SELECTOR.IDENTITYPREFIX}-logo
            ${SELECTOR.IDENTITYPREFIX}-logomini
            ${SELECTOR.IDENTITYPREFIX}-icononly
            ${SELECTOR.IDENTITYPREFIX}-iconsitename
        `)
        .addClass(SELECTOR.IDENTITYPREFIX + '-' + $(`[name='${SELECTOR.LOGOORSITENAME}']`).val());
    }

    /**
     * Site logo handler.
     */
    function logoHandler() {
        let body = $(Utils.getDocument()).find('body');

        // Logo.
        let itemid = $(`[name='${SELECTOR.LOGO}']`).val();
        Utils.getFileURL(itemid).done(function(response) {
            if (response == '') {
                response = M.cfg.wwwroot + '/theme/remui/pix/logo.png';
            }
            $(body).find('.navbar .header-logo .navbar-brand-logo.logo').attr('src', response);
            $(body).find('#page-footer .secondary-footer-logo').attr('src', response);
        });

        // Logo mini.
        itemid = $(`[name='${SELECTOR.LOGOMINI}']`).val();
        Utils.getFileURL(itemid).done(function(response) {
            if (response == '') {
                response = M.cfg.wwwroot + '/theme/remui/pix/logomini.png';
            }
            $(body).find('.navbar .header-logo .navbar-brand-logo.logomini').attr('src', response);
        });
    }

    /**
     * Site logo size handler.
     */
    function logoSizeHandler() {
        let body = $(Utils.getDocument()).find('body');
        let fontSize = $(`[name="${SELECTOR.FONTSIZE}"]`).val();
        $(body).find('.navbar .navbar-brand-logo').css('font-size', fontSize + 'rem');
        let content = '';
        // Tablet.
        fontSize = $(`[name='${SELECTOR.FONTSIZE}-tablet']`).val();
        if (fontSize != '') {
            content += `\n
                @media screen and (min-width: ${Utils.deviceWidth.mobile + 1}px) and (max-width: ${Utils.deviceWidth.tablet}px) {
                    .navbar .header-sitename .navbar-brand-logo {
                        font-size: ${fontSize}rem !important;
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
        logoSelectorHandler();
        let icon = $(`[name="${SELECTOR.ICON}"]`).val();
        if (icon == '') {
            icon = 'graduation-cap';
        }
        let body = $(Utils.getDocument()).find('body');
        $(body).find('.navbar .header-sitename .navbar-brand-logo i').attr('class', 'fa fa-' + icon);
        logoSizeHandler();
        logoHandler();
    }

    /**
     * Initialize evetns.
     */
    function init() {
        // Logo mini listener.
        Utils.fileObserver($(`[name='${SELECTOR.LOGO}']`).siblings('.filemanager')[0], logoHandler);

        // Logo listener.
        Utils.fileObserver($(`[name='${SELECTOR.LOGOMINI}']`).siblings('.filemanager')[0], logoHandler);

        // Logo or sitename chooser listener.
        $(`[name='${SELECTOR.LOGOORSITENAME}']`).on('change', function() {
            logoSelectorHandler();
        });

        // Site icon listener.
        $(`[name="${SELECTOR.ICON}"]`).on('input', function() {
            apply();
        });

        // Font size listener.
        $(`
            [name="${SELECTOR.FONTSIZE}"],
            [name="${SELECTOR.FONTSIZE}-tablet"]
        `).on('input', logoSizeHandler);
    }

    return {
        init: init,
        apply: apply
    };
});
