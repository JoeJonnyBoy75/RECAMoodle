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
 * Edwiser Importer plugin
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 */

require_once('../../../config.php');

$systemcontext = context_system::instance();
$PAGE->set_context($systemcontext);

// Getting all sections.
$sections = $DB->get_records('remuihomepage_sections');

// Iterate all section to fix html section url.
foreach ($sections as &$section) {
    if ($section->name == 'html') {
        $fs = get_file_storage();
        $configdata = json_decode($section->configdata);

        // Iterate all html blocks.
        foreach ($configdata->block as &$block) {

            // Get all files of block.
            $files = $fs->get_area_files(
                $systemcontext->id,
                'theme_remui',
                'section_html',
                $block->html->itemid
            );
            $block->html->files = [];

            // Add all file in files array.
            foreach ($files as $file) {
                if ($file->get_filename() != '.') {

                    // Generate file url and decode url.
                    $block->html->files[] = urldecode(moodle_url::make_pluginfile_url(
                        $file->get_contextid(),
                        $file->get_component(),
                        $file->get_filearea(),
                        $file->get_itemid(),
                        $file->get_filepath(),
                        $file->get_filename(),
                        false
                    )->out());
                }
            }
        }
        $section->configdata = json_encode($configdata);
    }
}

$settings = [];

$protocol = stripos($CFG->wwwroot, 'https') !== false ? 'https' : 'http';

// Load all frontpage settings.
$settings['frontpageloader'] = \theme_remui\toolbox::setting_file_url('frontpageloader', 'frontpageloader');
if (!empty($settings['frontpageloader'])) {
    $settings['frontpageloader'] = $protocol . ':' . $settings['frontpageloader'];
}
$settings['frontpagetransparentheader'] = get_config('theme_remui', 'frontpagetransparentheader');
$settings['frontpageheadercolor'] = get_config('theme_remui', 'frontpageheadercolor');
$settings['frontpageappearanimation'] = get_config('theme_remui', 'frontpageappearanimation');
$settings['frontpageappearanimationstyle'] = get_config('theme_remui', 'frontpageappearanimationstyle');
$settings['order'] = get_config('theme_remui', 'sections_order');

echo serialize([
    'settings' => $settings,
    'sections' => $sections
]);
