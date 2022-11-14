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
 * Theme customizer select element class
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
 * Select element.
 */
class select extends base {

    /**
     * Process form save
     *
     * @param array $settings Settings
     * @param array $errors  Errors array
     * @return void
     */
    public function process_form_save($settings, &$errors) {
        if (!$this->is_multiple()) {
            parent::process_form_save($settings, $errors);
            return;
        }
        $name = $this->options['name'];
        $value = [];
        foreach ($settings as $setting) {
            if ($setting['name'] == $name) {
                $value[] = $setting['value'];
            }
        }
        set_config($name, json_encode($value), $this->get_component_for_config());
    }

    /**
     * Return true if multiple is true
     *
     * @return boolean
     */
    public function is_multiple() {
        return isset($this->options['multiple']) ? $this->options['multiple'] : false;
    }

    /**
     * Return help content if available in options for select element.
     * @param  bool        $withdefault If true then default value will shown in help
     * @return bool|string              Boolean false if no help else help steing
     */
    public function get_help($withdefault = true) {
        global $OUTPUT;
        if (!isset($this->options['help'])) {
            return false;
        }
        if (isset($this->options['default']) && $this->options['default'] != '') {
            $help = '';
            if ($withdefault &&
                (!isset($this->options['withdefault']) ||
                (!isset($this->options['withdefault']) && $this->options['withdefault'])) &&
                isset($this->options['default'])
            ) {
                $selectoptions = $this->options['options'];
                $default = $this->options['default'];
                if (!$this->is_multiple()) {
                    if (strtolower($default) == 'inherit') {
                        $default = isset($selectoptions['inherit']) ? 'inherit' : 'Inherit';
                    }
                    $value = $selectoptions[$default];
                } else {
                    $default = json_decode($default, true);
                    $value = [];
                    foreach ($default as $selected) {
                        $value[] = $selectoptions[$selected];
                    }
                    $value = implode(', ', $value);
                }
                $help .= '<strong>' . get_string('default', 'moodle') . ': ' . $value . '</strong><br>';
            }
            $help .= $this->options['help'];
            $data = new stdClass;
            $data->ltr = !right_to_left();
            $data->text = $help;
            return $OUTPUT->render_from_template('theme_remui/customizer/help_icon', $data);
        }
        return false;
    }

    /**
     * Prepare options for normal select input
     *
     * @param  Array $options Options for select input
     * @param  Mixed $default Default value
     *
     * @return Array
     */
    private function prepare_select_options($options, $default) {
        $selectoptions = [];
        foreach ($options as $key => $value) {
            $option = [
                'key' => $key,
                'value' => $value
            ];
            if ($key == $default) {
                $option['selected'] = 'selected';
            }
            $selectoptions[] = $option;
        }
        return $selectoptions;
    }

    /**
     * Prepare options for select input with multiple enabled
     *
     * @param  Array  $options Options for select input
     * @param  String $default Default value
     *
     * @return Array
     */
    private function prepare_multiple_select_options($options, $default) {
        if (!$default = json_decode($default, true)) {
            $default = [];
        }
        $selectoptions = [];
        foreach ($options as $key => $value) {
            $option = [
                'key' => $key,
                'value' => $value
            ];
            if (array_search($key, $default) !== false) {
                $option['selected'] = 'selected';
            }
            $selectoptions[] = $option;
        }
        return $selectoptions;
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
        if ($this->is_multiple()) {
            $selectoptions = $this->prepare_multiple_select_options($options['options'], $default);
        } else {
            $selectoptions = $this->prepare_select_options($options['options'], $default);
        }

        return $OUTPUT->render_from_template($this->component . '/customizer/elements/select', [
            'name' => $name,
            'label' => $label,
            'help' => $this->get_help(),
            'default' => $default,
            'multiple' => $this->is_multiple(),
            'options' => $selectoptions
        ]);
    }
}
