$(document).ready(function(){

    $('#hideAside').click(function () {
        $('ol').toggle();
    });

    $('#fadeImg').click(function () {
        $('img').toggle();
        $('section label').toggle();
    });

    $('#toggleMenu').click(function () {
        $('header a').toggle();
    });

    $('#faq > dt').click(function () {
        $(this).next().toggle();
    });

});