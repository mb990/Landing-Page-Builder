$(document).ready(function () {

    window.storeProjectPriceSection = function (e) {

        e.preventDefault();

        let template_name = $('.js-project-template-name').val();
        let page_element_type_id = $('.js-project-page-element-type-id').val();
        let project_id = $('.js-project-id').val();
        let project_slug = $('.js-project-slug').val();

        $.post(route('project.pricing-section.store', project_slug),

            {
                // blade_file: 'page_elements.pricing'
            }

        ).done(function (data) {

            let section_id = data.section.id;

            $('input.js-project-pricing-plan').each(function (e, i) {

                let name = $('.js-project-pricing-name-' + (e + 1)).val();
                let y_price = $('.js-project-pricing-year-' + (e + 1)).val();
                let m_price = $('.js-project-pricing-month-' + (e + 1)).val();
                let discount = $('.js-project-pricing-discount-' + (e + 1)).val();

                if (name !== '' && y_price !== '' && m_price !== '') {

                    $.post(route('project.price-settings.store', project_slug),
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
                        $('.js-project-plan-benefit-' + (e + 1)).each(function (u, j) {

                            if ($('.project-benefit-' + (e + 1) + '-' + (u + 1)).val()) {

                                let desc = $('.project-benefit-' + (e + 1) + '-' + (u + 1)).val();

                                $.post(route('project.price-settings-benefit.store', project_slug),
                                    {
                                        description: desc,
                                        price_settings_id: data.settings.id
                                    },

                                ).done(console.log('dodat-benefit')
                                ).fail(console.log('nije dodat benefit'))
                            }

                        })
                    }).fail(console.log('neuspelo'))
                }

            })

            // store pricing section page element ajax
            $.post(route('project.page-element.store', project_slug),
                {
                    project_id: project_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: section_id,
                    page_elementable_type: 'App\\PricingSection',
                    blade_file: 'templates.' + template_name +'.page_elements.pricing'
                })
                .done(function (data) {
                    $.get(route('project.page-element.render-single', data.element.id)

                    ).done(function (data) {

                        setTimeout(function () {

                            $('.js-project-preview-elements').append(data.view);
                            createButtons(data.element.id);
                        }, 1000);
                    })
                })
                .fail(console.log('failed element'));

        })


    }
})
