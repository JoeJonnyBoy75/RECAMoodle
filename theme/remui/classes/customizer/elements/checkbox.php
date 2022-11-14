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
 * Theme customizer checkbox element class
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\elements;

defined('MOODLE_INTERNAL') || die;

use stdClass;

/**
 * Checkbox element.
 */
class checkbox extends base {

    /**
     * Return help content if available in options
     * @param  bool        $withdefault If true then default value will shown in help
     * @return bool|string              Boolean false if no help else help steing
     */
    public function get_help($withdefault = true) {
        global $OUTPUT;
        if (isset($this->options['help'])) {
            $help = $this->options['help'];
            $default = get_string('disabled', 'admin');
            if (isset($this->options['options']) && isset($this->options['options']['checked'])) {
                $default = get_string('enabled', 'admin');
            }
            $help = '<strong>' . get_string('default', 'moodle') . ': ' . $default . '</strong><br>' . $help;
            $data = new stdClass;
            $data->ltr = !right_to_left();
            $data->text = $help;
            return $OUTPUT->render_from_template('theme_remui/customizer/help_icon', $data);
        }
        return false;
    }

    /**
     * Process form save
     *
     * @param array $settings Settings
     * @param array $errors   Errors array
     * @return void
     */
    public function process_form_save($settings, &$errors) {
        $name = $this->options['name'];
        foreach ($settings as $setting) {
            if ($setting['name'] == $name) {
                set_config($name, $setting['value'], $this->component);
                return;
            }
        }
        unset_config($name, 'theme_remui');
    }

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

        if (!isset($this->options['options'])) {
            $this->options['options'] = [];
        }

        $value = $default;
        if (isset($this->options['value'])) {
            $value = $this->options['value'];
        }

        if (!isset($this->options['options']['checked'])) {
            if (isset($value)) {
                if (get_config($this->configcomponent, $name) === $value) {
                    $this->options['options']['checked'] = true;
                }
            } else {
                if (get_config($this->configcomponent, $name) != '') {
                    $this->options['options']['checked'] = true;
                }
            }
        }

        return $OUTPUT->render_from_template($this->component . '/customizer/elements/checkbox', [
            'name' => $name,
            'label' => $label,
            'help' => $this->get_help(),
            'default' => $default,
            'value' => $value,
            'type' => 'checkbox',
            'options' => $this->process_options()
        ]);
    }
}
