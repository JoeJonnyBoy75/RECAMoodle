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
use external_single_structure;
use external_value;
use external_multiple_structure;

trait get_quizzes_of_course {
    /*
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_quizzes_of_course_parameters() {
        // get_quizzes_of_course_parameters() always return an external_function_parameters().
        // The external_function_parameters constructor expects an array of external_description.
        return new external_function_parameters(
            // a external_description can be: external_value, external_single_structure or external_multiple structure
            array(
                'courseid' => new external_value(PARAM_INT, 'Id of course')
            )
        );
    }
    /**
     * The function itself
     * @return string welcome message
     */
    public static function get_quizzes_of_course($courseid) {
        global $DB;
        
        $sqlq = "SELECT q.id quizid, q.name quizname, q.course courseid from {quiz} q WHERE q.course = ?";
        $quizzes = $DB->get_records_sql($sqlq, array($courseid));
        return $quizzes;
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_quizzes_of_course_returns() {
        return new external_multiple_structure(
            new external_single_structure(
                array(
                    'quizid' => new external_value(PARAM_INT, 'Quiz id'),
                    'quizname' => new external_value(PARAM_TEXT, 'Quiz Name'),
                    'courseid' => new external_value(PARAM_INT, 'Course id')
                )
            )
        );
    }
}
