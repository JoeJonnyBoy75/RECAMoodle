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
 * Theme customizer login process trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\process;

defined('MOODLE_INTERNAL') || die;

trait login {
    /**
     * Process login settings
     *
     * @param string $css css content
     * @return string processed css conent
     */
    private function process_login($css) {

        // Login page background opacity.
        $opacity = $this->get_config('loginbackgroundopacity');
        $css = str_replace('"[[setting:loginbackgroundopacity]]"', "rgba(0, 0, 0, {$opacity})", $css);

        // Login panel background color.
        $color = $this->get_config('loginpanelbackgroundcolor');
        $css = str_replace('"[[setting:loginpanelbackgroundcolor]]"', $color, $css);

        // Login panel text color.
        $color = $this->get_config('loginpaneltextcolor');
        $css = str_replace('"[[setting:loginpaneltextcolor]]"', $color, $css);

        // Login panel link color.
        $color = $this->get_config('loginpanellinkcolor');
        $css = str_replace('"[[setting:loginpanellinkcolor]]"', $color, $css);

        // Login panel link hover color.
        $color = $this->get_config('loginpanellinkhovercolor');
        $css = str_replace('"[[setting:loginpanellinkhovercolor]]"', $color, $css);

        return $css;
    }
}
