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
 * Plugin administration pages are defined here.
 *
 * @package   block_edwiser_grader
 * @copyright Copyright (c) 2020 WisdmLabs. (http://www.wisdmlabs.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
$settings = null;
if (is_siteadmin()) {
    $ADMIN->add(
        'blocksettings',
        new admin_category('block_edwiserratingreview_category', get_string('pluginname', 'block_edwiserratingreview'))
    );

    $ADMIN->add(
        'block_edwiserratingreview_category',
        new admin_externalpage(
                'block_edwiserratingreview_approvalpage',
                 get_string('approvalpage', 'block_edwiserratingreview'),
                 new moodle_url('/blocks/edwiserratingreview/admin.php'),
                'block/edwiserratingreview:approvereview'
        )
    );
}
