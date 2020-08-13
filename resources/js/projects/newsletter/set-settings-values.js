$(document).ready(function () {

    window.setNewsletterSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\NewsletterSettings') {

            $('.js-edit-newsletter-title').val(data.settings.page_elementable.title);
            $('.js-edit-newsletter-button-value').val(data.settings.page_elementable.button_value);
        }

    }

})
