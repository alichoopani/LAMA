/*
Template Name: Color LAMA - Responsive LAMA Dashboard Template build with Twitter Bootstrap 3 & 4
Version: 4.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v4.0/admin/
*/

var handleDataTableFixedHeader = function() {
	"use strict";

    if ($('#data-table-fixed-header').length !== 0) {
        $('#data-table-fixed-header').DataTable({
            lengthMenu: [20, 40, 60],
            fixedHeader: {
                header: true,
                headerOffset: $('#header').height()
            },
            responsive: true
        });
    }
};

var TableManageFixedHeader = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleDataTableFixedHeader();
        }
    };
}();