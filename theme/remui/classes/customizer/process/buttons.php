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
 * Theme customizer buttons process trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\process;

defined('MOODLE_INTERNAL') || die;

trait buttons {
    /**
     * Process primary buttons
     *
     * @return string buttons content
     */
    private function process_global_buttons_primary() {
        $borderwidth = $this->get_config('button-primary-border-width');
        $borderradius = $this->get_config('button-primary-border-radius');
        $fontfamily = $this->get_config('button-primary-fontfamily');
        $fontsize = $this->get_config('button-primary-fontsize', true);
        $fontweight = $this->get_config('button-primary-fontweight');
        $texttransform = $this->get_config('button-primary-text-transform');
        $lineheight = $this->get_config('button-primary-lineheight');
        $letterspacing = $this->get_config('button-primary-letterspacing');
        $paddingtop = $this->get_config('button-primary-padingtop', true);
        $paddingright = $this->get_config('button-primary-padingright', true);
        $paddingbottom = $this->get_config('button-primary-padingbottom', true);
        $paddingleft = $this->get_config('button-primary-padingleft', true);

        $content = '';
        // Font family.
        if ($fontfamily != 'default' && strtolower($fontfamily) != 'inherit') {
            if ($fontfamily == 'Standard') {
                $fontfamily = 'Roboto';
            }
            $content .= "
                @import url('https://fonts.googleapis.com/css2?family=" . str_replace(' ', '+', $fontfamily) . "&display=swap');
            ";
        }
        $content .= "
            .btn-primary {
                border-width: {$borderwidth}rem;
                border-radius: {$borderradius}rem;
                text-transform: {$texttransform};
                letter-spacing: {$letterspacing}rem;
        ";

        // Font family.
        if ($fontfamily != 'default' && strtolower($fontfamily) != 'inherit') {
            $content .= "
                font-family: {$fontfamily}, sans-serif;
            ";
        }

        // Font size.
        if (isset($fontsize['default']) && $fontsize['default'] != '') {
            $content .= "\n
                font-size: " . $fontsize['default'] . "rem;
            ";
        }

        // Font weight.
        if ($fontweight != 'default') {
            $content .= "\n
                font-weight: {$fontweight};
            ";
        }

        // Line height.
        if ($lineheight) {
            $content .= "\n
                line-height: {$lineheight};
            ";
        }

        // Padding top.
        if ($paddingtop['default'] != '') {
            $content .= "
                padding-top: " . $paddingtop['default'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['default'] != '') {
            $content .= "
                padding-right: " . $paddingright['default'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['default'] != '') {
            $content .= "
                padding-bottom: " . $paddingbottom['default'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['default'] != '') {
            $content .= "
                padding-left: " . $paddingleft['default'] . "rem;
            ";
        }

        $content .= "\n
            }
        ";

        // Tablet.
        $tablet = "
            .btn-primary {
        ";
        // Font size.
        if (isset($fontsize['tablet']) && $fontsize['tablet'] != '') {
            $tablet .= "
                font-size: " . $fontsize['tablet'] . "rem;
            ";
        }

        // Padding top.
        if ($paddingtop['tablet'] != '') {
            $tablet .= "
                padding-top: " . $paddingtop['tablet'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['tablet'] != '') {
            $tablet .= "
                padding-right: " . $paddingright['tablet'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['tablet'] != '') {
            $tablet .= "
                padding-bottom: " . $paddingbottom['tablet'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['tablet'] != '') {
            $tablet .= "
                padding-left: " . $paddingleft['tablet'] . "rem;
            ";
        }

        $tablet .= "
            }
        ";

        $content .= $this->wrap_responsive('tablet', $tablet);

        // Mobile.
        $mobile = "
            .btn-primary {
        ";
        // Font size.
        if (isset($fontsize['tablet']) && $fontsize['mobile'] != '') {
            $mobile .= "
                font-size: " . $fontsize['mobile'] . "rem;
            ";
        }

        // Padding top.
        if ($paddingtop['mobile'] != '') {
            $mobile .= "
                padding-top: " . $paddingtop['mobile'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['mobile'] != '') {
            $mobile .= "
                padding-right: " . $paddingright['mobile'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['mobile'] != '') {
            $mobile .= "
                padding-bottom: " . $paddingbottom['mobile'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['mobile'] != '') {
            $mobile .= "
                padding-left: " . $paddingleft['mobile'] . "rem;
            ";
        }

        $mobile .= "
            }
        ";

        $content .= $this->wrap_responsive('mobile', $mobile);
        return $content;
    }

