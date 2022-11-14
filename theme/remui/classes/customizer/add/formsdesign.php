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
 * Theme customizer buttons trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav G
 */
namespace theme_remui\customizer\add;

defined('MOODLE_INTERNAL') || die;
use moodle_url;
trait formsdesign {
    /**
     * Add formsdesign settings
     */
    private function add_formsdesign_settings() {
        global $PAGE;
        $panel = get_string('formsettings', 'theme_remui');
        $this->add_panel('formsdesign', $panel, 'global');

        $this->add_panel('formselementdesign', get_string('formselementdesign', 'theme_remui'), 'formsdesign');

        $this->add_formdesign_settings();

        list($tag, $formssettings) = \theme_remui\toolbox::get_form_style_data();

        $PAGE->requires->data_for_js('formssettings', $formssettings);
        $PAGE->requires->data_for_js('formssettingtag', $tag);
    }

    private function add_formdesign_settings() {
        // Header desktop layout.
        $label = get_string('formselementdesign', 'theme_remui');
        $name = 'formselementdesign';

        // Icon Setting.
        $this->add_setting(
            'radio',
            $name,
            $label,
            'formselementdesign',
            [
                'help' => get_string('formsdesigndesc', 'theme_remui'),
                'default' => get_config('theme_remui', $name),
                'options' => [
                    [
                        'name' => 'default',
                        'label' => get_string('default', 'theme_remui'),
                        'img' => new moodle_url('/theme/remui/pix/form_default.png')
                    ],
                    [
                        'name' => 'formsdesign1',
                        'label' => get_string('formsdesign1', 'theme_remui'),
                        'img' => new moodle_url('/theme/remui/pix/form_style1.png')
                    ],
                    [
                        'name' => 'formsdesign3',
                        'label' => get_string('formsdesign3', 'theme_remui'),
                        'img' => new moodle_url('/theme/remui/pix/form_style3.png')
                    ]
                ]
            ]
        );
    }

}

