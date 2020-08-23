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
 * Edwiser RemUI
 * @package   theme_remui
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_remui;
defined('MOODLE_INTERNAL') || die();

use \Exception;

/**
 * A color utility that helps manipulate HEX colors
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class Color {

    /**
     * Color in Hexadecimal format
     * @var string
     */
    private $_hex;
    /**
     * Color in Hue, Saturaton, Lightness format
     * @var string
     */
    private $_hsl;
    /**
     * Color in Red, Gree, Blue format
     * @var string
     */
    private $_rgb;

    /**
     * Auto darkens/lightens by 10% for sexily-subtle gradients.
     * Set this to false to adjust automatic shade to be between given color
     * and black (for darken) or white (for lighten)
     */
    const DEFAULT_ADJUST = 3;

    /**
     * Instantiates the class with a HEX value
     * @param string $hex
     * @throws Exception "Bad color format"
     */
    public function __construct( $hex ) {
        // Strip # sign is present.
        $color = str_replace("#", "", $hex);

        // Make sure it's 6 digits.
        if ( strlen($color) === 3 ) {
            $color = $color[0].$color[0].$color[1].$color[1].$color[2].$color[2];
        } else if ( strlen($color) != 6 ) {
            throw new Exception("HEX color needs to be 6 or 3 digits long");
        }

        $this->_hsl = self::hex_to_hsl( $color );
        $this->_hex = $color;
        $this->_rgb = self::hex_to_rgb( $color );
    }

    // Public Interface.

    /**
     * Given a HEX string returns a HSL array equivalent.
     * @param string $color
     * @return array HSL associative array
     */
    public static function hex_to_hsl( $color ) {

        // Sanity check.
        $color = self::_check_hex($color);

        // Convert HEX to DEC.
        $r = hexdec($color[0].$color[1]);
        $g = hexdec($color[2].$color[3]);
        $b = hexdec($color[4].$color[5]);

        $hsl = array();

        $varr = ($r / 255);
        $varg = ($g / 255);
        $varb = ($b / 255);

        $varmin = min($varr, $varg, $varb);
        $varmax = max($varr, $varg, $varb);
        $delmax = $varmax - $varmin;

        $l = ($varmax + $varmin) / 2;

        if ($delmax == 0) {
            $h = 0;
            $s = 0;
        } else {
            if ($l < 0.5) {
                $s = $delmax / ($varmax + $varmin);
            } else {
                $s = $delmax / ( 2 - $varmax - $varmin );
            }

            $delr = ((($varmax - $varr) / 6) + ($delmax / 2)) / $delmax;
            $delg = ((($varmax - $varg) / 6) + ($delmax / 2)) / $delmax;
            $delb = ((($varmax - $varb) / 6) + ($delmax / 2)) / $delmax;

            if ($varr == $varmax) {
                $h = $delb - $delg;
            } else if ($varg == $varmax) {
                $h = ( 1 / 3 ) + $delr - $delb;
            } else if ($varb == $varmax) {
                $h = ( 2 / 3 ) + $delg - $delr;
            }

            if ($h < 0) {
                $h++;
            }
            if ($h > 1) {
                $h--;
            }
        }

        $hsl['H'] = ($h * 360);
        $hsl['S'] = $s;
        $hsl['L'] = $l;

        return $hsl;
    }

    /**
     *  Given a HSL associative array returns the equivalent HEX string
     * @param array $hsl
     * @return string HEX string
     * @throws Exception "Bad HSL Array"
     */
    public static function hsl_to_hex($hsl = array()) {
         // Make sure it's HSL.
        if (empty($hsl) || !isset($hsl["H"]) || !isset($hsl["S"]) || !isset($hsl["L"])) {
            throw new Exception("Param was not an HSL array");
        }

        list($h, $s, $l) = array($hsl['H'] / 360, $hsl['S'], $hsl['L']);

        if ($s == 0) {
            $r = $l * 255;
            $g = $l * 255;
            $b = $l * 255;
        } else {
            if ($l < 0.5) {
                $var2 = $l * (1 + $s);
            } else {
                $var2 = ($l + $s) - ($s * $l);
            }

            $var1 = 2 * $l - $var2;

            $r = round(255 * self::_huetorgb($var1, $var2, $h + (1 / 3)));
            $g = round(255 * self::_huetorgb($var1, $var2, $h ));
            $b = round(255 * self::_huetorgb($var1, $var2, $h - (1 / 3)));

        }

        // Convert to hex.
        $r = dechex($r);
        $g = dechex($g);
        $b = dechex($b);

        // Make sure we get 2 digits for decimals.
        $r = (strlen("" . $r) === 1) ? "0" . $r : $r;
        $g = (strlen("" . $g) === 1) ? "0" . $g : $g;
        $b = (strlen("" . $b) === 1) ? "0" . $b : $b;

        return $r.$g.$b;
    }


    /**
     * Given a HEX string returns a RGB array equivalent.
     * @param string $color
     * @return array RGB associative array
     */
    public static function hex_to_rgb($color) {

        // Sanity check.
        $color = self::_check_hex($color);

        // Convert HEX to DEC.
        $r = hexdec($color[0].$color[1]);
        $g = hexdec($color[2].$color[3]);
        $b = hexdec($color[4].$color[5]);

        $rgb['R'] = $r;
        $rgb['G'] = $g;
        $rgb['B'] = $b;

        return $rgb;
    }


    /**
     *  Given an RGB associative array returns the equivalent HEX string
     * @param array $rgb
     * @return string RGB string
     * @throws Exception "Bad RGB Array"
     */
    public static function rgb_to_hex($rgb = array()) {
         // Make sure it's RGB.
        if (empty($rgb) || !isset($rgb["R"]) || !isset($rgb["G"]) || !isset($rgb["B"])) {
            throw new Exception("Param was not an RGB array");
        }

        // Git url. https://github.com/mexitek/phpColors/issues/25#issuecomment-88354815 Git url end.
        // Convert RGB to HEX.
        $hex[0] = str_pad(dechex($rgb['R']), 2, '0', STR_PAD_LEFT);
        $hex[1] = str_pad(dechex($rgb['G']), 2, '0', STR_PAD_LEFT);
        $hex[2] = str_pad(dechex($rgb['B']), 2, '0', STR_PAD_LEFT);

        return implode('', $hex);
    }


    /**
     * Given a HEX value, returns a darker color. If no desired amount provided, then the color halfway between
     * given HEX and black will be returned.
     * @param int $amount
     * @return string Darker HEX value
     */
    public function darken($amount = self::DEFAULT_ADJUST) {
        // Darken.
        $darkerhsl = $this->_darken($this->_hsl, $amount);
        // Return as HEX.
        return self::hsl_to_hex($darkerhsl);
    }

    /**
     * Given a HEX value, returns a lighter color. If no desired amount provided, then the color halfway between
     * given HEX and white will be returned.
     * @param int $amount
     * @return string Lighter HEX value
     */
    public function lighten($amount = self::DEFAULT_ADJUST) {
        // Lighten.
        $lighterhsl = $this->_lighten($this->_hsl, $amount);
        // Return as HEX.
        return self::hsl_to_hex($lighterhsl);
    }

    /**
     * Given a HEX value, returns a mixed color. If no desired amount provided, then the color mixed by this ratio
     * @param string $hex2 Secondary HEX value to mix with
     * @param int $amount = -100..0..+100
     * @return string mixed HEX value
     */
    public function mix($hex2, $amount = 0) {
        $rgb2 = self::hex_to_rgb($hex2);
        $mixed = $this->_mix($this->_rgb, $rgb2, $amount);
        // Return as HEX.
        return self::rgb_to_hex($mixed);
    }

    /**
     * Creates an array with two shades that can be used to make a gradient
     * @param int $amount Optional percentage amount you want your contrast color
     * @return array An array with a 'light' and 'dark' index
     */
    public function make_gradient($amount = self::DEFAULT_ADJUST) {
        // Decide which color needs to be made.
        if ($this->is_light()) {
            $lightcolor = $this->_hex;
            $darkcolor = $this->darken($amount);
        } else {
            $lightcolor = $this->lighten($amount);
            $darkcolor = $this->_hex;
        }

        // Return our gradient array.
        return array( "light" => $lightcolor, "dark" => $darkcolor );
    }


    /**
     * Returns whether or not given color is considered "light"
     * @param string|Boolean $color
     * @param int $lighterthan
     * @return boolean
     */
    public function is_light($color = false, $lighterthan = 130) {
        // Get our color.
        $color = ($color) ? $color : $this->_hex;

        // Calculate straight from rbg.
        $r = hexdec($color[0].$color[1]);
        $g = hexdec($color[2].$color[3]);
        $b = hexdec($color[4].$color[5]);

        return (($r * 299 + $g * 587 + $b * 114) / 1000 > $lighterthan);
    }

    /**
     * Returns whether or not a given color is considered "dark"
     * @param string|Boolean $color
     * @param int $darkerthan
     * @return boolean
     */
    public function is_dark($color = false, $darkerthan = 130) {
        // Get our color.
        $color = ($color) ? $color : $this->_hex;

        // Calculate straight from rbg.
        $r = hexdec($color[0].$color[1]);
        $g = hexdec($color[2].$color[3]);
        $b = hexdec($color[4].$color[5]);

        return (($r * 299 + $g * 587 + $b * 114) / 1000 <= $darkerthan);
    }

    /**
     * Returns the complimentary color
     * @return string Complementary hex color
     *
     */
    public function complementary() {
        // Get our HSL.
        $hsl = $this->_hsl;

        // Adjust Hue 180 degrees.
        $hsl['H'] += ($hsl['H'] > 180) ? -180 : 180;

        // Return the new value in HEX.
        return self::hsl_to_hex($hsl);
    }

    /**
     * Returns your color's HSL array
     */
    public function get_hsl() {
        return $this->_hsl;
    }
    /**
     * Returns your original color
     */
    public function get_hex() {
        return $this->_hex;
    }
    /**
     * Returns your color's RGB array
     */
    public function get_rgb() {
        return $this->_rgb;
    }

    /**
     * Returns the cross browser CSS3 gradient
     * @param int $amount Optional: percentage amount to light/darken the gradient
     * @param boolean $vintagebrowsers Optional: include vendor prefixes for browsers that almost died out already
     * @param string $suffix Optional: suffix for every lines
     * @param string $prefix Optional: prefix for every lines
     * @link  http://caniuse.com/css-gradients Resource for the browser support
     * @return string CSS3 gradient for chrome, safari, firefox, opera and IE10
     */
    public function get_css_gradient($amount = self::DEFAULT_ADJUST, $vintagebrowsers = false, $suffix = "" , $prefix = "") {

        // Get the recommended gradient.
        $g = $this->make_gradient($amount);

        $css = "";
        /* fallback/image non-cover color */
        $css .= "{$prefix}background-color: #".$this->_hex.";{$suffix}";

        /* IE Browsers */
        $css .= "{$prefix}
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#".$g['light']."', endColorstr='#".$g['dark']."');
        {$suffix}";

        /* Safari 4+, Chrome 1-9 */
        if ( $vintagebrowsers ) {
            $css .= "{$prefix}
                background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#".$g['light']."), to(#".$g['dark']."));
            {$suffix}";
        }

        /* Safari 5.1+, Mobile Safari, Chrome 10+ */
        $css .= "{$prefix}background-image: -webkit-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";

        /* Firefox 3.6+ */
        if ( $vintagebrowsers ) {
            $css .= "{$prefix}background-image: -moz-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
        }

        /* Opera 11.10+ */
        if ( $vintagebrowsers ) {
            $css .= "{$prefix}background-image: -o-linear-gradient(top, #".$g['light'].", #".$g['dark'].");{$suffix}";
        }

        /* Unprefixed version (standards): FF 16+, IE10+, Chrome 26+, Safari 7+, Opera 12.1+ */
        $css .= "{$prefix}background-image: linear-gradient(to bottom, #".$g['light'].", #".$g['dark'].");{$suffix}";

        // Return our CSS.
        return $css;
    }

    // Private Functions Below.

    /**
     * Darkens a given HSL array
     * @param array $hsl
     * @param int $amount
     * @return array $hsl
     */
    private function _darken($hsl, $amount = self::DEFAULT_ADJUST) {
        // Check if we were provided a number.
        if ($amount) {
            $hsl['L'] = ($hsl['L'] * 100) - $amount;
            $hsl['L'] = ($hsl['L'] < 0) ? 0 : $hsl['L'] / 100;
        } else {
            // We need to find out how much to darken.
            $hsl['L'] = $hsl['L'] / 2;
        }

        return $hsl;
    }

    /**
     * Lightens a given HSL array
     * @param array $hsl
     * @param int $amount
     * @return array $hsl
     */
    private function _lighten($hsl, $amount = self::DEFAULT_ADJUST) {
        // Check if we were provided a number.
        if ($amount) {
            $hsl['L'] = ($hsl['L'] * 100) + $amount;
            $hsl['L'] = ($hsl['L'] > 100) ? 1 : $hsl['L'] / 100;
        } else {
            // We need to find out how much to lighten.
            $hsl['L'] += (1 - $hsl['L']) / 2;
        }

        return $hsl;
    }

    /**
     * Mix 2 rgb colors and return an rgb color
     * @param array $rgb1
     * @param array $rgb2
     * @param int $amount ranged -100..0..+100
     * @return array $rgb
     *
     *  ported from http://phpxref.pagelines.com/nav.html?includes/class.colors.php.source.html
     */
    private function _mix($rgb1, $rgb2, $amount = 0) {

         $r1 = ($amount + 100) / 100;
         $r2 = 2 - $r1;

         $rmix = (($rgb1['R'] * $r1) + ($rgb2['R'] * $r2)) / 2;
         $gmix = (($rgb1['G'] * $r1) + ($rgb2['G'] * $r2)) / 2;
         $bmix = (($rgb1['B'] * $r1) + ($rgb2['B'] * $r2)) / 2;

         return array('R' => $rmix, 'G' => $gmix, 'B' => $bmix);
    }

    /**
     * Given a Hue, returns corresponding RGB value
     * @param int $v1
     * @param int $v2
     * @param int $vh
     * @return int
     */
    private static function _huetorgb($v1, $v2, $vh) {
        if ($vh < 0) {
            $vh += 1;
        }

        if ($vh > 1) {
            $vh -= 1;
        }

        if ((6 * $vh) < 1) {
               return ($v1 + ($v2 - $v1) * 6 * $vh);
        }

        if ((2 * $vh) < 1) {
            return $v2;
        }

        if ((3 * $vh) < 2) {
            return ($v1 + ($v2 - $v1) * ((2 / 3) - $vh) * 6);
        }

        return $v1;

    }

    /**
     * You need to check if you were given a good hex string
     * @param string $hex
     * @return string Color
     * @throws Exception "Bad color format"
     */
    private static function _check_hex($hex) {
        // Strip # sign is present.
        $color = str_replace("#", "", $hex);

        // Make sure it's 6 digits.
        if (strlen($color) == 3 ) {
            $color = $color[0] . $color[0] . $color[1] . $color[1] . $color[2] . $color[2];
        } else if (strlen($color) != 6) {
            throw new Exception("HEX color needs to be 6 or 3 digits long");
        }

        return $color;
    }

}
