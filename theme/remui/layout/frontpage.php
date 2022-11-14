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
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
require_once('common.php');


$homepage = false;
$templatecontext['contextid'] = context_system::instance()->id;

if (class_exists('local_remuihomepage_plugin')) {
    $homepage = new local_remuihomepage_plugin();
}

// Enable Turn Editing on Button on Frontpage all the time.
if (isloggedin()) {
    if ($PAGE->user_allowed_editing()) {
        $editing = 'on';
        if ($PAGE->user_is_editing()) {
            $editing = 'off';
            $templatecontext['editingon'] = true;
        }
    }
}

$templatecontext['customhomepage'] = $homepage != false && \theme_remui\toolbox::get_setting('frontpagechooser') == 1;

if ($templatecontext['customhomepage']) {
    $templatecontext['remui_lite'] = true;
    $templatecontext = $homepage->layout($templatecontext);
} else {
    // Frontpage context.
    // Slider.
    $templatecontext['slider'] = \theme_remui\sitehomehandler::get_slider_data();

    // Aboutus data.
    if (1 != \theme_remui\toolbox::get_setting('frontpageblockdisplay')) {
        $templatecontext['aboutus'] = \theme_remui\sitehomehandler::get_aboutus_data();
    }

    // Testimonial section data.
    $templatecontext['testimoniallist'] = \theme_remui\sitehomehandler::get_testimonial_data();

    // Blogs data.
    $hasblogs = false;
    $recentblogs = \theme_remui\sitehomehandler::get_recent_blogs(0, 3);
    if (!empty($CFG->enableblogs) && is_array($recentblogs) && !empty($recentblogs)) {
        $hasblogs = true;
    }
    $templatecontext['blog'] = [
        'hasblogs' => $hasblogs,
        'blogs' => array_values($recentblogs),
    ];
}

// Removing limitedwidth scenario for Homepage.
$templatecontext['bodyattributes'] = str_replace("limitedwidth", "innerfullwidth", $templatecontext['bodyattributes']);

echo $OUTPUT->render_from_template('theme_remui/frontpage', $templatecontext);
