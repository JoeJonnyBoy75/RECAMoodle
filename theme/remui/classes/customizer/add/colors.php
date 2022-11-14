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
 * Theme customizer colors trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\add;

defined('MOODLE_INTERNAL') || die;

trait colors {

    /**
     * Add global color settings.
     *
     * @return void
     */
    private function add_global_colors() {
        $this->add_panel('colors', get_string('colors', 'theme_remui'), 'global');

        // Primary color.
        $label = get_string('primary-color', 'theme_remui');
        $this->add_setting(
            'color',
            'sitecolorhex',
            $label,
            'colors',
            [
                'help' => get_string('primary-color_help', 'theme_remui'),
                'default' => $this->get_common_default_color('primary')
            ]
        );

        // Page background color.
        $label = get_string('page-background', 'theme_remui');
        $backgroundselector = 'global-colors-pagebackground';
        $this->add_setting(
            'select',
            $backgroundselector,
            $label,
            'colors',
            [
                'help' => get_string('page-background_help', 'theme_remui'),
                'default' => 'color',
                'options' => [
                    'color' => get_string('color', 'theme_remui'),
                    'gradient' => get_string('gradient', 'theme_remui'),
                    'image' => get_string('image', 'theme_remui')
                ]
            ]
        );

        // Background color.
        $label = get_string('page-background-color', 'theme_remui');
        $name = 'global-colors-pagebackgroundcolor';
        $this->add_setting(
            'color',
            $name,
            $label,
            'colors',
            [
                'help' => get_string('page-background-color_help', 'theme_remui'),
                'default' => $this->get_common_default_color('white')
            ]
        );

        // Gradient color 1.
        $label = get_string('gradient-color1', 'theme_remui');
        $name = 'global-colors-pagebackgroundgradient1';
        $this->add_setting(
            'color',
            'global-colors-pagebackgroundgradient1',
            $label,
            'colors',
            [
                'help' => get_string('gradient-color1_help', 'theme_remui'),
                'default' => $this->get_common_default_color('background')
            ]
        );

        // Gradient color 2.
        $label = get_string('gradient-color2', 'theme_remui');
        $name = 'global-colors-pagebackgroundgradient2';
        $this->add_setting(
            'color',
            'global-colors-pagebackgroundgradient2',
            $label,
            'colors',
            [
                'help' => get_string('gradient-color2_help', 'theme_remui'),
                'default' => $this->get_common_default_color('background')
            ]
        );

        // Background image.
        $label = get_string('page-background-image', 'theme_remui');
        $name = 'global-colors-pagebackgroundimage';
        $this->add_setting(
            'file',
            $name,
            $label,
            'colors',
            [
                'help' => get_string('page-background-image_help', 'theme_remui'),
                'get_url' => true,
                'options' => [
                    'subdirs' => 0,
                    'maxfiles' => 1,
                    'accepted_types' => array('web_image')
                ]
            ]
        );

        // Background image attachment.
        $label = get_string('page-background-imageattachment', 'theme_remui');
        $name = 'global-colors-pagebackgroundimageattachment';
        $this->add_setting(
            'select',
            $name,
            $label,
            'colors',
            [
                'help' => get_string('page-background-imageattachment_help', 'theme_remui'),
                'default' => 'initial',
                'options' => [
                    'inherit' => 'Inherit',
                    'initial' => 'Initial',
                    'local' => 'Local',
                    'scroll' => 'Scroll',
                    'fixed' => 'Fixed',
                ]
            ]
        );
    }
}
