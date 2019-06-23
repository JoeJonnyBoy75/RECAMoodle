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

namespace theme_remui\frontpage\sections;
// require_once()
defined('MOODLE_INTERNAL') || die();

use context_system;
use context_course;
use context_coursecat;
use core_course_category;
use core_course\external\course_summary_exporter as cme;
use \theme_remui\utility as utility;

trait courses_data {


    /**
     * Get all details of categories
     * @param  array $categories Array of categories
     * @return array             Array of categories with category details
     */
    private function get_category_details($categories) {
        global $OUTPUT, $CFG, $USER;
        $result = array();

        $activeflag = true;

        foreach ($categories as $key => $category) {
            $rescategories = array();
            if ($activeflag) {
                $rescategories['active'] = true;
                $activeflag = false;
            }
            $category = core_course_category::get($category, MUST_EXIST, true);

            if ( !$category->visible ) {

                $categorycontext = \context_coursecat::instance($category->id);
                if (!has_capability('moodle/category:viewhiddencategories', $categorycontext, $USER->id)) {
                    continue;
                }

                $rescategories['ishidden'] = true;
            }

            $rescategories['categoryid'] = $category->id;
            $rescategories['categoryname'] = $category->name;
            $rescategories['categorydesc'] = substr(strip_tags($category->description), 0, 90);
            $rescategories['categoryurl'] = $CFG->wwwroot. '/course/index.php?category=' . $category->id;
            $count = \theme_remui\utility::get_courses(true, null, $category->id, 0, 0, null, null);
            // $rescategories['coursecount'] = $category->coursecount;
            $rescategories['coursecount'] = $count;

            if ($category->idnumber != '') {
                $rescategories['idnumber'] = $category->idnumber;
            }

            if ($category->parent != "0") {
                $parent = core_course_category::get($category->parent);
                $rescategories['parentname'] = $parent->name;
            }
            // $rescategories['categoryimage'] = $OUTPUT->image_url('placeholder', 'theme')->out();
            $result[] = $rescategories;
        }
        return $result;
    }

    /**
     * Get all courses from selected categories and date filter
     * @param  array  $categories Categories list
     * @param  string $date       Date filter
     * @return array              Array of course
     */
    public function get_courses_from_category($categories, $date) {
        global $OUTPUT, $CFG;

        $courses = array();

        // As going to call same function from course archive page...
        // which need this object to return the data
        $pageobj = new \stdClass;
        $pageobj->courses = -1;

        $obj = new \stdClass;
        $obj->sort = null;
        $obj->search = "";
        $obj->tab = false;
        $obj->page = $pageobj;
        $obj->pagination = false;
        $obj->view = null;
        $obj->isFilterModified = "0";
        // We do not need the extra data for courses like instructor, canedit, etc.
        $obj->limiteddata = true;

        foreach ($categories as $key => $value) {
            \theme_remui\utility::$childCategories = array();
            $result = null;
            $obj->category = $value;
            $result = \theme_remui\utility::get_course_cards_content($obj);
            $courses = array_merge($courses, $result['courses']);
        }

        array_values($courses);

        return $courses;
    }

    /**
     * Get categories list from user settings
     * @param  array $configdata Config data array
     * @return array             Array of categories
     */
    private function get_categories($configdata) {
        global $DB;
        if (!isset($configdata['categories']) || empty($configdata['categories'])) {
            $categories = $DB->get_records_select('course_categories', 'id');
            return array_keys($categories);
        }
        return $configdata['categories'];
    }

    /**
     * Returns the courses form.
     * @param  stdClass &config data object
     * @return stdClass config data
     */
    private function coursesdata($configdata) {
        global $CFG, $OUTPUT, $DB;

        $result = [];
        $categories = $this->get_categories($configdata);

        $date = isset($configdata['date']) ? $configdata['date'] : 'all';

        $type = $configdata['show'];
        switch ($type) {
            case 'courses':
                $configdata['courseviewlink'] = $CFG->wwwroot.'/course/view.php?id=';
                $configdata['courses'] = $this->get_courses_from_category($categories, $date);
                if (empty($configdata['courses'])) {
                    $configdata['coursesplaceholder'] = $OUTPUT->image_url('courses', 'block_myoverview')->out();
                }
                break;

            case 'categories':
                $configdata['categorylist'] = $this->get_category_details($categories);
                break;

            case 'categoryandcourses':
                $configdata['categoryandcourses'] = true;
                if (\theme_remui\toolbox::get_setting('enablenewcoursecards')) {
                    $configdata['latest_card'] = true;
                }
                $configdata['catlist'] = $this->get_category_details($categories);
                break;

            default:
                break;
        }
        $configdata[$type.'view'] = true;

        $configdata['sectionpropertiesoutput'] = str_replace("class=\"", "class=\"" . $type . "-view ", $configdata['sectionpropertiesoutput']);

        return $configdata;
    }
}
