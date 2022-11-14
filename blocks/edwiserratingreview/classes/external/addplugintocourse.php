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
use moodle_page;
use stdClass;
trait addplugintocourse {
    public static function addplugintocourse_parameters() {
        return new external_function_parameters(
            array(
                'userdeniedvalue' => new external_value(PARAM_TEXT, 'it will indicate user denied the plugin addition to courses'),
            )
        );
    }
    public function addplugintocourse($deniedpluginaddition) {
        global $DB, $CFG;
        require_once($CFG->dirroot.'/blocks/edwiserratingreview/lib.php');
        $page = new moodle_page();
        $courses = $DB->get_records('course');
        $response = false;
        $configname = 'pluginchecker';
        $pluginname = 'block_edwiserratingreview';
        $response = false;
        if (!get_config($pluginname, $configname) && $deniedpluginaddition == 'true') {
            foreach ($courses as $course) {
                $page->set_context(\context_course::instance($course->id));
                $context = get_context_instance(CONTEXT_COURSE, $course->id);
                $data = $DB->get_record('block_instances', array('blockname' => 'edwiserratingreview', 'parentcontextid' => $context->id));
                if ($data) {
                    continue;
                }
                $page->blocks->add_region('side-bottom');
                $page->blocks->add_block('edwiserratingreview', 'side-bottom', 5, false, 'course-view-*', null);

            }
            delete_ernr_block();
            set_config($configname, true, $pluginname);
            set_config('deniedpluginaddition', false, $pluginname);
            set_config('modalpopup', false, $pluginname);
            $response = true;
        }
        // set_config('deniedpluginaddition', false, $pluginname);
        if ($deniedpluginaddition == 'false') {
            delete_ernr_block();
            set_config('deniedpluginaddition', false, $pluginname);
        }

        set_config('modalpopup', false, $pluginname);
        return $response;

    }
    public static function addplugintocourse_returns() {
        return new external_value(PARAM_RAW, 'plugin addition status');

    }

}
