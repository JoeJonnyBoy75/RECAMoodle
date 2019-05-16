<?php

require_once('../../config.php');
require_once('lib_activity.php');
if (!is_siteadmin()) {
    die('Not an admin');
}
$too_quick_seconds = 100;
if (!empty($_GET['tooquick'])) {
	$too_quick_seconds = $_GET['tooquick'];
}

$cm = $_GET['cm'];
$epoch_from = 1551398400000;
$epoch_to = 1554076800000;

$info = $DB->get_record_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, u.username, u.firstname, u.lastname, u.email, c.fullname AS course_name, sc.name AS module_name
FROM tracking_events te
INNER JOIN mdl_user u ON te.user_id = u.id
INNER JOIN mdl_course c ON te.course_id = c.id
INNER JOIN mdl_course_modules cm ON te.coursemodule_id = cm.id
INNER JOIN mdl_scorm sc ON cm.instance = sc.id
WHERE te.coursemodule_id = ?
LIMIT 1', array($_GET['cm']));

$user_rows = $DB->get_records_sql('SELECT DISTINCT te.user_id, u.username, u.firstname, u.lastname
FROM tracking_events te
INNER JOIN mdl_user u ON te.user_id = u.id
WHERE te.coursemodule_id = ?
AND te.occurred BETWEEN ? AND ?
AND te.event = "activity"
ORDER BY u.lastname, u.firstname ASC', array($cm, $epoch_from, $epoch_to));

$users = array();
$total_times = array();
foreach ($user_rows as $user) {
    $tmp_sessions = get_user_session_activities_summaries($cm, $user->user_id, $epoch_from, $epoch_to);
    $tm = 0;
    $top_score = -1;
    $smallest_question_gap = 1000000000;
    foreach ($tmp_sessions as $tmp_session) {
        $tm += ($tmp_session['end'] - $tmp_session['start']);
        if ($top_score < $tmp_session['top_score']) {
            $top_score = $tmp_session['top_score'];
        }
        if (!empty($tmp_session['smallest_question_gap']) && $smallest_question_gap > $tmp_session['smallest_question_gap']) {
            $smallest_question_gap = $tmp_session['smallest_question_gap'];
        }
    }
    $users[] = array('user'=>$user, 'num_entries'=>count($tmp_sessions), 'total_time'=>$tm / 1000., 'top_score'=>$top_score > -1 ? $top_score : '', 'smallest_question_gap'=>$smallest_question_gap < 1000000000 ? $smallest_question_gap / 1000. : '');
    $total_times[] = $tm / 1000.;
}

function cmp_user_times($a, $b) {
    if ($a['total_time'] == $b['total_time']) {
        return 0;
    }
    return $a['total_time'] < $b['total_time'] ? -1 : 1;
}

usort($users, 'cmp_user_times');

$total_time_ranges = stdev_range($total_times, 2, 1.0);
$total_time_ranges_95th = stdev_range($total_times, 2, 0.95);

$bg_colors = array();
$bg_borders = array();
//$data = array($too_quick_count, $total_count - $too_quick_count);
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
<style type="text/css">
.stdev_low td {
    background-color: #ff9999;
}
.stdev_high td {
    background-color: #99ff99;
}
</style>
</head>
<body>
	<h1>Total Activity Time For Users in Course Module</h1>
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
			<tr>
				<th>Stats</th>
				<td><?php print_r($total_time_ranges); ?></td>
			</tr>
			<tr>
				<th>Stats (95th Percentile)</th>
				<td><?php print_r($total_time_ranges_95th); ?></td>
			</tr>
		</tbody>
	</table>
<!--
	<div style="width: 400px; height: 300px;">
		<canvas id="c"></canvas>
	</div>
-->

	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
                                <th>#</th>
				<th>User ID</th>
				<th>Username</th>
				<th>Activity Entries</th>
				<th>Top Score</th>
				<th>Time Taken (Seconds)</th>
				<th>Time Taken (Readable)</th>
				<th>Shortest Time Between Questions</th>
			</tr>
		</thead>	
		<tbody>
			<?php 
                        $c = 0;
			foreach ($users as $user) {
                            $cls = '';
                            if ($user['total_time'] < $total_time_ranges['stdev_low']) {
                                $cls = 'stdev_low';
                            }
                            if ($user['total_time'] > $total_time_ranges['stdev_high']) {
                                $cls = 'stdev_high';
                            }
                        ?>
			<tr class="<?php echo $cls; ?>">
                                <td><?php echo $c; ?></td>
				<td><?php echo $user['user']->user_id; ?></td>
				<td><?php echo $user['user']->username; ?></td>
				<td><?php echo $user['num_entries']; ?></td>
				<td><?php echo $user['top_score']; ?></td>
                                <td><?php echo $user['total_time']; ?></td>
				<td><?php 
$dt = new DateTime();
$dt->add(new DateInterval('PT' . round($user['total_time']) . 'S'));
$interval = $dt->diff(new DateTime());
if ($interval->d > 0) {
    echo $interval->format('%d days, %H:%I:%S');
}
else {
    echo $interval->format('%H:%I:%S');
}
                                ?></td>
				<td><?php echo $user['smallest_question_gap']; ?></td>
			</tr>
			<?php
                            $c += 1;
			}
			?>
		</tbody>
	</table>
		
	<div style="margin: 2em;">&nbsp;</div>
<script>
/*
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
*/
</script>
</body>
</html>
