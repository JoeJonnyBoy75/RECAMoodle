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
 * Edwiser RemUI them functions
 * @package   theme_remui
 * @copyright 2016 Frédéric Massart - FMCorz.net
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Reset all caches
 */
function remui_clear_cache() {
    global $CFG, $PAGE;
    $link = $PAGE->url;
    $link->remove_params();
    purge_other_caches();
    remove_dir($CFG->dataroot . '/temp/theme/remui');
    theme_reset_all_caches();
    redirect($link);
}

if (isset($_POST['applysitewidecolor'])) {
    remui_clear_cache();
}

/**
 * Inject additional SCSS.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_remui_get_extra_scss($theme) {
    $content = '';
    $imageurl = $theme->setting_file_url('backgroundimage', 'backgroundimage');

    // Sets the background image, and its settings.
    if (!empty($imageurl)) {
        $content .= 'body { ';
        $content .= "background-image: url('$imageurl'); background-size: cover;";
        $content .= ' }';
    }

    // Always return the background image with the scss when we have it.
    return !empty($theme->settings->scss) ? $theme->settings->scss . ' ' . $content : $content;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_remui_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel != CONTEXT_SYSTEM) {
        send_file_not_found();
    }
    // By default, theme files must be cache-able by both browsers and proxies.
    $settings = [
        'frontpageloader',
        'staticimage',
        'testimonialimage1',
        'testimonialimage2',
        'testimonialimage3',
        'slideimage0',
        'slideimage1',
        'slideimage2',
        'slideimage3',
        'slideimage4',
        'slideimage5',
        'frontpageblockimage1',
        'frontpageblockimage2',
        'frontpageblockimage3',
        'frontpageblockimage4',
        'logo',
        'logomini',
        'faviconurl',
        'loginsettingpic'
    ];
    if (in_array($filearea, $settings)) {
        $theme = theme_config::load('remui');
        // By default, theme files must be cache-able by both browsers and proxies.
        if (!array_key_exists('cacheability', $options)) {
            $options['cacheability'] = 'public';
        }
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        $itemid = (int)array_shift($args);
        $relativepath = implode('/', $args);
        $fullpath = "/{$context->id}/theme_remui/$filearea/$itemid/$relativepath";
        $fs = get_file_storage();
        if (!($file = $fs->get_file_by_hash(sha1($fullpath)))) {
            return false;
        }
        // Download MUST be forced - security!
        send_stored_file($file, 0, 0, $forcedownload, $options);
    }
    return false;
}

/**
 * Returns the main SCSS content.
 *
 * @param theme_config $theme The theme config object.
 * @return string
 */
function theme_remui_get_main_scss_content($theme) {
    global $CFG;

    $scss = '';
    $filename = !empty($theme->settings->preset) ? $theme->settings->preset : null;
    $fs = get_file_storage();

    $context = context_system::instance();
    if ($filename == 'default.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/remui/scss/preset/default.scss');
    } else if ($filename == 'plain.scss') {
        $scss .= file_get_contents($CFG->dirroot . '/theme/remui/scss/preset/plain.scss');
    } else if ($filename && ($presetfile = $fs->get_file($context->id, 'theme_remui', 'preset', 0, '/', $filename))) {
        $scss .= $presetfile->get_content();
    } else {
        // Safety fallback - maybe new installs etc.
        $scss .= file_get_contents($CFG->dirroot . '/theme/remui/scss/preset/default.scss');
    }
    return $scss;
}

/**
 * Get compiled css.
 *
 * @return string compiled css
 */
function theme_remui_get_precompiled_css() {
    global $CFG;
    return file_get_contents($CFG->dirroot . '/theme/remui/style/remui-min.css');
}

/**
 * Get SCSS to prepend.
 *
 * @param theme_config $theme The theme config object.
 *
 * @return array
 */
