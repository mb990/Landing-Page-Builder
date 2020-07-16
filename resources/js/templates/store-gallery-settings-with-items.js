$(document).ready(function () {

    window.storeGallery = function(e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        let modelType = 'App\\GallerySettings';

        let files = $('.js-gallery-image')[0].files;

        // check if exactly 12 images are added
        if (files.length !== 12) {

            alert('You must add 12 images');

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

            // saving gallery image item

            console.log('broj slika je: ' + files.length);

            let number = 0;

            for (var i = 0; i < files.length; i++) {

                $.post(route('gallery-image-item.store'),
                    {
                        gallery_settings_id: settings_id,
                        blade_file: 'templates.' + template_name + '.page_elements.gallery-content'
                    }
                ).done(function (data) {

                    // console.log('trenutni broj: ' + (number + 1));

                    // saving gallery image item image
                    let file = files[number];

                    let form_data = new FormData();
                    form_data.append('image', file);
                    form_data.append('template_name', template_name);
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

                    number ++;

                })
            }
        })
    }

});
