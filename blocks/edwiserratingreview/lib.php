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
defined('MOODLE_INTERNAL') || die();

/*
 * It takes rating value and generate a row of 5 stars in which colored
 * stars is equal to rating value.
*/
function review_star_generator($rating) {
    global $OUTPUT;

    $stars = array_fill(0, 5, 'fa fa-star-o');
    for ($i = 0; $i < $rating; $i++) {
        $stars[$i] = 'fa fa-star';
    }
    $final = floor($rating);
    $rating = (float) $rating;

    if ($final !== $rating && $rating < 5) {
        $stars[$final] = 'fa fa-star-half-o';
    }

    $context = ['cardstars' => $stars];
    return $OUTPUT->render_from_template('block_edwiserratingreview/ratingstars', $context);
}

function delete_ernr_block() {
    global $DB;
    $instances = $DB->get_records('block_instances', array('blockname' => 'edwiserratingreview', 'pagetypepattern' => 'my-index'));
    foreach ($instances as $instance) {
        blocks_delete_instance($instance);
    }
}



