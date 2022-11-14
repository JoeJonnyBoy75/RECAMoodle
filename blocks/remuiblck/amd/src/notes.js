define(['jquery', 'core/ajax'], function($, Ajax) {
     /* Add Notes Block */
     var SELECTORS = {
        ADD_NOTE_BUTTON: '.add-notes-button',
        ADD_NOTE_SELECT: '.add-notes-select',
        SITE_NOTE: '.site-note',
        COURSE_NOTE: '.course-note',
        PERSONAL_NOTE: '.personal-note',
        STUDENT_LIST: '.select2-studentlist'
     };
    if ($(SELECTORS.ADD_NOTE_SELECT).length) {
        $(SELECTORS.ADD_NOTE_BUTTON).hide();
        $(SELECTORS.STUDENT_LIST).hide();
        var courseId, studentCount, userId, courseName;

        $(SELECTORS.ADD_NOTE_SELECT + ' select').on('change', function() {
            $(SELECTORS.ADD_NOTE_BUTTON).hide();
            courseId = $(this).children(":selected").attr("id");
            courseName = $(this).children(":selected").text();
            if (courseId === undefined) {
                $(SELECTORS.STUDENT_LIST).empty();
                $(SELECTORS.STUDENT_LIST).hide();
                return;
            }
            Ajax.call([{
                methodname: 'block_remuiblck_get_enrolled_users_by_course',
                args: {
                    courseid: courseId
                }
            }])[0].done(function(response) {
                studentCount = Object.keys(response).length;
                $(SELECTORS.STUDENT_LIST).show();
                $(SELECTORS.STUDENT_LIST).empty();
                if (studentCount) {
                    $(SELECTORS.STUDENT_LIST).append('<option>' + M.util.get_string(
                        "selectastudent", "block_remuiblck") + ' (' + M.util.get_string("total", "moodle") +
                        ': ' + studentCount + ')</option>');

                    $.each(response, function(index, student) {
                        $(SELECTORS.STUDENT_LIST).append('<option value="' + student.id + '">' + student.fullname + '</option>');
                    });

                } else {
                    $(SELECTORS.STUDENT_LIST).append('<option>' + M.util.get_string("nousersenrolledincourse",
                        "block_remuiblck", courseName) + '</option>');
                }

            }).fail(function(ex) {
                $(SELECTORS.STUDENT_LIST).html('<option>' + ex.message + '</option>');
            });
        });

        $(SELECTORS.STUDENT_LIST).on('change', function() {
            $(SELECTORS.ADD_NOTE_BUTTON).show();
            userId = $(this).find('option:selected').val();
            var notesLink = M.cfg.wwwroot + '/notes/edit.php?courseid=' + courseId +
                '&userid=' + userId + '&publishstate=site';
            $(SELECTORS.ADD_NOTE_BUTTON + ' ' + SELECTORS.SITE_NOTE).attr('href', notesLink);
            notesLink = M.cfg.wwwroot + '/notes/edit.php?courseid=' + courseId +
                '&userid=' + userId + '&publishstate=public';
            $(SELECTORS.ADD_NOTE_BUTTON + ' ' + SELECTORS.COURSE_NOTE).attr('href', notesLink);
            notesLink = M.cfg.wwwroot + '/notes/edit.php?courseid=' + courseId +
                '&userid=' + userId + '&publishstate=draft';
            $(SELECTORS.ADD_NOTE_BUTTON + ' ' + SELECTORS.PERSONAL_NOTE).attr('href', notesLink);
        });
    }
    /* End - Add Notes Block */
});
