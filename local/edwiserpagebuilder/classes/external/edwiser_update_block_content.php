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
 * @author Gourav Govande
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
trait edwiser_update_block_content {
    /**
     * Returns the functional parameter for fetching the blocks list.
     * @param  int $blockname   Block name of block to be updated.
     * @return external_function_parameters  Functional parameters
     */
    public static function edwiser_update_block_content_parameters() {
        return new external_function_parameters(
            array(
                'blockname' => new external_value(PARAM_TEXT, 'Block name of block to be updated'),
                'islayout' => new external_value(PARAM_BOOL, 'Is Block/ Card'),
            )
        );
    }

    /**
     * Return the response structure Fetch the blocks list service.
     * @return external_single_structure return structure
     */
    public static function edwiser_update_block_content_returns() {
        return new \external_single_structure(
            array (
                'status' => new external_value( PARAM_BOOL, 'Boolean success or fails.' ),
                'msg' => new external_value( PARAM_TEXT, 'Ajax Success/ Failure message.' )
            )
        );
    }

    /**
     * Update the block content give name
     * @param  blockname Name of the block
     * @return array  [status, msg
     */
    public static function edwiser_update_block_content( $blockname, $islayout = false ) {
        $context = \context_system::instance();
        self::validate_context($context);
        $cm = new \local_edwiserpagebuilder\content_manager();
        $status = $cm->update_block_content_by_name($blockname, $islayout);
        $error = true;
        if ($status == true) {
            $error = false;
            $status = get_string("blockupdatesuccess", "local_edwiserpagebuilder");
        }

        // return $files_list;
        return array(
            'status' => $error,
            'msg' => $status
        );
    }
}
