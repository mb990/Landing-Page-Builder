$(document).ready(function () {

    window.storePriceSettings = function (e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let page_element_type_id = $('#page_element_type_id').val();

        $('input.js-pricing-plan').each(function (e, i) {

            let name = $('.plan-' + (e + 1)).val();
            let y_price = $('.year-' + (e + 1)).val();
            let m_price = $('.month-' + (e + 1)).val();
            let discount = $('.discount-' + (e + 1)).val();

            $.post('/price-settings',
                {
                    name: name,
                    yearly_price: y_price,
                    monthly_price: m_price,
                    discount_amount: discount
                }
            ).done(function (data) {

                console.log()

                // store pageElement ajax
                $.post('/page-element',
                    {
                        template_id: template_id,
                        page_element_type_id: page_element_type_id,
                        page_elementable_id: data.settings.id,
                        page_elementable_type: 'PriceSettings',
                        blade_file: 'page_elements.pricing'
                    })
                    .done(function (data_e) {
                        // console.log(data);
                    })
                    .fail(console.log('failed element'))

                // store benefits for settings
                $('.js-plan-benefit-' + (e + 1)).each(function (u, j) {

                    if ($('.benefit-' + (e + 1) + '-' + (u + 1)).val()) {

                        let desc = $('.benefit-' + (e + 1) + '-' + (u + 1)).val();

                        $.post('/benefit',
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
    }
})
