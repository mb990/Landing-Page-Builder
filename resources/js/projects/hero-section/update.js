$(document).ready(function () {

    window.updateProjectHeroSectionSettings = function (e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            // if (!document.getElementById('js-project-hero-section-image').validity.valid) {
            //
            //     bool = false;
            // }

            return bool;
        }

        if (validate()) {

            let template_name = $('.js-project-template-name').val();
            let page_element_type_id = $('.js-project-page-element-type-id').val();
            let project_id = $('.js-project-id').val();
            let project_slug = $('.js-project-slug').val();
            let project_name = $('.js-project-name').val();

            let element_id = $('.js-selected-project-page-element-id').val();

            let modelType = 'App\\HeroSectionSettings';

            let title = $('.js-project-edit-hero-section-title').val();
            let subtitle = $('.js-project-edit-hero-section-subtitle').val();
            let button = $('.js-project-edit-hero-section-button').val();

            $.ajax({
                url: route('project.hero-section-settings.update', element_id),
                type: 'put',
                data:

                    {
                        title: title,
                        subtitle: subtitle,
                        button_value: button
                    },
                success: function (data) {

                    let image = $('.js-project-edit-hero-section-image')[0].files[0];

                    let settings_id = data.settings.id;

                    if (image) {

                        let old_image_id = $('.js-project-edit-hero-section-current-image').data('id');

                        //delete old image

                        $.ajax({

                            url: route('project.general-content-one-section-image.delete', old_image_id),
                            type: 'delete'

                        })

                        // saving hero section settings image
                        let form_data = new FormData();
                        form_data.append('image', image);
                        form_data.append('project_name', project_name);
                        form_data.append('storing_path', 'projects/' + project_name + '_' + project_id);
                        form_data.append('image_name', 'hero-section');
                        form_data.append('imageable_type', modelType);
                        form_data.append('imageable_id', settings_id);

                        $.ajax({

                            url: route('project.hero-section-image.store'),
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
                    }
                }

        }).done(function (data) {

            })
        }

        else {

            alert('You need to add image');
        }
    }

});
