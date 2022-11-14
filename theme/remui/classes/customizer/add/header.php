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
 * Theme customizer header trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\add;

defined('MOODLE_INTERNAL') || die;

trait header {
    /**
     * Add header settings
     */
    private function header_settings() {
        global $CFG;

        $this->add_panel('header', get_string('header', 'theme_remui'), 'root');
        $this->add_panel('site-identity', get_string('site-identity', 'theme_remui'), 'header');

        // Header desktop layout.
        $label = get_string('logoorsitename', 'theme_remui');
        $name = 'logoorsitename';
        $this->add_setting(
            'select',
            $name,
            $label,
            'site-identity',
            [
                'help' => get_string('logoorsitenamedesc', 'theme_remui'),
                'default' => 'iconsitename',
                'options' => [
                    'logo' => get_string('onlylogo', 'theme_remui'),
                    'logomini' => get_string('logomini', 'theme_remui'),
                    'icononly' => get_string('icononly', 'theme_remui'),
                    'iconsitename' => get_string('iconsitename', 'theme_remui')
                ]
            ]
        );

        // Icon.
        $label = get_string('siteicon', 'theme_remui');
        $this->add_setting(
            'text',
            'siteicon',
            $label,
            'site-identity',
            [
                'help' => get_string('siteicondesc', 'theme_remui'),
                'default' => 'graduation-cap'
            ]
        );

        // Font size.
        $label = get_string('font-size', 'theme_remui');
        $this->add_setting(
            'number',
            'header-site-identity-fontsize',
            $label . ' (rem)',
            'site-identity',
            [
                'help' => get_string('font-size_help', 'theme_remui', get_string('header', 'theme_remui')),
                'default' => '1.171',
                "responsive" => true,
                'options' => [
                    'min' => 0,
                    'step' => 0.01
                ]
            ]
        );

        // Site log.
        $defaultlogo = $CFG->wwwroot . '/theme/remui/pix/logo.png';
        $label = get_string('logo', 'theme_remui');
        $name = 'logo';
        $this->add_setting(
            'file',
            $name,
            $label,
            'site-identity',
            [
                'help' => '<div>Default:<img style="height: 66px;" src="' . $defaultlogo
                . '"/></div>' . get_string('logodesc', 'theme_remui'),
                'description' => get_string('logosize', 'theme_remui'),
                'options' => [
                    'subdirs' => 0,
                    'maxfiles' => 1,
                    'accepted_types' => array('web_image')
                ]
            ]
        );

        // Site log min.
        $label = get_string('logomini', 'theme_remui');
        $defaultlogomini = $CFG->wwwroot . '/theme/remui/pix/logomini.png';
        $name = 'logomini';
        $this->add_setting(
            'file',
            $name,
            $label,
            'site-identity',
            [
                'help' => '<div>Default:<img style="height: 66px;" src="' . $defaultlogomini . '"/></div>'
                . get_string('logominidesc', 'theme_remui'),
                'description' => get_string('logominisize', 'theme_remui'),
                'options' => [
                    'subdirs' => 0,
                    'maxfiles' => 1,
                    'accepted_types' => array('web_image')
                ]
            ]
        );

        $this->add_panel('header-primary', get_string('primary', 'theme_remui'), 'header');

        // Header desktop layout.
        $label = get_string('layout-desktop', 'theme_remui');
        $backgroundselector = 'header-primary-layout-desktop';
        $this->add_setting(
            'select',
            $backgroundselector,
            $label,
            'header-primary',
            [
                'help' => get_string('layout-desktop_help', 'theme_remui'),
                'default' => 'left',
                'options' => [
                    'left' => get_string('header-left', 'theme_remui'),
                    'right' => get_string('header-right', 'theme_remui')
                ]
            ]
        );


        // Border bottom size.
        $label = get_string('border-bottom-size', 'theme_remui');
        $this->add_setting(
            'number',
            'header-primary-border-bottom-size',
            $label,
            'header-primary',
            [
                'help' => get_string('border-bottom-size_help', 'theme_remui'),
                'default' => '0.142',
                'options' => [
                    'min' => 0,
                    'step' => 0.01
                ],
                "responsive" => true
            ]
        );

        // Border bottom color.
        $label = get_string('border-bottom-color', 'theme_remui');
        $name = 'header-primary-border-bottom-color';
        $this->add_setting(
            'color',
            $name,
            $label,
            'header-primary',
            [
                'help' => get_string('border-bottom-color_help', 'theme_remui'),
                'default' => 'rgba(0, 0, 0, 0.25)',
                'options' => [
                    ['key' => 'preferredFormat', 'value' => '\'rgb\''],
                    ['key' => 'showAlpha', 'value' => 'true']
                ]
            ]
        );

        $this->add_panel('header-menu', get_string('menu', 'theme_remui'), 'header');

        // Apply site color to navbar.
        $label = get_string('applynavbarcolor', 'theme_remui');
        $this->add_setting(
            'checkbox',
            'navbarinverse',
            $label,
            'header-menu',
            [
                'help' => get_string('applynavbarcolor_help', 'theme_remui'),
                'default' => 'navbar-inverse'
            ]
        );

        // Header menu default color.
        $this->add_setting(
            'heading_start',
            'header-menu-default',
            get_string('default', 'theme_remui'),
            'header-menu'
        );

        $panel = get_string('header', 'theme_remui') . ' ' . get_string('menu', 'theme_remui');

        // Background color.
        $label = get_string('background-color', 'theme_remui');
        $name = 'header-menu-background-color';
        $this->add_setting(
            'color',
            $name,
            $label,
            'header-menu',
            [
                'help' => get_string('background-color_help', 'theme_remui', $panel .
                '.' . get_string('header-background-color-warning', 'theme_remui')),
                'default' => $this->get_config('navbarinverse') == 'navbar-inverse' ?
                            $this->get_common_default_color('primary') : 'transparent',
                'options' => [
                    ['key' => 'showAlpha', 'value' => 'true']
                ]
            ]
        );

        // Link color.
        $label = get_string('text-color', 'theme_remui');
        $name = 'header-menu-text-color';
        $this->add_setting(
            'color',
            $name,
            $label,
            'header-menu',
            [
                'help' => get_string('text-color_help', 'theme_remui', $panel),
                'default' => $this->get_config('navbarinverse') == 'navbar-inverse' ? 'white' : '#666',
            ]
        );
        // Header menu hover color.
        $this->add_setting(
            'heading_end',
            'header-menu-default-end',
            '',
            'header-menu'
        );

        // Header menu hover color.
        $this->add_setting(
            'heading_start',
            'header-menu-hover',
            get_string('hover', 'theme_remui'),
            'header-menu'
        );

        // Background hover color.
        $label = get_string('background-color', 'theme_remui');
        $name = 'header-menu-background-hover-color';
        $this->add_setting(
            'color',
            $name,
            $label,
            'header-menu',
            [
                'help' => get_string('background-hover-color_help', 'theme_remui', $panel),
                'default' => 'rgba(0, 0, 0, 0.1)',
                'options' => [
                    ['key' => 'preferredFormat', 'value' => '\'rgb\''],
                    ['key' => 'showAlpha', 'value' => 'true']
                ]
            ]
        );

        // Link color.
        $label = get_string('text-color', 'theme_remui');
        $name = 'header-menu-text-hover-color';
        $this->add_setting(
            'color',
            $name,
            $label,
            'header-menu',
            [
                'help' => get_string('text-hover-color_help', 'theme_remui', $panel),
                'default' => $this->get_config('navbarinverse') == 'navbar-inverse' ? 'white' : '#666',
            ]
        );

        // Header menu hover color ned.
        $this->add_setting(
            'heading_end',
            'header-menu-hover-end',
            '',
            'header-menu'
        );
    }
}
