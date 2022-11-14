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
use curl;

/**
 * Set settings trait
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait handle_bug_feedback_report {
    /**
     * Describes the parameters for handle_bug_feedback_report
     * @return external_function_parameters
     */
    public static function handle_bug_feedback_report_parameters() {
        return new external_function_parameters(
            array (
                'feedbackdata' => new external_value(PARAM_RAW, 'Received feedback data from feedback JS'),
            )
        );
    }
    /**
     * Save order of sections in array of configuration format
     * @return bool                True
     */
    public static function handle_bug_feedback_report($feedbackdata) {
        global $PAGE;

        // Validation for context is needed.
        $context = context_system::instance();
        self::validate_context($context);

        $response = 0;

        // Only for admins.
        if (!is_siteadmin()) {
            return $response;
        }

        // Get data from RemUI Usage Tracking (RemUI Analytics).
        $ranalytics = new \theme_remui\usage_tracking();
        $analyticsdata = $ranalytics->get_sitedata_bug_feedback_report();

        $feedbackdataobj = json_decode($feedbackdata);

        // Merge usage tracking data with feedback data.
        $feedbackdataobj->siteurl = $analyticsdata['siteurl'];
        $feedbackdataobj->databasename = $analyticsdata['databasename'];
        $feedbackdataobj->php = $analyticsdata['php_version'];
        $feedbackdataobj->php_settings = $analyticsdata['php_settings'];
        $feedbackdataobj->web_server = $analyticsdata['web_server'];
        $feedbackdataobj->server_os = $analyticsdata['server_os'];
        $feedbackdataobj->system_version = $analyticsdata['system_version'];
        $feedbackdataobj->installed_plugins = $analyticsdata['installed_plugins'];

        $feedbackdatajson = json_encode($feedbackdataobj);

        $url = "https://edwiser.org/wp-json/edwiser_customizations/handle_remui_bugreport";
        // Call api endpoint with data.
        $curl = new curl();

        // Set the url, number of POST vars, POST data.
        $curl->setopt([
            'CURLOPT_URL' => $url,
            'CURLOPT_CUSTOMREQUEST' => "POST",
            'CURLOPT_RETURNTRANSFER' => true,
            'CURLOPT_HTTPHEADER' => array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($feedbackdatajson)
            )
        ]);

        $result = $curl->post($url, $feedbackdatajson);
        if ($curl->get_errno() === 0) {
            $resultarray = json_decode($result, true);
        } else {
            return $response;
        }

        if ($resultarray['success'] && $resultarray['redmine_issue_id']) {
            return $resultarray['redmine_issue_id'];
        }

        return $response;
    }

    /**
     * Describes the handle_bug_feedback_report return value
     * @return external_value
     */
    public static function handle_bug_feedback_report_returns() {
        return new external_value(PARAM_INT, 'Feedback ID or 0');
    }
}
