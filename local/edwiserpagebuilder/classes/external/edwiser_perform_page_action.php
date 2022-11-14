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
 * Trait for edwiser_perform_page_action service
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav Govande
 */

namespace local_edwiserpagebuilder\external;

defined('MOODLE_INTERNAL') || die();

use external_single_structure;
use external_function_parameters;
use external_value;
use context_system;
use stdClass;

/**
 * Service definition to perform page action (Add new / Update old)
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait edwiser_perform_page_action {

    /**
     * Returns the functional parameter.
     * @return external_function_parameters  Functional parameters
     */
    public static function edwiser_perform_page_action_parameters() {
        return new external_function_parameters(
            array(
                'action' => new external_value( PARAM_RAW, 'Action to perform'),
                'instid' => new external_value( PARAM_RAW, 'Page instance id'),
                'pageid' => new external_value( PARAM_RAW, 'Page template id'),
                'pagename' => new external_value( PARAM_RAW, 'Page title'),
                'fullscreen' => new external_value( PARAM_RAW, 'Is page fullscreen (0-fullscreen/ 1-normal width)')
            )
        );
    }

    /**
     * Return the response structure.
     * @return external_single_structure return structure
     */
    public static function edwiser_perform_page_action_returns() {
        return new external_value(PARAM_RAW, 'Json Encoded response');
    }

    /**
     * Perform the action specified in the arguments.
     * Action - add new page / modify existing one
     * @return
     */
    public static function edwiser_perform_page_action($action, $instid, $pageid, $pagename, $fullscreen) {

        $pm = new \local_edwiserpagebuilder\page_manager();

        $pageconfig = $pm->perform_page_action($action, $instid, $pageid, $pagename, $fullscreen);

        return json_encode($pageconfig);
    }
}
