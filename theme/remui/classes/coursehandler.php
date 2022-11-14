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
 * Defines the cache usage
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

define('COURSE_IDS', 'ids');
define('MY_COURSE_IDS', 'myids');

use theme_remui\utility as utility;
use core_completion\progress as progress;

require_once($CFG->dirroot. '/course/renderer.php');
/**
 * Defines the cache usage
 * @package theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_remui_coursehandler {

    /**
     * Get cache object for logged in and logged out users
     * @return Object Cache Object
     */
    private function get_cache() {
        global $USER;
        if (!empty($USER->id) or isguestuser($USER->id)) {
            return cache::make('theme_remui', 'courses');
        }
        return cache::make('theme_remui', 'guestcourses');
    }

    /**
     * Create temporary table to join ids with table
     * @param  String $tablename Name of table
     * @param  Array $ids       Id array
     */
    public function create_temp_table($tablename, $ids) {
        global $DB, $CFG;

        $dbman = $DB->get_manager();

        $table = new xmldb_table($tablename);
        $table->add_field('id', XMLDB_TYPE_INTEGER, 10);
        $table->add_field('tempid', XMLDB_TYPE_INTEGER, 10);

        if ($dbman->table_exists($tablename)) {
            $dbman->drop_table($table);
        }

        $dbman->create_temp_table($table);

        $DB->insert_records($tablename, $ids);
    }

    /**
     * Delete temporary created table
     * @param  String $tablename Table name
     */
    public function drop_table($tablename) {
        global $DB;

        $dbman = $DB->get_manager();

        $table = new xmldb_table($tablename);

        if ($dbman->table_exists($tablename)) {
            $dbman->drop_table($table);
        }
    }

    /**
     * Get all course ids which is accessible to current user
     * @return array course ids
     */
    private function get_course_ids() {
        global $DB;
        $cache = $this->get_cache();
        $ids = $cache->get(COURSE_IDS);
        if (!$ids) {
            $ids = [];
            $where = 'c.id <> :siteid';
            $params = array(
                'contextcourse' => CONTEXT_COURSE,
                'siteid' => SITEID);
            $ctxselect = \context_helper::get_preload_record_columns_sql('ctx');
            $sql = "SELECT c.id, c.category, c.visible, $ctxselect
                FROM {course} c
                JOIN {context} ctx ON c.id = ctx.instanceid AND ctx.contextlevel = :contextcourse
                WHERE ". $where;

            $list = $DB->get_records_sql($sql, $params);
            $mycourses = enrol_get_my_courses();
            // Loop through all records and make sure we only return the courses accessible by user.
            foreach ($list as $course) {
                if (isset($list[$course->id]->hassummary)) {
                    $list[$course->id]->hassummary = strlen($list[$course->id]->hassummary) > 0;
                }
                \context_helper::preload_from_record($course);
                $context = context_course::instance($course->id);
                // Check that course is accessible by user.
                if (!array_key_exists($course->id, $mycourses) && !core_course_category::can_view_course_info($course)) {
                    unset($list[$course->id]);
                }
            }
            foreach ($list as $id => $value) {
                $ids[] = (object)[
                    'tempid' => $id
                ];
            }
            $cache->set(COURSE_IDS, $ids);
        }
        return $ids;
    }

    /**
     * Get ids of enrolled course ids
     * @return array Enrolled course ids
     */
    protected function get_my_courses() {
        global $DB;
        $cache = $this->get_cache();
        $ids = $cache->get('myids');
        if (!$ids) {
            $mycourses = enrol_get_my_courses();
            $ids = [];
            if (!empty($mycourses)) {
                foreach ($mycourses as $id => $value) {
                    $ids[] = (object)[
                        'tempid' => $id
                    ];
                }
            }
            $cache->set(MY_COURSE_IDS, $ids);
        }
        return $ids;
    }

    /**
     * Check if current user is admin or manager of site
     * @return boolean True if user is site admin/manager
     */
    public function is_admin_or_manager() {
        global $USER;
        if (is_siteadmin()) {
            return true;
        }

        $systemcontext = context_system::instance();
        // Checking two capabilities here.
        // As manager can manage the roles and manager the users too.
        if (has_capability('moodle/role:manage', $systemcontext) || has_capability('moodle/user:create', $systemcontext)) {
            return true;
        }
        return false;
    }

    /**
     * Retrieves number of records from course table
     *
     * Not all fields are retrieved. Records are ready for preloading context
     *
     * @param  string $whereclause Where condition
     * @param  string $join        Join statement
     * @param  array  $params      sql parameters
     * @param  array  $options     may indicate that summary needs to be retrieved
     * @return array               array of stdClass objects
     */
    public function get_course_records($whereclause, $join, $params, $options) {
        global $DB, $CFG;
        $sesskey = strtolower(sesskey());
        $coursestable = 'tmp_cids_' . $sesskey;
        $mycoursestable = 'tmp_mycids_' . $sesskey;
        $ismanageroradmin = $this->is_admin_or_manager();

        // Check for required options.
        if (!isset($options['sort'])) {
            $options['sort'] = false;
        }
        if (!isset($options['mycourses'])) {
            $options['mycourses'] = false;
        }
        if (!isset($options['limitfrom'])) {
            $options['limitfrom'] = 0;
        }
        if (!isset($options['limitto'])) {
            $options['limitto'] = 0;
        }
        if (!isset($options['filtermodified'])) {
            $options['filtermodified'] = true;
        }

        // Apply sorting order.
        switch($options['sort']) {
            case 'ASC':
            case 'DESC':
                $orderby = " ORDER BY c.fullname " . $options['sort'];
                break;
            default:
                $orderby = " ORDER BY c.sortorder";
                break;
        }

        $fields = array('c.id', 'c.category', 'c.sortorder',
                        'c.shortname', 'c.fullname', 'c.idnumber',
                        'c.startdate', 'c.enddate', 'c.visible', 'c.cacherev');

        // Load summary data.
        if (!empty($options['summary'])) {
            $fields[] = 'c.summary';
            $fields[] = 'c.summaryformat';
        } else {
            $fields[] = $DB->sql_substr('c.summary', 1, 1). ' as hassummary';
        }

        // If user is not admin then load viewvable course ids.
        if (!$ismanageroradmin) {
            $ids = $this->get_course_ids();
            if (empty($ids)) {
                return array(0, []);
            }
            $this->create_temp_table($coursestable, $ids);
            $join .= " INNER JOIN {" . $coursestable  . "} cids ON c.id = cids.tempid";
        }

        // Load enrolled courses if mycourses is enabled.
        if ($options['mycourses'] == true) {
            $ids = $this->get_my_courses();
            if (empty($ids)) {
                $this->drop_table($mycoursestable);
                return array(0, []);
            }
            $this->create_temp_table($mycoursestable, $ids);
            $join .= " INNER JOIN {" . $mycoursestable . "} mycids ON c.id = mycids.tempid";
        }

        $fields = join(',', $fields);
        $sql = "SELECT $fields
                FROM {course} c $join $whereclause $orderby";

        $list = $DB->get_records_sql($sql, $params, $options['limitfrom'], $options['limitto']);

        // Cache course count for upcoming request.
        $cache = $this->get_cache();
        $count = $cache->get('count');
        if ((!$count || $options['filtermodified']) && $options['totalcount'] == true) {
            $sql = "SELECT count(c.id) count
                FROM {course} c $join $whereclause";
            $count = $DB->get_record_sql($sql, $params)->count;
            $cache->set('count', $count);
        }

        // If user is not admin then load viewvable course ids.
        if (!$ismanageroradmin) {
            $this->drop_table($coursestable);
        }

        // Load enrolled courses if mycourses is enabled.
        if ($options['mycourses'] == true) {
            $this->drop_table($mycoursestable);
        }

        return array($count, $list);
    }

    /**
     * Return user's courses or all the courses
     *
     * Usually called to get usr's courese, or it could also be called to get all course.
     * This function will also be called whern search course is used.
     *
     * @param bool   $totalcount If true the course count is returned
     * @param string $search course name to be search
     * @param int    $category ids to be search of courses.
     * @param int    $limitfrom course to be returned from these number onwards, like from course 5 .
     * @param int    $limitto till this number course to be returned ,
     *                        like from course 10, then 5 course will be returned from 5 to 10.
     * @param int    $mycourses to return user's course which he/she enrolled into.
     * @param bool   $categorysort if true the categories are sorted
     * @param array  $courses pass courses if would like to load more data for those courses
     * @param bool   $filtermodified if true then fresh course count will be loaded else cached will be used
     * @return array of course.
     */
    public function get_courses(
        $totalcount = false,
        $search = null,
        $category = null,
        $limitfrom = 0,
        $limitto = 0,
        $mycourses = null,
        $categorysort = null,
        $courses = [],
        $filtermodified
    ) {
        global $DB, $CFG, $USER, $OUTPUT;
        $count = 0;
        $coursecount = 0;
        $coursesarray = array();
        $where = '';

        if (!empty($courses)) {
            $coursecount = count($courses);
        }

        require_once($CFG->dirroot.'/course/renderer.php');

        if (empty($courses)) {
            // Retrieve list of courses in category.
            $where = 'WHERE c.id <> :siteid ';
            $params = array('siteid' => SITEID);
            $join = '';
            $sesskey = strtolower(sesskey());
            $cattable = 'tmp_catids' . $sesskey;

            if (is_numeric($category) || is_array($category)) {
                $categories = self::get_allowed_categories($category);
                $cats = [];
                foreach ($categories as $category) {
                    $cats[] = (object)[
                        'tempid' => $category
                    ];
                }
                if (!empty($categories)) {
                    $this->create_temp_table($cattable, $cats);
                    $join = " INNER JOIN {" . $cattable . "} catids ON c.category = catids.tempid";
                }
            }

            if (!empty($search)) {
                $search = '%' . str_replace(' ', '%', $search) . '%';
                $where .= " AND ( LOWER(c.fullname) like LOWER(:name1) OR LOWER(c.shortname) like LOWER(:name2) )";
                $params = $params + array("name1" => $search, "name2" => $search);
            }
            // Get list of courses without preloaded coursecontacts because we don't need them for every course.
            list($coursecount, $courses) = $this->get_course_records(
                $where,
                $join,
                $params,
                [
                    'summary' => true,
                    'sort' => $categorysort,
                    'filtermodified' => $filtermodified,
                    'limitfrom' => $limitfrom,
                    'limitto' => $limitto,
                    'mycourses' => $mycourses,
                    'totalcount' => $totalcount
                ]
            );
            if (is_numeric($category) || is_array($category)) {
                $this->drop_table($cattable);
            }
        }
        // Return count of total courses by getting limited data.
        // If required.
        if ($totalcount === true) {
            return $coursecount;
        }

        // Prepare courses array.
        $chelper = new \coursecat_helper();
        foreach ($courses as $k => $course) {
            $course = (object)$course;
            $corecourselistelement = new \core_course_list_element($course);
            $context = context_course::instance($course->id);

            if ($course->category == 0) {
                continue;
            }

            $coursesarray[$count]["courseid"] = $course->id;
            $coursesarray[$count]["coursename"] = strip_tags($chelper->get_course_formatted_name($course));
            $coursesarray[$count]["shortname"] = $course->shortname;
            $coursesarray[$count]["categoryname"] = $DB->get_record('course_categories', array('id' => $course->category))->name;
            $coursesarray[$count]["visible"] = $course->visible;
            $coursesarray[$count]["courseurl"] = $CFG->wwwroot."/course/view.php?id=".$course->id;

            // This is to handle the version change.
            // User enrollment link has changed for moodle version 3.4.
            $version33 = "2017092100";
            $curversion = $DB->get_record_sql(
                'SELECT * FROM {config_plugins} WHERE plugin = ? AND name = ?',
                array('theme_remui', 'version')
            );
            $userenrollink = "/enrol/users.php?id=";
            if ($curversion > $version33) {
                $userenrollink = "/user/index.php?id=";
            }
            $coursesarray[$count]["enrollusers"] = $CFG->wwwroot.$userenrollink.$course->id."&version=".$course->id;
            $coursesarray[$count]["editcourse"] = $CFG->wwwroot."/course/edit.php?id=".$course->id;
            $coursesarray[$count]["grader"] = $CFG->wwwroot."/grade/report/grader/index.php?id=".$course->id;
            $coursesarray[$count]["activity"] = $CFG->wwwroot."/report/outline/index.php?id=".$course->id;
            $coursesummary = strip_tags($chelper->get_course_formatted_summary($corecourselistelement));
            $coursesummary = preg_replace('/\n+/', '', $coursesummary);
            $summarystring = strlen($coursesummary) > 80 ? mb_substr($coursesummary, 0, 80) . "..." : $coursesummary;
            $coursesarray[$count]["coursesummary"] = $summarystring;
            $coursesarray[$count]["epochstartdate"] = $course->startdate;
            $coursesarray[$count]["coursestartdate"] = date('d M, Y', $course->startdate);
            $coursesarray[$count]["epochenddate"] = $course->enddate;
            if (!$mycourses) {
                $coursecontext = context_course::instance($course->id);
                if (has_capability('moodle/course:update', $coursecontext)) {
                    $coursesarray[$count]["usercanmanage"] = true;
                }
            }

            // Course enrollment icons.
            if ($icons = enrol_get_course_info_icons($course)) {
                $iconhtml = '';
                foreach ($icons as $pixicon) {
                    $iconhtml .= $OUTPUT->render($pixicon);
                }
                $coursesarray[$count]["enrollmenticons"] = $iconhtml; // Add icons in context.
            }

            // Course instructors.
            $instructors = $corecourselistelement->get_course_contacts();
            foreach ($instructors as $key => $instructor) {
                $coursesarray[$count]["instructors"][] = array(
                    'name' => $instructor['username'],
                    'url'  => $CFG->wwwroot.'/user/profile.php?id='.$key,
                    'picture' => utility::get_user_picture($DB->get_record('user', array('id' => $key)))
                );
                break;
            }

            // Course image.
            foreach ($corecourselistelement->get_course_overviewfiles() as $file) {
                $isimage = $file->is_valid_image();
                $courseimage = file_encode_url(
                    "$CFG->wwwroot/pluginfile.php",
                    '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                    $file->get_filearea(). $file->get_filepath(). $file->get_filename(),
                    !$isimage
                );
                if ($isimage) {
                    break;
                }
            }
            if (!empty($courseimage)) {
                $coursesarray[$count]["courseimage"] = $courseimage;
            } else {
                $coursesarray[$count]["courseimage"] = $OUTPUT->get_generated_image_for_id($course->id);
            }
            $courseimage = '';

            // Course completion info.
            if (is_enrolled($context, $USER->id)) {
                $completion = new \completion_info($course);
                if ($completion->is_enabled()) {
                    $percentage = progress::get_course_progress_percentage($course, $USER->id);

                    if (!is_null($percentage)) {
                        $percentage = floor($percentage);
                        if ($percentage == 100) {
                            $coursesarray[$count]["coursecompleted"] = get_string('completed', 'theme_remui');
                        } else if ($percentage > 0 && $percentage < 100) {
                            $coursesarray[$count]["courseinprogress"] = get_string('resume', 'theme_remui');
                            $coursesarray[$count]["percentage"]  = $percentage;
                            $modules = $completion->get_activities();
                            foreach ($modules as $module) {
                                $data = $completion->get_data($module, false, $USER->id);
                                if (!$data->completionstate) {
                                    $coursesarray[$count]["lastaccessactivity"] = $CFG->wwwroot."/course/view.php?id=".$course->id
                                    ."#section-".$module->sectionnum;
                                    break;
                                }
                            }
                        } else {
                            $coursesarray[$count]["coursetostart"] = get_string('start', 'theme_remui');
                        }
                    } else {
                        $coursesarray[$count]["coursetostart"] = get_string('start', 'theme_remui');
                    }
                }
            }

            $count++;

        }
        if ($totalcount === false) {
            return $coursesarray;
        }
        return array($coursecount, $coursesarray);
    }

    /**
     * Clear user cache
     */
    public function invalidate_course_cache() {
        $cache = $this->get_cache();
        $result = $cache->delete_many([COURSE_IDS, MY_COURSE_IDS]);

        // Make the preference to false.
        set_user_preference('course_cache_reset', false);

        // Save the time at which cache was reset.
        set_user_preference('course_reset_time', time());
    }

    /**
     * Get course image.
     * @param  array   $corecourselistelement Course list element
     * @param  boolean $islist                Is list
     * @return string                         Course image
     */
    public static function get_course_image($corecourselistelement, $islist = false) {
        global $CFG, $OUTPUT;
        if (!$islist) {
            $corecourselistelement = new \core_course_list_element($corecourselistelement);
        }

        // Course image.
        foreach ($corecourselistelement->get_course_overviewfiles() as $file) {
            $isimage = $file->is_valid_image();
            $courseimage = file_encode_url(
                "$CFG->wwwroot/pluginfile.php",
                '/'. $file->get_contextid(). '/'. $file->get_component(). '/'.
                $file->get_filearea(). $file->get_filepath(). $file->get_filename(),
                !$isimage
            );
            if ($isimage) {
                break;
            }
        }
        if (!empty($courseimage)) {
            return $courseimage;
        } else {
            return $OUTPUT->get_generated_image_for_id($corecourselistelement->id);
        }
    }

    /**
     * Returns the data for course filter.
     */
    public static function get_course_filters_data() {
        global $PAGE;
        $filterdata = array();
        $catdata = array();
        $categories = \core_course_category::make_categories_list();
        $firstcat = true;
        foreach ($categories as $key => $value) {
            $category = new \stdClass();
            $category->id = $key;
            $category->title = $value;
            $cat = \core_course_category::get($key);
            $category->courses = $cat->get_courses_count();
            if ($firstcat) {
                $category->active = true;
                $firstcat = false;
            }
            array_push($catdata, $category);
        }
        $filterdata['catdata'] = $catdata;
        $filterdata['searchhtml'] = $PAGE->get_renderer('core', 'course')->course_search_form('', '', '', 0);
        return $filterdata;
    }

    /**
     * Get course stats
     *
     * @param object $course Course object
     *
     * @return array
     */
    public function get_course_stats($course) {
        global $DB;
        $stats = array();
        // This capability is allowed to only students - 'moodle/course:isincompletionreports'.
        $enrolledusers = get_enrolled_users(\context_course::instance($course->id), 'moodle/course:isincompletionreports');
        $coursepercentage = new \core_completion\progress();
        $stats['completed'] = 0;
        $stats['inprogress'] = 0;
        $stats['notstarted'] = 0;
        $stats['enrolledusers'] = count($enrolledusers);
        // Check if completion is enabled.
        $completion = new completion_info($course);
        if ($completion->is_enabled()) {
            $inprogress = 0;
            $completed = 0;
            $notstarted = 0;
            foreach ($enrolledusers as $student) {
                $percentvalue = $coursepercentage->get_course_progress_percentage($course, $student->id);
                if ($percentvalue == 100) {
                    $completed++;
                }
                if ($percentvalue == 0) {
                    $notstarted++;
                }
                if ($percentvalue > 0 and $percentvalue < 100) {
                    $inprogress++;
                }

            }

            $stats['completed'] = $completed;
            $stats['inprogress'] = $inprogress;
            $stats['notstarted'] = $notstarted;
        }
        return $stats;
    }

    /**
     * Get recent courses accessed by user
     *
     * @param Integer $limit
     * @return Array List of courses
     */
    public static function get_recent_accessed_courses($limit) {
        global $USER, $DB;
        $sql = 'SELECT ul.courseid, c.fullname
            FROM {user_lastaccess} ul
            JOIN {course} c ON c.id = ul.courseid
            WHERE userid = ?
            ORDER BY timeaccess
            DESC';
        $params = array ('userid' => $USER->id);
        $courses = $DB->get_records_sql($sql, $params, 0, $limit);
        if ($courses) {
            return $courses;
        }
        return array();
    }

    /**
     * Get allowed categories from category id
     *
     * @param  integer $categoryid Category id
     * @return array               Category ids
     */
    public static function get_allowed_categories($categoryid) {
        global $DB;

        $allcats = array_keys(\core_course_category::make_categories_list());
        $allowedcat = array();

        if ($categoryid == 'all') {
            return $allcats;
        } else if ($categoryid !== null && is_numeric($categoryid)) {
            $sql = "SELECT * FROM {course_categories} WHERE path LIKE ? OR path LIKE ?";
            $categories = $DB->get_records_sql($sql, array('%/' . $categoryid, '%/' . $categoryid . '/%'));
            $allowedcat = array_intersect($allcats, array_keys($categories));
        }

        return $allowedcat;
    }

    public function get_focus_context_data() {
        global $PAGE, $CFG, $COURSE, $USER;

        require_once($CFG->libdir . '/completionlib.php');

        // Focus Mode Code
        $focusdata = [];
        if (($PAGE->pagelayout === 'course' || $PAGE->pagelayout === 'incourse') && $PAGE->pagetype !== "enrol-index") {
            $focusdata['enabled'] = \theme_remui\toolbox::get_setting('enablefocusmode');
            $focusdata['on'] = get_user_preferences('enable_focus_mode', false) && $focusdata['enabled'];
            if ($focusdata['on']) {
                $focusdata['btnbg'] = 'btn-danger';
                $focusdata['btnicon'] = 'fa-compress';
            } else {
                $focusdata['btnbg'] = 'btn-primary';
                $focusdata['btnicon'] = 'fa-expand';
            }
            $focusdata['coursename'] = $COURSE->fullname;
            if ($PAGE->pagelayout === 'incourse') {
                $focusdata['courseurl'] = $CFG->wwwroot . '/course/view.php?id=' . $COURSE->id;
            }

            $coursecontext = context_course::instance($COURSE->id);

            if (is_enrolled($coursecontext, $USER->id)) {
                $completion = new \completion_info($COURSE);
                if ($completion->is_enabled()) {
                    $percentage = \core_completion\progress::get_course_progress_percentage($COURSE, $USER->id);
                    if ($percentage === null) {
                        $percentage = 0;
                    }
                    $focusdata['progress'] = (int)$percentage;
                }
            }
        }

        return $focusdata;
    }

    public function get_recent_accessed_courses_menu($limit) {

        if (!isloggedin() && !\theme_remui\toolbox::get_setting('enablerecentcourses')) {
            return false;
        }

        $finalarr = array();
        $courses = $this->get_recent_accessed_courses($limit);
        foreach ($courses as $key => $course) {
            $templatecontext['hasrecent'] = true;
            $finalarr[] = array (
                'id' => $course->courseid,
                'fullname' => format_text($course->fullname)
            );
        }

        if (empty($finalarr)) {
            return false;
        }

        return $finalarr;
    }
}
