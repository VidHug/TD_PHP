function incrementeData(elt,key,increment){
    elt.data(key,(elt.data(key)+increment));
}

$(document).ready(function(){

    $(window).scroll(function () {
        let change = 200;
        if($(this).scrollTop() > change){
            $('#fleche').fadeIn(300);
        } else if($(this).scrollTop() <= change){
            $('#fleche').fadeOut(300);
        }
    });

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

    $('#faq > dl > dt').each(function () {
        $(this).data('text',$(this).html());
        $(this).data('nb',0).append(' : ' + $(this).data('nb') + ' clique(s)');
        $(this).data('open',false);
    }).click(function () {
        if (!$(this).data('open')) {
            incrementeData($(this), 'nb', 1);
            $(this).html($(this).data('text') + ' : ' + $(this).data('nb') + ' clique(s)');
            $('#faq > dl > dt').data('open',false);
            $(this).data('open',true);
        }
        $('#faq > dl > dd').css('color', 'white');
        $(this).next().css('color', 'black');
    });

    $('#faq > dl').click(function () {
        while($(this).children().data('nb') >= $(this).prev().children().data('nb')){
            $(this).insertBefore($(this).prev());
        }
    });
});
