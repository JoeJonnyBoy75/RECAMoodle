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
 * Theme customizer heading process trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\process;

defined('MOODLE_INTERNAL') || die;

trait heading {
    /**
     * Process heading tag
     *
     * @param string $heading Heading type
     * @param string $css     Css content
     * @return string processed css content
     */
    private function process_heading($heading, $css) {
        $tag = $heading == 'all' ? 'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6' : "{$heading}, .{$heading}";

        // Font family.
        $fontfamily = $this->get_config("typography-heading-{$heading}-fontfamily");
        if (strtolower($fontfamily) != 'inherit') {
            if ($fontfamily == 'Standard') {
                $fontfamily = 'Roboto';
            }
            $css .= "@import url('https://fonts.googleapis.com/css2?family="
            . str_replace(' ', '+', $fontfamily) . "&display=swap');
            " . $tag . "{
                font-family: {$fontfamily},sans-serif";
            if ($heading != 'all') {
                $css .= ' !important';
            }
            $css .= ";
            }";
        }

        // Font size.
        if ($heading != 'all') {
            $fontsize = $this->get_config("typography-heading-{$heading}-fontsize", true);
            $css = str_replace("\"[[setting:typography-heading-{$heading}-fontsize]]\"", $fontsize['default'], $css);
            // Font size tablet.
            if (isset($fontsize['tablet']) && $fontsize['tablet'] != '') {
                $css .= $this->wrap_responsive(
                    "tablet",
                    $tag . " {
                        font-size: " . $fontsize['tablet'] . "rem;
                    }"
                );
            }

            // Font size mobile.
            if (isset($fontsize['mobile']) && $fontsize['mobile'] != '') {
                $css .= $this->wrap_responsive(
                    "mobile",
                    $tag . " {
                        font-size: " . $fontsize['mobile'] . "rem;
                    }"
                );
            }
        }

        // Font weight.
        $fontweight = $this->get_config("typography-heading-{$heading}-fontweight");
        if ($heading != 'all' && $fontweight == 'inherit') {
            $fontweight = $this->get_config("typography-heading-all-fontweight");
        }
        $css = str_replace("\"[[setting:typography-heading-{$heading}-fontweight]]\"", $fontweight, $css);

        // Line height.
        $lineheight = $this->get_config("typography-heading-{$heading}-lineheight");
        if ($lineheight != '') {
            $css .= "
            {$tag} {
                line-height: {$lineheight};
            }
            ";
        }

        // Text transform.
        $texttransform = $this->get_config("typography-heading-{$heading}-text-transform");
        if ($heading != 'all' && $texttransform == 'inherit') {
            $texttransform = $this->get_config("typography-heading-all-text-transform");
        }
        $css = str_replace("\"[[setting:typography-heading-{$heading}-text-transform]]\"", $texttransform, $css);

        // Color.
        $textcolor = $this->get_config("typography-heading-{$heading}-textcolor");
        if ($heading == 'all') {
            $css = str_replace("\"[[setting:typography-heading-{$heading}-textcolor]]\"", $textcolor, $css);
        } else {
            if (get_config("theme_remui", "typography-heading-{$heading}-custom-color") == 'use') {
                $css .= "
                {$tag} {
                    color: {$textcolor};
                }
                ";
            }
        }
        return $css;
    }

    /**
     * Process global heading
     *
     * @param string $css css content
     * @return string processed css conent
     */
    private function process_global_heading($css) {
        // Headings list.
        $headings = ['all', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];

        // Process each tag.
        foreach ($headings as $heading) {
            $css = $this->process_heading($heading, $css);
        }
        return $css;
    }
}
