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
defined('MOODLE_INTERNAL') || die();
class observer {

    public static function add_course_rating(\core\event\course_created $event) {
        // $event = $event;
        global $OUTPUT, $DB;

        $data = $event->get_data();
        $page = new moodle_page();

        $page->set_context(\context_course::instance($data['courseid']));
        $page->blocks->add_region('side-bottom');
        $page->blocks->add_block('edwiserratingreview', 'side-bottom', 5, false, 'course-view-*', null);

    }
}
