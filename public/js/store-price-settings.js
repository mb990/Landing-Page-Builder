$(document).ready(function () {

    window.storePriceSettings = function (e) {

        e.preventDefault();

        console.log('usao u funkciju storePriceSettings');

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

                // store pageElement ajax

                $.post('/page-element',
                    {
                        template_id: template_id,
                        page_element_type_id: page_element_type_id,
                        page_elementable_id: data.settings.id,
                        page_elementable_type: 'PriceSettings'
                    })
                    .done(function (data) {
                        console.log(data);
                    })
                    .fail(console.log('failed element'))

                // store benefits for settings
                $('.js-plan-benefit-' + (e + 1)).each(function (u, j) {

                    console.log('plan ' + (e + 1) + '- benefit ' + (u + 1))

                })
            }).fail(console.log('neuspelo'))
        })
    }
})
