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
 * @author Gourav G
 */

namespace block_edwiserratingreview;

defined('MOODLE_INTERNAL') || die();

class ReviewManager {
    private $reviewtable = 'block_edwiserratingreview';

    /**
     * Get Reviews according to filter.
     *
     * @param integer $start Start index
     * @param integer $limit Upto
     * @param string $sort sort by desc to achieve latest reviews.
     * @return array() Array of reviews.
     */
    public function get_reviews_by_filter($start, $length, $order = 'desc', $mindate, $maxdate, $loadpending) {

        global $DB, $CFG;

        $whereclause = "";
        $table = $CFG->prefix . $this->reviewtable;

        // This condition to handle if only pending reviews to show
        if ($loadpending) {
            $whereclause = "WHERE";
            $approval = "approved = 0";
        }

        $datesqlfilter = $this->get_date_sql($mindate, $maxdate);

        // This condition to handle AND and WHERE clause.
        if ($datesqlfilter) {
            $whereclause = "WHERE";
            if (isset($approval)) {
                $datesqlfilter = "AND " . $datesqlfilter;
            }
        }

        $sql = "SELECT * FROM {$table} ${whereclause} ${approval} ${datesqlfilter} ORDER BY date_updated ${order}";

        $reviews = $DB->get_records_sql($sql, null, $start, $length);

        $reviews = $this->get_approval_compatible_data($reviews);

        $sql = "SELECT COUNT(id) FROM {$table} ${whereclause} ${approval} ${datesqlfilter}";

        $count = $DB->get_record_sql($sql);

        // This for loop is to fetch count from db object.
        // Had no option other than looping.
        foreach ($count as $key => $value) {
            $count = $value;
            break;
        }

        return array('data' => $reviews, 'count' => $count);
    }

    public function get_review_details_by_params($arr) {
        // TODO : SQL query to fetch details with given id. Return it.
        global $DB, $CFG;
        $review = $DB->get_record('block_edwiserratingreview', $arr);
        return $review;

    }

    public function get_review_details_by_id($reviewid) {
        // TODO : SQL query to fetch details with given id. Return it.
        global $DB, $CFG;
        $review = $DB->get_record('block_edwiserratingreview', array('id' => $reviewid));
        return $review;

    }
     /*
     * This function generates course name from courseid
     */
    public function get_coursename($courseid) {
        global $DB;
        $data = $DB->get_record('course', array('id' => $courseid), $fields = 'fullname');
        return $data->fullname;
    }
    /*
     * This function generates min-max date sql clause for
     * our get_reviews_by_filter function
     */
    public function get_approval_compatible_data($reviews) {
        global $CFG;
        require_once($CFG->dirroot . "/blocks/edwiserratingreview/lib.php");

        $finaldata = [];

        foreach ($reviews as $key => $review) {

            $user = \core_user::get_user($review->user_id);
            $temp = [];
            $temp["id"] = $review->id;
            $temp["user_id"] = $review->user_id;
            $temp["reviewfor"] = $this->get_coursename($review->for_id);
            $temp["name"] = $user->firstname . " " . $user->lastname;
            $temp["email"] = $user->email;
            $temp["review"] = ($review->review == "") ? "-" : $review->review;
            $temp["ratings"] = review_star_generator($review->star_ratings);
            $temp["date"] = userdate($review->date_updated, get_string('strftimedaydate', 'core_langconfig'));
            $temp["action"] = $this->generate_action_buttons($review->id);

            $finaldata[] = $temp;
        }

        return $finaldata;
    }

    /*
     * This function generates min-max date sql clause for
     * our get_reviews_by_filter function
     */
    public function get_date_sql($mindate, $maxdate) {

        // Return nothing if no date is selected.
        if ($mindate == "" && $maxdate == "") {
            return false;
        };

        // If only one date is selected, find all records from that particular date
        if ($mindate !== "" && $maxdate == "") {
            $maxdate = $mindate;
        }
        // If only one date is selected, find all records from that particular date
        if ($maxdate !== "" && $mindate == "") {
            $mindate = $maxdate;
        }

        if ($mindate != "") {
            $minfilter = strtotime($mindate);
        }

        if ($maxdate != "") {
            $maxfilter = strtotime($maxdate) + 86400; // 86400 to add extra 24hrs.
        }

        return " date_updated BETWEEN ${minfilter} AND ${maxfilter}";
    }

