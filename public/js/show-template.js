$(document).ready(function () {

    window.showTemplate = function () {

        // e.preventDefault();

        let id = $('.js-template-id').val();

        console.log(123);

        $.get('/template/' + id, function (data) {
            console.log(data);
        }).done(function (data) {
            data.views.forEach(function (e) {
                $('.main-div').append(e);
                console.log(e);
            })
        })

    }

})
