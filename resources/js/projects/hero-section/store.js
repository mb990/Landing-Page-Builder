$(document).ready(function () {

    window.storeProjectHeroSectionSettings = function (e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            if (!document.getElementById('js-project-hero-section-image').validity.valid) {

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

            let modelType = 'App\\HeroSectionSettings';

            let title = $('.js-project-hero-section-title').val();
            let subtitle = $('.js-project-hero-section-subtitle').val();
            let button = $('.js-project-hero-section-button').val();

            $.post(route('project.hero-section-settings.store', project_slug),

                {
                    title: title,
                    subtitle: subtitle,
                    button_value: button
                }

            ).done(function (data) {

                let element_id = data.settings.id;

                // saving hero section settings image
                let form_data = new FormData();
                form_data.append('image', $('.js-project-hero-section-image')[0].files[0]);
                form_data.append('project_name', project_name);
                form_data.append('storing_path', 'projects/' + project_name + '_' + project_id);
                form_data.append('image_name', 'hero-section');
                form_data.append('imageable_type', modelType);
                form_data.append('imageable_id', element_id);

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

                // saving new hero section element
                $.post(route('project.page-element.store', project_slug),
                    {
                        project_id: project_id,
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

        else {

            alert('You need to add image');
        }
    }

});
