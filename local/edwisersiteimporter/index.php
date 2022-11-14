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

defined('MOODLE_INTERNAL') || die;

global $PAGE, $OUTPUT;

// Load strings.
$stringmanager = get_string_manager();
$strings = $stringmanager->load_component_strings('local_edwisersiteimporter', 'en');
$PAGE->requires->strings_for_js(array_keys($strings), 'local_edwisersiteimporter');

$PAGE->requires->js_call_amd('local_edwisersiteimporter/main', 'initLoader');

echo $OUTPUT->render_from_template('local_edwisersiteimporter/loader', null);
