/* eslint-disable no-alert */
/* eslint-disable no-console */
define(['jquery',
    'core/ajax',
    'core/notification',
    'core/templates',
    'block_edwiserratingreview/reviewfilter'
],
    function (
        $,
        Ajax,
        Notification,
    ) {
        var isModified = false;
        var rating = 0;
        var coursecontext = '';

        var SELECTORS = {
            MAINPAGEREVIEW: '.mainpagereview',
            SHOWMOREPAGECOURSEBTN: '.showmorepagecoursebtn',
            SHOWMOREPAGECOURSEMENU: '.ernr_showmorepagecoursemenu',
            SERACHCOURSEINPUT: 'ernr_searchcourse',
        };

        var init = function (value, start, limit, contextid) {
            coursecontext = contextid;
            Ajax.call([{
                methodname: 'block_edwiserratingreview_show_review',
                args: { rating: value, startlimit: start, lastlimit: limit, contextid: coursecontext },
                done: function (data) {
                    if (isModified == true) {
                        replaceData(data);
                    } else {
                        appendData(data);
                    }
                    rating = value;
                },
                fail: function () {
                    console.log(Notification.exception);
                }

            }]);

        };

        var getCourselist = function (coursecontext) {
            console.log("get courselist");
            Ajax.call([{
                methodname: 'block_edwiserratingreview_getcourselist',
                args: { coursecontext: coursecontext },
                done: function (data) {
                    $(SELECTORS.SHOWMOREPAGECOURSEMENU).empty().append(data);
                },
                fail: function () {
                    console.log(Notification.exception);
                }

            }]);
        };

        var appendData = function (data) {
            $(SELECTORS.MAINPAGEREVIEW).append(data);
        };

        var replaceData = function (data) {
            if (data == '') {
                $(SELECTORS.MAINPAGEREVIEW).empty().append("No Review Found");
            } else {
                $(SELECTORS.MAINPAGEREVIEW).empty().append(data);
            }

        };

        return {
            init: function (value, start, limit, coursecontext) {
                $(document).ready(function () {
                    init(value, start, limit, coursecontext);
                    getCourselist(coursecontext);
                    $(".showmorepagereviewselector option[value='" + value + "']").attr("selected", "selected");
                    $(".ernr_showmorepagecoursemenu option[value='" + coursecontext + "']").attr("selected", "selected");


                });

                $(window).on("scroll", function () {
                    var scrollHeight = $(document).height();
                    var scrollPosition = $(window).height() + $(window).scrollTop();
                    if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
                        // when scroll to bottom of the page
                        start = $(SELECTORS.MAINPAGEREVIEW).attr('data-end');
                        $(SELECTORS.MAINPAGEREVIEW).attr('data-end', Number(start) + 10);
                        limit = $(SELECTORS.MAINPAGEREVIEW).attr('data-end');
                        start = Number(start) + 1;
                        isModified = false;
                        init(rating, start, limit, coursecontext);
                        console.log("data lazy loaded");
                    }
                });
                $("#page").on('scroll', function () {
                    if ($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                        start = $(SELECTORS.MAINPAGEREVIEW).attr('data-end');
                        $(SELECTORS.MAINPAGEREVIEW).attr('data-end', Number(start) + 10);
                        limit = $(SELECTORS.MAINPAGEREVIEW).attr('data-end');
                        start = Number(start) + 1;
                        isModified = false;
                        init(rating, start, limit, coursecontext);
                        console.log("data lazy loaded");
                    }
                });
                $('.showmorepagereviewselector').change(function () {
                    rating = $('.showmorepagereviewselector option:selected').attr('value');
                    isModified = true;
                    init(rating, 0, 10, coursecontext);
                });
                $(document).on('change', '.ernr_showmorepagecoursemenu', function () {
                    rating = $('.showmorepagereviewselector option:selected').attr('value');
                    coursecontext = $('.ernr_showmorepagecoursemenu option:selected').attr('value');
                    console.log("course item selected");
                    console.log(coursecontext);
                    isModified = true;
                    init(rating, 0, 10, coursecontext);
                });
            }
        };


    });

/**
       * Get and show the recent items into the block.
       *
       * @param {object} root The root element for the items block.
       */
