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

/**
 * Blocks Manager
 */
class block_handler {
    // Class members declaration
    private $id;
    private $title;
    private $label;
    private $thumbnail;
    private $content;
    private $version;
    private $update;
    private $visible;

    // Table name where block data is stored at.
    private $table = "edw_page_blocks";

    // Card Layout Table name, where block data is stored at.
    private $cltable = "edw_page_block_layouts";

    // Insert or Update the block content.
    public function make_entry($data) {
        global $DB;

        $reftable = $this->get_block_table_name();

        $record = $this->get_data_with_title($data->title, $reftable);
        $recordid = null;
        try {
            if (!$record) {
                // Make an entry for new data.
                if (isset($data->categories)) {
                    $data->categories = json_encode($data->categories);
                }
                $recordid = $DB->insert_record($reftable, $data, true, false);
                // $this->cache->set();
            } else {
                // Update the db only when latest version is available.
                if ($data->version > $record->version) {
                    // Update - updateavailable parameter only
                    $record->updateavailable = 1;
                    $record->visible = 1;
                    $record->thumbnail = $data->thumbnail;
                    $myrecord = $DB->update_record($reftable, $record, false);
                    $recordid = $record->id;
                }
            }
        } catch (Exception $ex) {
            return $e->getMessage();
        }
        return $recordid;
    }

    public function get_block_table_name() {
        return $this->table;
    }
    public function get_cl_table_name() {
        return $this->cltable;
    }

    // Fetch and update the block content.
    public function update_block_content($data, $islayout = false) {
        global $DB;

        $reftable = (!$islayout) ? $this->get_block_table_name() : $this->get_cl_table_name();

        $record = $this->get_data_with_title($data->title, $reftable);
        if ($record) {
            $data->id = $record->id;
            $data->updateavailable = 0;

            // First check if visibility is on, if not then directly update the block.
            if ($record->visible) {
                if ($data->version <= $record->version) {
                    return false;
                }
            }

            $data->visible = 1;

            try {
                $DB->update_record($reftable, $data, false);
                return true;
            } catch (Exception $ex) {
                return $e->getMessage();
            }
        }
    }

    // Get the DB record for given title.
    public function get_data_with_title($title, $reftable) {
        global $DB;

        $record = $DB->get_record($reftable, array('title' => $title), '*');

        if (!$record) {
            return null;
        }

        return $record;
    }

    /**
     * Fetch blocks list
     * @param array $conditions optional array $fieldname=>requestedvalue with AND in between
     * @param string $fields a comma separated list of fields to return (optional, by default
     *   all fields are returned). The first field will be used as key for the
     */
    public function fetch_blocks_list($condition=array(), $fields='*') {
        $reftable = $this->get_block_table_name();
        return $this->get_record_from_table($reftable, $condition, $fields);
    }
    /**
     * Fetch Layouts list
     * @param array $conditions optional array $fieldname=>requestedvalue with AND in between
     * @param string $fields a comma separated list of fields to return (optional, by default
     *   all fields are returned). The first field will be used as key for the
     */
    public function get_layouts_list($condition=array(), $fields='*') {
        $reftable = $this->get_cl_table_name();
        return $this->get_record_from_table($reftable, $condition, $fields);
    }

    /**
     * Delete the block.
     * @param int id - block id
     * @param boolean islayout - if true - delete the layout or delete the block
     */
    public function delete_the_block($id, $islayout=false) {
        global $DB;
        if ($islayout) {
            $reftable = $this->get_cl_table_name();
        } else {
            $reftable = $this->get_block_table_name();
        }
        return $DB->delete_records($reftable, array("id" => $id));
    }

    /**
     * Fetch Data record from table
     * $reftable table name to refer
     * @param array $conditions optional array $fieldname=>requestedvalue with AND in between
     * @param string $fields a comma separated list of fields to return (optional, by default
     *   all fields are returned). The first field will be used as key for the
     */
    public function get_record_from_table($reftable, $condition=array(), $fields='*') {
        global $DB;

        return $DB->get_records(
            $reftable,
            $condition,
            'title',    // sort by title
            $fields
        );
    }

    // Insert or Update the card layouts.
    public function make_entry_layout($data, $updatecontent = true) {
        global $DB;
        $reftable = $this->get_cl_table_name();

        $record = $this->get_data_with_title($data->title, $reftable);

        try {
            if (!$record) {
                // Make an entry for new data.
                $DB->insert_record($reftable, $data, true, false);

            } else {
                // Update the db only when latest version is available.
                if ($data->version > $record->version) {
                    if ($updatecontent) {
                        // $record->updateavailable = 1;
                        // $record->visible = 1;
                        // $record->thumbnail = $data->thumbnail;
                        $data->id = $record->id;
                        $DB->update_record($reftable, $data, false);
                    } else {
                        // Update - updateavailable parameter only
                        $record->updateavailable = 1;
                        $record->visible = 1;
                        $record->thumbnail = $data->thumbnail;
                        $DB->update_record($reftable, $record, false);
                    }
                }
            }
        } catch (Exception $ex) {
            return $e->getMessage();
        }
        return true;
    }

    // Deprecate the block.
    public function deprecate_block($reftable, $data) {
        global $DB;
        $data->visible = 0; // set visibility to zero for deprecation.
        $DB->update_record($reftable, $data, false);
    }

    public function create_block_on_page (
        $blockname,
        $region,
        $weight,
        $showinsubcontexts,
        $pagetypepattern = null,
        $subpagepattern = null,
        $page
    ) {

        global $DB;

        if (empty($pagetypepattern)) {
            $pagetypepattern = $this->page->pagetype;
        }

        $blockinstance = new \stdClass;
        $blockinstance->blockname = $blockname;
        $blockinstance->parentcontextid = $page->context->id;
        $blockinstance->showinsubcontexts = !empty($showinsubcontexts);
        $blockinstance->pagetypepattern = $pagetypepattern;
        $blockinstance->subpagepattern = $subpagepattern;
        $blockinstance->defaultregion = $region;
        $blockinstance->defaultweight = $weight;
        $blockinstance->configdata = '';
        $blockinstance->timecreated = time();
        $blockinstance->timemodified = $blockinstance->timecreated;
        $blockinstance->id = $DB->insert_record('block_instances', $blockinstance);

        // Ensure the block context is created.
        \context_block::instance($blockinstance->id);

        // If the new instance was created, allow it to do additional setup
        if ($block = block_instance($blockname, $blockinstance)) {
            $block->instance_create();
        }

        return $block;
    }
}
