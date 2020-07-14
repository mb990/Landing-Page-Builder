$(document).ready(function () {

    window.storeTopMenuSettings = function(e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        let modelType = 'App\\TopMenuSettings';

        $.post(route('top-menu-settings.store'),
            {
                //np
            }
            ).done(function (data) {

            // saving top menu image

            let form_data = new FormData();
            form_data.append('image', $('#top-menu-image')[0].files[0]);
            form_data.append('template_name', template_name);
            form_data.append('image_name', 'top-menu');
            form_data.append('imageable_type', modelType);
            form_data.append('imageable_id', data.settings.id);

            $.ajax({

                url: route('template.top-menu-image.store'),
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

            // // saving new top menu element
            $.post(route('page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: data.settings.id,
                    page_elementable_type: modelType,
                    blade_file: 'templates.' + template_name +'.page_elements.top_menu'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'));
            // saving top menu link
            $('.js-top-menu-link').each(function (e, i) {
                let url = $("#link-url-" + (e + 1)).val();
                let title = $("#title-" + (e + 1)).val();
                $.post(route('top-menu-link.store'),
                    {
                        url: url,
                        title: title,
                        top_menu_settings_id: data.settings.id
                    }
                ).done(function (data) {
                    console.log('link je dodat');
                    $(".modal").modal('hide');
                })
                    .fail(console.log('link nije dodat'))
            })

            })
            .fail(console.log('failed settings'))
    }
});
