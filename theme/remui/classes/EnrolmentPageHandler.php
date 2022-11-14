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
 * Defines the cache usage
 *
 * @package   theme_remui
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui;

defined('MOODLE_INTERNAL') || die();

class EnrolmentPageHandler {
    public function generate_enrolment_page_context($templatecontext) {
        global $COURSE, $DB, $USER, $PAGE, $CFG;

        // Return if not on enrolment page.
        if ($PAGE->pagetype !== "enrol-index") {
            return $templatecontext;
        }

        // Return if setting is not enabled.
        $enrolconfig = get_config('theme_remui', 'enrolment_page_layout');
        if (!$enrolconfig) {
            return $templatecontext;
        }
        $timezone = \core_date::get_user_timezone($USER);

        $ch = new \theme_remui_coursehandler();

        $cid = (int)$COURSE->id;

        $templatecontext['enrollmentpage'] = true;

        if ($DB->record_exists('course', array('id' => $cid))) {

            $chelper = new \coursecat_helper();
            $coursecontext = \context_course::instance($cid);

            $courserecord = $DB->get_record('course', array('id' => $cid));
            $courseelement = new \core_course_list_element($courserecord);

            $templatecontext['courseid'] = $cid;
            $templatecontext['shortname'] = $courserecord->shortname;
            $templatecontext['coursename'] = $courserecord->fullname;
            $templatecontext['coursesummary'] = $chelper->get_course_formatted_summary($courseelement, array('noclean' => true, 'para' => false));

            $coursemetadata = get_course_metadata($cid);
            if (isset($coursemetadata['edwcourseintrovideourlembedded'])) {
                $templatecontext['courseintrovideo'] = $coursemetadata['edwcourseintrovideourlembedded'];
            }

            // Category Details
            $categoryid = $courserecord->category;
            try {
                $coursecategory = \core_course_category::get($categoryid);
                $categoryname = $coursecategory->get_formatted_name();
                $categoryurl = $CFG->wwwroot . '/course/index.php?categoryid='.$categoryid;
            } catch (Exception $e) {
                $coursecategory = "";
                $categoryname = "";
                $categoryurl = "";
            }

            // Enrollment Data - Pricing Section
            $purchasedetails = $this->get_course_purchase_details($COURSE->id);
            $timemodified = userdate($courserecord->timemodified, get_string('strftimedate', 'langconfig'), $timezone);

            $purchasedetails['subtitletext'] = get_string('lastupdatedon', 'theme_remui') . $timemodified;

            // Fetch only student users - and has capability 'mod/quiz:attempt'
            $enrolledstudents = count_enrolled_users($coursecontext, 'mod/quiz:attempt');
            if ($enrolledstudents !== 0) {
                $strenrol = 'enrolledstudents';
                if ($enrolledstudents == 1 || $enrolledstudents == "1") {
                    $strenrol = 'enrolledstudent';
                }
                $enrolledstudents .= get_string($strenrol, 'theme_remui');
                $purchasedetails['enrolledstudents'] = $enrolledstudents;
            }

            $templatecontext['purchasesection'] = $purchasedetails;

            // Course Duration
            if (isset($coursemetadata['edwcoursedurationinhours'])) {
                $courseduration = $coursemetadata['edwcoursedurationinhours'];
                $hourcourse = 'hourscourse';
                if (is_numeric($courseduration)) {
                    if ($courseduration == 1 || $courseduration == "1") {
                        $hourcourse = 'hourcourse';
                    }
                }
                $courseduration .= get_string($hourcourse, 'theme_remui');
                $templatecontext['purchasesection']['courseduration'] = $courseduration;
            }

            // Course Topic and Course Modules Data
            $sectioncount = 0;
            $totalcms = 0;
            $totalresources = 0;
            $totaldownloadable = 0;
            $totalassignments = 0;
            $totalquizzes = 0;

            $contentdata = [];
            if ($coursecategory !== "") {
                $contentdata['category']['name'] = $categoryname;
                $contentdata['category']['url'] = $categoryurl;
            }

            $contentdata['course']['startdate'] = userdate($courserecord->startdate, get_string('strftimedatefullshort', 'langconfig'), $timezone);

            $modinfo = get_fast_modinfo($COURSE);
            $sections = $modinfo->get_section_info_all();

            // Fetching Course Sections/Topics
            foreach ($sections as $sectionnum => $section) {
                // Display Sections/Topics even if they are hidden and restricted.

                if ($section->__get('uservisible')) {
                    if ($section->__get('availableinfo') || $section->__get('available')) {
                        if ($sectioncount == 0) {
                            $contentdata['sections'][$sectionnum]['sectionactive'] = true;
                        }
                        $contentdata['sections'][$sectionnum]['index'] = $sectioncount;
                        $contentdata['sections'][$sectionnum]['name'] = get_section_name($COURSE->id, $sectionnum);
                        $sectioncount += 1;
                    }
                }
            }
            $totalnotopics = $sectioncount; // Calculating total number of topics.

            // Fetching Course Modules
            $defaultresources = ['book', 'file', 'folder', 'label', 'page', 'url'];
            $cms = $modinfo->get_cms();

            foreach ($cms as $key => $cm) {
                if ($cm->__get('deletioninprogress')) {
                    continue;
                }
                if (isset($contentdata['sections'][$cm->__get('sectionnum')])) {
                    if ($cm->__get('uservisible') || $cm->__get('availableinfo') || $cm->__get('available')) {
                        $activity = [];
                        $activity['name'] = $cm->get_formatted_name();
                        $activity['icon'] = $cm->get_icon_url()->__toString();
                        $contentdata['sections'][$cm->__get('sectionnum')]['activities'][] = $activity;
                        $modname = $cm->__get('modname');

                        // Calculating total number of Resources.
                        if ($cm->__get('customdata') !== "") {
                            $totaldownloadable += 1;
                            $totalresources += 1;
                        }
                        if (in_array($modname, $defaultresources)) {
                            $totalresources += 1;
                        }
                        if ($modname == 'assign') {
                            $totalassignments += 1;
                        }
                        if ($modname == 'quiz') {
                            $totalquizzes += 1;
                        }

                        if (count($contentdata['sections'][$cm->__get('sectionnum')]['activities']) >= 1) {
                            $contentdata['sections'][$cm->__get('sectionnum')]['hasactivity'] = true;
                        }

                        $totalcms += 1; // Calculating total number of activities.
                    }
                }
            }

            $contentdata['sections'] = array_values($contentdata['sections']);

            $totalactivities = $totalcms - $totalresources;

            if ($totalcms !== 0) {
                $templatecontext['totalcms'] = $totalcms;
            }
            if ($totalnotopics !== 0) {
                $templatecontext['totaltopics'] = $totalnotopics;
                $templatecontext['featuresection']['lectures'] = $totalnotopics;
            }
            if ($totalresources !== 0) {
                $templatecontext['totalresources'] = $totalresources;
            }
            if ($totalactivities !== 0) {
                $templatecontext['totalactivities'] = $totalactivities;
            }

            // Purchase Section Data
            if ($totalassignments !== 0) {
                $strdownloadres = $totalassignments . get_string('assignment', 'theme_remui');
                if ($totalassignments != "1" || $totalassignments != 1) {
                    $strdownloadres .= 's';
                }
                $templatecontext['purchasesection']['totalassignments'] = $strdownloadres;
            }

            if ($totaldownloadable !== 0) {
                $strdownloadres = $totaldownloadable . get_string('downloadresource', 'theme_remui');
                if ($totaldownloadable != "1" || $totaldownloadable != 1) {
                    $strdownloadres .= 's';
                }
                $templatecontext['purchasesection']['totaldownloadable'] = $strdownloadres;
            }

            // Feature Section Data
            if ($totalquizzes !== 0) {
                $templatecontext['featuresection']['totalquizzes'] = $totalquizzes;
            }
            if (isset($coursemetadata['edwcoursedurationinhours'])) {
                $templatecontext['featuresection']['courseduration'] = $coursemetadata['edwcoursedurationinhours'];
            }
            // Skill Level
            if (isset($coursemetadata['edwskilllevel'])) {
                $templatecontext['featuresection']['skilllevel'] = get_string('skill' . $coursemetadata['edwskilllevel'], 'theme_remui');
            }

            $language = get_string("en", "theme_remui");
            if ($COURSE->lang != "") {
                $language = $COURSE->lang;
            }
            $templatecontext['featuresection']['language'] = $language;

            if ($COURSE->enablecompletion) {
                $templatecontext['featuresection']['completion'] = true;
            }

            $templatecontext['featuresection']['startdate'] = userdate($courserecord->startdate, get_string('strftimedatemonthabbr', 'langconfig'), $timezone);

            // Main Activities and Its section Data - for main content section.
            $templatecontext['coursemaincontent'] = $contentdata;

            $tags = \core_tag_tag::get_item_tags('core', 'course', $cid);

            if (!empty($tags)) {
                foreach ($tags as $key => $tag) {
                    $tagarr = [];
                    $tagarr['tagname'] = $tag->get_display_name();
                    $tagarr['url'] = $tag->get_view_url(0, 0, 0, 1)->__toString();
                    $templatecontext['tagsection']['tags'][] = $tagarr;
                }
                $templatecontext['tagsection']['hastags'] = true;
            } else {
                $templatecontext['tagsection']['notags'] = get_string('notags', 'theme_remui');
            }
        }

        // Get only teachers from course.
        $teachers = get_enrolled_users($coursecontext, 'mod/folder:managefiles', 0, 'u.id');

        $templatecontext['instructors']['hasinstructors'] = false;
        if (!empty($teachers)) {
            $templatecontext['instructors']['hasinstructors'] = true;
            $firstteacher = true;
            $showmore = false;
            foreach ($teachers as $key => $teacher) {
                $instructors = array();
                if ($firstteacher) {
                    // Load only first teacher.
                    $instructors['data'] = \theme_remui\usercontroller::wdmGetUserDetails($teacher->id);
                    $templatecontext['instructors']['list'][] = $instructors;

                    $templatecontext['courseteacher']['fullname'] = $instructors['data']->fullname;
                    $templatecontext['courseteacher']['rawAvatar'] = $instructors['data']->rawAvatar;
                    $firstteacher = false; // Set flag false for every other teacher.
                } else {
                    // Keep the reference of others.
                    $instructors['instructorid'] = $teacher->id;
                    $templatecontext['instructors']['list'][] = $instructors;

                    $showmore = true; // Enable show more button.
                }
            }

            if ($showmore) {
                $templatecontext['instructors']['showmore'] = true;
            }
        }

        // Get Ratings and Review Context.
        if (is_plugin_available("block_edwiserratingreview")) {
            $rnr = new \block_edwiserratingreview\ReviewManager();
            $templatecontext['rnrshortdesign'] = $rnr->get_short_course_ratingdata($cid);

            $templatecontext['rnrreviewdesign'] = $rnr->generate_enrolpage_block($cid);
        }

        return $templatecontext;
    }

