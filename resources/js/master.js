$(document).ready(function(){
    $(".js-link button").click(function(e) {
        idName = e.target.getAttribute('id');
        $('html,body').animate({
            scrollTop: $(".link-"+idName).offset().top},
            'slow');
    });
    function showImages(el) {
        var windowHeight = jQuery( window ).height();
        $(el).each(function(){
            var thisPos = $(this).offset().top;
    
            var topOfWindow = $(window).scrollTop();
            if (topOfWindow + windowHeight - 200 > thisPos ) {
                $(this).addClass("fadeIn");
            }
        });
    }
    $(document).ready(function(){
        showImages('.star');
    });
    
    // if the image in the window of browser when scrolling the page, show that image
    $(window).scroll(function() {
        showImages('.star');
    });

    //Back to the top button
    let btn = $('.js-back-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
        btn.addClass('show');
        } else {
        btn.removeClass('show');
        }
    });

    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });
})