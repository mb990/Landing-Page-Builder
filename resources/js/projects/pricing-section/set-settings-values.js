$(document).ready(function () {

    window.setPricingSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\PricingSection') {

            $.each(data.settings.page_elementable.single_items, function (e, i) {

                $('.js-project-edit-pricing-name-' + (e + 1)).val(i.name);
                $('.js-project-edit-pricing-year-' + (e + 1)).val(i.yearly_price);
                $('.js-project-edit-pricing-month-' + (e + 1)).val(i.monthly_price);
                $('.js-project-edit-pricing-discount-' + (e + 1)).val(i.discount_amount);

                $.each(i.benefits, function (u, j) {

                    $('.project-edit-benefit-' + (e + 1) + '-' + (u + 1)).val(j.description);
                    $('.project-edit-id-benefit-' + (e + 1) + '-' + (u + 1)).val(j.id);

                })

            })

        }

    }

})
