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
 * Get courses Service
 * @package   theme_remui
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui\external;

defined('MOODLE_INTERNAL') || die;

use external_function_parameters;
use external_single_structure;
use core_course_category;
use theme_remui\utility;
use context_coursecat;
use external_value;
use context_system;
use moodle_url;

/**
 * Get courses service trait
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait get_courses {
    /**
     * Describes the parameters for get_courses
     * @return external_function_parameters
     */
    public static function get_courses_parameters() {
        return new external_function_parameters(
            array (
                'data' => new external_value(PARAM_RAW, 'Courses Params in json.')
            )
        );
    }

    /**
     * Save order of sections in array of configuration format
     * @param  array $data Get courses parameters
     * @return boolean     Courses array
     */
    public static function get_courses($data) {
        global $OUTPUT, $CFG, $PAGE;
        // Reset the cache if required.
        if (get_user_preferences('course_cache_reset')) {
            $coursehandler = new \theme_remui_coursehandler();
            $coursehandler->invalidate_course_cache();
        } else if(get_config('theme_remui', 'cache_reset_time') > get_user_preferences('cache_reset_time')) {
            $coursehandler = new \theme_remui_coursehandler();
            $coursehandler->invalidate_course_cache();
        }

        $wdmdata = json_decode($data);
        // Validation for context is needed.
        $context = context_system::instance();
        $PAGE->set_context($context);

        $result = utility::get_course_cards_content($wdmdata);

        if (isset($wdmdata->category) && $wdmdata->category !== 'all') {
            $categoryid = $wdmdata->category;
        } else {
            $customcat = core_course_category::user_top();
            $categoryid = $customcat->id;
        }
        $result['hasmanagebutton'] = false;

        $coursecat = core_course_category::get($categoryid);
        if ($coursecat->can_create_course() || $coursecat->has_manage_capability()) {
            if ($categoryid != 0) {
                $PAGE->set_context(context_coursecat::instance($categoryid));
                $PAGE->set_pagetype('course-index-category');
                $result['dropdown'] = $OUTPUT->region_main_settings_menu();
            }

            $managebutton = $OUTPUT->single_button(new moodle_url(
                '/course/edit.php',
                array(
                    'category' => $categoryid ? $categoryid : $CFG->defaultrequestcategory,
                    'returnto' => $categoryid ? 'category' : 'topcat'
                )),
            get_string('addnewcourse'), 'get');

            $managebutton .= $OUTPUT->single_button(new moodle_url(
                '/course/management.php',
                array('categoryid' => $categoryid ? $categoryid : $CFG->defaultrequestcategory)
            ), get_string('managecourses'), 'get');

            $result['hasmanagebutton'] = true;
            $result['managebuttons'] = str_replace('type="submit"', 'type="submit" class="btn btn-inverse ml-2"', $managebutton);
        }
        return(json_encode($result));
    }

    /**
     * Describes the get_courses return value
     * @return external_value
     */
    public static function get_courses_returns() {
        return new external_value(PARAM_RAW, 'Courses and Pgination in JSON Format');
    }
}
