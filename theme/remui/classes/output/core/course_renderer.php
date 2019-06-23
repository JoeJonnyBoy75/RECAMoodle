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
 * @package    theme_remui
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
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

require_once($CFG->dirroot . '/course/renderer.php');

class course_renderer extends \core_course_renderer {


    /**
     * Renders HTML to display particular course category - list of it's subcategories and courses
     *
     * Invoked from /course/index.php
     *
     * @param int|stdClass|coursecat $category
     */
    public function course_category($category)
    {
        global $CFG;
        // require_once($CFG->libdir. '/coursecatlib.php');
        $coursecat = core_course_category::get(is_object($category) ? $category->id : $category);
        $site = get_site();
        $output = '';
        // Add 'Manage' and 'Add new course' button if user has permissions to edit or create course in this category.
        if (can_edit_in_category($coursecat->id)) {
            $managebutton = $this->single_button(new moodle_url(
                '/course/management.php',
                array('categoryid' => $coursecat->id)
            ), get_string('managecourses'), 'get');
                // Print link to create a new course, for the 1st available category.
            if ($coursecat->id) {
                $url = new moodle_url('/course/edit.php', array('category' => $coursecat->id, 'returnto' => 'category'));
            } else {
                $url = new moodle_url('/course/edit.php', array('category' => $CFG->defaultrequestcategory, 'returnto' => 'topcat'));
            }
            $managebutton = $this->single_button($url, get_string('addnewcourse'), 'get') . $managebutton;
            $this->page->set_button($managebutton);
        }
        if (!$coursecat->id) {
            if (core_course_category::is_simple_site() == 1) {
                // There exists only one category in the system, do not display link to it
                $coursecat = core_course_category::get_default();
                $strfulllistofcourses = get_string('fulllistofcourses');
                $this->page->set_title("$site->shortname: $strfulllistofcourses");
            } else {
                $strcategories = get_string('categories');
                $this->page->set_title("$site->shortname: $strcategories");
            }
        } else {
            $title = $site->shortname;
            if (core_course_category::is_simple_site() > 1) {
                $title .= ": ". $coursecat->get_formatted_name();
            }
            $this->page->set_title($title);

            // Print the category selector
            if (core_course_category::is_simple_site() > 1) {
                $output .= \html_writer::start_tag('div', array('class' => 'categorypicker'));
                $select = new \single_select(
                    new moodle_url('/course/index.php'),
                    'categoryid',
                    core_course_category::make_categories_list(),
                    $coursecat->id,
                    null,
                    'switchcategory'
                );
                $select->set_label(get_string('categories').':');
                $output .= $this->render($select);
                $output .= \html_writer::end_tag('div'); // .categorypicker
            }
        }

        // Print current category description
        $chelper = new coursecat_helper();
        if ($description = $chelper->get_category_formatted_description($coursecat)) {
            $output .= $this->box($description, array('class' => 'generalbox info'));
        }

        // Prepare parameters for courses and categories lists in the tree
        $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_AUTO)
                ->set_attributes(array('class' => 'category-browse category-browse-'.$coursecat->id));

