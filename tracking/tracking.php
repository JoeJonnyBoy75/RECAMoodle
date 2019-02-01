<?php

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Origin: http://127.0.0.1:3111");
header("Access-Control-Allow-Methods: POST, OPTIONS");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

if($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
   header( "HTTP/1.1 200 OK" );
   exit();
}

require_once('../config.php');
$result = $DB->get_record_sql('SELECT * FROM mdl_context WHERE path LIKE concat(\'%\', ?)', array($_GET['pluginfile']));
$cm = $DB->get_record_sql('SELECT * FROM mdl_course_modules WHERE id = ?', array($result->instanceid));
$course = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
require_login($course, true, $cm);

$json_str = file_get_contents('php://input');
$o = json_decode($json_str, true);

$DB->execute('INSERT INTO tracking_events (user_id, course_id, coursemodule_id, event, occurred, raw_json, created) VALUES (?, ?, ?, ?, ?, ?, NOW())', array($USER->id, $course->id, $cm->id, $o['event'], $o['when'], $json_str));
