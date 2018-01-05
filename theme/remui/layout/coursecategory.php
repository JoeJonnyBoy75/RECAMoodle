
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
 * A two column layout for the Edwiser RemUI theme.
 *
 * @package   theme_remui
 * @copyright WisdmLabs
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG, $PAGE, $USER, $SITE, $COURSE;

require_once('common.php');

// prepare course archive context
$hascourses = false;
$mycourses = optional_param('mycourses', 0, PARAM_INT);
$search    = optional_param('search', '', PARAM_ALPHANUMEXT);
$category  = optional_param('categoryid', 0, PARAM_INT);
$page = optional_param('page', 0, PARAM_INT);
$categorysort = optional_param('categorysort', 0, PARAM_ALPHANUMEXT) == 'default' ? '' : optional_param('categorysort', 0, PARAM_ALPHANUMEXT) ;

$pageurl = new moodle_url('/course/index.php');

if (!empty($search)) {
    $pageurl->param('search', $search);
}
if (!empty($category)) {
    $pageurl->param('categoryid', $category);
}
if (!empty($mycourses)) {
    $pageurl->param('mycourses', $mycourses);
}

$courseperpage =  \theme_remui\toolbox::get_setting('courseperpage');
if (empty($courseperpage)) {
    $courseperpage = 12;
}

$startfrom  = $page * $courseperpage;
$courses    = \theme_remui\utility::get_courses(false, $search, $category, $startfrom, $courseperpage, $mycourses);
$totalcourses = \theme_remui\utility::get_courses(true, $search, $category, 0, 0, $mycourses);
$totalpages = ceil($totalcourses / $courseperpage);
$pagingbar  = new paging_bar($totalcourses, $page, $courseperpage, $pageurl, 'page');
if(count($courses) > 0) {
    $hascourses = true;
}

$templatecontext['hascourses'] = $hascourses;
//$templatecontext['courses'] = $courses;
$templatecontext['categoryfilter'] = \theme_remui\utility::get_course_category_selector($category, $categorysort, $search, $mycourses, $pageurl);
$templatecontext['categorydescription'] = \theme_remui\utility::get_category_description($category);
$templatecontext['searchfilter'] = $PAGE->get_renderer('core', 'course')->course_search_form($search, '', $category, $mycourses);
$templatecontext['pagination'] = $OUTPUT->render($pagingbar);
if ($categorysort == 'SORT_ASC' || $categorysort == 'SORT_DESC') {
    $courses = \theme_remui\utility::array_msort($courses, array('coursename'=>$categorysort));
}

$templatecontext['courses'] = $courses;

$templatecontext['mycourses'] = $mycourses;

$templatecontext['viewtoggler'] = \theme_remui\utility::get_courses_view_toggler($category);

// This will get the user preference for view state
// and add classes appropriately
$view = get_user_preferences('course_view_state');
if (empty($view)) {
    $view = set_user_preference('course_view_state', 'grid');
    $view = 'grid';
}

if ($view == 'grid') {
    $viewClasses = 'col-md-6 col-lg-3';
    $imgStyle = 'gridStyle';
    $listbuttons = '';
    $listprogress = '';
} else {
    $viewClasses = 'col-md-12 col-lg-12 listview';
    $imgStyle = 'listStyle';
    $listbuttons = 'list-activity-buttons';
    $listprogress = "list-progress";
}

$templatecontext['viewClasses'] = $viewClasses;
$templatecontext['imgStyle'] = $imgStyle;
$templatecontext['listbuttons'] = $listbuttons;
$templatecontext['listprogress'] = $listprogress;


// $templatecontext['view'] = get_user_preferences('viewCourseCategory');

echo $OUTPUT->render_from_template('theme_remui/coursecategory', $templatecontext);
