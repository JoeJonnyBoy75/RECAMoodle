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
 * Homepage importer js
 *
 * @module     local/edwisersiteimporter
 * @package    local_edwisersiteimporter
 * @author     Yogesh Shirsath
 * @copyright  (c) 2020 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define([
    'jquery',
    'core/notification'
], function(
    $,
    Notification
) {

    /**
     * Import homepage template
     * @param {string} data  Template data
     * @param {object} modal Modal object
     */
    var importTemplate = function(data, modal) {
        // Show confirmation modal.
        // eslint-disable-next-line promise/catch-or-return
        Notification.saveCancel(
            M.util.get_string('confirmation', 'local_edwisersiteimporter'),
            M.util.get_string('sectionsexists', 'local_edwisersiteimporter'),
            M.util.get_string('yes', 'local_edwisersiteimporter'),
            function() {
                // Trigger homepage import form.
                var form = $('.homepage-modal form');
                form.attr('action', M.cfg.wwwroot + '/local/edwisersiteimporter/importer/homepage.php');
                form.trigger('submit');
                modal.hide();
            }
        // eslint-disable-next-line promise/always-return
        ).then(function(modal) {
            $(modal.root).addClass('edwiser-importer-modal-center');
        });
    };

    return {
        importTemplate: importTemplate
    };
});
