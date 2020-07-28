$(document).ready(function () {

    window.storeProject = function (e) {

        e.preventDefault();

        let template_id = $('.template-id-main').val();
        let user_id = $('.user-id').val();
        let name = $('.js-project-name').val();
        let route_slug = $('.route-slug').val();

        $.post(route('project.store', template_id),

            {
                template_id: template_id,
                user_id: user_id,
                name: name,
                route_slug: route_slug
            }

        ).done(function (data) {
            console.log(data.project);
        })

    }

})
