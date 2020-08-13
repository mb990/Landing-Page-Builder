$(document).ready(function () {

    window.setGeneralContentThreeSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\GeneralContentThreeSettings') {

            $('.js-project-edit-general-content-three-title').val(data.settings.page_elementable.title);
            $('.js-project-edit-general-content-three-text').val(data.settings.page_elementable.text);
            $('.js-project-edit-general-content-three-link-url').val(data.settings.page_elementable.link_url);
            $('.js-project-edit-general-content-three-button-value').val(data.settings.page_elementable.button_value);


            data.settings.page_elementable.bulletPoints.each(function (e, i) {

                $(".js-project-edit-general-content-three-bullet-point-title-" + (e + 1)).val(i.title);
                $(".js-project-edit-general-content-three-bullet-point-text-" + (e + 1)).val(i.text);

            })

            data.settings.page_elementable.titles.each(function (e, i) {

                $(".js-project-general-content-three-tile-title-" + (e + 1)).val(i.title);
                $(".js-project-general-content-three-tile-text-" + (e + 1)).val(i.text);
                // $(".js-project-awesome-icons-tile-" + (e + 1)).val();

            })

        }

    }

})
