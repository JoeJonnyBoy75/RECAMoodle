/* eslint-disable promise/catch-or-return */
/* eslint-disable no-console*/
/* eslint-disable no-trailing-spaces*/
/* eslint-disable no-undef*/
/* eslint-disable no-unused-vars*/
define([
    'jquery',
    'core/ajax',
    'core/modal_factory',
    'core/modal_events',
    'block_edwiserratingreview/jquery.dataTables',
    'block_edwiserratingreview/dataTables.bootstrap4',
], function ($, Ajax, ModalFactory, ModalEvents) {

    const SELECTOR = {
        minDate : "#min",
        maxDate : "#max",
        pendingapproval : "#pendingforapproval",
    };

    const getSelectedDateRange = () => {
        return [$(SELECTOR.minDate).val(), $(SELECTOR.maxDate).val()];
    };

    const init = () => {
        $(document).ready(function () {

            var modalexist;
            var bodycontent = '';
            var titlecontent = '';
            var reveiwid = '';
            var buttontext = '';


            var table = $('#example').DataTable({
                searching: false,
                autoWidth: true,
                serverSide: true,
                // columnDefs: [ { orderable: false, targets: [0,1,2,3,4,6]} ],
                bLengthChange: false,
                responsive: true,
                columns: [
                    { data: "reviewfor", orderable: true, className: 'ellip ellip-5 e-h-100'},
                    { data: "name", orderable: false },
                    { data: "email", orderable: false },
                    { data: "ratings", orderable: false, className: 'e-w-75' },
                    { data: "review", orderable: false, className: 'ellip ellip-5 e-h-100'},
                    { data: "date" },
                    { data: "action", orderable: false }
                ],
                ajax: function (data, callback, settings) {
                    const [min, max] = getSelectedDateRange();
                    var order = 'asc';                    
                    Ajax.call([{
                        methodname: 'block_edwiserratingreview_get_reviews',
                        args: {
                            start: data.start,
                            length: data.length, 
                            order: (data.order[0].column == 5) ? data.order[0].dir : 'desc', // 5 for 5th column intable.
                            mindate: min,
                            maxdate: max,
                            loadonlypending: $(SELECTOR.pendingapproval).is(":checked")
                        },
                        done: function(response) {
                            callback(response);
                        },
                        fail: function(response) {
                            console.log("failed to load");
                        }
                    }]);
                }
            });

            $(SELECTOR.minDate).keypress(function (event) { event.preventDefault(); });
            $(SELECTOR.maxDate).keypress(function (event) { event.preventDefault(); });

            $(SELECTOR.minDate).change(function () {
                const [min, max] = getSelectedDateRange();

                if (min > max && max != "") {
                    // reset the max date to min value if min is higher.
                    $(SELECTOR.maxDate).val(min);
                }

                $(SELECTOR.maxDate).attr('min', min);

                table.draw();
            });

            $(SELECTOR.maxDate).change(function () {
                table.draw();
            });

            $(SELECTOR.pendingapproval).on("change", function() {
                table.draw();
            });

            // This method is used to make ajax call for approving review.
            var updateapprove = function (reviewid, approvevalue, approveflag) {
                Ajax.call([{
                    methodname: 'block_edwiserratingreview_updateapprove',
                    args: {
                        reviewid: reviewid,
                        approvevalue: approvevalue,   //Value of approve field 0 or 1
                        approveflag: approveflag     // If this field is false then review will be removed from database
                                                    //If it is true the approve field value  updated
                    },
                    done: function (response) {
                        console.log(response);
                    },
                    fail: function (response) {
                        console.log("failed to load");
                    }
                }]);
            };

            // This method will create a modal for review.
            var approvalmodal = function (bodycontent, titlecontent, approvevalue, approvaflag, buttontext) {
                ModalFactory.create({
                    type: ModalFactory.types.SAVE_CANCEL,
                    title: titlecontent,
                    body: bodycontent,
                })
                    // eslint-disable-next-line promise/always-return
                    .then(function (modal) {
                        modalexist = modal;
                        modal.setSaveButtonText(buttontext);
                        var root = modal.getRoot();
                        root.on(ModalEvents.save, function () {
                            updateapprove(reveiwid, approvevalue, approvaflag);
                            table.draw("page");
                        });
                        modal.show();
                    });
            };

            var bodydata = function (currentbtn) {
                var currentrow = $(currentbtn).closest('tr');
                var col0 = currentrow.find('td:eq(0)').text();
                var col1 = currentrow.find('td:eq(1)').text();
                var col2 = currentrow.find('td:eq(2)').text();
                var col3 = currentrow.find('td:eq(3)').html();
                var col4 = currentrow.find('td:eq(4)').text();
                var col5 = currentrow.find('td:eq(5)').text();
                return `<p>${col0}</p><p>${col1}</p><p>${col2}</p><p>${col3}</p><p>${col4}</p><p>${col5}</p>`;
            };
            $(document).on('click', '.reviewapprovebtn', function () {
                bodycontent = bodydata(this);
                titlecontent = "Approve review";
                reveiwid = $(this).attr('data-id');
                buttontext = 'Approve';
                approvalmodal(bodycontent, titlecontent, 1, true, buttontext);

            });

            $(document).on('click', '.denyapprovemodal', function () {
                bodycontent = bodydata(this);
                titlecontent = "Unpublish review";
                reveiwid = $(this).attr('data-id');
                buttontext = 'Move to draft';
                approvalmodal(bodycontent, titlecontent, 0, true, buttontext);
            });

            $(document).on('click', '.instantapprove', function () {
                updateapprove($(this).attr('data-id'), 1, true);
                table.draw("page");
            });
            $(document).on('click', '.deniedapproval', function () {
                updateapprove($(this).attr('data-id'), 0, true);
                table.draw("page");
            });
            $(document).on('click', '.reviewremovebtn', function () {
                bodycontent = `<p>Are you sure you want to delete the selected review?</p>`;
                titlecontent = "Delete review";
                reveiwid = $(this).attr('data-id');
                buttontext = 'Confirm';
                approvalmodal(bodycontent, titlecontent, 0, false, buttontext);
            });

        });
    };

    return {
        init: init
    };
});
