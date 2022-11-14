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
namespace local_remuihomepage\frontpage\sections;
defined('MOODLE_INTERNAL') || die();
defined('SEC_HTML') || define('SEC_HTML', 'section_html');

use context_system;

trait html_form {

    /**
     * Get the validation js script for html form
     * @return string html string which contain js code for validation
     */
    private function html_form_validation_js() {
        ob_start();
        ?>
        <script type="text/javascript">
            function validate(styles) {
                var Ajax = require('core/ajax');
                return Ajax.call([{
                    methodname: 'local_remuihomepage_html_section_validate_css',
                    args: {
                        styles: styles
                    }
                }])[0];
            }
            var remui_section_form_validate = async function(root) {
                var valid = true;
                var scrolled = false;
                var scrollTo = function(element) {
                    if (!scrolled) {
                        $(element).closest('.modal-content').animate({
                            scrollTop: $(element).closest('.felement').position().top
                        }, 0);
                        scrolled = true;
                    }
                }
                var count = $(root).find('#id_blocks').val();
                var styles = [];
                for (var i = 0; i < count; i++) {
                    styles.push($('#id_block_' + i + '_style').val());
                }
                try {
                    var response = await validate(styles);
                    response.forEach(function(error, i) {
                        if (error != false) {
                            $('#id_block_' + i + '_style').addClass('is-invalid')
                            .siblings('.form-control-feedback').text(error)
                            .closest('.fitem').addClass('has-danger');
                            valid = false;
                        } else {
                            $('#id_block_' + i + '_style').removeClass('is-invalid')
                            .closest('.fitem').addClass('has-danger');
                        }
                    });
                } catch(exception) {
                    var Notification = require('core/notification');
                    Notification.exception(exception);
                    valid = false;
                };
                return valid;
             }
        </script>
        <?php
        return ob_get_clean();
    }

    /**
     * Returns the html form.
     * @param  stdClass &$mform   Form object.
     * @param  array    $formdata Form data.
     * @param  string   $config   Saved configuration
     * @return stdClass           Form object with data.
     */
    private function htmlform(&$mform, $formdata, $configdata) {

        $mform->addElement('html', $this->html_form_validation_js());

        // Number of rows Setting.
        $blocks = array_combine(range(1, 4), range(1, 4));

        $formdata["blocks"] = (!isset($formdata['blocks'])) ? $blocks['1'] : $formdata['blocks'];
        $mform->addElement(
            'select',
            'blocks',
            get_string('blocks', COMPONENT),
            $blocks,
            array('class' => 'updateform ml-0 mr-5 mb-10')
        );
        $mform->setDefault('blocks', $formdata["blocks"]);

        // Apply filters to html data.
        $title = 'applyfilter';
        $defaultval = (!isset($formdata[$title])) ? false : $formdata[$title];
        $mform->addElement(
            'checkbox',
            $title,
            get_string($title, COMPONENT),
            get_string($title . 'desc', COMPONENT),
            array('class' => 'ml-0 mr-5 mb-10')
        );
        $mform->setDefault($title, $defaultval);

        // Blocks Setting.
        for ($nblock = 0; $nblock < $formdata['blocks']; $nblock++) {
            $dispnblock = $nblock + 1;
            $mform->addElement('header', 'moodle', "Block ".$dispnblock);

            // Block Image.
            $title = 'block_'.$nblock.'_'.'html';

            $draftitemid = null;

            $text = isset($formdata['block'][$nblock]['html']['text']) ? $formdata['block'][$nblock]['html']['text'] : '';
            if (isset($formdata['block'][$nblock]['html']['itemid'])) {
                $context = \context_system::instance();
                $itemid = $formdata['block'][$nblock]['html']['itemid'];
                // Load the file from database to draft area.
                $text = file_prepare_draft_area(
                    $draftitemid,
                    $context->id,
                    THEME_COMPONENT,
                    SEC_HTML,
                    $itemid,
                    array(
                        'subdirs' => 0,
                        'maxfiles' => 1
                    ),
                    $text
                );
            }

            $mform->addElement(
                'editor',
                $title,
                get_string('content'),
                array('class' => ' ml-0 mr-5 mb-10' ),
                array(
                    'subdirs' => 0,
                    'maxbytes' => 2048,
                    'areamaxbytes' => 10485760,
                    'maxfiles' => 50,
                    'enable_filemanagement' => true,
                    'autosave' => false
                )
            )->setValue(array(
                'text' => $text,
                'format' => FORMAT_HTML,
                'itemid' => $draftitemid
            ));

            // Block Style element.
            $title = 'block_'.$nblock.'_'.'style';
            $defaultval = (!isset($formdata['block'][$nblock]['style'])) ? "" : $formdata['block'][$nblock]['style'];
            $mform->addElement('textarea', $title, get_string('cssstyle', COMPONENT), array(
                'class' => 'ml-0 mr-5 mb-10 block-style',
                'placeholder' => get_string('cssstyleplaceholder', COMPONENT)
            ),
                array('rows' => 20, 'data-block-number' => $nblock));
            $mform->setType($title, PARAM_TEXT);
            $mform->setDefault($title, $defaultval);
        }
    }