    public function get_course_purchase_details($courseid) {
        global $PAGE;
        // Default data.
        $enroldata = array('courseprice' => '', 'hascost' => 0);
        $buttontext = get_string('enrolnow', 'theme_remui');

        // Return No cost if theme setting does not allow for each course.
        if (isset($PAGE->theme->settings->showcoursepricing) && $PAGE->theme->settings->showcoursepricing == 1) {
            $enroldata = $this->get_payment_details($courseid);
        }
        // Button text will be "Buy & Enrol now", if payment is active. Otherwise only 'Enrol Now'.
        if ($enroldata['hascost'] == 1 && $enroldata['courseprice'] != get_string('course_free', 'theme_remui')) {
            $buttontext = get_string('buyand', 'theme_remui') . $buttontext;
        }

        $contextdata = [];
        if ($enroldata['hascost'] == 1) {
            $contextdata['hascost'] = $enroldata['hascost'];
            $contextdata['courseprice'] = $enroldata['courseprice'];
            $contextdata['currency'] = $enroldata['currency'];
        }
        $contextdata['buttontext'] = $buttontext;

        return $contextdata;
    }

    public function get_payment_details($courseid) {
        global $PAGE;

        $enrolinstances = enrol_get_instances($courseid, true);
        $wdmenrolmentcosts = array();
        $wdmarrayofcosts = array();

        foreach ($enrolinstances as $key => $instance) {
            if (!empty($instance->cost)) {
                $wdmcost = $instance->cost;
                $wdmmethod = $instance->enrol;
                $wdmcurrency = !empty($instance->currency) ? $instance->currency : get_string('currency', 'theme_remui');
                /* @wdmBreak */
                $wdmenrolmentcosts[$wdmcost] = new \stdClass();

                if (strpos($wdmcost, '.')) {
                    $wdmenrolmentcosts[$wdmcost]->cost = number_format($wdmcost, 2, '.', '' );
                } else {
                    $wdmenrolmentcosts[$wdmcost]->cost = $wdmcost;
                }
                $wdmenrolmentcosts[$wdmcost]->currency = $wdmcurrency;
                $wdmenrolmentcosts[$wdmcost]->method = $wdmmethod;
                $wdmarrayofcosts[] = $wdmcost;
            }
        }

        $wdmcoursehascost = 0;
        $wdmcurrencydisplay = '';
        if (!empty($wdmenrolmentcosts)) {
            $wdmcoursehascost = 1;
            $i = 0;
            $wdmcoursepricedisplay = '';
            foreach ($wdmenrolmentcosts as $key => $cost) {
                $i++;
                $thelocale = 'en';
                $thecurrency = !empty($cost->currency) ? $cost->currency : get_string('currency', 'theme_edumy');
                if (class_exists('NumberFormatter')) {
                    /* Extended currency symbol */
                    $formatmagic = new \NumberFormatter($thelocale."@currency=$thecurrency", \NumberFormatter::CURRENCY);
                    $wdmextendedcurrencysymbol = $formatmagic->getSymbol(\NumberFormatter::CURRENCY_SYMBOL);
                    /* Short currency symbol */
                    $formatter = new \NumberFormatter($thelocale, \NumberFormatter::CURRENCY);
                    $formatter->setPattern('¤');
                    $formatter->setAttribute(\NumberFormatter::MAX_SIGNIFICANT_DIGITS, 0);
                    $formattedprice = $formatter->formatCurrency(0, $thecurrency);
                    $zero = $formatter->getSymbol(\NumberFormatter::ZERO_DIGIT_SYMBOL);
                    $wdmcurrencysymbol = str_replace($zero, '', $formattedprice);

                    $wdmenrolmentcosts[$key]->extendedCurrencySymbol = $wdmextendedcurrencysymbol;
                    $wdmenrolmentcosts[$key]->currencySymbol = $wdmextendedcurrencysymbol;

                } else {
                    $wdmenrolmentcosts[$key]->extendedCurrencySymbol = $thecurrency;
                    $wdmenrolmentcosts[$key]->currencySymbol = get_string('currency_symbol', 'theme_remui');
                }
                $wdmstring = '';
                if ($i > 1) {
                    $wdmstring = " / ";
                }
                $wdmcoursepricedisplay .= $wdmstring.$wdmenrolmentcosts[$key]->extendedCurrencySymbol . $wdmenrolmentcosts[$key]->cost;

                $wdmcurrencydisplay .= $wdmstring.$thecurrency;
            }
        } else if (isset($PAGE->theme->settings->enrolment_payment) && ($PAGE->theme->settings->enrolment_payment == 1)) {
            $wdmcoursepricedisplay = get_string('course_free', 'theme_remui');
            $wdmcoursehascost = 1;
        } else {
            $wdmcoursepricedisplay = '';
            $wdmcoursehascost = 0;
        }
        return array('courseprice' => $wdmcoursepricedisplay, 'hascost' => $wdmcoursehascost, 'currency' => $wdmcurrencydisplay);
    }
}
