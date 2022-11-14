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
 * @package local_remuihomepage
 * @author  2022 Wisdmlabs
 * @license http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace local_remuihomepage\external;

defined('MOODLE_INTERNAL') || die;

use \local_remuihomepage\frontpage\section_manager as section_manager;
use \theme_remui\toolbox as toolbox;
use external_function_parameters;
use external_multiple_structure;
use context_system;
use external_value;
use context_user;
use core_scss;

trait html_section_validate_css {

    /**
     * Describes the parameters for html_section_validate_css
     * @return external_function_parameters
     */
    public static function html_section_validate_css_parameters() {
        return new external_function_parameters(
            array(
                'styles' => new external_multiple_structure(
                    new external_value(PARAM_RAW, 'CSS Style'),
                    'Styles list',
                    VALUE_OPTIONAL,
                    []
                )
            )
        );
    }

    /**
     * Delete section instance using the instance id
     * @param  [type]  $instanceid Instance id of section
     * @param  boolean $action     true to delete and false to cancel deletion
     * @return mixed               Delete/Un delete status and configdata
     */
    public static function html_section_validate_css($styles) {
        $scss = new core_scss();
        foreach ($styles as $key => $style) {
            try {
                $scss->compile('.html-blocks .html-block:nth-child(' . $key . ') { ' . $style . ' }');
                $styles[$key] = false;
            } catch (\Exception $e) {
                $styles[$key] = get_string('htmlcsserror', 'local_remuihomepage');
            }
        }
        return $styles;
    }

    /**
     * Describes the html_section_validate_css return value
     * @return external_function_parameter
     */
    public static function html_section_validate_css_returns() {
        return new external_multiple_structure(
            new external_value(PARAM_RAW, 'Error message'),
            'Errors list',
            VALUE_OPTIONAL,
            []
        );
    }
}
