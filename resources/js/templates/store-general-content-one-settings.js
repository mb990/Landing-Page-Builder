$(document).ready(function () {

    window.storeGeneralContentOneSettings = function (e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            if (!document.getElementById('js-general-content-section-one-image').validity.valid) {

                bool = false;
            }

            return bool;
        }

        if (validate()) {

            let template_id = $('#template_id').val();
            let template_name = $('#template_name').val();
            let page_element_type_id = $('#page_element_type_id').val();

            let modelType = 'App\\GeneralContentOneSettings';

            let title = $('.js-general-content-section-one-title').val();
            let text = $('.js-general-content-section-one-text').val();
            let link_url = $('.js-general-content-section-one-link-url').val();
            let button_value = $('.js-general-content-section-one-button-value').val();

            $.post(route('general-content-one-settings.store'),

                {
                    title: title,
                    text: text,
                    link_url: link_url,
                    button_value: button_value
                }

            ).done(function (data) {

                let element_id = data.settings.id;

                // saving general content one settings image
                let form_data = new FormData();
                form_data.append('image', $('.js-general-content-section-one-image')[0].files[0]);
                form_data.append('template_name', template_name);
                form_data.append('storing_path', 'templates/' + template_name);
                form_data.append('image_name', 'general-content-one-section');
                form_data.append('imageable_type', modelType);
                form_data.append('imageable_id', element_id);

                $.ajax({

                    url: route('template.general-content-one-section-image.store'),
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

                // saving new general content one section element
                $.post(route('page-element.store'),
                    {
                        template_id: template_id,
                        page_element_type_id: page_element_type_id,
                        page_elementable_id: element_id,
                        page_elementable_type: modelType,
                        blade_file: 'templates.' + template_name +'.page_elements.general-content1'
                    })
                    .done(function (data) {
                        console.log(data);
                    })
                    .fail(console.log('failed element'));

            })
        }
        else {

            alert('You need to add image');
        }

    }

});
