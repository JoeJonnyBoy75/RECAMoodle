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
 * Theme customizer footer process trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\process;

defined('MOODLE_INTERNAL') || die;

trait footer {
    /**
     * Process footer settings
     * @param  String $css Theme css
     * @return String      Processed css
     */
    private function process_footer($css) {
        $panel = get_string('footer', 'theme_remui');
        $this->add_panel('footer', $panel, 'root');

        // Background color.
        $background = $this->get_config('footer-background-color');
        $css = str_replace('"[[setting:footer-background-color]]"', $background, $css);

        // Text color.
        $text = $this->get_config('footer-text-color');
        $css = str_replace('"[[setting:footer-text-color]]"', $text, $css);

        // Link color.
        $link = $this->get_config('footer-link-text');
        $css = str_replace('"[[setting:footer-link-text]]"', $link, $css);

        // Link hover color.
        $linkhover = $this->get_config('footer-link-hover-text');
        $css = str_replace('"[[setting:footer-link-hover-text]]"', $linkhover, $css);

        return $css;
    }
}
