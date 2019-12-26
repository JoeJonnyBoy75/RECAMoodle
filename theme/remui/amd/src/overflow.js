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
 * Add Pending JS checks to stock Bootstrap transitions.
 *
 * @module     theme_remui/pending
 * @copyright  2019 Andrew Nicols <andrew@nicols.co.uk>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
define(['jquery'], function($) {
    $.fn.overflowing = function(options, callback){
        var self = this
        var overflowed = []
        var hasCallback = callback && typeof callback === 'function' ? true : false;
        var status = false
        this.options = options || window

        this.each(function() {
            if ($.isWindow(this)) return false
            var $this = $(this)
            elPosition = $this.position()
            elWidth = $this.width()
            elHeight = $this.height()
            var parents = $this.parentsUntil(self.options)
            var $parentsTo = $(self.options)
            parents.push($parentsTo)

            for(var i=0; i<parents.length; i++) {
                var $parent = $(parents[i])
                if ($.isWindow($parent[0])) break
                var absPosition = !!~['absolute', 'fixed'].indexOf($parent.css('position'))
                var parentPosition = $parent.position()
                var parentWidth = $parent.width()
                var parentHeight = $parent.height()
                var parentToBottom = absPosition ? parentHeight : (parentHeight+parentPosition.top)
                var parentToRight = absPosition ? parentWidth : (parentWidth+parentPosition.left)

                if ( elPosition.top < 0
                || elPosition.left < 0
                || elPosition.top > parentToBottom
                || elPosition.left > parentToRight
                || (elPosition.top + elHeight) > parentToBottom
                || (elPosition.left + elWidth) > parentToRight) {
                    status = true
                    $(parents[i]).addClass('overflowed')
                    $this.addClass('overflowing')
                    overflowed.push(parents[i])
                    if (hasCallback) callback(this)
                }
            }
        })
        if (!hasCallback) return overflowed.length > 1 ? overflowed : status
    }
});
