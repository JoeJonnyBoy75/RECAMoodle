<?php

require_once('../config.php');
//if (!is_siteadmin()) {
//    die('Not an admin');
//}

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
<h1>Courses Modules with Available Tracking Data</h1>
<table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
	<td>Course ID</td>
	<td>Course Name</td>
	<td>Module ID</td>
	<td>Module Name</td>
	<td>Reports</td>
</tr>
</thead>
<tbody>
<?php foreach ($result as $r) { ?>
<tr>
	<td><?php echo $r->course_id; ?></td>
	<td><?php echo $r->course_name; ?></td>
	<td><?php echo $r->coursemodule_id; ?></td>
	<td><?php echo $r->module_name; ?></td>
	<td>
		<ul>
			<li><a href="report_module_tooquick.php?cm=<?php echo $r->coursemodule_id; ?>&tooquick=600">Module Completion Too Quick</a></li>
			<li><a href="report_module_time.php?cm=<?php echo $r->coursemodule_id; ?>">Overall Time Analysis</a></li>
			<li><a href="report_module_tooquick_quiz.php?cm=<?php echo $r->coursemodule_id; ?>">Activity Completion Too Quick</a></li>
		</ul>
	</td>
</tr>
<?php } ?>
</tbody>
</table>
