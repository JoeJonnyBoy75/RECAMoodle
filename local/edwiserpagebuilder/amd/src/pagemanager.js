/* eslint-disable camelcase */
/* eslint-disable no-unused-vars */
/* eslint-disable require-jsdoc */
/* eslint-disable valid-jsdoc */
/* eslint-disable */
define(['jquery', 'core/ajax', 'core/templates'], function($, Ajax, Templates){

    let previewModalId = "#epb_preview_window";

    let pagelayoutbody = ".addpage-modal-body";

    let buttonPreview  = ".btn-preview";
    let buttonCancel = previewModalId + " .cancel";
    let buttonAction = previewModalId + " .actionbtn";
    let buttonExpand = previewModalId + " .expand-preview";
    let previewImgContainer = previewModalId + " .preview_image_container";
    let previewModalBody = previewModalId + " .modal-body";

    let pagesselector = "#pagesselector";

    let editPageFormId = "#pageEditForm";
    let inputFieldsSelector = editPageFormId + " input, " + editPageFormId + " select";

    // TODO :: Update the content on update button click.
    // TODO :: Delete the blocks on delete button click.

    // FORM ELEMENTS

    let fullscreenselector = "#fullscreenselector";
    let pagenameselector = "#pagename";

    const registerEvents = () => {

        // Close Modal
        $(document).on("click", buttonCancel, function(){
            var modalselector = $(this).attr("data-modal-id");
            $("#" + modalselector).remove();
        });

        // Select Respective Page template
        $(document).on("click", buttonExpand, function(){
            $(previewModalBody).removeClass("showtemplateform");
            updateAction("usetemplate"); // Update the button
        });
        $(document).on("click", previewImgContainer, function(){
            $(previewModalBody).removeClass("showtemplateform");
            updateAction("usetemplate"); // Update the button
        });

        // Select Respective Page template
        $(document).on("click", buttonAction, function(){

            var actiontoperform = $(this).attr("data-action");

            switch (actiontoperform) {
                case "usetemplate" :
                    $(previewModalBody).addClass("showtemplateform");
                    initForm(); // initialize form at first load
                    break;
                case "update" :
                    if (validateForm()) {
                        let text = "Confirming this will override the configuration, continue?";
                        if (confirm(text) == true) {
                            // Update existing page config
                            performAction("update");
                            // TODO : Redirect User to Particular page.
                        }
                    }
                    break;
                case "create" :
                    if (validateForm()) {
                        // Create New page & Redirect User to Particular page.
                        performAction("create", true);
                    }
                    break;
                default: break;
            }

        });

        // reinitialize form after page change
        $(document).on("change", pagesselector, function(){
            initForm();
        });

        // Enable Modifications
        $(document).on("change", fullscreenselector, function(){
            $(buttonAction).removeAttr("disabled");
        });
        $(document).on("keypress", pagenameselector, function(){
            $(buttonAction).removeAttr("disabled");
        });

        // Loads all the pages on first load.
        $(document).on('click', "#pagelayout-tab.loadpagelayouts", function() {
            Ajax.call([{
                methodname: 'local_edwiserpagebuilder_render_page_cards',
                args: {},
                done: function(data) {
                    $(pagelayoutbody).empty().append(data.html);
                    $("#pagelayout-tab.loadpagelayouts").removeClass("loadpagelayouts");
                },
                fail:function(){
                }
            }]);
        });

        // Generate Preview Modal
        $(document).on("click", buttonPreview, function(){
            Ajax.call([{
                methodname: 'local_edwiserpagebuilder_fetch_page_details',
                args: {pageid: $(this).attr("data-page-id")},
                done: function(data) {
                    Templates.renderForPromise('local_edwiserpagebuilder/preview_window', JSON.parse(data))
                    .then(({html, js}) => {
                        Templates.appendNodeContents('body', html, js);
                        registerDynamicFormValidator();
                    });
                },
                fail:function() {
                    console.log("We have error");
                }
            }]);
        });
    };

    // Initialize Form Data
    const initForm = () => {
        // Fetching the pageid
        var instid = $(pagesselector).find(':selected').data("instid");

        // Updating the button text
        if (instid == undefined || instid == 0) {
            updateAction("create");
        } else {
            updateAction("update", true);
        }

        // Updating the form elements
        $.each(jQuery("#pagesselector").find(':selected').data(), function(i, v) {
            $('[name="'+i+'"]').val(v);
        });
    };

    // Change the button text
    const updateAction = (action, disablebtn = false) => {
        $(buttonAction).attr("data-action", action);
        $(".actionbtnlabel.active").removeClass("active");
        $('.actionbtnlabel[data-action="' + action + '"').addClass("active");
        $(buttonAction).removeAttr("disabled");
        if (disablebtn) {
            $(buttonAction).attr("disabled", "disabled");
        }
    };

    const performAction = (action, redirect = false) => {

        var arr = [];
        arr["action"] = action;

        $(inputFieldsSelector).each(function(index) {
            var name = $(this).attr("name");
            var val = $(this).val();
            if (name === "pagelist") {
                return;
            }
            arr[name] = val;
        });

        Ajax.call([{
            methodname: 'local_edwiserpagebuilder_perform_page_action',
            args: Object.assign({}, arr),
            done: function(response) {
                // if (response != false && redirect) {
                //     window.location.replace(response);
                // }
            },
            fail:function() {
                console.log("We have error");
            }
        }]);
    };

    const registerDynamicFormValidator = () => {
        $(document).on("keyup", '#pagename[name="pagename"]', function(){
            let empty = false;

            $('#pagename[name="pagename"]').each(function() {
                empty = $(this).val().length == 0;
            });

            if (empty) {
                $(buttonAction).attr("disabled", "disabled");
            } else {
                $(buttonAction).removeAttr("disabled");
            }
        });
    };

    const validateForm = () => {
        var text = $('#pagename[name="pagename"]').val();
        if (text === "" || text == undefined) {
            alert("Page name should not be blank.");
            return false;
        }
        return true;
    };

    const load = () => {
        $(document).ready(function(){
            registerEvents();
        });
    };

    return {
        load: load
    };
});
