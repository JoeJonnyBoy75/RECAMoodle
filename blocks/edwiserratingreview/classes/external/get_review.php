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
 *
 * @package    block_edwiserratingreview
 * @copyright  2022 WisdmLabs
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_edwiserratingreview\external;

use stdClass;
use external_function_parameters;
use external_value;
use external_single_structure;
use external_multiple_structure;
use context_system;
use html_writer;

trait get_review {

    /*
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_review_parameters() {
        // get_review_parameters() always return an external_function_parameters().
        // The external_function_parameters constructor expects an array of external_description.
        return new external_function_parameters(
            // a external_description can be: external_value, external_single_structure or external_multiple structure
            array(
                'contextid'    => new external_value(PARAM_INT, 'contextid for current page')
            )
        );
    }


    /**
     * The function itself
     * @return string welcome message
     */
    public static function get_review($contextid) {
        global $USER;

        $context = \context::instance_by_id($contextid);

        $rm = new \block_edwiserratingreview\ReviewManager();

        $review = $rm->get_review_details_by_params(array("user_id" => $USER->id, "for_id" => $context->instanceid));

        return array(
            "data" => $review ? $review : [],
        );
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_review_returns() {
        return new external_single_structure(
            array(
                "data" => new external_single_structure(
                    array(
                        "id" => new external_value(PARAM_INT, "Review id", VALUE_OPTIONAL),
                        "user_id" => new external_value(PARAM_INT, "Row index", VALUE_OPTIONAL),
                        "star_ratings" => new external_value(PARAM_RAW, "Start rating HTML content", VALUE_OPTIONAL),
                        "review" => new external_value(PARAM_RAW, "Review", VALUE_OPTIONAL),
                        "date_created" => new external_value(PARAM_TEXT, "Review submission date", VALUE_OPTIONAL),
                        "date_updated" => new external_value(PARAM_TEXT, "Review updation date", VALUE_OPTIONAL),
                        "for_type" => new external_value(PARAM_RAW, "Review for", VALUE_OPTIONAL),
                        "for_id" => new external_value(PARAM_RAW, "Review for ID", VALUE_OPTIONAL),
                        "approved" => new external_value(PARAM_RAW, "Aproval status", VALUE_OPTIONAL),
                    )
                ),
                'Reviews list',
                VALUE_DEFAULT,
                []
            )
        );
    }
}
