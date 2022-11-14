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
 * @package block_remuiblck
 * @author  2022 WisdmLabs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace block_remuiblck\external;

use external_function_parameters;
use external_value;
use context_system;

trait get_course_report {
    /*
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_course_report_parameters() {
        // get_course_report_parameters() always return an external_function_parameters().
        // The external_function_parameters constructor expects an array of external_description.
        return new external_function_parameters(
            // a external_description can be: external_value, external_single_structure or external_multiple structure
                array('courseid' => new external_value(PARAM_INT, 'Course Id'))
        );
    }
    /**
     * The function itself
     * @return string welcome message
     */
    public static function get_course_report($courseid) {
        global $PAGE;
        $PAGE->set_context(context_system::instance());
        $renderer = $PAGE->get_renderer('block_remuiblck');
        return $renderer->render(new \block_remuiblck\output\remuiblck_coursereport($courseid));
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_course_report_returns() {
        return new external_value(PARAM_RAW, 'Course report block');
    }
}
