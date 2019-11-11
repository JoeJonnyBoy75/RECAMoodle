<?php

require_once('../config.php');
if (!is_siteadmin()) {
    die('Not an admin');
}
require_once('../lib/gradelib.php');
require_once('../mod/scorm/lib.php');


function pass_student_scorm_module($user_id, $course_id, $cm_id) {
	global $DB;
	echo "CM: $cm_id\n";
	$cm = $DB->get_record_sql('SELECT cm.instance AS instance FROM mdl_course_modules cm WHERE cm.id = ?', array($cm_id));
	print_r($cm);
	echo "SCOS\n";
	$scos = $DB->get_records_sql('SELECT * FROM mdl_scorm_scoes WHERE scorm = ? ORDER BY sortorder', array($cm->instance));
	print_r($scos);
	echo "SCORM TRACKS\n";
	foreach($scos as $tmpsco) {
		$sco = $tmpsco;
	}
	$tracks = $DB->get_records_sql('SELECT * FROM mdl_scorm_scoes_track WHERE scormid = ? AND userid = ?', array($cm->instance, $user_id));
	print_r($tracks);


	$grading_info = grade_get_grades($course_id, 'mod', 'scorm', $cm_id, array($user_id));
	print_r($grading_info);

	$scorm = $DB->get_record('scorm', array('id' => $cm->instance));

	$DB->execute('REPLACE INTO mdl_scorm_scoes_track (userid, scormid, scoid, attempt, element, value) VALUES (?, ?, ?, 1, "cmi.core.score.raw", "100")', array($user_id, $cm->instance, $sco->id));
	$DB->execute('REPLACE INTO mdl_scorm_scoes_track (userid, scormid, scoid, attempt, element, value) VALUES (?, ?, ?, 1, "cmi.core.score.max", "100")', array($user_id, $cm->instance, $sco->id));
	$DB->execute('REPLACE INTO mdl_scorm_scoes_track (userid, scormid, scoid, attempt, element, value) VALUES (?, ?, ?, 1, "cmi.core.score.min", "0")', array($user_id, $cm->instance, $sco->id));
	$DB->execute('REPLACE INTO mdl_scorm_scoes_track (userid, scormid, scoid, attempt, element, value) VALUES (?, ?, ?, 1, "cmi.core.lesson_status", "passed")', array($user_id, $cm->instance, $sco->id));
	$DB->execute('REPLACE INTO mdl_scorm_scoes_track (userid, scormid, scoid, attempt, element, value) VALUES (?, ?, ?, 1, "cmi.core.exit", "suspend")', array($user_id, $cm->instance, $sco->id));

	//scorm_grade_item_update($scorm);
	scorm_update_grades($scorm, $user_id, false);

return;

	echo "GRADE ITEMS\n";
	$grade_item = $DB->get_record_sql('SELECT id FROM mdl_grade_items WHERE iteminstance = ?', array($cm->instance));
	print_r($grade_item);
	if (!empty($grade_item)) {
		echo "GRADES: " . $grade_item->id . "\n";
		$grades = $DB->get_records_sql('SELECT * FROM mdl_grade_grades WHERE itemid = ? AND userid = ?', array($grade_item->id, $user_id));
		print_r($grades);
		echo 'DELETE FROM mdl_grade_grades WHERE itemid = ? AND userid = ?';
		echo "\n";
		print_r(array($grade_item->id, $user_id));
		$DB->execute('DELETE FROM mdl_grade_grades WHERE itemid = ? AND userid = ?', array($grade_item->id, $user_id));
	}

	// Grade completion for the course
	echo "GRADE ITEM FOR COURSE\n";
	$grade_item_course = $DB->get_record_sql('SELECT id FROM mdl_grade_items WHERE itemtype = \'course\' AND courseid = ?', array($course_id));
	print_r($grade_item_course);
	if (!empty($grade_item_course)) {
		$grades = $DB->get_records_sql('SELECT * FROM mdl_grade_grades WHERE itemid = ? AND userid = ?', array($grade_item_course->id, $user_id));
		echo "GRADES FOR COURSE\n";
		print_r($grades);
		$DB->execute('DELETE FROM mdl_grade_grades WHERE itemid = ? AND userid = ?', array($grade_item_course->id, $user_id));
	}

	echo "DELETE TRACK\n";
	$DB->execute('DELETE FROM mdl_scorm_scoes_track WHERE scormid = ? AND userid = ?', array($cm->instance, $user_id));

	// Delete the course copmletion.
	echo "DELETE COMPLETIONS\n";
	$DB->execute('DELETE FROM mdl_course_completions where course = ? and userid = ?', array($course_id, $user_id));
	
	// Delete the course module completions.
	echo "MODULE COMPLETIONS\n";
	$cmcs = $DB->get_records_sql('SELECT * FROM mdl_course_modules_completion where coursemoduleid = ? and userid = ?', array($cm_id, $user_id));
	print_r($cmcs);
	echo "DELETE MODULE COMPLETIONS\n";
	$DB->execute('DELETE FROM mdl_course_modules_completion where coursemoduleid = ? and userid = ?', array($cm_id, $user_id));
}

function pass_student_scorm_course($user_id, $course_id) {
	/*
	global $DB;
	$cms = $DB->get_records_sql('SELECT cm.* FROM mdl_course_modules cm WHERE cm.course = ?', array($course_id));
	foreach ($cms as $cm) {
		pass_student_scorm_module($user_id, $course_id, $cm->id);
	}

	echo "CERTIFICATES\n";
	$cert = $DB->get_record_sql('SELECT id FROM mdl_certificate WHERE course = ?', array($course_id));
	if (!empty($cert)) {
		print_r($cert);
		echo "DELETE CERTIFICATES\n";
		$DB->execute('DELETE FROM mdl_certificate_issues WHERE certificateid = ? AND userid = ?', array($cert->id, $user_id));
	}

	echo "FEEDBACKS\n";
	$feedback = $DB->get_record_sql('SELECT id FROM mdl_feedback WHERE course = ?', array($course_id));
	if (!empty($feedback)) {
		print_r($feedback);
		echo "DELETE FEEDBACKS\n";
		$DB->execute('DELETE FROM mdl_feedback_completed WHERE feedback = ? AND userid = ?', array($feedback->id, $user_id));
	}
	 */

}

echo '<pre>';
// reset_student_scorm_module(446, 7, 324);
if (!empty($_GET['pass']) && $_GET['pass'] == 'cm') {
    pass_student_scorm_module($_GET['user'], $_GET['course'], $_GET['cm']);
    //header('Location: /custom/user_pass_report.php?id=' . $_GET['user'] . '&course=' . $_GET['course'] . '&mode=outline');
}
else if  (!empty($_GET['pass']) && $_GET['pass'] == 'course') {
    pass_student_scorm_course($_GET['user'], $_GET['course']);
    //header('Location: /custom/user_pass_report.php?id=' . $_GET['user'] . '&course=' . $_GET['course'] . '&mode=outline');
}
	echo "REBUILD COURSE CACHE FOR {$_GET['course']} ?";
	rebuild_course_cache($_GET['course'], false);
	\availability_grade\callbacks::grade_changed($_GET['user']);
	\availability_grade\callbacks::grade_item_changed($_GET['course']);
	rebuild_course_cache($_GET['course'], false);
