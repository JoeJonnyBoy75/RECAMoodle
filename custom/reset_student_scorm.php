<?php

require_once('../config.php');
if (!is_siteadmin()) {
    die('Not an admin');
}

use mod_quiz\privacy\provider;

function reset_student_scorm_module($user_id, $course_id, $cm_id) {
	global $DB;
	echo "CM: $cm_id\n";
	$cm = $DB->get_record_sql('SELECT cm.instance AS instance FROM mdl_course_modules cm WHERE cm.id = ?', array($cm_id));
	print_r($cm);
	echo "SCOS\n";
	$scos = $DB->get_records_sql('SELECT * FROM mdl_scorm_scoes WHERE scorm = ?', array($cm->instance));
	print_r($scos);
	echo "SCORM TRACKS\n";
	$tracks = $DB->get_records_sql('SELECT * FROM mdl_scorm_scoes_track WHERE scormid = ? AND userid = ?', array($cm->instance, $user_id));
	print_r($tracks);
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

function reset_student_quiz_module($user_id, $cm_id) {
	echo "CM: $cm_id\n";
	echo "ATTEMPTING QUIZ RESET\n";

	// $course_id = 103;
	// $cm_quizs = $DB->get_records_sql('SELECT cm.* FROM mdl_course_modules cm WHERE cm.course = ? AND module = 16', array($course_id));

        $contextmodule = context_module::instance($cm_id);

        $approvedcontextlist = new \core_privacy\local\request\approved_contextlist(
       	    \core_user::get_user($user_id),
            'mod_quiz',
            array($contextmodule->id)
        );
        print_r($approvedcontextlist);

        provider::delete_data_for_user($approvedcontextlist);
}

function reset_student_scorm_course($user_id, $course_id) {
	global $DB;
	$cms = $DB->get_records_sql('SELECT cm.* FROM mdl_course_modules cm WHERE cm.course = ?', array($course_id));
	foreach ($cms as $cm) {
		if ($cm->module == 16) {
			reset_student_quiz_module($user_id, $cm->id);
		}
		reset_student_scorm_module($user_id, $course_id, $cm->id);
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

}

echo '<pre>';
// reset_student_scorm_module(446, 7, 324);
if (!empty($_GET['reset']) && $_GET['reset'] == 'cm') {
    reset_student_quiz_module($_GET['user'], $_GET['cm']);
    reset_student_scorm_module($_GET['user'], $_GET['course'], $_GET['cm']);
    //header('Location: /custom/user_reset_report.php?id=' . $_GET['user'] . '&course=' . $_GET['course'] . '&mode=outline');
}
else if  (!empty($_GET['reset']) && $_GET['reset'] == 'course') {
    reset_student_scorm_course($_GET['user'], $_GET['course']);
    //header('Location: /custom/user_reset_report.php?id=' . $_GET['user'] . '&course=' . $_GET['course'] . '&mode=outline');
}
	echo "REBUILD COURSE CACHE FOR {$_GET['course']} ?";
	rebuild_course_cache($_GET['course'], false);
	\availability_grade\callbacks::grade_changed($_GET['user']);
	\availability_grade\callbacks::grade_item_changed($_GET['course']);
	rebuild_course_cache($_GET['course'], false);