    /**
     * Update html files
     * @param  array $oldconfig Old configuration of section
     * @param  array $newconfig New configuration submitted in the form
     * @return array            Array of section configuration data
     */
    public function update_html_files($oldconfig, $newconfig) {
        // This call to delete the files.
        $this->update_html_file_area($oldconfig, true);
        // This call to save the files.
        return $this->update_html_file_area($newconfig, false);
    }

    /**
     * Update html files in html file area or delete if delete parameter is set
     * @param  array   $configdata Configuration data
     * @param  boolean $delete     true if need to delete from congfigdata
     * @return array               Configuration data
     */
    public function update_html_file_area($configdata, $delete = true) {
        global $CFG, $USER;
        require_once($CFG->dirroot . "/theme/remui/lib.php");

        $systemcontext = context_system::instance();
        $usercontext = \context_user::instance($USER->id);
        $fs = get_file_storage();
        $drafts = [];
        foreach ($configdata['block'] as $kblock => $block) {
            $itemid = $block['html']['itemid'];
            if ($itemid != "" || $itemid != null) {
                if ($delete) {
                    $fs->delete_area_files($systemcontext->id, THEME_COMPONENT, SEC_HTML, $itemid);
                } else {
                    $newitemid = theme_remui_get_unused_itemid(SEC_HTML);
                    $configdata['block'][$kblock]['html']['itemid'] = $newitemid;
                    $configdata['block'][$kblock]['html']['text'] = file_save_draft_area_files(
                        $itemid,
                        $systemcontext->id,
                        THEME_COMPONENT,
                        SEC_HTML,
                        $newitemid,
                        null,
                        $configdata['block'][$kblock]['html']['text']
                    );
                    $drafts[] = $itemid;
                }
            }
        }
        $this->delete_draft_file($drafts);

        $configdata = $this->update_section_bg_file(SEC_HTML, $configdata, $delete);

        if ($delete) {
            // While deleting no need to return anything.
            return;
        }

        // Need to save updated configdata, that is why returning here.
        return $configdata;
    }

    /**
     * Create copy of all files used in html for draft config
     * @param  array $configdata draft config data array
     * @return array             updated draft config
     */
    private function html_duplicate_file_in_config($configdata) {
        global $CFG, $OUTPUT;

        $context = context_system::instance();

        foreach ($configdata['block'] as $kblock => $block) {
            $itemid = $block['html']['itemid'];
            if ($itemid != "" || $itemid != null) {
                $draftitemid = null;
                $configdata['block'][$kblock]['html']['text'] = file_prepare_draft_area(
                    $draftitemid,
                    $context->id,
                    THEME_COMPONENT,
                    SEC_HTML,
                    $itemid,
                    array(
                        'subdirs' => 0,
                        'maxfiles' => 1
                    ),
                    $block['html']['text']
                );
                $configdata['block'][$kblock]['html']['itemid'] = $draftitemid;
            }
        }

        $configdata = $this->duplicate_section_bg_file(SEC_HTML, $configdata);

        return $this->update_html_file_area($configdata, false);
    }

    /**
     * Import images for html section
     *
     * @param  array $configdata Section config data
     * @return array             Section config data
     */
    private function html_import_section($configdata) {
        global $USER, $CFG;

        $usercontext = \context_user::instance($USER->id);
        $fs = get_file_storage();

        // Import content of all html blocks.
        foreach ($configdata['block'] as $index => $block) {
            $block['html']['itemid'] = file_get_unused_draft_itemid();

            // Download and save files of html block.
            if (!empty($block['html']['files'])) {
                foreach ($block['html']['files'] as $file) {
                    $record = [
                        'contextid' => $usercontext->id,
                        'component' => 'user',
                        'filearea'  => 'draft',
                        'itemid'    => $block['html']['itemid'],
                        'filepath'  => '/',
                        'filename'  => basename($file),
                    ];
                    $fs->create_file_from_url($record, $file, null , true);
                }
                unset($block['html']['files']);
            }
            $configdata['block'][$index] = $block;
        }
        return $this->update_html_file_area($configdata, false);
    }
}
