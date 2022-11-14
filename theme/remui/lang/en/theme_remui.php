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
 * Language file.
 *
 * @package   theme_remui
 * @copyright 2016 Frédéric Massart
 * @copyright (c) 2022 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['advancedsettings'] = 'Advanced settings';
$string['backgroundimage'] = 'Background image';
$string['backgroundimage_desc'] = 'The image to display as a background of the site. The background image you upload here will override the background image in your theme preset files.';
$string['brandcolor'] = 'Brand colour';
$string['brandcolor_desc'] = 'The accent colour.';
$string['bootswatch'] = 'Bootswatch';
$string['bootswatch_desc'] = 'A bootswatch is a set of Bootstrap variables and css to style Bootstrap';
$string['choosereadme'] = '
<div class="about-remui-wrapper text-center">
    <div class="about-remui m-auto" style="max-width: 1000px;">
        <h1 class="text-center">Welcome To Edwiser RemUI</h1><br>
        <h5 class="text-muted">
        Edwiser RemUI is the new revolution in Moodle User Experience. It has been suitably designed
        to elevate e-learning with custom layouts, simplified navigation, content creation & customization option. <br><br>
        We\'re sure you will enjoy the remodeled look!
        </h5>
        <div class="text-center mt-50">
        <img src="' . $CFG->wwwroot . '/theme/remui/pix/selection.png" class="w-full" alt="Edwiser RemUI screen shot" style="max-width: 100%;"/>
        </div>
        <br><br>
        <div class="text-center">
            <div class="btn-group text-center" role="group" aria-label="...">
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.helpscoutdocs.com/collection/78-edwiser-remui-theme" target="_blank" class="btn btn-primary btn-round">FAQ</a>
              </div>
              <div class="btn-group mr-1" role="group">
                <a href="https://edwiser.org/remui/documentation/" target="_blank" class="btn btn-primary btn-round">Documentation</a>
              </div>
              <div class="btn-group" role="group">
                <a href="https://edwiser.org/contact-us/" target="_blank" class="btn btn-primary btn-round">Support</a>
              </div>
            </div>
        </div>
        <br>
        <h1 class="text-center">Personalize Your Theme</h1>
        <h5 class="text-muted text-center">
            We understand that not every LMS is the same. We\'ll work with you to understand your needs, and design and develop a solution to meet your goals.
        </h5>
        <br><br>
        <div class="row wdm_generalbox">
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Theme Customization</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-edit"></i>
                </div>
                <div class="iconbox-content">
                    <h4>Functionality Development</h4>
                </div>
            </div>
            <br>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-link"></i>
                </div>
                <div class="iconbox-content">
                    <h4>API Integration</h4>
                </div>
            </div>
            <div class="marketing-spots span3 col-lg-6 col-12">
                <div class="iconsquare">
                    <i class="fa fa-life-ring"></i>
                </div>
                <div class="iconbox-content">
                    <h4>LMS Consultancy</h4>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="text-center">
            <a class="btn btn-primary btn-lg" target="_blank" href="https://edwiser.org/contact-us/">Contact Us</a>&nbsp;&nbsp;
        </div>
    </div>
</div>
<br />';
$string['aboutremui'] = 'About Edwiser RemUI';
$string['currentinparentheses'] = '(current)';
$string['configtitle'] = 'Edwiser RemUI';
$string['fontsize'] = 'Theme base fontsize';
$string['fontsize_desc'] = 'Enter a fontsize in %';
$string['nobootswatch'] = 'None';
$string['pluginname'] = 'Edwiser RemUI';
$string['presetfiles'] = 'Additional theme preset files';
$string['presetfiles_desc'] = 'Preset files can be used to dramatically alter the appearance of the theme. See <a href="https://docs.moodle.org/dev/remui_Presets">remui presets</a> for information on creating and sharing your own preset files, and see the <a href="http://moodle.net/remui">Presets repository</a> for presets that others have shared.';
$string['preset'] = 'Theme preset';
$string['preset_desc'] = 'Pick a preset to broadly change the look of the theme.';
$string['privacy:metadata'] = 'The remui theme does not store any personal data about any user.';
$string['rawscss'] = 'Raw SCSS';
$string['rawscss_desc'] = 'Use this field to provide SCSS or CSS code which will be injected at the end of the style sheet.';
$string['rawscsspre'] = 'Raw initial SCSS';
$string['rawscsspre_desc'] = 'In this field you can provide initialising SCSS code, it will be injected before everything else. Most of the time you will use this setting to define variables.';
$string['region-side-pre'] = 'Right';
$string['region-side-top'] = 'Top';
$string['region-side-bottom'] = 'Bottom';
$string['privacy:metadata:preference:draweropennav'] = 'The user\'s preference for hiding or showing the drawer menu navigation.';
$string['privacy:drawernavclosed'] = 'The current preference for the navigation drawer is closed.';
$string['privacy:drawernavopen'] = 'The current preference for the navigation drawer is open.';
$string['cachedef_courses'] = 'Cache for courses';
$string['cachedef_guestcourses'] = 'Cache for guest courses';
$string['cachedef_updates'] = 'Cache for updates';


// Course view preference.
$string['privacy:metadata:preference:course_view_state'] = 'The type of display that the user prefers for list of courses';
$string['course_view_state_description_grid'] = 'To display the courses in grid format';
$string['course_view_state_description_list'] = 'To display the courses in list format';

// Course view preference.
$string['privacy:metadata:preference:viewCourseCategory'] = 'The type of display that the user prefers for list of courses';
$string['viewCourseCategory_grid'] = 'To display the courses in grid format';
$string['viewCourseCategory_list'] = 'To display the courses in list format';

// Aside right view preference.
$string['privacy:metadata:preference:aside_right_state'] = 'Whether the aside block on the right should be kept open or docked';
$string['aside_right_state_'] = 'To display the aside block on right as open'; // Blank value.
$string['aside_right_state_overrideaside'] = 'To display the aside block on right as docked'; // Overrideaside.

// Menu view preference.
$string['privacy:metadata:preference:menubar_state'] = 'The type of display that the user prefers for the menu bar';
$string['menubar_state_fold'] = 'To display the menu bar as folded';
$string['menubar_state_unfold'] = 'To display the menu bar as unfolded';
$string['menubar_state_open'] = 'To display the menu bar as open';
$string['menubar_state_hide'] = 'To display the menu bar as hidden';


// Profile Page.
$string['administrator'] = 'Administrator';
$string['contacts'] = 'Contacts';
$string['blogentries'] = 'Blog Entries';
$string['discussions'] = 'Discussions';
$string['aboutme'] = 'About Me';
$string['courses'] = 'Courses';
$string['interests'] = 'Interests';
$string['institution'] = 'Department & Institution';
$string['location'] = 'Location';
$string['description'] = 'Description';
$string['editprofile'] = 'Edit Profile';
$string['start_date'] = 'Start date';
$string['complete'] = 'Complete';
$string['surname'] = 'Last Name';
$string['actioncouldnotbeperformed'] = 'Action could not be performed!';
$string['enterfirstname'] = 'Please enter your First Name.';
$string['enterlastname'] = 'Please enter your Last Name.';
$string['enteremailid'] = 'Please enter your Email ID.';
$string['enterproperemailid'] = 'Please enter proper Email ID.';
$string['detailssavedsuccessfully'] = 'Details Saved Successfully!';
$string['forgotpassword'] = 'Forgot Password?';

