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

class block_edwiseradvancedblock_edit_form extends block_edit_form {

    protected function specific_definition($mform) {

        // Section header title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

        // Block HTML setting
        $mform->addElement('editor', 'config_html', 'HTML');
        $mform->setDefault('config_html', '');
        $mform->setType('config_html', PARAM_RAW);

        // Block CSS setting
        $mform->addElement('editor', 'config_css', 'CSS');
        $mform->setDefault('config_css', '');
        $mform->setType('config_css', PARAM_RAW);

        // Block JS setting
        $mform->addElement('editor', 'config_js', 'Javascript');
        $mform->setDefault('config_js', '');
        $mform->setType('config_js', PARAM_RAW);
    }
}