    /**
     * Process secondary buttons
     *
     * @return string buttons content
     */
    private function process_global_buttons_secondary() {
        $textcolor = $this->get_config('button-secondary-color-text');
        $texthovercolor = $this->get_config('button-secondary-color-texthover');
        $backgroundcolor = $this->get_config('button-secondary-color-background');
        $backgroundhovercolor = $this->get_config('button-secondary-color-backgroundhover');
        $borderwidth = $this->get_config('button-secondary-border-width');
        $bordercolor = $this->get_config('button-secondary-border-color');
        $borderhovercolor = $this->get_config('button-secondary-border-hovercolor');
        $borderradius = $this->get_config('button-secondary-border-radius');
        $fontfamily = $this->get_config('button-secondary-fontfamily');
        $fontsize = $this->get_config('button-secondary-fontsize', true);
        $fontweight = $this->get_config('button-secondary-fontweight');
        $texttransform = $this->get_config('button-secondary-text-transform');
        $lineheight = $this->get_config('button-secondary-lineheight');
        $letterspacing = $this->get_config('button-secondary-letterspacing');
        $paddingtop = $this->get_config('button-secondary-padingtop', true);
        $paddingright = $this->get_config('button-secondary-padingright', true);
        $paddingbottom = $this->get_config('button-secondary-padingbottom', true);
        $paddingleft = $this->get_config('button-secondary-padingleft', true);

        $content = '';
        // Font family.
        if ($fontfamily != 'default' && strtolower($fontfamily) != 'inherit') {
            if ($fontfamily == 'Standard') {
                $fontfamily = 'Roboto';
            }
            $content .= "
                @import url('https://fonts.googleapis.com/css2?family=" . str_replace(' ', '+', $fontfamily) . "&display=swap');
            ";
        }
        $content .= "
            .btn-secondary:hover {
                color: {$texthovercolor};
                background: {$backgroundhovercolor};
                border-color: {$borderhovercolor};
            }
            .btn-secondary {
                color: {$textcolor};
                background: {$backgroundcolor};
                border-color: {$bordercolor};
                border-width: {$borderwidth}rem;
                border-radius: {$borderradius}rem;
                text-transform: {$texttransform};
                letter-spacing: {$letterspacing}rem;
        ";

        // Font family.
        if ($fontfamily != 'default' && strtolower($fontfamily) != 'inherit') {
            $content .= "
                font-family: {$fontfamily}, sans-serif;
            ";
        }

        // Font size.
        if (isset($fontsize['default']) && $fontsize['default'] != '') {
            $content .= "\n
                font-size: " . $fontsize['default'] . "rem;
            ";
        }

        // Font weight.
        if ($fontweight != 'default') {
            $content .= "\n
                font-weight: {$fontweight};
            ";
        }

        // Line height.
        if ($lineheight) {
            $content .= "\n
                line-height: {$lineheight};
            ";
        }

        // Padding top.
        if ($paddingtop['default'] != '') {
            $content .= "
                padding-top: " . $paddingtop['default'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['default'] != '') {
            $content .= "
                padding-right: " . $paddingright['default'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['default'] != '') {
            $content .= "
                padding-bottom: " . $paddingbottom['default'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['default'] != '') {
            $content .= "
                padding-left: " . $paddingleft['default'] . "rem;
            ";
        }

        $content .= "\n
            }
        ";

        // Tablet.
        $tablet = "
            .btn-secondary {
        ";
        // Font size.
        if (isset($fontsize['tablet']) && $fontsize['tablet'] != '') {
            $tablet .= "
                font-size: " . $fontsize['tablet'] . "rem;
            ";
        }

        // Padding top.
        if ($paddingtop['tablet'] != '') {
            $tablet .= "
                padding-top: " . $paddingtop['tablet'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['tablet'] != '') {
            $tablet .= "
                padding-right: " . $paddingright['tablet'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['tablet'] != '') {
            $tablet .= "
                padding-bottom: " . $paddingbottom['tablet'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['tablet'] != '') {
            $tablet .= "
                padding-left: " . $paddingleft['tablet'] . "rem;
            ";
        }

        $tablet .= "
            }
        ";

        $content .= $this->wrap_responsive('tablet', $tablet);

        // Mobile.
        $mobile = "
            .btn-secondary {
        ";
        // Font size.
        if (isset($fontsize['mobile']) && $fontsize['mobile'] != '') {
            $mobile .= "
                font-size: " . $fontsize['mobile'] . "rem;
            ";
        }

        // Padding top.
        if ($paddingtop['mobile'] != '') {
            $mobile .= "
                padding-top: " . $paddingtop['mobile'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['mobile'] != '') {
            $mobile .= "
                padding-right: " . $paddingright['mobile'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['mobile'] != '') {
            $mobile .= "
                padding-bottom: " . $paddingbottom['mobile'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['mobile'] != '') {
            $mobile .= "
                padding-left: " . $paddingleft['mobile'] . "rem;
            ";
        }

        $mobile .= "
            }
        ";

        $content .= $this->wrap_responsive('mobile', $mobile);
        return $content;
    }

