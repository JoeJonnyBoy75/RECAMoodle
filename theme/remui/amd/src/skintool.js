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
"use strict";
define([
    'jquery',
    'core/ajax'
], function(
    $,
    Ajax,
) {
    const DEFAULTHEX = '62a8ea';
    let colorhex;
    const COLORTOHEX = [
        {color: 'primary', hex: '62a8ea'},
        {color: 'brown', hex: '8d6658'},
        {color: 'cyan', hex: '57c7d4'},
        {color: 'green', hex: '46be8a'},
        {color: 'grey', hex: '757575'},
        {color: 'indigo', hex: '677ae4'},
        {color: 'orange', hex: 'f2a654'},
        {color: 'pink', hex: 'f96197'},
        {color: 'purple', hex: '926dde'},
        {color: 'red', hex: 'f96868'},
        {color: 'teal', hex: '3aa99e'}
    ];

    /**
     * Set live color to element having primary color
     * @param {String} color Color hex
     */
    function setLiveColor(color) {
        if ($('#livecolor').length == 0) {
            $('body').append('<style id="livecolor"></style>');
        }
        $('#livecolor').html(
            '.navbar-brand, .nav-inverse, #page-footer, .bg-primary, .btn-primary, .td.today, .form-submit, ' +
            '.page-aside-switch, table.dataTable thead th, table.dataTable tfoot th, .page-item.active .page-link {' +
            ' background-color: #' + color + ' !important;' +
            '}' +
            '.btn-primary, .nav-tabs .nav-link.active, .checkbox-custom input[type=checkbox]:checked+label::before, ' +
            '.radio-custom input[type=radio]:checked+label::before, .page-item.active .page-link {' +
            ' border-color: #' + color + ' !important;' +
            '}' +
            '.text-primary, .nav-tabs .nav-link.active, .nav-tabs .nav-link.active .fa, [data-region="drawer"]:not(.dark) ' +
            '.list-group-item.active, [data-region="drawer"]:not(.dark) .list-group-item.active .icon {' +
            ' color: #' + color + ' !important' +
            '}'
        );
    }

    $('body').on('change', '#skintoolsSiteColor input[type="radio"][name="skintoolsNavbar"]', function() {
        let color = this.value;
        if (color == 'customcolor') {
            $('.site-colorpicker-custom').removeClass('d-none');
            colorhex = $('[name="customcolor"]').val().split('#')[1];
        } else {
            $('.site-colorpicker-custom').addClass('d-none');
            // Update sitecolor.
            // Update sitecolor hex.
            colorhex = COLORTOHEX.filter(el => el.color == color);
            if (colorhex.length) {
                colorhex = colorhex[0].hex;
            } else {
                colorhex = DEFAULTHEX;
            }
        }
        updateSetting('sitecolor', color);
        updateSetting('sitecolorhex', colorhex);
        setLiveColor(colorhex);
    });

    /**
     * Update setting in database
     * @param  {String} configname  Configuration name
     * @param  {String} configvalue Configuration value
     */
    function updateSetting(configname, configvalue) {
        let serviceName = 'theme_remui_set_setting';
        Ajax.call([{
            methodname: serviceName,
            args: {
                configname: configname,
                configvalue: configvalue
            }
        }]);
    }

    $(document).on('change', '.site-colorpicker', function() {
        let color = this.value.split('#')[1];
        updateSetting('sitecolor', 'customcolor');
        updateSetting('sitecolorhex', color);
        setLiveColor(color);
    });

    $('#skintoolsNavbar-inverse').on('change', function() {
        let inverse = this.value;
        let color;
        if (!this.checked) {
            inverse = "";
            color = "ffffff";
        } else {
            color = colorhex;
        }
        updateSetting('navbarinverse', inverse);
        $('.navbar').toggleClass('nav-inverse');
        if (colorhex != undefined) {
            $('.navbar').css('background-color', '#' + color + ' !important');
        }
    });

    $('#skintoolsSidebar input[type="radio"][name="skintoolsSidebar"]').on('change', function() {
        let color = this.value;
        if (color == 'site-menubar-light') {
            $('#nav-drawer').removeClass('dark');
            updateSetting('sidebarcolor', 'site-menubar-light');
        } else {
            $('#nav-drawer').addClass('dark');
            updateSetting('sidebarcolor', '');
        }
    });
});
