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
 * Trait for edwiser_get_shortcode_parsered_html service
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Sudam Chakor
 */

namespace local_edwiserpagebuilder\external;

defined('MOODLE_INTERNAL') || die();

use external_single_structure;
use external_function_parameters;
use external_value;
use context_system;
/**
 * Service definition for create new form
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait edwiser_get_shortcode_parsered_html {

    /**
     * Returns the functional parameter for fetching the blocks list.
     * @return external_function_parameters  Functional parameters
     */
    public static function edwiser_get_shortcode_parsered_html_parameters() {
        return new external_function_parameters(
            array(
                'shortcode' => new external_value( PARAM_TEXT, 'Shortcode with parameters' )
            )
        );
    }

    /**
     * Return the response structure Fetch the blocks list service.
     * @return external_single_structure return structure
     */
    public static function edwiser_get_shortcode_parsered_html_returns() {
        return  new external_value( PARAM_RAW, 'Generated HTML for blocks list' );
    }

    /**
     * List down the blocks data.
     * @return html return the html content.
     */
    public static function edwiser_get_shortcode_parsered_html( $shortcode ) {
        $context = context_system::instance();
        self::validate_context($context);
        $formatedtext = external_format_text( $shortcode, FORMAT_HTML, $context->id, null, null, null, array("noclean" => true));
        return $formatedtext[0];
    }
}
