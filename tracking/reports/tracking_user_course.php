<?php

require_once('../../config.php');
if (!is_siteadmin()) {
    die('Not an admin');
}

$short_form = false;
if (!empty($_GET['short'])) {
    $short_form = true;
}

$epoch_from = 1548979200000;
$epoch_to = $epoch_from + (86400000 * 60);

$session_info = $DB->get_record_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, u.username, u.firstname, u.lastname, u.email, c.fullname AS course_name, sc.name AS module_name
FROM tracking_events te
INNER JOIN mdl_user u ON te.user_id = u.id
INNER JOIN mdl_course c ON te.course_id = c.id
INNER JOIN mdl_course_modules cm ON te.coursemodule_id = cm.id
INNER JOIN mdl_scorm sc ON cm.instance = sc.id
WHERE te.user_id = ? AND te.coursemodule_id = ?
LIMIT 1', array($_GET['user'], $_GET['cm']));

$result = $DB->get_records_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, te.raw_json
FROM tracking_events te
WHERE te.user_id = ? AND te.coursemodule_id = ? AND te.occurred BETWEEN ? AND ?
ORDER BY occurred ASC', array($_GET['user'], $_GET['cm'], $epoch_from, $epoch_to));

function abbr($s, $n=100) {
    if (strlen($s) > $n) {
        return preg_replace('/\s+?(\S+)?$/', '', substr($s, 0, $n)) . '...';
    }
    return $s;
}

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
<h1>All User/Coursemodule Details</h1>
<ul>
	<li>User ID: <?php echo $session_info->user_id; ?></li>
	<li>Username: <?php echo $session_info->username; ?></li>
	<li>Course ID: <?php echo $session_info->course_id; ?></li>
	<li>Course Name: <?php echo $session_info->course_name; ?></li>
	<li>Module ID: <?php echo $session_info->coursemodule_id; ?></li>
	<li>Module Name: <?php echo $session_info->module_name; ?></li>
</ul>
<table class="table table-striped table-bordered table-hover">
<thead class="thead-dark">
<tr>
	<td>Occurred</td>
        <td>Event</td>
        <td>Details</td>
</tr>
</thead>
<tbody>
<?php foreach ($result as $r) { ?>
<tr>
        <td><?php echo date("Y-m-d H:i:s", $r->occurred / 1000); ?></td>
        <td><?php echo $r->event; ?></td>
        <td>
	<?php $act = json_decode($r->raw_json, true); ?>
	<?php if ($r->event == "viewed") { ?>
		<?php print_r($act['what']); ?>
	<?php } ?>
	<?php if ($r->event == "activity") { ?>
		<div>Score (0.0-1.0): <?php echo $act['details']['scorePercent']; ?></div>
		<div>Started: <?php echo date("Y-m-d H:i:s", $act['details']['startTime'] / 1000); ?></div>
		<div>Ended: <?php echo date("Y-m-d H:i:s", $act['details']['endTime'] / 1000); ?></div>
		<div>Runtime: <?php echo ($act['details']['endTime'] - $act['details']['startTime']) / 1000; ?></div>
		<?php if (!$short_form) { ?>
		<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
		<tr>
			<td>ID</td>
			<td>Question</td>
			<td>Student Answer</td>
			<td>(Known) Correct Answer(s)</td>
			<td>Correct?</td>
			<td>Answered At</td>
		</tr>
		</thead>
		<tbody>
			<?php foreach ($act['details']['activities'] as $a) { ?>
			<tr>
				<td><?php echo $a['questionId']; ?></td>
				<td><?php echo abbr($a['question'], 50); ?></td>
				<td>
					<?php 
						// TODO Switch this out for knowing what question type it is.
						if ($a['questionType'] == 'MC') {
							if (!empty($a['answered'])) {
								// MCSA
								// echo $a['answered'];
								 echo abbr($a['answers'][$a['answered']]['answer'], 50);
							}
							else {
								// MCMA
								foreach ($a['answers'] as $answ) {
									if ($answ['selected'] === true || $answ['selected'] === 'true') {
										echo abbr($answ['answer'], 50) . "<br>";
									}
								}
							}
						}
						else {
							echo abbr($a['answers'][0]['attempt'], 50); 
						}
					?>
				</td>
				<td>
					<?php 
					if ($a['questionType'] == 'MC') {
						// echo '<pre>';
						// print_r($a);
						// echo '</pre>';
						if (!empty($a['answered'])) {
							// MCSA
							echo abbr($a['answers'][$a['solution'][0]]['answer'], 50);
						}
						else {
							// MCMA
							foreach ($a['answers'] as $answ) {
								if ($answ['res'] === 'correct') {
									echo abbr($answ['answer'], 50) . "<br>";
								}
							}
						}
					} 
					else { 
						if (is_array($a['answers'][0]['word'])) { 
							echo abbr(implode(',', $a['answers'][0]['word']), 50); 
						} 
						else { 
							echo abbr($a['answers'][0]['word'], 50); 
						} 
					}
					?>
				</td>
				<td><?php echo $a['correct'] ? "Yes" : "No"; ?></td>
				<td><?php echo date("Y-m-d H:i:s", $a['answeredTime'] / 1000); ?></td>

			<?php } ?>
		</tbody>
		</table>
	<?php 
		} 
	}
	?>
	</td>
</tr>
<?php } ?>
</tbody>