// Left Navigation Drawer.
$string['createarchivepage'] = 'Course Archive Page';
$string['createanewcourse'] = 'Create A New Course';
$string['remuisettings'] = 'RemUI Settings';

// Right Navigation Drawer.
$string['navbartype'] = 'Navbar Color';
$string['sidebarcolor'] = 'Sidebar Color';
$string['sitecolor'] = 'Site Color';
$string['applysitewide'] = 'Apply Sitewide';
$string['applysitecolor'] = 'Apply Site Color';
$string['sidebarpinned'] = 'Sidebar pinned.';
$string['sidebarunpinned'] = 'Sidebar unpinned.';
$string['pinsidebar'] = 'Pin sidebar';
$string['unpinsidebar'] = 'Unpin sidebar';
$string['primary'] = 'Primary';
$string['brown'] = 'Brown';
$string['cyan'] = 'Cyan';
$string['green'] = 'Green';
$string['grey'] = 'Grey';
$string['indigo'] = 'Indigo';
$string['orange'] = 'Orange';
$string['pink'] = 'Pink';
$string['purple'] = 'Purple';
$string['red'] = 'Red';
$string['teal'] = 'Teal';
$string['custom-color'] = 'Custom Color';
$string['dark'] = 'Dark';
$string['light'] = 'Light';

// General Settings.
$string['generalsettings'] = 'General settings';
$string['enableannouncement'] = "Enable Site-wide Announcement";
$string['enableannouncementdesc'] = "Enable site-wide announcement for all users.";
$string['enabledismissannouncement'] = "Enable Dismissable Site-wide Announcement";
$string['enabledismissannouncementdesc'] = "If Enabled, allow users to dismiss the announcement.";

$string['announcementtext'] = "Announcement";
$string['announcementtextdesc'] = "Announcement message to be displayed sitewide.";
$string['announcementtype'] = "Announcement type";
$string['announcementtypedesc'] = "Select announcement type to display different background color for the announcement.";
$string['typeinfo'] = "Information";
$string['typedanger'] = "Urgent";
$string['typewarning'] = "Warning";
$string['typesuccess'] = "Success";
$string['enablerecentcourses'] = 'Enable Recent Courses';
$string['enablerecentcoursesdesc'] = 'If enabled, Recent courses drop down menu will be displayed in header.';
$string['mergemessagingsidebar'] = 'Merge Message Panel';
$string['mergemessagingsidebardesc'] = 'Merge message panel into right sidebar';
$string['none'] = 'None';
$string['enablenewcoursecards'] = 'Course card Layouts';
$string['enablenewcoursecardsdesc'] = 'Select course card layout to appear on the course archive page.';
$string['activitynextpreviousbutton'] = 'Enable Next & Previous activity button';
$string['activitynextpreviousbuttondesc'] = 'When enabled, Next & Previous activity button will appear on the Single Activity page to switch between activities';
$string['disablenextprevious'] = 'Disable';
$string['enablenextprevious'] = 'Enable';
$string['enablenextpreviouswithname'] = 'Enable with Activity name';
$string['logoorsitename'] = 'Choose site logo format';
$string['logoorsitenamedesc'] = 'Logo Only - Large brand logo<br /> Logo Mini - Mini brand logo  <br /> Icon Only - An icon as brand <br/> Icon and sitename - Icon with sitename';
$string['onlylogo'] = 'Logo Only';
$string['logo'] = 'Logo';
$string['logomini'] = 'Logo Mini';
$string['icononly'] = 'Icon Only';
$string['iconsitename'] = 'Icon and sitename';
$string['logodesc'] = 'You may add the logo to be displayed on the header. Note- Preferred height is 50px. In case you wish to customise, you can do so from the custom CSS box.';
$string['logominidesc'] = 'You may add the logomini to be displayed on the header when sidebar is collapsed. Note- Preferred height is 50px. In case you wish to customise, you can do so from the custom CSS box.';
$string['siteicon'] = 'Site icon';
$string['siteicondesc'] = 'Don\'t have a logo? You could choose one from this <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new" ><b style="color:#17a2b8!important">list</b></a>. <br /> Just enter the text after "fa-".';
$string['customcss'] = 'Custom CSS';
$string['customcssdesc'] = 'You may customise the CSS from the text box above. The changes will be reflected on all the pages of your site.';
$string['favicon'] = 'Favicon';
$string['favicosize'] = 'Expected size is 16x16 pixels';
$string['favicondesc'] = 'Your site’s “favourite icon”. Here, you may insert the favicon for your site.';
$string['fontselect'] = 'Font type selector';
$string['fontselectdesc'] = 'Choose from either Standard fonts or <a href="https://fonts.google.com/" target="_new">Google web fonts</a> types. Please save to show the options for your choice. Note: If Customizer font is set to Standard then Google web font will be applied.';
$string['fonttypestandard'] = 'Standard font';
$string['fonttypegoogle'] = 'Google web font';
$string['fontname'] = 'Site Font';
$string['fontnamedesc'] = 'Enter the exact name of the font to use for Moodle.';
$string['googleanalytics'] = 'Google Analytics Tracking ID';
$string['googleanalyticsdesc'] = 'Please enter your Google Analytics Tracking ID to enable analytics on your website. The  tracking ID format shold be like [UA-XXXXX-Y].<br/>Please be aware that by including this setting, you will be sending data to Google Analytics and you should make sure that your users are warned about this. Our product does not store any of the data being sent to Google Analytics.';
$string['enablecoursestats'] = 'Enable Course Stats';
$string['enablecoursestatsdesc'] = 'If enabled, Administrator, Managers and teacher will see user stats related to the enrolled course on the Single Course page.';
$string['enabledictionary'] = 'Enable Dictionary';
$string['enabledictionarydesc'] = 'If enabled, Dictionary feature will be activated and which will show the meaning of selected text in popup.';
$string['more'] = 'More...';


