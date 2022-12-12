(function ($) {
    'use strict';
    /*==================================================================
        [ Daterangepicker ]*/

    try {

        $('#input-start').daterangepicker({
            ranges: true,
            autoApply: true,
            applyButtonClasses: false,
            autoUpdateInput: false
        }, function (start, end) {
            $('#input-start').val(start.format('MM/DD/YYYY'));
            $('#input-end').val(end.format('MM/DD/YYYY'));
        });
    } catch (error) {
        console.log(error);
    }

})(jQuery);
