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
 * Theme customizer buttons trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\add;

defined('MOODLE_INTERNAL') || die;

trait buttons {
    /**
     * Add global buttons type (primary, secondary, default)
     *
     * @param string $type    Type of button
     * @param array  $options Button options
     * @return void
     */
    private function add_global_buttons_type($type, $options) {
        $name = 'button-' . $type;
        $this->add_panel($name, get_string($type, 'theme_remui'), 'buttons');
        $panel = get_string('buttons', 'theme_remui') . ' ' . get_string($type, 'theme_remui');
        if (isset($options['color'])) {

            // Heading start.
            $label = get_string('color', 'theme_remui');
            $this->add_setting(
                'heading_start',
                $name . '-color',
                $label,
                $name
            );

            // Text color.
            $label = get_string('text-color', 'theme_remui');
            $this->add_setting(
                'color',
                $name . '-color-text',
                $label,
                $name,
                [
                    'help' => get_string('text-color_help', 'theme_remui', $panel),
                    'default' => $options['color']['text']
                ]
            );

            // Text hover color.
            $label = get_string('text-hover-color', 'theme_remui');
            $this->add_setting(
                'color',
                $name . '-color-texthover',
                $label,
                $name,
                [
                    'help' => get_string('text-hover-color_help', 'theme_remui', $panel),
                    'default' => $options['color']['texthover']
                ]
            );

            // Background color.
            $label = get_string('background-color', 'theme_remui');
            $this->add_setting(
                'color',
                $name . '-color-background',
                $label,
                $name,
                [
                    'help' => get_string('background-color_help', 'theme_remui', $panel),
                    'default' => $options['color']['background']
                ]
            );

            // Background hover color.
            $label = get_string('background-hover-color', 'theme_remui');
            $this->add_setting(
                'color',
                $name . '-color-backgroundhover',
                $label,
                $name,
                [
                    'help' => get_string('background-hover-color_help', 'theme_remui', $panel),
                    'default' => $options['color']['backgroundhover']
                ]
            );

            // Heading end.
            $this->add_setting(
                'heading_end',
                $name . '-color-end',
                $label,
                $name
            );
        }

        if (isset($options['border'])) {

            // Heading start.
            $label = get_string('border', 'theme_remui');
            $this->add_setting(
                'heading_start',
                $name . '-border',
                $label,
                $name
            );

            // Border width.
            $label = get_string('border-width', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-border-width',
                $label . '(rem)',
                $name,
                [
                    'help' => get_string('border-width_help', 'theme_remui', $panel),
                    'default' => $options['border']['width'],
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );

            if (isset($options['border']['color'])) {
                // Background color.
                $label = get_string('border-color', 'theme_remui');
                $this->add_setting(
                    'color',
                    $name . '-border-color',
                    $label,
                    $name,
                    [
                        'help' => get_string('border-color_help', 'theme_remui', $panel),
                        'default' => $options['border']['color']
                    ]
                );
            }

            if (isset($options['border']['color'])) {
                // Background hover color.
                $label = get_string('border-hover-color', 'theme_remui');
                $this->add_setting(
                    'color',
                    $name . '-border-hovercolor',
                    $label,
                    $name,
                    [
                        'help' => get_string('border-hover-color_help', 'theme_remui', $panel),
                        'default' => $options['border']['hovercolor']
                    ]
                );
            }

            // Border radius.
            $label = get_string('border-radius', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-border-radius',
                $label . '(rem)',
                $name,
                [
                    'help' => get_string('border-radius_help', 'theme_remui', $panel),
                    'default' => $options['border']['radius'],
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );

            // Heading end.
            $label = get_string('border', 'theme_remui');
            $this->add_setting(
                'heading_end',
                $name . '-border-end',
                $label,
                $name
            );
        }

        if (isset($options['text'])) {
            // Text heading start.
            $label = get_string('text', 'theme_remui');
            $this->add_setting(
                'heading_start',
                $name . '-text',
                $label,
                $name
            );

            // Font family.
            $fonts = $this->get_fonts([
                'default' => get_string('default', 'theme_remui'),
                'Inherit' => get_string('inherit', 'theme_remui')
            ]);
            $label = get_string('font-family', 'theme_remui');
            $this->add_setting(
                'select',
                $name . '-fontfamily',
                $label,
                $name,
                [
                    'help' => get_string('font-family_help', 'theme_remui', $panel),
                    'default' => $options['text']['font-family'],
                    'options' => $fonts
                ]
            );

            // Font size.
            $label = get_string('font-size', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-fontsize',
                $label . ' (rem)',
                $name,
                [
                    'help' => get_string('font-size_help', 'theme_remui', $panel),
                    'default' => $options['text']['font-size'],
                    'responsive' => true,
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );

            // Font weight.
            $label = get_string('font-weight', 'theme_remui');
            $this->add_setting(
                'select',
                $name . '-fontweight',
                $label,
                $name,
                [
                    'help' => get_string('font-weight_help', 'theme_remui', $panel),
                    'default' => $options['text']['font-weight'],
                    'options' => [
                        'default' => get_string('default', 'theme_remui'),
                        'inherit' => get_string('inherit', 'theme_remui'),
                        '100' => get_string('weight-100', 'theme_remui'),
                        '200' => get_string('weight-200', 'theme_remui'),
                        '300' => get_string('weight-300', 'theme_remui'),
                        '400' => get_string('weight-400', 'theme_remui'),
                        '500' => get_string('weight-500', 'theme_remui'),
                        '600' => get_string('weight-600', 'theme_remui'),
                        '700' => get_string('weight-700', 'theme_remui'),
                        '800' => get_string('weight-800', 'theme_remui'),
                        '900' => get_string('weight-900', 'theme_remui')
                    ]
                ]
            );

            // Text transform.
            $label = get_string('text-transform', 'theme_remui');
            $this->add_setting(
                'select',
                $name . '-text-transform',
                $label,
                $name,
                [
                    'help' => get_string('text-transform_help', 'theme_remui', $panel),
                    'default' => $options['text']['text-transform'],
                    'options' => [
                        "inherit" => get_string("inherit", "theme_remui"),
                        "none" => get_string("none", "theme_remui"),
                        "capitalize" => get_string("capitalize", "theme_remui"),
                        "uppercase" => get_string("uppercase", "theme_remui"),
                        "lowercase" => get_string("lowercase", "theme_remui")
                    ]
                ]
            );

            // Line height.
            $label = get_string('line-height', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-lineheight',
                $label,
                $name,
                [
                    'help' => get_string('line-height_help', 'theme_remui', $panel),
                    'default' => $options['text']['line-height'],
                    'options' => [
                        'min' => 1,
                        'max' => 5,
                        'step' => 0.01
                    ]
                ]
            );

            // Letter spacing.
            $label = get_string('letter-spacing', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-letterspacing',
                $label . ' (rem)',
                $name,
                [
                    'help' => get_string('letter-spacing_help', 'theme_remui', $panel),
                    'default' => $options['text']['letter-spacing'],
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );

            // Text heading end.
            $label = get_string('text', 'theme_remui');
            $this->add_setting(
                'heading_end',
                $name . '-text-end',
                $label,
                $name
            );
        }

        if (isset($options['padding'])) {
            // Padding start.
            $label = get_string('padding', 'theme_remui');
            $this->add_setting(
                'heading_start',
                $name . '-padding',
                $label,
                $name
            );

            // Padding top.
            $label = get_string('padding-top', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-padingtop',
                $label . ' (rem)',
                $name,
                [
                    'help' => get_string('padding-top_help', 'theme_remui', $panel),
                    'default' => $options['padding']['top'],
                    'responsive' => true,
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );

            // Padding right.
            $label = get_string('padding-right', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-padingright',
                $label . ' (rem)',
                $name,
                [
                    'help' => get_string('padding-right_help', 'theme_remui', $panel),
                    'default' => $options['padding']['right'],
                    'responsive' => true,
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );

            // Padding bottom.
            $label = get_string('padding-bottom', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-padingbottom',
                $label . ' (rem)',
                $name,
                [
                    'help' => get_string('padding-bottom_help', 'theme_remui', $panel),
                    'default' => $options['padding']['bottom'],
                    'responsive' => true,
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );

            // Padding left.
            $label = get_string('padding-left', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-padingleft',
                $label . ' (rem)',
                $name,
                [
                    'help' => get_string('padding-left_help', 'theme_remui', $panel),
                    'default' => $options['padding']['left'],
                    'responsive' => true,
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );

            // Padding end.
            $label = get_string('padding', 'theme_remui');
            $this->add_setting(
                'heading_end',
                $name . '-padding-end',
                $label,
                $name
            );
        }

    }

    /**
     * Add global buttons
     */
    private function add_global_buttons() {
        $this->add_panel('buttons', get_string('buttons', 'theme_remui'), 'global');
        $text = [
            'font-size' => .9375,
            'font-family' => 'inherit',
            'font-weight' => 'inherit',
            'text-transform' => 'inherit',
            'line-height' => 1.5,
            'letter-spacing' => '0'
        ];
        $padding = [
            'top' => '.375',
            'right' => '.75',
            'bottom' => '.375',
            'left' => '.75',
        ];
        $this->add_global_buttons_type('primary', [
            'border' => [
                'width' => '0.071',
                'radius' => '.215'
            ],
            'text' => $text,
            'padding' => $padding
        ]);
        $this->add_global_buttons_type('secondary', [
            'color' => [
                'text' => '#212529',
                'texthover' => '#212529',
                'background' => '#fff',
                'backgroundhover' => '#fff'
            ],
            'border' => [
                'width' => '0.071',
                'color' => '#e0e0e0',
                'hovercolor' => '#e0e0e0',
                'radius' => '.215'
            ],
            'text' => $text,
            'padding' => $padding
        ]);
        $this->add_global_buttons_type('default', [
            'color' => [
                'text' => $this->get_common_default_color('text'),
                'texthover' => $this->get_common_default_color('text'),
                'background' => '#e9ecef',
                'backgroundhover' => '#f8f9fa'
            ],
            'border' => [
                'width' => '0.071',
                'color' => '#e0e0e0',
                'hovercolor' => '#e0e0e0',
                'radius' => '.215'
            ],
            'text' => $text,
            'padding' => $padding
        ]);
    }
}
