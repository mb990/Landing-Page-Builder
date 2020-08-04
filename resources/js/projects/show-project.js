$(document).ready(function () {

    window.showProject = function () {

        let slug = $('.js-show-project-project-slug').val();

        $.get(route('project.show', slug), function (data) {
            console.log(data);
        })
        .done(function (data) {
            console.log(data.elements);
            // $('.main-div').append(data.views[2]);

            jQuery.each(data.views, function (e, i) {
                $('.main-project-div').append(i);
                // console.log(i);
            })
        })
    }

});
