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
 * Theme customizer class
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer;

defined('MOODLE_INTERNAL') || die;

use moodle_exception;

/**
 * Customizer class
 */
class customizer {

    // Add settings methods.
    use add\typography;
    use add\colors;
    use add\buttons;
    use add\header;
    use add\footer;
    use add\login;
    use add\formsdesign;
    use add\icondesign;

    // Add processing methods.
    use process\body;
    use process\buttons;
    use process\colors;
    use process\heading;
    use process\header;
    use process\footer;
    use process\login;

    /**
     * Instance for singletone
     *
     * @var null
     */
    private static $instance = null;

    /**
     * Fonts local copy
     *
     * @var array
     */
    public static $fonts = null;

    /**
     * Fonts local copy with inherit option
     *
     * @var array
     */
    public static $fontsinherit = null;

    /**
     * Panels array
     *
     * @var array
     */
    private $panels = [];

    /**
     * Device sizes.
     *
     * @var array
     */
    private $devices = [
        'tablet' => 768,
        'mobile' => 480
    ];

    /**
     * Get singletone instance of customizer class.
     *
     * @return customizer
     */
    public static function instance() {
        if (self::$instance == null) {
            self::$instance = new customizer();
        }
        return self::$instance;
    }

    /**
     * Contructor
     */
    private function __construct() {
        $this->add_main_settings();
    }

    /**
     * Clear cache
     *
     */
    private function clear_cache() {
        global $CFG, $PAGE;
        $link = $PAGE->url;
        $link->remove_params();
        purge_other_caches();
        remove_dir($CFG->dataroot . '/temp/theme/remui');
        theme_reset_all_caches();
    }

    /**
     * Add all main settings
     *
     * @return void
     */
    private function add_main_settings() {
        $this->global_settings();
        $this->header_settings();
        $this->add_login_settings();
        $this->footer_settings();
        $this->additional_css_settings();
    }

    /**
     * This method is neccessary for old users who migrated to new theme.
     * In old theme site color is stored in hex but without #.
     * This method will check and # if missing in sitecolorhex.
     *
     * @return string Site primary color
     */
    public function get_site_primary_color() {
        $sitecolor = $this->get_config('sitecolorhex');
        if (stripos($sitecolor, '#') === false) {
            $sitecolor = '#' . $sitecolor;
        }
        return $sitecolor;
    }

    /**
     * Get common default color for customizer
     *
     * @param string $type Color type
     * @return string color value
     */
    private function get_common_default_color($type) {
        switch($type) {
            case 'primary':
                return '#62a8ea';
            case 'text':
                return '#526069';
            case 'link':
                return '#62a8eb';
            case 'background':
                return '#f1f4f5';
            case 'white':
                return '#ffffff';
            default:
                return '';
        }
    }

    /**
     * Insert setting in settings array.
     * Should not be called externally.
     * Only internal function should call this.
     *
     * @param array                        $panels    Main panels array
     * @param string                       $name      Unique name of setting
     * @param string                       $label     Label for setting
     * @param string                       $panel     Panel name
     * @param string                       $type      Type of setting panel/setting
     * @param \theme_remui\customizer\base $setting   Setting object
     * @return void
     */
    private function insert_setting(
        &$panels,
        $name,
        $label,
        $panel,
        $type,
        \theme_remui\customizer\elements\base $setting = null
        ) {
        if ($panel == 'root') {
            $object = (object) [
                'name' => $name,
                'label' => $label,
                'type' => $type
            ];
            if ($type == 'page') {
                $object->children = [];
            } else {
                $object->setting = $setting;
            }
            $panels[] = $object;
            return;
        }
        foreach ($panels as $key => $panelobject) {
            if ($panelobject->name == $panel) {
                $object = (object) [
                    'name' => $name,
                    'label' => $label,
                    'type' => $type
                ];
                if ($type == 'panel') {
                    $object->children = [];
                } else {
                    $object->setting = $setting;
                }
                $panelobject->children[] = $object;
                $panels[$key] = $panelobject;
                return;
            }
            if (!empty($panelobject->children)) {
                $this->insert_setting($panelobject->children, $name, $label, $panel, $type, $setting);
            }
        }
    }

