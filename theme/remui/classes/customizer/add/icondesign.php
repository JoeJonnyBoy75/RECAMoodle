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
 * Theme customizer Icons trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav G
 */
namespace theme_remui\customizer\add;

defined('MOODLE_INTERNAL') || die;
use moodle_url;
trait icondesign {
    /**
     * Add icondesign settings
     */
    private function add_icondesign_settings() {
        global $PAGE;

        $panel = get_string('iconsettings', 'theme_remui');
        $this->add_panel('icondesign', $panel, 'global');

        $label = get_string('icondesign', 'theme_remui');
        $name = 'icondesign';

        // Icon Setting.
        $this->add_setting(
            'radio',
            $name,
            $label,
            'icondesign',
            [
                'help' => get_string('icondesigndesc', 'theme_remui'),
                'default' => get_config('theme_remui', $name),
                'options' => [
                    [
                        'name' => 'default',
                        'label' => get_string('default', 'theme_remui'),
                        'img' => new moodle_url('/theme/remui/pix/icon_style1.png')
                    ],
                    [
                        'name' => 'remuiicon1',
                        'label' => get_string('icondesign1', 'theme_remui'),
                        'img' => new moodle_url('/theme/remui/pix/icon_style2.png')
                    ],
                    [
                        'name' => 'remuiicon2',
                        'label' => get_string('icondesign2', 'theme_remui'),
                        'img' => new moodle_url('/theme/remui/pix/icon_style3.png')
                    ]
                ]
            ]
        );
    }
}

