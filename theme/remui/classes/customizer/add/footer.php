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
 * Theme customizer footer trait
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

namespace theme_remui\customizer\add;

defined('MOODLE_INTERNAL') || die;

trait footer {
    /**
     * Add footer settings
     */
    private function footer_settings() {
        $panel = get_string('footer', 'theme_remui');
        $this->add_panel('footer', $panel, 'root');

        // Basic.
        $this->add_footer_basic_settings();

        // Advance.
        $this->add_footer_advance_settings();

        // Secondary.
        $this->add_footer_secondary_settings();

    }

    /**
     * Add footer basic settings
     *
     * @return void
     */
    private function add_footer_basic_settings() {
        $panel = 'footer-basic';
        $panellabel = get_string('basic', 'theme_remui');
        $this->add_panel($panel, $panellabel, 'footer');

        // Add footer colors settings.
        $this->add_footer_colors_settings($panel);

        // Add footer social settigs.
        $this->add_footer_social_settings($panel);
    }

    /**
     * Add color settings in footer.
     *
     * @param string $panel
     * @return void
     */
    private function add_footer_colors_settings($panel) {

        $footerlabel = get_string('footer', 'theme_remui');
        // Footer color settings.
        $this->add_setting(
            'heading_start',
            'footer-basic-color',
            get_string('colors', 'theme_remui'),
            'footer-basic'
        );

        // Background color.
        $label = get_string('background-color', 'theme_remui');
        $name = 'footer-background-color';
        $this->add_setting(
            'color',
            $name,
            $label,
            $panel,
            [
                'help' => get_string('background-color_help', 'theme_remui', $footerlabel),
                'default' => $this->get_site_primary_color()
            ]
        );

        // Text color.
        $label = get_string('text-color', 'theme_remui');
        $name = 'footer-text-color';
        $this->add_setting(
            'color',
            $name,
            $label,
            $panel,
            [
                'help' => get_string('text-color_help', 'theme_remui', $footerlabel),
                'default' => $this->get_common_default_color('background')
            ]
        );

        // Link color.
        $label = get_string('link-text', 'theme_remui');
        $name = 'footer-link-text';
        $this->add_setting(
            'color',
            $name,
            $label,
            $panel,
            [
                'help' => get_string('link-text_help', 'theme_remui', $footerlabel),
                'default' => $this->get_common_default_color('background')
            ]
        );

        // Link hover color.
        $label = get_string('link-hover-text', 'theme_remui');
        $name = 'footer-link-hover-text';
        $this->add_setting(
            'color',
            $name,
            $label,
            $panel,
            [
                'help' => get_string('link-hover-text_help', 'theme_remui', $footerlabel),
                'default' => $this->get_common_default_color('background')
            ]
        );

        $this->add_setting(
            'heading_end',
            'footer-basic-color',
            '',
            'footer-basic'
        );
    }

    /**
     * Add social link settings in footer
     *
     * @param  String $panel Panel object
     * @return void
     */
    private function add_footer_social_settings($panel) {

        // Footer social settings.
        $this->add_setting(
            'heading_start',
            'footer-basic-social',
            get_string('socialmedia', 'theme_remui'),
            'footer-basic',
            [
                'collapsed' => true
            ]
        );

        $socials = ['facebook', 'twitter', 'linkedin', 'gplus', 'youtube', 'instagram', 'pinterest', 'quora'];

        // Footer social settings.
        foreach ($socials as $social) {
            $label = get_string("{$social}setting", 'theme_remui');
            $name = "{$social}setting";
            $this->add_setting(
                'text',
                $name,
                $label,
                $panel,
                [
                    'help' => get_string("{$social}settingdesc", 'theme_remui')
                ]
            );
        }

        // Footer social settings.
        $this->add_setting(
            'heading_end',
            'footer-basic-social',
            '',
            'footer-basic'
        );
    }

