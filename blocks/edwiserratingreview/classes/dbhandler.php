<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 *
 * @package    block_edwiserratingreview
 * @copyright  2022 WisdmLabs
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace block_edwiserratingreview;

defined('MOODLE_INTERNAL') || die();
require_once($CFG->dirroot . "/blocks/edwiserratingreview/lib.php");

class dbhandler {

    const BLOCK_EDWISERRATINGREVIEW = 'block_edwiserratingreview';

    // const $edwiserratingreview = 'block_edwiserratingreview';
    // This method return number of rows present in the database.
    public function get_recordcount($forid) {
        global $DB;
        $dbqueryresult = $DB->get_record_sql('SELECT count(DISTINCT user_id) as ratingcount FROM {block_edwiserratingreview} WHERE for_id = ? AND approved = ?', ['for_id' => $forid, 'approved' => 1]);
        return $dbqueryresult->ratingcount;
    }

    // This method will return average rating by doing avg operation on star_ratings field in db.
    public function get_averageratingvalue($forid) {
        global $DB, $CFG;

        if ($CFG->dbtype == 'sqlsrv') {
            $averagerating = get_object_vars($DB->get_record_sql("SELECT avg(cast(a.star_ratings as float)) FROM {block_edwiserratingreview} a INNER JOIN (SELECT user_id, Max(id) AS id FROM {block_edwiserratingreview} WHERE for_id = ? AND approved = ? GROUP BY user_id ) b ON a.user_id = b.user_id AND a.id = b.id", ['for_id' => $forid, 'approved' => 1]));
        } else {
            $averagerating = get_object_vars($DB->get_record_sql("SELECT avg(a.star_ratings) FROM {block_edwiserratingreview} a INNER JOIN (SELECT user_id, Max(id) AS id FROM {block_edwiserratingreview} WHERE for_id = ? AND approved = ? GROUP BY user_id ) b ON a.user_id = b.user_id AND a.id = b.id", ['for_id' => $forid, 'approved' => 1]));
        }

        $val = array_values($averagerating);
        if ($val[0] == "NULL") {
            return 0;
        } else {
            return round($val[0], 1);
        }

    }

    // This method give %percentage value by calculating percentage of each rating from 100% in db , it is used in progressbar.
    public function get_progressbar_percentage($forid) {
        global $DB;
        $progress = [];
        $totalcount = $this->get_recordcount($forid);

        for ($i = 5; $i > 0; $i--) {
            $temp = [];
            $percent = $this->get_ratingpercentvalue($i, $forid);
            $temp['progress'] = 0;

            if ($percent != 0) {
                $temp['progress'] = round(($percent / $totalcount) * 100);
            }

            $temp['starsdesign'] = review_star_generator($i);

            $progress[] = $temp;
        }

        return $progress;
    }

    // This method return the percent of rating in database;
    public function get_ratingpercentvalue($rating, $forid) {
        global $DB;
        $reviews = $DB->get_records_sql("SELECT a.*  FROM {block_edwiserratingreview} a INNER JOIN (SELECT DISTINCT user_id, Max(id) AS id FROM {block_edwiserratingreview} WHERE for_id = ? AND approved = ? GROUP BY user_id ) b ON a.user_id = b.user_id AND a.id = b.id", [ 'for_id' => $forid, 'approved' => 1]);
        $count = 0;
        foreach($reviews as $review){
            if($review->star_ratings == $rating && $review->approved ==1){
                $count++;
            }
        }
        return $count;
    }
    public function getuserfullname($userid) {
        global $DB;
        $username = $DB->get_record('user', array ('id' => $userid), $fields = 'firstname,lastname');
        $username  = json_decode(json_encode($username), true);
        return $username['firstname']." ".$username['lastname'];
    }

    // it returns a userobject takes userid as a parameter.
    public function getuserobject($userid) {
        global $DB;
        return $DB->get_record('user', array ('id' => $userid));
    }

    // This method generate all the data required to show in a review, it also return html for like,dislike button and stars.
    public function get_reviews($rating, $startlimit, $lastlimit, $forid) {
        global $DB, $OUTPUT, $USER;
        $formateddata = [];

        $filter = array('approved' => 1);
        if ($forid !== 0) {
            $filter['for_id'] = $forid;
        }

        $fields = 'id, user_id,star_ratings ,review, date_created, for_id';
        if ($rating !== 0) {
            $filter['star_ratings'] = $rating;
        }

        $dbresults = $DB->get_records('block_edwiserratingreview', $filter, '', '*', $startlimit, $lastlimit);

        $i = 0;
        foreach ($dbresults as $dbresult) {
            $formateddata[$i]['id'] = $dbresult->id;
            $formateddata[$i]['username'] = $this->getuserfullname($dbresult->user_id);
            $formateddata[$i]['userid'] = $dbresult->user_id;
            $formateddata[$i]['userprofile'] = $OUTPUT->user_picture($this->getuserobject($dbresult->user_id));
            $formateddata[$i]['date_created'] = userdate($dbresult->date_created, get_string('strftimedaydate', 'core_langconfig'));
            $formateddata[$i]['review'] = $dbresult->review;
            $formateddata[$i]['for_id'] = $dbresult->for_id;
            $formateddata[$i]['starratinghtml'] = review_star_generator($dbresult->star_ratings);
            $formateddata[$i]['famedetails'] = $this->get_fame_details($dbresult->id, $USER->id);

            $i++;
        }

        return $formateddata;
    }

    public function get_fame_details($reviewid, $userid) {
        global $DB;
        $table = 'block_ernr_likedlike';

        $famedetails = [];

        $record = $DB->get_record($table, array('reviewid' => $reviewid, 'user_id' => $userid));

        if ($record) {
            if ($record->liked == 1) {
                $famedetails['liked'] = true;
            }
            if ($record->liked == 0) {
                $famedetails['dliked'] = true;
            }
        }

        $famedetails['likecount'] = $this->get_like_value($reviewid);
        $famedetails['dlikecount'] = $this->get_dislike_value($reviewid);

        return $famedetails;
    }



    public function get_avg_rating_stat_data($courseid) {
        return [
            'ratingcount' => $this->get_recordcount($courseid),
            'averagerating' => $this->get_averageratingvalue($courseid),
            'averageratingstar' => review_star_generator($this->get_averageratingvalue($courseid)),
        ];
    }

    public function get_like_value($reviewid) {
        global $DB;
        $likes = $DB->count_records('block_ernr_likedlike', array('reviewid' => $reviewid, 'liked' => 1));
        return $likes;
    }
    public function get_dislike_value($reviewid) {
        global $DB;
        $dislike = $DB->count_records('block_ernr_likedlike', array('reviewid' => $reviewid, 'liked' => 0));
        return $dislike;
    }

}
