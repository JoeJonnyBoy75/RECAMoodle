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
 * @copyright (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui;
defined('MOODLE_INTERNAL') || die();

use theme_remui\toolbox as toolbox;

class sitehomehandler {
    /**
     * This function is used to get the data for testimonials in about us section.
     *
     * @return array of testimonial data
     */
    public static function get_testimonial_data() {
        global $PAGE, $OUTPUT;

        // Return if acout us is disabled.
        if (!toolbox::get_setting('enablefrontpageaboutus')) {
            return false;
        }

        $testimonialdata = array(
            'both' => false,
            'about' => false,
            'test' => false
        );
        $testimonialcount = toolbox::get_setting('testimonialcount');

        if ($testimonialcount >= 1) {
            $testimonialdata['test'] = true;

            for ($count = 1; $count <= $testimonialcount; $count++) {
                $testimonialimageurl = toolbox::setting_file_url('testimonialimage'.$count, 'testimonialimage'.$count);

                $testimonialname = toolbox::get_setting('testimonialname'.$count);
                $testimonialdesignation = toolbox::get_setting('testimonialdesignation'.$count);
                $testimonialtext = toolbox::get_setting('testimonialtext'.$count);
                if ($count == 1) {
                    $active = true;
                } else {
                    $active = false;
                }
                $testimonialdata['testimonials'][] = array(
                'image' => @$testimonialimageurl,
                'name' => $testimonialname,
                'designation' => $testimonialdesignation,
                'text' => $testimonialtext,
                'active' => $active,
                'count' => $count - 1);
            }
        }

        // About us data.
        $testimonialdata['aboutus_heading'] = toolbox::get_setting('frontpageaboutusheading');
        $testimonialdata['aboutus_desc'] = toolbox::get_setting('frontpageaboutustext');

        if (!empty($testimonialdata['aboutus_heading']) || !empty($testimonialdata['aboutus_desc'])) {
            $testimonialdata['about'] = true;
        }
        if ($testimonialdata['test'] && $testimonialdata['about']) {
            $testimonialdata['both'] = true;
        }

        return $testimonialdata;
    }

    /**
     * This function is used to get the data for either slider or static at a time.
     *
     * @return array of sliding data
     */
    public static function get_slider_data() {
        global $PAGE, $OUTPUT;

        $sliderdata = array();
        $sliderdata['isslider'] = false;
        $sliderdata['isimage']  = false;
        $sliderdata['isvideo']  = false;
        $sliderdata['slideinterval'] = false;

        if (toolbox::get_setting('sliderautoplay') == '1') {
            $sliderdata['slideinterval'] = toolbox::get_setting('slideinterval');
        }

        $numberofslides = toolbox::get_setting('slidercount');

        // Get the content details either static or slider.
        $frontpagecontenttype = toolbox::get_setting('frontpageimagecontent');

        if ($frontpagecontenttype) { // Dynamic image slider.
            $sliderdata['isslider'] = true;
            if ($numberofslides >= 1) {
                for ($count = 1; $count <= $numberofslides; $count++) {
                    $sliderimageurl = toolbox::setting_file_url('slideimage'.$count, 'slideimage'.$count);
                    if ($sliderimageurl == "" || $sliderimageurl == null) {
                        $sliderimageurl = toolbox::image_url('slide', 'theme');
                    }
                    $sliderimagetext = format_text(toolbox::get_setting('slidertext'.$count));
                    $sliderimagelink = toolbox::get_setting('sliderurl'.$count);
                    $sliderbuttontext = toolbox::get_setting('sliderbuttontext'.$count);
                    if ($count == 1) {
                        $active = true;
                    } else {
                        $active = false;
                    }
                    $sliderdata['slides'][] = array(
                    'img' => $sliderimageurl,
                    'img_txt' => $sliderimagetext,
                    'btn_link' => $sliderimagelink,
                    'btn_txt' => $sliderbuttontext,
                    'active' => $active,
                    'count' => $count - 1);
                }
            }
        } else if (!$frontpagecontenttype) { // Static data.
            // Get the static front page settings.
            $sliderdata['addtxt'] = format_text(toolbox::get_setting('addtext'));

            $contenttype = toolbox::get_setting('contenttype');
            if (!$contenttype) {
                $sliderdata['isvideo'] = true;
                $url = toolbox::get_setting('video');
                $sliderdata['video'] = $url == '' ? 'https://www.youtube.com/embed/wop3FMhoLGs' : $url;
                $sliderdata['videoalignment'] = toolbox::get_setting('frontpagevideoalignment');
            } else if ($contenttype) {
                $sliderdata['isimage'] = true;
                $staticimage = toolbox::setting_file_url('staticimage', 'staticimage');
                if ($staticimage == "" || $staticimage == null) {
                    $sliderdata['staticimage'] = toolbox::image_url('slide', 'theme');
                } else {
                    $sliderdata['staticimage'] = $staticimage;
                }
            }
        }
        return $sliderdata;
    }
    
    /**
     * Return the recent blog.
     *
     * This function helps in retrieving the recent blog.
     *
     * @param int $start how many blog should be skipped if specified 0 no recent blog will be skipped.
     * @param int $blogcount number of blog to be return.
     * @return array $blog returns array of blog data.
     */
    public static function get_recent_blogs($start = 0, $blogcount = 10) {
        global $CFG;

        require_once($CFG->dirroot.'/blog/locallib.php');
        $bloglisting = new \blog_listing();

        $blogentries = $bloglisting->get_entries($start, $blogcount);

        foreach ($blogentries as $blogentry) {
            $blogsummary = strip_tags($blogentry->summary);
            $summarystring = strlen($blogsummary) > 150 ? substr($blogsummary, 0, 150)."..." : $blogsummary;
            $blogentry->summary = $summarystring;

            // Created at.
            $blogentry->createdat = date('d M, Y', $blogentry->created);

            // Link.
            $blogentry->link = $CFG->wwwroot.'/blog/index.php?entryid='.$blogentry->id;
        }
        return $blogentries;
    }
}
