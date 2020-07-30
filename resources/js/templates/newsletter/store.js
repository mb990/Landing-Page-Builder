$(document).ready(function () {

    window.storeTemplateNewsletter = function (e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        let modelType = 'App\\NewsletterSettings';

        let title = $('.js-newsletter-title').val();
        let button_value = $('.js-newsletter-button-value').val();

        $.post(route('template.newsletter.store'),

            {
                title: title,
                button_value: button_value
            }
        ).done(function (data) {

            // saving new newsletter element
            $.post(route('template.page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: data.settings.id,
                    page_elementable_type: modelType,
                    blade_file: 'templates.' + template_name +'.page_elements.newsletter'
                })
            })

    }

});
