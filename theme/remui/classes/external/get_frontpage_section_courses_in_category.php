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
 * @package theme_remui
 * @author  2019 wisdmlabs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui\external;

defined('MOODLE_INTERNAL') || die;

use external_function_parameters;
use external_value;
use \theme_remui\frontpage\section_manager as section_manager;
use context_system;

trait get_frontpage_section_courses_in_category {
    /**
     * Describes the parameters for get_frontpage_section_courses_in_category
     * @return external_function_parameters
     */
    public static function get_frontpage_section_courses_in_category_parameters() {
        return new external_function_parameters(
            array(
                'instanceid' => new external_value(PARAM_INT, 'Section instance id'),
                'categoryid' => new external_value(PARAM_INT, 'Category id')
            )
        );
    }

    /**
     * Get frontpage section courses in category
     * @param  int   $instanceid Instance id of course section
     * @param  int   $categoryid Category id
     * @return array             Courses list
     */
    public static function get_frontpage_section_courses_in_category($instanceid, $categoryid) {
        global $PAGE, $OUTPUT;

        $PAGE->set_context(context_system::instance());

        $sm = new section_manager();
        $instance = $sm->get_config_by_instanceid($instanceid);

        $configdata = json_decode($instance->configdata, true);
        $categories = [$categoryid];
        $date = isset($configdata['date']) ? $configdata['date'] : 'all';

        $data = array("courses" => $sm->get_courses_from_category(array($categoryid), $date));

        if (empty($data['courses'])) {
            $data['coursesplaceholder'] = $OUTPUT->image_url('courses', 'block_myoverview')->out();
        }

        $data = json_encode($data);

        return $data;
    }

    /**
     * Describes the get_frontpage_section_courses_in_category return value
     * @return external_value
     */
    public static function get_frontpage_section_courses_in_category_returns() {
        return new external_value(PARAM_RAW, 'Courses Data Json');
    }
}
