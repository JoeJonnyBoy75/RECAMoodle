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
 * Edwiser RemUI Functions
 * @package    theme_remui
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();


if (isset($_POST['applysitewidecolor'])) {
    remui_clear_cache();
}

// handle license status change on form submit
$l_controller = new \theme_remui\controller\license_controller();
$l_controller->addData();

/**
 * CSS Processor
 *
 * @param string $css
 * @param theme_config $theme
 * @return string
 */
function theme_remui_process_css($css, $theme)
{
    global $PAGE, $OUTPUT;
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
    $css = \theme_remui\toolbox::set_color($css, $signuptextcolor, "'[[setting:signuptextcolor]]'", '#fff');

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
    $css = \theme_remui\toolbox::set_customcss($css, $customcss);

    // custom color sitewide
    $colorhex = \theme_remui\toolbox::get_setting('sitecolorhex');
    if (empty($colorhex)) {
        $colorhex = '#3e8ef7';
    } else {
        $colorhex = '#'.$colorhex;
    }

    $colorobj = new \theme_remui\Color($colorhex);
    if ($colorhex !== '#3e8ef7') {
        $css = str_replace('#3e8ef7', $colorhex, $css);// main color
        $css = str_replace('#007bff', $colorhex, $css);
        $css = str_replace('#589ffc', '#'.$colorobj->darken(3), $css); // on hover
        $css = str_replace('#4397e6', '#'.$colorobj->darken(5), $css);
        $css = str_replace('#d9e9ff', '#'.$colorobj->lighten(32), $css);
        $css = str_replace('#247cf0', '#'.$colorobj->darken(5), $css); // on active
        $css = str_replace('rgba(53, 131, 202, .07)', '#'.$colorobj->lighten(32), $css);
        $css = str_replace('rgba(53, 131, 202, .04)', '#'.$colorobj->lighten(34), $css);
    }

    return $css;
}

// clear theme cache on click 'apply sitewide color'
function remui_clear_cache()
{
    theme_reset_all_caches();
}