    /**
     * Process default buttons
     *
     * @return string buttons content
     */
    private function process_global_buttons_default() {
        $textcolor = $this->get_config('button-default-color-text');
        $texthovercolor = $this->get_config('button-default-color-texthover');
        $backgroundcolor = $this->get_config('button-default-color-background');
        $backgroundhovercolor = $this->get_config('button-default-color-backgroundhover');
        $borderwidth = $this->get_config('button-default-border-width');
        $bordercolor = $this->get_config('button-default-border-color');
        $borderhovercolor = $this->get_config('button-default-border-hovercolor');
        $borderradius = $this->get_config('button-default-border-radius');
        $fontfamily = $this->get_config('button-default-fontfamily');
        $fontsize = $this->get_config('button-default-fontsize', true);
        $fontweight = $this->get_config('button-default-fontweight');
        $texttransform = $this->get_config('button-default-text-transform');
        $lineheight = $this->get_config('button-default-lineheight');
        $letterspacing = $this->get_config('button-default-letterspacing');
        $paddingtop = $this->get_config('button-default-padingtop', true);
        $paddingright = $this->get_config('button-default-padingright', true);
        $paddingbottom = $this->get_config('button-default-padingbottom', true);
        $paddingleft = $this->get_config('button-default-padingleft', true);

        $content = '';
        // Font family.
        if ($fontfamily != 'default' && strtolower($fontfamily) != 'inherit') {
            if ($fontfamily == 'Standard') {
                $fontfamily = 'Roboto';
            }
            $content .= "
                @import url('https://fonts.googleapis.com/css2?family=" . str_replace(' ', '+', $fontfamily) . "&display=swap');
            ";
        }
        $content .= "
            .btn-default:hover {
                color: {$texthovercolor};
                background: {$backgroundhovercolor};
                border-color: {$borderhovercolor};
            }
            .btn-default {
                color: {$textcolor};
                background: {$backgroundcolor};
                border-color: {$bordercolor};
                border-width: {$borderwidth}rem;
                border-radius: {$borderradius}rem;
                text-transform: {$texttransform};
                letter-spacing: {$letterspacing}rem;
        ";

        // Font family.
        if ($fontfamily != 'default' && strtolower($fontfamily) != 'inherit') {
            $content .= "
                font-family: {$fontfamily}, sans-serif;
            ";
        }

        // Font size.
        if (isset($fontsize['default']) && $fontsize['default'] != '') {
            $content .= "\n
                font-size: " . $fontsize['default'] . "rem;
            ";
        }

        // Font weight.
        if ($fontweight != 'default') {
            $content .= "\n
                font-weight: {$fontweight};
            ";
        }

        // Line height.
        if ($lineheight) {
            $content .= "\n
                line-height: {$lineheight};
            ";
        }

        // Padding top.
        if ($paddingtop['default'] != '') {
            $content .= "
                padding-top: " . $paddingtop['default'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['default'] != '') {
            $content .= "
                padding-right: " . $paddingright['default'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['default'] != '') {
            $content .= "
                padding-bottom: " . $paddingbottom['default'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['default'] != '') {
            $content .= "
                padding-left: " . $paddingleft['default'] . "rem;
            ";
        }

        $content .= "\n
            }
        ";

        // Tablet.
        $tablet = "
            .btn-default {
        ";
        // Font size.
        if (isset($fontsize['tablet']) && $fontsize['tablet'] != '') {
            $tablet .= "
                font-size: " . $fontsize['tablet'] . "rem;
            ";
        }

        // Padding top.
        if ($paddingtop['tablet'] != '') {
            $tablet .= "
                padding-top: " . $paddingtop['tablet'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['tablet'] != '') {
            $tablet .= "
                padding-right: " . $paddingright['tablet'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['tablet'] != '') {
            $tablet .= "
                padding-bottom: " . $paddingbottom['tablet'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['tablet'] != '') {
            $tablet .= "
                padding-left: " . $paddingleft['tablet'] . "rem;
            ";
        }

        $tablet .= "
            }
        ";

        $content .= $this->wrap_responsive('tablet', $tablet);

        // Mobile.
        $mobile = "
            .btn-default {
        ";
        // Font size.
        if (isset($fontsize['mobile']) && $fontsize['mobile'] != '') {
            $mobile .= "
                font-size: " . $fontsize['mobile'] . "rem;
            ";
        }

        // Padding top.
        if ($paddingtop['mobile'] != '') {
            $mobile .= "
                padding-top: " . $paddingtop['mobile'] . "rem;
            ";
        }

        // Padding right.
        if ($paddingright['mobile'] != '') {
            $mobile .= "
                padding-right: " . $paddingright['mobile'] . "rem;
            ";
        }

        // Padding bottom.
        if ($paddingbottom['mobile'] != '') {
            $mobile .= "
                padding-bottom: " . $paddingbottom['mobile'] . "rem;
            ";
        }

        // Padding left.
        if ($paddingleft['mobile'] != '') {
            $mobile .= "
                padding-left: " . $paddingleft['mobile'] . "rem;
            ";
        }

        $mobile .= "
            }
        ";

        $content .= $this->wrap_responsive('mobile', $mobile);
        return $content;
    }

    /**
     * Process global buttons
     *
     * @param string $css css content
     * @return string processed css conent
     */
    private function process_global_buttons($css) {
        $css .= $this->process_global_buttons_primary();
        $css .= $this->process_global_buttons_secondary();
        $css .= $this->process_global_buttons_default();
        return $css;
    }
}
