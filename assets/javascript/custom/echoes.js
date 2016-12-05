// Custom JS

function equalHeight(group) {
    tallest = 0;
    group.each(function () {
        thisHeight = $(this).height();
        if (thisHeight > tallest) {
            tallest = thisHeight + 2;
        }
    });

    group.height(tallest);
}

function hundredHeight(classid, percent) {
    $(classid).css({'height': (($(window).height() * (percent / 100)) - 30) + 'px'});
}


$.fn.firstWord = function () {
    var text = this.text().trim().split(" ");
    var first = text.shift();
    this.html((text.length > 0 ? "<span class='first-word'>" + first + "</span> " : first) + text.join(" "));
};

//make all external svg inline, so we can mess with it
$(function () {
    activate('img[src*=".svg"]');

    function activate(string) {
        jQuery(string).each(function () {
            var $img = jQuery(this);
            var imgID = $img.attr('id');
            var imgClass = $img.attr('class');
            var imgURL = $img.attr('src');

            jQuery.get(imgURL, function (data) {
                // Get the SVG tag, ignore the rest
                var $svg = jQuery(data).find('svg');

                // Add replaced image's ID to the new SVG
                if (typeof imgID !== 'undefined') {
                    $svg = $svg.attr('id', imgID);
                }
                // Add replaced image's classes to the new SVG
                if (typeof imgClass !== 'undefined') {
                    $svg = $svg.attr('class', imgClass + ' replaced-svg');
                }

                // Remove any invalid XML tags as per http://validator.w3.org
                $svg = $svg.removeAttr('xmlns:a');

                // Replace image with new SVG
                $img.replaceWith($svg);

            }, 'xml');
        });
    }


});

function setOrbit(container, slide) {
    //get height of slide
    var slh = $(slide).height();
    //set height of containers
    if (slh > 100) {
        $(container + " .orbit-container").css({'height': slh + 'px'});
        $(container + " .orbit-slide").css({'max-height': slh + 'px'});
    }
    //alert(slide);
}
function setSidebar() {

    var footer = $("#footer-container");
    var sidebarHeight = 0;
    var minHeight = $(window).height() - footer.height();

    if (Foundation.MediaQuery.atLeast('large')) {
        $('.main-content').css({
            'min-height': minHeight + 'px'
        });

        if ($('.main-content').height() < minHeight) {
            sidebarHeight = minHeight;
        } else {
            sidebarHeight = $('.main-content').height();
        }
        $('.sidebar').css({
            'min-height': sidebarHeight + 'px'
        });
    }else{
        $('.sidebar').css({
            'min-height': '0px'
        });
        $('.main-content').css({
            'min-height': '0px'
        });
    }
}
//RUN stuff

$(window).bind(' load resize orientationChange ', function () {
    setTimeout(function () {


        setOrbit('#news-row', '#news-row .orbit-slide .row');

        setSidebar();

        //equalHeight($(".eqheight"));

        /*setTimeout(function () {
         $(".product-bottom-bg").css({'height': (($(".etalage-row .product img").height()) + 10) + 'px'});
         }, 200);*/

        /*equalHeight($('.etalage-row .products li'));

         equalHeight($('.etalage-row .products li.product a:not(.button)'));

         hundredHeight('.init-bg', 70);*/

        //$('#site-name').firstWord();


    }, 300);

});
