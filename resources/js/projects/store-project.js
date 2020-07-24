$(document).ready(function () {

    window.storeProject = function (e) {

        e.preventDefault();

        let template_id = 1;
        let user_id = $('.user-id').val();
        let name = $('.js-project-name').val();

        $.post(route('project.store', template_id),

            {
                template_id: template_id,
                user_id: user_id,
                name: name
            }

        ).done(function (data) {
            console.log(data.project);
        })

    }

})
