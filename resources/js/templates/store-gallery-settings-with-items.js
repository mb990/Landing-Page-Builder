$(document).ready(function () {

    window.storeGallery = function(e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        let modelType = 'App\\GallerySettings';

        let files = $('.js-gallery-image')[0].files;

        // check if exactly 12 files are added
        if (files.length !== 12) {

            alert('You must add 12 files');

            return;
        }

        $.post(route('gallery-settings.store'),

            {
                // blade_file: 'page_elements.testimonials'
            }

        ).done(function (data) {

            let settings_id = data.settings.id;

            // saving new gallery settings element
            $.post(route('page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: settings_id,
                    page_elementable_type: modelType,
                    blade_file: 'templates.' + template_name + '.page_elements.gallery'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'));

            let number = 0;

            for (var i = 0; i < files.length; i++) {

                let file = files[number];

                if (file.type.includes('video')) {

                    // saving gallery video item

                    let form_data = new FormData();
                    form_data.append('video', file);
                    form_data.append('template_name', template_name);
                    form_data.append('storing_path', 'templates/' + template_name + '/gallery/videos');
                    form_data.append('video_name', 'video-' + file.name);
                    form_data.append('gallery_settings_id', settings_id);
                    form_data.append('blade_file', 'templates.' + template_name + '.page_elements.gallery-content-video');

                    $.ajax({

                        url: route('gallery-video-item.store'),
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

                    $.post(route('gallery-image-item.store'),
                        {
                            gallery_settings_id: settings_id,
                            blade_file: 'templates.' + template_name + '.page_elements.gallery-content'
                        }
                    ).done(function (data) {

                        // saving gallery image item image

                        let form_data = new FormData();
                        form_data.append('image', file);
                        form_data.append('template_name', template_name);
                        form_data.append('storing_path', 'templates/' + template_name + '/gallery/images');
                        form_data.append('image_name', 'image-' + data.item.id);
                        form_data.append('imageable_type','App\\GalleryImageItem');
                        form_data.append('imageable_id', data.item.id);

                        $.ajax({

                            url: route('template.gallery-image-item-image.store'),
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
        })
    }

});
