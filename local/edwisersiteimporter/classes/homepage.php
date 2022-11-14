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
 * Edwiser Importer plugin
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 */

namespace local_edwisersiteimporter;

defined('MOODLE_INTERNAL') || die;

use stdClass;
use local_remuihomepage\frontpage\section_manager;

/**
 * Homepage template class.
 */
class homepage {

    private $templates;

    /**
     * Homepage template constructor.
     *
     * @param array $templates Templates list
     */
    public function __construct($templates) {
        $this->templates = $templates;
    }

    /**
     * Rendering template content of homepage.
     *
     * @return void
     */
    public function render_templates() {
        global $OUTPUT, $DB;
        $context = new stdClass;
        $context->templates = $this->templates;
        $sm = new section_manager();
        $context->supported = true;
        if (!method_exists($sm, 'import_sections')) {
            $context->supported = false;
            $context->message = get_string('oldhomepage', 'local_edwisersiteimporter');
        }
        return $OUTPUT->render_from_template('local_edwisersiteimporter/homepage', $context);
    }
}
