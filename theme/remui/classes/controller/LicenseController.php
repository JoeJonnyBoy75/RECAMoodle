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
 * Edwiser RemUI
 * @package   theme_remui
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui\controller;

defined('MOODLE_INTERNAL') || die();

use moodle_url;
use context_system;
use stdClass;
use Exception;
use \theme_remui\toolbox;
use \theme_remui\utility;

// Plugins short name appears on the License Menu Page.
define('PLUGINSHORTNAME', 'Edwiser RemUI');
// This slug is used to store the data in db.
// License is checked using two options viz edd_<slug>_license_key and edd_<slug>_license_status.
define('PLUGINSLUG', 'remui');
// Current Version of the plugin. This should be similar to Version tag mentioned in Plugin headers.
define('PLUGINVERSION', '3.3.0');
// Under this Name product should be created on WisdmLabs Site.
define('PLUGINNAME', 'Edwiser RemUI');
// Url where program pings to check if update is available and license validity.
define('STOREURL', 'https://edwiser.org/check-update');
// Author Name.
define('AUTHORNAME', 'WisdmLabs');

define('EDD_LICENSE_ACTION', 'licenseactionperformed');
define('EDD_LICENSE_KEY', 'edd_' . PLUGINSLUG . '_license_key');
define('EDD_LICENSE_DATA', 'edd_' . PLUGINSLUG . '_license_data');
define('EDD_PURCHASE_FROM', 'edd_' . PLUGINSLUG . '_purchase_from');
define('EDD_LICENSE_STATUS', 'edd_' . PLUGINSLUG . '_license_status');
define('EDD_LICENSE_ACTIVATE', 'edd_' . PLUGINSLUG . '_license_activate');
define('EDD_LICENSE_DEACTIVATE', 'edd_' . PLUGINSLUG . '_license_deactivate');
define('WDM_LICENSE_TRANS', 'wdm_' . PLUGINSLUG . '_license_trans');
define('WDM_LICENSE_PRODUCTSITE', 'wdm_' . PLUGINSLUG . '_product_site');

