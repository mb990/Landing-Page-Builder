window.selectElement = function(e){
    if($(e.target).is('.btn')){
        return;
    }
    $(".js-added-element").addClass("moving-element");
    $(".js-added-element").children().addClass("d-none");
    $(".ui-state-default").prepend("<p class='js-moving'>Test</p>");
};
window.dropElement = function(){
    $(".js-added-element").removeClass("moving-element");
    $(".js-added-element").children().removeClass("d-none");
    $(".js-moving").remove();

};