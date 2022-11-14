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
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Gourav Govande
 */
defined('MOODLE_INTERNAL') || die();

/**
 * Serves the files from the edwiserform file areas
 * @param stdClass $course the course object
 * @param stdClass $cm the course module object
 * @param stdClass $context the edwiserform's context
 * @param string $filearea the name of the file area
 * @param array $args extra arguments (itemid, path)
 * @param bool $forcedownload whether or not force download
 * @param array $options additional options affecting the file serving
 * @since Edwiser Form 1.0.0
 */
function local_edwiserpagebuilder_pluginfile(
    $course,
    $cm,
    $context,
    $filearea,
    array $args,
    $forcedownload = 0,
    array $options = array()
) {
    if ($context->contextlevel != CONTEXT_SYSTEM) {
        send_file_not_found();
    }
    $itemid = (int)array_shift($args);
    $relativepath = implode('/', $args);
    $fullpath = "/{$context->id}/local_edwiserpagebuilder/$filearea/$itemid/$relativepath";

    $fs = get_file_storage();
    if (!($file = $fs->get_file_by_hash(sha1($fullpath)))) {
        return false;
    }
    // Download MUST be forced - security!
    send_stored_file($file, 0, 0, $forcedownload, $options);
}

function get_block_content_url() {
    global $CFG;
    $blkid = isset( $_GET['bui_edit'] ) ? ( '?bui_edit=' . $_GET['bui_edit'] ) : '';
    $blkurl = $CFG->wwwroot . '/blocks/edwiseradvancedblock/editor.php' . $blkid;
    return $blkurl;
}

function get_block_content_return_url() {
    return isset( $_GET['returl'] ) ? $_GET['returl'] : '';
}

function get_block_id() {
    return (isset( $_GET['bui_edit'] ) ? $_GET['bui_edit'] : '');
}

// Add the customizer button on each block.
function local_edwiserpagebuilder_customizer_button($instanceid) {
    global $PAGE, $CFG;
    if (!$PAGE->user_is_editing()) {
        return "";
    }

    $url = $CFG->wwwroot . "/local/edwiserpagebuilder/editor.php?bui_edit=" . $instanceid;
    $url .= "&returl=". urlencode($PAGE->url);
    $customizerbutton = "<div class='d-flex justify-content-end mb-3 live-customizer-btn'>";
    $customizerbutton .= "<a class='btn btn-primary' href='".$url."'";
    $customizerbutton .= "role='button'>";
    $customizerbutton .= "<i class='fa fa-pencil'></i> ".get_string("livecustomizer", "local_edwiserpagebuilder")."</a>";
    $customizerbutton .= "</div>";

    return $customizerbutton;
}

// Update the list of blocks.
function local_edwiserpagebuilder_update_block_content() {
    $cm = new \local_edwiserpagebuilder\content_manager();
    $cm->update_block_content(); // Update the block content on cron run.
}


function local_edwiserpagebuilder_output_fragment_upload_media_filepicker($args) {
    global $PAGE, $CFG;
    require_once($CFG->dirroot.'/lib/form/filemanager.php');
    $fmoptions = new stdClass();
    $fmoptions->maxbytes       = -1;
    $fmoptions->maxfiles       = -1;
    $fmoptions->itemid         = file_get_unused_draft_itemid();
    $fmoptions->subdirs        = false;
    $fmoptions->accepted_types = array('web_image', 'web_video');
    $fmoptions->return_types   = FILE_INTERNAL | FILE_CONTROLLED_LINK;
    $fmoptions->context        = context_system::instance();;
    $fmoptions->areamaxbytes   = FILE_AREA_MAX_BYTES_UNLIMITED;
    $fm = new \form_filemanager($fmoptions);
    $fileoutput = $PAGE->get_renderer('core', 'files');
    ob_start();
    ?>
    <div id="edwiser-tab-file-upload" class="tab-pane fade p-4 flex-grow-1 active show" role="tabpanel" aria-labelledby="edwiser-tab-file-select">
        <?php echo $fileoutput->render($fm); ?>
        <input type="hidden" name="file_upload_item_id" id='file_upload_item_id' value="<?php echo $fmoptions->itemid; ?>" />
    </div>
    <?php
    return ob_get_clean();
}

function define_cdn_constants() {
    $serverhost = "https://staticcdn.edwiser.org/v40";
    // $serverhost = "http://remui.local";
    defined('BLOCKS_CONTENT_URL') || define("BLOCKS_CONTENT_URL", $serverhost . "/json/");
    defined('BLOCKS_LIST_URL') || define("BLOCKS_LIST_URL", $serverhost . "/json/list_of_blocks.json");
    defined('CDNIMAGES') || define("CDNIMAGES", $serverhost . "/CDN/");

    defined('PAGE_LIST_URL') || define("PAGE_LIST_URL", $serverhost . "/json/list_of_pages.json");
}

function check_plugin_available($component) {
    list($type, $name) = core_component::normalize_component($component);

    $dir = \core_component::get_plugin_directory($type, $name);
    if (!file_exists($dir)) {
        return false;
    }
    return true;
}
