$(document).ready(function () {

    window.sendEmailToUsers = function (e) {

        e.preventDefault();

        let message = $('.js-admin-notification-message').val();

        let form_data = new FormData();

        form_data.append('message', message);

        // form_data.append('message');
        // form_data.append('image');

        $.ajax({

            url: route('users.notify.all'),
            type: "post",
            data: form_data,
            contentType: false,
            cache: false,
            processData: false,
            success: (function (data) {
                console.log(data.success);
            })
            // error: console.log('greska pri uploadu slike')

        })

        // $.post(route('users.notify.all'),
        //     {
        //         message: message
        //     }).done(function (data) {
        //
        //         console.log(data.success);
        //     })

    }

})
