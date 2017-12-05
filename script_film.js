function incrementeData(elt,key,increment){
    elt.data(key,(elt.data(key)+increment));
}

$(document).ready(function(){

    $('#hideAside').click(function () {
        $('ol').toggle(500);
    });

    $('#fadeImg').click(function () {
        $('img').toggle();
        $('section label').toggle(500);
    });

    $('#toggleMenu').click(function () {
        $('header a').toggle(500);
    });

    $('#faq > dt').each(function () {
        $(this).data('text',$(this).html());
        $(this).data('nb',0).append(' : ' + $(this).data('nb') + ' clique(s)');
    }).click(function () {
        if ($(this).data('nb') == 0) {
            incrementeData($(this), 'nb', 1);
            $(this).html($(this).data('text') + ' : ' + $(this).data('nb') + ' clique(s)');
        }
        $('#faq > dd').css('color', 'white');
        $(this).next().css('color', 'black');
    });
});