// Frontpage Old String
// Home Page Settings.
$string['homepagesettings'] = 'Home Page Settings';
$string['frontpagedesign'] = 'Frontpage Design';
$string['frontpagedesigndesc'] = 'Enable Legacy Builder or Edwiser RemUI Homepage builder';
$string['frontpagechooser'] = 'Choose frontpage design';
$string['frontpagechooserdesc'] = 'Choose your frontpage design.';
$string['frontpagedesignold'] = 'Default: Legacy Homepage Builder';
$string['frontpagedesignolddesc'] = 'Default dashboard like previous.';
$string['frontpagedesignnew'] = 'New design';
$string['frontpagedesignnewdesc'] = 'Fresh new design with multiple sections. You can configure sections individualy on frontpage.';
$string['newhomepagedescription'] = 'Click on \'Site Home\' from the Navigation bar to go to \'Homepage Builder\' and create your own Homepage';
$string['frontpageloader'] = 'Upload loader image for frontpage';
$string['frontpageloaderdesc'] = 'This replace the default loader with your image';
$string['frontpageimagecontent'] = 'Header content';
$string['frontpageimagecontentdesc'] = ' This section relates to the top portion of your frontpage.';
$string['frontpageimagecontentstyle'] = 'Style';
$string['frontpageimagecontentstyledesc'] = 'You can choose between Static & Slider.';
$string['staticcontent'] = 'Static';
$string['slidercontent'] = 'Slider';
$string['addtext'] = 'Add Text';
$string['defaultaddtext'] = 'Education is a time-tested path to progress.';
$string['addtextdesc'] = 'Here you may add the text to be displayed on the front page, preferably in HTML.';
$string['uploadimage'] = 'Upload Image';
$string['uploadimagedesc'] = 'You may upload image as content for slide';
$string['video'] = 'iframe Embedded code';
$string['videodesc'] = ' Here, you may insert the iframe Embedded code of the video that is to be embedded.';
$string['contenttype'] = 'Select Content type';
$string['contentdesc'] = 'You can choose between image or give video url.';
$string['imageorvideo'] = 'Image/ Video';
$string['image'] = 'Image';
$string['videourl'] = 'Video URL';
$string['slideinterval'] = 'Slide interval';
$string['slideintervalplaceholder'] = 'Positive integer number in milliseconds.';
$string['slideintervaldesc'] = 'You may set the transition time between the slides. In case if there is one slide, this option will have no effect. If interval is invalid(empty|0|less than 0) then default interval is 5000 milliseconds.';
$string['slidercount'] = 'No of slides';
$string['slidercountdesc'] = '';
$string['one'] = '1';
$string['two'] = '2';
$string['three'] = '3';
$string['four'] = '4';
$string['five'] = '5';
$string['six'] = '6';
$string['eight'] = '8';
$string['nine'] = '9';
$string['twelve'] = '12';
$string['slideimage'] = 'Upload images for Slider';
$string['slideimagedesc'] = 'You may upload an image as content for this slide.';
$string['sliderurl'] = 'Add link to Slider button';
$string['slidertext'] = 'Add Slider text';
$string['defaultslidertext'] = '';
$string['slidertextdesc'] = 'You may insert the text content for this slide. Preferably in HTML.';
$string['sliderbuttontext'] = 'Add Text button on slide';
$string['sliderbuttontextdesc'] = 'You may add text to the button on this slide.';
$string['sliderurldesc'] = 'You may insert the link of the page where the user will be redirected once they click on the button.';
$string['sliderautoplay'] = 'Set Slider Autoplay';
$string['sliderautoplaydesc'] = 'Select ‘yes’ if you want automatic transition in your slideshow.';
$string['true'] = 'Yes';
$string['false'] = 'No';
$string['frontpageblocks'] = 'Body Content';
$string['frontpageblocksdesc'] = 'You may insert a heading for your site’s body';
$string['frontpageblockdisplay'] = 'About Us Section';
$string['frontpageblockdisplaydesc'] = 'You can show or hide the "About Us" section, also you can show "About Us" section in grid format';
$string['donotshowaboutus'] = 'Do Not Show';
$string['showaboutusinrow'] = 'Show Section in a Row';
$string['showaboutusingridblock'] = 'Show Section in Grid Block';

// About Us.
$string['frontpageaboutus'] = 'Frontpage About us';
$string['frontpageaboutusdesc'] = 'This section is for front page About us';
$string['frontpageaboutustitledesc'] = 'Add title to About Us Section';
$string['frontpageaboutusbody'] = 'Body Description for About Us Section';
$string['frontpageaboutusbodydesc'] = 'A brief description about this Section';
$string['enablesectionbutton'] = 'Enable buttons on Sections';
$string['enablesectionbuttondesc'] = 'Enable the buttons on body sections.';
$string['sectionbuttontextdesc'] = 'Enter the text for button in this Section.';
$string['sectionbuttonlinkdesc'] = 'Enter the URL link for this Section.';
$string['frontpageblocksectiondesc'] = 'Add title to this Section.';

// Block section 1.
$string['frontpageblocksection1'] = 'Body title for 1st Section';
$string['frontpageblockdescriptionsection1'] = 'Body description for 1st Section';
$string['frontpageblockiconsection1'] = 'Font-Awesome icon for 1st Section';
$string['sectionbuttontext1'] = 'Button text for 1st Section';
$string['sectionbuttonlink1'] = 'URL link for 1st Section';

// Block section 2.
$string['frontpageblocksection2'] = 'Body title for 2nd Section';
$string['frontpageblockdescriptionsection2'] = 'Body description for 2nd Section';
$string['frontpageblockiconsection2'] = 'Font-Awesome icon for 2nd Section';
$string['sectionbuttontext2'] = 'Button text for 2nd Section';
$string['sectionbuttonlink2'] = 'URL link for 2nd Section';

// Block section 3.
$string['frontpageblocksection3'] = 'Body title for 3rd Section';
$string['frontpageblockdescriptionsection3'] = 'Body description for 3rd Section';
$string['frontpageblockiconsection3'] = 'Font-Awesome icon for 3rd Section';
$string['sectionbuttontext3'] = 'Button text for 3rd Section';
$string['sectionbuttonlink3'] = 'URL link for 3rd Section';

// Block section 4.
$string['frontpageblocksection4'] = 'Body title for 4th Section';
$string['frontpageblockdescriptionsection4'] = 'Body description for 4th Section';
$string['frontpageblockiconsection4'] = 'Font-Awesome icon for 4th Section';
$string['sectionbuttontext4'] = 'Button text for 4th Section';
$string['sectionbuttonlink4'] = 'URL link for 4th Section';
$string['defaultdescriptionsection'] = 'Holisticly harness just in time technologies via corporate scenarios.';
$string['frontpagetestimonial'] = 'Frontpage Testimonial';
$string['frontpagetestimonialdesc'] = 'Frontpage Testimonial Section';
$string['enablefrontpageaboutus'] = 'Enable Testimonial section';
$string['enablefrontpageaboutusdesc'] = 'Enable the Testimonial section in front page.';
$string['frontpageaboutusheading'] = 'Testimonial Heading';
$string['frontpageaboutusheadingdesc'] = 'Heading for the default heading text for section';
$string['frontpageaboutustext'] = 'Testimonial text';
$string['frontpageaboutustextdesc'] = 'Enter testimonial text for frontpage.';
$string['frontpageaboutusdefault'] = '<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
              Ut enim ad minim veniam.</p>';
$string['testimonialcount'] = 'Testimonial Count';
$string['testimonialcountdesc'] = 'Number of testimonials to show.';
$string['testimonialimage'] = 'Testimonial Image';
$string['testimonialimagedesc'] = 'Person image to display with testimonial';
$string['testimonialname'] = 'Person Name';
$string['testimonialnamedesc'] = 'Name of person';
$string['testimonialdesignation'] = 'Person Designation';
$string['testimonialdesignationdesc'] = 'Person\'s designation.';
$string['testimonialtext'] = 'Person\'s Testimonial';
$string['testimonialtextdesc'] = 'What person says';
$string['frontpageblockimage'] = 'Upload image';
$string['frontpageblockimagedesc'] = 'You may upload an image as content for this.';
$string['frontpageblockiconsectiondesc'] = 'You can choose any icon from this <a href="https://fontawesome.com/v4.7.0/cheatsheet/" target="_new">list</a>. Just enter the text after "fa-". ';
$string['frontpageblockdescriptionsectiondesc'] = 'A brief description about the title.';

