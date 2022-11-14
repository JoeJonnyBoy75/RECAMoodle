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

require_admin();

$PAGE->set_context(context_system::instance());

$stringmanager = get_string_manager();
$strings = $stringmanager->load_component_strings('local_edwisersiteimporter', 'en');
$PAGE->requires->strings_for_js(array_keys($strings), 'local_edwisersiteimporter');

$site = required_param('site', PARAM_URL);

if (!filter_var($site, FILTER_VALIDATE_URL)) {
    get_string('invalidsite', 'local_edwisersiteimporter', $site);
    die;
}

$PAGE->set_url(new moodle_url('/local/edwisersiteimporter/importer/homepage.php', array('site' => $site)));
$PAGE->set_pagelayout('admin');

function flush_buffer() {
    ob_flush();
    flush();
}

function update_progress($percent) {
    ?>
    <script>
    document.getElementById('import-progress').setAttribute('aria-valuenow', <?php echo $percent; ?>);
    document.getElementById('import-progress').style.width = '<?php echo $percent; ?>%';
    document.getElementById('import-progress').innerText = '<?php echo $percent; ?>%';
    </script>
    <?php
    if ($percent == 100) {
        ?>
        <script>
        document.getElementById('import-progress').parentElement.classList.add('d-none');
        document.getElementById('import-status').classList.remove('d-none');
        </script>
        <?php
    }
    flush_buffer();
}

$label = get_string('homepage', 'local_edwisersiteimporter');

echo $OUTPUT->header();

echo "<div class='text-center'><h2>" . get_string('importing', 'local_edwisersiteimporter', $label) . "</h2></div>";

$content = download_file_content($site . '/local/edwisersiteimporter/exporter/homepage.php');

$configs = unserialize($content);

flush_buffer();
if ($configs != null) {
    set_config('frontpagechooser', 1, 'theme_remui');
    $sm = new \local_remuihomepage\frontpage\section_manager();
    echo "<div class='text-center col-4 mb-25 mx-auto'>
            <div class='progress my-25'>
                <div id='import-progress' class='progress-bar' role='progressbar' style='width: 0%;' aria-valuenow='0'
                aria-valuemin='0' aria-valuemax='100'>0%</div>
            </div>
            <br>";
    echo "<span class='d-none' id='import-status'>" . get_string('complete') . "</span></div>";
    $sm->import_sections($configs['sections'], $configs['settings']);
    update_progress(100);
    echo "<div class='mt-1 text-center'><a class='btn btn-primary' href='" . $CFG->wwwroot . "?redirect=0'>" .
    get_string('viewhomepage', 'local_edwisersiteimporter') . "</a></div>";
} else {
    echo "<div class='text-center'>";
    echo get_string('invaliddata', 'local_edwisersiteimporter');
    echo "<pre>";
    echo $content;
}
echo $OUTPUT->footer();
flush_buffer();
