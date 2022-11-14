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

namespace local_edwisersiteimporter\external;

defined('MOODLE_INTERNAL') || die();

use external_api;
use external_value;
use external_function_parameters;
use local_edwisersiteimporter\controller;


/**
 * External functions for Edwiser Site Importer.
 */
class api extends external_api {
    /**
     * Describes the parameters for refresh templates
     * @return external_function_parameters
     */
    public static function refresh_templates_parameters() {
        return new external_function_parameters(
            array()
        );
    }

    /**
     * Refresh templates fetched from Edwiser.
     * @return array   [status] Refresh status
     */
    public static function refresh_templates() {
        $controller = new controller();
        $controller->reset_templates();
        return true;
    }

    /**
     * Returns description of method parameters for delete form
     * @return external_single_structure
     * @since  Edwiser Form 1.0.0
     */
    public static function refresh_templates_returns() {
        return new external_value(PARAM_BOOL, 'Template refresh status.');
    }
}