    /**
     * Add setting in panel
     *
     * @param string $setting   Setting type
     * @param string $name      Unique name of setting
     * @param string $label     Label for setting
     * @param string $panel     Panel name
     * @param array  $options   Setting options
     * @return void
     */
    public function add_setting($setting, $name, $label, $panel, $options = []) {
        if (!class_exists("theme_remui\customizer\\elements\\" . $setting)) {
            throw new moodle_exception(
                'err_setting_type_not_supported',
                'theme_remui',
                '',
                [],
                "theme_remui\customizer\\elements\\" . $setting . " setting type does not exists"
            );
        }
        $class = "theme_remui\customizer\\elements\\" . $setting;
        $options['name'] = $name;
        $options['label'] = $label;
        $this->insert_setting(
            $this->panels,
            $name,
            $label,
            $panel,
            'setting',
            new $class($options)
        );
    }

    /**
     * Add panel
     *
     * @param string                       $name      Unique name of panel
     * @param string                       $label     Label for setting
     * @param string                       $parent    Parent panel name
     * @param \theme_remui\customizer\base $setting   Setting object
     * @return void
     */
    public function add_panel($name, $label, $parent, \theme_remui\customizer\elements\base $setting = null) {
        $this->insert_setting($this->panels, $name, $label, $parent, 'panel', $setting);
    }

    /**
     * Get font array
     *
     * @param array $custom Custom font array
     * @return array
     */
    public function get_fonts($custom = []) {
        if (self::$fonts == null || self::$fontsinherit == null) {
            $fontsobject = new fonts();
            $fonts = array_keys($fontsobject->get_fonts());
            self::$fonts = array_combine($fonts, $fonts);
        }
        if (!empty($custom)) {
            return array_merge($custom, self::$fonts);
        }
        return self::$fonts;
    }

    /**
     * Add global settings
     */
    private function global_settings() {
        $this->add_panel('global', get_string('global', 'theme_remui'), 'root');

        $this->add_panel('site', get_string('site', 'theme_remui'), 'global');
        // Favicon.
        $label = get_string('favicon', 'theme_remui');
        $name = 'faviconurl';
        $this->add_setting(
            'file',
            $name,
            $label,
            'site',
            [
                'help' => get_string('favicondesc', 'theme_remui'),
                'description' => get_string('favicosize', 'theme_remui'),
                'options' => [
                    'subdirs' => 0,
                    'maxfiles' => 1,
                    'accepted_types' => array('web_image')
                ]
            ]
        );

        $this->add_global_typography();

        $this->add_global_colors();

        $this->add_global_buttons();

        $this->add_formsdesign_settings();

        $this->add_icondesign_settings();
    }

    /**
     * Add addition css settings
     */
    private function additional_css_settings() {
        $label = get_string('customcss', 'theme_remui');
        $this->add_panel('additional-css-page', $label, 'root');
        $this->add_setting(
            'textarea',
            'customcss',
            $label,
            'additional-css-page',
            [
                'default' => '',
                'help' => get_string('customcssdesc', 'theme_remui'),
                'options' => [
                    'rows' => 10
                ]
            ]
        );
    }

    /**
     * Prepare accordion data for template
     *
     * @param object $panel    Panel object
     * @param string $parent   Parent name
     */
    private function prepare_accordion($panel, $parent) {
        $object = (object)[
            'name' => $panel->name,
            'label' => $panel->label
        ];
        if ($panel->type == 'panel') {
            $object->panel = true;
            $label = $panel->label;
            if (isset($this->panel[$parent]) && $this->panel[$parent]->name != 'root') {
                $label = $this->panel[$parent]->label . ' <i class="mx-1 fa fa-caret-right"></i> ' . $label;
            }
            $this->panel[$panel->name] = (object)[
                'name' => $panel->name,
                'label' => $label,
                'parent' => $parent,
                'children' => []
            ];
            if (isset($panel->children)) {
                foreach ($panel->children as $setting) {
                    $this->prepare_accordion($setting, $panel->name);
                }
            }
        } else {
            $object->setting = $panel->setting;
        }
        $this->panel[$parent]->children[] = $object;
    }

