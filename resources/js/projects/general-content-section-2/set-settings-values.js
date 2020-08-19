$(document).ready(function () {

    window.setGeneralContentTwoSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\GeneralContentTwoSettings') {

            $('.js-project-edit-general-content-two-title').val(data.settings.page_elementable.title);
            $('.js-project-edit-general-content-two-text').val(data.settings.page_elementable.text);
            $('.js-project-edit-general-content-two-link').val(data.settings.page_elementable.link_url);
            $('.js-project-edit-general-content-two-button').val(data.settings.page_elementable.button_value);
            $('.js-project-edit-general-content-two-image-filename').val(data.settings.page_elementable.image.filename);
            $('.js-project-edit-general-content-two-image-filename').data('id', data.settings.page_elementable.image.id);
        }

    }

})
