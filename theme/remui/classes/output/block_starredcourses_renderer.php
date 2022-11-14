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
 * Starred courses block renderer.
 *
 * @package    block_starredcourses
 * @copyright  2018 Simey Lameze <simey@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace theme_remui\output;
defined('MOODLE_INTERNAL') || die;

use plugin_renderer_base;

/**
 * Starred courses block renderer.
 *
 * @package    block_starredcourses
 * @copyright  2018 Simey Lameze <simey@moodle.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class block_starredcourses_renderer extends \block_starredcourses\output\renderer {
        /**
         * Return the main content for the block.
         *
         * @param main $main The main renderable
         * @return string HTML string
         */
    public function render_main(\block_starredcourses\output\main $main) {
        $templatecontext = $main->export_for_template($this);
        $templatecontext['coursecarddesignsetting'] = get_config('theme_remui', 'enablenewcoursecards');
        $templatecontext['cardanimationsetting'] = get_config('theme_remui', 'courseanimation');
        return $this->render_from_template('block_starredcourses/main', $templatecontext);
    }
}
