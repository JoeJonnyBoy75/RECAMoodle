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

trait get_quiz_participation {
    /*
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function get_quiz_participation_parameters() {
        // get_quiz_participation_parameters() always return an external_function_parameters().
        // The external_function_parameters constructor expects an array of external_description.
        return new external_function_parameters(
            // a external_description can be: external_value, external_single_structure or external_multiple structure
            array(
                'courseid' => new external_value(PARAM_INT, 'Id of course'),
                'quizid' => new external_value(PARAM_INT, 'Id of quiz')
            )
        );
    }
    /**
     * The function itself
     * @return string welcome message
     */
    public static function get_quiz_participation($courseid, $quizid) {
        global $DB;

        $context = \context_course::instance($courseid);
        $enrolledstudents = array_keys(get_enrolled_users($context, 'mod/quiz:attempt', 0, 'u.id'));
        
        if (!empty($enrolledstudents)) {
            $totalstudents = implode(',', $enrolledstudents);

            $sqlq = "SELECT DISTINCT q.userid from {quiz_attempts} q WHERE q.quiz = ? AND q.userid IN ($totalstudents)";
            $quizdata = $DB->get_records_sql($sqlq, array($quizid));

            $quizattemps = count(array_keys($quizdata));
        }

        $index = 0;

        $chartdata['datasets'][0]['label'] = get_string('totalusersattemptedquiz', 'block_remuiblck');
        $chartdata['datasets'][1]['label'] = get_string('totalusersnotattemptedquiz', 'block_remuiblck');
        $chartdata['datasets'][0]['backgroundColor'] = "rgba(75, 192, 192, 0.2)";
        $chartdata['datasets'][1]['backgroundColor'] = "rgba(255, 99, 132, 0.2)";
        $chartdata['datasets'][0]['borderColor'] = "rgba(75, 192, 192, 1)";
        $chartdata['datasets'][1]['borderColor'] = "rgba(255,99,132,1)";
        $chartdata['datasets'][0]['borderWidth'] = 1;
        $chartdata['datasets'][1]['borderWidth'] = 1;

        $chartdata['labels'][$index] = get_string('enrolledstudentdata', 'block_remuiblck');

        // Data is available only for one activity thats why index is always 0.
        if (!empty($enrolledstudents)) {
            $chartdata['datasets'][0]['data'][$index] = intval($quizattemps);
            $chartdata['datasets'][1]['data'][$index] = intval(count($enrolledstudents) - $quizattemps);
            if ($chartdata['datasets'][1]['data'][$index] < 0) {
                $chartdata['datasets'][1]['data'][$index] = 0;
            }
        } else {
            $chartdata['datasets'][0]['data'][$index] = 0;
            $chartdata['datasets'][1]['data'][$index] = 0;
        }
        return $chartdata;
    }
    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function get_quiz_participation_returns() {
        return new external_single_structure(
            array(
                'labels' => new external_multiple_structure(
                    new external_value(PARAM_TEXT, 'Labels')
                ),
                'datasets' => new external_multiple_structure(
                    new external_single_structure(array(
                        'label' => new external_value(PARAM_TEXT, 'Bar label'),
                        'backgroundColor' => new external_value(PARAM_TEXT, 'Bar background color'),
                        'borderColor' => new external_value(PARAM_TEXT, 'Bar border color'),
                        'borderWidth' => new external_value(PARAM_TEXT, 'Bar border width'),
                        'data' => new external_multiple_structure(
                            new external_value(PARAM_INT, 'Bar data')
                        )
                    ))
                ),
            )
        );
    }
}
