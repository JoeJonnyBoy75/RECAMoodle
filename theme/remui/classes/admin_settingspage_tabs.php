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

defined('MOODLE_INTERNAL') || die();

/**
 * @package   theme_remui
 * @copyright 2016 Ryan Wyllie
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_remui_admin_settingspage_tabs extends admin_settingpage {

    /** @var The tabs */
    protected $tabs = array();

    /**
     * Add a tab.
     *
     * @param admin_settingpage $tab A tab.
     */
    public function add_tab(admin_settingpage $tab) {
        foreach ($tab->settings as $setting) {
            $this->settings->{$setting->name} = $setting;
        }
        $this->tabs[] = $tab;
        return true;
    }

    public function add($tab) {
        return $this->add_tab($tab);
    }

    /**
     * Get tabs.
     *
     * @return array
     */
    public function get_tabs() {
        return $this->tabs;
    }

    /**
     * Generate the HTML output.
     *
     * @return string
     */
    public function output_html() {

        global $OUTPUT, $CFG, $PAGE;
        
        $activetab = optional_param('activetab', '', PARAM_TEXT);
        $context = array('tabs' => array());
        $havesetactive = false;

        foreach ($this->get_tabs() as $tab) {
            $active = false;

            // Default to first tab it not told otherwise.
            if (empty($activetab) && !$havesetactive) {
                $active = true;
                $havesetactive = true;
            } else if ($activetab === $tab->name) {
                $active = true;
            }

            $context['tabs'][] = array(
                'name' => $tab->name,
                'displayname' => $tab->visiblename,
                'html' => $tab->output_html(),
                'active' => $active,
            );
        }

        //add license and about RemUI tabs
        // license tab content
        ob_start();
        include_once($CFG->dirroot . '/theme/remui/remui_license.php');
        $license_content = ob_get_clean();

        ob_start();
        include_once($CFG->dirroot . '/theme/remui/remui_announcements.php');
        $announcements_content = ob_get_clean();

        // license tab
        $context['tabs'][] = array(
                'name' => 'remuilicensestatus',
                'displayname' => get_string('licensestatus', 'theme_remui'),
                'html' => $license_content,
                'active' => $active,
                'customclass' => 'remuitab'
            );
        // announcements tab
        $context['tabs'][] = array(
                'name' => 'remuinewsandupdates',
                'displayname' => get_string('newsandupdates', 'theme_remui'),
                'html' => $announcements_content,
                'active' => $active,
                'customclass' => 'remuitab'
            );

        // about remui tab
        $context['tabs'][] = array(
                'name' => 'aboutemui',
                'displayname' => get_string('aboutremui', 'theme_remui'),
                'html' => get_string('choosereadme', 'theme_remui'),
                'active' => $active,
                'customclass' => 'remuitab'
            );

        if (empty($context['tabs'])) {
            return '';
        }

        return $OUTPUT->render_from_template('theme_remui/admin_setting_tabs', $context);
    }

}

