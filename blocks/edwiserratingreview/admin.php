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

require_once('../../config.php');

global $PAGE, $OUTPUT;

require_login();
$context = \context_system::instance();
require_capability('block/edwiserratingreview:approvereview', $context);

$pagetitle = get_string("ernrapprovalpage", "block_edwiserratingreview");
$PAGE->set_url('/blocks/edwiserratingreview/admin.php');
$PAGE->set_context($context);
$PAGE->set_title($pagetitle);
$PAGE->set_heading($pagetitle);
$PAGE->set_pagelayout('admin');

$templatecontext = [];

echo $OUTPUT->header();
echo $OUTPUT->render_from_template('block_edwiserratingreview/adminreview',  $templatecontext);
echo $OUTPUT->footer();
