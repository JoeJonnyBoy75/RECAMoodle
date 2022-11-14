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

namespace local_edwiserpagebuilder;

defined('MOODLE_INTERNAL') || die;

global $CFG;
require_once($CFG->dirroot . "/local/edwiserpagebuilder/lib.php");
define_cdn_constants();

use stdClass;
use context_course;
/**
 * content_manager class handles everything related to block contents.
 */
class content_manager {

    public function get_json_file_data($url) {
        global $CFG;

        require_once($CFG->libdir . "/filelib.php");

        try {
            $c = new \curl;
            $html = $c->get($url);

        } catch (\Exception $e) {
            echo $e;
            exit;
        }

        // Encode and then deccode is jugad for one issue we face while updating the blocks.
        return json_decode($html);

    }

    // Update the block content.

    public function update_block_content() {

        // Here we Update all the blocks content.
        $data = $this->get_json_file_data(BLOCKS_LIST_URL);
        // $pages = $this->get_json_file_data(PAGE_LIST_URL);

        if (isset($pages) && $pages) {
            $data->blocks = array_merge($data->blocks, $pages->pages);
        }

        foreach ($data as $key => $value) {
            if ($key == "cardlayouts") {
                // Here we update the layouts list.
                $this->make_entry_by_data($value, true);
                continue;
            }
            // Here we update the blocks list.
            $this->make_entry_by_data($value);
        }
    }

    public function make_entry_by_data($blocks, $islayout=false) {
        $bm = new block_handler();
        $pm = new page_manager();
        $reftable = $bm->get_block_table_name();
        $makeentrycall = "make_entry";

        if ($islayout) {
            $reftable = $bm->get_cl_table_name();
            $makeentrycall = "make_entry_layout";
        }

        $existingblocks = $bm->get_record_from_table($reftable, array(), "title,id");

        foreach ($blocks as $key => $block) {

            // Filteration to find out deprecated blocks.
            if (isset($existingblocks[$block->title])) {
                unset($existingblocks[$block->title]);
            }

            // To change the location for.
            $contenturl = BLOCKS_CONTENT_URL;
            if (isset($block->type) && $block->type == "page") {
                $contenturl = BLOCKS_CONTENT_URL . "pages/";
            }
            $content = $this->get_json_file_data( $contenturl. $block->title . ".json");

            if ($content) {
                // Encrypting the content.
                $content->content = json_encode($content->content);
                $recordid = $bm->$makeentrycall($content);
                if (isset($content->type) && $content->type == "page" && $recordid != null) {
                    $pm->update_page_content($recordid, $content);
                }
            }
        }

        foreach ($existingblocks as $key => $value) {
            $bm->deprecate_block($reftable, $value);
        }
    }

    public function update_block_content_by_name($blockname, $islayout = false) {
        $bm = new block_handler();
        if ($blockname != "") {
            // Here we update the block content by block name.
            $content = $this->get_json_file_data(BLOCKS_CONTENT_URL . $blockname . ".json");

            if ($content) {
                // Encrypting the content
                $content->content = json_encode($content->content);
                return $bm->update_block_content($content, $islayout);// true to update the content.
            } else {
                return get_string("unabletofetchjson", "local_edwiserpagebuilder");
            }
        } else {
            return get_string("provideproperblockname", "local_edwiserpagebuilder");
        }
    }
    public function can_edit_systemlevel_modules() {
        $context = context_course::instance(1); // System level course.
        if (has_capability('moodle/course:manageactivities', $context)) {
            return true;
        }

        return false;
    }

    public function generate_add_block_modal() {
        global $PAGE, $CFG, $OUTPUT;

        require_once($CFG->libdir . '/blocklib.php');

        $blockslist = [];
        $layoutlist = [];
        if (check_plugin_available("block_edwiseradvancedblock")) {
            $bm = new block_handler();
            $blocks = $bm->fetch_blocks_list(array("type" => "block")); // Fetching Edwiser Blocks

            $templatecontext['edwpageurl'] = strstr($PAGE->url->out(false), "?");
            $templatecontext['can_fetch_blocks'] = true;
            foreach ($blocks as $key => $block) {
                $obj = new stdClass();
                $obj->id = $block->id;
                $actionurl = $PAGE->url->out(false, array('bui_addblock' => '', 'sesskey' => sesskey()));
                $obj->url = strstr($actionurl, "?");// removes string upto substring i.e. "?"
                $obj->name = "edwiseradvancedblock";
                $obj->section = $block->title;
                $obj->title = $block->label;
                $obj->additionalclass = "isblock";
                $obj->thumbnail = str_replace("{{>cdnurl}}", CDNIMAGES, $block->thumbnail);
                $obj->updateavailable = $block->updateavailable;
                $obj->visible = $block->visible;
                if ($block->updateavailable || !$block->visible) {
                    $obj->hasextrabutton = true;
                }
                $blockslist[] = $obj;
            }

            if ($this->can_edit_systemlevel_modules() && check_plugin_available("mod_page")) {
                $templatecontext['can_fetch_pages'] = true;
            }
        }

        $bm = new \block_manager($PAGE);
        $bm->load_blocks(); // Loading all block plugins
        $coreblocks = $bm->get_addable_blocks();

        $blockslist = array_merge($blockslist, $coreblocks); // Fetching other block plugins

        foreach ($blockslist as $key => $block) {
            $actionurl = $PAGE->url->out(false, array('bui_addblock' => '', 'sesskey' => sesskey()));
            $block->url = strstr($actionurl, "?");// removes string upto substring i.e. "?"

            if (!isset($block->thumbnail)) {
                $block->thumbnail = $OUTPUT->image_url('default', 'local_edwiserpagebuilder');
            }

            // Remove edwiseradvancedblock from list
            if (!isset($block->section) && $block->name == "edwiseradvancedblock") {
                unset($blockslist[$key]);
            }

            if (!isset($block->section) && $block->name == "remuiblck") {
                $block->section = " ";
                $block->thumbnail = $OUTPUT->image_url('edwiser', 'local_edwiserpagebuilder');
            }
        }

        $templatecontext['blocks'] = array_values($blockslist);

        return $OUTPUT->render_from_template('local_edwiserpagebuilder/custom_modal', $templatecontext);
    }

    public function create_floating_add_a_block_button() {
        global $OUTPUT;

        $context['buttons']['ele_id'] = 'epbaddblockbutton';
        $context['buttons']['bgcolor'] = '#11c26d';
        $context['buttons']['title'] = get_string('addblock', 'core');
        $context['buttons']['icon'] = 'fa fa-plus';

        return $OUTPUT->render_from_template('local_edwiserpagebuilder/floating_buttons', $context);
    }
}