        $coursedisplayoptions = array();
        $catdisplayoptions = array();
        $browse = optional_param('browse', null, PARAM_ALPHA);
        $perpage = optional_param('perpage', $CFG->coursesperpage, PARAM_INT);
        $page = optional_param('page', 0, PARAM_INT);
        $baseurl = new moodle_url('/course/index.php');
        if ($coursecat->id) {
            $baseurl->param('categoryid', $coursecat->id);
        }
        if ($perpage != $CFG->coursesperpage) {
            $baseurl->param('perpage', $perpage);
        }
        $coursedisplayoptions['limit'] = $perpage;
        $catdisplayoptions['limit'] = $perpage;
        if ($browse === 'courses' || !$coursecat->has_children()) {
            $coursedisplayoptions['offset'] = $page * $perpage;
            $coursedisplayoptions['paginationurl'] = new moodle_url($baseurl, array('browse' => 'courses'));
            $catdisplayoptions['nodisplay'] = true;
            $catdisplayoptions['viewmoreurl'] = new moodle_url($baseurl, array('browse' => 'categories'));
            $catdisplayoptions['viewmoretext'] = new lang_string('viewallsubcategories');
        } elseif ($browse === 'categories' || !$coursecat->has_courses()) {
            $coursedisplayoptions['nodisplay'] = true;
            $catdisplayoptions['offset'] = $page * $perpage;
            $catdisplayoptions['paginationurl'] = new moodle_url($baseurl, array('browse' => 'categories'));
            $coursedisplayoptions['viewmoreurl'] = new moodle_url($baseurl, array('browse' => 'courses'));
            $coursedisplayoptions['viewmoretext'] = new lang_string('viewallcourses');
        } else {
            // we have a category that has both subcategories and courses, display pagination separately
            $coursedisplayoptions['viewmoreurl'] = new moodle_url($baseurl, array('browse' => 'courses', 'page' => 1));
            $catdisplayoptions['viewmoreurl'] = new moodle_url($baseurl, array('browse' => 'categories', 'page' => 1));
        }
        $chelper->set_courses_display_options($coursedisplayoptions)->set_categories_display_options($catdisplayoptions);
        // Add course search form.
        $output .= $this->course_search_form();

        // Display course category tree.
        $output .= $this->coursecat_tree($chelper, $coursecat);

