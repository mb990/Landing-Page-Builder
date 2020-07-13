$(document).ready(function () {

    window.showTemplate = function () {

        // e.preventDefault();

        let id = $('.js-template-id').val();

        $.get(route('template.show', id), function (data) {
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
