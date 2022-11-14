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
 * @package     local_remuihomepage
 * @copyright   (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author      Yogesh Shirsath
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Uninstallation hook for local_remuihomepage plugin
 * @return bool
 */
function xmldb_local_remuihomepage_uninstall() {
    global $CFG, $DB;

    $dbman = $DB->get_manager();

    // Define table remui_homepage_sections to be deleted.
    $table = new xmldb_table('remuihomepage_sections');

    // Conditionally launch delete table for remui_homepage_sections.
    if ($dbman->table_exists($table)) {
        $sm = new \local_remuihomepage\frontpage\section_manager();
        $sm->delete_all_instances();
        $dbman->drop_table($table);
    }

    unset_config("frontpagechooser", "theme_remui");

    return true;
}
