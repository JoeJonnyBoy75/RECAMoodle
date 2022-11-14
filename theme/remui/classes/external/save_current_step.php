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

require_once($CFG->libdir.'/adminlib.php');

use external_function_parameters;
use context_system;
use external_value;

/**
 * Set settings trait
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait save_current_step {
    /**
     * Describes the parameters for save_current_step
     * @return external_function_parameters
     */
    public static function save_current_step_parameters() {
        return new external_function_parameters(
            array (
                'step' => new external_value(PARAM_RAW, 'Step Number.'),
                'settings' => new external_value(PARAM_RAW, 'Json Encoded Settings Data.')
            )
        );
    }

    /**
     * Save order of sections in array of configuration format
     * @param  string $configname  Configuration name
     * @param  string $configvalue Configuration value
     * @return bool                True
     */
    public static function save_current_step($step, $settings) {
        global $PAGE;
        //  This context setup is very wrong... had to do it because had no option.
        //  Problem - everytime time Page context was reset on page load.
        // $PAGE->set_context(\context_system::instance());

        // Validation for context is needed.
        $context = context_system::instance();
        self::validate_context($context);

        $settings = json_decode($settings);
        $sesskey = $settings[0]->value; // Sesskey is present at 0th index
        if (!confirm_sesskey($sesskey)) {
            return false;
        }

        $steps = $settings[1]->value; // Step count is present at 1st index

        $skipInputs = ["sesskey", "edd_remui_license_key", "onLicensePage", "totalsteps"];

        $data = [];
        foreach ($settings as $key => $value) {
            if (!in_array($value->name, $skipInputs)) {
                $data[$value->name] = $value->value;
            }
        }
        $count = admin_write_settings($data); // saving the settings

        if ($step != -1) {
            // Updating the Step
            // -1 means step is already updated just save the config data not step status.
            // here current step is substraccted by one - because of index 0
            // if we would have started it with index 1 --- we would have used $step as current step
            // and $step+1 as next step.
            $steps = json_decode(get_config("theme_remui", "swstepstatus"), true);
            $steps[$step - 1]= ["status" => "done", "isactive" => false]; // Current Step
            $steps[$step] = ["status" => "current", "isactive" => true]; // Next Step
            set_config('swstepstatus', json_encode($steps), "theme_remui");
        }

        return true;

    }

    /**
     * Describes the save_current_step return value
     * @return external_value
     */
    public static function save_current_step_returns() {
        return new external_value(PARAM_RAW, 'Status');
    }
}