// Footer Page Settings.
$string['footersettings'] = 'Footer Settings';
$string['socialmedia'] = 'Social Media Settings';
$string['socialmediadesc'] = 'Enter the social media links for your site.';
$string['facebooksetting'] = 'Facebook Settings';
$string['facebooksettingdesc'] = 'Enter your site\'s facebook page link. For eg. https://www.facebook.com/pagename';
$string['twittersetting'] = 'Twitter Settings';
$string['twittersettingdesc'] = 'Enter your site\'s twitter page link. For eg. https://www.twitter.com/pagename';
$string['linkedinsetting'] = 'Linkedin Settings';
$string['linkedinsettingdesc'] = 'Enter your site\'s linkedin page link. For eg. https://www.linkedin.com/in/pagename';
$string['gplussetting'] = 'Google Plus Settings';
$string['gplussettingdesc'] = 'Enter your site\'s Google Plus page link. For eg. https://plus.google.com/pagename';
$string['youtubesetting'] = 'YouTube Settings';
$string['youtubesettingdesc'] = 'Enter your site\'s YouTube page link. For eg. https://www.youtube.com/channel/UCU1u6QtAAPJrV0v0_c2EISA';
$string['instagramsetting'] = 'Instagram Settings';
$string['instagramsettingdesc'] = 'Enter your site\'s Instagram page link. For eg. https://www.instagram.com/name';
$string['pinterestsetting'] = 'Pinterest Settings';
$string['pinterestsettingdesc'] = 'Enter your site\'s Pinterest page link. For eg. https://www.pinterest.com/name';
$string['quorasetting'] = 'Quora Settings';
$string['quorasettingdesc'] = 'Enter your site\'s Quora page link. For eg. https://www.quora.com/name';
$string['footerbottomtext'] = 'Footer Bottom-Left Text';
$string['footerbottomlink'] = 'Footer Bottom-Left Link';
$string['footerbottomlinkdesc'] = 'Enter the Link for the bottom-left section of Footer. For eg. http://www.yourcompany.com';
$string['footercolumn1heading'] = 'Footer Content for 1st Column (Left)';
$string['footercolumn1headingdesc'] = 'This section relates to the bottom portion (Column 1) of your frontpage.';
$string['footercolumn1title'] = '1st Footer Column title';
$string['footercolumn1titledesc'] = 'Add title to this column.';
$string['footercolumn1customhtml'] = 'Custom HTML';
$string['footercolumn1customhtmldesc'] = 'You can customize HTML of this column using above given textbox.';
$string['footercolumn2heading'] = 'Footer Content for 2nd Column (Middle)';
$string['footercolumn2headingdesc'] = 'This section relates to the bottom portion (Column 2) of your frontpage.';
$string['footercolumn2title'] = '2nd Footer Column Title';
$string['footercolumn2titledesc'] = 'Add title to this column.';
$string['footercolumn2customhtml'] = 'Custom HTML';
$string['footercolumn2customhtmldesc'] = 'You can customize HTML of this column using above given textbox.';
$string['footercolumn3heading'] = 'Footer Content for 3rd Column (Right)';
$string['footercolumn3headingdesc'] = 'This section relates to the bottom portion (Column 3) of your frontpage.';
$string['footercolumn3title'] = '3rd Footer Column Title';
$string['footercolumn3titledesc'] = 'Add title to this column.';
$string['footercolumn3customhtml'] = 'Custom HTML';
$string['footercolumn3customhtmldesc'] = 'You can customize HTML of this column using above given textbox.';
$string['footerbottomheading'] = 'Bottom Footer Setting';
$string['footerbottomdesc'] = 'Here you can specify your own link you want to enter at the bottom section of Footer';
$string['footerbottomtextdesc'] = 'Add text to Bottom Footer Setting.';
$string['poweredbyedwiser'] = 'Powered by Edwiser';
$string['poweredbyedwiserdesc'] = 'Uncheck to remove  \'Powered by Edwiser\' from your site.';

// Login Page Settings.
$string['loginsettings'] = 'Login Page Settings';
$string['navlogin_popup'] = 'Enable Login Popup';
$string['navlogin_popupdesc'] = 'Enable login popup to quickly login without redirecting to the login page.';
$string['loginsettingpic'] = 'Upload Background Image';
$string['loginsettingpicdesc'] = 'Upload image as a background for login form.';
$string['signuptextcolor'] = 'Site description color';
$string['signuptextcolordesc'] = 'Select the text color for Site description.';
$string['left'] = "Left side";
$string['right'] = "Right side";
$string['remember_me'] = "Remember Me";
$string['brandlogopos'] = "Show Logo on Login page";
$string['brandlogoposdesc'] = "If enabled, the brand logo will be displayed on the login page.";
$string['brandlogotext'] = "Site Description";
$string['brandlogotextdesc'] = "Add text for site description which will display on login and signup page. Keep this blank if don't want to put any description.";
$string['loginpagelayout'] = 'Login page layout';
$string['loginpagelayoutdesc'] = '';
$string['centerlayout'] = 'Centered Layout';
$string['overlaylayout'] = 'Right Overlay Layout';

// License Settings.
$string['licensenotactive'] = '<strong>Alert!</strong> License is not activated , please <strong>activate</strong> the license in RemUI settings.';
$string['licensenotactiveadmin'] = '<strong>Alert!</strong> License is not activated , please <strong>activate</strong> the license <a href="'.$CFG->wwwroot.'/admin/settings.php?section=themesettingremui#informationcenter" >here</a>.';
$string['activatelicense'] = 'Activate License';
$string['deactivatelicense'] = 'Deactivate License';
$string['renewlicense'] = 'Renew License';
$string['deactivated'] = 'Deactivated';
$string['active'] = 'Active';
$string['notactive'] = 'Not Active';
$string['expired'] = 'Expired';
$string['licensekey'] = 'License key';
$string['licensestatus'] = 'License Status';
$string['no_activations_left'] = 'Limit exceeded';
$string['activationfailed'] = 'License Key activation failed. Please try again later.';
$string['noresponsereceived'] = 'No response received from the server. Please try again later.';
$string['licensekeydeactivated'] = 'License Key is deactivated.';
$string['siteinactive'] = 'Site inactive (Press Activate license to activate plugin).';
$string['entervalidlicensekey'] = 'Please enter valid license key.';
$string['nolicenselimitleft'] = 'Maximum activation limit reached, No activations left.';
$string['licensekeyisdisabled'] = 'Your license key is Disabled.';
$string['licensekeyhasexpired'] = "Your license key has Expired. Please, Renew it.";
$string['licensekeyactivated'] = "Your license key is activated.";
$string['entervalidlicensekey'] = "Please enter correct license key.";
$string['edwiserremuilicenseactivation'] = 'Edwiser RemUI License Activation';

// News And Updates Page.
$string['newsandupdates'] = 'News & Updates';
$string['newupdatemessage'] = 'New Update Available for Edwiser plugin. <a class="text-white" href="{$a}"><u>Click here</u></a> to see.';
$string['currentversionmessage'] = 'Your current version is ';
$string['downloadupdate'] = 'Download Update';
$string['latestversionmessage'] = 'You are using the latest version of RemUI.';
$string['rateremui'] = 'Rate RemUI';
$string['fullname']  = 'Full Name';
$string['providefeedback'] = 'Please provide your feedback about RemUI';
$string['sendfeedback'] = 'Send Feedback';
$string['recentnews'] = 'Recent News';

// About Edwiser RemUI.
$string['aboutsettings'] = 'About Edwiser RemUI';
$string['notenrolledanycourse'] = 'Not enrolled in any course.';

// My Course Page.
$string['resume'] = 'Resume';
$string['start'] = 'Start';
$string['completed'] = 'Completed';

// Course.
$string['graderreport'] = 'Grader Report';
$string['enroluser'] = 'Enrol Users';
$string['activityeport'] = 'Activity Report';
$string['editcourse'] = 'Edit Course';
$string['sections'] = "Sections";
// Next Previous Activity.
$string['activityprev'] = 'Previous Activity';
$string['activitynext'] = 'Next Activity';

// Login Page.
$string['signin'] = 'Sign In';
$string['signup'] = 'Sign Up';
$string['noaccount'] = 'No Account?';

