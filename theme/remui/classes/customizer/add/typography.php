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
 * Theme customizer typography trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\add;

defined('MOODLE_INTERNAL') || die;

trait typography {
    /**
     * Add typography body setting.
     */
    private function add_global_typography_body() {
        global $PAGE;

        // Pass fontselect and fontname setting to js for font validation.
        $PAGE->requires->data_for_js('remuiFontSelect', get_config('theme_remui', 'fontselect'));
        $PAGE->requires->data_for_js('remuiFontName', get_config('theme_remui', 'fontname'));

        $fonts = $this->get_fonts();
        // Font family.
        $label = get_string('font-family', 'theme_remui');
        $this->add_setting(
            'select',
            'global-typography-body-fontfamily',
            $label,
            'typography-body',
            [
                'help' => get_string('body-font-family_desc', 'theme_remui'),
                'default' => 'Standard',
                'options' => $fonts
            ]
        );

        // Font size.
        $label = get_string('font-size', 'theme_remui');
        $this->add_setting(
            'number',
            'global-typography-body-fontsize',
            $label . '(px)',
            'typography-body',
            [
                'help' => get_string('body-font-size_desc', 'theme_remui'),
                'default' => '14',
                "responsive" => true
            ]
        );

        // Font weight.
        $label = get_string('font-weight', 'theme_remui');
        $this->add_setting(
            'select',
            'global-typography-body-fontweight',
            $label,
            'typography-body',
            [
                'help' => get_string('body-fontweight_desc', 'theme_remui'),
                'default' => '400',
                'options' => [
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
            'global-typography-body-text-transform',
            $label,
            'typography-body',
            [
                'help' => get_string('body-text-transform_desc', 'theme_remui'),
                'default' => 'inherit',
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
            'global-typography-body-lineheight',
            $label,
            'typography-body',
            [
                'help' => get_string('body-lineheight_desc', 'theme_remui'),
                'default' => '1.571',
                'options' => [
                    'min' => 1,
                    'max' => 5,
                    'step' => 0.01
                ]
            ]
        );

        // Text color.
        $label = get_string('text-color', 'theme_remui');
        $this->add_setting(
            'color',
            'global-typography-body-textcolor',
            $label,
            'typography-body',
            [
                'help' => get_string('text-color_help', 'theme_remui', get_string('site')),
                'default' => $this->get_common_default_color('text')
            ]
        );

        // Link color.
        $label = get_string('link-color', 'theme_remui');
        $this->add_setting(
            'color',
            'global-typography-body-linkcolor',
            $label,
            'typography-body',
            [
                'help' => get_string('link-color_help', 'theme_remui', get_string('site')),
                'default' => $this->get_common_default_color('link')
            ]
        );

        // Link hover color.
        $label = get_string('link-hover-color', 'theme_remui');
        $this->add_setting(
            'color',
            'global-typography-body-linkhovercolor',
            $label,
            'typography-body',
            [
                'help' => get_string('link-hover-color_help', 'theme_remui', get_string('site')),
                'default' => $this->get_common_default_color('primary')
            ]
        );
    }

    /**
     * Add typography heading settings.
     *
     * @param string $name   Heading name
     * @param string $parent Parent panel name
     * @param array  $config Config for heading
     */
    private function add_global_typography_heading($name, $parent, $config) {

        // Heading.
        $this->add_setting(
            'heading_start',
            $name . '-heading',
            get_string($name . '-heading', 'theme_remui'),
            $parent,
            [
                'collapsed' => $name != 'typography-heading-all'
            ]
        );
        $heading = get_string($name . '-heading', 'theme_remui');

        $fonts = $this->get_fonts(['Inherit' => get_string('inherit', 'theme_remui')]);
        // Font family.
        $label = get_string('font-family', 'theme_remui');
        $this->add_setting(
            'select',
            $name . '-fontfamily',
            $label,
            $parent,
            [
                'help' => get_string('font-family_help', 'theme_remui', $heading),
                'default' => 'Inherit',
                'options' => $fonts
            ]
        );

        if ($name != 'typography-heading-all') {
            // Font size.
            $label = get_string('font-size', 'theme_remui');
            $this->add_setting(
                'number',
                $name . '-fontsize',
                $label . ' (rem)',
                $parent,
                [
                    'help' => get_string('font-size_help', 'theme_remui', $heading),
                    'default' => round($config['font-size'] / 14, 3),
                    'responsive' => true,
                    'options' => [
                        'min' => 0,
                        'step' => 0.01
                    ]
                ]
            );
        }

        // Font weight.
        $label = get_string('font-weight', 'theme_remui');
        $this->add_setting(
            'select',
            $name . '-fontweight',
            $label,
            $parent,
            [
                'help' => get_string('font-weight_help', 'theme_remui', $heading),
                'default' => 'inherit',
                'options' => [
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
            $parent,
            [
                'help' => get_string('text-transform_help', 'theme_remui', $heading),
                'default' => 'inherit',
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
            $parent,
            [
                'help' => get_string('line-height_help', 'theme_remui', $heading),
                'default' => '',
                'options' => [
                    'min' => 1,
                    'max' => 5,
                    'step' => 0.01
                ]
            ]
        );

        if ($name != 'typography-heading-all') {
            // Custom text color.
            $label = get_string('use-custom-color', 'theme_remui');
            $this->add_setting(
                'checkbox',
                $name . '-custom-color',
                $label,
                $parent,
                [
                    'help' => get_string('use-custom-color_help', 'theme_remui', $heading),
                    'default' => '',
                    'value' => 'use'
                ]
            );
        }

        // Text color.
        $label = get_string('text-color', 'theme_remui');
        $this->add_setting(
            'color',
            $name . '-textcolor',
            $label,
            $parent,
            [
                'help' => get_string('text-color_help', 'theme_remui', $heading),
                'default' => '#37474f'
            ]
        );

        // Heading end.
        $this->add_setting(
            'heading_end',
            $name . '-heading-end',
            '',
            $parent
        );
    }

    /**
     * Add global typography settings.
     *
     * @return void
     */
    private function add_global_typography() {
        $this->add_panel('typography', get_string('typography', 'theme_remui'), 'global');

        $this->add_panel('typography-body', get_string('body', 'theme_remui'), 'typography');
        $this->add_global_typography_body();

        $this->add_panel('typography-heading', get_string('heading', 'theme_remui'), 'typography');
        $headings = [
            'all' => [],
            'h1' => ['font-size' => 36],
            'h2' => ['font-size' => 30],
            'h3' => ['font-size' => 24],
            'h4' => ['font-size' => 18],
            'h5' => ['font-size' => 14],
            'h6' => ['font-size' => 12]
        ];
        foreach ($headings as $heading => $config) {
            $this->add_global_typography_heading(
                'typography-heading-' . $heading,
                'typography-heading',
                $config
            );
        }
    }
}
