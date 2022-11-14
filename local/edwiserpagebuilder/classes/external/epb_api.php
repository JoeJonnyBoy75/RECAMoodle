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
 * @package   local_edwiserpagebuilder
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author Sudam Chakor
 */

namespace local_edwiserpagebuilder\external;

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/externallib.php');

use external_api;

/**
 * Services definition for Edwiser Page Bulder.
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class epb_api extends external_api {

    /**
     * Plugin name constant.
     *
     * @var string
     */
    public static $plugin_name = 'local_edwiserpagebuilder';

    /**
     * Plugin meddia file area.
     *
     * @var string
     */
    public static $plugin_file_area  = 'media';

    /**
     * Class constructor.
     *
     * @return void
     */
    public function __construct() {
        self::$context = context_system::instance();
    }

    use edwiser_get_media_list;
    use edwiser_save_media_files;
    use edwiser_delete_media_file;
    use edwiser_fetch_blocks_list;
    use edwiser_fetch_layout_list;
    use edwiser_update_block_content;
    use edwiser_get_shortcode_parsered_html;
    use edwiser_course_get_categories;
    use edwiser_get_cards_list;
    use edwiser_delete_block;
    use edwiser_render_page_cards;
    use edwiser_fetch_page_details;
    use edwiser_perform_page_action;
    use edwiser_fetch_addable_blocks;
}
