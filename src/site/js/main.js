/*
 * Custom website js
 */

$(document).ready(function() {

    // Fix WET-BOEW implementation of bootstrap alerts
    $('.alert-dismissible .close').click(function() {
        $(this).parent('.alert').hide();
    });

});