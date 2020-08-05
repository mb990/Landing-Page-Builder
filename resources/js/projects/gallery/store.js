$(document).ready(function () {

    window.storeProjectGallery = function(e) {

        e.preventDefault();

        let template_name = $('.js-project-template-name').val();
        let page_element_type_id = $('.js-project-page-element-type-id').val();
        let project_id = $('.js-project-id').val();
        let project_slug = $('.js-project-slug').val();
        let project_name = $('.js-project-name').val();

        let modelType = 'App\\GallerySettings';

        let files = $('.js-project-gallery-image')[0].files;

        // check if exactly 12 files are added
        if (files.length < 1 || files.length > 12) {

            alert('You must add no less then 1 and no more then 12 gallery elements');

            return;
        }

        $.post(route('project.gallery-settings.store', project_slug),

            {
                // blade_file: 'page_elements.testimonials'
            }

        ).done(function (data) {

            let settings_id = data.settings.id;

            let number = 0;

            for (var i = 0; i < files.length; i++) {

                let file = files[number];

                if (file.type.includes('video')) {

                    // saving gallery video item

                    let form_data = new FormData();
                    form_data.append('video', file);
                    form_data.append('project_name', project_name);
                    form_data.append('storing_path', 'projects/' + project_name + '_' + project_id + '/gallery/videos');
                    form_data.append('video_name', 'video-' + file.name);
                    form_data.append('gallery_settings_id', settings_id);
                    form_data.append('blade_file', 'templates.' + template_name + '.page_elements.gallery-content-video');

                    $.ajax({

                        url: route('project.gallery-video-item.store', project_slug),
                        type: "post",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: console.log('poslato'),
                        // error: console.log('greska pri uploadu slike')

                    }).done(function (data) {
                        console.log(data.video);
                    });
                }

                else {

                    // saving gallery image item

                    $.post(route('project.gallery-image-item.store', project_slug),
                        {
                            gallery_settings_id: settings_id,
                            blade_file: 'templates.' + template_name + '.page_elements.gallery-content'
                        }
                    ).done(function (data) {

                        // saving gallery image item image

                        let form_data = new FormData();
                        form_data.append('image', file);
                        form_data.append('project_name', project_name);
                        form_data.append('storing_path', 'projects/' + project_name + '_' + project_id + '/gallery/images');
                        form_data.append('image_name', 'image-' + data.item.id);
                        form_data.append('imageable_type','App\\GalleryImageItem');
                        form_data.append('imageable_id', data.item.id);

                        $.ajax({

                            url: route('project.gallery-image-item-image.store'),
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
                    })
                }

                number ++;
            }

            // saving new gallery settings element
            $.post(route('project.page-element.store', project_slug),
                {
                    project_id: project_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: settings_id,
                    page_elementable_type: modelType,
                    blade_file: 'templates.' + template_name + '.page_elements.gallery'
                })
                .done(function (data) {
                    $.get(route('project.page-element.render-single', data.element.id)

                    ).done(function (data) {

                        setTimeout(function () {

                            $('.js-project-preview-elements').append(data.view);
                        }, 10000);

                        });
                    })
                })
                .fail(console.log('failed element'));
    }

});
