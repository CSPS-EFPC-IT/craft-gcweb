/*
 * Custom website js
 */

import ReportProblem from './reportProblem'

$(document).ready(function() {

    // Fix WET-BOEW implementation of bootstrap alerts
    $('.alert-dismissible .close').click(function() {
        $(this).parent('.alert').hide();
    });

    // Initialize the report problem component if present on the page
    const $reportProblemForm = $('#report-problem');
    if ($reportProblemForm.length) {
        ReportProblem.init($reportProblemForm);
    }
});
