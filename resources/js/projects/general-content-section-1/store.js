$(document).ready(function () {

    window.storeProjectGeneralContentOneSettings = function (e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            if (!document.getElementById('js-project-general-content-section-one-image').validity.valid) {

                bool = false;
            }

            return bool;
        }

        if (validate()) {

            let template_name = $('.js-project-template-name').val();
            let page_element_type_id = $('.js-project-page-element-type-id').val();
            let project_id = $('.js-project-id').val();
            let project_slug = $('.js-project-slug').val();
            let project_name = $('.js-project-name').val();

            let modelType = 'App\\GeneralContentOneSettings';

            let title = $('.js-project-general-content-section-one-title').val();
            let text = $('.js-project-general-content-section-one-text').val();
            let link_url = $('.js-project-general-content-section-one-link-url').val();
            let button_value = $('.js-project-general-content-section-one-button-value').val();

            $.post(route('project.general-content-one-settings.store', project_slug),

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
                form_data.append('image', $('.js-project-general-content-section-one-image')[0].files[0]);
                form_data.append('project_name', project_name);
                form_data.append('storing_path', 'projects/' + project_name + '_' + project_id);
                form_data.append('image_name', 'general-content-one-section');
                form_data.append('imageable_type', modelType);
                form_data.append('imageable_id', element_id);

                $.ajax({

                    url: route('project.general-content-one-section-image.store'),
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
                $.post(route('project.page-element.store', project_slug),
                    {
                        project_id: project_id,
                        page_element_type_id: page_element_type_id,
                        page_elementable_id: element_id,
                        page_elementable_type: modelType,
                        blade_file: 'templates.' + template_name +'.page_elements.general-content1'
                    })
                    .done(function (data) {
                        $.get(route('project.page-element.render-single', data.element.id)

                        ).done(function (data) {

                            setTimeout(function () {

                                $('.js-project-preview-elements').append(data.view);
                                createButtons(data.element.id);
                            }, 1000);

                        });
                    })
                    .fail(console.log('failed element'));

            })
        }
        else {

            alert('You need to add image');
        }

    }

});
