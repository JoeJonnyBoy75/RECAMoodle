<?php
require_once('../../config.php');
require_once($CFG->dirroot.'/mod/scorm/locallib.php');
require_once($CFG->libdir . '/completionlib.php');

$id = optional_param('cm', '', PARAM_INT);       // Course Module ID, or
$a = optional_param('a', '', PARAM_INT);         // scorm ID

$mode = optional_param('mode', 'normal', PARAM_ALPHA); // navigation mode
$currentorg = optional_param('currentorg', '', PARAM_RAW); // selected organization
$newattempt = optional_param('newattempt', 'off', PARAM_ALPHA); // the user request to start a new attempt.
$displaymode = optional_param('display', '', PARAM_ALPHA);
$strexit = get_string('exitactivity', 'scorm');

$SESSION->scorm = new stdClass();
$SESSION->scorm->scoid = $sco->id;
$SESSION->scorm->scormstatus = 'Not Initialized';
$SESSION->scorm->scormmode = $mode;
$SESSION->scorm->attempt = $attempt;

$exitlink = '"'.$CFG->wwwroot.'/course/view.php?id='.$scorm->course.'"';
$SESSION->scorm->exitme = $exitlink;
/*Grabs data from $SESSION array with the identifier of fromdiscussion*/
$val = $SESSION->fromdiscussion;

echo "document.getElementById('exit-button').outerHTML = '<button id=exit-button onclick=javascript:window.parent.location=\'$val\'>EXIT</button>';";

?>