function theme_remui_get_pre_scss($theme) {
    global $CFG;

    $scss = '';
    $configurable = [
        // Config key => [variableName, ...].
        'brandcolor' => ['primary'],
    ];

    // Prepend variables first.
    foreach ($configurable as $configkey => $targets) {
        $value = isset($theme->settings->{$configkey}) ? $theme->settings->{$configkey} : null;
        if (empty($value)) {
            continue;
        }
        array_map(function($target) use (&$scss, $value) {
            $scss .= '$' . $target . ': ' . $value . ";\n";
        }, (array) $targets);
    }

    // Prepend pre-scss.
    if (!empty($theme->settings->scsspre)) {
        $scss .= $theme->settings->scsspre;
    }

    if (!empty($theme->settings->fontsize)) {
        $scss .= '$font-size-base: ' . (1 / 100 * $theme->settings->fontsize) . "rem !default;\n";
    }

    return $scss;
}

/**
 * Get unused item id for file uploading
 *
 * @param  String  $filearea File area of file
 *
 * @return Integer           File item id
 */
function theme_remui_get_unused_itemid($filearea) {
    global $DB, $USER;

    if (isguestuser() or !isloggedin()) {
        // Guests and not-logged-in users can not be allowed to upload anything!!!!!!
        print_error('noguest');
    }

    $contextid = context_system::instance()->id;

    $fs = get_file_storage();
    $itemid = rand(1, 999999999);
    while ($files = $fs->get_area_files($contextid, 'theme_remui', $filearea, $itemid)) {
        $itemid = rand(1, 999999999);
    }

    return $itemid;
}

/**
 * Get image url of file using itemid, component and filearea
 *
 * @param  Integer $itemid    File item id
 * @param  String  $component File component
 * @param  String  $filearea  File area
 *
 * @return String             File url
 */
function get_file_img_url($itemid, $component, $filearea) {
    $context = \context_system::instance();

    $fs = get_file_storage();
    $files = $fs->get_area_files($context->id, $component, $filearea, $itemid);
    foreach ($files as $file) {
        if ($file->get_filename() != '.') {
            return moodle_url::make_pluginfile_url(
                $file->get_contextid(),
                $file->get_component(),
                $file->get_filearea(),
                $file->get_itemid(),
                $file->get_filepath(),
                $file->get_filename(),
                false)->out();
        }
    }
    return "";
}

/**
 * Process CSS content. This function replace tags and primary colors.
 * @param  string $css   CSS content passed by moodle
 * @param  object $theme Theme object
 * @return string        Processed CSS content
 */
function theme_remui_process_css($css, $theme) {
    global $PAGE, $OUTPUT;

    $css = \theme_remui\toolbox::replace_form_styling($css);
    $outputus = $PAGE->get_renderer('theme_remui', 'core');
    \theme_remui\toolbox::set_core_renderer($outputus);

    // set login background
    $tag = '[[setting:login_bg]]';
    $loginbg = \theme_remui\toolbox::setting_file_url('loginsettingpic', 'loginsettingpic');
    if (empty($loginbg)) {
        $loginbg = \theme_remui\toolbox::image_url('login_bg', 'theme');
    }
    $css = str_replace($tag, $loginbg, $css);

    // Set the signup panel text color
    $signuptextcolor = \theme_remui\toolbox::get_setting('signuptextcolor');
    $css = \theme_remui\toolbox::set_color($css, $signuptextcolor, "\"[[setting:signuptextcolor]]\"", '#fff');

    // Get the theme font from setting and apply it in CSS
    if (\theme_remui\toolbox::get_setting('fontselect') === "2") {
        $fontname = ucwords(\theme_remui\toolbox::get_setting('fontname'));
    }
    if (empty($fontname)) {
        $fontname = 'Open Sans';
    }

    $css = \theme_remui\toolbox::set_font($css, $fontname);

    // Set custom CSS.
    $customcss = \theme_remui\toolbox::get_setting('customcss');
    $css .= $customcss;

    // Set primary color.
    $css = str_replace($tag, $loginbg, $css);

    $customizer = \theme_remui\customizer\customizer::instance();
    $css = $customizer->process($css);

    return $css;
}

/**
 * This function creates custom field category.
 * @param  string $categoryname  name of the category
 * @return int    Newly created Category id.
 */
