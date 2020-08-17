$(document).ready(function () {

    window.updateProjectPricingSection = function (e) {

        e.preventDefault();

        let element_id = $('.js-selected-project-page-element-id').val();
        let template_name = $('.js-project-template-name').val();

        $('input.js-project-pricing-plan').each(function (e, i) {

            let name = $('.js-project-edit-pricing-name-' + (e + 1)).val();
            let y_price = $('.js-project-edit-pricing-year-' + (e + 1)).val();
            let m_price = $('.js-project-edit-pricing-month-' + (e + 1)).val();
            let discount = $('.js-project-edit-pricing-discount-' + (e + 1)).val();
            if (name !== '' && y_price !== '' && m_price !== '') {

                $.post(route('project.price-settings.update', element_id),
                    {
                        name: name,
                        yearly_price: y_price,
                        monthly_price: m_price,
                        discount_amount: discount,
                        blade_file: 'templates.' + template_name + '.page_elements.pricing-single'
                    }
                ).done(function (data) {

                    // update benefits for settings
                    $('.js-project-edit-plan-benefit-' + (e + 1)).each(function (u, j) {

                        let desc = $('.project-edit-benefit-' + (e + 1) + '-' + (u + 1)).val();

                        if (desc) {

                            let desc = desc;
                            let benefit_id = $('.project-edit-id-benefit-' + (e + 1) + '-' + (u + 1)).val();

                            $.post(route('project.price-settings-benefit.update', benefit_id),
                                {
                                    description: desc,
                                    price_settings_id: data.settings.id
                                },

                            ).done(console.log('updateovan-benefit')
                            )
                        }

                    })
                })
            }

        })
    }

});
