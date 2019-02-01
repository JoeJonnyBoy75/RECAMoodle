<?php

require_once('../config.php');
//if (!is_siteadmin()) {
//    die('Not an admin');
//}

/*
$result = $DB->get_records_sql('SELECT te.*, c.fullname AS course_name, sc.name AS module_name
FROM (
SELECT DISTINCT te.course_id, te.coursemodule_id
FROM tracking_events te 
) AS te
INNER JOIN mdl_course c ON te.course_id = c.id 
INNER JOIN mdl_course_modules cm ON te.coursemodule_id = cm.id 
INNER JOIN mdl_scorm sc ON cm.instance = sc.id
ORDER BY course_name, module_name', array());
//print_r($result);
*/

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>
<h1>Tracking Portal</h1>
<ul>
	<li><a href="courses.php">Course/Module Tracking Overview</a></li>
	<li><a href="tracking_sessions.php">User Sessions, Unfiltered</a></li>
	<li><a href="tracking_log.php">Tracking Log</a></li>
</ul>
</table>
