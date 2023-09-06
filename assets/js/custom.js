$(document).ready(function() {

    $(window).scroll(function() {
        if ($(window).width() < 768 && $(this).scrollTop() > 300) {
            $(".mobile-section").show();
        } else {
            $(".mobile-section").hide();
        }

    });

});