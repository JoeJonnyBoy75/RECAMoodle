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
 * Theme remui upgrade hook
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->dirroot .'/theme/remui/lib.php');
require_once($CFG->dirroot .'/theme/remui/classes/productnotifications.php');

/**
 * Fix wrongly names video field options
 *
 * @param int $customfieldid Custom field category id.
 */
function theme_remui_delete_old_custom_fields($customfieldid) {
    global $DB;
    $wrongnames = ['Course Intro Video Url', 'Course Intro Video Url (Embeded)', 'Course Intro Video Url (Embedded)'];

    foreach ($wrongnames as $wrongname) {
        $shortname = "edw" . strtolower(str_replace(' ', '', $wrongname));

        $record = array(
            'shortname' => $shortname,
            'name' => $wrongname,
            'categoryid' => $customfieldid
        );
        if ($DB->record_exists('customfield_field', $record)) {
            $DB->delete_records('customfield_field', $record);
        }
    }
}

/**
 * Process course custom field required for enrolment page layout .
 */
function theme_remui_course_custom_fields() {
    global $DB;
    // Create Custom Fields Required for enrollment page.
    $customfieldid = get_config('theme_remui', 'remui_customfield_catid');
    if (!$customfieldid || !$DB->record_exists('customfield_category', array('id' => $customfieldid))) {

        $customfieldid = theme_remui_create_customfield_category('RemUI Custom Fields');
        set_config('remui_customfield_catid', $customfieldid, 'theme_remui');
    }

    theme_remui_delete_old_custom_fields($customfieldid);

    $customfields = [
        [
            'fieldname' => 'Course Duration in Hours',
            'type' => 'text',
        ],
        [
            'fieldname' => 'Course Intro Video Url (Embedded)',
            'type' => 'text',
        ],
        [
            'fieldname' => 'Skill Level',
            'type' => 'select',
            'options' => [
                'options' => "Beginner\n Intermediate\n Advanced",
                'defaultvalue' => 'Beginner',
            ],
        ],
    ];

    foreach ($customfields as $customfield) {

        $replacefor = [' ', '(', ')'];
        $replacewith = ['', '', ''];
        $filteredname = str_replace($replacefor, $replacewith, $customfield['fieldname']);
        $shortname = "edw" . strtolower($filteredname);

        $options = [];
        if (isset($customfield['options'])) {
            $options = $customfield['options'];
        }

        // Make sure not to repeat the fields.
        if (!$DB->record_exists('customfield_field', array(
            'shortname' => $shortname,
            'name' => $customfield['fieldname'],
            'categoryid' => $customfieldid
            ))) {
            theme_remui_create_custom_field($customfieldid, $customfield['fieldname'], $customfield['type'], $options);
        }
    }
}

/**
 * upgrade this edwiserform plugin database
 * @param int $oldversion The old version of the edwiserform local plugin
 * @return bool
 */
function xmldb_theme_remui_upgrade($oldversion) {
    global $CFG, $DB;

    // Init product notification configuration
    $pnotification = new \theme_remui\productnotifications();
    $pnotification->init_history_config();

    import_user_tour();

    // For the users switching from 3.* to 4.*
    migration_compatibility();

    theme_remui_course_custom_fields();
    return true;
}