function flatnav_icon_support($flatnav)
{
    global $CFG, $USER, $PAGE;
    // Getting strings for privatefiles & competencies, because their keys are numeric in $PAGE-flatnav
    $pf   = get_string('privatefiles');
    $cmpt = get_string('competencies', 'core_competency');
    $flatnav_new = array();
    $home_count  = 0;
    $coursecount = 0;
    foreach ($flatnav as $key => $value) {
        $key = $coursecount++;
        $flatnav_new[$key] = $value;
        switch ($value->key) {
            case 'myhome':
                $flatnav_new[$key]->remuiicon = 'fa-dashboard';
                break;
            case 'home':
                $flatnav_new[$key]->remuiicon = 'fa-home';
                if ($home_count == 1) {
                    $flatnav_new[$key]->remuiicon = 'fa-dashboard';
                }
                $home_count++;
                break;
            case 'calendar':
                $flatnav_new[$key]->remuiicon = 'fa-calendar';
                break;
            case 'mycourses':
                $mycoursekey = $key;    // Store a key value to check if mycourses available
                $flatnav_new[$key]->remuiicon = 'fa-archive';
                $flatnav_new[$key]->action    = $CFG->wwwroot . "/course/index.php?mycourses=1";
                if ($PAGE->pagelayout == 'coursecategory' && optional_param('mycourses', null, PARAM_TEXT)) {
                    $flatnav_new[$key]->isactive = true;
                }
                break;
            case 'sitesettings':
                $flatnav_new[$key]->remuiicon = 'fa-cog';
                if ($PAGE->pagelayout == 'admin') {
                    $flatnav_new[$key]->isactive = true;
                }
                break;
            case 'addblock':
                $flatnav_new[$key]->remuiicon = 'fa-plus-circle ';
                break;
            case 'badgesview':
                $flatnav_new[$key]->remuiicon = 'fa-bookmark';
                break;
            case 'participants':
                $flatnav_new[$key]->remuiicon = 'fa-users';
                break;
            case 'grades':
                $flatnav_new[$key]->remuiicon = 'fa-star';
                break;
            case 'coursehome':
                $flatnav_new[$key]->remuiicon = 'fa-archive';
                break;
            default:
                // Check Whether the link has course id number
                if (is_numeric($value->key)) {
                    // Check for course type i.e. is it 20?
                    if ($flatnav_new[$key]->type == 20) {
                        $mycourses[] = $value;
                        unset($flatnav_new[$key]);
                        $coursecount--;
                        break;
                    }
                }
                $flatnav_new[$key]->remuiicon = 'fa-folder';
                if (!strpos($flatnav_new[$key]->action, 'section')) {
                    $flatnav_new[$key]->hidable = true;
                }
                
                break;
        }
        switch ($value->text) {
            case $pf:
                $flatnav_new[$key]->remuiicon = 'fa-paste';
                break;
            case $cmpt:
                $flatnav_new[$key]->remuiicon = 'fa-check-circle';
                break;
        }
    }
    if (!empty($mycourses)) {
        $flatnav_new[$mycoursekey]->ismycourses = true;
        $flatnav_new[$mycoursekey]->mycourses   = $mycourses;
        if (count($mycourses) == 10) {
            $flatnav_new[$mycoursekey]->hasmore = true;
        }
    }
    return $flatnav_new;
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
function theme_remui_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array())
{
    static $theme;
    $course = $course;
    $cm = $cm;
    if (empty($theme)) {
        $theme = theme_config::load('remui');
    }
    if ($context->contextlevel == CONTEXT_SYSTEM) {
        if ($filearea === 'frontpageaboutusimage') {
            return $theme->setting_file_serve('frontpageaboutusimage', $args, $forcedownload, $options);
        } elseif ($filearea === 'loginsettingpic') {
            return $theme->setting_file_serve('loginsettingpic', $args, $forcedownload, $options);
        } elseif ($filearea === 'logo') {
            return $theme->setting_file_serve('logo', $args, $forcedownload, $options);
        } elseif ($filearea === 'logomini') {
            return $theme->setting_file_serve('logomini', $args, $forcedownload, $options);
        } elseif (preg_match("/^(slideimage|testimonialimage|frontpageblockimage)[1-5]/", $filearea)) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } elseif ($filearea === 'faviconurl') {
            return $theme->setting_file_serve('faviconurl', $args, $forcedownload, $options);
        } elseif ($filearea === 'staticimage') {
            return $theme->setting_file_serve('staticimage', $args, $forcedownload, $options);
        } elseif ($filearea === 'layoutimage') {
            return $theme->setting_file_serve('layoutimage', $args, $forcedownload, $options);
        } elseif ($filearea === 'frontpageloader') {
            return $theme->setting_file_serve('frontpageloader', $args, $forcedownload, $options);
        } else {
            $itemid = (int)array_shift($args);
            $relativepath = implode('/', $args);
            $fullpath = "/{$context->id}/theme_remui/$filearea/$itemid/$relativepath";
            $fs = get_file_storage();
            if (!($file = $fs->get_file_by_hash(sha1($fullpath)))) {
                send_file_not_found();
                return false;
            }
            // Download MUST be forced - security.
            send_stored_file($file, 0, 0, $forcedownload, $options);
        }
    } else {
        send_file_not_found();
    }
}


function theme_remui_output_fragment_frontpage_section_form($args) {
    global $CFG;

    $args = (object) $args;
    $mform = new theme_remui\frontpage\sections\main_form(null, $args);

    ob_start();
    $mform->display();
    $o = ob_get_contents();
    ob_end_clean();

    return $o;
}

/**
 * This function will generate frontpage settings form and return it's html view
 * @param  array $args Argument passed with fragment call
 * @return string      Frontpage settings form's html output
 */
function theme_remui_output_fragment_frontpage_settings_form($args) {
    global $CFG;

    $configdata = [];
    $configdata['frontpageloader'] = get_config('theme_remui', 'frontpageloader');
    $configdata['frontpagetransparentheader'] = get_config('theme_remui', 'frontpagetransparentheader');
    $configdata['frontpageheadercolor'] = get_config('theme_remui', 'frontpageheadercolor');
    $configdata['frontpageappearanimation'] = get_config('theme_remui', 'frontpageappearanimation');
    $configdata['frontpageappearanimationstyle'] = get_config('theme_remui', 'frontpageappearanimationstyle');
    $args['configdata'] = $configdata;

    $args = (object) $args;
    $mform = new theme_remui\frontpage\settings(null, $args);

    return $mform->render();
}


// This function will return random unused itemid
function theme_remui_get_unused_itemid($filearea) {
    global $DB, $USER;

    if (isguestuser() or !isloggedin()) {
        // guests and not-logged-in users can not be allowed to upload anything!!!!!!
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
