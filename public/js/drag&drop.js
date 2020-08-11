window.selectElement = function(event){
    var target = $( event.target );
    if(target.is('.btn')){
        return;
    }

    $(".js-added-element").addClass("moving-element");
    $(".js-added-element").children().addClass("d-none");
    // $(".ui-state-default").prepend("<p class='js-moving'>Test</p>");
    if($(".js-added-element").has(".js-footer-var")){
        $(".js-footer-var").prepend("<p class='js-moving'>Footer</p>");
    }
    if($(".js-added-element").has(".js-gallery-var")){
        $(".js-gallery-var").prepend("<p class='js-moving'>Gallery</p>");
    }
    if($(".js-added-element").has(".js-content1-var")){
        $(".js-content1-var").prepend("<p class='js-moving'>General content #1</p>");
    }
    if($(".js-added-element").has(".js-content2-var")){
        $(".js-content2-var").prepend("<p class='js-moving'>General content #2</p>");
    }
    if($(".js-added-element").has(".js-content3-var")){
        $(".js-content3-var").prepend("<p class='js-moving'>General content #3</p>");
    }
    if($(".js-added-element").has(".js-hero-var")){
        $(".js-hero-var").prepend("<p class='js-moving'>Hero section</p>");
    }
    if($(".js-added-element").has(".js-newsletter-var")){
        $(".js-newsletter-var").prepend("<p class='js-moving'>Newsletter</p>");
    }
    if($(".js-added-element").has(".js-pricing-var")){
        $(".js-pricing-var").prepend("<p class='js-moving'>Pricing plans</p>");
    }
    if($(".js-added-element").has(".js-testimonial-var")){
        $(".js-testimonial-var").prepend("<p class='js-moving'>Testimonial</p>");
    }
    if($(".js-added-element").has(".js-top-menu-var")){
        $(".js-top-menu-var").prepend("<p class='js-moving'>Top menu</p>");
    }


};

window.dropElement = function(){
    $(".js-added-element").removeClass("moving-element");
    $(".js-added-element").children().removeClass("d-none");
    $(".js-moving").remove();
};