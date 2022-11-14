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

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Edwiser Site Importer';
$string['viewtemplate'] = 'Preview';
$string['import'] = 'Import';
$string['importing'] = 'Importing {$a}';
$string['confirmation'] = 'Confirmation';
$string['continue'] = 'Continue';
$string['yes'] = 'Yes';
$string['no'] = 'No';
$string['invalidsite'] = '{$a} is not valid site.';
$string['invaliddata'] = 'Invalid json data from {$a}';
$string['invalidurl'] = 'Please enter valid url';
$string['invalidtemplatetype'] = 'Invalid template type';
$string['templates'] = 'Templates';

// Homepage.
$string['homepage'] = 'Homepage';
$string['homepagetemplates'] = 'Homepage Templates';
$string['importhomepage'] = 'Import Homepage';
$string['sectionsexists'] = 'Note: Draft changes from the remote site will be discarded while importing. <br><br>All content from your homepage will be deleted. Do you want to continue?';
$string['viewhomepage'] = 'View Homepage';
$string['importermissing'] = 'Invalid site URL or Edwiser Site importer plugin is missing';
$string['oldhomepage'] = 'You have an old RemUI Homepage plugin. Please install the latest one to use import functionality.';

// Courses.
$string['importcourse'] = 'Import course';
$string['downloadingcourse'] = 'Downloading course file';
$string['unabletodownload'] = 'Unable to download the file from URL.';
$string['formatmissingtitle'] = 'Missing';
$string['formatmissingdescription'] = 'Edwiser course format is missing. Install it for a better experience. <a href="https://edwiser.org/course-formats/" target="_blank">Click</a> here to download. Continue to use the default course format.';
