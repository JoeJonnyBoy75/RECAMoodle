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
 * Theme external services list
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

$functions = array(
    'theme_remui_set_setting' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'set_setting',
        'description'   => 'Set config',
        'type'          => 'write',
        'ajax'          => true,
    ),
    'theme_remui_save_user_profile_settings' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'save_user_profile_settings',
        'description'   => 'Save user profile data from profile page',
        'type'          => 'write',
        'ajax'          => true,
    ),
    'theme_remui_send_message' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'send_message',
        'description'   => 'Send message to user',
        'type'          => 'write',
        'ajax'          => true,
    ),
    'theme_remui_get_course_stats' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'get_course_stats',
        'description'   => 'Get course statistics',
        'type'          => 'write',
        'ajax'          => true,
    ),
    'theme_remui_get_courses' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'get_courses',
        'description'   => 'Get courses',
        'type'          => 'write',
        'ajax'          => true,
        'loginrequired' => false
    ),
    'theme_remui_hide_update' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'hide_update',
        'description'   => 'Hide update nag',
        'type'          => 'write',
        'ajax'          => true,
        'loginrequired' => true
    ),
    'theme_remui_get_tags' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'get_tags',
        'description'   => 'Returns HTML of Tags element',
        'type'          => 'read',
        'ajax'          => true,
        'loginrequired' => false
    ),
    'theme_remui_customizer_save_settings' => array(
        'classname'     => 'theme_remui\customizer\external\api',
        'methodname'    => 'save_settings',
        'description'   => 'Save customizer settings',
        'type'          => 'write',
        'ajax'          => true,
        'loginrequired' => true
    ),
    'theme_remui_customizer_get_file_from_setting' => array(
        'classname'     => 'theme_remui\customizer\external\api',
        'methodname'    => 'get_file_from_setting',
        'description'   => 'Get file from setting based on item id',
        'type'          => 'read',
        'ajax'          => true,
        'loginrequired' => true
    ),
    'theme_remui_handle_bug_feedback_report' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'handle_bug_feedback_report',
        'description'   => 'Handle the one click bug/feedback report, Gets data from feedback.js and sends the data to WordPress API endpoint.',
        'type'          => 'read',
        'ajax'          => true,
        'loginrequired' => true,
        'requiredcapability' => 'moodle/site:config'
    ),
    'theme_remui_serve_license_data' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'serve_license_data',
        'description'   => 'Edwiser RemUI Theme License Activation and Deactivation',
        'type'          => 'write',
        'ajax'          => true,
        'loginrequired' => true,
        'requiredcapability' => 'moodle/site:config'
    ),
    'theme_remui_save_current_step' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'save_current_step',
        'description'   => 'Edwiser RemUI Setup Wizard Current Step - Data Saving Service',
        'type'          => 'write',
        'ajax'          => true,
        'loginrequired' => true,
        'requiredcapability' => 'moodle/site:config'
    ),
    'theme_remui_get_myoverviewcourses' => array(
        'classname'     => 'theme_remui\external\api',
        'methodname'    => 'get_myoverviewcourses',
        'description'   => 'It will generate course data for block myoverview',
        'type'          => 'write',
        'ajax'          => true,
    ),
);
