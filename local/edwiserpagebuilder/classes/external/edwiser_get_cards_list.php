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
 * Trait for edwiser_get_cards_list service
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav Govande
 */

namespace local_edwiserpagebuilder\external;

defined('MOODLE_INTERNAL') || die();

use external_single_structure;
use external_multiple_structure;
use external_function_parameters;
use external_value;
use context_system;
use stdClass;

/**
 * Service definition for create new form
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait edwiser_get_cards_list {

    /**
     * Returns the functional parameter for fetching the blocks list.
     * @return external_function_parameters  Functional parameters
     */
    public static function edwiser_get_cards_list_parameters() {
        return new external_function_parameters(
            array(
                'belongsto' => new external_value( PARAM_RAW, 'Belongs to' ),
                'updatefirst' => new external_value( PARAM_BOOL, "Update first", VALUE_OPTIONAL)
            )
        );
    }

    /**
     * Return the response structure Fetch the blocks list service.
     * @return external_single_structure return structure
     */
    public static function edwiser_get_cards_list_returns() {
        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'id' => new external_value( PARAM_INT, 'Layout ID' ),
                    'title' => new external_value( PARAM_RAW, 'Layout Title' ),
                    'belongsto' => new external_value( PARAM_RAW, 'Layout card belong to' ),
                    'label' => new external_value( PARAM_RAW, 'Layout Label' ),
                    'thumbnail' => new external_value( PARAM_RAW, 'Thumbnail URL' ),
                    'content' => new external_value( PARAM_RAW, 'Content of card, HTML.' ),
                    'version' => new external_value( PARAM_RAW, 'Version Number' ),
                    'updateavailable' => new external_value( PARAM_INT, 'Is update available' ),
                    'visible' => new external_value( PARAM_INT, 'Visible' )
                )
            )
        );
    }

    /**
     * List down the blocks data.
     * @return array  []
     */
    public static function edwiser_get_cards_list($belongsto, $updatefirst = false) {
        global $CFG, $OUTPUT, $PAGE;

        if ($updatefirst) {
            require_once($CFG->dirroot . '/local/edwiserpagebuilder/lib.php');
            local_edwiserpagebuilder_update_block_content();
        }

        require_once($CFG->dirroot . '/blocks/edwiseradvancedblock/lib.php');

        $bm = new \local_edwiserpagebuilder\block_handler();
        $blocks = $bm->get_layouts_list(array("belongsto" => $belongsto), '*'); // Fetching Edwiser Blocks
        $newblocks = array();
        foreach ($blocks as $key => $value) {
            $value->thumbnail = replace_cdn_url($value->thumbnail);
            $newblocks[] = (array) $value;
        }
        // return Layout_list;
        return $newblocks;
    }
}
