/*
Template Name: Color LAMA - Responsive LAMA Dashboard Template build with Twitter Bootstrap 3 & 4
Version: 4.0.0
Author: Sean Ngu
Website: http://www.seantheme.com/color-admin-v4.0/admin/
*/

var handleLoginPageChangeBackground = function() {
    $(document).on('click', '[data-click="change-bg"]', function(e) {
        e.preventDefault();
        var targetImage = '[data-id="login-cover-image"]';
        var targetImageSrc = 'url(' + $(this).attr('data-img') +')';

        $(targetImage).css('background-image', targetImageSrc);
        $('[data-click="change-bg"]').closest('li').removeClass('active');
        $(this).closest('li').addClass('active');
    });
};

var LoginV2 = function () {
	"use strict";
    return {
        //main function
        init: function () {
            handleLoginPageChangeBackground();
        }
    };
}();
