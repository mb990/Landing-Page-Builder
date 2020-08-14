$(document).ready(function () {

    window.setGallerySettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\GallerySettings') {

            let numberOfEntries = 0;

            $.each(data.settings.page_elementable.image_items, function (e, i) {

                let input = '<input type="text" disabled data-id="'+ i.image.id +'" class="js-media-hover js-project-edit-gallery-image-filename-'+ (e + 1) +'" value="'+ i.image.filename +'">';

                $('.js-project-edit-gallery-span').append(input);

                numberOfEntries ++;

            });

            $.each(data.settings.page_elementable.video_items, function (e, i) {

                let input = '<input type="text" disabled data-id="'+ i.id +'" class="js-media-hover js-project-edit-gallery-video-filename-'+ (e + 1) +'" value="'+ i.filename +'">';

                $('.js-project-edit-gallery-span').append(input);

                numberOfEntries ++;

            });

            let multipleFilesInput = '<input type="file" class="js-project-edit-gallery-item-add" multiple>';

            $('.js-project-edit-gallery-span-2').append(multipleFilesInput);

            $('.js-project-edit-gallery-current-number-of-items').val(numberOfEntries);

        }

    }

})
