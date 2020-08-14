$(document).ready(function () {

    window.setGeneralContentThreeSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\GeneralContentThreeSettings') {

            $('.js-project-edit-general-content-three-title').val(data.settings.page_elementable.title);
            $('.js-project-edit-general-content-three-text').val(data.settings.page_elementable.text);
            $('.js-project-edit-general-content-three-link-url').val(data.settings.page_elementable.link_url);
            $('.js-project-edit-general-content-three-button-value').val(data.settings.page_elementable.button_value);


            $.each(data.settings.page_elementable.bulletPoints, function (e, i) {

                $(".js-project-edit-general-content-three-bullet-point-title-" + (e + 1)).val(i.title);
                $(".js-project-edit-general-content-three-bullet-point-text-" + (e + 1)).val(i.text);

            })

            $.each(data.settings.page_elementable.tiles, function (e, i) {

                $(".js-project-edit-general-content-three-tile-title-" + (e + 1)).val(i.title);
                $(".js-project-edit-general-content-three-tile-text-" + (e + 1)).val(i.text);
                $(".js-project-edit-general-content-three-tile-object-" + (e + 1)).val(i.id);

            })

        }

    }

})
