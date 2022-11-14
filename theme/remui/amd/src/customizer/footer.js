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
 * Theme customizer footer js
 * @copyright (c) 2021 WisdmLabs (https://wisdmlabs.com/) <support@wisdmlabs.com>
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author    Yogesh Shirsath
 */

define('theme_remui/customizer/footer', [
    'jquery',
    'core/templates',
    './utils'
], function(
    $,
    Templates,
    Utils
) {

    /**
     * Selectors
     */
    var SELECTOR = {
        BASE: 'customizer-footer',
        BACKGROUNDCOLOR: 'footer-background-color',
        TEXTCOLOR: 'footer-text-color',
        LINKTEXT: 'footer-link-text',
        LINKHOVERTEXT: 'footer-link-hover-text',
        COLUMN: 'footercolumn',
        COLUMNSIZE: 'footercolumnsize',
        COLUMNSHEADING: 'heading_footer-advance-column',
        MENULIST: '.footer-menu-list',
        SHOWLOGO: 'footershowlogo',
        TERMSANDCONDITIONSSHOW: 'footertermsandconditionsshow',
        TERMSANDCONDITIONS: 'footertermsandconditions',
        PRIVACYPOLICYSHOW: 'footerprivacypolicyshow',
        PRIVACYPOLICY: 'footerprivacypolicy',
        COPYRIGHTSHOW: 'footercopyrightsshow',
        COPYRIGHT: 'footercopyrights',
        SETTINGITEM: '.setting-item',
        DNONE: 'd-none',
        FOOTER: '#page-footer'
    };

    /**
     * Resize class for widget width.
     * @param {Event}    event    Resize start event
     */
    function resize(event) {
        let drag = {};
        drag.iframeDocument = Utils.getDocument();
        drag.column = $(event.target.parentElement);
        drag.index = $(drag.column).index();
        drag.sibling = $(drag.column).next();
        drag.parent = $(drag.column).closest(`.resizer`);
        drag.widths = $(`[name="${SELECTOR.COLUMNSIZE}"]`).val().split(',');
        $(drag.column).closest('.resizer').addClass('resizing');

        if (event.type === "touchstart") {
            drag.startX = event.touches[0].clientX;
        } else {
            drag.startX = event.clientX;
        }

        drag.colStartWidth = $(drag.column).outerWidth();
        drag.sibStartWidth = $(drag.sibling).outerWidth();
        drag.parentWidth = $(drag.parent).outerWidth();

        drag.move = (evt) => {
            let clientX;
            if (evt.type === "touchmove") {
                clientX = evt.touches[0].clientX;
            } else {
                clientX = evt.clientX;
            }
            let newColWidth = drag.colStartWidth + clientX - drag.startX;
            let newSibWidth = drag.sibStartWidth - clientX + drag.startX;

            let percent = function(val, total) {
                return (val / total) * 100;
            };
            let colWidthPercent = parseFloat(percent(newColWidth, drag.parentWidth)).toFixed(1);
            if (colWidthPercent < 15) {
                return;
            }
            let sibWidthPercent = parseFloat(percent(newSibWidth, drag.parentWidth)).toFixed(1);
            if (sibWidthPercent < 15) {
                return;
            }

            // Main div width.
            $(drag.column).css("width", `${colWidthPercent}%`).find("label").text(`${colWidthPercent}%`);
            $(drag.iframeDocument).find(`#footer-column-${drag.index + 1}`).css('flex', `0 0 ${colWidthPercent}%`);
            drag.widths[drag.index] = colWidthPercent;


            // Sibling div width.
            $(drag.sibling).css("width", `${sibWidthPercent}%`).find("label").text(`${sibWidthPercent}%`);
            $(drag.iframeDocument).find(`#footer-column-${drag.index + 2}`).css('flex', `0 0 ${sibWidthPercent}%`);
            drag.widths[drag.index + 1] = sibWidthPercent;
        };

        drag.stop = () => {
            window.removeEventListener("mouseup", drag.stop);
            window.removeEventListener("touchend", drag.stop);
            window.removeEventListener("mousemove", drag.move);
            window.removeEventListener("touchmove", drag.move);
            $(`[name="${SELECTOR.COLUMNSIZE}"]`).val(drag.widths.join(','));
            $(drag.column).closest('.resizer').removeClass('resizing');
        };

        window.addEventListener("mouseup", drag.stop);
        window.addEventListener("touchend", drag.stop);
        window.addEventListener("mousemove", drag.move);
        window.addEventListener("touchmove", drag.move);
    }

    /**
     * Toggle footer primary is empty.
     */
    function isFooterPrimaryVisible() {
        let type;
        let content;
        let hasSocial;
        let hasContent;
        let hasMenu;
        let widgetSocials;
        let visible = false;
        let emptySocial = true;
        let stripHtml = html => $(`<div>${html}</div>`).text().trim();
        let columns = $(`[name="${SELECTOR.COLUMN}"]`).val();
        let iframeDocument = Utils.getDocument();
        let socials = [];

        // Check if any social media link is visible.
        $(`
            [name="facebooksetting"],
            [name="twittersetting"],
            [name="linkedinsetting"],
            [name="youtubesetting"],
            [name="gplussetting"],
            [name="instagramsetting"],
            [name="pinterestsetting"],
            [name="quorasetting"]
        `).each(function() {
            if ($(this).val() != '') {
                emptySocial = false;
            }
            socials[$(this).attr('name').replace('setting', '')] = $(this).val();
        });
        for (let i = 1; i <= columns; i++) {
            type = $(`[name="${SELECTOR.COLUMN + i}type"]`).val();
            hasSocial = hasContent = hasMenu = false;
            switch (type) {
                case 'social':
                    if (emptySocial) {
                        break;
                    }
                    widgetSocials = $(`[name="${SELECTOR.COLUMN + i}social"]`).val();
                    if (widgetSocials.length == 0) {
                        break;
                    }
                    // eslint-disable-next-line no-loop-func
                    widgetSocials.forEach((social) => {
                        if (socials[social] != '') {
                            hasSocial = visible = true;
                        }
                    });
                    break;
                case 'customhtml':
                    content = $(`[name="${SELECTOR.COLUMN + i}customhtml"]`).val();
                    if (stripHtml(content) !== '' || content.indexOf('img') !== -1) {
                        hasContent = visible = true;
                    }
                    break;
                case 'menu':
                    if ($(`[name="${SELECTOR.COLUMN + i}menu"]`).val() != '[]') {
                        hasMenu = visible = true;
                    }
                    break;
            }
            $(iframeDocument).find(`#page-footer #footer-column-${i} .custom-html`).toggleClass('invisible', !hasContent);
            $(iframeDocument).find(`#page-footer #footer-column-${i} .social-links`).toggleClass('invisible', !hasSocial);
            $(iframeDocument).find(`#page-footer #footer-column-${i} .footer-menu`).toggleClass('invisible', !hasMenu);
        }
        $(iframeDocument).find(`#page-footer .footer-primary`).toggleClass('d-none', !visible);
    }

    /**
     * Toggle number of columns
     */
    function toggleColumns() {
        let columns = $(`[name="${SELECTOR.COLUMN}"]`).val();
        let iframeDocument = Utils.getDocument();
        let i = 1;
        for (; i <= columns; i++) {
            $(`#${SELECTOR.COLUMNSHEADING}${i}`).show();
            $(iframeDocument).find(`#footer-column-${i}`).removeClass(SELECTOR.DNONE);
        }
        for (; i <= 4; i++) {
            $(`#${SELECTOR.COLUMNSHEADING}${i}`).hide();
            $(iframeDocument).find(`#footer-column-${i}`).addClass(SELECTOR.DNONE);
        }
    }

    /**
     * Toggle column type.
     * @param {Integer} index Footer column index
     */
    function toggleType(index) {
        let type = $(`[name="${SELECTOR.COLUMN + index}type"]`).val();
        let iframeDocument = Utils.getDocument();
        let group = $(`[name="${SELECTOR.COLUMN + index}type"]`).closest('.heading-content');

        // Show social icon selection when type is social.
        group.find(`[name*="${SELECTOR.COLUMN}"][name*="social"]`).closest(SELECTOR.SETTINGITEM)
        .toggleClass(SELECTOR.DNONE, type != 'social');

        // Show title when type is not social.
        group.find(`[name*="${SELECTOR.COLUMN}"][name*="title"]`).closest(SELECTOR.SETTINGITEM)
        .toggleClass(SELECTOR.DNONE, type == 'social');

        // Show content when type is customhtml
        group.find(`[name*="${SELECTOR.COLUMN}"][name*="customhtml"]`).closest(SELECTOR.SETTINGITEM)
        .toggleClass(SELECTOR.DNONE, type != 'customhtml');

        // Show menu and orientation when type is menu.
        group.find(`[name*="${SELECTOR.COLUMN}"][name*="menu"]`).closest(SELECTOR.SETTINGITEM)
        .toggleClass(SELECTOR.DNONE, type != 'menu');

        // Change column type.
        $(iframeDocument).find(`#footer-column-${index}`)
        .removeClass('column-type-customhtml column-type-social column-type-menu')
        .addClass('column-type-' + type);
    }

    /**
     * Update title in iframe.
     * @param {Integer} index Footer column index
     */
    function titleChange(index) {
        let title = $(`[name="${SELECTOR.COLUMN}${index}title"]`).val();
        $(Utils.getDocument()).find(`#footer-column-${index} .custom-html .card-title`).text(title);
        $(Utils.getDocument()).find(`#footer-column-${index} .footer-menu .card-title`).text(title);
    }

    /**
     * Update title in iframe.
     * @param {Integer} index Footer column index
     */
    function contentChange(index) {
        let content = $(`[name="${SELECTOR.COLUMN}${index}customhtml"]`).val();
        $(Utils.getDocument()).find(`#footer-column-${index} .custom-html .card-text`).html(content);
    }

    /**
     * Apply footer colors.
     */
    function footerColors() {
        let backgroundColor = $(`[name="${SELECTOR.BACKGROUNDCOLOR}"]`).spectrum('get').toString();
        let textColor = $(`[name="${SELECTOR.TEXTCOLOR}"]`).spectrum('get').toString();
        let linkText = $(`[name="${SELECTOR.LINKTEXT}"]`).spectrum('get').toString();
        let linkHoverText = $(`[name="${SELECTOR.LINKHOVERTEXT}"]`).spectrum('get').toString();

        let content = `
            ${SELECTOR.FOOTER},
            ${SELECTOR.FOOTER} .h1,
            ${SELECTOR.FOOTER} .h2,
            ${SELECTOR.FOOTER} .h3,
            ${SELECTOR.FOOTER} .h4,
            ${SELECTOR.FOOTER} .h5,
            ${SELECTOR.FOOTER} .h6,
            ${SELECTOR.FOOTER} h1,
            ${SELECTOR.FOOTER} h2,
            ${SELECTOR.FOOTER} h3,
            ${SELECTOR.FOOTER} h4,
            ${SELECTOR.FOOTER} h5,
            ${SELECTOR.FOOTER} h6 {
                background: ${backgroundColor} !important;
                color: ${textColor} !important;
            }
            ${SELECTOR.FOOTER} a {
                color: ${linkText} !important;
            }
            ${SELECTOR.FOOTER} a:hover {
                color: ${linkHoverText} !important;
            }
        `;

        Utils.putStyle(SELECTOR.BASE, content);
    }

    /**
     * Observe column size change.
     */
    function columnSizeChange() {
        let widths = $(`[name="${SELECTOR.COLUMNSIZE}"]`).val().split(',');
        let iframeDocument = Utils.getDocument();
        widths.forEach((width, index) => {
            $(iframeDocument).find(`#footer-column-${index + 1}`).css('flex', `0 0 ${width}%`);
        });
    }

    /**
     * Generate column size elements.
     */
    function generateColumnSize() {
        let numberOfColumns = $(`[name="${SELECTOR.COLUMN}"]`).val();
        let widths = $(`[name="${SELECTOR.COLUMNSIZE}"]`).val().split(',').slice(0, numberOfColumns);
        let parent = $(`[name="${SELECTOR.COLUMNSIZE}"]`).closest('.felement');
        toggleColumns();
        Templates.render('theme_remui/customizer/footer_widget_size', {
            widget: widths
        }).done(function(html, js) {
            parent.find('.resizer-wrapper').remove();
            Templates.appendNodeContents(parent, html, js);
        });
    }

    /**
     * Social media link change
     * @param {String} name name of social setting
     * @param {String} link link of social setting
     */
    function socialMediaLinks(name, link) {
        name = name.replace('setting', '');
        name = name == 'gplus' ? 'social-google-plus' : 'social-' + name;
        let iframeDocument = Utils.getDocument();
        $(iframeDocument).find(`${SELECTOR.FOOTER} .social-links .${name}`).attr('href', link)
        .toggleClass(SELECTOR.DNONE, link == '');
    }

    /**
     * Toggle social icons based on selections.
     * @param {Integer} index Footer column index
     */
    function socialSelectionChanges(index) {
        let selection = $(`[name="${SELECTOR.COLUMN}${index}social"]`).val();
        let iframeDocument = Utils.getDocument();
        let link;
        $(iframeDocument).find(`#footer-column-${index} .social-links a`).addClass('social-disabled');
        selection.forEach(name => {
            link = $(`[name="${name}setting"]`).val();
            name = name == 'gplus' ? 'social-google-plus' : 'social-' + name;
            $(iframeDocument).find(`#footer-column-${index} .social-links a.${name}`)
            .removeClass('social-disabled')
            .attr('href', link).toggleClass(SELECTOR.DNONE, link == '');
        });
    }

    /**
     * Update changed menu to column
     * @param {Integer} index Footer column index
     */
    function menuChange(index) {
        let menu = $(`[name="${SELECTOR.COLUMN}${index}menu"]`).val();
        let iframeDocument = Utils.getDocument();
        try {
            menu = JSON.parse(menu);
        } catch (exception) {
            menu = [];
        }
        $(iframeDocument).find(`#footer-column-${index} ${SELECTOR.MENULIST}`).html('');
        menu.forEach(menuitem => {
            $(iframeDocument).find(`#footer-column-${index} ${SELECTOR.MENULIST}`)
            .append(`<a target="_blank" href="${menuitem.address}">${menuitem.text}</a>`);
        });
    }

    /**
     * Update menu orientation.
     * @param {Integer} index Footer column index
     */
    function menuOrientationChange(index) {
        let orientation = $(`[name="${SELECTOR.COLUMN}${index}menuorientation"]`).val();
        let iframeDocument = Utils.getDocument();
        $(iframeDocument).find(`#footer-column-${index} .footer-menu`)
        .removeClass('menu-vertical menu-horizontal')
        .addClass('menu-' + orientation);
    }

    /**
     * Show logo in secondary footer.
     */
    function showLogo() {
        let iframeDocument = Utils.getDocument();
        let show = $(`[name="${SELECTOR.SHOWLOGO}"]`).is(':checked');
        $(iframeDocument).find('.secondary-footer-logo').toggleClass(SELECTOR.DNONE, !show);
    }

    /**
     * Show social links in the secondary footer.
     */
    // function secondarySocial() {
    //     let iframeDocument = Utils.getDocument();
    //     let show = $(`[name="${SELECTOR.SECONDARYSOCIAL}"]`).is(':checked');
    //     $(iframeDocument).find('.secondary-footer-social').toggleClass(SELECTOR.DNONE, !show);
    // }

    /**
     * Show terms and conditions link in the footer.
     */
    function termsAndConditionsShow() {
        let iframeDocument = Utils.getDocument();
        let show = $(`[name="${SELECTOR.TERMSANDCONDITIONSSHOW}"]`).is(':checked');
        $(iframeDocument).find('.footer-terms-and-conditions').toggleClass(SELECTOR.DNONE, !show).toggleClass('d-block', show);
        $(`[name="${SELECTOR.TERMSANDCONDITIONS}"]`).closest(SELECTOR.SETTINGITEM).toggleClass(SELECTOR.DNONE, !show);
    }

    /**
     * Handler terms and conditions.
     */
    function termsAndConditions() {
        let iframeDocument = Utils.getDocument();
        let termsAndConditions = $(`[name="${SELECTOR.TERMSANDCONDITIONS}"]`).val();
        $(iframeDocument).find('.footer-terms-and-conditions').attr('href', termsAndConditions);
    }

    /**
     * Show privacy policy link in the footer.
     */
    function privacyPolicyShow() {
        let iframeDocument = Utils.getDocument();
        let show = $(`[name="${SELECTOR.PRIVACYPOLICYSHOW}"]`).is(':checked');
        $(iframeDocument).find('.footer-privacy-policy').toggleClass(SELECTOR.DNONE, !show).toggleClass('d-block', show);
        $(`[name="${SELECTOR.PRIVACYPOLICY}"]`).closest(SELECTOR.SETTINGITEM).toggleClass(SELECTOR.DNONE, !show);
    }

    /**
     * Handle privacy policy link.
     */
    function privacyPolicy() {
        let iframeDocument = Utils.getDocument();
        let privacyPolicy = $(`[name="${SELECTOR.PRIVACYPOLICY}"]`).val();
        $(iframeDocument).find('.footer-privacy-policy').attr('href', privacyPolicy);
    }

    /**
     * Show copyright in the footer.
     */
    function copyrightShow() {
        let iframeDocument = Utils.getDocument();
        let show = $(`[name="${SELECTOR.COPYRIGHTSHOW}"]`).is(':checked');
        $(iframeDocument).find('.secondary-footer-copyright').toggleClass(SELECTOR.DNONE, !show);
        $(`[name="${SELECTOR.COPYRIGHT}"]`).closest(SELECTOR.SETTINGITEM).toggleClass(SELECTOR.DNONE, !show);
    }

    /**
     * Handler copyright content.
     */
    function copyright() {
        let iframeDocument = Utils.getDocument();
        let copyright = $(`[name="${SELECTOR.COPYRIGHT}"]`).val()
        .replaceAll('[site]', $(iframeDocument).find('.secondary-footer-copyright').data('site'))
        .replaceAll('[year]', (new Date()).getFullYear());
        $(iframeDocument).find('.secondary-footer-copyright').html(copyright);
    }

    /**
     * Apply settings.
     */
    function apply() {
        footerColors();
        generateColumnSize();
        columnSizeChange();
        showLogo();
        // secondarySocial();
        termsAndConditionsShow();
        termsAndConditions();
        privacyPolicyShow();
        privacyPolicy();
        copyrightShow();
        copyright();
        isFooterPrimaryVisible();
        for (let i = 1; i <= 4; i++) {
            titleChange(i);
            contentChange(i);
            toggleType(i);
            menuChange(i);
            menuOrientationChange(i);
            socialSelectionChanges(i);
        }
        $(`
            [name="facebooksetting"],
            [name="twittersetting"],
            [name="linkedinsetting"],
            [name="youtubesetting"],
            [name="gplussetting"],
            [name="instagramsetting"],
            [name="pinterestsetting"],
            [name="quorasetting"]
        `).each(function() {
            socialMediaLinks($(this).attr('name'), $(this).val());
        });
    }

    /**
     * Initialize
     */
    function init() {
        // Advance footer column size observe
        $(`[name="${SELECTOR.COLUMNSIZE}"]`).closest('.felement')
        .append(`<label>${M.util.get_string('footercolumnsizenote', 'theme_remui')}</label>`);
        generateColumnSize();
        $(`[name="${SELECTOR.COLUMNSIZE}"]`).hide();
        $(`[name="${SELECTOR.COLUMNSIZE}"]`).on('change', function() {
            let widths = $(`[name="${SELECTOR.COLUMNSIZE}"]`).val().split(',');
            let widget = $(`[name="${SELECTOR.COLUMN}"]`).val();

            // Validating wigets count.
            if (widget != widths.length) {
                $(`[name="${SELECTOR.COLUMN}"]`).val(widths.length);
            }
            generateColumnSize();
            columnSizeChange();
        });

        // Observer column size change using on drag and touch.
        $('body').on('mousedown touchstart', `#fitem_id_${SELECTOR.COLUMNSIZE} .resizer .resize-x-handle`, resize);

        // Listen number of columns toggler.
        $(`[name="${SELECTOR.COLUMN}"]`).on('change', function() {
            let width = [];
            for (let i = 1; i <= $(this).val(); i++) {
                width.push((100 / $(this).val()).toFixed(0));
            }
            $(`[name="${SELECTOR.COLUMNSIZE}"]`).val(width.join(','));
            generateColumnSize();
            columnSizeChange();
            isFooterPrimaryVisible();
        });


        // Listen footer colors.
        $(`
            [name="${SELECTOR.BACKGROUNDCOLOR}"],
            [name="${SELECTOR.TEXTCOLOR}"],
            [name="${SELECTOR.LINKTEXT}"],
            [name="${SELECTOR.LINKHOVERTEXT}"]
        `).on('color.changed', apply);

        // Observe social media links.
        $(`
            [name="facebooksetting"],
            [name="twittersetting"],
            [name="linkedinsetting"],
            [name="youtubesetting"],
            [name="gplussetting"],
            [name="instagramsetting"],
            [name="pinterestsetting"],
            [name="quorasetting"]
        `).on('input', function() {
            socialMediaLinks($(this).attr('name'), $(this).val());
            isFooterPrimaryVisible();
        });

        // Listen column type.
        $(`[name*="${SELECTOR.COLUMN}"][name*="type"]`).on('change', function() {
            let index = $(this).attr('name').replace(SELECTOR.COLUMN, '').replace('type', '');
            toggleType(index);
            isFooterPrimaryVisible();
        });

        // Listen title change.
        $(`[name*="${SELECTOR.COLUMN}"][name*="title"]`).on('input', function() {
            let index = $(this).attr('name').replace(SELECTOR.COLUMN, '').replace('title', '');
            titleChange(index);
        });

        // Listen content change.
        $(`[name*="${SELECTOR.COLUMN}"][name*="customhtml"]`).on('change', function() {
            let index = $(this).attr('name').replace(SELECTOR.COLUMN, '').replace('customhtml', '');
            contentChange(index);
            isFooterPrimaryVisible();
        });

        // Listen menu change.
        $(`[name*="${SELECTOR.COLUMN}"][name*="menu"]:not([name*="orientation"])`).on('change', function() {
            let index = $(this).attr('name').replace(SELECTOR.COLUMN, '').replace('menu', '');
            menuChange(index);
            isFooterPrimaryVisible();
        });

        // Listen menu orientation change.
        $(`[name*="${SELECTOR.COLUMN}"][name*="menuorientation"]`).on('change', function() {
            let index = $(this).attr('name').replace(SELECTOR.COLUMN, '').replace('menuorientation', '');
            menuOrientationChange(index);
        });

        // Listen social selection change.
        $(`[name*="${SELECTOR.COLUMN}"][name*="social"]`).on('change', function() {
            let index = $(this).attr('name').replace(SELECTOR.COLUMN, '').replace('social', '');
            socialSelectionChanges(index);
            isFooterPrimaryVisible();
        });

        // Secondary footer.
        // Show logo in the footer.
        $(`[name="${SELECTOR.SHOWLOGO}"]`).on('change', showLogo);

        // Show secondary social icons in the footer.
        // $(`[name="${SELECTOR.SECONDARYSOCIAL}"]`).on('change', secondarySocial);

        // Show terms ans condition link in the footer.
        $(`[name="${SELECTOR.TERMSANDCONDITIONSSHOW}"]`).on('change', termsAndConditionsShow);

        // Handle terms and condition link change.
        $(`[name="${SELECTOR.TERMSANDCONDITIONS}"]`).on('input', termsAndConditions);

        // Show privacy policy link in the footer.
        $(`[name="${SELECTOR.PRIVACYPOLICYSHOW}"]`).on('change', privacyPolicyShow);

        // Handle privacy policy link change.
        $(`[name="${SELECTOR.PRIVACYPOLICY}"]`).on('input', privacyPolicy);

        // Show copyright in the footer.
        $(`[name="${SELECTOR.COPYRIGHTSHOW}"]`).on('change', copyrightShow);

        // Handle copyright content change.
        $(`[name="${SELECTOR.COPYRIGHT}"]`).closest('.felement').append(M.util.get_string('footercopyrightstags', 'theme_remui'));
        $(`[name="${SELECTOR.COPYRIGHT}"]`).on('input', copyright);


    }
    return {
        init: init,
        apply: apply
    };
});
