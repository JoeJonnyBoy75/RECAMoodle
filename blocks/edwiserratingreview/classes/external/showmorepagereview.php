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
trait showmorepagereview {
    public static function showmorepagereview_parameters() {
        return new external_function_parameters(
            array(
                'rating' => new external_value(PARAM_INT, 'rating of course'),
            )
        );
    }
    public static function showmorepagereview($rating) {
        global $DB, $OUTPUT;
        $dbdata = new \block_edwiserratingreview\dbhandler();
        $formdata = $dbdata->showallreviews($rating);
        $context = [
            'formdata' => $formdata,
            ];
        return $OUTPUT->render_from_template('block_edwiserratingreview/reviewcard', $context);
        // return $formdata;

    }
    public static function showmorepagereview_returns() {
        return  new external_value(PARAM_RAW, 'rendered review cards html content');

    }
}