        // Add action buttons
        $output .= $this->container_start('buttons');
        $context = get_category_or_system_context($coursecat->id);
        if (has_capability('moodle/course:create', $context)) {
            // Print link to create a new course, for the 1st available category.
            if ($coursecat->id) {
                $url = new moodle_url('/course/edit.php', array('category' => $coursecat->id, 'returnto' => 'category'));
            } else {
                $url = new moodle_url('/course/edit.php', array('category' => $CFG->defaultrequestcategory, 'returnto' => 'topcat'));
            }
            $output .= $this->single_button($url, get_string('addnewcourse'), 'get');
        }
        ob_start();
        if (core_course_category::is_simple_site() == 1) {
            print_course_request_buttons(context_system::instance());
        } else {
            print_course_request_buttons($context);
        }
        $output .= ob_get_contents();
        ob_end_clean();
        $output .= $this->container_end();
        return $output;
    }

    /**
     * Renders html to display a course search form.
     *
     * @param string $value default value to populate the search field
     * @param string $format display format - 'plain' (default), 'short' or 'navbar'
     * @return string
     */
    public function course_search_form($value = '', $format = 'plain', $category = '', $mycourses = '') {
        global $PAGE;
        static $count = 0;
        $formid = 'coursesearch';
        if ((++$count) > 1) {
            $formid .= $count;
        }

        switch ($format) {
            case 'navbar':
                $formid = 'coursesearchnavbar';
                $inputid = 'navsearchbox';
                $inputsize = 20;
                break;
            case 'short':
                $inputid = 'shortsearchbox';
                $inputsize = 12;
                break;
            default:
                $inputid = 'coursesearchbox';
                $inputsize = 30;
        }

        $data = (object) [
            'searchurl' => (new moodle_url('/course/index.php'))->out(false),
            'id' => $formid,
            'inputid' => $inputid,
            'inputsize' => $inputsize,
            'value' => $value,
            'mycourses' => $mycourses,
            'category' => $category
        ];

        if ($PAGE->pagelayout == 'frontpage') {
            return $this->render_from_template('theme_remui/course_search_form_frontpage', $data);
        } else {
            return $this->render_from_template('theme_remui/course_search_form', $data);
        }
    }


    /**
     * Returns HTML to print list of available courses for the frontpage
     *
     * @return string
     */
    public function frontpage_available_courses() {
        global $CFG;

        $chelper = new coursecat_helper();
        $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_EXPANDED)->set_courses_display_options(array(
                    'recursive' => true,
                    'limit' => $CFG->frontpagecourselimit,
                    'viewmoreurl' => new moodle_url('/course/index.php'),
                    'viewmoretext' => new lang_string('fulllistofcourses')));

        $chelper->set_attributes(array('class' => 'frontpage-course-list-all'));
        $courses = core_course_category::get(0)->get_courses($chelper->get_courses_display_options());
        $totalcount = core_course_category::get(0)->get_courses_count($chelper->get_courses_display_options());
        if (!$totalcount && !$this->page->user_is_editing() && has_capability('moodle/course:create', \context_system::instance())) {
            // Print link to create a new course, for the 1st available category.
            return $this->add_new_course_button();
        }
        $latestcard = get_config('theme_remui', 'enablenewcoursecards');
        $coursehtml = '<div class="pb-20 px-10"><div class="card-deck slick-course-slider slick-slider ' . ($latestcard ? 'latest-cards' : '') . '">';
        if (!empty($courses)) {
            foreach ($courses as $course) {
                $coursesummary = strip_tags($chelper->get_course_formatted_summary($course, array('overflowdiv' => false, 'noclean' => false, 'para' => false)));
                $coursesummary = strlen($coursesummary) > 100 ? substr($coursesummary, 0, 100)."..." : $coursesummary;
                $image = \theme_remui\utility::get_course_image($course, 1);
                $coursename = strip_tags($chelper->get_course_formatted_name($course));
                if (!$latestcard) {
                    $coursehtml .= "
                    <div class='card w-full rounded-bottom mb-20 mx-0 bg-transparent h-p100 d-inline-flex flex-column'>
                        <div class='card-shadow-md h-p100 m-10 bg-white'>
                            <div class='h-200 rounded-top' style='background-image: url({$image});background-size: cover;background-position: center;'>
                            </div>
                            <div class='card-body'>
                                <h4 class='card-title m-10'>
                                    <a href='{$CFG->wwwroot}/course/view.php?id={$course->id}' class='font-weight-400 blue-grey-600 font-size-18'>
                                        {$coursename}
                                    </a>
                                </h4>
                                <p class='card-text m-10'>{$coursesummary}</p>
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
                    <div class='px-10 course_card card '>
                        <div class='wrapper' style='background-image: url({$image});background-size: cover;background-position: center;position: relative;'>
                            <div class='date btn-primary'>
                                <span class='day'>{$day}</span>
                                <span class='month'>{$month}</span>
                                <span class='year'>{$year}</span>
                            </div>
                            <div class='data'>
                                <div class='content' title='Vestibulum purus quam scelerisque ut'>
                                    <span class='author'>Miscellaneous</span>
                                    <h1 class='title'><a href='{$CFG->wwwroot}/course/view.php?id={$course->id}'>{$coursename}</a></h1>
                                    <p class='text'>{$coursesummary}</p>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
            }
        }

        $coursehtml .= '</div></div>';

        $coursehtml .= " <div class='available-courses button-container w-p100 text-center '>
            <button type='button' class='btn btn-floating btn-primary btn-prev btn-sm'><i class='icon fa fa-chevron-left' aria-hidden='true'></i></button>
            <button type='button' class='btn btn-floating btn-primary btn-next btn-sm'><i class='icon fa fa-chevron-right' aria-hidden='true'></i></button>
        </div>";

        $coursehtml .= "
        <div class='row'>
            <div class='col-12 text-right'>
                <a href='{$CFG->wwwroot}/course' class='btn btn-primary'>".get_string('viewallcourses', 'theme_remui')."</a>
            </div>
        </div>";

        return $coursehtml;
    }

    /**
     * Renders part of frontpage with a skip link (i.e. "My courses", "Site news", etc.)
     *
     * @param string $skipdivid
     * @param string $contentsdivid
     * @param string $header Header of the part
     * @param string $contents Contents of the part
     * @return string
     */
    protected function frontpage_part($skipdivid, $contentsdivid, $header, $contents) {
        $output = html_writer::link('#' . $skipdivid,
            get_string('skipa', 'access', core_text::strtolower(strip_tags($header))),
            array('class' => 'skip-block skip'));

        // Wrap frontpage part in div container.
        $output .= html_writer::start_tag('div', array('id' => $contentsdivid));
        $output .= $this->heading($header, 2, 'p-0 m-15');
        $output .= $contents;

        // End frontpage part div container.
        $output .= html_writer::end_tag('div');

        $output .= html_writer::tag('span', '', array('class' => 'skip-block-to', 'id' => $skipdivid));
        return $output;
    }
}
