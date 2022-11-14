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
trait get_courselist {
    public static function get_courselist_parameters() {
        return new external_function_parameters(
            array(
                'coursecontext'    => new external_value(PARAM_INT, 'Course Context'),
            )
        );
    }
    public static function get_courselist($contextid) {
        global $CFG, $PAGE;
        require_once($CFG->dirroot. '/config.php');
        $PAGE->set_context(\context_system::instance());
        $courses = get_courses();
        $cousedata = new stdClass();

        $coursehtml = '';
        foreach ($courses as $course) {
            if ($course->id == 1 || !$course->visible) {
                continue;
            }

            $context = \context_course::instance($course->id);
            $cousedata->courseid = $context->id;
            $cousedata->coursename = $course->fullname;
            if ($context->id == $contextid) {
                $cousedata->selected = 'selected';
            } else {
                $cousedata->selected = '';
            }
            $coursehtml .= get_string('courselistdata', 'block_edwiserratingreview', $cousedata);
        }
        return $coursehtml;

    }
    public static function get_courselist_returns() {
        return new external_value(PARAM_RAW, 'show more page courselist html content');

    }
}
