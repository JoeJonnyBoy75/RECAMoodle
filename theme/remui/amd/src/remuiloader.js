/* eslint-disable no-console */
/* eslint-disable jsdoc/require-jsdoc*/
/* eslint-disable jsdoc/require-jsdoc*/
/* eslint-disable jsdoc/require-jsdoc*/
define(['jquery'], function($) {

    const registerCommonEvents = () => {
        // Prevent messaging bar toggle when merged in sidebar.
        $('.drawer-right .nav-item .nav-link[href="#sidebar-message"]').click(function() {
            $('[data-region="right-hand-drawer"]').removeClass('hidden');
        });

        // Profile page Main Content message button working made for merged messaging drawer.
        $(".mergemessagingsidebar #message-user-button").click(function() {
            $(".drawers:not(.show-drawer-right) .drawer-toggler.drawer-right-toggle .btn").click();
            $("#merged-messaging-tab .nav-link").tab("show");
            $('[data-region="right-hand-drawer"]').removeClass('hidden');
        });

        // Save the preference, after dismiss the announcement
        $('.site-announcement #dismiss_announcement').click(function() {
            $('body').removeClass("remui-notification");
            M.util.set_user_preference('remui_dismised_announcement', true);
        });

        // Scroll to top.
        $("#gotop").click(function() {
            $('html, body').animate({scrollTop: 0}, $(window).scrollTop() / 6);
            return false;
        });

        // Hide and Show Go to top button.
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $('#gotop').removeClass("d-none").addClass("d-flex");
            } else {
                $('#gotop').removeClass("d-flex").addClass("d-none");
            }
        });

        // Make AddBlock modal full Width.
        $('[data-key="addblock"]').click(function(){
            setTimeout(function(){
                $('.modal[data-region="modal-container"]').addClass("fullwidth-modal");
            }, 500);
        });

        /*Right Drawer close issue when mergemessaging is enabled. */
        var drawercloser = '.drawertoggle[data-toggler="drawers"]';
        $(document).on("click", drawercloser, function() {
            // $(".drawerheader .nav-tabs .nav-item:first-child").click();
            $("#block-tab").click();
        });


        /* Show Categories dropdown closing issue*/
        $(document).on('click', '.dropdown-accordian a[data-toggle="collapse"]', function (e) {
            e.preventDefault();
            e.stopPropagation();
        });
    };

    /*
     * Creating mini version of bootstrap-select for Dropdowns
     * {String} dropdownselector class selector for dropdown
     */
    const generateDropdownSearch = (dropdownselector) => {

        var _catmenus = $(dropdownselector + '+ .dropdown-menu');
        var _searchfield = ".catsearch";

        var _inputfield = '<div class="catsearch-item p-2" tabindex="-1"><input type="text" name="catsearch" placeholder ="' +M.util.get_string('searchcatplaceholdertext', 'theme_remui') + '" class="w-100 form-control catsearch"></div>';

        _catmenus.prepend(_inputfield);
        $(".catsearch-item").unbind();
        $(".catsearch-item .catsearch").unbind();
        /*
         * Search Function in the dropdown items according to input field text.
         */
        function filterFunction() {
          var input, filter, a, i;
          input =  $('.catselector-menu + .dropdown-menu').find(".catsearch");

          filter = input.val().toUpperCase();

          a = _catmenus.find("a");
          for (i = 0; i < a.length; i++) {
            var _txtval = a[i].textContent || a[i].innerText;
            _txtval = _txtval.split(" ").join("");
            if (_txtval.toUpperCase().indexOf(filter) > -1) {
              a[i].style.display = "";
            } else {
              a[i].style.display = "none";
            }
          }
        }
        _catmenus.find(_searchfield).on("keyup", function(e){
            if (e.which == 32){
                return true;
            }
            filterFunction();
        });

    };

    return {
        init: function() {
            registerCommonEvents();

            // Enable Category Search filter in header.
            if ($(".catselector-menu").length) {
                generateDropdownSearch(".catselector-menu");
            }

        }
    };
});