// Incourse Page.
$string['backtocourse'] = 'Course Overview';

// Header Section.
$string['togglefullscreen'] = 'Toggle fullscreen';
$string['recent'] = 'Recent';

// Course Stats.
$string['enrolledusers'] = 'Enrolled <br>Students';
$string['studentcompleted'] = 'Students <br>Completed';
$string['inprogress'] = 'In <br>Progress';
$string['yettostart'] = 'Yet <br>to Start';

// Footer Content.
$string['followus'] = 'Follow Us';
$string['poweredby'] = 'Powered by';

// Course Archive Page.
$string['mycourses'] = "My Courses";
$string['allcategories'] = 'All categories';
$string['categorysort'] = 'Sort Categories';
$string['sortdefault'] = 'Sort (none)';
$string['sortascending'] = 'Sort A to Z';
$string['sortdescending'] = 'Sort Z to A';

// Dashboard Blocks.
$string['viewcourse'] = "VIEW COURSE";
$string['viewcourselow'] = "view course";
$string['searchcourses'] = "Search courses";

$string['hiddencourse'] = 'Hidden Course';

// Usage tracking.
$string['enableusagetracking'] = "Enable Usage Tracking";
$string['enableusagetrackingdesc'] = "<strong>USAGE TRACKING NOTICE</strong>

<hr class='text-muted' />

<p>Edwiser from now on will collect anonymous data to generate product usage statistics.</p>

<p>This information will help us guide the development in right direction and the Edwiser community prosper.</p>

<p>Having said that we don't gather your personal data or of your students during this process. You can disable this from the plugin whenever you wish to opt out of this service.</p>

<p>An overview of the data collected is available <strong><a href='https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products' target='_blank'>here</a></strong>.</p>";

$string['curlconnectionerror'] = 'Curl - Connection Error !';
$string['purchasecodeinvalid'] = 'The Purchase Code is Invalid!';
$string['validatecodefail'] = 'Failed to validate code due to an error: HTTP';
$string['errorparsingresponse'] = 'Error parsing response';
$string['enterlicensekey'] = "Enter license key...";
$string['invalid'] = "Invalid";

$string['focusmodesettings'] = 'Focus Mode Settings';
$string['focusmode'] = 'Focus Mode';
$string['enablefocusmode'] = 'Enable Focus Mode';
$string['enablefocusmodedesc'] = 'If enabled, a button to switch to distraction free learning will appear on the course page.';
$string['focusmodeenabled'] = 'Focus Mode Enabled';
$string['focusmodedisabled'] = 'Focus Mode Disabled';
$string['coursedata'] = 'Course data';

$string['prev'] = 'Previous';
$string['next'] = 'Next';
$string['continue'] = 'Continue';
$string['savenext'] = 'Save & Next';

// RemUI one-click update.
$string['errors'] = 'Errors';
$string['invalidzip'] = 'Invalid zip file. <b>{$a}</b>';
$string['errorfetching'] = 'Error fetching plugin ZIP. <b>{$a}</b>';
$string['errorfetchingexist'] = 'Error fetching plugin ZIP: target location exists. <b>{$a}</b>';
$string['unabletounzip'] = 'Unable to unzip <b>{$a}</b>';
$string['unabletoloadplugindetails'] = 'Unable to load Plugin details <b>{$a}</b>';
$string['requirehigherversion'] = 'Requires Moodle version: <b>{$a}</b>';
$string['noupdates'] = 'Everything is up to date.';
$string['invalidjsonfile'] = 'Error: Invalid json of Edwiser product list.';
$string['recommendation'] = 'Recommended Plugins';
$string['comeswith'] = 'Comes with: {$a}';
$string['changelog'] = 'Changelog';
$string['currentrelease'] = 'Current release: {$a}';
$string['updateavailable'] = 'Update available: {$a}';
$string['uptodate'] = 'Up to date';
$string['updatedown'] = 'Update service is down temporarily. <br>Error - {$a}.';

// Information center.
$string['informationcenter'] = 'Information Center';

$string['nocoursefound'] = 'No Course Found';

$string['badges'] = 'Badges';

$string['brandlogo'] = 'Brand Logo';
$string['brandname'] = 'Brand Name';
$string['accordioncontrolmycourses'] = 'Accordion Control for My Courses';
$string['drawerfootermenu'] = 'Navigation Footer Menu';

// Course Page Settings.
$string['coursesettings'] = "Course Page Settings";
$string['enrolpagesettings'] = "Enrolment Page Settings";
$string['enrolpagesettingsdesc'] = "Manage the enrolment page content here.";
$string['coursearchivepagesettings'] = 'Course Archive Page Settings';
$string['coursearchivepagesettingsdesc'] = 'Manage the layout and content of Course archive page.';

$string['currency'] = 'USD';
$string['currency_symbol'] = '$';
$string['enrolment_payment'] = 'Course payment';
$string['enrolment_payment_desc'] = 'Settings for course enrolment preferences. Do all courses require payment, or are some free? This setting dictates how course enrolment will work and be displayed.';
$string['allrequirepayment'] = 'All courses require payment';
$string['somearefree'] = 'Some courses are free';
$string['allarefree'] = 'All courses are free';

$string['showcoursepricing'] = 'Show Course Pricing';
$string['showcoursepricingdesc'] = 'Enable this setting to show the pricing section on enrollment page.';
$string['fullwidthcourseheader'] = 'Full Width Course Header';
$string['fullwidthcourseheaderdesc'] = 'Enable this setting to make course header full width.';

$string['price'] = 'Price';
$string['course_free'] = 'FREE';
$string['enrolnow'] = 'Enrol Now';
$string['buyand'] = 'Buy & ';
$string['notags'] = 'No Tags.';
$string['tags'] = 'Tags';

$string['enrolment_layout'] = 'Enrolment Page Layout';
$string['enrolment_layout_desc'] = 'Enable Edwiser Layout for new and improved Enrolment Page design.';
$string['disable'] = 'Disable';
$string['defaultlayout'] = 'Default Moodle layout';
$string['enable_layout1'] = 'Edwiser Layout';

$string['webpage'] = "Web Page";
$string['categorypagelayout'] = 'Course archive Page Layout';
$string['categorypagelayoutdesc'] = 'Select between the Course archive page layouts.';
$string['edwiserlayout'] = 'Edwiser Layout';
$string['categoryfilter'] = 'Category Filter';

$string['skill1'] = 'Beginner';
$string['skill2'] = 'Intermediate';
$string['skill3'] = 'Advanced';

$string['lastupdatedon'] = 'Last Updated On ';

// Plural and Singular.
$string['hourcourse'] = ' Hour Course';
$string['hourscourse'] = ' Hours Course';
$string['enrolledstudent'] = ' Student Enrolled';
$string['enrolledstudents'] = ' Students Enrolled';
$string['downloadresource'] = ' Downloadable Resource';
$string['assignment'] = ' Assignment';
$string['strcourse'] = ' Course';
$string['strcourses'] = ' Courses';
$string['strstudent'] = ' Student';
$string['strstudents'] = ' Students';
$string['showenrolledcourses'] = 'Show enrolled courses';
$string['categoryselectionrequired'] = 'Category Selection Required.';
$string['courseoverview'] = 'Course Overview';
$string['coursecontent'] = 'Course Content';
$string['startdate'] = 'Start Date';
$string['category'] = 'Category';
$string['aboutinstructor'] = "About the Instructor";
$string['showmore'] = "Show More";
$string['coursefeatures'] = "Course Features";

