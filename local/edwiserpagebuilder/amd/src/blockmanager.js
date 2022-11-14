/* eslint-disable camelcase */
/* eslint-disable no-unused-vars */
/* eslint-disable require-jsdoc */
/* eslint-disable valid-jsdoc */
/* eslint-disable */

define(['jquery', 'core/ajax', 'core/templates'], function($, Ajax, Templates) {
    var refaddBlockModalUrl = '';
    const load = () => {
        $(document).ready(function() {
            let addblockbutton = "#epbaddblockbutton";
            let epbcustommodal = ".epb_custom_modal.modal";
            let epbclosebutton = epbcustommodal + " .modal-content .close";
            let epbcancelbutton = epbcustommodal + " .modal-content .cancel";
            let epbblockupdatebutton = epbcustommodal + " .modal-content .blocks-list .card-header .update-content";
            let epblayoutupdatebutton = epbcustommodal + " .modal-content .layout-list .card-header .update-content";

            let showLayoutsbutton = epbcustommodal + " .modal-content .show-layouts";
            let showBlocksbutton = epbcustommodal + " .modal-content .show-blocks";
            let layoutContainer = epbcustommodal + " .modal-body .addblock-modal-body.layout-list";
            let blockContainer = epbcustommodal + " .modal-body .addblock-modal-body.blocks-list";

            let epbupdateblocklistbtn = epbcustommodal + " .modal-content .action-buttons-modal .updateblocklist";
            let epbupdatelayoutlistbtn = epbcustommodal + " .modal-content .action-buttons-modal .updatelayoutlist";

            let epbdeleteblockbtn = blockContainer + " .card .delete-content";
            let epbdeletecardbtn = layoutContainer + " .card .delete-content";

            let epblayoutcard = layoutContainer + " .islayout";

            $(addblockbutton).on('click', function() {
                $(epbcustommodal).removeClass('d-none');
            });

            $(document).on("click", showLayoutsbutton, function() {
                $("#epb_custom_modal .modal-content").removeClass("blocklist").addClass("layoutlist");
            });
            $(document).on("click", showBlocksbutton, function() {
                $("#epb_custom_modal .modal-content").removeClass("layoutlist").addClass("blocklist");
            });

            $(document).on("click", epblayoutcard + " a", function(e) {
                e.preventDefault();
            });

            $(document).on("click", addblockbutton, function() {
                $(epbcustommodal).removeClass('d-none');
            });

            $(epbclosebutton + "," + epbcancelbutton).on('click', function() {
                $(epbcustommodal).addClass('d-none');
            });
            $(document).on("click", epbblockupdatebutton, function() {
                updateBlockContent(this, false);
            });
            $(document).on("click", epblayoutupdatebutton, function() {
                updateBlockContent(this, true);
            });

            function updateBlockContent(ele, islayout) {
                $(ele).attr('disabled', true);
                $(ele).find('.fa').removeClass('fa-download').addClass("fa-refresh rotate");

                Ajax.call([{
                    methodname: 'edwiserpagebuilder_update_block_content',
                    args: {blockname: $(ele).attr("data-blockname"), islayout: islayout},
                    done: function(data) {
                        $(ele).find('.fa').removeClass("rotate");
                        if (data.status == false) {
                            updateButton(ele);
                        } else {
                            $(ele).attr('disabled', false);
                        }
                    },
                    fail: function() {
                        $(ele).find('.fa').removeClass("rotate");
                        $(ele).attr('disabled', false);
                    }
                }]);
            }
            $(document).on("click", epbupdateblocklistbtn, function() {
                let _this = this;

                $(_this).attr('disabled', true);
                $(_this).find('.fa').removeClass('fa-download').addClass("fa-refresh rotate");
                var edwpageurl = $(_this).next().val();

                Ajax.call([{
                    methodname: 'edwiserpagebuilder_fetch_blocks_list',
                    args: {
                        edwpageurl: refaddBlockModalUrl,
                        contextid: M.cfg.contextid
                    },
                    done: function(data) {
                        $(_this).find('.fa').removeClass("rotate");
                        if (data.status == true) {
                            $(blockContainer + ' [data-parentblock="edwiseradvancedblock"]').remove();
                            $(blockContainer + ' .block-cards').prepend(data.html);
                            updateButton(_this);
                        } else {
                            $(_this).attr('disabled', false);
                        }
                    },
                    fail: function() {
                        $(_this).find('.fa').removeClass("rotate");
                        $(_this).attr('disabled', false);
                    }
                }]);
            });

            $(document).on("click", epbupdatelayoutlistbtn, function() {
                let _this = this;

                $(_this).attr('disabled', true);
                $(_this).find('.fa').removeClass('fa-download').addClass("fa-refresh rotate");

                Ajax.call([{
                    methodname: 'edwiserpagebuilder_fetch_layout_list',
                    args: {},
                    done: function(data) {
                        $(_this).find('.fa').removeClass("rotate");
                        if (data.status == true) {
                             $(layoutContainer + ' .block-cards').empty().prepend(data.html);
                            updateButton(_this);
                        } else {
                            $(_this).attr('disabled', false);
                        }
                    },
                    fail: function() {
                        $(_this).find('.fa').removeClass("rotate");
                        $(_this).attr('disabled', false);
                    }
                }]);
            });

            $(document).on("click", epbdeleteblockbtn, function() {
                var id = $(this).data("blockid");
                delete_content(id, false); // False for block
            });

            $(document).on("click", epbdeletecardbtn, function() {
                var id = $(this).data("blockid");
                delete_content(id, true); // True for layout
            });

            /**
             * @param id
             * @param islayout
             */
            function delete_content(id, islayout) {
                Ajax.call([{
                    methodname: 'local_edwiserpagebuilder_delete_block',
                    args: {id: id, islayout: islayout},
                    done: function(data) {
                        if (islayout) {
                            var element = layoutContainer;
                        } else {
                            var element = blockContainer;
                        }
                        $(element).find('.data[data-blockid="' + id + '"]').remove();
                    },
                    fail: function(data) {
                        console.log("We are failure");
                        console.log(data);
                    }
                }]);
            }

            /**
             * @param button
             */
            function updateButton(button) {
                $(button).removeClass('btn-primary').addClass('btn-success');
                $(button).find('.fa').removeClass('fa-refresh').addClass('fa-check');
                jQuery(button).find('span').html("Updated");
            }

        });
    };
    return {
        // Init: initialize,
        load: function(addBlockModalUrl){
            refaddBlockModalUrl = addBlockModalUrl;
            load();
        }
    };
});
