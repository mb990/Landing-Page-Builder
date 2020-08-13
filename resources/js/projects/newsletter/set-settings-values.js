$(document).ready(function () {

    window.setNewsletterSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\NewsletterSettings') {

            $('.js-edit-newsletter-title').val(data.settings.page_elementable.title);
            $('.js-edit-newsletter-name').val(data.settings.page_elementable.name);
        }

    }

})
