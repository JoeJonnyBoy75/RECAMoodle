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
 * @package    theme_remui
 * @copyright  (c) 2022 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui\controller;

defined('MOODLE_INTERNAL') || die();

use Exception;
use cache;
use curl;
use theme_remui\update;
use \theme_remui\utility;
use \theme_remui\toolbox;

// Here License Controller has already defined the constants.
// But on Setup Wizard we need it on RemUI controller
// If we have it on remUI Controller only, License Controller throws error
// and if We keep it on both files... we get error..saying already  defined constants.
// To avoid this ... Checking only first constant as they are all going to be defined at once..
// If not only then define them again.
if (! defined("PLUGINSHORTNAME")) {
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
}
/**
 * Managing licensing using RemUIController if it purchased from Edwiser.
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class RemUIController {

    /**
     * License key provided by edwiser
     * @var string
     */
    private $licensekey;

    /**
     * Initializing instance
     * @param string $licensekey License key provided by edwiser
     */
    public function __construct($licensekey) {
        $this->licensekey = $licensekey;
    }
    /**
     * Activate theme license
     */
    public function activate_license() {

        toolbox::set_plugin_config(EDD_LICENSE_KEY, $this->licensekey);
        toolbox::set_plugin_config(EDD_PURCHASE_FROM, 'remui');

        $licensedata = $this->request_license_data('activate_license', $this->licensekey);

        $this->process_response_data($licensedata);
        return $licensedata;
    }

    /**
     * The function send the request to the edwiser.org,
     * To perform the activation deactivation actions on it.
     * @param String $action name of the action it can be activate_license, deactivate_license or
     * @param String $licensekey license key to perform the action
     * @return Mix return false if request fails otherwise the requests response is return
     */
    public function request_license_data($action, $licensekey) {
        global $CFG;
        // Get cURL resource.
        $curl = new curl();

        $curl->setopt([
            'CURLOPT_RETURNTRANSFER' => 1,
            'CURLOPT_URL' => STOREURL,
            'CURLOPT_POST' => 1,
            'CURLOPT_USERAGENT' => $_SERVER['HTTP_USER_AGENT'] . ' - ' . $CFG->wwwroot,
            'CURLOPT_TIMEOUT' => 30,
            'CURLOPT_SSL_VERIFYPEER' => false
        ]);

        // Since edwiser.org dose not accept request from the IPv6 address to solve that problem,
        // Try to send request using IPv4 address.
        if (defined('CURLOPT_IPRESOLVE') && defined('CURL_IPRESOLVE_V4')) {
            $curl->setopt(['CURLOPT_IPRESOLVE' => CURL_IPRESOLVE_V4]);
        }

        // Send the request & save response to $resp.
        $resp = $curl->post(STOREURL, array(
            'edd_action' => $action,
            'license' => $licensekey,
            'item_name' => urlencode(PLUGINNAME),
            'current_version' => PLUGINVERSION,
            'url' => urlencode($CFG->wwwroot),
        ));

        $responsecode = $curl->info['http_code'];

        try {
            $licensedata = json_decode($resp);
        } catch (Exception $ex) {
            utility::throw_error("errorparsingresponse", 30); // Throw exception - Error while Parsing the response.
        }
        $this->validate_response($licensedata, $responsecode);

        return $licensedata;
    }

    /**
     * Checks is the request response is valid or not.
     *
     * @param  object  $licensedata  JSON object
     * @param  integer $responsecode CURL response code
     * @return boolean returns true if the license data is not null and contains the valid responce code
     */
    public function validate_response($licensedata, $responsecode) {
        $validresponsecode = array('200', '301');
        if ($licensedata == null || $licensedata == false || !in_array($responsecode, $validresponsecode)) {
            // Calculate transiaent period from current period to request.
            $transperiod = serialize(array('server_did_not_respond', time() + (60 * 60 * 24)));
            // Delete previous record of the transiaent and set new transient to check the license after 24 hrs.
            toolbox::set_plugin_config(WDM_LICENSE_TRANS, $transperiod);

            // Throw exception - Error to get proper response from server.
            utility::throw_error("noresponsereceived", 30);
        }
    }

    /**
     * Process response data received from edwiser server
     * @param object $licensedata Received license data
     */
    public function process_response_data($licensedata) {
        $exptime = 0;
        if (isset($licensedata->expires)) {
            $exptime = strtotime($licensedata->expires);
        }
        $curtime = time();

        if (isset($licensedata->expires)
            && ($licensedata->expires !== false)
            && ($licensedata->expires != 'lifetime')
            && $exptime <= $curtime
            && $exptime != 0) {
            if (isset($licensedata->error) && "no_activations_left" === $licensedata->error) {
                $licensedata->error = $licensedata->error;
            } else {
                $licensedata->error = "expired";
            }
        }

        if (isset($licensedata->renew_link) && (!empty($licensedata->renew_link) || $licensedata->renew_link != "")) {
            // If the license key's validity is expired then save the renew link for the product.
            toolbox::set_plugin_config(WDM_LICENSE_PRODUCTSITE, $licensedata->renew_link);
        } else {
            toolbox::set_plugin_config(WDM_LICENSE_PRODUCTSITE, "https://edwiser.org");
        }
        $licensestatus = $this->status_update($licensedata);
        $this->set_transient_on_activation($licensestatus);
    }

    /**
     * The function parses the response come from the edwiser.org
     * on activation and determines is status of the license key.
     *
     *
     * @param  object $licensedata the response retune by the activation request.
     * @return String               returns the license key status
     */
    public function status_update($licensedata) {
        $status = "";
        if ((empty($licensedata->success)) && isset($licensedata->error) && ($licensedata->error == "expired")) {
            $status = 'expired';
        } else if ($licensedata->license == 'invalid' && isset($licensedata->error) && $licensedata->error == "disabled") {
            $status = 'disabled';
        } else if ($licensedata->license == 'invalid' && isset($licensedata->error)
            && $licensedata->error == "no_activations_left") {
            $status = 'no_activations_left';
        } else if ($licensedata->license == 'failed') {
            $status = 'failed';
        } else {
            $status = $licensedata->license;
        }
        toolbox::set_plugin_config(EDD_LICENSE_ACTION, true);
        toolbox::set_plugin_config(EDD_LICENSE_STATUS, $status);
        return $status;
    }

    /**
     * Set transient on activation
     * @param string $licensestatus License status
     */
    public function set_transient_on_activation($licensestatus) {
        global $DB;

        $transexpired = false;

        // Get license trans.
        $transvar = toolbox::get_plugin_config(WDM_LICENSE_TRANS);
        // Check license trans is  expired.
        if ($transvar) {
            $transvar = unserialize($transvar);
            if (is_array($transvar) && time() > $transvar[1] && $transvar[1] >= 0) {
                $transexpired = true;
            }
        } else {
            $transexpired = true;
        }

        if ($transexpired == true) {
            if (!empty($licensestatus)) {
                $time = time() + (60 * 60 * 24) * (($licensestatus == 'valid') ? 7 : 1);
                toolbox::set_plugin_config(
                    WDM_LICENSE_TRANS,
                    serialize(array($licensestatus, $time))
                );
            } else {
                toolbox::remove_plugin_config(WDM_LICENSE_TRANS);
            }
        }
    }

    /**
     * Deactivate theme license
     */
    public function deactivate_license() {
        global $DB;

        $wpeplicensekey = toolbox::get_plugin_config(EDD_LICENSE_KEY);
        if (!empty($wpeplicensekey)) {
            $licensedata = $this->request_license_data("deactivate_license", $wpeplicensekey);

            if ($licensedata == false) {
                return;
            }

            if ($licensedata->license == 'deactivated' || $licensedata->license == 'failed') {
                // Set the licesnign status to the deactivated.
                toolbox::set_plugin_config(EDD_LICENSE_ACTION, true);
                toolbox::set_plugin_config(EDD_LICENSE_STATUS, 'deactivated');
            }
            // Set linces check transient value on deactivation to 0.
            toolbox::set_plugin_config(
                WDM_LICENSE_TRANS,
                serialize(array($licensedata->license, 0))
            );
            return $licensedata;
        }
    }

    /**
     * Check if update available by using json data
     *
     * @return String status.
     */
    public static function check_remui_update() {
        global $CFG;
        $cache = \cache::make('theme_remui', 'updates');
        if ($cache->get('hidelicensenag') == true && optional_param('refresh-update', false, PARAM_BOOL) == false) {
            return '';
        }
        $update = new update();
        if ($update->check_plugins_update()) {
            return 'available';
        }
        return '';
    }

    /**
     * Returns the latest announcements related to RemUI.
     *
     * @return array
     */
    public static function get_remui_announcements() {
        global $DB;
        $cache = cache::make('theme_remui', 'updates');
        $announcements = $cache->get('announcements');
        if (!$announcements) {
            $announcements = \theme_remui\utility::url_get_contents('https://remui.edwiser.org/remui_announcements.json');
            // Decode the JSON into an associative array.
            if (!is_array($announcements)) {
                $announcements = json_decode($announcements, true);
            }
            if (isset($announcements['announcements'])) {
                $announcements = $announcements['announcements'];
            }
            $cache->set('announcements', $announcements);
        }
        $templatecontext = [];
        if ($announcements) {
            $templatecontext['hasannouncements'] = true;
            $announcements[0]['active'] = 'active';
            foreach ($announcements as $key => $value) {
                $value['index'] = $key;
                $announcements[$key] = $value;
            }
            $templatecontext['announcements'] = $announcements;
        }
        return $templatecontext;
    }
}
