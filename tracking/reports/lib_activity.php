<?php

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

function stdev_range(array $a, $num_devs=1, $include_percentile=1.0) {
    // Trim the array down in size if we're ignoring certain percentiles.
    if ($include_percentile < 1.0) {
        $len = count($a);
        $exclude_from_each_side = round($len * (1.0 - $include_percentile) / 2);
        $a = array_slice($a, $exclude_from_each_side, $len - (2 * $exclude_from_each_side));
    }

    $mean = array_sum($a) / count($a);
    $stdev = stats_standard_deviation($a);
    return array('mean'=>$mean, 'stdev'=>$stdev, 'min'=>min($a), 'max'=>max($a), 'stdev_low'=>$mean - ($stdev * $num_devs), 'stdev_high'=>$mean + ($stdev * $num_devs));
}

function get_user_session_summaries($cm_id, $user_id, $epoch_from, $epoch_to) {
    global $DB;
    $result = $DB->get_records_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, te.raw_json
    FROM tracking_events te
    WHERE te.user_id = ? AND te.coursemodule_id = ? AND te.occurred BETWEEN ? AND ?
    ORDER BY occurred ASC', array($user_id, $cm_id, $epoch_from, $epoch_to));

    $sessions = array();
    $last_start = -1;
    $last_seen = -1;
    $top_score = -1;
    $activity_attempts = 0;
    foreach ($result as $row) {
        if ($last_start == -1) {
            if ($row->event == 'start') {
                $last_start = $row->occurred;
            }
        }
        if ($last_start != -1) {
            if ($row->event == 'end') {
                $sessions[] = array('start'=>$last_start, 'end'=>$row->occurred, 'num_attempts'=>$activity_attempts, 'top_score'=>$top_score);
                $last_start = -1;
                $top_score = -1;
                $activity_attempts = 0;
            }
        }
        if ($row->event == 'activity') {
            $activity_attempts += 1;
            $act = json_decode($row->raw_json, true);
            if ($act['details']['scorePercent'] > $top_score) {
                $top_score = $act['details']['scorePercent'];
            }
        }
        $last_seen = $row->occurred;
    }

    // Last start never had an equivalent end.
    if ($last_start != -1) {
        $sessions[] = array('start'=>$last_start, 'end'=>$last_seen, 'num_attempts'=>$activity_attempts, 'top_score'=>$top_score);
    }
    return $sessions;
}

function get_user_session_activities_summaries($cm_id, $user_id, $epoch_from, $epoch_to) {
    global $DB;
    $result = $DB->get_records_sql('SELECT te.id, te.occurred, te.event, te.user_id, te.course_id, te.coursemodule_id, te.raw_json
    FROM tracking_events te
    WHERE te.user_id = ? AND te.coursemodule_id = ? AND te.occurred BETWEEN ? AND ?
    AND event = "activity"
    ORDER BY occurred ASC', array($user_id, $cm_id, $epoch_from, $epoch_to));

    $activities = array();
    $last_question_time = -1;
    $smallest_question_gap = 1000000000;
    foreach ($result as $row) {
        $act = json_decode($row->raw_json, true);
        foreach ($act['details']['activities'] as $q) {
            if ($q['answeredTime'] > $last_question_time && $q['answeredTime'] - $last_question_time < $smallest_question_gap) {
                $smallest_question_gap = $q['answeredTime'] - $last_question_time;
            }
            $last_question_time = $q['answeredTime'];
        }
        $activities[] = array('start'=>$act['details']['startTime'], 'end'=>$act['details']['endTime'], 'top_score'=>$act['details']['scorePercent'], 'smallest_question_gap'=>$smallest_question_gap < 1000000000 ? $smallest_question_gap : '');
    }
    return $activities;
}
