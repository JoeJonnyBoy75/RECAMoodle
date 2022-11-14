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
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_remui;
defined('MOODLE_INTERNAL') || die();

use blog_listing;
use moodle_url;
use core_completion\progress;
use context_course;

require_once($CFG->dirroot.'/mod/forum/lib.php');

/**
 * User controller class
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class usercontroller {
    /**
     * Get post count of forums in which user is made post or courses in which user is enrolled
     * @param  Object $userobject User object
     * @return Integer            Forum post counts
     */
    public static function get_user_forum_post_count($userobject = null) {
        global $USER;
        if (!$userobject) {
            $userobject = $USER;
        }

        $courses = forum_get_courses_user_posted_in($userobject);
        $userpostcount = forum_get_posts_by_user($userobject, $courses)->totalcount;
        $userpostlink = new moodle_url('/mod/forum/user.php?id=' . $userobject->id);

        return $userpostcount;
    }

    /**
     * Get post count of posts in which user is made post or courses in which user is enrolled
     * @param  Object $userobject User object
     * @return Integer            Posts count
     */
    public static function get_user_blog_post_count($userobject = null) {
        global $USER, $DB, $CFG;
        if (!$userobject) {
            $userobject = $USER;
        }

        if (!empty($CFG->enableblogs)) {
            include_once($CFG->dirroot .'/blog/locallib.php');
        } else {
            return;
        }

        $blogobj = new blog_listing();
        if ($sqlarray = $blogobj->get_entry_fetch_sql(false, 'created DESC')) {
            $sqlarray['sql'] = "SELECT p.*, u.firstnamephonetic, u.lastnamephonetic, u.middlename,
                                       u.alternatename, u.firstname, u.lastname, u.email
                                 FROM {post} p, {user} u
                                WHERE u.deleted = 0
                                  AND p.userid = u.id
                                  AND  (p.module = 'blog' OR p.module = 'blog_external')
                                  AND (p.userid = ?  OR p.publishstate = 'site')
                                  AND u.id = ?
                                ORDER BY created DESC";
            $sqlarray['params'] = array($USER->id, $userobject->id);
            $blogobj->entries = $DB->get_records_sql($sqlarray['sql'], $sqlarray['params']);
            $userblogcount = count($blogobj->entries);
        }

        return $userblogcount;
    }

    /**
     * Count the number of contacts of user
     * @param  Object $userobject User object
     * @return Integer            Users count
     */
    public static function get_user_contacts_count($userobject = null) {
        global $USER, $DB, $CFG;
        if (!$userobject) {
            $userobject = $USER;
        }

        $userblogcount = count($DB->get_records('message_contacts', array('userid' => $userobject->id)));

        return $userblogcount;
    }

    /**
     * Get course progress of user in which user is enrolled
     * @param  Object $userobject User object
     * @return Array              Courses array
     */
    public static function get_users_courses_with_progress($userobject) {
        global $USER, $OUTPUT, $CFG;

        if (!$userobject) {
            $userobject = $USER;
        }

        require_once($CFG->dirroot.'/course/renderer.php');
        $chelper = new \coursecat_helper();

        $courses = enrol_get_users_courses($userobject->id, true, '*', 'visible DESC, fullname ASC, sortorder ASC');
        foreach ($courses as $course) {
            if (is_array($course)) {
                $course = (object)$course;
            }
            $course->fullname = strip_tags($chelper->get_course_formatted_name($course));
            // Get course list instance.
            $courseobj = new \core_course_list_element($course);

            $completion = new \completion_info($course);

            // First, let's make sure completion is enabled.
            if ($completion->is_enabled()) {
                $percentage = progress::get_course_progress_percentage($course, $userobject->id);

                if (!is_null($percentage)) {
                    $percentage = floor($percentage);
                }

                // Add completion data in course object.
                $course->completed = $completion->is_course_complete($userobject->id);
                $course->progress  = $percentage;
            }

            $course->link = $CFG->wwwroot."/course/view.php?id=".$course->id;

            $course->summary = strip_tags($chelper->get_course_formatted_summary(
                $courseobj,
                array('overflowdiv' => false, 'noclean' => false, 'para' => false)
            ));

            // Update course image in object.
            foreach ($courseobj->get_course_overviewfiles() as $file) {
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
            if (empty($courseimage)) {
                $courseimage = $OUTPUT->image_url('placeholder', 'theme');
            }

            $course->courseimage = $courseimage;
            $courseimage = '';
        }
        return $courses;
    }

    /**
     * Save user profile information
     * @param  string $fname       User firstname
     * @param  string $lname       User lastname
     * @param  string $description User description
     * @param  string $city        City name
     * @param  string $country     Country name
     * @return object              Weather result are updated or not
     */
    public static function save_user_profile_info($fname, $lname, $description, $city, $country) {
        global $USER, $DB;

        $user = $DB->get_record('user', array('id' => $USER->id));
        $user->firstname = $fname;
        $user->lastname = $lname;
        $user->description = $description;
        $user->city = $city;
        $user->country = $country;
        $result = $DB->update_record('user', $user);

        // Update Global Variable.
        $USER->firstname = $fname;
        $USER->lastname = $lname;
        $USER->city = $city;
        $USER->country = $country;

        return $result;
    }

    /**
     * This function will return the messaging panel html only.
     * In latest Moodle they have removed the core_message_render_navbar_output function
     * and Now returns two panels in same function
     * Following code is from same function message_popup_render_navbar_output but excluding the notification
     */
    public static function render_navbar_output() {
        global $USER, $OUTPUT, $PAGE;
        $unreadcount = \core_message\api::count_unread_conversations($USER);
        $requestcount = \core_message\api::get_received_contact_requests_count($USER->id);
        $msgcontext = [
            'userid' => $USER->id,
            'unreadcount' => $unreadcount + $requestcount
        ];

        $icondesign = get_config('theme_remui', 'icondesign');

        if ($icondesign != 'default') {
            $msgcontext['icondesign'] = true;
        }

        // Page aside blocks
        $blockshtml = $OUTPUT->blocks('side-pre');
        $hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));

        if (\theme_remui\toolbox::get_setting('mergemessagingsidebar') && $hasblocks) {
            $msgcontext['mergemessagingsidebar'] = true;

            if (!$PAGE->user_is_editing()) {
                $blockshtml = $OUTPUT->blocks('side-pre');
                $hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));

                if (!$hasblocks) {
                    $msgcontext['msgactive'] = true;
                }
            }
        }
        return $OUTPUT->render_from_template('core_message/message_popover', $msgcontext);
    }


    public static function wdmGetUserDetails($userId){
        global $CFG, $USER, $DB, $SESSION, $SITE, $PAGE, $OUTPUT;

        if ($DB->record_exists('user', array('id' => $userId))) {

          $moreUserData = $DB->get_record('user', array('id' => $userId), '*', MUST_EXIST);

          if($moreUserData->deleted !== '1'){

            $wdmUser = new \stdClass();
            $userData = get_complete_user_data('id', $userId);

            $userDescription = file_rewrite_pluginfile_urls($moreUserData->description, 'pluginfile.php', $userId, 'user', 'profile', null);
            $userFirst = $userData->firstname;
            $userLast = $userData->lastname;
            $fieldDepartment = $userData->department;
            $userIcq = isset($userData->icq)? $userData->icq : "";
            $userSkype = isset($userData->skype)? $userData->skype : "";
            $userYahoo = isset($userData->yahoo)? $userData->yahoo : "";
            $userAim = isset($userData->aim)? $userData->aim: "";
            $userMsn = isset($userData->msn)? $userData->msn : "";
            $userPhone1 = $userData->phone1;
            $userPhone2 = $userData->phone2;
            $userSince = $userData->firstaccess;
            $userLastLogin = $userData->lastaccess;
            $userSince = ($userSince == 0) ? 'Never' : userdate($userSince);
            $userLastLogin = ($userLastLogin == 0) ? 'Never' : userdate($userLastLogin);
            $userStatus = $userData->currentlogin;
            $userEmail = $userData->email;
            $userLang = $userData->lang.'-Latn-IT-nedis';
            if (class_exists('Locale')) {
              $userLanguage = \Locale::getDisplayLanguage($userLang, $CFG->lang);
            }

            // Step 1: get user enrolments
            $userEnroledCourses = enrol_get_users_courses($userId);

            // Step 2: get contextIds of user enrolments
            $userEnrolContexts = array();
            foreach($userEnroledCourses as $key => $enrolment) {
              $userEnrolContexts[] = $enrolment->ctxid;
            }
            // Step 3: check whether user is a teacher anywhere in Moodle; get records of assignments with contextIds
            $teacherRole = $DB->get_field('role', 'id', array('shortname' => 'editingteacher'));
            $isTeacher = $DB->record_exists('role_assignments', ['userid' => $userId, 'roleid' => $teacherRole]);
            $userRoleAssignmentsAsTeacher = $DB->get_records('role_assignments', ['userid' => $userId, 'roleid' => $teacherRole]);

            // Step 4: check for contextIds where user is a teacher
            $userTeachingContexts = new \stdClass();
            foreach($userEnrolContexts as $key => $context) {
              if($DB->record_exists('role_assignments', ['userid' => $userId, 'roleid' => $teacherRole, 'contextid' => $context])){
                $userTeachingContexts->$context = $context;
              }
            }

            // Step 5: hashmap so we have course details of only the courses the user teaches
            $teachingCourses = array();
            foreach ($userEnroledCourses as $key => $enrolment){
              $wdmCtx = $enrolment->ctxid;
              if(!empty($userTeachingContexts->$wdmCtx) && $enrolment->ctxid == $userTeachingContexts->$wdmCtx){
                $teachingCourses[$enrolment->id] = $enrolment;
              }
            }

            $enrolmentCount = count($userEnroledCourses);
            $teachingCoursesCount = count($userRoleAssignmentsAsTeacher);
            
            if ($teachingCoursesCount == 1 || $teachingCoursesCount == "1") {
                $teachingCoursesCount .= get_string('strcourse', 'theme_remui'); 
            } else {
                $teachingCoursesCount .= get_string('strcourses', 'theme_remui'); 
            }


            $teachingStudentCount = 0;
            // $teacherCourseRatings = array();
            foreach($teachingCourses as $key => $course) {
              $courseID = $course->id;
              if ($DB->record_exists('course', array('id' => $courseID))) {
                $context = context_course::instance($courseID);
                $numberOfUsers = count_enrolled_users($context, 'mod/quiz:attempt');
                $teachingStudentCount+= $numberOfUsers;
              }
            }
            
            if ($teachingStudentCount == 1 || $teachingStudentCount == "1") {
                $teachingStudentCount .= get_string('strstudent', 'theme_remui'); 
            } else {
                $teachingStudentCount .= get_string('strstudents', 'theme_remui'); 
            }

            $userLastCourses = $userData->lastcourseaccess;

            // $printUserAvatar = $OUTPUT->user_picture($userData, array('size' => 150, 'class' => 'img-fluid'));
            $rawAvatar = new \user_picture($userData);
            $rawAvatar->size = 500; // Size f2.
            $wdmRawAvatar = $rawAvatar->get_url($PAGE)->out(false);
            $profileUrl = $CFG->wwwroot . '/user/profile.php?id='. $userId;

            // User Interests.
            $userinterests = \core_tag_tag::get_item_tags('core', 'user', $userId);
            /* Map data */
            $wdmUser->userId = $userId;
            $wdmUser->fullname = $userFirst . ' ' . $userLast;
            $wdmUser->firstname = $userFirst;
            $wdmUser->lastname = $userLast;
            $wdmUser->description = $userDescription;
            $wdmUser->socialIcq = $userIcq;
            $wdmUser->socialSkype = $userSkype;
            $wdmUser->socialYahoo = $userYahoo;
            $wdmUser->socialAim = $userAim;
            $wdmUser->socialMsn = $userMsn;
            $wdmUser->phone1 = $userPhone1;
            $wdmUser->phone2 = $userPhone2;
            $wdmUser->since = $userSince;
            $wdmUser->lastLogin = $userLastLogin;
            $wdmUser->status = $userStatus;
            $wdmUser->email = $userEmail;
            $wdmUser->lang = $userLanguage;
            $wdmUser->enrolmentCount = $enrolmentCount;
            $wdmUser->isTeacher = $isTeacher;
            $wdmUser->teachingCoursesCount = $teachingCoursesCount;
            $wdmUser->teachingStudentCount = $teachingStudentCount;
            // $wdmUser->printAvatar = $printUserAvatar;
            $wdmUser->rawAvatar = $wdmRawAvatar;
            $wdmUser->profileUrl = $profileUrl;
            $wdmUser->department = $fieldDepartment;
            if (!empty($userinterests)) {
                $wdmUser->hasinterests = true;
                foreach ($userinterests as $interest) {
                    $hasinterests = true;
                    $aboutme = true;
                    $wdmUser->interests[] = $interest;
                }
            }
            return $wdmUser;
          }
      }
      return null;
    }
}
