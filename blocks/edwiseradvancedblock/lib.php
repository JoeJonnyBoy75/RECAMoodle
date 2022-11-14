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
 * @package   block_edwiseradvancedblock
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav Govande
 */
defined('MOODLE_INTERNAL') || die();

global $CFG;
if (edwb_is_plugin_available("local_edwiserpagebuilder")) {
    require_once($CFG->dirroot . "/local/edwiserpagebuilder/lib.php");
    define_cdn_constants();
}

function block_edwiseradvancedblock_get_config($instanceid) {
    global $DB;
    if (is_null($instanceid)  || !is_numeric($instanceid)) {
        return null;
    }

    $blockrecord = $DB->get_record('block_instances', ['id' => $instanceid]);
    if (!$blockrecord) {
        return null;
    }

    $instance = block_instance($blockrecord->blockname, $blockrecord);

    return $instance->config;
}

function get_wrapped_css( $css, $instid ) {
    global $CFG;
    if ($css == "") {
        return "";
    }

    $css = str_replace(".m-0.p-50.editingbody", ".blockcontent", $css);

    try {
        require_once($CFG->libdir . "/classes/scss.php");

        $scss = "#inst" . $instid . "{" . htmlspecialchars_decode($css) . "}";
        $scssprocessor = new core_scss();
        $scssprocessor->append_raw_scss($scss);
        $css = $scssprocessor->to_css();

    } catch (Exception $e) {
        return "";
    }

    return $css;
}

function pre_process_html($html, $instanceid) {

    // Replacing the CDN URL;
    $html = replace_cdn_url($html);
    $html = replace_instance_id($html, $instanceid);
    return $html;
}

function pre_process_css($css, $instid) {

    $css = replace_cdn_url($css);

    return get_wrapped_css($css, $instid);
}
function replace_instance_id($content, $instanceid) {
    return str_replace("[[inst]]", $instanceid, $content);
}

function replace_cdn_url($content) {
    // Replacing the CDN URL;
    return str_replace("{{>cdnurl}}", CDNIMAGES, $content);
}

function revert_cdn_url($content) {
    // Replacing back the CDN URL with {{>cdnurl}};
    return str_replace(CDNIMAGES, "{{>cdnurl}}", $content);
}

function edwb_is_plugin_available($component) {

    list($type, $name) = core_component::normalize_component($component);

    $dir = \core_component::get_plugin_directory($type, $name);
    if (!file_exists($dir)) {
        return false;
    }
    return true;
}
