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
 * A two column layout for the remui theme.
 *
 * @package   theme_remui
 * @copyright 2016 Damyon Wiese
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// require_once($CFG->libdir . '/behat/lib.php');
require_once($CFG->dirroot . '/course/lib.php');

use \theme_remui\toolbox;
// Add block button in editing mode.
$addblockbutton = $OUTPUT->addblockbutton();

// user_preference_allow_ajax_update('pin_aside', PARAM_ALPHA);
user_preference_allow_ajax_update('course_view_state', PARAM_ALPHA);
user_preference_allow_ajax_update('enable_focus_mode', PARAM_BOOL);
user_preference_allow_ajax_update('remui_dismised_announcement', PARAM_BOOL);
user_preference_allow_ajax_update('edwiser_inproduct_notification', PARAM_ALPHA);
user_preference_allow_ajax_update('drawer-open-nav', PARAM_ALPHA);
user_preference_allow_ajax_update('drawer-open-index', PARAM_BOOL);
user_preference_allow_ajax_update('drawer-open-block', PARAM_BOOL);

if (isloggedin()) {
    $courseindexopen = (get_user_preferences('drawer-open-index', true) == true);
    $blockdraweropen = (get_user_preferences('drawer-open-block') == true);
} else {
    $courseindexopen = false;
    $blockdraweropen = false;
}
$extraclasses = ['uses-drawers'];

if ($courseindexopen) {
    $extraclasses[] = 'drawer-open-index';
}

// RemUI Usage Tracking (RemUI Analytics).
$ranalytics = new \theme_remui\usage_tracking();
$ranalytics->send_usage_analytics();

// Page aside blocks
$blockshtml = $OUTPUT->blocks('side-pre');
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));

if (!$hasblocks) {
    $blockdraweropen = false;
}
$courseindex = core_course_drawer();
if (!$courseindex) {
    $courseindexopen = false;
}

// Message drawer html and drawer toggle in sidebar tabs.
$mergemessagingsidebar = \theme_remui\toolbox::get_setting('mergemessagingsidebar');

$messagedrawer = '';
$messagetoggle = '';
if ($mergemessagingsidebar && $hasblocks) {
    $messagedrawer = core_message_standard_after_main_region_html();
    $messagetoggle = \theme_remui\usercontroller::render_navbar_output();
}
$unreadrequestcount = 0;
if ($messagetoggle) {
    $unreadcount = \core_message\api::count_unread_conversations($USER);
    $requestcount = \core_message\api::get_received_contact_requests_count($USER->id);
    $unreadrequestcount = $unreadcount + $requestcount;
}
$usercanmanage = \theme_remui\utility::check_user_admin_cap();

$hasmessaging = empty($messagedrawer) !== true;

$extraclasses[] = 'remui-customizer';

if ($PAGE->pagelayout == 'mypublic') {
    $extraclasses [] = ' page-profile ';
}
if ($hasblocks) {
    $extraclasses[] = 'hasblocks';
} else {
    $messagetoggle = str_replace(
        'class="nav-link popover-region-toggle h-100"',
        'class="nav-link popover-region-toggle active show h-100"',
        $messagetoggle
    );
}

if ($mergemessagingsidebar && $hasblocks) {
    $extraclasses[] = 'mergemessagingsidebar';
}

// Focus data
$coursehandler = new \theme_remui_coursehandler();
$focusdata = $coursehandler->get_focus_context_data();
if (isset($focusdata['on']) && $focusdata['on']) {
    $extraclasses[] = 'focusmode';
}

/*Enrolment Page setup*/
$enrolconfig = get_config('theme_remui', 'enrolment_page_layout');
if ($PAGE->pagetype == "enrol-index" && $enrolconfig == "1") {

    $templatecontext['enableenrollayout'] = $enrolconfig;
    $extraclasses[] = 'enableenrollayout';
}
$customizer = \theme_remui\customizer\customizer::instance();
$extraclasses[] = 'header-site-identity-' . $customizer->get_config('logoorsitename');
$extraclasses[] = 'header-primary-layout-desktop-' . $customizer->get_config('header-primary-layout-desktop');

$icondesign = \theme_remui\toolbox::get_setting('icondesign');
if ($icondesign !== 'default') {
    $extraclasses[] = $icondesign;
}
$formgroupdesign = \theme_remui\toolbox::get_setting('formgroupdesign');
if ($formgroupdesign !== 'default') {
    $extraclasses[] = $formgroupdesign;
}

/* RemUI Announcement */
if (\theme_remui\toolbox::get_setting('enableannouncement') && !get_user_preferences('remui_dismised_announcement')) {
    $extraclasses[] = 'remui-notification';
}

$bodyattributes = $OUTPUT->body_attributes($extraclasses);
$regionmainsettingsmenu = $OUTPUT->region_main_settings_menu();
$sitecolor = get_config('theme_remui', 'sitecolor');
$sitecolor = ($sitecolor == "") ? 'primary' : $sitecolor;
$sitecolorhex = get_config('theme_remui', 'sitecolorhex');
if (stripos($sitecolorhex, '#') === false) {
    $sitecolorhex = '#'.$sitecolorhex;
}
$navbarinverse = get_config('theme_remui', 'navbarinverse');
$sidebarcolor = get_config('theme_remui', 'sidebarcolor');
$lcontroller = new \theme_remui\controller\LicenseController();

$forceblockdraweropen = $OUTPUT->firstview_fakeblocks();

