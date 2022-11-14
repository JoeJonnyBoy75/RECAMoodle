/* eslint-disable no-alert */
/* eslint-disable no-console */
/* eslint-disable no-unused-vars */
define(['jquery', 'core/ajax', 'core/notification', 'core/templates'], function ($, Ajax, Notification) {

    var SELECTORS = {
        REVIEWDATA: '.reviewdata',
        SHOWMOREREVIEWBTN: '.showmorereviewsbtn',
        COURSEID: '#courseId',
        REVIEWSELECTOR: '.reviewselector',
        SHOWMOREREVIEWCLASS: '#showmorereviewclass',
    };

    var getreviewdata = function (rates) {
        Ajax.call([{
            methodname: 'block_edwiserratingreview_show_review',
            args: { rating: rates, startlimit: 0, lastlimit: 5, contextid: M.cfg.contextid },
            done: function (data) {
                var result = "No Reviews found";
                if (data !== '') {
                    result = data;
                }

                $(SELECTORS.REVIEWDATA).empty().append(result);

                if ($(SELECTORS.REVIEWDATA).children('li.review-card').length == 5) {
                    var showmorereviewbuttontext = M.util.get_string('showmorereview', 'block_edwiserratingreview');
                    // eslint-disable-next-line max-len
                    var showmorereviebtn = `<a href = "#" class= "btn btn-outline-secondary btn-lg btn-block showmorereviewsbtn">Show More Review</a>`;
                    $(SELECTORS.SHOWMOREREVIEWCLASS).empty().append(showmorereviebtn);
                    setbuttonurl(rates);
                } else {
                    $(SELECTORS.SHOWMOREREVIEWCLASS).empty().append('');
                }
            },
            fail: function () {
                console.log(Notification.exception);
            }
        }]);

    };

    var setbuttonurl = function (rating) {
        var url = M.cfg.wwwroot + '/blocks/edwiserratingreview/view.php?filter=' + rating + '&contextid=' + M.cfg.contextid;
        $(SELECTORS.SHOWMOREREVIEWBTN).attr('href', url);
    };

    const loadReviews = () => {
        var rating = $('.reviewselector option:selected').attr('value');
        getreviewdata(rating);
    };

    return {
        init: function () {
            $(document).ready(function () {

                loadReviews();

                $(document).on("change", SELECTORS.REVIEWSELECTOR, function () {
                    loadReviews();
                });
            });
        }
    };

});