$string['lectures'] = "Lectures";
$string['quizzes'] = "Quizzes";
$string['startdate'] = "Start Date";
$string['skilllevel'] = "Skill level";
$string['language'] = "Language";
$string['assessments'] = "Assessments";

// Customizer strings.
$string['customizer-migrate-notice'] = 'Color settings are migrated to Customizer. Please click below button to open customizer.';
$string['customizer-close-heading'] = 'Close customizer';
$string['customizer-close-description'] = 'Unsaved changes will be discarded. Would you like to continue?';
$string['reset'] = 'Reset';
$string['reset-settings'] = 'Reset all customizer settings';
$string['reset-settings-description'] = '<div>Customizer settings will be restored to default. Do you want to continue?</div><div class="mt-3 font-italic"><strong>Note:</strong> It will not remove the Custom CSS added to the setting.<br>
You need to manually remove the CSS  from the Custom CSS setting if required.</div>';
$string['customizer'] = 'Customizer';
$string['error'] = 'Error';
$string['resetdesc'] = 'Reset setting to last save or default when nothing saved';
$string['noaccessright'] = 'Sorry! You don\'t have rights to use this page';
$string['font-family'] = 'Font family';
$string['font-family_help'] = 'Set font family of {$a}';
$string['font-size'] = 'Font size';
$string['font-size_help'] = 'Set font size of {$a}';
$string['font-weight'] = 'Font weight';
$string['font-weight_help'] = 'Set font weight of {$a}. The font-weight property sets how thick or thin characters in text should be displayed.';
$string['line-height'] = 'Line height';
$string['line-height_help'] = 'Set line height of {$a}';
$string['global'] = 'Global';
$string['global_help'] = 'You can manage global settings like color, font, heading, buttons etc.';
$string['site'] = 'Site';
$string['text-color'] = 'Text color';
$string['text-color_help'] = 'Set text color of {$a}';
$string['text-hover-color'] = 'Text hover color';
$string['text-hover-color_help'] = 'Set text hover color of {$a}';
$string['link-color'] = 'Link color';
$string['link-color_help'] = 'Set link color of {$a}';
$string['link-hover-color'] = 'Link hover color';
$string['link-hover-color_help'] = 'Set link hover color of {$a}';
$string['typography'] = 'Typography';
$string['inherit'] = 'Inherit';
$string["weight-100"] = 'Thin 100';
$string["weight-200"] = 'Extra-Light 200';
$string["weight-300"] = 'Light 300';
$string["weight-400"] = 'Normal 400';
$string["weight-500"] = 'Medium 500';
$string["weight-600"] = 'Semi-Bold 600';
$string["weight-700"] = 'Bold 700';
$string["weight-800"] = 'Extra-Bold 800';
$string["weight-900"] = 'Ultra-Bold 900';
$string['text-transform'] = 'Text transform';
$string['text-transform_help'] = 'The text-transform property controls the capitalization of text. Set text transform of {$a}.';
$string["default"] = 'Default';
$string["none"] = 'None';
$string["capitalize"] = 'Capitalize';
$string["uppercase"] = 'Uppercase';
$string["lowercase"] = 'Lowercase';
$string['background-color'] = 'Background color';
$string['background-color_help'] = 'Set background color of {$a}';
$string['background-hover-color'] = 'Background hover color';
$string['background-hover-color_help'] = 'Set background hover color of {$a}';
$string['color'] = 'Color';
$string['customizing'] = 'Customizing';
$string['savesuccess'] = 'Saved successfully.';
$string['mobile'] = 'Mobile';
$string['tablet'] = 'Tablet';
$string['hide-customizer'] = 'Hide customizer';
$string['customcss_help'] = 'You can add custom CSS. This will be applied on all the pages of your site.';

// Customizer Global body.
$string['body'] = 'Body';
$string['body-font-family_desc'] = 'Set font family for entire site. Note if set tot Standard then font from RemUI setting will be applied.';
$string['body-font-size_desc'] = 'Set base font size for entire site.';
$string['body-fontweight_desc'] = 'Set font weight for entire site.';
$string['body-text-transform_desc'] = 'Set text transform for entire site.';
$string['body-lineheight_desc'] = 'Set line height for entire site.';
$string['faviconurl_help'] = 'Favicon url';

// Customizer Global heading.
$string['heading'] = 'Heading';
$string['use-custom-color'] = 'Use custom color';
$string['use-custom-color_help'] = 'Use custom color for {$a}';
$string['typography-heading-all-heading'] = 'Headings (H1 - H6)';
$string['typography-heading-h1-heading'] = 'Heading 1';
$string['typography-heading-h2-heading'] = 'Heading 2';
$string['typography-heading-h3-heading'] = 'Heading 3';
$string['typography-heading-h4-heading'] = 'Heading 4';
$string['typography-heading-h5-heading'] = 'Heading 5';
$string['typography-heading-h6-heading'] = 'Heading 6';

// Customizer Colors.
$string['primary-color'] = 'Primary color';
$string['primary-color_help'] = 'Apply primary color to entire site. This color will be applied to header brand, primary button, right drawer toggler, goto top button, etc. To use it you can apply bg-primary for background and btn-primary for button.';
$string['page-background'] = 'Page background';
$string['page-background_help'] = 'Set custom page background to page content area. You can choose color, gradient or image. Gradient color angle is 100deg.';
$string['page-background-color'] = 'Page background color';
$string['page-background-color_help'] = 'Set background color to page content area.';
$string['page-background-image'] = 'Page background image';
$string['page-background-image_help'] = 'Set image as background for page content area.';
$string['gradient'] = 'Gradient';
$string['gradient-color1'] = 'Gradient color 1';
$string['gradient-color1_help'] = 'Set first color of gradient';
$string['gradient-color2'] = 'Gradient color 2';
$string['gradient-color2_help'] = 'Set second color of gradient';
$string['page-background-imageattachment'] = 'Background image attachment';
$string['page-background-imageattachment_help'] = 'The background-attachment property sets whether a background image scrolls with the rest of the page, or is fixed.';
$stirng['image'] = 'Image';
$string['additional-css'] = 'Additional css';
$string['left-sidebar'] = 'Left sidebar';
$string['main-sidebar'] = 'Main sidebar';
$string['sidebar-links'] = 'Sidebar links';
$string['secondary-sidebar'] = 'Secondary sidebar';
$string['header'] = 'Header';
$string['menu'] = 'Menu';
$string['site-identity'] = 'Site Identity';
$string['primary-header'] = 'Primary header';
$string['color'] = 'Color';

// Customizer Buttons.
$string['buttons'] = 'Buttons';
$string['border'] = 'Border';
$string['border-width'] = 'Border width';
$string['border-width_help'] = 'Set border width of {$a}';
$string['border-color'] = 'Border color';
$string['border-color_help'] = 'Set border color of {$a}';
$string['border-hover-color'] = 'Border hover color';
$string['border-hover-color_help'] = 'Set border hover color of {$a}';
$string['border-radius'] = 'Border radius';
$string['border-radius_help'] = 'Set border radius of {$a}';
$string['letter-spacing'] = 'Letter spacing';
$string['letter-spacing_help'] = 'Set letter spacing of {$a}';
$string['text'] = 'Text';
$string['padding'] = 'Padding';
$string['padding-top'] = 'Padding top';
$string['padding-top_help'] = 'Set padding top of {$a}';
$string['padding-right'] = 'Padding right';
$string['padding-right_help'] = 'Set padding right of {$a}';
$string['padding-bottom'] = 'Padding bottom';
$string['padding-bottom_help'] = 'Set padding bottom of {$a}';
$string['padding-left'] = 'Padding left';
$string['padding-left_help'] = 'Set padding left of {$a}';
$string['secondary'] = 'Secondary';
$string['colors'] = 'Colors';

