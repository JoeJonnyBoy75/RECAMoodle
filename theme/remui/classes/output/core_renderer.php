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
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package   theme_remui
 * @copyright 2012 Bas Brands, www.basbrands.nl
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace theme_remui\output;

use moodle_url;
use moodle_page;
use html_writer;
use get_string;
use pix_icon;
use context_course;
use core_text;
use stdClass;
use action_menu;
use context_system;

defined('MOODLE_INTERNAL') || die;

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_remui
 * @copyright  2012 Bas Brands, www.basbrands.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \core_renderer {

    /**
     * Renders the "breadcrumb" for all pages in boost.
     *
     * @return string the HTML for the navbar.
     */
    public function navbar(): string {
        $newnav = new \theme_boost\boostnavbar($this->page);
        return $this->render_from_template('core/navbar', $newnav);
    }

    /**
     * Renders the context header for the page.
     *
     * @param array $headerinfo Heading information.
     * @param int $headinglevel What 'h' level to make the heading.
     * @return string A rendered context header.
     */
    public function context_header($headerinfo = null, $headinglevel = 1): string {
        global $DB, $USER, $CFG, $SITE;
        require_once($CFG->dirroot . '/user/lib.php');
        $context = $this->page->context;
        $heading = null;
        $imagedata = null;
        $subheader = null;
        $userbuttons = null;

        // Make sure to use the heading if it has been set.
        if (isset($headerinfo['heading'])) {
            $heading = $headerinfo['heading'];
        } else {
            $heading = $this->page->heading;
        }

        // The user context currently has images and buttons. Other contexts may follow.
        if ((isset($headerinfo['user']) || $context->contextlevel == CONTEXT_USER) && $this->page->pagetype !== 'my-index') {
            if (isset($headerinfo['user'])) {
                $user = $headerinfo['user'];
            } else {
                // Look up the user information if it is not supplied.
                $user = $DB->get_record('user', array('id' => $context->instanceid));
            }

            // If the user context is set, then use that for capability checks.
            if (isset($headerinfo['usercontext'])) {
                $context = $headerinfo['usercontext'];
            }

            // Only provide user information if the user is the current user, or a user which the current user can view.
            // When checking user_can_view_profile(), either:
            // If the page context is course, check the course context (from the page object) or;
            // If page context is NOT course, then check across all courses.
            $course = ($this->page->context->contextlevel == CONTEXT_COURSE) ? $this->page->course : null;

            if (user_can_view_profile($user, $course)) {
                // Use the user's full name if the heading isn't set.
                if (empty($heading)) {
                    $heading = fullname($user);
                }

                $imagedata = $this->user_picture($user, array('size' => 100));

                // Check to see if we should be displaying a message button.
                if (!empty($CFG->messaging) && has_capability('moodle/site:sendmessage', $context)) {
                    $userbuttons = array(
                        'messages' => array(
                            'buttontype' => 'message',
                            'title' => get_string('message', 'message'),
                            'url' => new moodle_url('/message/index.php', array('id' => $user->id)),
                            'image' => 'message',
                            'linkattributes' => \core_message\helper::messageuser_link_params($user->id),
                            'page' => $this->page
                        )
                    );

                    if ($USER->id != $user->id) {
                        $iscontact = \core_message\api::is_contact($USER->id, $user->id);
                        $contacttitle = $iscontact ? 'removefromyourcontacts' : 'addtoyourcontacts';
                        $contacturlaction = $iscontact ? 'removecontact' : 'addcontact';
                        $contactimage = $iscontact ? 'removecontact' : 'addcontact';
                        $userbuttons['togglecontact'] = array(
                            'buttontype' => 'togglecontact',
                            'title' => get_string($contacttitle, 'message'),
                            'url' => new moodle_url('/message/index.php', array(
                                    'user1' => $USER->id,
                                    'user2' => $user->id,
                                    $contacturlaction => $user->id,
                                    'sesskey' => sesskey())
                            ),
                            'image' => $contactimage,
                            'linkattributes' => \core_message\helper::togglecontact_link_params($user, $iscontact),
                            'page' => $this->page
                        );
                    }

                    $this->page->requires->string_for_js('changesmadereallygoaway', 'moodle');
                }
            } else {
                $heading = null;
            }
        }

        $prefix = null;
        if ($context->contextlevel == CONTEXT_MODULE) {
            if ($this->page->course->format === 'singleactivity') {
                $heading = $this->page->course->fullname;
            } else {
                $heading = $this->page->cm->get_formatted_name();
                $imagedata = $this->pix_icon('icon', '', $this->page->activityname, ['class' => 'activityicon']);
                $purposeclass = plugin_supports('mod', $this->page->activityname, FEATURE_MOD_PURPOSE);
                $purposeclass .= ' activityiconcontainer';
                $purposeclass .= ' modicon_' . $this->page->activityname;
                $imagedata = html_writer::tag('div', $imagedata, ['class' => $purposeclass]);
                $prefix = get_string('modulename', $this->page->activityname);
            }
        }

        $contextheader = new \context_header($heading, $headinglevel, $imagedata, $userbuttons, $prefix);
        return $this->render_context_header($contextheader);
    }
     /**
      * Renders the header bar.
      *
      * @param context_header $contextheader Header bar object.
      * @return string HTML for the header bar.
      */
    protected function render_context_header(\context_header $contextheader) {

        // Generate the heading first and before everything else as we might have to do an early return.
        if (!isset($contextheader->heading)) {
            $heading = $this->heading($this->page->heading, $contextheader->headinglevel, 'h2');
        } else {
            $heading = $this->heading($contextheader->heading, $contextheader->headinglevel, 'h2');
        }

        // All the html stuff goes here.
        $html = html_writer::start_div('page-context-header');

        // Image data.
        if (isset($contextheader->imagedata)) {
            // Header specific image.
            $html .= html_writer::div($contextheader->imagedata, 'page-header-image mr-2');
        }

        // Headings.
        if (isset($contextheader->prefix)) {
            $prefix = html_writer::div($contextheader->prefix, 'text-muted text-uppercase small line-height-3');
            $heading = $prefix . $heading;
        }
        $html .= html_writer::tag('div', $heading, array('class' => 'page-header-headings'));

        // Buttons.
        if (isset($contextheader->additionalbuttons)) {
            $html .= html_writer::start_div('btn-group header-button-group');
            foreach ($contextheader->additionalbuttons as $button) {
                if (!isset($button->page)) {
                    // Include js for messaging.
                    if ($button['buttontype'] === 'togglecontact') {
                        \core_message\helper::togglecontact_requirejs();
                    }
                    if ($button['buttontype'] === 'message') {
                        \core_message\helper::messageuser_requirejs();
                    }
                    $image = $this->pix_icon($button['formattedimage'], $button['title'], 'moodle', array(
                        'class' => 'iconsmall',
                        'role' => 'presentation'
                    ));
                    $image .= html_writer::span($button['title'], 'header-button-title');
                } else {
                    $image = html_writer::empty_tag('img', array(
                        'src' => $button['formattedimage'],
                        'role' => 'presentation'
                    ));
                }
                $html .= html_writer::link($button['url'], html_writer::tag('span', $image), $button['linkattributes']);
            }
            $html .= html_writer::end_div();
        }
        $html .= html_writer::end_div();

        return $html;
    }

    /**
     * Theme configuration
     * @var object
     */
    protected $themeconfig;

   /**
     * Constructor
     *
     * @param moodle_page $page the page we are doing output for.
     * @param string $target one of rendering target constants
     */
    public function __construct(moodle_page $page, $target) {
        parent::__construct($page, $target);
        $this->themeconfig = array(\theme_config::load('remui'));
    }

    /**
     * Get theme configuration
     * @return object Theme configuration
     */
    public function get_theme_config() {
        return $this->themeconfig;
    }

    /**
     * Show license or update notice
     *
     * @return HTML for license notice.
     */
    public function show_license_notice() {
        // Get license data from license controller.
        $lcontroller = new \theme_remui\controller\LicenseController();
        $getlidatafromdb = $lcontroller->get_data_from_db();
        if (isloggedin() && !isguestuser()) {
            $content = '';
            $classes = ['alert', 'text-center', 'text-white', 'license-notice'];
            if ('available' != $getlidatafromdb) {
                $classes[] = 'bg-danger';
                if (is_siteadmin()) {
                    $content .= '<strong>'.get_string('licensenotactiveadmin', 'theme_remui').'</strong>';
                } else {
                    $content .= get_string('licensenotactive', 'theme_remui');
                }
            } else if ('available' == $getlidatafromdb) {
                $licensekeyactivate = \theme_remui\toolbox::get_setting(EDD_LICENSE_ACTION);

                if (isset($licensekeyactivate) && !empty($licensekeyactivate)) {
                    $classes[] = 'bg-success';
                    $content .= get_string('licensekeyactivated', 'theme_remui');
                } else {
                    // Show update notice if license is active and update is available.
                    $available  = \theme_remui\controller\RemUIController::check_remui_update();
                    if (is_siteadmin() && $available == 'available') {
                        $classes[] = 'update-nag bg-info moodle-has-zindex';
                        $url = new moodle_url(
                            '/admin/settings.php',
                            array(
                                'section' => 'themesettingremui',
                                'activetab' => 'informationcenter'
                            )
                        );
                        $content .= get_string('newupdatemessage', 'theme_remui', $url->out());
                    }
                }
            }
            if ($content != '') {
                $content .= '<button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">×</button>';
                return html_writer::tag('div', $content, array('class' => implode(' ', $classes)));
            }
        }
        return '';
    }

    /**
     * The standard HTML that should be output just before the <footer> tag.
     * Designed to be called in theme layout.php files.
     *
     * @return string HTML fragment.
     */
    public function standard_after_main_region_html() {
        global $CFG, $OUTPUT;
        $output = '';
        if ($this->page->pagelayout !== 'embedded' && !empty($CFG->additionalhtmlbottomofbody)) {
            $output .= "\n".$CFG->additionalhtmlbottomofbody;
        }

        // Merge messaging panel into right sidebar or not.
        $mergemessagingsidebar = \theme_remui\toolbox::get_setting('mergemessagingsidebar');

        // Page aside blocks
        $blockshtml = $OUTPUT->blocks('side-pre');
        $hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));

        // Give subsystems an opportunity to inject extra html content. The callback
        // must always return a string containing valid html.
        foreach (\core_component::get_core_subsystems() as $name => $path) {
            if ($path) {

                // Remui, because messages are in sidebar, so skip here.
                if ($mergemessagingsidebar  && $name == 'message' && $hasblocks) {
                    continue;
                }
                $output .= component_callback($name, 'standard_after_main_region_html', [], '');
            }
        }

        // Give plugins an opportunity to inject extra html content. The callback
        // must always return a string containing valid html.
        $pluginswithfunction = get_plugins_with_function('standard_after_main_region_html', 'lib.php');
        foreach ($pluginswithfunction as $plugins) {
            foreach ($plugins as $function) {
                $output .= $function();
            }
        }

        return $output;
    }

    /**
     * The standard tags that should be included in the <head> tag
     * including a meta description for the front page
     *
     * @return string HTML fragment.
     */
    public function standard_head_html() {
        global $SITE;

        $output = parent::standard_head_html();
        if ($this->page->pagelayout == 'frontpage') {
            $summary = s(strip_tags(format_text($SITE->summary, FORMAT_HTML)));
            if (!empty($summary)) {
                $output .= "<meta name=\"description\" content=\"$summary\" />\n";
            }
        }

        // Get the theme font from setting.
        if (\theme_remui\toolbox::get_setting('fontselect') === "2") {
            $fontname = ucwords(\theme_remui\toolbox::get_setting('fontname'));
        }
        if (empty($fontname)) {
            $fontname = 'Open Sans';
        }
        $output .= "<link href='https://fonts.googleapis.com/css?family=$fontname:300,400,500,600,700,300italic' rel='stylesheet'
        type='text/css'>";

        // Add google analytics code.
        $gatrackingcode = trim(\theme_remui\toolbox::get_setting('googleanalytics'));

        if (!empty($gatrackingcode)) {
            $output .= "<!-- Global site tag (gtag.js) - Google Analytics -->";
            $output .= "<script async src='https://www.googletagmanager.com/gtag/js?id=";
            $output .= $gatrackingcode."'></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', '".$gatrackingcode."');
            </script><!-- Google Analytics -->";
        }
        return $output;
    }

    /**
     * Returns the url of the custom favicon.
     */
    public function favicon() {
        $favicon = \theme_remui\toolbox::setting_file_url('faviconurl', 'faviconurl');
        if (empty($favicon)) {
            return \theme_remui\toolbox::image_url('favicon', 'theme');
        } else {
            return $favicon;
        }
    }

    /**
     * Return HTML for site announcement.
     *
     * @return string Site announcement HTML
     */
    public function render_site_announcement() {
        $enableannouncement = \theme_remui\toolbox::get_setting('enableannouncement');
        $announcement = '';
        if ($enableannouncement && !get_user_preferences('remui_dismised_announcement')) {
            $type = \theme_remui\toolbox::get_setting('announcementtype');
            $message = \theme_remui\toolbox::get_setting('announcementtext');
            $dismissable = \theme_remui\toolbox::get_setting('enabledismissannouncement');
            $extraclass = '';
            $buttonhtml = '';
            if ($dismissable) {
                $buttonhtml .= '<button id="dismiss_announcement" type="button" class="close" data-dismiss="alert" aria-label="Close">';
                $buttonhtml .= '<span aria-hidden="true">&times;</span>';
                $buttonhtml .= '</button>';
                $extraclass = 'alert-dismissible';
            }

            $announcement .= "<div class='alert alert-{$type} dark text-center rounded-0 site-announcement m-b-0 $extraclass' role='alert'>";
            $announcement .= $buttonhtml;
            $announcement .= $message;
            $announcement .= "</div>";
        }
        return $announcement;
    }

    /**
     * See if this is the first view of the current cm in the session if it has fake blocks.
     *
     * (We track up to 100 cms so as not to overflow the session.)
     * This is done for drawer regions containing fake blocks so we can show blocks automatically.
     *
     * @return boolean true if the page has fakeblocks and this is the first visit.
     */
    public function firstview_fakeblocks(): bool {
        global $SESSION;

        $firstview = false;
        if ($this->page->cm) {
            if (!$this->page->blocks->region_has_fakeblocks('side-pre')) {
                return false;
            }
            if (!property_exists($SESSION, 'firstview_fakeblocks')) {
                $SESSION->firstview_fakeblocks = [];
            }
            if (array_key_exists($this->page->cm->id, $SESSION->firstview_fakeblocks)) {
                $firstview = false;
            } else {
                $SESSION->firstview_fakeblocks[$this->page->cm->id] = true;
                $firstview = true;
                if (count($SESSION->firstview_fakeblocks) > 100) {
                    array_shift($SESSION->firstview_fakeblocks);
                }
            }
        }
        return $firstview;
    }

    /**
     * Whether we should display the logo in the navbar.
     *
     * We will when there are no main logos, and we have compact logo.
     *
     * @return bool
     */
    public function should_display_navbar_logo() {
        global $SITE;

        $customizer = \theme_remui\customizer\customizer::instance();

        $logoorsitename = \theme_remui\toolbox::get_setting('logoorsitename');
        $context = array('islogo' => false, 'issitename' => false, 'isiconsitename' => false);
        $logo = \theme_remui\toolbox::setting_file_url('logo', 'logo');
        $logomini = \theme_remui\toolbox::setting_file_url('logomini', 'logomini');

        if (empty($logo)) {
            $logo = \theme_remui\toolbox::image_url('logo', 'theme');
        }

        if (empty($logomini)) {
            $logomini = \theme_remui\toolbox::image_url('logomini', 'theme');
        }

        $context['logourl'] = $logo;
        $context['logominiurl'] = $logomini;

        // Login page logo fetch.
        if ($this->page->pagelayout == 'login') {
            $customlogo = $customizer->get_config('login-panel-logo');

            if ($customlogo != '') {
                $context['logourl'] = $customlogo->out(false);
                $context['logominiurl'] = $customlogo->out(false);
            }
        }

        $customizer = \theme_remui\customizer\customizer::instance();
        $context['siteicon'] = $customizer->get_config('siteicon');
        $context['sitename'] = format_string($SITE->shortname);
        $context['logoorsitename'] = $logoorsitename;
        return $context;
    }

    /**
     * Generate the add block button when editing mode is turned on and the user can edit blocks.
     *
     * @param string $region where new blocks should be added.
     * @return string html for the add block button.
     */
    public function addblockbutton($region = ''): string {
        $addblockbutton = '';
        if (isset($this->page->theme->addblockposition) &&
                $this->page->user_is_editing() &&
                $this->page->user_can_edit_blocks() &&
                $this->page->pagelayout !== 'mycourses'
        ) {
            $params = ['bui_addblock' => '', 'sesskey' => sesskey()];
            if (!empty($region)) {
                $params['bui_blockregion'] = $region;
            }
            $url = new moodle_url($this->page->url, $params);
            $btncontext = [
                'link' => $url->out(false),
                'escapedlink' => "?{$url->get_query_string(false)}",
                'pageType' => $this->page->pagetype,
                'pageLayout' => $this->page->pagelayout,
                'subPage' => $this->page->subpage,
                'issiteadmin' => is_siteadmin() && is_plugin_available('block_edwiseradvancedblock') ,
                'edwpbf' => is_plugin_available('filter_edwiserpbf'),
                'pbfnotenable' => filter_get_active_state('edwiserpbf') != 1
            ];

            $templatename = 'core/add_block_button';

            // Block editing and addition will be available if and only if both plugins are available.
            if (is_plugin_available('local_edwiserpagebuilder') && is_plugin_available('block_edwiseradvancedblock')) {
                $templatename = 'local_edwiserpagebuilder/add_block_button';
            }

            $addblockbutton = $this->render_from_template($templatename, $btncontext);
        }
        return $addblockbutton;
    }

    /**
     * Create a navbar switch for toggling editing mode.
     *
     * @return string Html containing the edit switch
     */
    public function render_customizer_nav () {
        global $CFG;
        $navlink = '';
        if (is_siteadmin()) {

            $divider = '<div class="divider h-75 align-self-center mx-1"></div>';

            $icondesign = get_config('theme_remui', 'icondesign');

            $bghover = "";
            $remuiicon = "";

            if ($icondesign != 'default') {
                $bghover = "no-bghover";
                $remuiicon = "remuiicon";
            }

            $navlink = $divider .'<li class="nav-item '.$bghover.'" role="none" data-forceintomoremenu="false">';
            $navlink .= '<a role="menuitem" class="nav-link '.$remuiicon.'" href="';
            $navlink .= $CFG->wwwroot . "/theme/remui/customizer.php?url=" . urlencode($this->page->url->out());
            $navlink .= '" aria-current="true" tabindex="-1">';
            $navlink .= '<i class="fa fa-paint-brush customizer-editing-icon"></i>';
            $navlink .= '</a></li>';
        }
        return $navlink;
    }

    /**
     * Renders the login form.
     *
     * @param \core_auth\output\login $form The renderable.
     * @return string
     */
    public function render_login(\core_auth\output\login $form) {
        global $CFG, $SITE;
        $context = $form->export_for_template($this);

        $customizer = \theme_remui\customizer\customizer::instance();

        // Override because rendering is not supported in template yet.
        if ($CFG->rememberusername == 0) {
            $context->cookieshelpiconformatted = $this->help_icon('cookiesenabledonlysession');
        } else {
            $context->cookieshelpiconformatted = $this->help_icon('cookiesenabled');
        }
        $context->errorformatted = $this->error_text($context->error);
        $url = $this->get_logo_url();
        if ($url) {
            $url = $url->out(false);
        }

        $context->output = $this;

        $context->siteicon = $customizer->get_config('siteicon');
        $context->loginpage_context = $this->should_display_navbar_logo();

        $context->loginlayout = get_config('theme_remui', 'loginpagelayout');
        $context->loginsocial_context = \theme_remui\utility::get_footer_data(1);

        // This section is to remove unnecessary footer sections.
        $footersections = $context->loginsocial_context['sections'];
        $socialfound = false;
        foreach ($footersections as $key => $value) {
            if ($value['type'] == 'social' && !$socialfound) {
                $socialfound = true;
                continue;
            }
            unset($footersections[$key]);
        }
        $context->loginsocial_context['sections'] = array_values($footersections);
        if (get_config('theme_remui', 'brandlogopos') == 1 || get_config('theme_remui', 'loginpagelayout') == 'logincenter') {
            $context->hidelogo = true;
        }
        if (get_config('theme_remui', 'brandlogopos') == 0) {
            $context->hidelogo = false;
        }
        return $this->render_from_template('core/loginform', $context);
    }

    /**
     * Render the login signup form into a nice template for the theme.
     *
     * @param mform $form
     * @return string
     */
    public function render_login_signup_form($form) {
        global $SITE;

        $context = $form->export_for_template($this);
        $url = $this->get_logo_url();
        if ($url) {
            $url = $url->out(false);
        }
        $context['output'] = $this;
        $context['logourl'] = $url;
        $context['sitename'] = format_string($SITE->fullname, true,
                ['context' => context_course::instance(SITEID), "escape" => false]);
        if (get_config('theme_remui', 'brandlogopos') == 1 || get_config('theme_remui', 'loginpagelayout') == 'logincenter') {
            $context['hidelogo'] = true;
        }
        if (get_config('theme_remui', 'brandlogopos') == 0) {
            $context['hidelogo'] = false;
        }

        return $this->render_from_template('core/signup_form_layout', $context);
    }

    /**
     * Returns a search box.
     *
     * @param  string $id     The search box wrapper div id, defaults to an autogenerated one.
     * @return string         HTML with the search form hidden by default.
     */
    public function search_box($id = false) {
        global $CFG;

        // Accessing $CFG directly as using \core_search::is_global_search_enabled would
        // result in an extra included file for each site, even the ones where global search
        // is disabled.
        if (empty($CFG->enableglobalsearch) || !has_capability('moodle/search:query', context_system::instance())) {
            return '';
        }

        $data = [
            'action' => new moodle_url('/search/index.php'),
            'hiddenfields' => (object) ['name' => 'context', 'value' => $this->page->context->id],
            'inputname' => 'q',
            'searchstring' => get_string('search'),
        ];

        $icondesign = get_config('theme_remui', 'icondesign');

        if ($icondesign != 'default') {
            $data['icondesign'] = true;
        }

        return $this->render_from_template('core/search_input_navbar', $data);
    }

    /**
     * Returns the Moodle docs link to use for this page.
     *
     * @since Moodle 2.5.1 2.6
     * @param string $text
     * @return string
     */
    public function page_doc_link($text = null) {
        if ($text === null) {
            $text = get_string('moodledocslink');
        }
        $path = page_get_doc_link_path($this->page);
        if (!$path) {
            return '';
        }
        return $this->edw_custom_doc_link($path, $text);
    }
    /**
     * [Edwiser - RemUI changes to the function]
     * Returns a string containing a link to the user documentation.
     * Also contains an icon by default. Shown to teachers and admin only.
     *
     * @param string $path The page link after doc root and language, no leading slash.
     * @param string $text The text to be displayed for the link
     * @param boolean $forcepopup Whether to force a popup regardless of the value of $CFG->doctonewwindow
     * @param array $attributes htm attributes
     * @return string
     */
    public function edw_custom_doc_link($path, $text = '', $forcepopup = false, array $attributes = []) {
        global $CFG;

        $icon = $this->pix_icon('book', '', 'moodle', array('class' => 'iconhelp icon-pre', 'role' => 'presentation'));

        $attributes['href'] = new moodle_url(get_docs_url($path));
        $newwindowicon = '';
        if (!empty($CFG->doctonewwindow) || $forcepopup) {
            $attributes['target'] = '_blank';
            $newwindowicon = $this->pix_icon('i/externallink', get_string('opensinnewwindow'), 'moodle',
            ['class' => 'fa fa-externallink fa-fw']);
        }

        $attributes["data-toggle"] = "tooltip";
        $attributes["data-placement"] = "bottom";
        $attributes["title"] = $text;

        return html_writer::tag('a', $icon . $newwindowicon, $attributes);
    }
    /**
     * Returns the services and support link for the help pop-up.
     *
     * @return string
     */
    public function services_support_link(): string {
        global $CFG;

        if (during_initial_install() ||
            (isset($CFG->showservicesandsupportcontent) && $CFG->showservicesandsupportcontent == false) ||
            !is_siteadmin()) {
            return '';
        }

        $liferingicon = $this->pix_icon('t/life-ring', '', 'moodle', ['class' => 'fa fa-life-ring']);
        $newwindowicon = '';
        // $newwindowicon = $this->pix_icon('i/externallink', get_string('opensinnewwindow'), 'moodle', ['class' => 'fa fa-externallink fa-fw']);
        $link = 'https://moodle.com/help/?utm_source=CTA-banner&utm_medium=platform&utm_campaign=name~Moodle4+cat~lms+mp~no';
        $content = $liferingicon . $newwindowicon;

        return html_writer::tag('a', $content, [
            'target' => '_blank',
            'href' => $link,
            "data-toggle" => "tooltip",
            "data-placement" => "bottom",
            "title" => get_string('moodleservicesandsupport')
        ]);
    }
    /**
     * Returns the HTML for the site support email link
     *
     * @param array $customattribs Array of custom attributes for the support email anchor tag.
     * @return string The html code for the support email link.
     */
    public function supportemail(array $customattribs = []): string {
        global $CFG;

        $label = get_string('contactsitesupport', 'admin');
        $icon = $this->pix_icon('t/email', '', 'moodle', ['class' => 'iconhelp icon-pre']);
        $content = $icon;

        if (!empty($CFG->supportpage)) {
            $attributes = [
                "href" => $CFG->supportpage,
                "target" => 'blank',
                "data-toggle" => "tooltip",
                "data-placement" => "bottom",
                "title" => $label
            ];
            $content .= $this->pix_icon('i/externallink', '', 'moodle', ['class' => 'iconhelp icon-pre']);
        } else {
            $attributes = [
                'href' => $CFG->wwwroot . '/user/contactsitesupport.php',
                "data-toggle" => "tooltip",
                "data-placement" => "bottom",
                "title" => $label
            ];
        }

        $attributes += $customattribs;

        return html_writer::tag('a', $content, $attributes);
    }

    /**
     * Returns the HTML for the site support email link
     *
     * @return string The html code for support and feedback.
     */
    public function edw_feedback_and_support() {
        if (is_siteadmin() && get_config('theme_remui', 'enableedwfeedback')) {

            $icon = "<i class=\"icon fa fa-question-circle-o\"></i>";
            $attributes = [
                'href' => "#",
                "data-toggle" => "tooltip",
                "data-placement" => "bottom",
                "title" => get_string('sendfeedback', 'theme_remui'),
                "class" => "send-remui-feedback"
            ];

            return html_writer::tag('a', $icon, $attributes);
        }
        return null;
    }

    /**
     * Returns the HTML for the site support email link
     *
     * @return string The html code for check FAQ.
     */
    public function edwiser_check_faq() {
        if (is_siteadmin() && get_config('theme_remui', 'enableedwfeedback')) {
            $attributes = [
                'href' => "https://edwiser.helpscoutdocs.com/category/83-product-support",
                'target' => "_blank",
                'rel' => "nofollow"
            ];

            return html_writer::tag('a', get_string('checkfaq', 'theme_remui'), $attributes);
        }
        return null;
    }
    /**
     * Return the standard string that says whether you are logged in (and switched
     * roles/logged in as another user).
     * @param bool $withlinks if false, then don't include any links in the HTML produced.
     * If not set, the default is the nologinlinks option from the theme config.php file,
     * and if that is not set, then links are included.
     * @return string HTML fragment.
     */
    public function login_info($withlinks = null) {
        global $USER, $CFG, $DB, $SESSION;

        if (during_initial_install()) {
            return '';
        }

        if (is_null($withlinks)) {
            $withlinks = empty($this->page->layout_options['nologinlinks']);
        }

        $course = $this->page->course;
        if (\core\session\manager::is_loggedinas()) {
            $realuser = \core\session\manager::get_realuser();
            $fullname = fullname($realuser);
            if ($withlinks) {
                $loginastitle = get_string('loginas') . "<br>";
                $realuserinfo = " [<a href=\"$CFG->wwwroot/course/loginas.php?id=$course->id&amp;sesskey=".sesskey()."\"";
                $realuserinfo .= "title =\"".$loginastitle."\">$fullname</a>] ";
            } else {
                $realuserinfo = " [$fullname] ";
            }
        } else {
            $realuserinfo = '';
        }

        $loginpage = $this->is_login_page();
        $loginurl = get_login_url();

        if (empty($course->id)) {
            // $course->id is not defined during installation
            return '';
        } else if (isloggedin()) {
            $context = context_course::instance($course->id);

            $fullname = fullname($USER);
            // Since Moodle 2.0 this link always goes to the public profile page (not the course profile page)
            if ($withlinks) {
                $linktitle = get_string('viewprofile');
                $username = "<br><a href=\"$CFG->wwwroot/user/profile.php?id=$USER->id\" title=\"$linktitle\">$fullname</a>";
            } else {
                $username = $fullname;
            }
            if (is_mnet_remote_user($USER) and $idprovider = $DB->get_record('mnet_host', array('id'=>$USER->mnethostid))) {
                if ($withlinks) {
                    $username .= " from <a href=\"{$idprovider->wwwroot}\">{$idprovider->name}</a>";
                } else {
                    $username .= " from {$idprovider->name}";
                }
            }
            if (isguestuser()) {
                $loggedinas = $realuserinfo.get_string('loggedinasguest');
                if (!$loginpage && $withlinks) {
                    $loggedinas .= " (<a href=\"$loginurl\">".get_string('login').'</a>)';
                }
            } else if (is_role_switched($course->id)) { // Has switched roles
                $rolename = '';
                if ($role = $DB->get_record('role', array('id'=>$USER->access['rsw'][$context->path]))) {
                    $rolename = ': '.role_get_name($role, $context);
                }
                $loggedinas = get_string('loggedinas', 'moodle', $username).$rolename;
                if ($withlinks) {
                    $url = new moodle_url('/course/switchrole.php', array('id'=>$course->id,'sesskey'=>sesskey(), 'switchrole'=>0, 'returnurl'=>$this->page->url->out_as_local_url(false)));
                    $loggedinas .= ' ('.html_writer::tag('a', get_string('switchrolereturn'), array('href' => $url)).')';
                }
            } else {
                $loggedinas = $realuserinfo.get_string('loggedinas', 'moodle', $username);
                if ($withlinks) {
                    $loggedinas .= " (<a href=\"$CFG->wwwroot/login/logout.php?sesskey=".sesskey()."\">".get_string('logout').'</a>)';
                }
            }
        } else {
            $loggedinas = get_string('loggedinnot', 'moodle');
            if (!$loginpage && $withlinks) {
                $loggedinas .= " (<a href=\"$loginurl\">".get_string('login').'</a>)';
            }
        }

        $loggedinas = '<div class="logininfo">'.$loggedinas.'</div>';

        if (isset($SESSION->justloggedin)) {
            unset($SESSION->justloggedin);
            if (!empty($CFG->displayloginfailures)) {
                if (!isguestuser()) {
                    // Include this file only when required.
                    require_once($CFG->dirroot . '/user/lib.php');
                    if ($count = user_count_login_failures($USER)) {
                        $loggedinas .= '<div class="loginfailures">';
                        $a = new stdClass();
                        $a->attempts = $count;
                        $loggedinas .= get_string('failedloginattempts', '', $a);
                        if (file_exists("$CFG->dirroot/report/log/index.php") and has_capability('report/log:view', context_system::instance())) {
                            $loggedinas .= ' ('.html_writer::link(new moodle_url('/report/log/index.php', array('chooselog' => 1,
                                    'id' => 0 , 'modid' => 'site_errors')), get_string('logs')).')';
                        }
                        $loggedinas .= '</div>';
                    }
                }
            }
        }

        return $loggedinas;
    }

    /**
     * Returns standard navigation between activities in a course.
     *
     * @return string the navigation HTML.
     */
    public function activity_navigation() {

        $activitynavenable = get_config('theme_remui', 'activitynextpreviousbutton');
        if (!$activitynavenable) {
            return '';
        }

        // First we should check if we want to add navigation.
        $context = $this->page->context;
        if (($this->page->pagelayout !== 'incourse' && $this->page->pagelayout !== 'frametop') ||
        $context->contextlevel != CONTEXT_MODULE) {
            return '';
        }

        // If the activity is in stealth mode, show no links.
        if ($this->page->cm->is_stealth()) {
            return '';
        }

        $course = $this->page->cm->get_course();
        $courseformat = course_get_format($course);

        // If the theme implements course index and the current course format uses course index and the current
        // page layout is not 'frametop' (this layout does not support course index), show no links.
        // if ($this->page->theme->usescourseindex && $courseformat->uses_course_index() &&
        // $this->page->pagelayout !== 'frametop') {
        // return '';
        // }

        // Get a list of all the activities in the course.
        $modules = get_fast_modinfo($course->id)->get_cms();

        // Put the modules into an array in order by the position they are shown in the course.
        $mods = [];
        $activitylist = [];
        foreach ($modules as $module) {
            // Only add activities the user can access, aren't in stealth mode and have a url (eg. mod_label does not).
            if (!$module->uservisible || $module->is_stealth() || empty($module->url)) {
                continue;
            }
            $mods[$module->id] = $module;

            // No need to add the current module to the list for the activity dropdown menu.
            if ($module->id == $this->page->cm->id) {
                continue;
            }
            // Module name.
            $modname = $module->get_formatted_name();
            // Display the hidden text if necessary.
            if (!$module->visible) {
                $modname .= ' ' . get_string('hiddenwithbrackets');
            }
            // Module URL.
            $linkurl = new moodle_url($module->url, array('forceview' => 1));
            // Add module URL (as key) and name (as value) to the activity list array.
            $activitylist[$linkurl->out(false)] = $modname;
        }

        $nummods = count($mods);

        // If there is only one mod then do nothing.
        if ($nummods == 1) {
            return '';
        }

        // Get an array of just the course module ids used to get the cmid value based on their position in the course.
        $modids = array_keys($mods);

        // Get the position in the array of the course module we are viewing.
        $position = array_search($this->page->cm->id, $modids);

        $prevmod = null;
        $nextmod = null;

        // Check if we have a previous mod to show.
        if ($position > 0) {
            $prevmod = $mods[$modids[$position - 1]];
        }

        // Check if we have a next mod to show.
        if ($position < ($nummods - 1)) {
            $nextmod = $mods[$modids[$position + 1]];
        }

        $activitynav = new \core_course\output\activity_navigation($prevmod, $nextmod, $activitylist);
        if ($activitynav->prevlink) {
            $activitynav->prevlink->attributes['class'] = 'btn btn-inverse btn-sm';
            if ($activitynavenable == 1) {
                $activitynav->prevlink->text = get_string('activityprev', 'theme_remui');
            }
        }

        if ($activitynav->nextlink) {
            $activitynav->nextlink->attributes['class'] = 'btn btn-inverse btn-sm';
            if ($activitynavenable == 1) {
                $activitynav->nextlink->text = get_string('activitynext', 'theme_remui');
            }
        }

        if (isset($activitynav->nextlink->text) && strlen($activitynav->nextlink->text) > 40) {
            $activitynav->nextlink->text = substr($activitynav->nextlink->text, 0, 36) . "... &#9658;";
        }

        if (isset($activitynav->prevlink->text) && strlen($activitynav->prevlink->text) > 40) {
            $activitynav->prevlink->text = substr($activitynav->prevlink->text, 0, 36) . "...";
        }

        $renderer = $this->page->get_renderer('core', 'course');
        return $renderer->render($activitynav);
    }
}