$secondarynavigation = false;
$overflow = '';
if ($PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    $overflowdata = $PAGE->secondarynav->get_overflow_menu_data();
    if (!is_null($overflowdata)) {
        $overflow = $overflowdata->export_for_template($OUTPUT);
    }
}

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);
$buildregionmainsettings = !$PAGE->include_region_main_settings_in_header_actions() && !$PAGE->has_secondary_navigation();
// If the settings menu will be included in the header then don't add it here.
$regionmainsettingsmenu = $buildregionmainsettings ? $OUTPUT->region_main_settings_menu() : false;

if (!isloggedin() && \theme_remui\toolbox::get_setting('navlogin_popup')) {
    $primarymenu = \theme_remui\utility::get_login_menu_data($primarymenu);
}

// Recent Courses Menu
$primarymenu = \theme_remui\utility::get_recent_courses_menu($primarymenu);

// Course Categories Menu
if (get_config('theme_remui', 'enabledisablecoursecategorymenu') == true) {
    $primarymenu = \theme_remui\utility::get_coursecategory_menu($primarymenu);
}

$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);

$hasdrawer = false;
if ($hasblocks ||  $hasmessaging) {
    $hasdrawer = true;
}

$templatecontext = [
    'sitename' => format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]),
    'output' => $OUTPUT,
    'sidepreblocks' => $blockshtml,
    'hasblocks' => $hasblocks,
    'hasdrawer' => $hasdrawer,
    'bodyattributes' => $bodyattributes,
    'courseindexopen' => $courseindexopen,
    'blockdraweropen' => $blockdraweropen,
    'courseindex' => $courseindex,
    'primarymoremenu' => $primarymenu['moremenu'],
    'secondarymoremenu' => $secondarynavigation ?: false,
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'forceblockdraweropen' => $forceblockdraweropen,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'hasregionmainsettingsmenu' => !empty($regionmainsettingsmenu),
    'overflow' => $overflow,
    'headercontent' => $headercontent,
    'addblockbutton' => $addblockbutton,
    'regionmainsettingsmenu' => $regionmainsettingsmenu,
    'cansignup' => (!empty($CFG->registerauth) && (!isloggedin() || isguestuser())),
    'signupurl' => new moodle_url('/login/signup.php'),
    'footerdata' => \theme_remui\utility::get_footer_data(),
    'usercanmanage' => $usercanmanage,
    'hasmessaging' => $hasmessaging,
    'messagedrawer' => $messagedrawer,
    'messagetoggle' => $messagetoggle,
    'navbarinverse' => $navbarinverse,
    'sidebarcolor' => $sidebarcolor,
    'unreadrequestcount' => $unreadrequestcount,
    $sitecolor => true,
    'sitecolorhex' => $sitecolorhex,
    'focusdata' => $focusdata,
    'cansendfeedback' => (is_siteadmin()) ? true : false, // check to show feedback button if admin user
    'feedbacksender_emailid' => isset($USER->email) ? $USER->email : '', // email id of the person sending feedback, for auto fill the email field in feedback overview modal
    'feedback_loading_image' => $OUTPUT->image_url('a/loading', 'core'),
    'licensestatus_forfeedback' => ($lcontroller->get_data_from_db() == 'available') ? 1 : 0
];
// $templatecontext['navfootermenu'] = \theme_remui\utility::get_left_nav_footer_menus();

// Init product notification configuration
if ($recentcourses = $coursehandler->get_recent_accessed_courses_menu(5)) {
    $templatecontext['recentcourses'] = $recentcourses;
}

if (strpos($bodyattributes, 'editing') !== false) {
    $templatecontext['editingenabled'] = true;
} else if (\theme_remui\toolbox::get_setting('enabledictionary')) {
    // Enable dictionary only when editing is off
    $templatecontext['enabledictionary'] = true;
}

if (get_user_preferences('course_cache_reset')) {
    $coursehandler->invalidate_course_cache();
} else if (get_config('theme_remui', 'cache_reset_time') > get_user_preferences('cache_reset_time')) {
    $coursehandler->invalidate_course_cache();
}

// feedback JS needs this URL to funtion properly.
$canvasurl = new moodle_url($CFG->wwwroot . '/theme/remui/amd/src/html2canvas.js');
$templatecontext['canvasurl'] = $canvasurl->__toString();

// Unset the EDD_LICENSE_ACTION i.e. license notice- for activated themes.
toolbox::remove_plugin_config(EDD_LICENSE_ACTION);

// Init product notification configuration
if ($notification = \theme_remui\utility::get_inproduct_notification()) {
    $templatecontext['notification'] = $notification;
}

// Custom Modal Generation code
if ($PAGE->user_is_editing() && is_plugin_available('local_edwiserpagebuilder')) {
    // $PAGE->requires->js_call_amd('local_edwiserpagebuilder/blockmanager', 'load');
    $PAGE->requires->js_call_amd('local_edwiserpagebuilder/pagemanager', 'load');
}

// Icon Design Setting.
if (get_config('theme_remui', 'icondesign') != 'default') {
    $templatecontext['icondesign'] = true;
}

// Main content Top Region
if (in_array("side-bottom", $this->page->blocks->get_regions())) {
    $templatecontext['addblockbuttonbottom'] = $OUTPUT->addblockbutton('side-bottom');
    $templatecontext['sidebottomblocks'] = $OUTPUT->blocks('side-bottom');
    $templatecontext['canaddbottomblocks'] = true;
}

// Main content Bottom Region
if (in_array("side-top", $this->page->blocks->get_regions())) {
    $templatecontext['addblockbuttontop'] = $OUTPUT->addblockbutton('side-top');
    $templatecontext['sidetopblocks'] = $OUTPUT->blocks('side-top');
    $templatecontext['canaddtopblocks'] = true;
}
$PAGE->requires->strings_for_js(array(
    'searchcatplaceholdertext'
), 'theme_remui');
