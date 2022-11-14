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
$functions = array(
    'block_edwiserratingreview_store_userfeedback' => array(
        'classname'     => 'block_edwiserratingreview\external\api',
        'methodname'    => 'store_userfeedback',
        'classpath'     => 'blocks/edwiseerratingreview/externallib.php',
        'description'   => 'It will get the data and store it into database',
        'type'          => 'write',
        'ajax'          => true,
    ),
    'block_edwiserratingreview_show_review' => array(
        'classname'     => 'block_edwiserratingreview\external\api',
        'methodname'    => 'show_review',
        'classpath'     => 'blocks/edwiseerratingreview/externallib.php',
        'description'   => 'It will fetch all the data from database',
        'type'          => 'write',
        'ajax'          => true,
    ),

    'block_edwiserratingreview_store_likedislike' => array(
        'classname'     => 'block_edwiserratingreview\external\api',
        'methodname'    => 'storelikedislike',
        'classpath'     => 'blocks/edwiseerratingreview/externallib.php',
        'description'   => 'It will fetch all the data from database for showmorepagereview',
        'type'          => 'read',
        'ajax'          => true,
    ),
    'block_edwiserratingreview_get_reviews' => array(
       'classname'     => 'block_edwiserratingreview\external\api',
       'methodname'    => 'get_reviews',
       'classpath'     => '',
       'description'   => 'This service serves reviews according to provided filters',
       'type'          => 'read',
       'ajax'          => true,
    ),
    'block_edwiserratingreview_add_plugin_to_course' => array(
        'classname'     => 'block_edwiserratingreview\external\api',
        'methodname'    => 'addplugintocourse',
        'classpath'     => 'blocks/edwiseerratingreview/externallib.php',
        'description'   => 'It will add plugin to all the courses.',
        'type'          => 'write',
        'ajax'          => true,
    ),
    'block_edwiserratingreview_updateapprove' => array(
        'classname'     => 'block_edwiserratingreview\external\api',
        'methodname'    => 'updateapprove',
        'classpath'     => 'blocks/edwiseerratingreview/externallib.php',
        'description'   => 'It will update the approve field of database',
        'type'          => 'write',
        'ajax'          => true,
    ),
    'block_edwiserratingreview_getcourselist' => array(
        'classname'     => 'block_edwiserratingreview\external\api',
        'methodname'    => 'get_courselist',
        'classpath'     => 'blocks/edwiseerratingreview/externallib.php',
        'description'   => 'It will give the list of courses for show more review page',
        'type'          => 'write',
        'ajax'          => true,
    ),
    'block_edwiserratingreview_get_review' => array(
        'classname'     => 'block_edwiserratingreview\external\api',
        'methodname'    => 'get_review',
        'classpath'     => '',
        'description'   => 'This service serves review according to user and course',
        'type'          => 'read',
        'ajax'          => true,
    ),
);




