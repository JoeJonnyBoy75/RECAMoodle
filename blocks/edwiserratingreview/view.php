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
 *
 * @package    block_edwiserratingreview
 * @copyright  2022 WisdmLabs
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
// defined('MOODLE_INTERNAL') || die();

require_once('../../config.php');

global $PAGE, $OUTPUT, $CFG;

require_login();
require_once($CFG->dirroot.'/blocks/edwiserratingreview/classes/dbhandler.php');

$context = \context_system::instance();

// Check for all required variables.
$pagetitle = get_string("reviewpage", "block_edwiserratingreview");
$PAGE->set_url('/blocks/edwiserratingreview/view.php');
$PAGE->set_context($context);
$PAGE->set_title($pagetitle);
$PAGE->set_heading($pagetitle);
$PAGE->set_pagelayout('admin');

$templatecontext = [];
$templatecontext['filter'] = optional_param('filter', 0, PARAM_RAW);
$templatecontext['contextid'] = optional_param('contextid', 0, PARAM_RAW);;

$templatecontext['start'] = 0;
$templatecontext['limit'] = 10;

if (has_capability('block/edwiserratingreview:approvereview', $context)) {
    $templatecontext["canapprovelink"] = new moodle_url("/blocks/edwiserratingreview/admin.php");
}
echo $OUTPUT->header();
echo $OUTPUT->render_from_template('block_edwiserratingreview/showmorepagereview',  $templatecontext);;
echo $OUTPUT->footer();
