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
 * Theme customizer body process trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\process;

defined('MOODLE_INTERNAL') || die;

trait body {

    /**
     * Get global font name.
     * @return String Font name
     */
    private function get_global_font() {
        $fontfamily = $this->get_config('global-typography-body-fontfamily');
        $fontselect = get_config('theme_remui', 'fontselect');
        $fontname = get_config('theme_remui', 'fontname');
        if (strtolower($fontfamily) == 'inherit' || strtolower($fontfamily) == 'standard') {
            if ($fontselect == 1) {
                return 'Roboto';
            }
            if ($fontname == '') {
                return 'Roboto';
            }
            return $fontname;
        }
        return $fontfamily;
    }

    /**
     * Process global base
     *
     * @param string $css css content
     * @return string processed css conent
     */
    private function process_global_base($css) {
        $fontfamily = $this->get_global_font();
        if ($fontfamily != '') {
            $css .= "
            @import url('https://fonts.googleapis.com/css2?family=" . str_replace(' ', '+', $fontfamily) . "&display=swap');
                body {
                    font-family: {$fontfamily},sans-serif;
                }
            ";
        }

        // Font size.
        $fontsize = $this->get_config('global-typography-body-fontsize', true);
        $css = str_replace('"[[setting:global-typography-body-fontsize]]"', $fontsize['default'] . 'px', $css);

        // Font size tablet.
        if (isset($fontsize['tablet']) && $fontsize['tablet'] != '') {
            $css .= $this->wrap_responsive(
                "tablet",
                "html {
                    font-size: " . $fontsize['tablet'] . "px;
                }"
            );
        }

        // Font size mobile.
        if (isset($fontsize['mobile']) && $fontsize['mobile'] != '') {
            $css .= $this->wrap_responsive(
                "mobile",
                "html {
                    font-size: " . $fontsize['mobile'] . "px;
                }"
            );
        }

        // Font weight.
        $fontweight = $this->get_config('global-typography-body-fontweight');
        $css = str_replace('"[[setting:global-typography-body-fontweight]]"', $fontweight, $css);

        // Line height.
        $lineheight = $this->get_config('global-typography-body-lineheight');
        $css = str_replace('"[[setting:global-typography-body-lineheight]]"', $lineheight, $css);

        // Line height.
        $texttransform = $this->get_config('global-typography-body-text-transform');
        $css = str_replace('"[[setting:global-typography-body-text-transform]]"', $texttransform, $css);

        // Text color.
        $textcolor = $this->get_config('global-typography-body-textcolor');
        $css = str_replace($this->get_common_default_color('text'), $textcolor, $css);

        // Link color.
        $linkcolor = $this->get_config('global-typography-body-linkcolor');
        $css = str_replace($this->get_common_default_color('link'), $linkcolor, $css);

        // Link hover color.
        $linkcolor = $this->get_config('global-typography-body-linkhovercolor');
        $css = str_replace('"[[global-typography-body-linkhovercolor]]"', $linkcolor, $css);
        return $css;
    }
}
