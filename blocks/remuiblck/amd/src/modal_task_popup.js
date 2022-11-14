/* eslint-disable no-console */
/* eslint-disable camelcase */
define([
    'jquery',
    'core/notification',
    'core/custom_interaction_events',
    'core/modal',
    'core/modal_registry',
    'block_remuiblck/events'
], function(
    $,
    Notification,
    CustomEvents,
    Modal,
    ModalRegistry,
    RemuiblckEvents
) {
    var registered = false;
    var SELECTORS = {
        SAVE_BUTTON: '[data-action="save"]',
        DELETE_BUTTON: '[data-action="delete"]',
        CANCEL_BUTTON: '[data-action="cancel"]',
        SUBJECT: '[name="subject"]',
        SUMMARY: '[name="summary"]',
        DAY: '[name="timedue[day]"]',
        MONTH: '[name="timedue[month]"]',
        YEAR: '[name="timedue[year]"]',
        VISIBLE: '[name="visible"]',
        NOTIFY: '[name="notify"]',
        USERS: '[name="userlist[]"]',
        ELEMENT_ROW: '.fitem',
        ERROR_FEEDBACK: '.form-control-feedback'
    };

    /**
     * Constructor for the Modal.
     *
     * @param {object} root The root jQuery element for the modal
     */
    var TASK = function(root) {
        Modal.call(this, root);

        if (!this.getFooter().find(SELECTORS.SAVE_BUTTON).length) {
            Notification.exception({
                message: M.util.get_string('nosavebutton', 'block_remuiblck')
            });
        }

    };

    TASK.TYPE = 'block_remuiblck-task';
    TASK.prototype = Object.create(Modal.prototype);
    TASK.prototype.constructor = TASK;

    /**
     * Set up all of the event handling for the modal.
     *
     * @method registerEventListeners
     */
    TASK.prototype.registerEventListeners = function() {
        // Apply parent event listeners.
        Modal.prototype.registerEventListeners.call(this);
        let _this = this;
        this.getModal().on(CustomEvents.events.activate, SELECTORS.SAVE_BUTTON, function() {
            // Add your logic for when the save button is clicked. This could include the form validation,
            // loading animations, error handling etc.
            _this.getModal().trigger(RemuiblckEvents.TASK_SAVE);
        });

        this.getModal().on(CustomEvents.events.activate, SELECTORS.DELETE_BUTTON, function() {
            // Add your logic for when the delete button is clicked.
            _this.getModal().trigger(RemuiblckEvents.TASK_DELETE);
        });

        this.getModal().on(CustomEvents.events.activate, SELECTORS.CANCEL_BUTTON, function() {
            // Add your logic for when the delete button is clicked.
            _this.getModal().trigger(RemuiblckEvents.TASK_CANCEL);
        });

    };

    /**
     * Check whether settings are valid or not
     * @return {bool} True if valid
     */
    TASK.prototype.valid_settings = function() {
        let valid = true;
        let subject = this.getModal().find(SELECTORS.SUBJECT).val();
        valid = subject != '';
        this.getModal().find(SELECTORS.SUBJECT)[0].dispatchEvent(new CustomEvent('blur'));
        return valid;
    };


    /**
     * Get settings entered in task form
     * @return {object} task settings object
     */
    TASK.prototype.get_task_settings = function() {
        // "2012-03-29T23:59:59"

        var get_date = function(modal) {
            let datetime = modal.find(SELECTORS.YEAR).val();
            let month = modal.find(SELECTORS.MONTH).val();
            let day = modal.find(SELECTORS.DAY).val();
            datetime += '-' + (month < 10 ? '0' + month : month); // Month convert -> 8 to 08
            datetime += '-' + (day < 10 ? '0' + day : day);
            datetime += navigator.vendor.indexOf("Apple") != -1 ? 'T23:59:59' : ' 23:59:59';
            return (navigator.vendor.indexOf("Apple") != -1 ? Date.parse(datetime) : new Date(datetime).getTime()) / 1000;
        };
        let settings = {
            subject: this.getModal().find(SELECTORS.SUBJECT).val(),
            summary: this.getModal().find(SELECTORS.SUMMARY).val(),
            timedue: get_date(this.getModal()),
            visible: this.getModal().find(SELECTORS.VISIBLE).is(':checked'),
            notify: this.getModal().find(SELECTORS.NOTIFY).is(':checked'),
            users: this.getModal().find(SELECTORS.USERS).val()
        };
        return settings;
    };

    /**
     * Change saving button status
     */
    TASK.prototype.saving = function() {

        var action = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : true;

        let button = this.getModal().find(SELECTORS.SAVE_BUTTON);
        if (action == true) {
            button.text(M.util.get_string('saving', 'core_repository')).attr('disabled', 'disabled');
            button.attr('disabled', true);
            return;
        }
        button.attr('disabled', false);
        button.text(M.util.get_string('save', 'core_repository')).removeAttr('disabled');
    };

    // Automatically register with the modal registry the first time this module is imported so that you can create modals
    // of this type using the modal factory.
    if (!registered) {
        ModalRegistry.register(TASK.TYPE, TASK, 'block_remuiblck/modal_task_popup');
        registered = true;
    }

    return TASK;
});
