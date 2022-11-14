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
 * Edwiser Importer plugin
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 */

require_once('../../../config.php');

global $USER, $CFG;

require_admin();

$PAGE->set_context(context_system::instance());

// Get file url.
$fileurl = required_param('file', PARAM_TEXT);

// Set page url.
$PAGE->set_url(new moodle_url('/local/edwisersiteimporter/importer/course.php', array('file' => $fileurl)));

$fs = get_file_storage();

$context = context_user::instance($USER->id);

$component = 'user';
$filearea = 'draft';
$itemid = file_get_unused_draft_itemid();
$contextid = $context->id;
$filepath = '/';
$filename = 'edwiser-course-import-file.mbz';

// Prepare file record object.
$fileinfo = array(
    'component' => $component,
    'filearea'  => $filearea,
    'itemid'    => $itemid,
    'contextid' => $contextid,
    'filepath'  => $filepath,
    'filename'  => $filename
);

try {
    ob_start();
    $file = $fs->create_file_from_url($fileinfo, $fileurl);

    $restoreurl = new moodle_url(
        $CFG->wwwroot . '/backup/restorefile.php',
        array(
            'action' => 'choosebackupfile',
            'filename' => $filename,
            'filepath' => $filepath,
            'component' => $component,
            'filearea' => $filearea,
            'filecontextid' => $contextid,
            'contextid' => 1,
            'itemid' => $itemid
        )
    );

    redirect($restoreurl);
} catch (Exception $ex) {
    ob_clean();
    echo $OUTPUT->header();
    echo "<center><h4>" . get_string('downloadingcourse', 'local_edwisersiteimporter') . "</h4>";
    echo "<h4>" . $ex->a . "</h4>" . $fileurl;
    echo "</center>";
    echo $OUTPUT->footer();
    die;
}
