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
 */

defined('MOODLE_INTERNAL') || die();
	
function xmldb_theme_remui_uninstall() {
    global $CFG, $DB;
    // Delete the custom fields
    $catid = get_config('theme_remui', 'remui_customfield_catid');
    if ($catid && $DB->record_exists('customfield_category', array('id' => $catid))) {

	    $handler = \core_customfield\handler::get_handler('core_course', 'course', 0);
	    $category = \core_customfield\category_controller::create($catid);
	    $handler->delete_category($category);
	}

    return true;
}
