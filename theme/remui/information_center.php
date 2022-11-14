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
 * Edwiser RemUI License
 * @package    theme_remui
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

use \theme_remui\toolbox;

// User Login is must.
require_login();

global $OUTPUT, $PAGE, $CFG;

$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);

if (!is_siteadmin()) {
    exit('go away sir...');
}

$templatecontext = array();

$licensecontroller = new theme_remui\controller\LicenseController();
$templatecontext['license'] = $licensecontroller->get_remui_license_template_context();

$templatecontext['announcements'] = \theme_remui\controller\RemUIController::get_remui_announcements();
require_once($CFG->dirroot.'/theme/remui/lib.php');
$templatecontext['remuithemeversion'] = get_string('themeversionforinfo', 'theme_remui', get_themereleaseinfo());
echo $OUTPUT->render_from_template('theme_remui/information_center', $templatecontext);

toolbox::remove_plugin_config(EDD_LICENSE_ACTION);
