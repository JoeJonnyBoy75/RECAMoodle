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
 * Edwiser RemUI
 * @package    theme_remui
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG, $PAGE, $USER, $SITE, $COURSE;

require_once('common.php');


// Generate page url
$pageurl = new moodle_url('/course/index.php');

$mycourses  = optional_param('mycourses', 0, PARAM_INT);

// $stringman = get_string_manager();
// $strings = $stringman->load_component_strings('theme_remui', 'en');
// $PAGE->requires->strings_for_js(array_keys($strings), 'theme_remui');

// Get the filters first
$templatecontext['allfilters'] = \theme_remui\utility::get_course_category_filters();

// Tab creation Content
$mycoursesObj = new stdClass();
$mycoursesObj->name = 'mycourses';
$mycoursesObj->text = get_string('mycourses', 'theme_remui');
if ($mycourses) {
    $mycoursesObj->isActive = true;
}

$coursesObj = new stdClass();
$coursesObj->name = 'courses';
$coursesObj->text = get_string('courses', 'theme_remui');
if (!$mycourses) {
    $coursesObj->isActive = true;
}

$templatecontext['tabcontent'] = array($mycoursesObj, $coursesObj);


$templatecontext['mycourses'] = $mycourses;
if (\theme_remui\toolbox::get_setting('enablenewcoursecards')) {
    $templatecontext['latest_card'] = true;
}


echo $OUTPUT->render_from_template('theme_remui/coursecategory', $templatecontext);
