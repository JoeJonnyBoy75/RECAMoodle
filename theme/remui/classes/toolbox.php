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
 * This is built using the bootstrapbase template to allow for new theme's using Moodle's new Bootstrap theme engine
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui;

defined('MOODLE_INTERNAL') || die();

define("THEMEREMUI", "theme_remui");
/**
 * This is built using the bootstrapbase template to allow for new theme's using.
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class toolbox {

    /**
     * Core renderer object
     * @var null
     */
    protected $corerenderer = null;

    /**
     * Toolbox instance
     * @var toolbox
     */
    protected static $instance;

    /**
     * Private constructor for singletone class.
     */
    private function __construct() {
    }

    /**
     * Get singletone instance of toolbox
     * @return toolbox Class instance
     */
    public static function get_instance() {
        if (!is_object(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Sets the core_renderer class instance so that when purging all caches and 'theme_xxx_process_css' etc.
     * the settings are correct.
     * @param core_renderer $core Child object of core_renderer class.
     */
    public static function set_core_renderer($core) {
        $us = self::get_instance();
        // Set only once from the initial calling lib.php process_css function so that subsequent parent calls do not override it.
        // Must happen before parents.
        if (null === $us->corerenderer) {
            $us->corerenderer = $core;
        }
    }

    /**
     * Get theme settings
     * @param  object $setting Theme settings
     * @return string          Settings value
     */
    public static function get_theme_setting($setting) {
        $us = self::check_corerenderer();
        $themeconfig = $us->get_theme_config();
        $tcr = array_reverse($themeconfig, true);

        $settingvalue = false;
        foreach ($tcr as $tconfig) {
            if (property_exists($tconfig->settings, $setting)) {
                $settingvalue = $tconfig->settings->$setting;
                break;
            }
        }
        return $settingvalue;
    }

    /**
     * Finds the given setting in the theme from the themes' configuration object.
     * @param  string $setting Setting name.
     * @param  string $format  false|'format_text'|'format_html'.
     * @return any             false|value of setting.
     */
    public static function get_setting($setting, $format = false) {
        global $CFG;
        $us = self::check_corerenderer();
        $themeconfig = $us->get_theme_config();
        $tcr = array_reverse($themeconfig, true);
        $settingvalue = false;
        foreach ($tcr as $tconfig) {
            if (property_exists($tconfig->settings, $setting)) {
                $settingvalue = $tconfig->settings->$setting;
                break;
            }
        }
        if (!$settingvalue) {
            return false;
        }

        require_once($CFG->dirroot . '/lib/weblib.php');
        if (empty($settingvalue)) {
            return false;
        } else if (!$format) {
            return $settingvalue;
        } else if ($format === 'format_text') {
            return format_text($settingvalue, FORMAT_PLAIN);
        } else if ($format === 'format_html') {
            return format_text($settingvalue, FORMAT_HTML, array('trusted' => true, 'noclean' => true));
        } else if ($format === 'format_file_url') {
            return self::setting_file_url($setting, $setting);
        } else {
            return format_string($settingvalue);
        }
    }

    /**
     * Get file url from settings
     * @param  String $setting  Settings name
     * @param  String $filearea Filearea
     * @return String           String
     */
    public static function setting_file_url($setting, $filearea) {
        $us = self::check_corerenderer();
        $themeconfig = $us->get_theme_config();
        $tcr = array_reverse($themeconfig, true);
        $settingconfig = null;
        foreach ($tcr as $tconfig) {
            if (property_exists($tconfig->settings, $setting)) {
                $settingconfig = $tconfig;
                break;
            }
        }
        if ($settingconfig) {
            return $settingconfig->setting_file_url($setting, $filearea);
        }
        return null;
    }

    /**
     * Fetch image url
     *
     * @param  String $imagename Image name
     * @param  String $component Image component
     *
     * @return String            Image url
     */
    public static function image_url($imagename, $component) {
        $us = self::check_corerenderer();
        return $us->image_url($imagename, $component);
    }

    /**
     * Get renderer
     * @return object Renderer object
     */
    static private function check_corerenderer() {
        $us = self::get_instance();
        if (empty($us->corerenderer)) {
            // Use $OUTPUT unless is not a Remui or child core_renderer which can happen on theme switch.
            global $OUTPUT;
            if (property_exists($OUTPUT, 'remui')) {
                $us->corerenderer = $OUTPUT;
            } else {
                // Use $PAGE->theme->name as will be accurate than $CFG->theme when using URL theme changes.
                // Core 'allowthemechangeonurl' setting.
                global $PAGE;
                $corerenderer = null;
                try {
                    $corerenderer = $PAGE->get_renderer('theme_'.$PAGE->theme->name, 'core');
                } catch (\coding_exception $ce) {
                    // Specialised renderer may not exist in theme.  This is not a coding fault.  We just need to cope.
                    $corerenderer = null;
                }
                // Fallback check.
                if (($corerenderer != null) && (property_exists($corerenderer, 'remui'))) {
                    $us->corerenderer = $corerenderer;
                } else {
                    // Probably during theme switch, '$CFG->theme' will be accurrate.
                    global $CFG;
                    try {
                        $corerenderer = $PAGE->get_renderer('theme_'.$CFG->theme, 'core');
                    } catch (\coding_exception $ce) {
                        // Specialised renderer may not exist in theme.  This is not a coding fault.  We just need to cope.
                        $corerenderer = null;
                    }
                    if (($corerenderer != null) && (property_exists($corerenderer, 'remui'))) {
                        $us->corerenderer = $corerenderer;
                    } else {
                        // Last resort.  Hopefully will be fine on next page load for Child themes.
                        // However '***_process_css' in lib.php will be fine as it sets the correct renderer.
                        $us->corerenderer = $PAGE->get_renderer('theme_remui', 'core');
                    }
                }
            }
        }
        return $us->corerenderer;
    }

    /**
     * Set font in css
     *
     * @param String  $css      Css content
     * @param String  $fontname Font name
     *
     * @return String           Css content
     */
    public static function set_font($css, $fontname) {
        $fontfamilytag = '[[setting:fontfamily]]';
        $familyreplacement = $fontname;

        $css = str_replace($fontfamilytag, $familyreplacement, $css);

        return $css;
    }

    /**
     * Set color in the css
     *
     * @param String  $css           Css content
     * @param String  $themecolor    Color
     * @param String  $tag           Css content
     * @param String  $defaultcolour Color
     *
     * @return String                Css content
     */
    public static function set_color($css, $themecolor, $tag, $defaultcolour) {
        if (!($themecolor)) {
            $replacement = $defaultcolour;
        } else {
            $replacement = $themecolor;
        }

        $css = str_replace($tag, $replacement, $css);
        return $css;
    }

    /**
     * Set custom css
     * @param String  $css       Css content
     * @param String  $customcss Css content
     *
     * @return String            Css content
     */
    public static function set_customcss($css, $customcss) {
        $tag = '[[setting:customcss]]';
        $replacement = $customcss;
        $css = str_replace($tag, $replacement, $css);
        return $css;
    }

    /**
     * Set logo in the css
     *
     * @param String  $css  Css content
     * @param String  $logo Logo url
     *
     * @return String       Css content
     */
    public static function set_logo($css, $logo) {
        $tag = '[[setting:logo]]';
        if (!($logo)) {
            $replacement = 'none';
        } else {
            $replacement = 'url(\''.$logo.'\')';
        }
        $css = str_replace($tag, $replacement, $css);
        return $css;
    }

    /**
     * Set logo height in the css
     *
     * @param String  $css        Css content
     * @param String  $logoheight Logo height
     *
     * @return String             Css content
     */
    public static function set_logoheight($css, $logoheight) {
        $tag = '[[setting:logoheight]]';
        if (!($logoheight)) {
            $replacement = '65px';
        } else {
            $replacement = $logoheight;
        }
        $css = str_replace($tag, $replacement, $css);
        return $css;
    }

    /**
     * Set single plugin config
     * @param string $configname Config name
     * @param string $configdata Config data
     */
    public static function set_plugin_config($configname, $configdata) {
        set_config($configname, $configdata, THEMEREMUI);
    }

    /**
     * Set plugin config data of multiple config names
     * @param array $configdata Plugin config data array
     */
    public static function set_plugin_configs($configdata = array()) {
        foreach ($configdata as $configname => $value) {
            self::set_plugin_config($configname, $value);
        }
    }

    /**
     * Get plugin config from config name
     * @param  string $configname Plugin config name
     * @return string             Config data from db
     */
    public static function get_plugin_config($configname) {
        return get_config(THEMEREMUI, $configname);
    }

    /**
     * This function Requires array of confignames
     * Unset the Plugin Configs
     * @param string|array $confignames Plugin config names
     */
    public static function remove_plugin_config($confignames) {
        if (!is_array($confignames)) {
            $confignames = array($confignames);
        }

        foreach ($confignames as $value) {
            unset_config($value, THEMEREMUI);
        }
    }

    public static function get_form_style_data($config = null) {

        $activeprimarycolor = get_config('theme_remui', 'sitecolorhex');
        if (!$activeprimarycolor) {
            $activeprimarycolor = '#62A8EA';
        }
        $hexrgb = explode("#", $activeprimarycolor)[1];

        $sum = hexdec(substr($hexrgb, 0, 2)) + hexdec(substr($hexrgb, 2, 2)) + hexdec(substr($hexrgb, 4, 2));

        if ( $sum > 600 ) {
            $activeprimarycolor = "#62a8ea";
        }

        $mainbordercolor = '#ddd';
        $formsdesign1 = [
            '100%', // conf:edw-input-text-width
            '#fff', // conf:edw-input-text-bgcolor
            '#495057', // conf:edw-input-text-textcolor
            $mainbordercolor, // conf:edwf-bordercolor
            '1px', // conf:edwf-borderwidth-top
            '1px', // conf:edwf-borderwidth-right
            '1px', // conf:edwf-borderwidth-bottom
            '1px', // conf:edwf-borderwidth-left
            '20px', // conf:edwf-borderrad-bl
            '20px', // conf:edwf-borderrad-br
            '20px', // conf:edwf-borderrad-tl
            '20px', // conf:edwf-borderrad-tr
            'auto', // conf:edwf-input-text-height
            '14px', // conf:edwf-input-text-fontsize
            '0', // conf:edwf-shadow-hoffset
            '1px', // conf:edwf-shadow-voffset
            '4px', // conf:edwf-shadow-blur
            '0', // conf:edwf-shadow-spread
            '#00000017', // conf:edwf-shadow-color
            '.375rem', // conf:edwf-pad-top
            '30px', // conf:edwf-pad-right
            '.375rem', // conf:edwf-pad-bottom
            '20px', // conf:edwf-pad-left
            '1px', // conf:edwf-checkbox-borderwidth
            $mainbordercolor, // conf:edwf-checkbox-bordercolor
            '#62a8ea', // conf:edwf-checkbox-backcolor
            '1px', // conf:edwf-atto-borderwidth
            $mainbordercolor, // conf:edwf-atto-bordercolor
            'initial', // conf:edwf-btn-vpad
            'initial', // conf:edwf-btn-hpad
            '15px', // conf:edwf-btn-fontsize
            '.215rem', // conf:edwf-btn-borderrad
            '2px solid '.$activeprimarycolor, // conf:edwf-input-focus-tborder
            '2px solid '.$activeprimarycolor, // conf:edwf-input-focus-bborder
            '2px solid '.$activeprimarycolor, // conf:edwf-input-focus-lborder
            '2px solid '.$activeprimarycolor, // conf:edwf-input-focus-rborder
            'none', // conf:edwf-input-focus-shadow
            '', // conf:edwf-fieldset-background-color,
            '1px solid #f5f5f5', // conf:edwf-fieldset-border
            '0 0.125rem 0.25rem #00000013', // conf:edwf-fieldset-box-shadow
            '1px solid #e9e7e7', // conf:edwf-fieldset-ftoggler-b-bottom
            '0 0 1rem 0' // conf:edwf-fieldset-margin
        ];

        $mainbordercolor = '#afc6dc';
        $formsdesign3 = [
            '100%', // conf:edw-input-text-width
            '#f5f3f36e', // conf:edw-input-text-bgcolor
            '#495057', // conf:edw-input-text-textcolor
            $mainbordercolor, // conf:edwf-bordercolor
            '0', // conf:edwf-borderwidth-top
            '0', // conf:edwf-borderwidth-right
            '1px', // conf:edwf-borderwidth-bottom
            '0', // conf:edwf-borderwidth-left
            '0', // conf:edwf-borderrad-bl
            '0', // conf:edwf-borderrad-br
            '0', // conf:edwf-borderrad-tl
            '0', // conf:edwf-borderrad-tr
            '48px', // conf:edwf-input-text-height
            '15px', // conf:edwf-input-text-fontsize
            '0', // conf:edwf-shadow-hoffset
            '0', // conf:edwf-shadow-voffset
            '0', // conf:edwf-shadow-blur
            '0', // conf:edwf-shadow-spread
            '#fff', // conf:edwf-shadow-color
            '.375rem', // conf:edwf-pad-top
            '2rem', // conf:edwf-pad-right
            '.375rem', // conf:edwf-pad-bottom
            '.75rem', // conf:edwf-pad-left
            '1px', // conf:edwf-checkbox-borderwidth
            $mainbordercolor, // conf:edwf-checkbox-bordercolor
            $mainbordercolor, // conf:edwf-checkbox-backcolor
            '1px', // conf:edwf-atto-borderwidth
            $mainbordercolor, // conf:edwf-atto-bordercolor
            '1.05rem', // conf:edwf-btn-vpad
            '0.65rem', // conf:edwf-btn-hpad
            '15px', // conf:edwf-btn-fontsize
            '0', // conf:edwf-btn-borderrad
            'none', // conf:edwf-input-focus-tborder
            '2px solid '.$activeprimarycolor, // conf:edwf-input-focus-bborder
            'none', // conf:edwf-input-focus-lborder
            'none', // conf:edwf-input-focus-rborder
            'none', // conf:edwf-input-focus-shadow
            '', // conf:edwf-fieldset-background-color
            '', // conf:edwf-fieldset-border,
            '0 0.2rem 0.8rem #00000026', // conf:edwf-fieldset-box-shadow
            'none', // conf:edwf-fieldset-ftoggler-b-bottom
            '0 0 1rem 0' // conf:edwf-fieldset-margin
        ];

        $tag = [
            '"[[conf:edw-input-text-width]]"',
            '"[[conf:edw-input-text-bgcolor]]"',
            '"[[conf:edw-input-text-textcolor]]"',
            '"[[conf:edwf-bordercolor]]"',
            '"[[conf:edwf-borderwidth-top]]"',
            '"[[conf:edwf-borderwidth-right]]"',
            '"[[conf:edwf-borderwidth-bottom]]"',
            '"[[conf:edwf-borderwidth-left]]"',
            '"[[conf:edwf-borderrad-bl]]"',
            '"[[conf:edwf-borderrad-br]]"',
            '"[[conf:edwf-borderrad-tl]]"',
            '"[[conf:edwf-borderrad-tr]]"',
            '"[[conf:edwf-input-text-height]]"',
            '"[[conf:edwf-input-text-fontsize]]"',
            '"[[conf:edwf-shadow-hoffset]]"',
            '"[[conf:edwf-shadow-voffset]]"',
            '"[[conf:edwf-shadow-blur]]"',
            '"[[conf:edwf-shadow-spread]]"',
            '"[[conf:edwf-shadow-color]]"',
            '"[[conf:edwf-pad-top]]"',
            '"[[conf:edwf-pad-right]]"',
            '"[[conf:edwf-pad-bottom]]"',
            '"[[conf:edwf-pad-left]]"',
            '"[[conf:edwf-checkbox-borderwidth]]"',
            '"[[conf:edwf-checkbox-bordercolor]]"',
            '"[[conf:edwf-checkbox-backcolor]]"',
            '"[[conf:edwf-atto-borderwidth]]"',
            '"[[conf:edwf-atto-bordercolor]]"',
            '"[[conf:edwf-btn-vpad]]"',
            '"[[conf:edwf-btn-hpad]]"',
            '"[[conf:edwf-btn-fontsize]]"',
            '"[[conf:edwf-btn-borderrad]]"',
            '"[[conf:edwf-input-focus-tborder]]"',
            '"[[conf:edwf-input-focus-bborder]]"',
            '"[[conf:edwf-input-focus-lborder]]"',
            '"[[conf:edwf-input-focus-rborder]]"',
            '"[[conf:edwf-input-focus-shadow]]"',
            '"[[conf:edwf-fieldset-background-color]]"',
            '"[[conf:edwf-fieldset-border]]"',
            '"[[conf:edwf-fieldset-box-shadow]]"',
            '"[[conf:edwf-fieldset-ftoggler-b-bottom]]"',
            '"[[conf:edwf-fieldset-margin]]"',
        ];
        if ($config == null) {
            // We will return whole array, if no specific config is required.
            return array(
                $tag,
                array(
                    'formsdesign1' => $formsdesign1,
                    'formsdesign3' => $formsdesign3
                )
            );
        }
        return array($tag, $$config);
    }

    public static function replace_form_styling($css) {

        $config = get_config(THEMEREMUI, 'formselementdesign');
        if ($config == 'default') {
            return $css;
        }

        list($tag, $config) = self::get_form_style_data($config);

        return str_replace($tag, $config, $css);
    }
}
