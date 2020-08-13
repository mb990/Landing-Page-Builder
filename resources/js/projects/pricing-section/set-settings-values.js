$(document).ready(function () {

    window.setPricingSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\PricingSection') {

            console.log('unutar pricing section if-a');

            $.each(data.settings.page_elementable.single_items, function (e, i) {

                console.log(i + ' ovo je price settings neki');

                $('.js-project-edit-pricing-name-' + (e + 1)).val(i.name);
                $('.js-project-edit-pricing-year-' + (e + 1)).val(i.yearly_price);
                $('.js-project-edit-pricing-month-' + (e + 1)).val(i.monthly_price);
                $('.js-project-edit-pricing-discount-' + (e + 1)).val(i.discount_amount);

                $.each(i.benefits, function (u, j) {

                    console.log(j + ' ovo je benefit');

                    $('.project-edit-benefit-' + (e + 1) + '-' + (u + 1)).val(j.description);

                })

            })

        }

    }

})
