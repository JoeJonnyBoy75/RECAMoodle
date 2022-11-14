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
 * Edwiser RemUI login layout
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$templatecontext = [];
$extraclasses = [];

$customizer = \theme_remui\customizer\customizer::instance();

if (get_config('theme_remui', 'loginpagelayout') !== 'logincenter') {
    $templatecontext['hasdesc'] = true;
    if (get_config('theme_remui', 'brandlogopos') != 0) {
        $templatecontext['logopos'] = true;
        if (get_config('theme_remui', 'brandlogopos') == 1) {
            $templatecontext['logopos'] = false;
        }
        $extraclasses[] = 'header-site-identity-' . $customizer->get_config('logoorsitename');
    }

    $sitetext = get_config('theme_remui', 'brandlogotext');

    if (isset($sitetext) && $sitetext != '') {
        $templatecontext['sitedesc'] = $sitetext;
    }
}
$extraclasses[] = 'logoposenabled';

$templatecontext['sitename'] = format_string($SITE->shortname, true, ['context' => context_course::instance(SITEID), "escape" => false]);
$templatecontext['output'] = $OUTPUT;
$templatecontext['loginlayout'] = get_config('theme_remui', 'loginpagelayout');
$extraclasses[] = 'body' . $templatecontext['loginlayout'];
$templatecontext['bodyattributes'] = $OUTPUT->body_attributes($extraclasses);

echo $OUTPUT->render_from_template('theme_remui/login', $templatecontext);

