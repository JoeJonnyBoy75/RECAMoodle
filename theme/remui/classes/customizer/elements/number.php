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
 * Theme customizer number element class
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\elements;

defined('MOODLE_INTERNAL') || die;

/**
 * Number setting element.
 */
class number extends base {

    /**
     * Prepare the output for the setting
     *
     * @return string element output
     */
    public function output() {
        global $OUTPUT;
        $options = $this->options;
        $name = $options['name'];
        $label = isset($options['label']) ? $options['label'] : get_string($name, $this->component);
        $default = $this->get_config($name);

        $templatecontext = [];
        $templatecontext[] = [
            'name' => $name,
            'label' => $label,
            'help' => $this->get_help(),
            'default' => $default,
            'type' => 'number',
            'options' => $this->process_options()
        ];

        if (isset($options['responsive']) && $options['responsive'] == true) {
            $templatecontext[0]['classes'] = 'setting-desktop';

            $tablet = $name . '-tablet';
            $tabletlabel = $label . ' - ' . get_string('tablet', 'theme_remui');
            $default = $this->get_config($tablet);

            $templatecontext[] = [
                'name' => $tablet,
                'label' => $tabletlabel,
                'help' => $this->get_help(false),
                'default' => $default,
                'type' => 'number',
                'classes' => 'setting-tablet',
                'options' => $this->process_options()
            ];

            $mobile = $name . '-mobile';
            $mobilelabel = $label . ' - ' . get_string('mobile', 'theme_remui');
            $default = $this->get_config($tablet);

            $templatecontext[] = [
                'name' => $mobile,
                'label' => $mobilelabel,
                'help' => $this->get_help(false),
                'default' => $default,
                'type' => 'number',
                'classes' => 'setting-mobile',
                'options' => $this->process_options()
            ];
        }

        return $OUTPUT->render_from_template($this->component . '/customizer/elements/input', ['inputs' => $templatecontext]);
    }
}
