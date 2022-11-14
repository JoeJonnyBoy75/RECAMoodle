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
 * Trait for edwiser_delete_block service
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav Govande
 */

namespace local_edwiserpagebuilder\external;

defined('MOODLE_INTERNAL') || die();

use external_single_structure;
use external_function_parameters;
use external_value;
use context_system;
use stdClass;

/**
 * Service definition for create new form
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait edwiser_delete_block {

    /**
     * Returns the functional parameter for fetching the blocks list.
     * @return external_function_parameters  Functional parameters
     */
    public static function edwiser_delete_block_parameters() {
        return new external_function_parameters(
            array(
                'id' => new external_value( PARAM_INT, 'Block OR layout ID' ),
                'islayout' => new external_value( PARAM_BOOL, 'False if it is block, true if it is layout card.' ),
            )
        );
    }

    /**
     * Return the response structure Fetch the blocks list service.
     * @return external_single_structure return structure
     */
    public static function edwiser_delete_block_returns() {
        return new \external_single_structure(
            array(
                'status' => new external_value( PARAM_BOOL, 'Success status - True or False.' )
            )
        );
    }

    /**
     * List down the blocks data.
     * @return array  [limitto, blocks[]]
     */
    public static function edwiser_delete_block($id, $islayout) {
        global $CFG, $OUTPUT, $PAGE;

        $PAGE->set_context(\context_system::instance());

        $bm = new \local_edwiserpagebuilder\block_handler();
        // return $files_list;
        return array( 'status' => $bm->delete_the_block($id, $islayout));
    }
}
