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
 * @package    theme_remui
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_remui\output;

use coding_exception;
use html_writer;
use tabobject;
use tabtree;
use custom_menu_item;
use custom_menu;
use block_contents;
use navigation_node;
use action_link;
use moodle_url;
use preferences_groups;
use action_menu;
use help_icon;
use single_button;
use paging_bar;
use context_course;
use pix_icon;
use action_menu_filler;
use stdClass;
use theme_remui\renderables\remui_sidebar;

defined('MOODLE_INTERNAL') || die;

/**
 * RemUI renderer for placeholder right now
 *
 * @package    theme_remui
 * @copyright  2012 Bas Brands, www.basbrands.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class remui_renderer extends \core_renderer {

    // public function show_editing_button() {
    //     global $SITE, $PAGE, $USER, $CFG, $COURSE;
        
    //     $addblock = '';
        
    //     $url = new moodle_url($PAGE->url);
    //     $url->param('sesskey', sesskey());
    //     if ($PAGE->user_is_editing()) {
    //         $url->param('edit', 'off');
    //         $btn = 'btn-default editingbutton';
    //         $title = get_string('turneditingoff', 'core');
    //         $icon = 'fa-power-off';

    //         $url->param('', '&bui_addblock');
    //         $addblock = '<a href="'.$url.'" class="btn btn-default editingbutton" data-key="addblock" class="py-5" data-isexpandable="0" data-indent="0" data-showdivider="1" data-type="60" data-nodetype="0" data-collapse="0" data-forceopen="0" data-isactive="0" data-hidden="0" data-preceedwithhr="0">
    //         <i class="fa-plus fa fa-fw"></i> '.get_string('addblock', 'core').'</a>';
    //     }
    //     else {
    //         $url->param('edit', 'on');
    //         $btn = 'btn-default editingbutton';
    //         $title = get_string('turneditingon', 'core');
    //         $icon = 'fa-edit';
    //     }
    //     return '<p class="text-center mt-20">'.html_writer::tag('a', html_writer::start_tag('i', array(
    //         'class' => $icon . ' fa fa-fw'
    //     )) . html_writer::end_tag('i').' '.$title , array(
    //         'href' => $url,
    //         'class' => 'btn edit-btn ' . $btn,
    //         'data-tooltip' => "tooltip",
    //         'data-placement' => "bottom",
    //         'title' => $title,
    //     )).'</p><p class="text-center mt-20">'.$addblock.'</p>';
    //     return $output;
    // }
}