    /**
     * Prepare and return accordion data
     */
    public function accordion() {
        global $SITE;
        $this->panel = [];
        $panels = $this->panels;
        $this->panel['root'] = (object)[
            'name' => 'root',
            'label' => 'Root',
            'current' => true,
            'root' => [
                'site' => $SITE->shortname
            ],
            'children' => []
        ];
        foreach ($panels as $panel) {
            $this->prepare_accordion($panel, 'root');
        }
        return array_values($this->panel);
    }

    /**
     * Save settings to database
     *
     * @param object $panel    Panel array
     * @param array  $settings Settings array
     * @param array  $errors   Errors
     * @return array
     */
    private function save_settings($panel, $settings, &$errors) {
        if ($panel->type == 'panel') {
            foreach ($panel->children as $setting) {
                $this->save_settings($setting, $settings, $errors);
            }
        } else {
            $panel->setting->process_form_save($settings, $errors);
        }
    }

    /**
     * Customizer public method to save settings to database
     *
     * @param array $settings Settings array
     * @return array
     */
    public function save($settings) {
        $response = array(
            'status' => true,
            'errors' => json_encode([]),
            'message' => get_string('savesuccess', 'theme_remui')
        );
        $errors = [];
        foreach ($this->panels as $panel) {
            $this->save_settings($panel, $settings, $errors);
        }
        $this->clear_cache();
        return $response;
    }

    /**
     * Save settings to database
     *
     * @param string $name    Name of setting
     * @param object $panel   Panel array
     * @param bool   $devices Get config of all devices
     * @return array
     */
    private function fetch_config($name, $panel, $devices) {
        if ($panel->type == 'panel') {
            if (isset($panel->children)) {
                foreach ($panel->children as $setting) {
                    $data = $this->fetch_config($name, $setting, $devices);
                    if ($data != null) {
                        return $data;
                    }
                }
            }
        } else {
            if ($panel->name == $name) {
                return $panel->setting->get_config($name, $devices);
            }
        }
        return null;
    }

    /**
     * Get config from settings.
     *
     * @param string $name Name
     * @param bool   $devices Get config of all devices
     * @return mixed config from database.
     */
    public function get_config($name, $devices = false) {
        foreach ($this->panels as $panel) {
            $data = $this->fetch_config($name, $panel, $devices);
            if ($data != null) {
                return $data;
            }
        }
        return null;
    }

    /**
     * Wrap content in responsive media query.
     *
     * @param  string $device  Target device.
     * @param  string $content CSS content
     * @return string          Css content
     */
    private function wrap_responsive($device, $content) {
        if ($device == 'tablet') {
            return "@media screen and (min-width: " . ($this->devices['mobile'] + 1) . "px)
            and (max-width: " . $this->devices['tablet'] . "px) {
                {$content}
            }";
        }
        if ($device == 'mobile') {
            return "@media screen and (max-width: " . $this->devices['mobile'] . "px) {
                {$content}
            }";
        }
        return $content;
    }

    /**
     * Process css settings.
     *
     * @param string $css css content
     * @return string processed css content
     */
    public function process($css = '') {
        $css = $this->process_global_base($css);
        $css = $this->process_global_heading($css);
        $css = $this->process_global_colors($css);
        $css = $this->process_global_buttons($css);
        $css = $this->process_header($css);
        $css = $this->process_footer($css);
        $css = $this->process_login($css);
        return $css;
    }
}
