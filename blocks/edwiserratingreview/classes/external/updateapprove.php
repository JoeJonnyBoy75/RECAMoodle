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

trait updateapprove {

    /*
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function updateapprove_parameters() {
        // get_reviews_parameters() always return an external_function_parameters().
        // The external_function_parameters constructor expects an array of external_description.
        return new external_function_parameters(
            array(
                'reviewid' => new external_value(PARAM_INT, 'reviewid of the review'),
                'approvevalue' => new external_value(PARAM_INT, 'value of approve field in db'),
                'approveflag' => new external_value(PARAM_BOOL, 'it will indicate approve value will be updated or deleted'),
            )
        );
    }


    /**
     * The function itself
     * @return string welcome message
     */
    public static function updateapprove($reviewid, $approvevalue, $approveflag) {
        global $PAGE, $DB;
        $table = 'block_edwiserratingreview';
        $dataresponse  = false;
        $PAGE->set_context(\context_system::instance());

        if($approveflag == true){
            $rm = new \block_edwiserratingreview\ReviewManager();
            $review = $rm->get_review_details_by_id($reviewid);
            $review->approved = $approvevalue;
            $DB->update_record($table, $review);
                $dataresponse = true;
        }

        if($approveflag == false){
            $DB->delete_records($table, array('id' => $reviewid));
            $dataresponse = false;
        }

        return $dataresponse;
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function updateapprove_returns() {
        return new external_value(PARAM_RAW, 'approve field update status');
    }
}
