$(document).ready(function () {

    window.storeProjectSubscriber = function(e) {

        e.preventDefault();

        let project_slug = $('.js-subscriber-project-slug').val();
        let email = $('.js-subscriber-email').val();
        let project_name = '';

        $.ajax({
            url: route('project.subscriber.store', project_slug),
            type: 'post',
            data: {
                email: email,
                project_slug: 'adad' // srediti kad bude bilo ispisa projekta
            }
        }).done(function (data) {
            console.log(data.subscriber);
        })
    }

});