    /**
     * Add footer advance settings
     *
     * @return void
     */
    private function add_footer_advance_settings() {

        $panellabel = get_string('advance', 'theme_remui');
        $panel = 'footer-advance';
        $this->add_panel($panel, $panellabel, 'footer');

        // Footer column type.
        $this->add_setting(
            'range',
            'footercolumn',
            get_string('footercolumn', 'theme_remui'),
            $panel,
            [
                'help' => get_string('footercolumndesc', 'theme_remui'),
                'default' => 4,
                'options' => [
                    'min' => 1,
                    'max' => 4
                ]
            ]
        );

        // Footer column.
        $this->add_setting(
            'text',
            'footercolumnsize',
            get_string('footercolumnsize', 'theme_remui'),
            $panel,
            [
                'help' => get_string('footercolumnsizedesc', 'theme_remui'),
                'withdefault' => false,
                'default' => '25,25,25,25'
            ]
        );

        // Default types for column.
        $defaulttypes = ['customhtml', 'customhtml', 'customhtml', 'social'];

        // Default social link selection.
        $socials = ['facebook', 'twitter', 'linkedin', 'gplus', 'youtube', 'instagram', 'pinterest', 'quora'];

        // Generating select input options for social link selection.
        $socialoptions = [];
        foreach ($socials as $social) {
            $socialoptions[$social] = get_string('footer' . $social, 'theme_remui');
        }

        for ($i = 1; $i <= 4; $i++) {
            // Footer column heading.
            $this->add_setting(
                'heading_start',
                'footer-advance-column' . $i,
                get_string('footercolumn', 'theme_remui') . ' - ' . $i,
                'footer-advance',
                [
                    'collapsed' => true
                ]
            );

            // Footer column type.
            $this->add_setting(
                'select',
                'footercolumn' . $i . 'type',
                get_string('footercolumntype', 'theme_remui'),
                $panel,
                [
                    'help' => get_string('footercolumntypedesc', 'theme_remui'),
                    'options' => [
                        'social' => get_string('footercolumnsocial', 'theme_remui'),
                        'customhtml' => get_string('footercolumncustomhtml', 'theme_remui'),
                        'menu' => get_string('footermenu', 'theme_remui')
                    ],
                    'default' => $defaulttypes[$i - 1]
                ]
            );

            // Footer social links selection.
            $this->add_setting(
                'select',
                'footercolumn' . $i . 'social',
                get_string('footercolumnsocial', 'theme_remui'),
                'footer-advance',
                [
                    'help' => get_string('footercolumnsocialdesc', 'theme_remui'),
                    'options' => $socialoptions,
                    'multiple' => true,
                    'default' => json_encode($socials)
                ]
            );

            // Footer column.
            $this->add_setting(
                'text',
                'footercolumn' . $i . 'title',
                get_string('footercolumntitle', 'theme_remui'),
                $panel,
                [
                    'help' => get_string('footercolumntitledesc', 'theme_remui')
                ]
            );

            // Footer content.
            $this->add_setting(
                'htmleditor',
                'footercolumn' . $i . 'customhtml',
                get_string('footercolumncustomhtml', 'theme_remui'),
                'footer-advance',
                [
                    'options' => [
                        'rows' => 10
                    ],
                    'help' => get_string('footercolumncustomhtmldesc', 'theme_remui')
                ]
            );

            // Footer menu.
            $this->add_setting(
                'menu',
                'footercolumn' . $i . 'menu',
                get_string('footermenu', 'theme_remui'),
                'footer-advance',
                [
                    'default' => '[]',
                    'help' => get_string('footermenudesc', 'theme_remui')
                ]
            );

            // Footer menu orientation.
            $this->add_setting(
                'select',
                'footercolumn' . $i . 'menuorientation',
                get_string('menuorientation', 'theme_remui'),
                'footer-advance',
                [
                    'help' => get_string('menuorientationdesc', 'theme_remui'),
                    'options' => [
                        'vertical' => get_string('menuorientationvertical', 'theme_remui'),
                        'horizontal' => get_string('menuorientationhorizontal', 'theme_remui')
                    ],
                    'default' => 'vertical'
                ]
            );

            // Footer column heading end.
            $this->add_setting(
                'heading_end',
                'footer-advance-column' . $i,
                '',
                'footer-advance'
            );
        }
    }

    /**
     * Add settings for secondary footer.
     *
     * @return void
     */
    private function add_footer_secondary_settings() {
        $panel = 'footer-secondary';
        $panellabel = get_string('secondary', 'theme_remui');
        $this->add_panel($panel, $panellabel, 'footer');

        // Show site logo in the footer.
        $label = get_string('footershowlogo', 'theme_remui');
        $this->add_setting(
            'checkbox',
            'footershowlogo',
            $label,
            $panel,
            [
                'help' => get_string('footershowlogodesc', 'theme_remui'),
                'default' => '',
                'value' => 'show'
            ]
        );

        // Show terms and conditions the footer.
        $label = get_string('footertermsandconditionsshow', 'theme_remui');
        $this->add_setting(
            'checkbox',
            'footertermsandconditionsshow',
            $label,
            $panel,
            [
                'default' => '',
                'value' => 'show'
            ]
        );

        // Terms & Condition.
        $this->add_setting(
            'text',
            'footertermsandconditions',
            get_string('footertermsandconditions', 'theme_remui'),
            $panel,
            [
                'help' => get_string('footertermsandconditionsdesc', 'theme_remui')
            ]
        );

        // Show privacy policy the footer.
        $label = get_string('footerprivacypolicyshow', 'theme_remui');
        $this->add_setting(
            'checkbox',
            'footerprivacypolicyshow',
            $label,
            $panel,
            [
                'default' => '',
                'value' => 'show'
            ]
        );

        // Privacy Policy.
        $this->add_setting(
            'text',
            'footerprivacypolicy',
            get_string('footerprivacypolicy', 'theme_remui'),
            $panel,
            [
                'help' => get_string('footerprivacypolicydesc', 'theme_remui')
            ]
        );

        // Show privacy policy the footer.
        $label = get_string('footercopyrightsshow', 'theme_remui');
        $this->add_setting(
            'checkbox',
            'footercopyrightsshow',
            $label,
            $panel,
            [
                'default' => '',
                'value' => 'show'
            ]
        );

        // Privacy Policy.
        $this->add_setting(
            'textarea',
            'footercopyrights',
            get_string('footercopyrights', 'theme_remui'),
            $panel,
            [
                'help' => get_string('footercopyrightsdesc', 'theme_remui'),
                'default' => '[site] © [year]. All rights reserved.'
            ]
        );
    }
}
