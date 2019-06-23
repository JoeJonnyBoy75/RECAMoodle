
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
 * Edwiser RemUI
 * @package    theme_remui
 * @copyright  (c) 2018 WisdmLabs (https://wisdmlabs.com/)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
document.addEventListener('DOMContentLoaded', function () {
    /* Auto adjust navigation menu in header according to window width
     */
    if (document.getElementsByClassName('navbar-toolbar-right')[0]) {
        var widthfix = document.getElementsByClassName('navbar-toolbar-right')[0].offsetWidth;
        var navbar_width = document.getElementsByClassName('navbar-container')[0].offsetWidth - 100;
        var available_width = navbar_width - widthfix;

        // get menu
        var robj = document.getElementsByClassName('navbar-toolbar')[0];

        // make menu responsive
        alignMenu(robj);
    }
    // handle menu on resize
    if (document.getElementsByClassName('navbar-toolbar-right')[0]) {
        window.addEventListener('resize', function (event) {
            widthfix = document.getElementsByClassName('navbar-toolbar-right')[0].offsetWidth;
            navbar_width = document.getElementsByClassName('navbar-container')[0].offsetWidth - 100;
            available_width = navbar_width - widthfix;

            // add li items from more li to main menu
            robj.innerHTML = robj.innerHTML + document.getElementsByClassName("hideshow-ul")[0].innerHTML;

            // revert dropdown-submenu class dropdown on parent li elements
            var items = robj.children;
            for (var i = 0; i < items.length; i++) {
                if (items[i].classList.contains('dropdown-submenu')) {
                    items[i].classList.toggle('dropdown');
                    items[i].classList.toggle('dropdown-submenu');
                }
            }
            // empty the more li item
            document.getElementsByClassName("hideshow-ul")[0].innerHTML = '';
            alignMenu(robj);
        })
    };

    function alignMenu(obj) {
        var current_menuwidth = 0;
        var max_menuwidth = available_width;
        var extra_lis = Array();

        var items = obj.children;

        for (var i = 0; i < items.length; i++) {
            if (items[i].className != 'hideshow nav-item dropdown') {
                current_menuwidth += items[i].offsetWidth;
                if (max_menuwidth < current_menuwidth) {
                    extra_lis.push(items[i]);
                }
            }
        }

        // add extra elements in more ul
        document.getElementsByClassName("hideshow-ul")[0].innerHTML = '';
        for (var i = 0; i < extra_lis.length; i++) {

            if (extra_lis[i].classList.contains('dropdown')) {
                extra_lis[i].classList.toggle('dropdown');
                extra_lis[i].classList.toggle('dropdown-submenu');
            }

            document.getElementsByClassName("hideshow-ul")[0].appendChild(extra_lis[i]);
        }

        // show 3 dot more menu if menu items are hidden
        if (max_menuwidth < current_menuwidth) {
            document.getElementsByClassName("hideshow")[0].style.visibility = "visible";
        } else {
            document.getElementsByClassName("hideshow")[0].style.visibility = "hidden";
        }


        document.getElementsByClassName("navbar-toolbar")[0].appendChild(document.getElementsByClassName("hideshow")[0]);
    }

    // Move Quiz Timer from sidebar to main content in mobile view
    if (document.getElementById('quiz-timer')) {
        var quiztimer = document.querySelector('#quiz-timer');
        var breadcrumb = document.querySelector("#region-main");

        if (quiztimer) {
            breadcrumb.parentNode.insertBefore(quiztimer, breadcrumb);
        }
    }
}, false);