// Customizer Header.
$string['header-background-color_help'] = 'Set background color of header. Brand logo background color will be primary color. This color will be applied for menu items.';
$string['site-logo'] = 'Site logo';
$string['header-menu'] = 'Header menu';
$string['border-bottom-size'] = 'Border bottom size';
$string['border-bottom-size_help'] = 'Set border bottom size of site header';
$string['border-bottom-color'] = 'Border bottom color';
$string['border-bottom-color_help'] = 'Set border bottom color of site header';
$string['layout-desktop'] = 'Layout desktop';
$string['layout-desktop_help'] = 'Set header\'s layout for desktop';
$string['layout-mobile'] = 'Layout mobile';
$string['layout-mobile_help'] = 'Set header\'s layout for mobile';
$string['header-left'] = 'Left icon right menu';
$string['header-right'] = 'Right icon left menu';
$string['header-top'] = 'Top icon bottom menu';
$string['hover'] = 'Hover';
$string['logo'] = 'Logo';
$string['applynavbarcolor'] = 'Set site color of navbar';
$string['header-background-color-warning'] = 'Will not be used if <strong>Set site color of navbar</strong> is enabled.';
$string['applynavbarcolor_help'] = 'Site\'s primary color will be applied to entire header. Changing primary color will change background color of header. You can still apply custom text color and hover color to header menus.';
$string['logosize'] = 'Expected aspect ratio is 130:33 for left view, 140:33 for right view.';
$string['logominisize'] = 'Expected aspect ratio is 40:33.';
$string['sitenamewithlogo'] = 'Site name with logo(Top view only)';

// Customizer Sidebar.
$string['link-text'] = 'Link text';
$string['link-text_help'] = 'Set link text color of {$a}';
$string['link-icon'] = 'Link icon';
$string['link-icon_help'] = 'Set link icon color of {$a}';
$string['active-link-color'] = 'Active link color';
$string['active-link-color_help'] = 'Set custom color to active link of {$a}';
$string['active-link-background'] = 'Active link background';
$string['active-link-background_help'] = 'Set custom color to active link background of {$a}';
$string['link-hover-background'] = 'Link hover background';
$string['link-hover-background_help'] = 'Set link hover background to {$a}';
$string['link-hover-text'] = 'Link hover text';
$string['link-hover-text_help'] = 'Set link hover text color of {$a}';
$string['hide-dashboard'] = 'Hide Dashboard';
$string['hide-dashboard_help'] = 'By enabling this, Dashboard item from sidebar will hidden';
$string['hide-home'] = 'Hide Home';
$string['hide-home_help'] = 'By enabling this, Home item from sidebar will hidden';
$string['hide-calendar'] = 'Hide Calendar';
$string['hide-calendar_help'] = 'By enabling this, Calendar item from sidebar will hidden';
$string['hide-private-files'] = 'Hide Private Files';
$string['hide-private-files_help'] = 'By enabling this, Private Files item from sidebar will hidden';
$string['hide-my-courses'] = 'Hide My Courses';
$string['hide-my-courses_help'] = 'By enabling this, My courses and nested course items from sidebar will hidden';
$string['hide-content-bank'] = 'Hide Content bank';
$string['hide-content-bank_help'] = 'By enabling this, Content bank item from sidebar will hidden';

// Customizer Footer.
$string['footer'] = 'Footer';
$string['basic'] = 'Basic';
$string['advance'] = 'Advance';
$string['footercolumn'] = 'Widget';
$string['footercolumndesc'] = 'Number of widgets to show in footer.';
$string['footercolumntype'] = 'Type';
$string['footercolumntypedesc'] = 'You can choose footer widget type';
$string['footercolumnsocial'] = 'Social media links';
$string['footercolumnsocialdesc'] = 'Show selective social media links';
$string['footercolumntitle'] = 'Title';
$string['footercolumntitledesc'] = 'Add title to this widget.';
$string['footercolumncustomhtml'] = 'Content';
$string['footercolumncustomhtmldesc'] = 'You can customize content of this widgest using below given editor.';
$string['both'] = 'Both';
$string['footercolumnsize'] = 'Widget Size';
$string['footercolumnsizenote'] = 'Drag vertical line to adjust widget size.';
$string['footercolumnsizedesc'] = 'You can set individual widget size.';
$string['footercolumnmenu'] = 'Menu';
$string['footercolumnmenudesc'] = 'Link menu';
$string['footermenu'] = 'Menu';
$string['footermenudesc'] = 'Add menu in footer widget.';
$string['customizermenuadd'] = 'Add menu item';
$string['customizermenuedit'] = 'Edit menu item';
$string['customizermenumoveup'] = 'Move menu item up';
$string['customizermenuemovedown'] = 'Move menu item down';
$string['customizermenuedelete'] = 'Delete menu item';
$string['menutext'] = 'Text';
$string['menuaddress'] = 'Address';
$string['menuorientation'] = 'Menu orientation';
$string['menuorientationdesc'] = 'Set orientation of menu. Orientation can be either vertical or horizontal.';
$string['menuorientationvertical'] = 'Vertical';
$string['menuorientationhorizontal'] = 'Horizontal';
$string['footerfacebook'] = 'Facebook';
$string['footertwitter'] = 'Twitter';
$string['footerlinkedin'] = 'Linkedin';
$string['footergplus'] = 'Google Plus';
$string['footeryoutube'] = 'Youtube';
$string['footerinstagram'] = 'Instagram';
$string['footerpinterest'] = 'Pinterest';
$string['footerquora'] = 'Quora';
$string['footershowlogo'] = 'Show Logo';
$string['footershowlogodesc'] = 'Show logo in the secondary footer.';
$string['footersecondarysocial'] = 'Show social media links';
$string['footersecondarysocialdesc'] = 'Show social media links in the secondary footer.';
$string['footertermsandconditionsshow'] = 'Show Terms & Conditions';
$string['footertermsandconditions'] = 'Terms & Conditions Link';
$string['footertermsandconditionsdesc'] = 'You can add link for Terms & Conditions page.';
$string['footerprivacypolicyshow'] = 'Show Privacy Policy';
$string['footerprivacypolicy'] = 'Privacy Policy Link';
$string['footerprivacypolicydesc'] = 'You can add link for Privacy Policy page.';
$string['footercopyrightsshow'] = 'Show Copyrights Content';
$string['footercopyrights'] = 'Copyrights Content';
$string['footercopyrightsdesc'] = 'Add Copyrights content in the bottom of page.';
$string['footercopyrightstags'] = 'Tags:<br>[site]  -  Site name<br>[year]  -  Current year';
$string['termsandconditions'] = 'Terms & Conditions';
$string['privacypolicy'] = 'Privacy Policy';

// Customizer login.
$string['login'] = 'Login';
$string['panel'] = 'Panel';
$string['page'] = 'Page';
$string['loginbackgroundopacity'] = 'Login background opacity';
$string['loginbackgroundopacity_help'] = 'Apply opacity to login page background image.';
$string['loginpanelbackgroundcolor_help'] = 'Apply background color to login panel.';
$string['loginpaneltextcolor_help'] = 'Apply text color to login panel.';
$string['loginpanellinkcolor_help'] = 'Apply link color to login panel.';
$string['loginpanellinkhovercolor_help'] = 'Apply link hover color to login panel.';
$string['login-panel-position'] = 'Login panel position';
$string['login-panel-position_help'] = 'Set position for login and registration panel';
$string['login-panel-logo-default'] = 'Header logo';
$string['login-panel-logo-desc'] = 'Depends on <strong>Choose site logo format setting</strong>';
$string['login-page-info'] = 'Login page cannot be previewed in customizer because it can be viewed by logged out user only.
You can test setting by saving and opening login page in incognito mode.';

