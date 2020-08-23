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
 * @package   theme_remui
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_remui;
defined('MOODLE_INTERNAL') || die();

use Exception;
use stdClass;
use moodle_url;
use user_picture;
use dml_exception;
use context_system;
use context_course;
use coding_exception;
use core_completion\progress;
use theme_remui\toolbox as toolbox;
use core_course_list_element;

/**
 * Utility class
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class utility {

    /**
     * Get user picture from user object
     * @param  object  $userobject User object
     * @param  integer $imgsize    Size of image in pixel
     * @return String              User picture link
     */
    public static function get_user_picture($userobject = null, $imgsize = 100) {
        global $USER, $PAGE;
        if (!$userobject) {
            $userobject = $USER;
        }

        $userimg = new user_picture($userobject);
        $userimg->size = $imgsize;
        return  $userimg->get_url($PAGE);
    }

    /**
     * Returns left navigation footer menus details.
     *
     * @return Array Menu details.
     */
    public static function get_left_nav_footer_menus() {
        global $CFG, $COURSE, $USER;
        $menudata = array (
            [
                'url' => $CFG->wwwroot.'/course/index.php',
                'iconclass' => 'fa-archive',
                'title' => get_string('createarchivepage', 'theme_remui')
            ]
        );
        // Return all menus for site administrator.
        if (is_siteadmin($USER)) {
            $menus = array (
                [
                    'url' => "{$CFG->wwwroot}/{$CFG->admin}/user.php",
                    'iconclass' => 'fa-users',
                    'title' => get_string('userlist')
                ],
                [
                    'url' => self::get_course_creation_link(),
                    'iconclass' => 'fa-file',
                    'title' => get_string('createanewcourse', 'theme_remui')
                ],
                [
                    'url' => "{$CFG->wwwroot}/{$CFG->admin}/settings.php?section=themesettingremui",
                    'iconclass' => 'fa-cogs',
                    'title' => get_string('remuisettings', 'theme_remui')
                ]
            );
            $menudata = array_merge($menudata, $menus);
            $temp = array_splice($menudata, 1, 1);
            array_splice($menudata, 0, 0, $temp);
            return $menudata;
        }

        // Return menus for course creator.
        $coursecontext = context_course::instance($COURSE->id);
        if (has_capability('moodle/course:create', $coursecontext)) {
            $menu = [
                'url' => self::get_course_creation_link(),
                'iconclass' => 'fa-file',
                'title' => get_string('createanewcourse', 'theme_remui')
            ];
            array_push($menudata, $menu);
            $temp = array_splice($menudata, 1, 1);
            array_splice($menudata, 0, 0, $temp);
            return $menudata;
        }
        return $menudata;
    }

    /**
     * Returns the link for creating new course.
     *
     * @return string Course creation link.
     */
    public static function get_course_creation_link() {
        global $DB, $CFG;
        $categories = $DB->get_records('course_categories', null, '', 'id');
        $createcourselink = "#";
        if (!empty($categories)) {
            $firstcategory = reset($categories);
            $createcourselink = $CFG->wwwroot. '/course/edit.php?category='.$firstcategory->id;
        }
        return $createcourselink;
    }

    /**
     * Check user is admin or manager
     * @param  object  $userobject User object
     * @return boolean             True if admin or manager
     */
    public static function check_user_admin_cap($userobject = null) {
        global $USER;
        if (!$userobject) {
            $userobject = $USER;
        }
        if (is_siteadmin()) {
            return true;
        }
        $context = context_system::instance();
        $roles = get_user_roles($context, $userobject->id, false);
        foreach ($roles as $role) {
            if ($role->roleid == 1 && $role->shortname == 'manager') {
                return true;
            }
        }
        return false;
    }

    /**
     * Return user's courses or all the courses
     *
     * Usually called to get usr's courese, or it could also be called to get all course.
     * This function will also be called whern search course is used.
     *
     * @param  bool   $totalcount     If true then returns total course count
     * @param  string $search         course name to be search
     * @param  int    $category       ids to be search of courses.
     * @param  int    $limitfrom      course to be returned from these number onwards, like from course 5 .
     * @param  int    $limitto        till this number course to be returned,
     *                                like from course 10, then 5 course will be returned from 5 to 10.
     * @param  array  $mycourses      Courses to return user's course which he/she enrolled into.
     * @param  bool   $categorysort   if true the categories are sorted
     * @param  array  $courses        pass courses if would like to load more data for those courses
     * @param  bool   $filtermodified If true then cache will be cleared and regenerated when filter is modified
     * @return array                  Course array
     */
    public static function get_courses(
        $totalcount = false,
        $search = null,
        $category = null,
        $limitfrom = 0,
        $limitto = 0,
        $mycourses = null,
        $categorysort = null,
        $courses = [],
        $filtermodified = true
    ) {
        $coursehandler = new \theme_remui_coursehandler();
        return $coursehandler->get_courses(
            $totalcount,
            $search,
            $category,
            $limitfrom,
            $limitto,
            $mycourses,
            $categorysort,
            $courses,
            $filtermodified
        );

    }

    /**
     * Get card content for courses
     * @param  object $wdmdata Data to create cards
     * @param  string $date    Date filter
     * @return array           Courses cards
     */
    public static function get_course_cards_content($wdmdata, $date = 'all') {
        global $CFG, $OUTPUT;
        $courseperpage = \theme_remui\toolbox::get_setting('courseperpage');
        $categorysort = $wdmdata->sort;
        $search       = $wdmdata->search;
        $category     = $wdmdata->category;
        $courses      = isset($wdmdata->courses) ? $wdmdata->courses : [];
        $mycourses    = $wdmdata->tab;
        $page         = ($mycourses) ? $wdmdata->page->mycourses : $wdmdata->page->courses;
        $startfrom    = $courseperpage * $page;
        $limitto      = $courseperpage;
        $filtermodified = isset($wdmdata->isFilterModified) ? $wdmdata->isFilterModified : true;
        $allowfull = true;
        // Resultant Array.
        $result = array();

        if ($page == -1) {
            $startfrom = 0;
            $limitto = 0;
        }

        // This condition is for coursecategory page only, that is why on frontpage it is not
        // necessary so returning limiteddata.
        if (isset($wdmdata->limiteddata)) {
            $allowfull = false;
        }

        // Pagination Context creation.
        if ($wdmdata->pagination) {
            // First paremeter true means get_courses function will return count of the result and if false, returns actual data.
            list($totalcourses, $courses)  = self::get_courses(
                2,
                $search,
                $category,
                $startfrom,
                $limitto,
                $mycourses,
                $categorysort,
                $courses,
                $filtermodified
            );

            $pagingbar  = new \paging_bar($totalcourses, $page, $courseperpage, 'javascript:void(0);', 'page');
            $result['pagination'] = $OUTPUT->render($pagingbar);
        } else {
            // Fetch the courses.
            $courses = self::get_courses(
                false,
                $search,
                $category,
                $startfrom,
                $limitto,
                $mycourses,
                $categorysort,
                $courses,
                $filtermodified
            );
        }

        // Courses Data.
        $coursecontext = array();
        foreach ($courses as $key => $course) {
            if ($date != 'all') {
                // Get the current time value.
                $time = new \DateTime("now", \core_date::get_user_timezone_object());
                $time->add(new \DateInterval("P1D"));

                $timestamp = $time->getTimestamp();

                // Check if inprogress and not passed the course end date.
                if ($date == 'inprogress' && $timestamp < $course['epochenddate']) {
                    continue;
                }

                // Check if future and not passed course start date.
                if ($date == 'future' && $timestamp > $course['epochstartdate']) {
                    continue;
                }

                // Check if past and not passed end date.
                if ($date == 'past' && $timestamp < $course['epochenddate']) {
                    continue;
                }
            }
            $coursedata = array();
            $coursedata['id'] = $course['courseid'];
            $coursedata['grader']    = $course['grader'];
            $coursedata['shortname'] = strip_tags(format_text($course['shortname']));
            $coursedata['courseurl'] = $course['courseurl'];
            $coursedata['coursename'] = strip_tags(format_text($course['coursename']));
            $coursedata['enrollusers'] = $course['enrollusers'];
            $coursedata['editcourse']  = $course['editcourse'];
            $coursedata['activity']    = $course['activity'];
            $coursedata['categoryname'] = format_text($course['categoryname']);
            if ($course['visible']) {
                $coursedata['visible'] = $course['visible'];
            }

            // This condition to handle the string url or moodle_url object problem.
            if (is_object($course['courseimage'])) {
                $coursedata['courseimage'] = $course['courseimage']->__toString();
            } else {
                $coursedata['courseimage'] = $course['courseimage'];
            }
            $coursedata['coursesummary'] = $course['coursesummary'];
            if (isset($course['coursestartdate'])) {
                $coursedata['startdate']['day'] = substr($course['coursestartdate'], 0, 2);
                $coursedata['startdate']['month'] = substr($course['coursestartdate'], 3, 3);
                $coursedata['startdate']['year'] = substr($course['coursestartdate'], 8, 4);
            }
            // Course card - Footer context is different for mycourses and all courses tab.
            if ($mycourses) {
                // Context creation for mycourses.
                $coursedata['mycourses'] = true;
                if (isset($course['coursecompleted'])) {
                    $coursedata["coursecompleted"] = $course['coursecompleted'];
                }
                if (isset($course['courseinprogress'])) {
                    $coursedata["courseinprogress"] = $course['courseinprogress'];
                    $coursedata["percentage"] = $course['percentage'];
                }
                if (isset($course['coursetostart'])) {
                    $coursedata["coursetostart"] = $course['coursetostart'];
                }
            } else {
                // Context creation for all courses.
                if (isset($course['usercanmanage']) && $allowfull) {
                    $coursedata["usercanmanage"] = $course['usercanmanage'];
                }

                if (isset($course['enrollmenticons']) && $allowfull) {
                    $coursedata["enrollmenticons"] = $course['enrollmenticons'];
                }
            }

            if (isset($course['instructors']) && $allowfull) {
                $instructors = array();
                foreach ($course['instructors'] as $key2 => $instructor) {
                    $instructordetail['name'] = $instructor['name'];
                    $instructordetail['url'] = $instructor['url'];
                    $instructordetail['picture'] = $instructor['picture']->__toString();
                    $instructors[] = $instructordetail;
                }
                $coursedata['instructors'] = $instructors;
            }

            if ($allowfull) {
                $coursedata['widthclasses'] = 'col-lg-3 col-sm-12 col-md-6';
            } else {
                $coursedata['widthclasses'] = 'col-12 h-p100 ';
            }

            // Animation Setting courseanimation.
            $coursedata['animation'] = \theme_remui\toolbox::get_setting('courseanimation');
            if (!\theme_remui\toolbox::get_setting('enablenewcoursecards')) {
                $coursedata['old_card'] = true;
            }
            $coursecontext[] = $coursedata;
        }
        $result['courses'] = $coursecontext;
        $result['view'] = get_user_preferences('course_view_state');

        if (\theme_remui\toolbox::get_setting('enablenewcoursecards')) {
            $result['latest_card'] = true;
        }

        return $result;
    }

    /**
     * Set all the child categories of parent category
     *
     * @param  integer $category Category id
     *
     * @return array             Child categories
     */
    public static function get_children_category($category) {
        global $DB;
        $childs = [$DB->get_record('course_categories', array('id' => $category))];
        $childcategories = $DB->get_records_sql('SELECT * FROM {course_categories} WHERE parent = ?', array($category));
        if (!empty($childcategories)) {
            foreach ($childcategories as $child) {
                $childs = array_merge($childs, self::get_children_category($child->id));
            }
        }
        return $childs;
    }


    /**
     * Sort function for ungraded items in the teachers personal menu.
     *
     * Compare on closetime, but fall back to openening time if not present.
     * Finally, sort by unique coursemodule id when the dates match.
     *
     * @param object $left  Left grade
     * @param object $right Right grade
     * @return int
     */
    public static function sort_graded($left, $right) {
        if (empty($left->closetime)) {
            $lefttime = $left->opentime;
        } else {
            $lefttime = $left->closetime;
        }

        if (empty($right->closetime)) {
            $righttime = $right->opentime;
        } else {
            $righttime = $right->closetime;
        }

        if ($lefttime === $righttime) {
            if ($left->coursemoduleid === $right->coursemoduleid) {
                return 0;
            } else if ($left->coursemoduleid < $right->coursemoduleid) {
                return -1;
            } else {
                return 1;
            }
        } else if ($lefttime < $righttime) {
            return  -1;
        } else {
            return 1;
        }
    }

    /**
     * Get items which have been graded.
     *
     * @return string grades
     * @throws \coding_exception
     */
    public static function graded() {
        $grades = self::events_graded();
        return $grades;
    }

    /**
     * Grading data
     * @return array Grading data
     */
    public static function grading() {
        global $USER, $PAGE;

        $grading = self::all_ungraded($USER->id);
        return $grading;
    }

    /**
     * Get everything graded from a specific date to the current date.
     *
     * @return mixed Event data
     */
    public static function events_graded() {
        global $DB, $USER;

        $params = [];
        $coursesql = '';
        $courses = enrol_get_my_courses();
        $courseids = array_keys($courses);
        $courseids[] = SITEID;
        list($coursesql, $params) = $DB->get_in_or_equal($courseids);
        $coursesql = 'AND gi.courseid '.$coursesql;

        $onemonthago = time() - (DAYSECS * 31);
        $showfrom = $onemonthago;

        $sql = "SELECT gg.*, gi.itemmodule, gi.iteminstance, gi.courseid, gi.itemtype
                  FROM {grade_grades} gg
                  JOIN {grade_items} gi
                    ON gg.itemid = gi.id $coursesql
                 WHERE gg.userid = ?
                   AND (gg.timemodified > ?
                    OR gg.timecreated > ?)
                   AND (gg.finalgrade IS NOT NULL
                    OR gg.rawgrade IS NOT NULL
                    OR gg.feedback IS NOT NULL)
                   AND gi.itemtype = 'mod'
                 ORDER BY gg.timemodified DESC";

        $params = array_merge($params, [$USER->id, $showfrom, $showfrom]);
        $grades = $DB->get_records_sql($sql, $params, 0, 5);

        $eventdata = array();
        foreach ($grades as $grade) {
            $eventdata[] = $grade;
        }

        return $eventdata;
    }

    /**
     * Get all ungraded items.
     * @param int $userid
     * @return array
     */
    public static function all_ungraded($userid) {
        $courseids = self::gradeable_courseids($userid);

        if (empty($courseids)) {
            return array();
        }

        $mods = \core_plugin_manager::instance()->get_installed_plugins('mod');
        $mods = array_keys($mods);

        $grading = [];
        foreach ($mods as $mod) {
            $class = '\theme_remui\activity';
            $method = $mod.'_ungraded';
            if (method_exists($class, $method)) {
                $grading = array_merge($grading, call_user_func([$class, $method], $courseids));
            }
        }

        usort($grading, array('self', 'sort_graded'));

        return $grading;
    }

    /**
     * Get courses where user has the ability to view the gradebook.
     *
     * @param int $userid
     * @return array
     * @throws \coding_exception
     */
    public static function gradeable_courseids($userid) {
        $courses = enrol_get_all_users_courses($userid);
        $courseids = [];
        $capability = 'gradereport/grader:view';
        foreach ($courses as $course) {
            if (has_capability($capability, \context_course::instance($course->id), $userid)) {
                $courseids[] = $course->id;
            }
        }
        return $courseids;
    }

    /**
     * This function is used to get the data for footer section.
     *
     * @param  bool $social True to skip social content
     * @return array        Footer sections data
     */
    public static function get_footer_data($social = false) {
        $footer = array();
        $colcount = 0;
        for ($i = 0; $i < 4; $i++) {
            if ($i == 0) {
                $footer['social'] = array(
                    'facebook' => \theme_remui\toolbox::get_setting('facebooksetting'),
                    'twitter'  => \theme_remui\toolbox::get_setting('twittersetting'),
                    'linkedin' => \theme_remui\toolbox::get_setting('linkedinsetting'),
                    'gplus'    => \theme_remui\toolbox::get_setting('gplussetting'),
                    'youtube'  => \theme_remui\toolbox::get_setting('youtubesetting'),
                    'instagram' => \theme_remui\toolbox::get_setting('instagramsetting'),
                    'pinterest' => \theme_remui\toolbox::get_setting('pinterestsetting'),
                    'quora' => \theme_remui\toolbox::get_setting('quorasetting')
                );
                $footer['social'] = array_filter($footer['social']); // Remove empty elements.
                if (!empty($footer['social'])) {
                    $colcount++;
                }
            } else {
                // Skip footer content if only social.
                if ($social) {
                    continue;
                }

                $title = format_text(\theme_remui\toolbox::get_setting('footercolumn'.$i.'title'), FORMAT_HTML);
                $content = format_text(\theme_remui\toolbox::get_setting('footercolumn'.$i.'customhtml'));
                if (!empty($title) || !empty($content)) {
                    $footer['sections'][] = array(
                        'title' => $title,
                        'content' => $content
                    );
                    $colcount++;
                }
            }
        }

        // Skip footer content if only social.
        if (!$social) {
            $footer['bottomtext'] = \theme_remui\toolbox::get_setting('footerbottomtext');
            $footer['bottomlink'] = \theme_remui\toolbox::get_setting('footerbottomlink');
            $footer['poweredby']  = \theme_remui\toolbox::get_setting('poweredbyedwiser');
            // To handle number of columns in footer row.
            $classes = 'col-12 ';
            if ($colcount == 4) {
                $classes .= "col-sm-6 col-lg-3";
            } else if ($colcount == 3) {
                $classes .= "col-sm-6 col-lg-4";
            } else if ($colcount == 2) {
                $classes .= "col-sm-6";
            }
            $footer['classes'] = $classes;
        }
        return $footer;
    }

    /**
     * Function to get the remote data from url
     *
     * @param string $url
     * @return array
     */
    public static function url_get_contents ($url) {
        $urlgetcontentsdata = array();
        if (function_exists('curl_exec')) {
            $conn = curl_init($url);
            curl_setopt($conn, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($conn, CURLOPT_FRESH_CONNECT, true);
            curl_setopt($conn, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($conn, CURLOPT_TIMEOUT, 3);
            if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
                curl_setopt($conn, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            }
            $urlgetcontentsdata = (curl_exec($conn));
            if (curl_errno($conn)) {
                $errormsg = curl_error($conn);
                $urlgetcontentsdata = array();
            }
            curl_close($conn);
        } else if (function_exists('file_get_contents')) {
            $urlgetcontentsdata = file_get_contents($url);
        } else if (function_exists('fopen') && function_exists('stream_get_contents')) {
            $handle = fopen($url, "r");
            $urlgetcontentsdata = stream_get_contents($handle);
        } else {
            $urlgetcontentsdata = array();
        }
        return $urlgetcontentsdata;
    }

    /**
     * Throw error with string and error code
     * @param string $error     Eigther error string id or direct string
     * @param int    $code      Numeric error code
     * @param bool   $getstring If true then $error will be treated as string id
     */
    public static function throw_error($error, $code = '', $getstring = true) {
        if ($getstring) {
            $error = get_string($error, 'theme_remui');
        }
        throw new Exception(serialize(['error' => true, 'msg' => $error . " : " . $code]), $code);
    }

     /**
     * Generates an array of sections and an array of activities for the given course.
     *
     * This method uses the cache to improve performance and avoid the get_fast_modinfo call
     *
     * @param stdClass $course
     * @return array Array($sections, $activities)
     */
    public static function get_focus_mode_sections(stdClass $course, $coursemoduleid = false) {
        global $CFG, $USER;
        require_once($CFG->dirroot.'/course/lib.php');

        $modinfo = get_fast_modinfo($course);
        $sections = $modinfo->get_section_info_all();

        // For course formats using 'numsections' trim the sections list
        $courseformatoptions = course_get_format($course)->get_format_options();
        if (isset($courseformatoptions['numsections'])) {
            $sections = array_slice($sections, 0, $courseformatoptions['numsections']+1, true);
        }

        $allsections = array();
        $active = '';
        $previous = '';
        $current = '';
        $next = '';

        foreach ($sections as $sectiondata) {
            $section = new stdClass;
            $section->sectionid = 'Section-'.$sectiondata->id;
            $section->section = $sectiondata->section;
            $section->name = get_section_name($course, $sectiondata->section);
            $section->hasactivites = false;
            $section->activities = [];
            $section->active = '';
            if (!array_key_exists($sectiondata->section, $modinfo->sections)) {
                continue;
            }

            foreach ($modinfo->sections[$sectiondata->section] as $cmid) {
                $cm = $modinfo->cms[$cmid];

                // Only add activities the user can access, aren't in stealth mode and have a url (eg. mod_label does not).
                if (!$cm->uservisible || $cm->is_stealth() || empty($cm->url)) {
                    continue;
                }
                $activity = new stdClass;
                $activity->id = $cm->id;
                $activity->course = $course->id;
                $activity->section = $sectiondata->section;
                $activity->name = $cm->name;
                $activity->icon = $cm->get_icon_url();
                $activity->hidden = (!$cm->visible);
                $activity->modname = $cm->modname;
                $activity->onclick = $cm->onclick;
                $activity->active = '';
                $url = $cm->url;
                if (!$url) {
                    $activity->url = null;
                    $activity->display = false;
                } else {
                    $activity->url = $url->out();
                    $activity->display = $cm->is_visible_on_course_page() ? true : false;
                }
                if ($activity->display) {
                    if ($coursemoduleid != false) {
                        if ($active == '') {
                            $previous = $current;
                            $current = $activity->url;
                        }
                        if ($active != '' && $next == '') {
                            $next = $activity->url;
                        }
                        if ($cm->id == $coursemoduleid) {
                            $activity->active = 'active';
                            $active = $activity->name;
                            $section->active = 'show';
                        }
                    }
                    $section->hasactivites = true;
                    $section->activities[] = $activity;
                }
            }
            $allsections[] = $section;
        }
        if (count($allsections) != 0 && $active == '') {
            $allsections[0]->active = 'show';
            $allsections[count($allsections) - 1]->last = true;
        }

        // Make forceview true for previous and next link.
        if ($previous != '') {
            $previous .= '&forceview=1';
        }
        if ($next != '') {
            $next .= '&forceview=1';
        }

        return [$allsections, $active, $previous, $next];
    }

    public static function remove_announcement_preferences() {
        global $DB;
        // Delete from DB.
        $DB->delete_records('user_preferences', array('name' => 'remui_dismised_announcement'));
    }
}