/**
 * Edwiser RemUI
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class LicenseController {

    /**
     * @var string Short Name for plugin.
     */
    private $pluginshortname = '';

    /**
     * @var string Slug to be used in url and functions name
     */
    private $pluginslug = '';

    /**
     * @var string stores the current plugin version
     */
    private $pluginversion = '';

    /**
     * @var string Handles the plugin name
     */
    private $pluginname = '';

    /**
     * @var string  Stores the URL of store. Retrieves updates from
     *              this store
     */
    private $storeurl = '';

    /**
     * @var string  Name of the Author
     */
    private $authorname = '';

    /**
     * Response data from culr
     * @var object
     */
    public static $responsedata;

    /**
     * Contructor for value initialization
     */
    public function __construct() {
        $this->authorname = AUTHORNAME;
        $this->pluginname = PLUGINNAME;
        $this->pluginshortname = PLUGINSHORTNAME;
        $this->pluginslug = PLUGINSLUG;
        $this->pluginversion = PLUGINVERSION;
        $this->storeurl = STOREURL;
    }

    /**
     * Update license activation/deactivation status to database.
     * @return string Status
     */
    public function serve_license_data() {
        global $CFG;
        if (is_siteadmin()) {
            try {
                // Return if did not come from license page.
                if (!isset($_POST['onLicensePage']) || $_POST['onLicensePage'] == 0) {
                    return;
                }
                $_POST['onLicensePage'] = false;
                $licensekey = trim($_POST[EDD_LICENSE_KEY]);
                // Make sure the puchase code looks valid before sending it to Envato.
                if (preg_match("/([a-f0-9]{32})/", $licensekey)) {
                    $controller = new RemUIController($licensekey);
                    if (isset($_POST[EDD_LICENSE_ACTIVATE])) {
                        return $controller->activate_license();
                    } else if (isset($_POST[EDD_LICENSE_DEACTIVATE])) {
                        return $controller->deactivate_license();
                    }
                } else {
                    utility::throw_error('entervalidlicensekey', 30);
                }

            } catch (Exception $ex) {
                // Set the error message, received via exception.
                set_config(EDD_LICENSE_DATA, $ex->getMessage(), 'theme_remui');
            }
        }
    }
    /**
     * Get data from database
     * @return string License status
     */
    public function get_data_from_db() {
        global $DB;
        if (null !== self::$responsedata) {
            return self::$responsedata;
        }
        $transexpired = false;
        $updatetrans = false;
        $licensestatus = toolbox::get_plugin_config(EDD_LICENSE_STATUS);
        $gettrans = toolbox::get_plugin_config(WDM_LICENSE_TRANS);
        if ($gettrans) {
            $gettrans = unserialize($gettrans);

            if (is_array($gettrans) && time() > $gettrans[1] && $gettrans[1] > 0) {
                $transexpired = true;
                // Delete previous license trans.
                toolbox::remove_plugin_config(WDM_LICENSE_TRANS);
            }
        } else {
            $transexpired = true;
        }

        if ($transexpired == true) {
            $licensekey = toolbox::get_plugin_config(EDD_LICENSE_KEY);

            if ($licensekey) {
                $controller = new RemUIController($licensekey);
                $licensedata = $controller->request_license_data("check_license", $licensekey);
                if (isset($licensedata->license) && !empty($licensedata->license)) {
                    $licensestatus = $licensedata->license;
                    toolbox::set_plugin_config(EDD_LICENSE_STATUS, $licensestatus);
                }

                if (empty($licensestatus)) {
                    return;
                }

                $updatetrans = true;
            }
        }
        $this->set_response_data($licensestatus, PLUGINSLUG, $updatetrans);
        return self::$responsedata;
    }

    /**
     * Set response data to plugin config
     * @param string  $licensestatus License status
     * @param string  $pluginslug    Plugin slug
     * @param boolean $settransient  Transient data
     */
    public function set_response_data($licensestatus, $pluginslug, $settransient = false) {
        if ($licensestatus == 'valid') {
            self::$responsedata = 'available';
        } else if ($licensestatus == 'expired') {
            self::$responsedata = 'available';
        } else {
            self::$responsedata = 'unavailable';
        }

        if ($settransient) {
            $time = time() + (60 * 60 * 24) * (($licensestatus == 'valid') ? 7 : 1);
            $transiantperiod = serialize(array($licensestatus, $time));
            // Set license status check transient to seven days.
            toolbox::set_plugin_config(WDM_LICENSE_TRANS, $transiantperiod);
        }
    }

    public function get_remui_license_template_context() {
        global $OUTPUT, $PAGE;

        $systemcontext = context_system::instance();
        $PAGE->set_context($systemcontext);

        $templatecontext = array();
        $templatecontext['pluginslug'] = PLUGINSLUG;
        $templatecontext['licensestatus'] = get_string('notactive', 'theme_remui');
        $templatecontext['licensestatuscolor'] = "color:red";
        $templatecontext['licensekey'] = '';

        $licensekey = toolbox::get_plugin_config(EDD_LICENSE_KEY);
        if ($licensekey !== false) {
            $templatecontext['licensekey'] = $licensekey;

            $templatecontext['renewlink'] = toolbox::get_plugin_config(WDM_LICENSE_PRODUCTSITE);

            $status = toolbox::get_plugin_config(EDD_LICENSE_STATUS);
            // $status = 'valid';
            $templatecontext['licensestatus'] = $status;
            if ($status !== false && $status == 'valid') {
                $status = 'active';
                $color  = 'green';
                $templatecontext["readonly"] = true;
                $templatecontext["isvalid"] = true;
                $templatecontext['buttons'] = [
                    [
                        "name" => "edd_".PLUGINSLUG."_license_deactivate",
                        "value" => get_string('deactivatelicense', 'theme_remui'),
                        "classes" => "btn-danger",
                    ]
                ];
            } else {
                $color  = 'red';
                $templatecontext['buttons'] = [
                    [
                        "name" => "edd_".PLUGINSLUG."_license_activate",
                        "value" => get_string('activatelicense', 'theme_remui'),
                        "classes" => "btn-success",
                    ]
                ];
                if ($status === 'expired') {
                    $templatecontext['buttons'] = [
                        [
                            "name" => "edd_".PLUGINSLUG."_license_deactivate",
                            "value" => get_string('deactivatelicense', 'theme_remui'),
                            "classes" => "btn-primary",
                        ],
                        [
                            "name" => "edd_".PLUGINSLUG."_license_renew",
                            "value" => get_string('renewlicense', 'theme_remui'),
                            "classes" => "btn-info",
                            "extra" => "onclick=window.open('".$templatecontext['renewlink']."')",
                        ],
                    ];
                }
            }
            if ($status == 'inactive') {
                $status = 'notactive';
            }
            $templatecontext['licensestatus'] = get_string($status, 'theme_remui');
            $templatecontext['licensestatuscolor'] = "color:$color";
            if (toolbox::get_plugin_config(EDD_LICENSE_ACTION) == true) {
                $alertmessages = [
                    'active' => 'licensekeyactivated',
                    'expired' => 'licensekeyhasexpired',
                    'disabled' => 'licensekeydeactivated',
                    'no_activations_left' => 'nolicenselimitleft',
                    'invalid' => 'entervalidlicensekey',
                    'deactivated' => 'licensekeydeactivated',
                    'failed' => 'activationfailed'
                ];
                if (isset($alertmessages[$status])) {
                    $alertmessage = $alertmessages[$status];
                } else {
                    $alertmessage = 'activationfailed';
                }
                if ($status == 'active') {
                    $templatecontext['alert'] = [
                        'icon' => "fa-check",
                        'subtext' => "Success",
                        'classes' => 'alert-success',
                        'text' => get_string($alertmessage, 'theme_remui')
                    ];
                } else {
                    $templatecontext['alert'] = [
                        'icon' => "fa-ban",
                        'subtext' => "Alert!",
                        'classes' => 'alert-danger',
                        'text' => get_string($alertmessage, 'theme_remui')
                    ];
                }
            }
        } else {
            $status = 'notactive';
            $color  = 'red';
            $templatecontext['buttons'] = [
                [
                    "name" => "edd_".PLUGINSLUG."_license_activate",
                    "value" => get_string('activatelicense', 'theme_remui'),
                    "classes" => "btn-success",
                ]
            ];
        }
        $error = toolbox::get_plugin_config(EDD_LICENSE_DATA);

        if ($error) {
            $error = unserialize($error);
            if ($error['error'] == true) {
                toolbox::remove_plugin_config(EDD_LICENSE_DATA);
                $templatecontext['alert'] = [
                    'icon' => "fa-ban",
                    'subtext' => "Alert!",
                    'classes' => 'alert-danger',
                    'text' => $error['msg']
                ];
            }
        }

        return $templatecontext;
    }
}
