$(document).ready(function () {

    window.setHeroSectionSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\HeroSectionSettings') {

            $('.js-project-edit-hero-section-title').val(data.settings.page_elementable.title);
            $('.js-project-edit-hero-section-subtitle').val(data.settings.page_elementable.subtitle);
            $('.js-project-edit-hero-section-button').val(data.settings.page_elementable.button_value);
            $('.js-project-edit-hero-section-current-image').val(data.settings.page_elementable.image.filename);
            $('.js-project-edit-hero-section-current-image').data('id', data.settings.page_elementable.image.id);
        }

    }

})
