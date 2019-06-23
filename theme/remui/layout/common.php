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
require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/message/lib.php'); // for messaging section in sidebar

user_preference_allow_ajax_update('menubar_state', PARAM_ALPHA);
user_preference_allow_ajax_update('pin_aside', PARAM_ALPHA);
user_preference_allow_ajax_update('course_view_state', PARAM_ALPHA);

user_preference_allow_ajax_update("remui_layout_top", PARAM_TEXT);
user_preference_allow_ajax_update("remui_layout_left", PARAM_TEXT);
user_preference_allow_ajax_update("remui_layout_right", PARAM_TEXT);

global $USER, $PAGE;

$PAGE->requires->strings_for_js(['sidebarpinned', 'sidebarunpinned'], 'theme_remui');

$isfolded = 0;
// merge messaging panel into right sidebar or not
$mergemessagingsidebar = \theme_remui\toolbox::get_setting('mergemessagingsidebar');
$messagedrawer = '';
$messagetoggle = '';
if($mergemessagingsidebar) {
    $messagedrawer = core_message_standard_after_main_region_html(); // message drawer html
    $messagetoggle = core_message_render_navbar_output($OUTPUT); // message drawer toggle, in sidebar tabs
}
$unread_request_count = 0;
if ($messagetoggle) {
    $unreadcount = \core_message\api::count_unread_conversations($USER);
    $requestcount = \core_message\api::get_received_contact_requests_count($USER->id);
    $unread_request_count = $unreadcount + $requestcount;
}

$blockshtml = $OUTPUT->blocks('side-pre', array(), 'aside');
$hasblocks  = strpos($blockshtml, 'data-block=') !== false;
$hasmessaging  = empty($messagedrawer) !== true;
$usercanmanage = \theme_remui\utility::check_user_admin_cap();
$init_rightsidebar = false; // true only conditionally

// check if sidebar is fold or unfold & aside right state
if (isloggedin()) {
    $menubar_state = get_user_preferences('menubar_state', 'unfold');
    if ($menubar_state == 'fold') {
        $isfolded = 1;
    }
    $pin_aside = get_user_preferences('pin_aside', '');
    
    // always pinned for quiz and book activity
    $activities = array("book", "quiz");
    if (isset($PAGE->cm->id) && in_array($PAGE->cm->modname, $activities) || $PAGE->user_is_editing()) {
        $pin_aside = 'pinaside';
    }
} else {
    $menubar_state = 'fold';
    $isfolded = 1;
    $pin_aside = '';
}

// if no blocks in sidebar, it will always be overlay (no pin option)
if(!$hasblocks) {
    $pin_aside = '';

    // hack - make messagetoggle tab button in right sidebar active, if no blocks tab, so 2nd tab show active
    // we have to do this because this variable contains full <li> structure of tab
    if($messagetoggle) {
        $messagetoggle = str_replace('class="nav-link popover-region-toggle"', 'class="nav-link popover-region-toggle active show"',$messagetoggle);
    }
}

$extraclasses = [];
$extraclasses [] = 'site-menubar-'.$menubar_state.' site-menubar-fold-alt site-menubar-keep '. $pin_aside;

// classes to show right sidebar only if one of the below is true
if ($hasblocks || $usercanmanage || $hasmessaging) {
    $extraclasses [] = 'page-aside-fixed page-aside-right';
    $init_rightsidebar = true;
}

if ($PAGE->pagelayout == 'mypublic') {
    $extraclasses [] = ' page-profile ';
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'messagedrawer' => $messagedrawer,
    'messagetoggle' => $messagetoggle,
    'unread_request_count' => $unread_request_count,
    'pin_aside' => $pin_aside,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'usercanmanage' => $usercanmanage,
    'init_rightsidebar' => $init_rightsidebar,
    'bodyattributes' => $bodyattributes,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'cansignup' => (!empty($CFG->registerauth) && (!isloggedin() || isguestuser())),
    'signupurl' => new moodle_url('/login/signup.php'),
    'footerdata' => \theme_remui\utility::get_footer_data(),
    'isfolded'    => $isfolded,
    'sesskey'       => $USER->sesskey,
    'navbarinverse' => \theme_remui\toolbox::get_setting('navbarinverse'),
    'sidebarcolor' => \theme_remui\toolbox::get_setting('sidebarcolor'),
    \theme_remui\toolbox::get_setting('sitecolor', 'primary') => 'true',
];

// for all partials
$templatecontext['navbarinverse'] = \theme_remui\toolbox::get_setting('navbarinverse');
$templatecontext['sitecolor']  = \theme_remui\toolbox::get_setting('sitecolor');
$templatecontext['sidebarcolor'] = \theme_remui\toolbox::get_setting('sidebarcolor');

$templatecontext['is_siteadmin'] = is_siteadmin();
$templatecontext['user_is_editing'] = $this->page->user_is_editing();
$templatecontext['usercanmanage'] = \theme_remui\utility::check_user_admin_cap();

$nav = $PAGE->flatnav;
$templatecontext['flatnavigation'] = flatnav_icon_support($nav);
$templatecontext['firstcollectionlabel'] = $nav->get_collectionlabel();
$templatecontext['coursecreationlink'] = \theme_remui\utility::getCreateCourseLink();
if ($hasblocks) {
    $templatecontext['hasblock'] = true;
}

if (isloggedin() && \theme_remui\toolbox::get_setting('enablerecentcourses')) {
    $courses = \theme_remui\utility::get_recent_accessed_courses(5);
    $finalarr = array();
    foreach ($courses as $key => $course) {
        $templatecontext['hasrecent'] = true;
        $finalarr[] = array('id'=>$course->courseid, 'fullname'=>format_text($course->fullname));
    }
    $templatecontext['recentcourses'] = $finalarr;
}

$templatecontext['enabledictionary'] = \theme_remui\toolbox::get_setting('enabledictionary');
if (strpos($bodyattributes, 'editing') !== false) {
    $templatecontext['editingenabled'] = true;
}
