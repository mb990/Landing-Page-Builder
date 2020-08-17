$(document).ready(function () {

    window.updateProjectNewsletter = function (e) {

        e.preventDefault();

        let element_id = $('.js-selected-project-page-element-id').val();

        let title = $('.js-edit-newsletter-title').val();
        let button_value = $('.js-edit-newsletter-button-value').val();

        $.ajax({

            url: route('project.newsletter.update', element_id),
            type: 'put',
            data: {
                title: title,
                button_value: button_value
            }

        })

    }

});
