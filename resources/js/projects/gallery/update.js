$(document).ready(function () {

    window.updateProjectGallery = function(e) {

        e.preventDefault();

        let delayTime = 0;

        let template_name = $('.js-project-template-name').val();
        let page_element_type_id = $('.js-project-page-element-type-id').val();
        let project_id = $('.js-project-id').val();
        let project_slug = $('.js-project-slug').val();
        let project_name = $('.js-project-name').val();

        let modelType = 'App\\GallerySettings';

        let files = $('.js-project-edit-gallery-image')[0].files;

        let element_id = $('.js-selected-project-page-element-id').val();

        let current_number_of_items = $('.js-project-edit-gallery-current-number-of-items').val();

        // calculate delay time
        for (var i = 0; i < files.length; i++) {

            let number = 0;

            let file = files[number];

            if (file.type.includes('video')) {

                delayTime += 10000;
            }

            else {

                delayTime += 1500;
            }

            number ++;
        }

        // check if correct number of inputs are added
        if (files.length < 1 || files.length > (12 - current_number_of_items)) {

            alert('You must add no less then 1 and no more then ' + (12 - current_number_of_items) + ' gallery elements');

            return;
        }

        $.ajax({
            url: route('project.gallery-settings.get', element_id),
            type: 'get',
            success: function (data) {

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

                        })
                    }

                    else {

                        // saving gallery image item

                        $.ajax({
                            url: route('project.gallery-image-item.store', project_slug),
                            type: 'post',
                            data:
                                {
                                    gallery_settings_id: settings_id,
                                    blade_file: 'templates.' + template_name + '.page_elements.gallery-content'
                                },
                            success: function (data) {

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

                                })
                            }
                        })
                    }

                    number ++;
                }
            }
     })
    }

});
