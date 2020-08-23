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
 * Multianswer question renderer classes.
 *
 * Handle shortanswer, numerical and various multichoice subquestions
 * @package   theme_remui
 * @copyright 2010 Pierre Pichet
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_remui\output\qtype_multianswer;

defined('MOODLE_INTERNAL') || die();

use html_writer;

require_once($CFG->dirroot . '/question/type/shortanswer/renderer.php');

/**
 * Render an embedded multiple-response question horizontally.
 *
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class multiresponse_horizontal_renderer extends \qtype_multianswer_multiresponse_horizontal_renderer {

    /**
     * Choice wrapper start
     * @param string $class class attribute value.
     * @return string HTML to go before each choice.
     */
    protected function choice_wrapper_start($class) {
        return html_writer::start_tag('td', array('class' => $class. ' checkbox-custom checkbox-primary '));
    }
}
