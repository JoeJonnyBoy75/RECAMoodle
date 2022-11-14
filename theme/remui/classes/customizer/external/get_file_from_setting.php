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
 * Theme customizer get_file_from_setting external service trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\external;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir . "/externallib.php");

use context_user;
use moodle_url;
use external_function_parameters;
use external_single_structure;
use external_value;

/**
 * Save customizer settings in database.
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait get_file_from_setting {
    /**
     * Describes the parameters for get_file_from_setting
     * @return external_function_parameters
     */
    public static function get_file_from_setting_parameters() {
        return new external_function_parameters(
            array (
                'itemid' => new external_value(PARAM_RAW, 'File itemid'),
            )
        );
    }

    /**
     * Save order of sections in array of configuration format
     * @param  Integer $itemid File item id
     * @return String          File url
     */
    public static function get_file_from_setting($itemid) {
        global $USER;

        $context = context_user::instance($USER->id);

        $fs = get_file_storage();

        $files = $fs->get_area_files($context->id, 'user', 'draft', $itemid);

        if (count($files) > 0) {
            foreach ($files as $file) {
                if ($file->get_filename() != '.') {
                    return moodle_url::make_draftfile_url(
                        $itemid,
                        $file->get_filepath(),
                        $file->get_filename()
                    )->out();
                }
            }
        }

        return '';
    }

    /**
     * Describes the get_file_from_setting return value
     * @return external_value
     */
    public static function get_file_from_setting_returns() {
        return new external_value(PARAM_URL, 'File url', VALUE_DEFAULT, '');
    }
}
