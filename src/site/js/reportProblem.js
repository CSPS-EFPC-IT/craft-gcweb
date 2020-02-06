/**
 * ReportProblem Component
 *
 * Handle logic for the "Report a problem" component included at the bottom of all pages.
 */

export default {
    init ($reportProblemForm) {
        // Define re-usable jquery selectors
        const $reportExtra = $('#report-problem-extra');
        const $options = $reportProblemForm.find('[name="problems[]"]')
        const $submit = $reportProblemForm.find('button[type="submit"]');
        const $spinner = $reportProblemForm.find('.spinner');

        // Show additional information when an option is checked
        $options.on('change', () => $reportExtra[$options.is(':checked') ? 'removeClass' : 'addClass']('hide'));

        // Handle report problem form submission logic
        $reportProblemForm.on('submit', (e) => {
            e.preventDefault();

            // Post form data and display feedback to the user
            $.ajax({
                type: 'POST',
                url: '/actions/craftgcweb/report-problem',
                dataType: 'json',
                data: $reportProblemForm.serialize(),
                beforeSend: () => {
                    $reportProblemForm.find('fieldset').attr('disabled', 'disabled');
                    $submit.addClass('hide');
                    $spinner.removeClass('hide').focus();
                },
                complete: (request) => {
                    // Hide form and display feedback
                    $reportProblemForm
                        .css('overflow', 'hidden')
                        .animate({ opacity: 0, height: 0 }, 400, () => $reportProblemForm.addClass('hide'));

                    // Show corresponding feedback based on response status code
                    const status = request.status !== 200 || !request.responseJSON.success ? 'error' : 'success';
                    $('#report-problem-' + status).removeClass('hide').focus();
                }
            });
        });
    }
}