    /*
     * This will return HTML code for action buttons for approval table.
     */
    public function generate_action_buttons($reviewid) {
        global $OUTPUT, $DB;
        // TODO : Encrypt review id
        $review = $DB->get_record('block_edwiserratingreview', array('id' => $reviewid));

        $templatecontext = [
            'approved' => true,
            'deny' => false,
            'reviewid' => $reviewid
        ];

        if ($review->approved == 1) {
            $templatecontext = [
                'approved' => false,
                'deny' => true,
                'reviewid' => $reviewid
            ];
        }
        return $OUTPUT->render_from_template('block_edwiserratingreview/approvalactionbuttons', $templatecontext);
    }

    /*
     * Short course card design for rating and review (rnr)
     */
    public function get_short_course_ratingdata($forid) {
        global $CFG , $DB;
        $context = \context_course::instance($forid);
        $data = $DB->get_record('block_instances', array('blockname' => 'edwiserratingreview', 'parentcontextid' => $context->id));
        if (!$data) {
            return false;
        }
        $dbhandler = new dbhandler();
        $data  = new \stdClass();

        $data->averagerating = $dbhandler->get_averageratingvalue($forid);
        $data->totalcount = $dbhandler->get_recordcount($forid);
        $data->avergeratingstar = review_star_generator($dbhandler->get_averageratingvalue($forid));

        $context = \context_course::instance($forid);

        $html = '';
        $html .= '<div class="d-flex align-items-center justify-content-around rating-short-design" style="color:orange;">';
        $html .= "<div class='d-flex align-items-center'>";
        $html .= "<span class='font-weight-600 font-size-18 mr-1'>$data->averagerating</span>" . $data->avergeratingstar . "</div>";
        $html .= "<span class='font-weight-600 font-size-12 move-to-rnr-block'>{$data->totalcount} Course Ratings</span></div>";

        return $html;
    }

    /*
     * Short course card design for rating and review (rnr)
     */
    public function get_course_cardlayout_ratingdata($forid) {
        global $CFG, $DB;
        $context = \context_course::instance($forid);
        $data = $DB->get_record('block_instances', array('blockname' => 'edwiserratingreview', 'parentcontextid' => $context->id));
        $html = '';
        if ($data) {
            $dbhandler = new dbhandler();
            $data  = new \stdClass();
            $data->averagerating = $dbhandler->get_averageratingvalue($forid);
            $data->totalcount = $dbhandler->get_recordcount($forid);
            $data->avergeratingstar = review_star_generator($dbhandler->get_averageratingvalue($forid));
            $html .= '<div class="d-flex align-items-center justify-content-left rating-short-design" style="color:orange;">';
            $html .= "<div class='d-flex align-items-center'>";
            $html .= "<span class='font-weight-400 font-size-14 mr-1'>$data->averagerating</span>" . $data->avergeratingstar . "</div>";
            $html .= "<a class='rnr-link' href='". $CFG->wwwroot ."/course/view.php?id=".$forid."#reviewarea'>";
            $html .= "<span class='font-weight-400 font-size-14 ml-1'>({$data->totalcount})</span></a></div>";
        }
        return $html;
    }

    /*
     * Delete all the likes and dislikes calculated for given review id.
     */
    public function remove_fame_counts($reviewid) {
        global $DB;
        $table = 'block_ernr_likedlike';
        $DB->delete_records($table, array('reviewid' => $reviewid));
    }

    public function generate_enrolpage_block($courseid) {
        global $DB, $PAGE, $OUTPUT;
        $context = \context_course::instance($courseid);
        $data = $DB->get_record('block_instances', array('blockname' => 'edwiserratingreview', 'parentcontextid' => $context->id));
        if (!$data) {
            return false;
        }
        $dbh = new \block_edwiserratingreview\dbhandler();

        $templatecontext = [
            'ratingprogress' => $dbh->get_progressbar_percentage($courseid),
            'avgratingstat' => $dbh->get_avg_rating_stat_data($courseid),
            'pagelayout' => $PAGE->pagelayout,
        ];

        return $OUTPUT->render_from_template('block_edwiserratingreview/reviewarea',  $templatecontext);

    }

}
