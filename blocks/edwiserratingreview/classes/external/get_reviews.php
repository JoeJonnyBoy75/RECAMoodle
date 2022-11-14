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
 * @package block_edwiserratingreview
 * @author  2022 WisdmLabs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_edwiserratingreview\external;

use stdClass;
use external_function_parameters;
use external_value;
use external_single_structure;
use external_multiple_structure;
use context_system;
use html_writer;

trait get_reviews {

    /*
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_reviews_parameters() {
        // get_reviews_parameters() always return an external_function_parameters().
        // The external_function_parameters constructor expects an array of external_description.
        return new external_function_parameters(
            // a external_description can be: external_value, external_single_structure or external_multiple structure
            array(
                'start'    => new external_value(PARAM_INT, 'Start index of record'),
                'length'   => new external_value(PARAM_INT, 'Number of records per page'),
                'order'    => new external_value(PARAM_ALPHA, 'Sorting order of date column'),
                'mindate'    => new external_value(PARAM_RAW, 'Date range - min value'),
                'maxdate'    => new external_value(PARAM_RAW, 'Date range - max value'),
                'loadonlypending' => new external_value(PARAM_BOOL, 'Sorting order of date column'),
            )
        );
    }


    /**
     * The function itself
     * @return string welcome message
     */
    public static function get_reviews($start, $length, $order, $mindate, $maxdate, $loadonlypending) {
        global $PAGE;

        $PAGE->set_context(\context_system::instance());

        $rm = new \block_edwiserratingreview\ReviewManager();

        $reviewdata = $rm->get_reviews_by_filter($start, $length, $order, $mindate, $maxdate, $loadonlypending);

        return array(
            "data" => $reviewdata['data'],
            "recordsTotal" => $reviewdata['count'],
            "recordsFiltered" => $reviewdata['count']
        );
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_reviews_returns() {
        return new external_single_structure(
            array(
                "data" => new external_multiple_structure(
                    new external_single_structure(
                        array(
                            "id" => new external_value(PARAM_INT, "Review id"),
                            "user_id" => new external_value(PARAM_INT, "Row index"),
                            "reviewfor" => new external_value(PARAM_RAW, "Review for"),
                            "name" => new external_value(PARAM_RAW, "User name who submitted the review"),
                            "email" => new external_value(PARAM_RAW, "User email id who submitted the reivew"),
                            "review" => new external_value(PARAM_RAW, "Review"),
                            "ratings" => new external_value(PARAM_RAW, "Start rating HTML content"),
                            "date" => new external_value(PARAM_TEXT, "Review submission date"),
                            "action" => new external_value(PARAM_RAW, "Review Action HTML"),
                        )
                    ),
                    'Reviews list',
                    VALUE_DEFAULT,
                    []
                ),
                "recordsTotal" => new external_value(PARAM_INT, "Total records found"),
                "recordsFiltered" => new external_value(PARAM_INT, "Total filtered record")
            )
        );
    }
}
