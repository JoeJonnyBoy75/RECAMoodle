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
 * Get courses Service
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui\external;

defined('MOODLE_INTERNAL') || die;

use external_function_parameters;
use external_value;
use context_system;

/**
 * Get courses service trait
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
trait get_tags {
    /**
     * Describes the parameters for get_tags
     * @return external_function_parameters
     */
    public static function get_tags_parameters() {
        return new external_function_parameters(
            array (
                'data' => new external_value(PARAM_RAW, 'Courses Params in json.')
            )
        );
    }

    /**
     * Save order of sections in array of configuration format
     * @param  string $data Get courses parameters
     * @return boolean     Courses array
     */
    public static function get_tags($data) {
        global $OUTPUT, $CFG, $PAGE;

        if (isloggedin() || isguestuser()) {
            // Validation for context is needed.
            $context = context_system::instance();
            self::validate_context($context);
        }
        $result = [];
        $wdmdata = json_decode($data);
        $alertflag = true;

        $alertmsg = get_string('categoryselectionrequired', 'theme_remui');

        if (isset($wdmdata->category) && $wdmdata->category !== 'all') {
            $categoryid = $wdmdata->category;
            $cat = \core_course_category::get($categoryid);
            $courses = array_keys($cat->get_courses());
            $tagspercourse = \core_tag_tag::get_items_tags('core', 'course', $courses);
            $tagspercourse = array_values($tagspercourse);

            if (!empty($tagspercourse)) {
                $tagexist = [];
                $html = "";
                $html .= '<button class="left-scroll btn btn-sm btn-light px-1 py-3 mr-1 d-none">&#10094;</button>';
                $html .= "<ul class='noliststyle tag_list'>";
                foreach ($tagspercourse as $key => $tagslist) {

                    if (!empty($tagslist)) {
                        $alertflag = false;

                        foreach ($tagslist as $key => $tagobject) {
                            if (in_array($tagobject->__get('id'), $tagexist)) {
                                continue;
                            }
                            $tagname = $tagobject->get_display_name();
                            $tagurl = $tagobject->get_view_url(0, 0, 0, 1)->__toString();

                            $html .= '<li class="list-inline-item badge badge-primary py-1 px-2">';
                            $html .= '<a href="'.$tagurl.'" class=" s20 text-white" title="'.$tagname.'">'.$tagname.'</a>';
                            $html .= '</li>';

                            $tagexist[] = $tagobject->__get('id');
                        }

                    } else {
                        $alertmsg = get_string('notags', 'theme_remui');
                    }
                }
                $html .= '</ul>';
                $html .= '<button class="right-scroll btn btn-sm btn-light px-1 py-3 ml-1 d-none">&#10095;</button>';
            } else {
                $alertmsg = get_string('notags', 'theme_remui');
            }
        }
        if ($wdmdata->category == 'all') {
            $alert  = '<div class="alert alert-info fade in " style="display: none;">';
            $alert .= $alertmsg;
            $alert .= '</div>';
            return $alert;
        }

        if ($alertflag) {
            $alert  = '<div class="alert alert-info fade in ">';
            $alert .= $alertmsg;
            $alert .= '</div>';
            return $alert;
        }

        return($html);
    }

    /**
     * Describes the get_tags return value
     * @return external_value
     */
    public static function get_tags_returns() {
        return new external_value(PARAM_RAW, 'Returns HTMl of Tags Element');
    }
}
