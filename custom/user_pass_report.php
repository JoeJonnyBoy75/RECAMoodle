<?php

require_once '../config.php';
require_once $CFG->dirroot.'/course/lib.php';

if (!is_siteadmin()) {
    die('Not an admin');
}

$courseid = required_param('courseid', PARAM_INT);
$userid   = required_param('userid', PARAM_INT);

$user = $DB->get_record('user', array('id'=>$userid, 'deleted'=>0), '*', MUST_EXIST);
$course = $DB->get_record('course', array('id'=>$courseid), '*', MUST_EXIST);

$coursecontext   = context_course::instance($course->id);

require_login();
//$personalcontext = context_user::instance($USER->id);
$PAGE->set_context($coursecontext);
$PAGE->set_pagelayout('report');
$PAGE->set_url('/custom/user_pass_report2.php', array('id'=>$userid, 'course'=>$courseid));
//$PAGE->navigation->extend_for_user($user);
//$PAGE->navigation->set_userid_for_parent_checks($user->id); // see MDL-25805 for reasons and for full commit reference for reversal when fixed.
//$PAGE->set_title("$course->shortname: $stractivityreport");
$PAGE->set_title("$course->shortname: User Pass Override");


echo $OUTPUT->header();
echo '<h1>SCORM Force-Pass For Modules</h1>';

$modinfo = get_fast_modinfo($courseid);
$sections = $modinfo->get_sections();

echo '<style type="text/css">th { font-weight: bold; font-size: 16px; } td { padding: 4px; }</style>';
echo '<table>';
echo '<thead><tr><th>Title</th><th>Grade</th><th> </th></tr></thead>';
foreach ($modinfo->get_section_info_all() as $sectionidx=>$sectioninfo) {
	$scormcms = array();
	foreach ($sections[$sectionidx] as $cmid) {
		$cm = $modinfo->get_cm($cmid);
		if ($cm->modname == "scorm") {
			$scormcms[] = $cmid;
		}
	}
	echo '<tr><td><strong>' . $sectioninfo->name . '</strong></td><td>&nbsp;</td>';
	echo '<td>';
	if (count($scormcms) > 0) {
		echo ' <a target="_blank" href="set_grade_student_scorm.php?pass=section&user=' . $userid . '&course=' . $courseid . '&cms=' . implode(',', $scormcms) . '">Pass User In Section</a>';
	}
	echo '</td></tr>';
	echo "\n";
	foreach ($sections[$sectionidx] as $cmid) {
		$cm = $modinfo->get_cm($cmid);
		echo '<tr><td>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $cmid;
		echo " " . $cm->name;
		echo '</td>';
		echo '<td>';
		if ($cm->modname == "scorm") {
			$grading_info = grade_get_grades($courseid, 'mod', 'scorm', $cm->instance, array($userid));
			//print_r($grading_info);
			echo $grading_info->items[0]->grades[$userid]->grade;
		}
		echo '</td>';
		echo '<td>';
		if ($cm->modname == "scorm") {
			echo ' <a target="_blank" href="set_grade_student_scorm.php?pass=cm&user=' . $userid . '&course=' . $courseid . '&cm=' . $cm->id . '">Pass User</a>';
		}
		echo "\n";
		echo '</td></tr>';
	}
}
echo '</table>';

//print_r($modinfo);
echo $OUTPUT->footer();
