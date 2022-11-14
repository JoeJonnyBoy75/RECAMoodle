<?php
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
 * Theme customizer header process trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\process;

defined('MOODLE_INTERNAL') || die;

trait header {
    /**
     * Process header
     *
     * @param string $css css content
     * @return string processed css conent
     */
    private function process_header($css) {

        // Brand fontsize.
        $fontsize = $this->get_config('header-site-identity-fontsize', true);
        $css = str_replace('"[[setting:header-site-identity-fontsize]]"', $fontsize['default'] . 'rem', $css);

        // Font size tablet.
        if (isset($fontsize['tablet']) && $fontsize['tablet'] != '') {
            $css .= $this->wrap_responsive(
                "tablet",
                ".navbar .header-sitename .navbar-brand-logo {
                    font-size: " . $fontsize['tablet'] . "rem !important;
                }"
            );
        }

        // Font size mobile.
        if (isset($fontsize['mobile']) && $fontsize['mobile'] != '') {
            $css .= $this->wrap_responsive(
                "mobile",
                ".navbar .header-sitename .navbar-brand-logo {
                    font-size: " . $fontsize['mobile'] . "rem !important;
                }"
            );
        }

        // Border bottom color.
        $borderbottomcolor = $this->get_config('header-primary-border-bottom-color');
        $css = str_replace('"[[setting:header-primary-border-bottom-color]]"', $borderbottomcolor, $css);

        // Header bottom shadow.
        $borderbottomsize = $this->get_config('header-primary-border-bottom-size', true);
        $css = str_replace('"[[setting:header-primary-border-bottom-size]]"', $borderbottomsize['default'] . 'rem', $css);

        // Font size tablet.
        if (isset($borderbottomsize['tablet']) && $borderbottomsize['tablet'] != '') {
            $css .= $this->wrap_responsive(
                "tablet",
                ".navbar {
                    box-shadow: 0 0 4px " . $borderbottomsize['tablet'] . "rem " . $borderbottomcolor . ";
                }"
            );
        }

        // Font size mobile.
        if (isset($borderbottomsize['mobile']) && $borderbottomsize['mobile'] != '') {
            $css .= $this->wrap_responsive(
                "mobile",
                ".navbar {
                    box-shadow: 0 0 4px " . $borderbottomsize['mobile'] . "rem " . $borderbottomcolor . ";
                }"
            );
        }

        $background = $this->get_config('header-menu-background-color');
        if (get_config('theme_remui', 'navbarinverse') == 'navbar-inverse') {
            $background = $this->get_site_primary_color();
        }
        $textcolor = $this->get_config('header-menu-text-color');
        $css = str_replace('"[[setting:header-menu-text-color]]"', $textcolor, $css);

        $hoverbackground = $this->get_config('header-menu-background-hover-color');
        $hovertextcolor = $this->get_config('header-menu-text-hover-color');
        $css .= "

            .navbar-brand .header-logo  span{
                color: {$textcolor} !important;
            }
            .navbar.fixed-top .divider {
                background-color: {$textcolor} !important;
            }
            .navbar-options {
                background: {$background};
            }

            .custom-control-input:checked~.custom-control-label::before {
                background-color: {$background};
            }

            .navbar-options > [data-region=\"drawer-toggle\"] .fa,
            .navbar-options .popover-region .popover-region-toggle .icon,
            .navbar-options .usermenu-container,
            .navbar-options .dropdown .dropdown-toggle,
            .navbar-options > .menu-toggle .fa,
            .navbar-options .right-menu .simplesearchform .nav-link,
            .wdm-custom-menus .nav-item > .nav-link,
            .navbar-options .right-menu .nav-item .nav-link,
            .navbar-options .right-menu .editmode-switch-form,
            .navbar-options .right-menu .editmode-switch-form .text-primary,
            .usermenu-container .userinitials,
            .usermenu-container .dropdown-toggle::after {
                color: {$textcolor} !important;
            }

            .navbar-options > [data-region=\"drawer-toggle\"]:hover,
            .navbar-options > .nav-item:hover,
            .navbar-options > .navbar-nav > .nav-item:hover,
            .navbar-options > .menu-toggle:hover,
            .wdm-custom-menus .nav-item:hover > .nav-link,
            .navbar-options .right-menu .simplesearchform:hover .nav-link,
            .navbar-options .right-menu .editmode-switch-form:hover,
            .navbar-options .usermenu-container:hover {
                background: {$hoverbackground};
            }

            .navbar-options > [data-region=\"drawer-toggle\"]:hover .fa,
            .navbar-options .popover-region:hover .popover-region-toggle .icon,
            .navbar-options > .menu-toggle:hover .fa,
            .navbar-options .right-menu .nav-item:hover .nav-link,
            .wdm-custom-menus .nav-item:hover > .nav-link,
            .navbar-options .right-menu .simplesearchform:hover .nav-link,
            .navbar-options .right-menu .editmode-switch-form:hover .text-primary,
            .navbar-options .usermenu-container:hover,
            .usermenu-container:hover .userinitials,
            .usermenu-container:hover .dropdown-toggle::after,
            .navbar-options .editmode-switch-form:hover   {
                color: {$hovertextcolor} !important;
            }
        ";
        return $css;
    }
}
