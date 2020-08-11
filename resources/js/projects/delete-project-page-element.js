$(document).ready(function () {

    window.deleteProjectElement = function (e) {

        let page_element_id = $('.js-selected-project-page-element-id').val();

        e.preventDefault();

        $.ajax({
            url: route('project.page-element.delete', page_element_id),
            type: 'delete',
            // success: alert('Element is deleted')
        }).done(function () {
            // e.target.parent().remove();
            
        })

    }
    $(document).on("click", ".element-delete", function() {
        $(this).parent().remove(); 
    });
})
