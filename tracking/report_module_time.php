<?php

require_once('../config.php');
//if (!is_siteadmin()) {
//    die('Not an admin');
//}

$info = $DB->get_record_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, u.username, u.firstname, u.lastname, u.email, c.fullname AS course_name, sc.name AS module_name
FROM tracking_events te
INNER JOIN mdl_user u ON te.user_id = u.id
INNER JOIN mdl_course c ON te.course_id = c.id
INNER JOIN mdl_course_modules cm ON te.coursemodule_id = cm.id
INNER JOIN mdl_scorm sc ON cm.instance = sc.id
WHERE te.coursemodule_id = ?
LIMIT 1', array($_GET['cm']));

$starts = $DB->get_records_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, u.username, u.firstname, u.lastname, u.email, c.fullname AS course_name, sc.name AS module_name
FROM tracking_events te
INNER JOIN mdl_user u ON te.user_id = u.id
INNER JOIN mdl_course c ON te.course_id = c.id
INNER JOIN mdl_course_modules cm ON te.coursemodule_id = cm.id
INNER JOIN mdl_scorm sc ON cm.instance = sc.id
WHERE -- (te.event = \'start\' OR te.event = \'end\')
-- AND 
te.coursemodule_id = ?
ORDER BY id ASC', array($_GET['cm']));
//print_r($result);

$last_seen_by_user = array();
$last_event_by_user = array();
$module_times = array();
$module_times_extended = array();
foreach ($starts as $st) {
	if ($st->event == "start") {
		// Do we already have a started course?
		if (!empty($last_seen_by_user[$st->user_id])) {
			// Something went wrong.  For now, include the record using the start of the last time.
			$tt = $st->occurred - $last_seen_by_user[$st->user_id]->occurred;
			$module_times[] = $tt / 1000.;
			$module_times_extended[] = array($last_seen_by_user[$st->user_id], $st, $tt / 1000.);
			unset($last_seen_by_user[$st->user_id]);
		}
		$last_seen_by_user[$st->user_id] = $st;
	}
	else if ($st->event == "end") {
		if (empty($last_seen_by_user[$st->user_id])) {
			// Duplicate "end", ignore.
			continue;
		}
		$tt = $st->occurred - $last_seen_by_user[$st->user_id]->occurred;
		$module_times[] = $tt / 1000.;
		$module_times_extended[] = array($last_seen_by_user[$st->user_id], $st, $tt / 1000.);
		unset($last_seen_by_user[$st->user_id]);
	}
        $last_event_by_user[$st->user_id] = $st;
}
// Anyone who didn't have a proper end, let's find the closest last event time and mark from there.
foreach ($last_seen_by_user as $user_id=>$st) {
        $tt = $last_event_by_user[$st->user_id]->occurred - $last_seen_by_user[$st->user_id]->occurred;
        $module_times[] = $tt / 1000.;
        $module_times_extended[] = array($last_seen_by_user[$st->user_id], $st, $tt / 1000.);
}

if (!function_exists('stats_standard_deviation')) {
    /**
     * This user-land implementation follows the implementation quite strictly;
     * it does not attempt to improve the code or algorithm in any way. It will
     * raise a warning if you have fewer than 2 values in your array, just like
     * the extension does (although as an E_USER_WARNING, not E_WARNING).
     * 
     * @param array $a 
     * @param bool $sample [optional] Defaults to false
     * @return float|bool The standard deviation or false on error.
     */
    function stats_standard_deviation(array $a, $sample = false) {
        $n = count($a);
        if ($n === 0) {
            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $n === 1) {
            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($a) / $n;
        $carry = 0.0;
        foreach ($a as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$n;
        }
        return sqrt($carry / $n);
    }
}

$mean = array_sum($module_times) / count($module_times);
$stdev = stats_standard_deviation($module_times);

$min = min($module_times);
$max = max($module_times);
$too_low = max(0, $mean - ($stdev * 2));
$too_high = $mean + ($stdev * 2);

$ranges = array();
$mid = $mean;
while ($mid > $min) {
	array_unshift($ranges, array(max(0, $mid - $stdev), $mid));
	$mid = $mid - $stdev;
} 
$mid = $mean;
while ($mid < $max) {
	$ranges[] = array($mid, $mid + $stdev);
	$mid = $mid + $stdev;
} 

$buckets = array();
for ($i=0; $i < count($ranges); $i++) {
	$buckets[] = 0;
}
for ($i=0; $i < count($ranges); $i++) {
	foreach ($module_times as $mt) {
		if ($mt >= $ranges[$i][0] && $mt <= $ranges[$i][1]) {
			$buckets[$i]++;
		}
	}
}

$range_labels = array();
$bg_colors = array();
$bg_borders = array();
foreach ($ranges as $r) {
	$range_labels[] = round($r[0]) . ' - ' . round($r[1]);
	$bg_colors[] = 'rgba(54, 162, 235, 0.2)';
	$bg_borders[] = 'rgba(54, 162, 235, 1)';
}
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
	<h1>Time Taken To Complete Module, Outliers</h1>
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
				<th>Mean</th>
				<td><?php echo round($mean); ?> seconds</td>
			</tr>
			<tr>
				<th>Min</th>
				<td><?php echo round($min); ?> seconds</td>
			</tr>
			<tr>
				<th>Max</th>
				<td><?php echo round($max); ?> seconds</td>
			</tr>
			<tr>
				<th>Standard Deviation</th>
				<td><?php echo round($stdev); ?> seconds</td>
			</tr>
		</tbody>
	</table>
	<div style="width: 800px; height: 300px;">
		<canvas id="c"></canvas>
	</div>

	<h2>Outlier Details</h2>
	<table class="table table-striped table-bordered table-hover">
		<thead class="thead-dark">
			<tr>
				<td>User ID</td>
				<td>Username</td>
				<td>Occurred</td>
				<td>Time Taken</td>
			</tr>
		</thead>	
		<tbody>
			<?php 
			foreach ($module_times_extended as $mte) {
				if ($mte[2] <= $too_low	|| $mte[2] >= $too_high) {
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
    type: 'bar',
    data: {
        labels: <?php echo json_encode($range_labels); ?>,
        datasets: [{
            label: 'Number of Instances',
            data: <?php echo json_encode($buckets); ?>,
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
