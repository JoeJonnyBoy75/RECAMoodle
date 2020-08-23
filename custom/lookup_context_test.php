<?php

define('CLI_SCRIPT', true);

require_once('../config.php');
//if (!is_siteadmin()) {
//    die('Not an admin');
//}

$course_id = 103;
$cm_quizs = $DB->get_records_sql('SELECT cm.* FROM mdl_course_modules cm WHERE cm.course = ? AND module = 16', array($course_id));
print_r($cm_quizs);

foreach($cm_quizs as $cm_quiz) {
	print_r($cm_quiz);
        $approvedcontextlist = new \core_privacy\tests\request\approved_contextlist(
            \core_user::get_user(5),
            'mod_quiz',
            array($cm_quiz->id)
        );
	print_r($approvedcontextlist);

}
