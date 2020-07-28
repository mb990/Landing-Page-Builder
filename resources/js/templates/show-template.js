$(document).ready(function () {

    window.showTemplate = function () {

        // e.preventDefault();

        let slug = $('.js-template-slug').val();

        $.get(route('template.show', slug), function (data) {
            console.log(data);
        })
            .done(function (data) {
                // console.log(data.views);
                // $('.main-div').append(data.views[2]);

            jQuery.each(data.views, function (e, i) {
                $('.main-div').append(i);
                // console.log(i);
            })
        })

    }

});
