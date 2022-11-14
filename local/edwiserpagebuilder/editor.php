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
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Sudam Chakor
 */

/*
 * File displays the edwiser bridge settings.
 */

require( '../../config.php' );
global $CFG, $PAGE, $USER;
require_once($CFG->dirroot.'/lib/form/filemanager.php');
require_once(dirname(__FILE__).'/lib.php');
$CFG->cachejs = true;

// Require Login.
require_login();
$blockinstance = required_param('bui_edit', PARAM_INT);
require_capability(
    "block/edwiseradvancedblock:cancustomizelive",
    \context_block::instance($blockinstance)
);

// $context = context_system::instance();
$baseurl = $CFG->wwwroot . '/local/edwiserpagebuilder/editor.php';
$PAGE->add_body_classes( array( 'edwiserpagebuilder' ) );
/**
 * End Loading block editor css.
 */

$PAGE->set_pagelayout( 'popup' );
$PAGE->set_context( context_system::instance() );
$PAGE->set_url( '/local/edwiserpagebuilder/editor.php' );
$PAGE->set_title( get_string( 'eb_block_editor_title', 'local_edwiserpagebuilder' ) );
$PAGE->set_cacheable( false );
/**
 * Start Loading block editor Js files.
 */

$PAGE->requires->jquery();
$PAGE->requires->jquery_plugin( 'ui' );
$PAGE->requires->jquery_plugin( 'ui-css' );
$PAGE->requires->css( '/local/edwiserpagebuilder/styles/editor.css' );

$PAGE->requires->js(new moodle_url("/local/edwiserpagebuilder/js/libs/builder/undo.js"));
$PAGE->requires->js( new moodle_url("/local/edwiserpagebuilder/js/libs/builder/inputs.js"));

/**
 * components
 */
$PAGE->requires->js( new moodle_url("/local/edwiserpagebuilder/js/libs/builder/components-common.js"));
$PAGE->requires->js( new moodle_url("/local/edwiserpagebuilder/js/libs/builder/components-bootstrap5.js"));
// $PAGE->requires->js(new moodle_url("/local/edwiserpagebuilder/js/libs/builder/components-widgets.js"));
$PAGE->requires->js( new moodle_url("/local/edwiserpagebuilder/js/libs/builder/components-html.js"));

$PAGE->requires->js( new moodle_url("/local/edwiserpagebuilder/js/libs/autocomplete/jquery.autocomplete.js"));

/**
 * Completed block editor js loading.
 */
$formsavailable = check_plugin_available('local_edwiserform');

$PAGE->requires->js( new moodle_url("/local/edwiserpagebuilder/js/libs/builder/components-edwiser.js" ) );
$PAGE->requires->js_call_amd('local_edwiserpagebuilder/components-edwiser', 'init', array($formsavailable));
$PAGE->requires->js( new moodle_url("/local/edwiserpagebuilder/js/edwiserpagebuilder.js" ));
$PAGE->requires->js_call_amd('local_edwiserpagebuilder/edwiserpagebuilder', 'init');

// if ($formsavailable) {
//     $depndacy["edwiserform"] = true;
//    $PAGE->requires->js( new moodle_url("/local/edwiserpagebuilder/js/edwiserfrompreview.js" ) );
//    $PAGE->requires->js_call_amd('local_edwiserpagebuilder/edwiserfrompreview', 'init');
// }

echo $OUTPUT->header();
echo $OUTPUT->container_start();
require_once('editor-template.php');
echo $OUTPUT->container_end();
echo $OUTPUT->footer();
