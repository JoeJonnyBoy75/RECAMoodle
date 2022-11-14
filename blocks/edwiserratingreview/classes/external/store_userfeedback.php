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
use external_function_parameters;
use external_single_structure;
use external_multiple_structure;
use external_value;
use stdClass;
trait store_userfeedback {
    public static function store_userfeedback_parameters () {
        return new external_function_parameters(
            // a external_description can be: external_value, external_single_structure or external_multiple structure
            array(
                'starcount' => new external_value(PARAM_INT, 'count of stars', VALUE_REQUIRED),
                'contextid' => new external_value(PARAM_INT, 'contextid', VALUE_REQUIRED),
                'feedbackreview' => new external_value(PARAM_RAW, 'feedback given by user', VALUE_REQUIRED),
                'fortype' => new external_value(PARAM_RAW, 'page layout', VALUE_REQUIRED),
            )
        );
    }
    public static function store_userfeedback($starcount, $contextid, $feedbackreview, $fortype) {
        global $DB, $USER;

        $context = \context::instance_by_id($contextid);

        $rm = new \block_edwiserratingreview\ReviewManager();

        $review = $rm->get_review_details_by_params(array("user_id" => $USER->id, "for_id" => $context->instanceid));

        if ($review) {
            // Update existing record
            if ($review->star_ratings == $starcount && $review->review === $feedbackreview) {
                // Do not update if nothing changed.
                $dbchecker = '';
            } else {
                $review->star_ratings = $starcount;
                $review->review = $feedbackreview;
                $review->approved = 0;
                $review->date_updated = time();
                $dbchecker = $DB->update_record('block_edwiserratingreview', $review, $bulk = false);

                $rm->remove_fame_counts($review->id);
            }

        } else {
            // Add new record
            $dataobject = new stdClass();
            $dataobject->user_id = $USER->id;
            $dataobject->star_ratings = $starcount;
            $dataobject->review = $feedbackreview;
            $dataobject->date_created = time();
            $dataobject->date_updated = $dataobject->date_created;
            $dataobject->for_id = $context->instanceid;
            $dataobject->for_type = $fortype;

            $dbchecker = $DB->insert_record('block_edwiserratingreview', $dataobject, $returnid = true, $bulk = false);
        }

        $returnstatment = '';
        if (!empty($dbchecker)) {
            $returnstatment = true;
        } else {
            $returnstatment = false;
        }
        return array(
        'status' => $returnstatment,
        );
    }

    public static function store_userfeedback_returns() {
        return new external_single_structure(
            array(
                'status' => new external_value(PARAM_BOOL, 'Status of completeion or incompletion'),
            )
        );

    }
}
