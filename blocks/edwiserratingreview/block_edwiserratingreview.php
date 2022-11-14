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
 *
 * @package    block_edwiserratingreview
 * @copyright  2022 WisdmLabs
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();

class block_edwiserratingreview extends block_base {
    public function init() {
        $this->title = get_string('edwiserratingreview', 'block_edwiserratingreview');
    }

    public function has_config() {
        return true;
    }
    public function instance_allow_multiple() {
        return false;
    }
    public function get_content () {

        global $OUTPUT, $CFG, $USER, $COURSE;
        $this->content = new stdClass;

        if ($this->page->pagelayout == "mydashboard") {
            if (!is_siteadmin()) {
                $this->content->text = "";
                return;
            }
            $cfgchecker = 'pluginchecker';
            $cfgdenied = 'deniedpluginaddition';
            $modalpopup = 'modalpopup';
            $pluginname = 'block_edwiserratingreview';

            $pluginchecker = get_config($pluginname, $cfgchecker);
            $cfgdenied = get_config($pluginname, $cfgdenied);
            $modalpopup = get_config($pluginname, $modalpopup);

            if ($pluginchecker) {
                // Already added blocks.
                $this->content->text = get_string("blockalreadyadded", $pluginname);
                return;
            } else {
                $context = [
                    'isdenied' => $cfgdenied,
                    'modalpopup' => $modalpopup,
                ];
                $this->content->text = $OUTPUT->render_from_template('block_edwiserratingreview/pluginaddtocourse',  $context);
                return;
            }
        }

        if ($this->page->pagelayout == "course") {
            $dbh = new \block_edwiserratingreview\dbhandler();

            $buttontext = (isset($this->config->reviewbtntext)) ? $this->config->reviewbtntext : get_string('writereviewbtntext', 'block_edwiserratingreview');

            require_once($CFG->dirroot.'/blocks/edwiserratingreview/lib.php');

            $templatecontext = [
                'ratingprogress' => $dbh->get_progressbar_percentage($COURSE->id),
                'avgratingstat' => $dbh->get_avg_rating_stat_data($COURSE->id),
                'reviewbtntext' => $buttontext,
                'pagelayout' => $this->page->pagelayout,
            ];

            $context = \context_system::instance();
            if (has_capability('block/edwiserratingreview:approvereview', $context)) {
                $templatecontext["canapprovelink"] = new moodle_url("/blocks/edwiserratingreview/admin.php");
            }

            $this->content->text = $OUTPUT->render_from_template('block_edwiserratingreview/reviewarea',  $templatecontext);
        }
    }
}


