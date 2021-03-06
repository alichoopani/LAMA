/*
Template Name: Color LAMA - Responsive LAMA Dashboard Template build with Twitter Bootstrap 3 & 4
Version: 4.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v4.0/admin/
*/

var handleDataTableAutofill = function() {
	"use strict";

    if ($('#data-table-autofill').length !== 0) {
        $('#data-table-autofill').DataTable({
            autoFill: true,
            responsive: true
        });
    }
};

var TableManageAutofill = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleDataTableAutofill();
        }
    };
}();
