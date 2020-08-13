$(document).ready(function () {

    window.getFooterData = function (e, elementId) {

        e.preventDefault();

        let project_slug = $('.js-project-slug').val();

        $.ajax({

            url: route('project.footer-settings.show', project_slug, elementId),
            type:'get',
            success: function (data) {

                console.log(data);
            }

        })

    }

})
