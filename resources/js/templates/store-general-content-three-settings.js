$(document).ready(function () {

    window.storeGeneralContentThreeSettings = function (e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        let modelType = 'App\\GeneralContentThreeSettings';

        let title = $('.js-general-content-three-title').val();
        let text = $('.js-general-content-three-text').val();
        let link_url = $('.js-general-content-three-link-url').val();
        let button_value = $('.js-general-content-three-button-value').val();

        $.post(route('general-content-three-settings.store'),

            {
                title: title,
                text: text,
                link_url: link_url,
                button_value: button_value
            }

        ).done(function (data) {

            let element_id = data.settings.id;

            // saving new general content three section element
            $.post(route('page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: element_id,
                    page_elementable_type: modelType,
                    blade_file: 'templates.' + template_name +'.page_elements.general-content3'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'));

        })

    }

});
