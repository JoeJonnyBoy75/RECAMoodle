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
 * Theme customizer save_settings external service trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\external;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir . "/externallib.php");

use theme_remui\customizer\customizer;
use external_function_parameters;
use external_single_structure;
use external_value;

/**
 * Save customizer settings in database.
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait save_settings {
    /**
     * Describes the parameters for save_settings
     * @return external_function_parameters
     */
    public static function save_settings_parameters() {
        return new external_function_parameters(
            array (
                'settings' => new external_value(PARAM_RAW, 'Customizer settings'),
            )
        );
    }

    /**
     * Saving customizer settings to database
     * @param  String $settings All settings
     * @return Array           Status
     */
    public static function save_settings($settings) {
     global $PAGE;
        // $PAGE->set_url($CFG->wwwroot);
        $PAGE->set_url(new \moodle_url('/theme/remui/customizer.php', array()));

        $settings = json_decode($settings, true);
        $customizer = customizer::instance();

        return $customizer->save($settings);
    }

    /**
     * Describes the save_settings return value
     * @return external_value
     */
    public static function save_settings_returns() {
        return new external_single_structure(
            array (
                'status' => new external_value(PARAM_BOOL, 'Save status'),
                'errors' => new external_value(PARAM_RAW, 'Errors found'),
                'message' => new external_value(PARAM_TEXT, 'Error messages'),
            )
        );
    }
}
