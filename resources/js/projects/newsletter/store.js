$(document).ready(function () {

    window.storeProjectNewsletter = function (e) {

        e.preventDefault();

        let template_name = $('.js-project-template-name').val();
        let page_element_type_id = $('.js-project-page-element-type-id').val();
        let project_id = $('.js-project-id').val();
        let project_slug = $('.js-project-slug').val();

        let modelType = 'App\\NewsletterSettings';

        let title = $('.js-project-newsletter-title').val();
        let button_value = $('.js-project-newsletter-button-value').val();

        $.post(route('project.newsletter.store', project_slug),

            {
                title: title,
                button_value: button_value
            }
        ).done(function (data) {

            // saving new newsletter element
            $.post(route('project.page-element.store', project_slug),
                {
                    project_id: project_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: data.settings.id,
                    page_elementable_type: modelType,
                    blade_file: 'templates.' + template_name +'.page_elements.newsletter'
                }).done(function (data) {

                $.get(route('project.page-element.render-single', data.element.id)

                ).done(function (data) {

                    setTimeout(function () {

                        $('.js-project-preview-elements').append(data.view);
                        createButtons(data.element.id);
                    }, 1000);
                })

            })
        })

    }

});
