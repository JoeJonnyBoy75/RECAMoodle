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
 * Hide update nag service
 * @package   theme_remui
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui\external;

defined('MOODLE_INTERNAL') || die;

use external_function_parameters;
use external_value;
use cache;

/**
 * Hide update trait
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait hide_update {
    /**
     * Describes the parameters for hide_update
     * @return external_function_parameters
     */
    public static function hide_update_parameters() {
        return new external_function_parameters(
            array ()
        );
    }

    /**
     * Save order of sections in array of configuration format
     * @return bool                True
     */
    public static function hide_update() {
        global $PAGE;
        if (!is_siteadmin()) {
            return false;
        }
        $cache = cache::make('theme_remui', 'updates');
        $cache->set('hidelicensenag', true);
        return true;
    }

    /**
     * Describes the hide_update return value
     * @return external_value
     */
    public static function hide_update_returns() {
        return new external_value(PARAM_BOOL, 'Status');
    }
}