function theme_remui_create_customfield_category($categoryname) {
    // Create Custom Fields
    $handler = \core_customfield\handler::get_handler('core_course', 'course', 0);
    // self::validate_context($handler->get_configuration_context());
    if (!$handler->can_configure()) {
        if (!CLI_SCRIPT) {
            throw new moodle_exception('nopermissionconfigure', 'core_customfield');
        } else {
            \core\session\manager::set_user(get_admin());
        }
    }
    $categoryid = $handler->create_category($categoryname);

    return $categoryid;
}

/**
 * This function creates custom field.
 * @param  int $categoryid  Category Id, in which new field will be created.
 * @param  string $fieldname name of the Custom Field
 * @param  string $fieldtype Custom Field Type, checkbox|date|select|text|textarea
 * @param  string $options default [] (Optional) Extra data to create the field
 * @return int    Newly created Category id.
 */
function theme_remui_create_custom_field($categoryid, $fieldname, $fieldtype, $options = []) {
    try {

        $configdata = get_customfield_data($categoryid, $fieldname, $fieldtype, $options);

        $category = \core_customfield\category_controller::create($categoryid);
        $field = \core_customfield\field_controller::create(0, (object)['type' => $fieldtype], $category);

        $handler = $field->get_handler();

        $fieldid = $handler->save_field_configuration($field, $configdata);
    } catch (Exception $e) {
        error_log($e);
    }
}
/**
 * This function creates custom field.
 * @param  int $categoryid  Category Id, in which new field will be created.
 * @param  string $fieldname name of the Custom Field
 * @param  string $fieldtype Custom Field Type, checkbox|date|select|text|textarea
 * @param  string $options default [] (Optional) Extra data to create the field, $key => value
 * @return data  array[] of custom field configuration
 */
function get_customfield_data($categoryid, $fieldname, $fieldtype, $options = [] ) {
    $data = new \stdClass;

    $data->name = $fieldname;

    $replacefor = [' ', '(', ')'];
    $replacewith = ['', '', ''];
    $filteredname = str_replace($replacefor, $replacewith, $fieldname);
    $data->shortname = "edw" . strtolower($filteredname);

    $data->mform_isexpanded_id_header_specificsettings = 1;
    $data->mform_isexpanded_id_course_handler_header = 1;
    $data->categoryid = $categoryid;
    $data->type = $fieldtype;
    $data->id = 0; // This is always zero.

    $configdata = [
        "required" => 0,
        "uniquevalues" => 0,
        "locked" => 0,
        "visibility" => 2,
    ];

    switch ($fieldtype) {
        case 'checkbox':
            $configdata["checkbydefault"] = 0;
            break;
        case 'date':
            $configdata["includetime"] = 0;
            $configdata["mindate"] = 1605158580;
            $configdata["maxdate"] = 1605158580;
            break;
        case 'select':
            $configdata["options"] = "menuitem1";
            $configdata["defaultvalue"] = "menuitem1";
            break;
        case 'text':
            $configdata["defaultvalue"] = "";
            $configdata["displaysize"] = 50;
            $configdata["maxlength"] = 1333;
            $configdata["ispassword"] = 0;
            break;
        case 'textarea':
            $configdata['defaultvalue_editor'] = array();
            break;
        default:
            throw new Exception("No such type of field");
            break;
    }

    foreach ($options as $key => $value) {
        $configdata[$key] = $value;
    }

    $data->configdata = $configdata;
    return $data;
}

// function to fetch the customfield data.
function get_course_metadata($courseid) {
    $handler = \core_customfield\handler::get_handler('core_course', 'course');
    // This is equivalent to the line above.
    // $handler = \core_course\customfield\course_handler::create();
    $datas = $handler->get_instance_data($courseid);
    $metadata = [];
    foreach ($datas as $data) {
        if (empty($data->get_value())) {
            continue;
        }
        // $cat = $data->get_field()->get_category()->get('name');
        $metadata[$data->get_field()->get('shortname')] = $data->get_value();
    }
    return $metadata;
}

/*
 * This function is to fetch all the settings Which are coming from RemUI.
 * $node === admin_root Root node for setttings tree.
 * $component - The name of plugin
 */
