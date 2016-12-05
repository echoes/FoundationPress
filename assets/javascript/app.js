$(document).ready(function () {
    setTimeout(function () {

        $(".product-bottom-bg").css({'height': (($(".etalage-row .product img").height()) + 10) + 'px'});

        //setOrbit();

        equalHeight($(".eqheight"));

        /*equalHeight($('.etalage-row .products li'));

        equalHeight($('.etalage-row .products li.product a:not(.button)'));

        hundredHeight('.init-bg', 70);*/

        //$('#site-name').firstWord();


    }, 600);

});

$(window).resize(function () {
    setTimeout(function () {

        equalHeight($(".eqheight"));/*

        equalHeight($('.etalage-row .products li'));

        equalHeight($('.etalage-row .products li.product a:not(.button)'));

        hundredHeight('.init-bg', 70);*/

        $(".product-bottom-bg").css({'height': (($(".etalage-row .product img").height()) + 10) + 'px'});

        //setOrbit();

    }, 600);

});