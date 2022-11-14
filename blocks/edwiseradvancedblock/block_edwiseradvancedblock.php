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

require_once($CFG->dirroot . "/blocks/edwiseradvancedblock/lib.php");
class block_edwiseradvancedblock extends block_base {
    public function init() {
        $this->title = get_string('edwiseradvancedblock', 'block_edwiseradvancedblock');
    }
    public function get_content() {
        global $OUTPUT, $CFG;
        $this->content = new stdClass;

        $templatecontext = [];

        if (!edwb_is_plugin_available('local_edwiserpagebuilder')) {
            $this->content->text = "";
            if (is_siteadmin()) {
                $this->content->text = $OUTPUT->render_from_template('block_edwiseradvancedblock/plugin_not_available', $templatecontext);
            }
            return $this->content;
        }

        require_once($CFG->dirroot . "/local/edwiserpagebuilder/lib.php");
        $templatecontext['blockstyle'] = $CFG->wwwroot . '/blocks/edwiseradvancedblock/style.css';
        if (!is_null($this->config)) {
            $templatecontext['blockhtml'] = pre_process_html(format_text($this->config->html['text'], FORMAT_HTML, array("noclean" => true)), $this->instance->id);
            $templatecontext['blockcss'] = pre_process_css($this->config->css['text'], $this->instance->id);
            $templatecontext['blockjs'] = pre_process_html($this->config->js['text'], $this->instance->id);
        }
        $this->content->text = "";

        $context = context_block::instance($this->instance->id);
        if (has_capability('block/edwiseradvancedblock:cancustomizelive', $context)) {
            $templatecontext['liveeditorlink'] = local_edwiserpagebuilder_customizer_button($this->instance->id);
        }

        $this->content->text .= $OUTPUT->render_from_template('block_edwiseradvancedblock/blockcontent', $templatecontext);

        return $this->content;
    }
    public function instance_allow_multiple() {
        return true;
    }
    public function has_config() {
        return true;
    }
    public function hide_header() {
        return true;
    }
    public function applicable_formats() {

        $allow = [];
        if (class_exists('local_remuihomepage_plugin') && get_config('theme_remui', 'frontpagechooser') == 1) {
            $allow['site-index'] = false;
        }

        if (!edwb_is_plugin_available('local_edwiserpagebuilder')) {
            $allow['all'] = false;
            $allow['admin-index'] = true;

            return $allow;
        }
        $allow['all'] = true;
        return $allow;
    }
    /**
     * Do any additional initialization you may need at the time a new block instance is created
     * @return boolean
     */
    public function instance_create() {
        $blockname = optional_param('section', null, PARAM_RAW);

        $config = new stdClass;

        if (!$blockname) {
            $blockname = "html";
        }

        if (edwb_is_plugin_available('local_edwiserpagebuilder')) {
            $bm = new \local_edwiserpagebuilder\block_handler();
            $blockconfig = $bm->get_data_with_title($blockname, $bm->get_block_table_name());

            if ($blockconfig) {
                $blockconfig = json_decode($blockconfig->content);
                $config->html['text'] = $blockconfig->html;
                $config->css['text'] = $blockconfig->css;
                $config->js['text'] = $blockconfig->js;
            }
        }

        parent::instance_config_save($config, $nolongerused = false);
        return true;
    }
}
