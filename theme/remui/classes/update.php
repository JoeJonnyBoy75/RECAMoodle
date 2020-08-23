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

namespace theme_remui;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/markdown/MarkdownInterface.php');
require_once($CFG->libdir . '/markdown/Markdown.php');
require_once($CFG->dirroot . '/theme/remui/classes/controller/LicenseController.php');

define('REMUI_PLUGINS_LIST', "https://edwiser.org/edwiserupdates.json");
define('PLUGIN_UPDATE', "https://edwiser.org/wp-json/remui-plugins-update");

use theme_remui\controller\LicenseController;
use core_plugin_manager;
use theme_remui\utility;
use Michelf\MarkDown;
use core_component;
use html_writer;
use ZipArchive;
use moodle_url;
use Exception;
use stdClass;
use pix_icon;
use cache;
use curl;

/**
 * RemUI one click update class
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class update {

    /**
     * Edwiser plugins list
     * @var array
     */
    public $plugins = [];

    /**
     * Error occured while fetching update details
     * @var array
     */
    public $errors = [];

    /**
     * Refresh update cache
     * @var boolean
     */
    public $refresh = false;

    /**
     * License controller object
     * @var null
     */

    public static $licensecontroller = null;

    /**
     * Check whether update is supported
     * @return bool True if update supported
     */
    public function update_supported() {
        $supported = false;
        if (toolbox::get_plugin_config(EDD_LICENSE_STATUS) == 'valid') {
            $supported = true;
        }
        return $supported;
    }

    /**
     * Initialize instance
     * @param boolean $refresh Refresh update information
     */
    public function __construct($refresh = false) {
        if ($refresh) {
            $cache = cache::make('theme_remui', 'updates');
            $cache->purge();
        }
    }

    /**
     * Get edwiser plugin list from plugin list url
     *
     * @return array plugin list
     */
    public function get_edwiser_plugin_list() {
        if (!$this->update_supported()) {
            return [];
        }
        $cache = cache::make('theme_remui', 'updates');
        $plugins = $cache->get('plugins');
        if (!$plugins) {
            try {
                $plugins = utility::url_get_contents(REMUI_PLUGINS_LIST);
                if (is_string($plugins)) {
                    $plugins = json_decode($plugins);
                }
            } catch (Exception $ex) {
                return false;
            }
        }
        return $plugins;
    }

    /**
     * Set edwiser plugin details in edwiserplugins list
     *
     * @param string $type    type of plugin
     * @param string $name    name of plugin
     * @param array  $options options to set in plugins list
     *
     * @return void
     */
    public function set_edwiser_plugin($type, $name, $options) {
        $this->plugins[$type . '_' . $name] = $options;
    }

    /**
     * Prepare edwiser plugins list and updates
     *
     * @param string $plug plugin component if would like to fetch single plugins details
     *
     * @return bool|string true or error strings while fetching list
     */
    public function prepare_edwiser_plugins_update($plug = null) {
        global $DB;
        $plugins = $this->get_edwiser_plugin_list();
        if (empty($plugins)) {
            return [];
        }
        $pluginman = core_plugin_manager::instance();
        $plugininfo = $pluginman->get_plugins();

        foreach ($plugins as $component => $plugin) {

            // Fetch only plugin if $plug is set.
            if (!is_null($plug) && $component != $plug) {
                continue;
            }
            list($plugintype, $pluginname) = core_component::normalize_component($component);

            // Check whether plugin is installed or not.
            if (isset($plugininfo[$plugintype][$pluginname])) {
                $name = $plugin->name;
                if ($component == 'theme_remui') {
                    $name = PLUGINNAME;
                }
                $options = array(
                    'component'   => $component,
                    'name' => $name,
                    'version' => $plugininfo[$plugintype][$pluginname]->versiondb,
                    'release' => $plugininfo[$plugintype][$pluginname]->release
                );
                // Edwiser plugin which comes along with product.
                if (!isset($plugin->purchaseurl)) {
                    if (isset($plugin->parent)) {
                        $options['parent'] = $plugin->parent;
                    }
                    $this->set_edwiser_plugin($plugintype, $pluginname, $options);
                    continue;
                }

                // Get license key for the product
                $sql = "SELECT value
                            FROM {config_plugins}
                            WHERE plugin = ?
                            AND name LIKE '%license_key%'";
                $license = $DB->get_field_sql($sql, array($component));

                $options['url'] = $plugin->purchaseurl;
                $options['license'] = $license;

                $this->set_edwiser_plugin($plugintype, $pluginname, $options);
            }
        }
        return true;
    }

    /**
     * Thin wrapper for the core's download_file_content() function.
     *
     * @param string $url    URL to the file
     * @param string $tofile full path to where to store the downloaded file
     *
     * @return bool
     */
    protected function download_file_content($url, $tofile) {
        // Prepare the parameters for the download_file_content() function.
        $headers = null;
        $postdata = null;
        $fullresponse = false;
        $timeout = 300;
        $connecttimeout = 20;
        $skipcertverify = false;
        $tofile = $tofile;
        $calctimeout = false;
        return download_file_content(
            $url,
            $headers,
            $postdata,
            $fullresponse,
            $timeout,
            $connecttimeout,
            $skipcertverify,
            $tofile,
            $calctimeout
        );
    }

    /**
     * Download the ZIP file with the plugin package from the given location
     *
     * @param string $url    URL to the file
     * @param string $tofile full path to where to store the downloaded file
     *
     * @return bool false on error
     */
    protected function download_plugin_zip_file($url, $tofile) {

        $checkurl = str_replace('download', 'verify-package', $url);

        $curl = new curl();
        $response = $curl->get($checkurl);

        if ($response) {
            $response = json_decode($response, true);
            if ((isset($response['data']) && $response['data']['status'] == 404) ||
                (isset($response['error']) && $response['error'] == true)) {
                $this->errors[] = get_string('errorfetching', 'theme_remui', $response['message']);
                return false;
            }
            $status = $this->download_file_content($url, $tofile);
        } else {
            $status = false;
        }

        if (!$status) {
            $this->errors[] = get_string('errorfetching', 'theme_remui', $url);
            @unlink($tofile);
            return false;
        }

        return true;
    }

    /**
     * Obtain the plugin ZIP file from the given URL
     *
     * The caller is supposed to know both downloads URL and the MD5 hash of
     * the ZIP contents in advance, typically by using the API requests against
     * the plugins directory.
     *
     * @param object $pluginman plugin manager object
     * @param string $url       url of plugin file
     * @param string $name      name with component of plugin
     *
     * @return string|bool full path to the file, false on error
     */
    public function get_remote_plugin_zip($pluginman, $url, $name) {
        global $CFG;

        if (!empty($CFG->disableupdateautodeploy)) {
            return false;
        }

        // Sanitize and validate the URL.
        $url = str_replace(array("\r", "\n"), '', $url);

        if (!preg_match('|^https?://|i', $url)) {
            $this->errors[] = 'Error fetching plugin ZIP: unsupported transport protocol: '.$url;
            return false;
        }

        $pluginman->zipdirectory = make_temp_directory('core_plugin/code_manager').'/distfiles/';

        // The cache location for the file.
        $distfile = $pluginman->zipdirectory.$name.'.zip';
        if (file_exists($distfile)) {
            return $distfile;
        }

        // Download the file into a temporary location.
        $tempdir = make_request_directory();
        $tempfile = $tempdir.'/plugin.zip';
        $result = $this->download_plugin_zip_file($url, $tempfile);

        if (!$result) {
            return false;
        }

        $md5 = md5_file($tempfile);

        // If the file is empty, something went wrong.
        if ($md5 === 'd41d8cd98f00b204e9800998ecf8427e') {
            return false;
        }

        // Store the file in our cache.
        if (!rename($tempfile, $distfile)) {
            return false;
        }

        return $distfile;
    }

    /**
     * Get plugin details from version.php file
     *
     * @param string $path        path of plugin
     * @param array  $zipcontents zip file contents
     *
     * @return stdClass|bool   plugin details
     */
    public function get_plugin_details($path, $zipcontents) {

        foreach ($zipcontents as $file => $status) {
            if (!$status) {
                return false;
            }
        }
        $root = current(array_keys($zipcontents));
        $file = $root . 'version.php';
        if (isset($zipcontents[$file]) && $zipcontents[$file] == 1 && file_exists($path . '/' . $file)) {
            $plugin = new stdClass;
            require_once($path . '/' . $file);
            return $plugin;
        }
        return false;
    }

    /**
     * Unzip zip file of plugin file and return its content
     * @param  object $pluginman Plugin manager
     * @param  string $zip       Zip file path
     * @param  string $temp      Temporary path
     * @param  string $root      Root directory path
     * @return array             Zip file content array
     */
    public function unzip_plugin_file($pluginman, $zip, $temp, $root) {
        ini_set('log_errors', 'Off');
        $contents = $pluginman->unzip_plugin_file($zip, $temp, $root);
        ini_set('log_errors', 'On');
        return $contents;
    }

    /**
     * Verify zip file is valid
     *
     * @param object $pluginman core plugin manager
     * @param string $zip       zip file
     * @param string $temp      temporary directory path
     * @param string $name      name of zip file
     *
     * @return bool         True is zip file is valid
     */
    public function verify_zip($pluginman, $zip, $temp, $name) {

        $zipcontents = $this->unzip_plugin_file($pluginman, $zip, $temp, $name);

        if (empty($zipcontents)) {
            $this->errors[] = get_string('invalidzip', 'theme_remui', $name);
            return false;
        }

        $zipcount = 0;
        // Check all files from zip is ok and has zip inside zip.
        foreach ($zipcontents as $file => $status) {
            if (!$status) {
                $this->errors[] = get_string('invalidzip', 'theme_remui', $name);
                return false;
            }
            if (stripos($file, ".zip") !== false) {
                $zipcount++;
                continue;
            }
            if (stripos($file, ".pdf") !== false || stripos($file, "readme") !== false) {
                unset($zipcontents[$file]);
            }
        }

        // If count is different means only one plugin file is there.
        // Else zip contains multiple plugins.
        if ($zipcount != count($zipcontents)) {
            $plugin = $this->get_plugin_details($temp, $zipcontents);
            if (!$plugin) {
                $this->errors[] = get_string('unabletoloadplugindetails', 'theme_remui', $name);
            }
            return [$plugin];
        }

        $zipserror = false;
        $zips = $zipcontents;
        foreach (array_keys($zips) as $file) {
            $name1 = str_replace('.zip', '', $file);
            $path = make_request_directory();
            $zipcontents = $this->unzip_plugin_file($pluginman, $temp . '/' . $file, $path, $name1);

            if (empty($zipcontents)) {
                $this->errors[] = get_string('invalidzip', 'theme_remui', $name . '  ->  ' . $name1);
                return false;
            }

            $plugin = $this->get_plugin_details($path, $zipcontents);
            unset($zips[$file]);
            if (!$plugin) {
                $this->errors[] = get_string('unabletoloadplugindetails', 'theme_remui', $name . '  ->  ' . $name1);
                $zipserror = true;
            } else {
                $zips[$temp . '/' . $file] = $plugin;
            }
        }
        return $zipserror == true ? false : $zips;
    }

    /**
     * Extract plugin update details from object received from edwiser.org
     *
     * @param  array  $plugins Plugins list.
     * @param  object $plugin  Plugin object with update details from edwiser.org
     * @return array           Plugins list with update details
     */
    private function extract_update_details($plugins, $plugin) {
        $pluginman = core_plugin_manager::instance();
        $plugininfo = $pluginman->get_plugins();
        $url = PLUGIN_UPDATE . '/download/' . $plugin['update']['package'];
        $name = $plugin['component'] . '.' . $plugin['update']['release'];
        $zip = $this->get_remote_plugin_zip($pluginman, $url, $name);

        if ($zip == false) {
            return;
        }

        $temp = make_request_directory();
        $zips = $this->verify_zip($pluginman, $zip, $temp, $plugin['component']);
        if (count($zips) == 1) {
            $zips[$zip] = $zips[0];
            unset($zips[0]);
        } else {
            unlink($zip);
        }
        foreach ($zips as $path => $newplugin) {
            $component = $newplugin->component;
            if (!isset($plugins[$component])) {
                unlink($path);
                continue;
            }
            $plug = $plugins[$component];
            $type = explode('_', $component)[0];
            $name = substr($component, strlen($type) + 1);
            if (isset($plug['parent'])) {
                $newplugin->parent = $plug['parent'];
            }
            if (!isset($newplugin->release)) {
                if (!isset($newplugin->version)) {
                    continue;
                }
                $newplugin->release = $newplugin->version;
            }
            if (!isset($plug['release'])) {
                if (!isset($plug['version'])) {
                    continue;
                }
                $plug['release'] = $plug['version'];
            }
            if (version_compare($newplugin->release, $plug['release']) > 0) {
                if (isset($plug['update']) && isset($plug['update']['package'])) {
                    $plugininfo[$type][$name]->url = (isset($plugin['url']) ? $plugin['url'] : '') ||
                                                     (isset($plug['url']) ? $plug['url'] : '');
                    $newplugin->package = $plug['update']['package'];
                    $newplugin->changelog = isset($plug['update']['changelog']) ? $plug['update']['changelog'] : '';
                } else {
                    $newplugin->package = $plugin['update']['package'];
                    $za = new ZipArchive();
                    $za->open($path);
                    for ($i = 0; $i < $za->numFiles; $i++) {
                        $stat = $za->statIndex( $i );
                        if (strcasecmp(basename($stat['name']), 'CHANGES.txt') == 0) {
                            $markdown = new MarkDown();
                            $changelog = $za->getFromIndex($i);
                            $changelog = str_ireplace('change log:', '', $changelog);
                            $changelog = html_writer::tag(
                                'div',
                                $markdown->transform($changelog),
                                array('class' => 'remui-changelog')
                            );
                            $newplugin->changelog = $changelog;
                        }
                    }
                }
                $plugins[$component] = $newplugin;
            }

        }
        return $plugins;
    }

    /**
     * Get plugin obejct to show in the plugins table
     *
     * @param object  $pluginman plugin manager
     * @param object  $pluginfo  plugin information object
     * @param bool    $edwiser   is current plugin is edwiser or other
     *
     * @return stdClass             plugin object ofr mustache
     */
    private function get_plugin_object($pluginman, $pluginfo, $updateinfo) {
        global $PAGE, $OUTPUT, $CFG;
        $plugin = new stdClass;
        $plugin->type = $pluginfo->type;
        $plugin->name = $pluginfo->name;
        $plugin->component = $pluginfo->type . '_' . $pluginfo->name;
        $plugin->class = 'type-' . $plugin->type . ' name-' . $plugin->component;
        $status = $pluginfo->get_status();
        $plugin->class .= ' status-'.$status;
        if ($PAGE->theme->resolve_image_location('icon', $plugin->component, null)) {
            $plugin->icon = $OUTPUT->pix_icon('icon', '', $plugin->component, array('class' => 'icon pluginicon'));
        }

        $plugin->displayname = $pluginfo->displayname;
        $plugin->release = $pluginfo->release;
        $plugin->versiondisk = $pluginfo->versiondisk;
        $plugin->versiondb = $pluginfo->versiondb;
        if ($status === core_plugin_manager::PLUGIN_STATUS_MISSING) {
            $msg = html_writer::div(get_string('status_missing', 'core_plugin'), 'statusmsg label label-important');
        } else if ($status === core_plugin_manager::PLUGIN_STATUS_NEW) {
            $msg = html_writer::div(get_string('status_new', 'core_plugin'), 'statusmsg label label-success');
        } else {
            $msg = '';
        }
        $plugin->msg = $msg;

        $update = (object) [
            'has' => false,
            'html' => ''
        ];

        if (isset($updateinfo->changelog)) {
            $plugin->changelog = $updateinfo->changelog;
        }

        if (isset($updateinfo->release)) {
            $plugin->update = $updateinfo->release;
        }

        if (empty($updateinfo->msg)) {
            $button = html_writer::start_tag('a', array(
                'class' => 'btn btn-secondary bg-gray',
                'target' => '_blank',
                'href' => new moodle_url($CFG->wwwroot . '/theme/remui/install_update.php', array(
                    'installupdate' => $updateinfo->component,
                    'sesskey' => sesskey()
                )),
            ));
            $button .= get_string('updateavailableinstall', 'core_admin');
            $button .= html_writer::end_tag('a');
            $plugin->install = $button;
        }
        return $plugin;
    }

    /**
     * Check for all installed edwiser plugins
     *
     * @return object plugins list for mustache
     */
    public function generate_template_context($pluginlist) {
        if (!$this->update_supported()) {
            return [];
        }
        $plugins = new stdClass;
        $plugins = [];
        $pluginman = core_plugin_manager::instance();
        $plugininfo = $pluginman->get_plugins();
        $index = 0;
        foreach ($plugininfo as $type => $plugs) {
            foreach (array_values($plugs) as $pluginfo) {
                $component = $pluginfo->type . '_' . $pluginfo->name;
                if (!isset($pluginlist[$component]) || !(isset($pluginlist[$component]->package))) {
                    continue;
                }
                $plugin = $this->get_plugin_object(
                    $pluginman,
                    $pluginfo,
                    $pluginlist[$component]
                );
                $plugins[$index++] = $plugin;
            }
        }
        return $plugins;
    }

    /**
     * Fetch plugin update from edwiser.org or from cache
     * @return array plugins and errors list
     */
    public function fetch_plugins_update() {
        global $CFG;
        if (!$this->update_supported()) {
            return [false, false, false];
        }
        $cache = cache::make('theme_remui', 'updates');
        $plugins = $cache->get('plugins');
        $errors = $cache->get('errors') || [];
        $lastcheck = $cache->get('lastcheck');
        if ($plugins == false) {
            $this->plugins = [];
            $this->prepare_edwiser_plugins_update();

            $curl = new curl();
            $response = $curl->post(
                PLUGIN_UPDATE . '/check-update',
                array(
                    'plugins' => json_encode($this->plugins),
                    'url' => urlencode($CFG->wwwroot)
                )
            );
            $plugins = json_decode($response, true);
            if ($plugins == false) {
                return [false, false, false];
            }
            foreach ($plugins as $component => $plugin) {
                if (!empty($plugin['update'])) {
                    $plugins = $this->extract_update_details($plugins, $plugin);
                }
            }
            $errors = $this->errors;
            $lastcheck = time();
            $cache->set('plugins', $plugins);
            $cache->set('errors', $errors);
            $cache->set('lastcheck', $lastcheck);
        }
        $has = false;
        foreach ($plugins as $component => $plugin) {
            if (!empty($plugin->package)) {
                $has = true;
            }
        }
        if (!$has) {
            $plugins = [];
        }
        return [$plugins, $errors, $lastcheck];
    }

    /**
     * Getting edwiser plugins update details
     *
     * @param  $array $templatecontext Template context array
     */
    public function get_update_details() {
        global $PAGE;
        list($plugins, $errors, $lastcheck) = $this->fetch_plugins_update();
        $plugins = $this->generate_template_context($plugins);
        return [
            'refresh-update' => new moodle_url($PAGE->url, array(
                'activetab' => 'informationcenter',
                'refresh-update' => 1
            )),
            'errors' => $errors,
            'list' => $plugins,
            'lastcheck' => $lastcheck
        ];
    }

    /**
     * Validate zip file before installing plugin
     *
     * @param core_plugin_manager      $pluginman core plugin manager object
     * @param \core\update\remote_info $plugin    plugin information
     * @param string                   $zipfile   zip file path
     * @param bool                     $silent    true if dont wanna show debugg error
     *
     * @return bool                 validation result
     */
    private function validate_plugin_zip($pluginman, $plugin, $zipfile, $silent) {
        global $CFG, $OUTPUT;

        $ok = get_string('ok', 'core');

        $silent or mtrace(get_string('packagesvalidating', 'core_plugin', $plugin->component), ' ... ');

        list($plugintype, $pluginname) = core_component::normalize_component($plugin->component);

        $tmp = make_request_directory();
        $zipcontents = $this->unzip_plugin_file($pluginman, $zipfile, $tmp, $pluginname);

        if (empty($zipcontents)) {
            $silent or mtrace(get_string('error'));
            $silent or mtrace(get_string('unabletounzip', 'theme_remui', $zipfile));
            return false;
        }

        $validator = \core\update\validator::instance($tmp, $zipcontents);
        $validator->assert_plugin_type($plugintype);
        $validator->assert_moodle_version($CFG->version);

        // TODO Check for missing dependencies during validation.
        $result = $validator->execute();
        $result ? ($silent or mtrace($ok)) : ($silent or mtrace(get_string('error')));

        if (!$silent) {
            foreach ($validator->get_messages() as $message) {
                if ($message->level === $validator::WARNING || $message->level === $validator::ERROR and !CLI_SCRIPT) {
                    mtrace('  <strong>['.$validator->message_level_name($message->level).']</strong>', ' ');
                } else {
                    mtrace('  ['.$validator->message_level_name($message->level).']', ' ');
                }

                mtrace($validator->message_code_name($message->msgcode), ' ');

                $info = $validator->message_code_info($message->msgcode, $message->addinfo);
                if ($info) {
                    mtrace('['.s($info).']', ' ');
                } else if (is_string($message->addinfo)) {
                    mtrace('['.s($message->addinfo, true).']', ' ');
                } else {
                    mtrace('['.s(json_encode($message->addinfo, true)).']', ' ');
                }

                if ($icon = $validator->message_help_icon($message->msgcode)) {
                    if (CLI_SCRIPT) {
                        mtrace(
                            PHP_EOL.'  ^^^ '.get_string('help').': '. get_string(
                                $icon->identifier.'_help',
                                $icon->component
                            ),
                            ''
                        );
                    } else {
                        mtrace($OUTPUT->render($icon), ' ');
                    }
                }
                mtrace(PHP_EOL, '');
            }
        }
        if (!$result) {
            $silent or mtrace(get_string('packagesvalidatingfailed', 'core_plugin'));
        }
        $silent or mtrace(PHP_EOL, '');
        return $result;
    }

    /**
     * Perform the installation of plugins.
     *
     * If used for installation of remote plugins from the Edwiser Plugins
     * directory, the $plugins must be list of {@link \core\update\remote_info}
     * object that represent installable remote plugins. The caller can use
     * {@link self::filter_installable()} to prepare the list.
     *
     * If used for installation of plugins from locally available ZIP files,
     * the $plugins should be list of objects with properties ->component and
     * ->zipfilepath.
     *
     * The method uses {@link mtrace()} to produce direct output and can be
     * used in both web and cli interfaces.
     *
     * @param  \core\update\remote_info $plugin    list of plugins
     * @param  bool                     $confirmed should the files be really deployed into the dirroot?
     * @param  bool                     $silent    hide debugg errors is set true
     *
     * @return bool                                 true on success
     */
    public function install_plugin(\core\update\remote_info $plugin, $confirmed, $silent) {
        global $CFG;

        $pluginman = core_plugin_manager::instance();
        if (!empty($CFG->disableupdateautodeploy)) {
            return false;
        }

        $ok = get_string('ok', 'core');

        // Let admins know they can expect more verbose output.
        $silent or mtrace(get_string('packagesdebug', 'core_plugin'), PHP_EOL);

        // Download all ZIP packages if we do not have them yet.
        $zip = array();

        $silent or mtrace(get_string('packagesdownloading', 'core_plugin', $plugin->component), ' ... ');

        if (!isset($plugin->version->package) || trim($plugin->version->package) == '') {
            $zip = false;
            $errormsg = get_string('cannotdownloadzipfile', 'core_error');
            if (!empty($plugin->version->msg)) {
                $tag = count($plugin->version->msg) > 1 ? 'ol' : 'ul';
                $errormsg = html_writer::start_tag($tag);
                foreach ($plugin->version->msg as $msg) {
                    $errormsg .= html_writer::tag('li', $msg);
                }
                $errormsg .= html_writer::end_tag($tag);
            }
            $silent or mtrace(PHP_EOL.' <- '. $errormsg . ' ->', '');
        } else {
            $url = PLUGIN_UPDATE . '/download/' . $plugin->version->package;
            $zip = $this->get_remote_plugin_zip(
                $pluginman,
                $url,
                $plugin->component
            );
        }
        if (!$zip) {
            $silent or mtrace(get_string('errorfetching', 'theme_remui', ''));
            return false;
        }
        $silent or mtrace($ok);

        $temp = make_request_directory();
        $zips = $this->verify_zip($pluginman, $zip, $temp, $plugin->component);
        $zipfile = $zip;

        if (!$zips) {
            $silent or mtrace(get_string('unabletounzip', 'theme_remui', $zipfile), PHP_EOL);
            return false;
        }
        if (count($zips) == 1) {
            $zips[$zipfile] = $zips[0];
            unset($zips[0]);
        } else {
            unlink($zip);
        }

        $checks = true;
        // Validate all downloaded packages.
        foreach ($zips as $zipfile => $plugindetails) {
            if ($plugindetails->component != $plugin->component) {
                unset($zips[$zipfile]);
                unlink($zipfile);
                continue;
            }
            $checks &= $this->validate_plugin_zip($pluginman, $plugindetails, $zipfile, $silent);
        }
        if (!$checks) {
            return;
        }
        if (!$confirmed) {
            return true;
        }

        if (!is_array($zips)) {
            $zips = [];
            $zips[$zip] = $plugin->component;
        }

        foreach ($zips as $zipfile => $plugin) {
            // Extract all ZIP packs do the dirroot.
            $silent or mtrace(get_string('packagesextracting', 'core_plugin', $plugin->component), ' ... ');
            list($plugintype, $pluginname) = core_component::normalize_component($plugin->component);

            $target = $pluginman->get_plugintype_root($plugintype);
            $plugininfo = $pluginman->get_plugin_info($plugin->component);
            if (file_exists($target.'/'.$pluginname) && $plugininfo) {
                $pluginman->remove_plugin_folder($plugininfo);
            }
            if (!$this->unzip_plugin_file($pluginman, $zipfile, $target, $pluginname)) {
                $silent or mtrace(get_string('error'));
                $silent or mtrace(get_string('unabletounzip', 'theme_remui', $zipfile), PHP_EOL);
                if (function_exists('opcache_reset')) {
                    opcache_reset();
                }
                return false;
            }
        }

        $silent or mtrace($ok);
        if (function_exists('opcache_reset')) {
            opcache_reset();
        }

        return true;
    }

    /**
     * Display the continue / cancel widgets for the plugins management pages.
     *
     * @param null|moodle_url $continue URL for the continue button, should it be displayed
     * @param null|moodle_url $cancel URL for the cancel link, defaults to the current page
     * @return string HTML
     */
    public function plugins_management_confirm_buttons(moodle_url $continue = null, moodle_url $download = null, moodle_url $cancel = null) {
        global $OUTPUT;

        $out = html_writer::start_div('plugins-management-confirm-buttons');

        if (!empty($continue)) {
            $out .= $OUTPUT->single_button($continue, get_string('continue'), 'post', array('class' => 'continue'));
        }

        if (!empty($download)) {
            $out .= $OUTPUT->single_button($download, get_string('download'), 'post', array('class' => 'download'));
        }

        if (empty($cancel)) {
            $cancel = $this->page->url;
        }
        $out .= html_writer::div(html_writer::link($cancel, get_string('cancel')), 'cancel');

        return $out;
    }

    /**
     * Helper procedure/macro for installing remote pluginsat block/edwiser_site_monitor/plugin.php
     *
     * Does not return, always redirects or exits.
     *
     * @param \core\update\remote_info  $installable list of \core\update\remote_info
     * @param bool                      $confirmed   false: display the validation screen, true: proceed installation
     * @param string                    $heading     validation screen heading
     * @param mixed                     $continue    URL to proceed with installation at the validation screen
     * @param mixed                     $return      URL to go back on cancelling at the validation screen
     *
     * @return void
     */
    public function upgrade_install_plugin(
        \core\update\remote_info $installable,
        $confirmed,
        $heading='',
        $continue = null,
        $download = null,
        $return = null
    ) {
        global $CFG, $PAGE;

        if (empty($return)) {
            $return = $PAGE->url;
        }

        if (!empty($CFG->disableupdateautodeploy)) {
            redirect($return);
        }

        if (empty($installable)) {
            redirect($return);
        }

        if ($confirmed) {
            // Installation confirmed at the validation results page.
            if (!$this->install_plugin($installable, true, true)) {
                throw new moodle_exception('install_plugins_failed', 'core_plugin', $return);
            }

            // Always redirect to admin/index.php to perform the database upgrade.
            // Do not throw away the existing $PAGE->url parameters such as.
            // confirmupgrade or confirmrelease if $PAGE->url is a superset of the.
            // URL we must go to.
            $mustgoto = new moodle_url('/admin/index.php', array('cache' => 0, 'confirmplugincheck' => 0));
            if ($mustgoto->compare($PAGE->url, URL_MATCH_PARAMS)) {
                redirect($PAGE->url);
            } else {
                redirect($mustgoto);
            }

        } else {
            $output = $PAGE->get_renderer('core', 'admin');
            echo $output->header();
            if ($heading) {
                echo $output->heading($heading, 3);
            }
            echo html_writer::start_tag('pre', array('class' => 'plugin-install-console'));
            $validated = $this->install_plugin($installable, false, false);
            echo html_writer::end_tag('pre');
            if ($validated) {
                echo $this->plugins_management_confirm_buttons($continue, null, $return);
            } else {
                echo $this->plugins_management_confirm_buttons(null, $download, $return);
            }
            echo $output->footer();
        }
    }

    /**
     * Dowload plugin file of requested plugin.
     * @param  object $plugin Plugin object
     * @return bool           Return false if unable to download
     */
    public function download_plugin($plugin) {
        $pluginman = core_plugin_manager::instance();

        if (!isset($plugin->package) || trim($plugin->package) == '') {
            $zip = false;
            $errormsg = get_string('cannotdownloadzipfile', 'core_error');
            if (!empty($plugin->msg)) {
                $tag = count($plugin->msg) > 1 ? 'ol' : 'ul';
                $errormsg = html_writer::start_tag($tag);
                foreach ($plugin->msg as $msg) {
                    $errormsg .= html_writer::tag('li', $msg);
                }
                $errormsg .= html_writer::end_tag($tag);
            }
            mtrace(PHP_EOL.' <- '. $errormsg . ' ->', '');
        } else {
            $url = PLUGIN_UPDATE . '/download/' . $plugin->package;
            $zip = $this->get_remote_plugin_zip(
                $pluginman,
                $url,
                $plugin->component
            );
        }
        if (!$zip) {
            mtrace(get_string('error'));
            return false;
        }

        $temp = make_request_directory();
        $zips = $this->verify_zip($pluginman, $zip, $temp, $plugin->component);
        if (count($zips) == 1) {
            $zips[$zipfile] = $zips[0];
            unset($zips[0]);
        } else {
            unlink($zip);
        }
        $zipfile = $zip;

        if (!$zips) {
            mtrace(get_string('error'));
            mtrace(get_string('unabletounzip', 'theme_remui', $zipfile), PHP_EOL);
            return false;
        }
        $checks = true;
        // Validate all downloaded packages.
        foreach ($zips as $zipfile => $plugindetails) {
            if ($plugindetails->component != $plugin->component) {
                unset($zips[$zipfile]);
                unlink($zipfile);
                continue;
            }
            // Force download
            send_file($zipfile, $plugin->component . '.zip', null , 0, false, true);
        }
    }

    /**
     * Get plugin update details for install update page
     * @param  array $params Plugin details parameter
     * @return array         Plugin update details
     */
    public function get_plugin_update($params) {
        $component = $params['installupdate'];
        list($plugins, $errors) = $this->fetch_plugins_update();

        if (!isset($plugins[$component])) {
            return false;
        }

        $plugin = $plugins[$component];

        if ($params['download'] == true) {
            $this->download_plugin($plugin);
        }

        return $plugin;
    }
}
