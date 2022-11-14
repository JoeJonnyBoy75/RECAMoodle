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
namespace block_edwiserratingreview\external;
use external_function_parameters;
use external_single_structure;
use external_multiple_structure;
use external_value;
use stdClass;
trait storelikedislike {
    public static function storelikedislike_parameters() {
        return new external_function_parameters(
            array(
                'reviewid' => new external_value(PARAM_INT, 'reviewid on which user had liked or disliked'),
                'famestatus' => new external_value(PARAM_INT, 'like/dislike value'),
                'uncheck' => new external_value(PARAM_BOOL, 'like/dislike value')
            )
        );
    }
    public static function storelikedislike($reviewid, $famestatus, $uncheck) {
        global $DB, $PAGE, $USER;

        $table = 'block_ernr_likedlike';

        $PAGE->set_context(\context_system::instance());

        $dbdata = new \block_edwiserratingreview\dbhandler();

        if ($uncheck) {
            $record = $DB->delete_records($table, array('reviewid' => $reviewid, 'user_id' => $USER->id));
        } else {
            $record = $DB->record_exists($table, array('reviewid' => $reviewid, 'user_id' => $USER->id));

            if (!$record) {
                $DB->insert_record($table, array('reviewid' => $reviewid, 'user_id' => $USER->id, 'liked' => $famestatus), $returnid = true, $bulk = false);
            } else {
                $likedrecord = $DB->get_record($table, array('reviewid' => $reviewid, 'user_id' => $USER->id));
                $likedrecord->liked = $famestatus;
                $DB->update_record($table, $likedrecord);
            }
        }

        $response = [
            'liked' => $DB->count_records($table, array('reviewid' => $reviewid, 'liked' => 1)),
            'dliked' => $DB->count_records($table, array('reviewid' => $reviewid, 'liked' => 0))
        ];

        return $response;
    }
    public static function storelikedislike_returns() {
        return  new external_function_parameters(
            array(
                'liked' => new external_value(PARAM_INT, 'Review Liked count'),
                'dliked' => new external_value(PARAM_INT, 'Review Disliked count')
            )
        );

    }
}