function get_all_settings_from($node, $component) {
    $return = array();
    if ($node instanceof admin_category) {
        $entries = array_keys($node->children);
        foreach ($entries as $entry) {
            $data = get_all_settings_from($node->children[$entry], $component);
            if ( $data !== false & !empty($data)) {
                // array_merge($return, $data);
                return $data; // instead merging the settings, returning directly the data.
            }
        }

    } else if ($node instanceof admin_settingpage) {
        $newsettings = array();
        foreach ($node->settings as $setting) {
            if ($setting->plugin === $component) {
                $newsettings[] = $setting;
            }
        }
        if (count($newsettings) > 0) {
            return $newsettings;
        } else {
            return false;
        }
    }
    return $return;
}

/**
 * Get Icon mapping for font-awesome
 */
function theme_remui_get_fontawesome_icon_map() {
    return [
        'theme_remui:i/book' => 'fa-book',
        'theme_remui:i/list' => 'fa-list',
        'theme_remui:i/link' => 'fa-link',
        'theme_remui:i/graduation' => 'fa-graduation-cap',
    ];
}

/**
 * Fragment for customizer html editor
 *
 * @param  Array $args Argument passed with fragment call
 *
 * @return String      Customizer html editor
 */
function theme_remui_output_fragment_customizer_htmleditor($args) {
    global $CFG;

    $args = (object) $args;

    $id = 'theme_remui_customizer_htmleditor';
    $content = $args->content;

    $editor = editors_get_preferred_editor(FORMAT_HTML);
    $editor->set_text($content);
    $editor->use_editor($id, array('autosave' => false));

    $o = html_writer::start_tag('div', array('class' => 'p-5'));
    $o .= html_writer::tag('textarea', $content, array('id' => $id, 'rows' => 10));
    $o .= html_writer::end_tag('div');

    return $o;
}

function is_plugin_available($component) {

    list($type, $name) = core_component::normalize_component($component);

    $dir = \core_component::get_plugin_directory($type, $name);
    if (!file_exists($dir)) {
        return false;
    }
    return true;
}

/**
 * Import User Tours.
 *
 * @return void
 */
function import_user_tour() {
    global $DB, $CFG;
    $staticcdn = "https://staticcdn.edwiser.org";

    $tours = [
        [
            'name' => 'What\'s New',
            'url' => $staticcdn . '/json/tour/functional_blocks_tour.json'
        ],
        [
            'name' => 'Edwiser RemUI Theme Customizer',
            'url' => $staticcdn. '/json/tour/usertour_customizer.json'
        ],
        [
            'name' => 'Edwiser RemUI Theme Customizer Start',
            'url' => $staticcdn . '/json/tour/usertour_customizer_start.json',
            'delete' => true
        ]
    ];

    foreach ($tours as $key => $tour) {
        $record = $DB->get_record('tool_usertours_tours', array('name' => $tour['name']));

        if (isset($tour['delete']) && $tour['delete']) {
            if ($record) {
                $tour = \tool_usertours\tour::instance($record->id);
                $tour->remove();
            }
            continue;
        }
        if (!$record) {
            try {
                $content = @file_get_contents($tour['url']);
                if ($content) {
                    $tour = \tool_usertours\manager::import_tour_from_json($content);
                }
            } catch (Exception $ex) {
                // skipping the tour updation
            }
        }
    }
}

function migration_compatibility() {
    if (get_config("theme_remui", "logoorsitename") == "sitenamewithlogo") {
        set_config("logoorsitename", "logo", "theme_remui");
    }

    $loginpagepos = get_config("theme_remui", "login-panel-position" );
    if ($loginpagepos) {
        set_config("loginpagelayout", "login".$loginpagepos, "theme_remui");
        unset_config("login-panel-position", "theme_remui");
    }
    if (get_config('theme_remui', 'brandlogopos') == "") {
        set_config('brandlogopos', 2, 'theme_remui');
    }
    if (get_config('theme_remui', 'brandlogopos') == 1) {
        set_config('brandlogopos', 1, 'theme_remui');

    }
}

function get_themereleaseinfo() {
    $pluginman = core_plugin_manager::instance();
    $themeinfo = $pluginman->get_plugin_info("theme_remui");
    return $themeinfo->release;
}
