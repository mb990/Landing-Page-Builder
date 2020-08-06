$(document).ready(function () {

    window.deleteProject = function (e) {

        e.preventDefault();

        let project_slug = $('.js-project-delete-slug').val();

        $.ajax({
            url: route('project.delete', project_slug),
            type: 'delete'
        })

    }

})
