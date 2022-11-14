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
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Sudam Chakor
 */

namespace local_edwiserpagebuilder\external;

defined('MOODLE_INTERNAL') || die();

use external_single_structure;
use external_function_parameters;
use external_value;
use context_system;

/**
 * Service definition for create new form
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait edwiser_delete_media_file {

    /**
     * Returns the functional parameter for create and update form methods.
     * @param  boolean                      $id          true if want to add id in parameters
     * @param  boolean                      $forceupdate If true then add forceupdate to settings array
     * @return external_function_parameters              Functional parameters
     */
    public static function edwiser_delete_media_file_parameters() {
        return new external_function_parameters(
            array(
                'file_id'   => new external_value( PARAM_INT, 'File id to be deleted.' ),
                'file_name' => new external_value( PARAM_TEXT, 'File id to be deleted.' ),
            )
        );
    }

    /**
     * Return the response structure of create and update form services.
     * @return external_single_structure return structure
     */
    public static function edwiser_delete_media_file_returns() {
        return new external_single_structure(
            array(
                'status' => new external_value( PARAM_BOOL, 'Boolean success or fails.' ),
                'msg'    => new external_value( PARAM_TEXT, 'Error or success message.' ),
            )
         );
    }

    /**
     * List down the media from the plugins context.
     * @param  array $limit meida file limit
     * @param  string $offset offset
     * @return array  [media_file_list]
     */
    public static function edwiser_delete_media_file( $file_id, $file_name ) {
        global $USER;
        $context = context_system::instance();
        self::validate_context($context);
        $responce = array(
            'status' => false,
            'msg'    => get_string('failedtodeletefile', 'local_edwiserpagebuilder')
        );
        $fs = get_file_storage();
        $file = $fs->get_file( $context->id, self::$plugin_name, self::$plugin_file_area,  $file_id, '/', $file_name);
        // Delete it if it exists.

        if ($file) {
            if ($USER->id === $file->get_userid()) {
                $deleted = $file->delete();
                if (!$deleted) {
                    $responce['msg'] = $deleted->get_message();
                } else {
                    $responce = array(
                        'status' => true,
                        'msg'    => get_string('filedeletionsuccessful', 'local_edwiserpagebuilder')
                    );
                }
            } else {
                $responce['msg'] = get_string('filedoesnotexist', 'local_edwiserpagebuilder');
            }
        }
        return $responce;
    }
}
