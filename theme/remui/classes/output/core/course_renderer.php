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
 * Edwiser RemUI Course Renderer Class
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_remui\output\core;
defined('MOODLE_INTERNAL') || die();

use moodle_url;
use coursecat_helper;
use lang_string;
use core_course_category;
use context_system;
use html_writer;
use core_text;
use pix_icon;

require_once($CFG->dirroot . '/course/renderer.php');

/**
 * Edwiser RemUI Course Renderer Class.
 *
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class course_renderer extends \core_course_renderer {

    /**
     * Returns HTML to print list of available courses for the frontpage
     *
     * @return string
     */
    public function frontpage_available_courses() {
        global $CFG, $DB;

        $chelper = new coursecat_helper();
        $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED)->set_courses_display_options(array(
                    'recursive' => true,
                    'limit' => $CFG->frontpagecourselimit,
                    'viewmoreurl' => new moodle_url('/course/index.php'),
                    'viewmoretext' => new lang_string('fulllistofcourses')));

        $chelper->set_attributes(array('class' => 'frontpage-course-list-all'));
        $courses = core_course_category::get(0)->get_courses($chelper->get_courses_display_options());
        $totalcount = core_course_category::get(0)->get_courses_count($chelper->get_courses_display_options());
        if (!$totalcount &&
            !$this->page->user_is_editing() &&
            has_capability('moodle/course:create', \context_system::instance())
        ) {
            // Print link to create a new course, for the 1st available category.
            return $this->add_new_course_button();
        }
        $latestcard = get_config('theme_remui', 'enablenewcoursecards');
        $coursehtml = '<div class="card-deck slick-course-slider slick-slider d-none ' . ($latestcard ? 'latest-cards' : '') . '">';

        if (!empty($courses)) {

            foreach ($courses as $course) {
                $coursesummary = strip_tags($chelper->get_course_formatted_summary(
                    $course,
                    array('overflowdiv' => false, 'noclean' => false, 'para' => false)
                ));

                // Get Ratings and Review Context.
                $rnrshortdesign = '';
                if (is_plugin_available("block_edwiserratingreview")) {
                    $rnr = new \block_edwiserratingreview\ReviewManager();
                    $rnrshortdesign = $rnr->get_course_cardlayout_ratingdata($course->id);
                }
                $categoryname = $DB->get_record('course_categories', array('id' => $course->category))->name;
                $categoryname = strip_tags(format_text($categoryname));

                $coursesummary = strlen($coursesummary) > 100 ? substr($coursesummary, 0, 100)."..." : $coursesummary;
                $image = \theme_remui_coursehandler::get_course_image($course, 1);
                $coursename = strip_tags($chelper->get_course_formatted_name($course));
                if (!$latestcard) {
                    $coursehtml .= "
                    <div class='card w-100 h-100 rounded-bottom mx-0 bg-transparent d-inline-flex flex-column'>
                        <div class='bg-white border' style='height: 100%;'>
                            <div
                                class='rounded-top'
                                style='height: 150px;
                                       background-image: url({$image});
                                       background-size: cover;
                                       background-position: center;
                                       box-shadow: 0 2px 5px #cccccc;'>
                            </div>
                            <div class='card-body p-3'>
                            <div class='m-1 font-size-10'>{$rnrshortdesign}</div>
                                <span class='author ellipsis ellipsis-1'>{$categoryname}</span>
                                <h4 class='card-title m-1 ellipsis ellipsis-2'>
                                    <a
                                        href='{$CFG->wwwroot}/course/view.php?id={$course->id}'
                                        class='font-weight-400 blue-grey-600 font-size-18'>
                                        {$coursename}
                                    </a>
                                </h4>
                                <p class='card-text m-1'>{$coursesummary}</p>
                            </div>
                        </div>
                    </div>";
                } else {
                    if (isset($course->startdate)) {
                        $startdate = date('d M, Y', $course->startdate);
                        $day = substr($startdate, 0, 2);
                        $month = substr($startdate, 3, 3);
                        $year = substr($startdate, 8, 4);
                    }

                    $coursehtml .= "
                    <div class='course_card-1 card '>
                        <div class='wrapper h-100'
                            style='background-image: url({$image});
                                   background-size: cover;
                                   background-position: center;
                                   position: relative;'>
                            <div class='date btn-primary'>
                                <span class='day'>{$day}</span>
                                <span class='month'>{$month}</span>
                                <span class='year'>{$year}</span>
                            </div>
                            <div class='data'>
                                <div class='content' title='{$coursename}'>
                                    <div class='m-1 font-size-10'>{$rnrshortdesign}</div>
                                    <span class='author ellipsis ellipsis-1'>{$categoryname}</span>
                                    <h4 class='title ellipsis ellipsis-3' style='-webkit-box-orient: vertical;visibility: visible;'>
                                        <a href='{$CFG->wwwroot}/course/view.php?id={$course->id}'>{$coursename}</a>
                                    </h4>
                                    <p class='text'>{$coursesummary}</p>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }
        }

        $coursehtml .= '</div>';

        $coursehtml .= " <div class='available-courses button-container w-100 text-center mt-3'>
            <button type='button' class='btn btn-floating btn-primary btn-prev btn-sm'>
                <i class='icon fa fa-chevron-left' aria-hidden='true'></i>
            </button>
            <button type='button' class='btn btn-floating btn-primary btn-next btn-sm'>
                <i class='icon fa fa-chevron-right' aria-hidden='true'></i>
            </button>
        </div>";

        $coursehtml .= "
        <div class='row'>
            <div class='col-12 text-right'>
                <a href='{$CFG->wwwroot}/course/index.php' class='btn btn-primary'>" . get_string('viewallcourses', 'core')."</a>
            </div>
        </div>";

        return $coursehtml;
    }

    /**
     * Renders HTML to display a list of course modules in a course section
     * Also displays "move here" controls in Javascript-disabled mode
     *
     * This function calls {@link core_course_renderer::course_section_cm()}
     *
     * @param stdClass $course course object
     * @param int|stdClass|section_info $section relative section number or section object
     * @param int $sectionreturn section number to return to
     * @param int $displayoptions
     * @return void
     */
    public function course_section_cm_list($course, $section, $sectionreturn = null, $displayoptions = array()) {
        global $USER;

        $output = '';
        $modinfo = get_fast_modinfo($course);
        if (is_object($section)) {
            $section = $modinfo->get_section_info($section->section);
        } else {
            $section = $modinfo->get_section_info($section);
        }
        $completioninfo = new \completion_info($course);

        // check if we are currently in the process of moving a module with JavaScript disabled
        $ismoving = $this->page->user_is_editing() && ismoving($course->id);
        if ($ismoving) {
            $movingpix = new pix_icon('movehere', get_string('movehere'), 'moodle', array('class' => 'movetarget'));
            $strmovefull = strip_tags(get_string("movefull", "", "'$USER->activitycopyname'"));
        }

        // Get the list of modules visible to user (excluding the module being moved if there is one)
        $moduleshtml = array();
        if (!empty($modinfo->sections[$section->section])) {
            foreach ($modinfo->sections[$section->section] as $modnumber) {
                $mod = $modinfo->cms[$modnumber];

                if ($ismoving and $mod->id == $USER->activitycopy) {
                    // do not display moving mod
                    continue;
                }

                if ($modulehtml = $this->course_section_cm_list_item($course,
                        $completioninfo, $mod, $sectionreturn, $displayoptions)) {
                    $moduleshtml[$modnumber] = $modulehtml;
                }
            }
        }

        $sectionoutput = '';
        if (!empty($moduleshtml) || $ismoving) {
            foreach ($moduleshtml as $modnumber => $modulehtml) {
                if ($ismoving) {
                    $movingurl = new moodle_url('/course/mod.php', array('moveto' => $modnumber, 'sesskey' => sesskey()));
                    $sectionoutput .= html_writer::tag('li',
                            html_writer::link($movingurl, $this->output->render($movingpix), array('title' => $strmovefull)),
                            array('class' => 'movehere'));
                }

                $sectionoutput .= $modulehtml;
            }

            if ($ismoving) {
                $movingurl = new moodle_url('/course/mod.php', array('movetosection' => $section->id, 'sesskey' => sesskey()));
                $sectionoutput .= html_writer::tag('li',
                        html_writer::link($movingurl, $this->output->render($movingpix), array('title' => $strmovefull)),
                        array('class' => 'movehere'));
            }
        }

        // Always output the section module list.
        $output .= html_writer::tag('ul', $sectionoutput, array('id'=> 'Section-'.$section->id, 'class' => 'section img-text', 'role'=>'region', 'aria-labelledby'=>'Sectionid-'.$section->id));

        return $output;
    }

    /**
     * Renders HTML to display particular course category - list of it's subcategories and courses
     *
     * Invoked from /course/index.php
     *
     * @param int|stdClass|core_course_category $category
     */
    public function get_morebutton_pagetitle($category) {
        global $CFG;
        $output = '';
        $site = get_site();
        if ($category != 'all') {
            $usertop = core_course_category::user_top();
            if (empty($category)) {
                $coursecat = $usertop;
            } else if (is_object($category) && $category instanceof core_course_category) {
                $coursecat = $category;
            } else {
                $coursecat = core_course_category::get(is_object($category) ? $category->id : $category);
            }

            $actionbar = new \core_course\output\category_action_bar($this->page, $coursecat);
            $output = $this->render_from_template('core_course/category_actionbar', $actionbar->export_for_template($this));
            if (core_course_category::is_simple_site()) {
                $strfulllistofcourses = get_string('fulllistofcourses');
                $this->page->set_title("$site->shortname: $strfulllistofcourses");
            } else if (!$coursecat->id || !$coursecat->is_uservisible()) {
                $strcategories = get_string('categories');
                $this->page->set_title("$site->shortname: $strcategories");
            } else {
                $strfulllistofcourses = get_string('fulllistofcourses');
                $this->page->set_title("$site->shortname: $strfulllistofcourses");
            }
        } else {
            $strcategories = get_string('categories');
            $this->page->set_title("$site->shortname: $strcategories");
        }
        return $output;
    }
    public function course_category($category) {
        return;
    }


}
