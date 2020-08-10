$(document).ready(function () {

    window.sendEmailToProjectSubscribers = function (e) {

        e.preventDefault();

        let message = $('.js-project-subscribers-email-message').val();
        let project_id = $('.js-project-subscribers-email-project-id').val();

        console.log(project_id);

        let form_data = new FormData();

        form_data.append('message', message);
        form_data.append('project_id', project_id);

        $.ajax({

            url: route('subscribers.notify.all'),
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

    }

})
