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
 * Edwiser Importer plugin
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 */

 namespace local_edwisersiteimporter;

defined('MOODLE_INTERNAL') || die;

define("TEMPLATES_LIST", 'https://edwiser.org/edwiserdemoimporter/templates.json');

use stdClass;
use moodle_exception;
use theme_remui\utility;
use core_plugin_manager;

class controller {

    /**
     * Get decoded json data of templates
     *
     * @param  string $type Type of templates
     * @return array
     */
    public function get_templates($type) {
        $transient = get_config('local_edwisersiteimporter', 'transient');
        $templates = get_config('local_edwisersiteimporter', 'templates');

        if (!$transient || $transient < time()) {
            // Fetch templates.
            $templates = utility::url_get_contents(TEMPLATES_LIST);

            // Save templates into plugin config.
            set_config('templates', $templates, 'local_edwisersiteimporter');

            // Set transient for next seventh day.
            set_config('transient', time() + 86400 * 7, 'local_edwisersiteimporter');
        }

        if (!$templates = json_decode($templates, true)) {
            $this->reset_templates();
            return [
                'error' => get_string('invaliddata', 'local_edwisersiteimporter', TEMPLATES_LIST)
            ];
        }

        if (!isset($templates[$type])) {
            return [
                'error' => get_string('invalidtemplatetype', 'local_edwisersiteimporter')
            ];
        }

        return $templates[$type];
    }

    /**
     * Reset templates list.
     *
     * @return void
     */
    public function reset_templates() {
        unset_config('transient', 'local_edwisersiteimporter');
        unset_config('templates', 'local_edwisersiteimporter');
    }

    /**
     * Get view of importer
     *
     * @return void
     */
    public function get_view() {
        global $PAGE, $OUTPUT;

        $output = new stdClass();
        $output->tabs = [];
        $output->content = [];

        // Load homepage templates.
        $pluginman = core_plugin_manager::instance();
        $active = "homepage";
        if (array_key_exists("remuihomepage", $pluginman->get_installed_plugins('local')) &&
        class_exists('\local_remuihomepage\frontpage\section_manager')) {
            $templates = $this->get_templates('homepage');
            if (isset($templates['error'])) {
                $output->error = $templates['error'];
            } else {
                $homepage = new homepage($templates);
                $output->tabs[] = [
                    "id" => "homepage",
                    "label" => get_string('homepage', 'local_edwisersiteimporter'),
                    "active" => $active == "homepage"
                ];
                $output->content[] = [
                    "id" => "homepage",
                    "content" => $homepage->render_templates(),
                    "active" => $active == "homepage"
                ];
            }
        } else {
            $active = "courses";
        }

        // Load course templtes.
        $templates = $this->get_templates('courses');
        if (isset($templates['error'])) {
            $output->error = $templates['error'];
        } else {
            // True if remuiformat installed.
            $remuiformat = array_key_exists("remuiformat", $pluginman->get_installed_plugins('format'));
            $output->tabs[] = [
                "id" => "courses",
                "label" => get_string('courses'),
                "active" => $active == "courses"
            ];
            $output->content[] = [
                "id" => "courses",
                "content" => $OUTPUT->render_from_template('local_edwisersiteimporter/course', [
                    'templates' => $templates,
                    'remuiformat' => $remuiformat
                ]),
                "active" => $active == "courses"
            ];
        }

        $output->config = $CFG;
        return $OUTPUT->render_from_template('local_edwisersiteimporter/main', $output);
    }
}
