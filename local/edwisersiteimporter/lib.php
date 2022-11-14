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
 * Main js for template importer
 *
 * @package    local_edwisersiteimporter
 * @author     Yogesh Shirsath
 * @copyright  (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Fragment to load importer view
 *
 * @param  Array $args Argument passed with fragment call
 *
 * @return String      Importer output
 */
function local_edwisersiteimporter_output_fragment_load_view($args) {

    $args = (object) $args;

    $controller = new local_edwisersiteimporter\controller();

    return $controller->get_view();
}
