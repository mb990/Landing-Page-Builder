$(document).ready(function () {

    window.updateaProjectGeneralContentOneSettings = function (e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            // if (!document.getElementById('js-project-edit-general-content-one-image').validity.valid) {
            //
            //     bool = false;
            // }

            return bool;
        }

        if (validate()) {

            // let template_name = $('.js-project-template-name').val();
            // let page_element_type_id = $('.js-project-page-element-type-id').val();
            let project_id = $('.js-project-id').val();
            // let project_slug = $('.js-project-slug').val();
            let project_name = $('.js-project-name').val();
            //
            let modelType = 'App\\GeneralContentOneSettings';

            let title = $('.js-project-edit-general-content-one-title').val();
            let text = $('.js-project-edit-general-content-one-text').val();
            let link_url = $('.js-project-edit-general-content-one-link-url').val();
            let button_value = $('.js-project-edit-general-content-one-button-value').val();

            // let settings_id = $('.js-project-edit-general-content-section-one-title').data('id');
            let element_id = $('.js-selected-project-page-element-id').val();

            $.ajax({
                url: route('project.general-content-one-settings.update', element_id),
                type: 'put',
                data:
                    {
                        title: title,
                        text: text,
                        link_url: link_url,
                        button_value: button_value
                    },
                success: function (data) {

                    let image = $('.js-project-edit-general-content-one-image')[0].files[0];

                    if(image) {

                        let old_image_id = $('.js-project-edit-general-content-one-image-filename').data('id');

                        //delete old image

                        $.ajax({

                            url: route('project.general-content-one-section-image.delete', old_image_id),
                            type: 'delete'

                        })

                        // store new general content one settings image
                        let form_data = new FormData();
                        form_data.append('image', image);
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
                            success: console.log('gen content 1 slika sacuvana'),
                            // error: console.log('greska pri uploadu slike')

                        }).done(function (data) {
                            console.log(data.image);
                        });
                    }
                }
            })
        }
        else {

            alert('You need to add image');
        }

    }

});
