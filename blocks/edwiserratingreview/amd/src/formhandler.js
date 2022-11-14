/* eslint-disable no-alert */
/* eslint-disable no-console */
/* eslint-disable no-unused-vars */
define([
    'jquery',
    'core/ajax',
    'core/templates',
    'core/notification',
    'block_edwiserratingreview/reviewfilter'
    ], function ($, Ajax, Templates, Notification, Reviewfilter) {

    const SELECTORS = {
        FEEDBACKFORM: '.feedbackform',
        FORMCONTAINER: '.feedbackform-container',
        WRITEREVIEWBTN: '.writereviewbtn',
        FEEDBACKFORM_RESPONSE: '.feedbacksubmitresponse',
        RATINGSELECTION: '.ratingselectionalert',
        FEEDBACKFORMDATA: '#feedbackformdata',
        STARINPUT: ".rating-stars-input input[name='rating']",
        SUBMITREVIEW: '.submitreview',
        CANCELREVIEW: '.cancelreview'
    };

    const eventListeners = () => {
        $(document).off().on("click", SELECTORS.SUBMITREVIEW, function (e) {
            e.preventDefault();

            var rating = $('input[name="rating"]:checked').val();
            var review = $('[name="review"]').val();

            Ajax.call([{
                methodname: 'block_edwiserratingreview_store_userfeedback',
                args: {
                    starcount: rating,
                    contextid: M.cfg.contextid,
                    feedbackreview: review,
                    fortype: "course"
                },
                done: function () {
                    $(SELECTORS.FEEDBACKFORM).remove();
                    $(SELECTORS.WRITEREVIEWBTN).show().removeAttr("disabled");
                    $(SELECTORS.FORMCONTAINER).empty().append(datasubmittionalert);
                    // Reviewfilter.init(); // uncomment this to update the reviews area.
                },
                fail: function () {
                    console.log(Notification.exception);
                }

            }]);
        });

        // eslint-disable-next-line max-len
        var datasubmittionalert = `<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top:10px;" >
        Thank you for submitting the review, your review will be published soon.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
            </button>
        </div>`;
        // style="background-color: #f0ad4e;"
        $(document).on("click", SELECTORS.STARINPUT, function () {
            $(SELECTORS.SUBMITREVIEW).removeAttr("disabled");
        });

        $(document).on("click", SELECTORS.CANCELREVIEW, function() {
            $(SELECTORS.FEEDBACKFORM).remove();
            $(SELECTORS.WRITEREVIEWBTN).show().removeAttr("disabled");
        });

        $(SELECTORS.WRITEREVIEWBTN).off().click(function(){
            $(SELECTORS.WRITEREVIEWBTN).attr("disabled", true);
            Ajax.call([{
                methodname: 'block_edwiserratingreview_get_review',
                args: {
                    contextid: M.cfg.contextid,
                },
                done: function (data) {
                    Templates.render('block_edwiserratingreview/feedbackform', data.data)
                    .done(function (html, js) {
                        Templates.replaceNodeContents($(SELECTORS.FORMCONTAINER), html, js);
                        $("#rate-" + data.data.star_ratings).click();
                    });

                    $(SELECTORS.WRITEREVIEWBTN).hide();
                },
                fail: function () {
                    console.log(Notification.exception);
                }
            }]);

        });
    };

    var init = function () {
        eventListeners();
    };

    return {
        init: init,
    };
});
