$(document).ready(function () {

    window.storeHeroSectionSettings = function (e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        let modelType = 'App\\HeroSectionSettings';

        let title = $('.js-hero-section-title').val();
        let subtitle = $('.js-hero-section-subtitle').val();
        let button = $('.js-hero-section-button').val();

        $.post(route('hero-section-settings.store'),

            {
                title: title,
                subtitle: subtitle,
                button_value: button
            }

        ).done(function (data) {

            let element_id = data.settings.id;

            // saving hero section settings image
            let form_data = new FormData();
            form_data.append('image', $('#hero-section-image')[0].files[0]);
            form_data.append('template_name', template_name);
            form_data.append('image_name', 'hero-section');
            form_data.append('imageable_type', modelType);
            form_data.append('imageable_id', element_id);

            $.ajax({

                url: route('template.hero-section-image.store'),
                type: "post",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                success: console.log('poslato'),
                // error: console.log('greska pri uploadu slike')

            }).done(function (data) {
                console.log(data.image);
            });

            // saving new hero section element
            $.post(route('page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: element_id,
                    page_elementable_type: modelType,
                    blade_file: 'templates.' + template_name +'.page_elements.hero_section'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'));

        })

    }

});
