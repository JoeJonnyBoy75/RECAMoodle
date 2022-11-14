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
 * Set settings service
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui\external;

defined('MOODLE_INTERNAL') || die;

use external_function_parameters;
use context_system;
use external_value;

/**
 * Set settings trait
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait serve_license_data {
    /**
     * Describes the parameters for serve_license_data
     * @return external_function_parameters
     */
    public static function serve_license_data_parameters() {
        return new external_function_parameters(
            array (
                'licensekey' => new external_value(PARAM_RAW, 'License Key'),
                'sesskey' => new external_value(PARAM_RAW, 'Session Key'),
                'action' => new external_value(PARAM_RAW, 'Action to be performed - Activation or Deactivation'),
                'onlicensepage' => new external_value(PARAM_RAW, 'Checks if the data is requested from licensing page only'),
            )
        );
    }

    /**
     * Save order of sections in array of configuration format
     * @param  string $configname  Configuration name
     * @param  string $configvalue Configuration value
     * @return bool                True
     */
    public static function serve_license_data($licensekey, $sesskey, $action, $onlicensepage) {
        global $PAGE;
        $licensekey = trim($licensekey);

        // Validation for context is needed.
        $context = context_system::instance();
        self::validate_context($context);

        try {
            // Make sure the puchase code looks valid before sending it to Envato.
            if (preg_match("/([a-f0-9]{32})/", $licensekey)) {
                $controller = new \theme_remui\controller\RemUIController($licensekey);
                if ($action == 'activate') {
                    return json_encode($controller->activate_license());
                } else if ($action == 'deactivate') {
                    return json_encode($controller->deactivate_license());
                }
            } else {
                return json_encode(["error"=> true, "msg"=> get_string('entervalidlicensekey', 'theme_remui')]);
                // return utility::throw_error('entervalidlicensekey', 30);
            }
        } catch (Exception $ex){
            // Set the error message, received via exception.
            $exmsg = $ex->getMessage();
            set_config(EDD_LICENSE_DATA, $exmsg, 'theme_remui');

            json_encode(["error"=> true, "msg"=> $exmsg]);
        }


        return "its working";
    }

    /**
     * Describes the serve_license_data return value
     * @return external_value
     */
    public static function serve_license_data_returns() {
        return new external_value(PARAM_RAW, 'Status');
    }
}
