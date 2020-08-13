$(document).ready(function () {

    window.setFooterSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\FooterSettings') {

            $('.js-edit-footer-creator').val(data.settings.page_elementable.creator);
            $('.js-edit-footer-facebook').val(data.settings.page_elementable.facebook_url);
            $('.js-edit-footer-twitter').val(data.settings.page_elementable.twitter_url);
            $('.js-edit-footer-instagram').val(data.settings.page_elementable.instagram_url);
        }

    }

})
