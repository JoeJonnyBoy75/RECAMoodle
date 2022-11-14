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
 * Theme customizer file element class
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\elements;

defined('MOODLE_INTERNAL') || die;

require_once($CFG->libdir . '/adminlib.php');

use form_filemanager;
use context_system;
use stdClass;
use html_writer;
use moodle_url;

/**
 * File picker element class.
 */
class file extends base {

    /**
     * Get config of setting.
     *
     * @param string $name Setting name
     * @param bool   $devices NOTE: Will be supported in future.
     * @return mixed
     */
    public function get_config($name, $devices = false) {
        $url = '';
        if (isset($this->options['get_url']) && $this->options['get_url'] == true) {
            $fs = get_file_storage();
            $filearea = preg_replace("/[^a-zA-Z0-9]+/", "", $name);
            $options = $this->get_options();
            $files = $fs->get_area_files($options['context']->id, $this->component, $filearea);
            foreach ($files as $file) {
                if ($file->get_filename() != '.') {
                    $url = moodle_url::make_pluginfile_url(
                        $file->get_contextid(),
                        $file->get_component(),
                        $file->get_filearea(),
                        $file->get_itemid(),
                        $file->get_filepath(),
                        $file->get_filename()
                    );
                    break;
                }
            }
        }
        return $url;
    }

    /**
     * Process form save
     *
     * @param array $settings Settings
     * @param array $errors   Errors array
     * @return void
     */
    public function process_form_save($settings, &$errors) {
        $name = $this->options['name'];
        $filearea = preg_replace("/[^a-zA-Z0-9]+/", "", $name);
        $fs = get_file_storage();
        $options = $this->get_options();
        foreach ($settings as $setting) {
            if ($setting['name'] == $name) {
                file_save_draft_area_files(
                    $setting['value'],
                    $options['context']->id,
                    $this->component,
                    $filearea,
                    0,
                    $options
                );
                $files = $fs->get_area_files($options['context']->id, $this->component, $filearea);
                foreach ($files as $file) {
                    if ($file->get_filename() != '.') {
                        $config = $file->get_filepath() . $file->get_filename();
                        set_config($name, $config, $this->component);
                        return [];
                    }
                }
            }
        }
        $fs->delete_area_files($options['context']->id, $this->component, $filearea, 0);
        set_config($name, '', $this->component);
        return [];
    }

    /**
     * Applies defaults and returns all options.
     * @return array
     */
    protected function get_options() {
        global $CFG;

        require_once("$CFG->libdir/filelib.php");
        require_once("$CFG->dirroot/repository/lib.php");
        $defaults = array(
            'mainfile' => '', 'subdirs' => 0, 'maxbytes' => -1, 'maxfiles' => 1,
            'accepted_types' => '*', 'return_types' => FILE_INTERNAL, 'areamaxbytes' => FILE_AREA_MAX_BYTES_UNLIMITED,
            'context' => context_system::instance());
        if (isset($this->options['options'])) {
            foreach ($this->options['options'] as $k => $v) {
                $defaults[$k] = $v;
            }
        }
        return $defaults;
    }

    /**
     * Prepare the output for the setting
     *
     * @return string element output
     */
    public function output() {
        global $CFG, $PAGE, $OUTPUT;

        $options = $this->options;
        $name = $options['name'];
        $label = isset($options['label']) ? $options['label'] : get_string($name, $this->component);
        $filearea = preg_replace("/[^a-zA-Z0-9]+/", "", $name);

        $options = $this->get_options();

        $draftitemid = false;

        file_prepare_draft_area($draftitemid, $options['context']->id, $this->component, $filearea, 0, $options);

        // Filemanager form element implementation is far from optimal, we need to rework this if we ever fix it...
        require_once("$CFG->dirroot/lib/form/filemanager.php");

        $fmoptions = new stdClass();
        $fmoptions->mainfile       = $options['mainfile'];
        $fmoptions->maxbytes       = $options['maxbytes'];
        $fmoptions->maxfiles       = $options['maxfiles'];
        $fmoptions->client_id      = uniqid();
        $fmoptions->itemid         = $draftitemid;
        $fmoptions->subdirs        = $options['subdirs'];
        $fmoptions->target         = $name;
        $fmoptions->accepted_types = $options['accepted_types'];
        $fmoptions->return_types   = $options['return_types'];
        $fmoptions->context        = $options['context'];
        $fmoptions->areamaxbytes   = $options['areamaxbytes'];

        $fm = new form_filemanager($fmoptions);
        $output = $PAGE->get_renderer('core', 'files');
        $html = $output->render($fm);

        $html .= "<input value='{$draftitemid}' name='{$name}' type='hidden'/>";

        if (!empty($fmoptions->accepted_types) && $fmoptions->accepted_types != '*') {
            $html .= html_writer::tag('p', get_string('filesofthesetypes', 'form'));
            $util = new \core_form\filetypes_util();
            $filetypes = $fmoptions->accepted_types;
            $filetypedescriptions = $util->describe_file_types($filetypes);
            $html .= $OUTPUT->render_from_template('core_form/filetypes-descriptions', $filetypedescriptions);
        }

        $description = false;
        if (isset($this->options['description'])) {
            $description = $this->options['description'];
        }

        return $OUTPUT->render_from_template($this->component . '/customizer/elements/file', [
            'name' => $name,
            'label' => $label,
            'content' => $html,
            'help' => $this->get_help(),
            'description' => $description
        ]);
    }
}
