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
 * Theme customizer menu element class
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
 * Link menu element.
 */
class menu extends base {

    /**
     * Get config of setting.
     *
     * @param string $name    Setting name
     * @param bool   $devices Get config of all devices
     * @return mixed
     */
    public function get_config($name, $devices = false) {
        $default = isset($this->options['default']) ? $this->options['default'] : '';
        $config = get_config($this->configcomponent, $name);
        if ($config != false) {
            $default = $config;
        }
        if (!$menu = json_decode($default, true)) {
            $menu = [];
        }
        return $menu;
    }

    /**
     * Return help content if available in options
     * @param bool         $withdefault If true then default value will shown in help
     * @return bool|string              Boolean false if no help else help steing
     */
    public function get_help($withdefault = true) {
        global $OUTPUT;
        if (isset($this->options['help'])) {
            $help = $this->options['help'];
            if ($withdefault &&
                (!isset($this->options['withdefault']) ||
                (!isset($this->options['withdefault']) && $this->options['withdefault'])) &&
                isset($this->options['default'])
            ) {
                $default = empty($this->options['default']) ? $this->options['default'] : get_string('emptysettingvalue', 'admin');
                $help = '<strong>' . get_string('default', 'moodle') . ': ' . $default . '</strong><br>' . $help;
            }
            $data = new stdClass;
            $data->ltr = !right_to_left();
            $data->text = $help;
            return $OUTPUT->render_from_template('theme_remui/customizer/help_icon', $data);
        }
        return false;
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

        return $OUTPUT->render_from_template($this->component . '/customizer/elements/menu', [
            'label' => $label,
            'name' => $name,
            'help' => $this->get_help(),
            'default' => json_encode($default),
            'menu' => $default
        ]);
    }
}
