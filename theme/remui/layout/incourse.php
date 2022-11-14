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

defined('MOODLE_INTERNAL') || die();
require_once('common.php');

global $PAGE;

if (isset($templatecontext['focusdata']['enabled']) && $templatecontext['focusdata']['enabled']) {
    if (isset($PAGE->cm->id)) {
        list(
            $templatecontext['focusdata']['sections'],
            $templatecontext['focusdata']['active'],
            $templatecontext['focusdata']['previous'],
            $templatecontext['focusdata']['next']
        ) = \theme_remui\utility::get_focus_mode_sections($COURSE, $PAGE->cm->id);
    } else {
        list(
            $templatecontext['focusdata']['sections'],
            $templatecontext['focusdata']['active']
        ) = \theme_remui\utility::get_focus_mode_sections($COURSE);
    }
}

$eh = new \theme_remui\EnrolmentPageHandler();
$templatecontext = $eh->generate_enrolment_page_context($templatecontext);

echo $OUTPUT->render_from_template('theme_remui/incourse', $templatecontext);
