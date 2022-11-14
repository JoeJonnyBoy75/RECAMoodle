/* eslint-disable no-undef */
define(['jquery', 'core/ajax', 'core/chartjs'], function($, Ajax) {

    var SELECTORS = {
        ROOT: null,
        CHART: "#barChart",
        CHART_AREA: '#quiz-chart-area',
        COURSE_LIST: '#quiz-course-list',
        QUIZ_LIST: '#quiz-list',
        LIST_SELECTED: 'option:selected',
        ERROR: '.quiz-stats-error'
    };
    var barChart = null;
    var getStepSize = function(datasets) {
        let max = 0;
        let current;
        datasets.forEach(function(data) {
            current = Math.max.apply(Math, data.data);
            max = current > max ? current : max;
        });
        return Math.ceil(max / 20);
    };
    /**
     *
     */
    function createBarChart() {
        var courseId = getSelectedCourseID();
        var quizId = getSelectedQuizID();

        Ajax.call([{
            methodname: 'block_remuiblck_get_quiz_participation',
            args: {
                courseid: courseId,
                quizid: quizId
            }
        }])[0]
        .done(function(response) {
            if (response.datasets === undefined) {
                $(SELECTORS.ROOT).find(SELECTORS.CHART_AREA).hide();
                $(SELECTORS.ROOT).find(SELECTORS.ERROR).show();
            } else {
                if (barChart !== null) {
                    barChart.destroy();
                }
                var barcontext = $(SELECTORS.ROOT).find(SELECTORS.CHART).get(0).getContext("2d");
                barcontext.canvas.height = 400;

                var barData = {
                    labels: response.labels,
                    datasets: response.datasets
                };
                barChart = new Chart(barcontext, {
                    type: 'bar',
                    data: barData,
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            yAxes: [{
                                scaleLabel: {
                                    display: true,
                                    labelString: M.util.get_string('noofstudents', 'block_remuiblck')
                                },
                                ticks: {
                                    min: 0,
                                    stepSize: getStepSize(response.datasets)
                                }
                            }]
                        }
                    }
                });
            }
        })
        .fail(function() {
            $(SELECTORS.ROOT).find(SELECTORS.CHART_AREA).hide();
            $(SELECTORS.ROOT).find(SELECTORS.ERROR).show();
        });
    }

    var getSelectedCourseID = function() {
        return $(SELECTORS.ROOT).find(SELECTORS.COURSE_LIST + ' ' + SELECTORS.LIST_SELECTED).data('courseid');
    };
    var getSelectedQuizID = function() {
        return $(SELECTORS.ROOT).find(SELECTORS.QUIZ_LIST + ' ' + SELECTORS.LIST_SELECTED).data('quizid');
    };
    var populateQuizSelector = function() {
        var courseId = getSelectedCourseID();
        Ajax.call([{
            methodname: 'block_remuiblck_get_quizzes_of_course',
            args: {
                courseid: courseId
            }
        }])[0]
        .done(function(response) {
            var option = "";
            for (var i = 0; i < response.length; i++) {
                option = option + "<option data-id='" + response[i].courseid + "' data-quizid='" + response[i].quizid + "'>";
                option = option + response[i].quizname + "</option>";
            }
            $(SELECTORS.ROOT).find(SELECTORS.QUIZ_LIST).empty().append(option);
            createBarChart();
        })
        .fail(function() {
            $(SELECTORS.ROOT).find(SELECTORS.CHART_AREA).hide();
            $(SELECTORS.ROOT).find(SELECTORS.ERROR).show();
        });
    };
    var initEvents = function() {
        $(SELECTORS.ROOT).find(SELECTORS.COURSE_LIST).on('change', function() {
            populateQuizSelector();
        });
        $(SELECTORS.ROOT).find(SELECTORS.QUIZ_LIST).on('change', function() {
            createBarChart();
        });
    };

    var init = function(root) {
        SELECTORS.ROOT = root;
        $(document).ready(function() {
            initEvents();
            if ($(SELECTORS.ROOT).find(SELECTORS.CHART).length) {
                createBarChart();
            }
        });
    };
    return {
        init: init
    };
});
