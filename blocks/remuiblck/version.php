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
 * Edwiser RemUI.
 *
 * @package    block_remuiblck
 * @copyright  2022 WisdmLabs
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2022051200;
$plugin->requires  = 2022041900;
$plugin->maturity  = MATURITY_STABLE; // This version's maturity level.
$plugin->release   = '4.0.0';
$plugin->component = 'block_remuiblck';

// ********************* CHECK THIS PLUGIN DEPENDECIES******************************//

// $plugin->dependencies = array(
// 'theme_remui' => ANY_VERSION,   // The Foo activity must be present (any version).
// 'enrol_bar' => 2014020300, // The Bar enrolment plugin version 2014020300 or higher must be present.
// );