// One click report  bug/feedback.
$string['sendfeedback'] = "Send Feedback to Edwiser";
$string['descriptionmodal_text1'] = "<p>Feedback lets you send us suggestions about our products. We welcome problem reports, feature ideas and general comments.</p><p>Start by writing a brief description:</p>";
$string['descriptionmodal_text2'] = "<p>Next we\'ll let you identify areas of the page related to your description.</p>";
$string['emptydescription_error'] = "Please enter a description.";
$string['incorrectemail_error'] = "Please enter proper email ID.";

$string['highlightmodal_text1'] = "Click and drag on the page to help us better understand your feedback. You can move this dialog if it\'s in the way.";
$string['highlight_button'] = "Highlight area";
$string['blackout_button'] = "Hide info";
$string['highlight_button_tooltip'] = "Highlight areas relevant to your feedback.";
$string['blackout_button_tooltip'] = "Hide any personal information.";

$string['feedbackmodal_next'] = 'Take Screenshot and Continue';
$string['feedbackmodal_skipnext'] = 'Skip and Continue';
$string['feedbackmodal_previous'] = 'Back';
$string['feedbackmodal_submit'] = 'Submit';
$string['feedbackmodal_ok'] = 'Okay';

$string['description_heading'] = 'Description';
$string['feedback_email_heading'] = 'Email';
$string['additional_info'] = 'Additional info';
$string['additional_info_none'] = 'None';
$string['additional_info_browser'] = 'Browser Info';
$string['additional_info_page'] = 'Page Info';
$string['additional_info_pagestructure'] = 'Page Structure';
$string['feedback_screenshot'] = 'Screenshot';
$string['feebdack_datacollected_desc'] = 'An overview of the data collected is available <strong><a href="https://forums.edwiser.org/topic/67/anonymously-tracking-the-usage-of-edwiser-products" target="_blank">here</a></strong>.';

$string['submit_loading'] = 'Loading...';
$string['submit_success'] = 'Thank you for your feedback. We value every piece of feedback we receive.';
$string['submit_error'] = 'Sadly an error occured while sending your feedback. Please try again.';
$string['send_feedback_license_error'] = "Please activate the license to get product support.";
$string['disabled'] = 'Disabled';

// Setup wizard.
$string['setupwizard'] = "Setup Wizard";
$string['general'] = "General";
$string['coursepage'] = "Course Page";
$string['pagelayout'] = "Page Layout";
$string['loginpage'] = "Login Page";
$string['skipsetupwizard'] = "Skip Setup Wizard";
$string['setupwizardmodalmsg'] = "One step away from using Edwiser RemUI, Click on Setup Wizard to customize the theme, \"Cancel\" to use default Setting.";
$string["alert"] = "Alert";
$string["success"] = "Success";
$string["customizemore"] = "Click here to customize more with";
$string["finish"] = "Finish";
$string['coursesection'] = "Course Content";
$string['coursespecificlinks'] = "Course Navigation";
$string['universallinks'] = 'Site Navigation';

// Importer.
$string['importer'] = 'Importer';
$string['importer-missing'] = 'Edwiser Site Importer plugin is missing. Please visit <a href="https://edwiser.org">Edwiser</a> site to download this plugin.';

// Notification
$string['inproductnotification'] = "Update user preferences (In-product Notification) - RemUI";

$string["noti_enrolandcompletion"] = 'The modern, professional-looking Edwiser RemUI layouts have helped brilliantly in increasing your overall learner engagement with <b>{$a->enrolment} new course enrollments and {$a->completion} course completions</b> this month';

$string["noti_completion"] = 'Edwiser RemUI has improved your student engagement levels: You have a total of <b>{$a->completion} course completions</b> this month';

$string["noti_enrol"] = 'Your LMS design looks great with Edwiser RemUI: You have <b>{$a->enrolment} new course enrollments</b> in your portal this month';

$string["coolthankx"] = "Cool, Thanks!";

// Languages
$string["en"] = "English";

$string['coursepagesettings'] = "Course Page Settings";
$string['coursepagesettingsdesc'] = "Courses related settings.";
$string['setthemeasdefault'] = "Set RemUI as default theme";
$string['setthemeasdefaultwithwizard'] = "Set RemUI as default theme and run setup wizard";
$string['setthememanually'] = "Do it later manually";

$string["formsettings"] = "Forms Settings";
$string["formsdesign"] = "Forms Input Design";
$string["formsdesigndesc"] = "This setting will help you change the design of form elements.";
$string["formsdesign1"] = "Rounded border form layout";
$string["formsdesign3"] = "Material form layout";

$string["iconsettings"] = "Icons Settings";
$string["icondesign"] = "Icons Design";
$string["icondesigndesc"] = "This setting will help you change the design of icon elements.";
$string["icondesign1"] = "Dark";
$string["icondesign2"] = "Light";

$string["formselementdesign"] = "Form Element Design";

$string['loginpagelayout'] = 'Login Page Layout';
$string['loginpagelayoutdesc'] = 'Choose login page layout design.';
$string['logincenter'] = 'Center aligned login';
$string['loginleft'] = 'Left side login';
$string['loginright'] = 'Right side login';

$string['enableedwfeedback'] = "Edwiser Feedback & Support";
$string['enableedwfeedbackdesc'] = "Enable Edwiser Feedback & Support, visible to Admins only.";
$string["checkfaq"] = "Edwiser RemUI - Check FAQ";
$string["gotop"] = "Go Top";

$string["coursecarddesign"] = "Edwiser Course card layout";


$string['coursecategories'] = 'Categories';
$string['enabledisablecoursecategorymenu'] = "Category drop down in header";
$string['enabledisablecoursecategorymenudesc'] = "Keep this enabled if you want to display the category drop-down menu in the header";
$string['coursecategoriestext'] = "Rename Category drop-down in the Header";
$string['coursecategoriestextdesc'] = "You can add a custom name for the category drop down menu in the header.";

$string['courseperpage'] = 'Courses Per Page';
$string['courseperpagedesc'] = 'Number of Courses to be Displayed Per Pages on Course Archive Page.';
$string['none'] = 'None';
$string['fade'] = 'Fade';
$string['slide-top'] = 'Slide Top';
$string['slide-bottom'] = 'Slide Bottom';
$string['slide-right'] = 'Slide Right';
$string['scale-up'] = 'Scale Up';
$string['scale-down'] = 'Scale Down';
$string['courseanimation'] = 'Course Card animation';
$string['courseanimationdesc'] = 'Select Course card animation to appear on the course archive page';

$string['gridview'] = 'Grid view';
$string['listview'] = 'List view';

$string['searchcatplaceholdertext'] = 'Search';
$string['versionforheading'] = '  <span class="small remuiversion">version {$a}</span>';
$string['themeversionforinfo'] = '<span>Currently installed version: Edwiser RemUI v{$a}</span>';
$string['hiddenlogo'] = "Disable";
$string['sidebarregionlogo'] = 'On the login card';
$string['maincontentregionlogo'] = 'On the central region';
