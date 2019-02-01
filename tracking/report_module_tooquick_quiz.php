<?php

require_once('../config.php');
//if (!is_siteadmin()) {
//    die('Not an admin');
//}
$too_quick_seconds = 100;
if (!empty($_GET['tooquick'])) {
	$too_quick_seconds = $_GET['tooquick'];
}

$info = $DB->get_record_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, u.username, u.firstname, u.lastname, u.email, c.fullname AS course_name, sc.name AS module_name
FROM tracking_events te
INNER JOIN mdl_user u ON te.user_id = u.id
INNER JOIN mdl_course c ON te.course_id = c.id
INNER JOIN mdl_course_modules cm ON te.coursemodule_id = cm.id
INNER JOIN mdl_scorm sc ON cm.instance = sc.id
WHERE te.coursemodule_id = ?
LIMIT 1', array($_GET['cm']));

$activities = $DB->get_records_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, te.raw_json, u.username, u.firstname, u.lastname, u.email, c.fullname AS course_name, sc.name AS module_name
FROM tracking_events te
INNER JOIN mdl_user u ON te.user_id = u.id
INNER JOIN mdl_course c ON te.course_id = c.id
INNER JOIN mdl_course_modules cm ON te.coursemodule_id = cm.id
INNER JOIN mdl_scorm sc ON cm.instance = sc.id
WHERE te.event = "activity"
AND te.coursemodule_id = ?
ORDER BY id ASC', array($_GET['cm']));
//print_r($starts);

$activity_times_extended = array();
foreach ($activities as $at) {
	$act = json_decode($at->raw_json, true);
	$activity_times_extended[] = array($at, $act, ($act['details']['endTime'] / 1000) - ($act['details']['startTime'] / 1000));
}

$total_count = count($activity_times_extended);
$too_quick_count = 0;
foreach ($activity_times_extended as $mte) {
	if ($mte[2] <= $too_quick_seconds) {
		$too_quick_count++;
	}
}

$bg_colors = array();
$bg_borders = array();
$data = array($too_quick_count, $total_count - $too_quick_count);
$labels = array("Too Quick", "Everyone Else");
$bg_colors[] = 'rgba(54, 162, 235, 0.2)';
$bg_borders[] = 'rgba(54, 162, 235, 1)';
$bg_colors[] = 'rgba(154, 162, 235, 0.2)';
$bg_borders[] = 'rgba(154, 162, 235, 1)';
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>
</head>
<body>
	<h1>Activity Completion in Under <?php echo $too_quick_seconds; ?> Seconds</h1>
	<table>
		<tbody>
			<tr>
				<th>Course</th>
				<td><?php echo $info->course_name; ?></td>
			</tr>
			<tr>
				<th>Module</th>
				<td><?php echo $info->module_name; ?></td>
			</tr>
		</tbody>
	</table>
	<div style="width: 400px; height: 300px;">
		<canvas id="c"></canvas>
	</div>

	<h2>Quick Finishers</h2>
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<td>User ID</td>
				<td>Username</td>
				<td>Occurred</td>
				<td>Time Taken (Seconds)</td>
			</tr>
		</thead>	
		<tbody>
			<?php 
			foreach ($activity_times_extended as $mte) {
				if ($mte[2] <= $too_quick_seconds) {
			?>
			<tr>
				<td><?php echo $mte[0]->user_id; ?></td>
				<td><?php echo $mte[0]->username; ?></td>
				<td><a href="tracking_session.php?id=<?php echo $mte[0]->id; ?>"><?php echo date("Y-m-d H:i:s", $mte[0]->occurred / 1000); ?></a></td>
				<td><?php echo $mte[2]; ?></td>
			</tr>
			<?php
				}
			}
			?>
		</tbody>
	</table>
		
	<div style="margin: 2em;">&nbsp;</div>
<script>
var ctx = document.getElementById("c").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            data: <?php echo json_encode($data); ?>,
            backgroundColor: <?php echo json_encode($bg_colors); ?>,
            borderColor: <?php echo json_encode($bg_borders); ?>,
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
</body>
</html>
