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
 * Theme customizer colors process trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\process;

defined('MOODLE_INTERNAL') || die;

use theme_remui\Color;

trait colors {
    /**
     * Process global colors
     *
     * @param string $css css content
     * @return string processed css conent
     */
    private function process_global_colors($css) {
        // Primary color.
        $primary = $this->get_site_primary_color();
        if ($primary != "" || $primary != null) {
            $colorobj = new Color($primary);
            $css = str_replace('#1177d1', $primary, $css);
            $css = str_replace('#62a8ea', $primary, $css);
            $css = str_replace('#3e8ef7', $primary, $css);
            $css = str_replace('#589ffc', '#'.$colorobj->darken(3), $css); // On hover.
            $css = str_replace('#0e63ae', '#'.$colorobj->darken(3), $css);
            $css = str_replace('#55a1e8', '#'.$colorobj->darken(3), $css); // On Hover.
            $css = str_replace('#4c9ce7', '#'.$colorobj->darken(5), $css); // On Hover.
            $css = str_replace('#0d5ca2', '#'.$colorobj->darken(5), $css); // On Focus.
        }

        // Page background.
        $pagebackground = $this->get_config('global-colors-pagebackground');
        $color = $this->get_common_default_color('background');
        switch ($pagebackground) {
            case 'gradient':
                $color1 = $this->get_config('global-colors-pagebackgroundgradient1');
                $color2 = $this->get_config('global-colors-pagebackgroundgradient2');
                $color = "linear-gradient(100deg, $color1, $color2)";
            break;
            case 'image':
                $image = $this->get_config('global-colors-pagebackgroundimage');
                $attachment = $this->get_config('global-colors-pagebackgroundimageattachment');
                $size = $attachment == 'fixed' ? 'cover' : 'auto';
                $css .= "
                #page {
                    background-attachment: $attachment;
                    background-position: top;
                    background-size: {$size};
                }";
                $color = "url('$image')";
            break;
            // Case 'color' by default.
            default:
                $color = $this->get_config('global-colors-pagebackgroundcolor');
            break;
        }
        $css = str_replace('"[[setting:global-body-background]]"', $color, $css);
        return $css;
    }
}
