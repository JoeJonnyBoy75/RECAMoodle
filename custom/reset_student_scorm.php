<?php

require_once('../config.php');
if (!is_siteadmin()) {
    die('Not an admin');
}

function reset_student_scorm_module($user_id, $course_id, $cm_id) {
	global $DB;
	$cm = $DB->get_record_sql('SELECT cm.instance AS instance FROM mdl_course_modules cm WHERE cm.id = ?', array($cm_id));
	print_r($cm);
	$scos = $DB->get_records_sql('SELECT * FROM mdl_scorm_scoes WHERE scorm = ?', array($cm->instance));
	print_r($scos);
	$tracks = $DB->get_records_sql('SELECT * FROM mdl_scorm_scoes_track WHERE scormid = ? AND userid = ?', array($cm->instance, $user_id));
	print_r($tracks);
	$grade_item = $DB->get_record_sql('SELECT id FROM mdl_grade_items WHERE iteminstance = ?', array($cm->instance));
	print_r($grade_item);
	$grades = $DB->get_records_sql('SELECT * FROM mdl_grade_grades WHERE itemid = ? AND userid = ?', array($grade_item->id, $user_id));
	print_r($grades);
	$DB->execute('DELETE FROM mdl_grade_grades WHERE itemid = ? AND userid = ?', array($grade_item->id, $user_id));
	$DB->execute('DELETE FROM mdl_scorm_scoes_track WHERE scormid = ? AND userid = ?', array($cm->instance, $user_id));

	// Delete the course copmletion.
	$DB->execute('DELETE FROM mdl_course_completions where course = ? and userid = ?', array($course_id, $user_id));
	
	// Delete the course module completions.
	$cmcs = $DB->get_records_sql('SELECT * FROM mdl_course_modules_completion where coursemoduleid = ? and userid = ?', array($cm_id, $user_id));
	//print_r($cmcs);
	$DB->execute('DELETE FROM mdl_course_modules_completion where coursemoduleid = ? and userid = ?', array($cm_id, $user_id));
}

function reset_student_scorm_course($user_id, $course_id) {
	global $DB;
	$cms = $DB->get_records_sql('SELECT cm.* FROM mdl_course_modules cm WHERE cm.course = ?', array($course_id));
	foreach ($cms as $cm) {
		reset_student_scorm_module($user_id, $course_id, $cm->id);
	}
}

echo '<pre>';
// reset_student_scorm_module(446, 7, 324);
if (!empty($_GET['reset']) && $_GET['reset'] == 'cm') {
    reset_student_scorm_module($_GET['user'], $_GET['course'], $_GET['cm']);
    //header('Location: /custom/user_reset_report.php?id=' . $_GET['user'] . '&course=' . $_GET['course'] . '&mode=outline');
}
else if  (!empty($_GET['reset']) && $_GET['reset'] == 'course') {
    reset_student_scorm_course($_GET['user'], $_GET['course']);
    //header('Location: /custom/user_reset_report.php?id=' . $_GET['user'] . '&course=' . $_GET['course'] . '&mode=outline');
}
