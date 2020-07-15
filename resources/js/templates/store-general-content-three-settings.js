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

        // $('.js-general-content-three-bullets input[type=text]').each(function () {
        //     console.log($(this).val());
        //     if ($(this).val() === "") {
        //         return false;
        //     }
        // });

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
                    blade_file: 'templates.' + template_name + '.page_elements.general-content3'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'));

            // saving section's bullet points
            $('.js-general-content-three-bullets').each(function (e, i) {

                console.log('usao u bullet point' + (e + 1));

                let title = $(".js-general-content-three-bullet-point-title-" + (e + 1)).val();
                let text = $(".js-general-content-three-bullet-point-text-" + (e + 1)).val();

                $.post(route('general-content-three-bullet-point.store'),
                    {
                        title: title,
                        text: text,
                        general_content_three_settings_id: element_id,
                        blade_file: 'templates.' + template_name +'.page_elements.general-content3-bullet'
                    }
                ).done(function (data) {
                    console.log('bullet point je dodat');
                    $(".modal").modal('hide');
                })
            })

        })
    }

});