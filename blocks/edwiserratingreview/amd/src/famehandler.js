/* eslint-disable no-console */
/* eslint-disable no-unused-vars */
define(['jquery', 'core/ajax'], function($, Ajax){

    const registerEvents = () => {
        $(document).on("click", ".review-card__fame-like", function() {
            var reviewid = $(this).find(".likebtn").attr("data-reviewid");
            updateFameCount(this, reviewid, 1);
        });

        $(document).on("click", ".review-card__fame-dlike", function(){
            var reviewid = $(this).find(".dlikebtn").attr("data-reviewid");
            updateFameCount(this, reviewid, 0);
        });
    };

    const updateFameCount = (_this, reviewid, famestatus) => {

        var uncheck = false;

        // Return if Clicked button is already active.
        if ($(_this).find('span.active').length == 1) {
            uncheck = true;
        }

        Ajax.call([{
            methodname: 'block_edwiserratingreview_store_likedislike',
            args: { reviewid: reviewid, famestatus: famestatus, uncheck: uncheck },
            done: function (data) {
                $('.count.liked[data-reviewid="' + reviewid + '"]').html(data['liked']);
                $('.count.dliked[data-reviewid="' + reviewid + '"]').html(data['dliked']);
                changeUIstatus(_this, reviewid, uncheck);
            },
            fail: function () {
                console.log(Notification.exception);
            }
        }]);
    };

    const changeUIstatus = (_this, reviewid, uncheck) => {

        if (uncheck) {
            $(_this).find(".active").removeClass('active');
            return;
        }

        // here we got to know that like button is clicked.
        var otherbtn = '';
        if ($(_this).find(".likebtn:not(.active)").length == 1) {
            otherbtn = ".dlikebtn[data-reviewid='" + reviewid + "']";
            $(_this).find(".likebtn").addClass("active");
            $(otherbtn).removeClass("active");
        }

        // here we got to know that dlike button is clicked.
        if ($(_this).find(".dlikebtn:not(.active)").length == 1) {
            otherbtn = ".likebtn[data-reviewid='" + reviewid + "']";
            $(_this).find(".dlikebtn").addClass("active");
            $(otherbtn).removeClass("active");
        }
    };

    const init = () => {
        registerEvents();
    };

    return {
        init: init
    };

});
