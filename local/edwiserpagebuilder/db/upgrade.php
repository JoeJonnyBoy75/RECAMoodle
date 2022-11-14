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
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav Govande
 */
defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . '/local/edwiserpagebuilder/lib.php');
/**
 * Custom code to be run on upgrading the plugin.
 * @param int $oldversion Plugin's old version
 * @return bool True if upgrade successful
 */
function xmldb_local_edwiserpagebuilder_upgrade($oldversion) {
    global $DB;

    // Creating a table for layouts
    $dbman = $DB->get_manager();
    $table = new xmldb_table('edw_page_block_layouts');

    $table->addField(new xmldb_field('id', XMLDB_TYPE_INTEGER, 10, null, true, true));
    $table->addField(new xmldb_field('title', XMLDB_TYPE_CHAR, 255, null, true));
    $table->addField(new xmldb_field('belongsto', XMLDB_TYPE_CHAR, 255, null, true));
    $table->addField(new xmldb_field('label', XMLDB_TYPE_CHAR, 255, true, true));
    $table->addField(new xmldb_field('thumbnail', XMLDB_TYPE_TEXT, 255, null, true));
    $table->addField(new xmldb_field('content', XMLDB_TYPE_TEXT, null, null, true));
    $table->addField(new xmldb_field('version', XMLDB_TYPE_INTEGER, 10, null, false, false));
    $table->addField(new xmldb_field('updateavailable', XMLDB_TYPE_INTEGER, 1, null, false, false, 0));
    $table->addField(new xmldb_field('visible', XMLDB_TYPE_INTEGER, 1, null, false, false, 0));

    $table->addKey(new xmldb_key('primary', XMLDB_KEY_PRIMARY, array('id')));

    if (!$dbman->table_exists($table)) {
        $dbman->create_table($table);
    }

    // Updating the edw_page_blocks table
    $table = new xmldb_table('edw_page_blocks');

    // Adding events field.
    $field = new xmldb_field('type', XMLDB_TYPE_CHAR, 100, null, false, false, "block");
    if (!$dbman->field_exists($table, $field)) {
        $dbman->add_field($table, $field);
    }

    // Adding events field.
    $field = new xmldb_field('categories', XMLDB_TYPE_CHAR, 100, null, false, false);
    if (!$dbman->field_exists($table, $field)) {
        $dbman->add_field($table, $field);
    }

    // Update the block content on upgradation
    local_edwiserpagebuilder_update_block_content();

    return true;
}
