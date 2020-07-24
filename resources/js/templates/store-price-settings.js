$(document).ready(function () {

    window.storePriceSection = function (e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        $.post(route('template.pricing-section.store'),

            {
                // blade_file: 'page_elements.pricing'
            }

            ).done(function (data) {

                let section_id = data.section.id;

            // store pricing section page element ajax
            $.post(route('template.page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: section_id,
                    page_elementable_type: 'App\\PricingSection',
                    blade_file: 'templates.' + template_name +'.page_elements.pricing'
                })
                .done(function (data_e) {
                    // console.log(data);
                })
                .fail(console.log('failed element'));

            $('input.js-pricing-plan').each(function (e, i) {

                let name = $('.plan-' + (e + 1)).val();
                let y_price = $('.year-' + (e + 1)).val();
                let m_price = $('.month-' + (e + 1)).val();
                let discount = $('.discount-' + (e + 1)).val();

                $.post(route('template.price-settings.store'),
                    {
                        name: name,
                        yearly_price: y_price,
                        monthly_price: m_price,
                        discount_amount: discount,
                        pricing_section_id: section_id,
                        blade_file: 'templates.' + template_name + '.page_elements.pricing-single'
                    }
                ).done(function (data) {

                    // store benefits for settings
                    $('.js-plan-benefit-' + (e + 1)).each(function (u, j) {

                        if ($('.benefit-' + (e + 1) + '-' + (u + 1)).val()) {

                            let desc = $('.benefit-' + (e + 1) + '-' + (u + 1)).val();

                            $.post(route('price-settings-benefit.store'),
                                {
                                    description: desc,
                                    price_settings_id: data.settings.id
                                },

                            ).done(console.log('dodat-benefit')
                            ).fail(console.log('nije dodat benefit'))
                        }

                    })
                }).fail(console.log('neuspelo'))
            })

        })


    }
})
