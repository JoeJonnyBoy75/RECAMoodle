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
 * A drawer based layout for the boost theme.
 *
 * @package   theme_boost
 * @copyright 2021 Bas Brands
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

require_once('common.php');

// Get the filters first.
$filterdata = \theme_remui_coursehandler::get_course_filters_data();

$templatecontext['categories'] = $filterdata['catdata'];
$templatecontext['searchhtml'] = $filterdata['searchhtml'];

if (\theme_remui\toolbox::get_setting('enablenewcoursecards')) {
    $templatecontext['latest_card'] = true;
}

$categoryid = 'all';
$categoryid = optional_param('categoryid', $categoryid, PARAM_RAW);

if ($categoryid != 'all') {
    if (core_course_category::get($categoryid, IGNORE_MISSING) == null) {
        $categoryid = 'all';
    }
}

$courserenderer = $PAGE->get_renderer('core', 'course');
$templatecontext['coursearchivefiltermenumorebutton'] = $courserenderer->get_morebutton_pagetitle($categoryid);

$templatecontext['defaultcat'] = $categoryid;

echo $OUTPUT->render_from_template('theme_remui/coursearchive', $templatecontext);


