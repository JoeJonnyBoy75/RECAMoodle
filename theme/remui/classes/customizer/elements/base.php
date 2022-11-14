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
 * Theme customizer element base class
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\elements;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir . '/formslib.php');

use help_icon;
use stdClass;

/**
 * Customizer setting base class.
 */
abstract class base {

    /**
     * Component
     *
     * @var string
     */
    protected $component = 'theme_remui';

    /**
     * Component name which will be used to get and set condig.
     *
     * @var string
     */
    protected $configcomponent = 'theme_remui';

    /**
     * Options for settings
     *
     * @var array
     */
    protected $options = [];

    /**
     * Constructor
     *
     * @param array $options Setting options
     */
    public function __construct($options = []) {
        $this->options = $options;
        if (isset($options['component'])) {
            $this->configcomponent = $options['component'];
        }
    }

    /**
     * Get setting type
     *
     * @return string
     */
    public function get_type() {
        $class = explode('\\', get_class($this));
        return end($class);
    }

    /**
     * Get css classes for list element
     *
     * @return string
     */
    public function get_css_classes() {
        return 'p-3 m-0';
    }

    /**
     * Return js content if it set in options.
     *
     * @return string
     */
    public function js() {
        if (!isset($this->options['js'])) {
            return false;
        }
        $js = $this->options['js'];
        return $this->wrap_js($js);
    }

    /**
     * Wrap js content with script
     *
     * @param string $content Javascript content
     * @return string
     */
    protected function wrap_js($content) {
        return "<script type='text/javascript'>
            window.addEventListener('load', (event) => {
                " . $content . "
            });
        </script>";
    }

    /**
     * Do not wrap this with list item.
     *
     * @return bool
     */
    public function wrap_item() {
        return true;
    }

    /**
     * Get component for set config
     *
     * @return string
     */
    public function get_component_for_config() {
        return $this->configcomponent == 'core' ? '' : $this->configcomponent;
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
        $found = false;
        foreach ($settings as $setting) {
            if ($setting['name'] == $name) {
                set_config($name, $setting['value'], $this->get_component_for_config());
                $found = true;
                continue;
            }
            if ($setting['name'] == $name . '-tablet') {
                set_config($name . '-tablet', $setting['value'], $this->get_component_for_config());
                $found = true;
                continue;
            }
            if ($setting['name'] == $name . '-mobile') {
                set_config($name . '-mobile', $setting['value'], $this->get_component_for_config());
                $found = true;
                continue;
            }
        }
        if (!$found) {
            unset_config($name, $this->get_component_for_config());
            unset_config($name . '-tablet', $this->get_component_for_config());
            unset_config($name . '-mobile', $this->get_component_for_config());
        }
    }

    /**
     * Options to process
     *
     * @return string Options content
     */
    public function process_options() {
        $content = '';
        if (isset($this->options['options'])) {
            foreach ($this->options['options'] as $key => $value) {
                $content .= "{$key}='{$value}' ";
            }
        }
        return $content;
    }

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
        if ($config !== false) {
            $default = $config;
        }
        if ($devices == true && isset($this->options['responsive']) && $this->options['responsive'] == true) {
            return [
                'default' => $default,
                'tablet' => get_config($this->configcomponent, $name . '-tablet'),
                'mobile' => get_config($this->configcomponent, $name . '-mobile')
            ];
        }
        return $default;
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
                $default = $this->options['default'] != '' ? $this->options['default'] : get_string('emptysettingvalue', 'admin');
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
    abstract protected function output();
}
