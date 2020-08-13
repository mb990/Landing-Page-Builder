$(document).ready(function () {

    window.setGeneralContentOneSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\GeneralContentOneSettings') {

            $('.js-project-edit-general-content-one-title').val(data.settings.page_elementable.title);
            $('.js-project-edit-general-content-one-text').val(data.settings.page_elementable.text);
            $('.js-project-edit-general-content-one-link').val(data.settings.page_elementable.link_url);
            $('.js-project-edit-general-content-one-button').val(data.settings.page_elementable.button_value);
            $('.js-project-edit-general-content-one-image-filename').val(data.settings.page_elementable.image.filename);
        }

    }

})
