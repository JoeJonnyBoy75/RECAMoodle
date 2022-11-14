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
 * Sets the preferences for all admins.
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_remui\task;

class notification_pref_updater extends \core\task\scheduled_task {

    /**
     * Return the task's name as shown in admin screens.
     *
     * @return string
     */
    public function get_name() {
        return get_string('inproductnotification', 'theme_remui');
    }

    /**
     * Execute the task.
     */
    public function execute() {
        $pnotification = new \theme_remui\productnotifications();

        // If its new year, update the configuration.
        if ($pnotification->get_curr_month() == '01' || $pnotification->get_curr_month() == '1') {
            // Init product notification configuration
            $pnotification = new \theme_remui\productnotifications();
            $pnotification->init_history_config();
        }

        // Updating completion history here in the cron as course completion event was not working.
        $pnotification->update_completion_history();

        // Fetching the notification msg.
        $data = $pnotification->get_notification_msg();

        if ($data->msg != null) { // Set the data only when msg is available.
            $admins = get_admins();

            foreach ($admins as $key => $admin) {
                set_user_preference("edwiser_inproduct_notification", json_encode($data), $admin);
            }
        }
    }
}
