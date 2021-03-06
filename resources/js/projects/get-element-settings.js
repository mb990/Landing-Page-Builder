$(document).ready(function () {

    window.getElementSettingsData = function (e, elementId) {

        e.preventDefault();

        $.ajax({

            url: route('project.page-element.show', elementId),
            type:'get',
            success: function (data) {

                setFooterSettingsValues(data);
                setNewsletterSettingsValues(data);
                setGeneralContentThreeSettingsValues(data);
                setPricingSettingsValues(data);
                setHeroSectionSettingsValues(data);
                setGeneralContentOneSettingsValues(data);
                setGeneralContentTwoSettingsValues(data);
                setTopMenuSettingsValues(data);
                setTestimonialSettingsValues(data);
                setGallerySettingsValues(data);
            }

        })

    }

})
