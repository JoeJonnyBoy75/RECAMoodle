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
 * Edwiser RemUI
 * @package   theme_remui
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$observers = array(
    array(
        'eventname'   => '\core\event\user_enrolment_created',
        'callback'    => 'theme_remui\controller\EventsController::user_enrollment_event',
    ),
    array(
        'eventname'   => '\core\event\user_enrolment_deleted',
        'callback'    => 'theme_remui\controller\EventsController::user_enrollment_event',
    ),
    array(
        'eventname'   => '\core\event\course_updated',
        'callback'    => 'theme_remui\controller\EventsController::course_updation_event',
    ),
    array(
        'eventname'   => '\core\event\course_updated',
        'callback'    => 'theme_remui\controller\EventsController::course_updation_event',
    ),
    array(
        'eventname'   => '\core\event\role_assigned',
        'callback'    => 'theme_remui\controller\EventsController::course_updation_event',
    ),
    array(
        'eventname'   => '\core\event\role_unassigned',
        'callback'    => 'theme_remui\controller\EventsController::course_updation_event',
    ),
    array(
        'eventname'   => '\core\event\role_capabilities_updated',
        'callback'    => 'theme_remui\controller\EventsController::course_updation_event',
    ),
    array(
        'eventname'   => '\core\event\capability_assigned',
        'callback'    => 'theme_remui\controller\EventsController::course_updation_event',
    ),
    array(
        'eventname'   => '\core\event\capability_unassigned',
        'callback'    => 'theme_remui\controller\EventsController::course_updation_event',
    ),
    array(
        'eventname'   => '\core\event\user_loggedin',
        'callback'    => 'theme_remui\controller\EventsController::user_loggedin_event',
    )
);
