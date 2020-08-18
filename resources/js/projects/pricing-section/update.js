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

            let settings_id = $('.js-project-edit-pricing-settings-id-' + (e + 1)).val();
            let section_id = $('.js-project-edit-pricing-section-id').val();

            if (name !== '' && y_price !== '' && m_price !== '') {

                $.post(route('project.price-settings.update', settings_id),
                    {
                        name: name,
                        yearly_price: y_price,
                        monthly_price: m_price,
                        discount_amount: discount,
                        blade_file: 'templates.' + template_name + '.page_elements.pricing-single',
                        pricing_section_id: section_id
                    }
                ).done(function (data) {

                    // set hidden settings id for edit modal
                    $('.js-project-edit-pricing-settings-id-' + (e + 1)).val(data.settings.id);

                    // update benefits for settings
                    $('.js-project-edit-plan-benefit-' + (e + 1)).each(function (u, j) {

                        let desc = $('.project-edit-benefit-' + (e + 1) + '-' + (u + 1)).val();

                        console.log($('.project-edit-benefit-' + (e + 1) + '-' + (u + 1)));
                        console.log('.project-edit-benefit-' + (e + 1) + '-' + (u + 1));

                        if (desc !== '') {

                            let benefit_id = $('.project-edit-benefit-' + (e + 1) + '-' + (u + 1)).data('id');

                            console.log('ovo je desc ali unutar if-a: ' + desc);

                            $.ajax({

                                url: route('project.price-settings-benefit.update', benefit_id),
                                type: 'put',
                                data:
                                    {
                                        description: desc,
                                        price_settings_id: data.settings.id
                                    },

                        }).done(console.log('updateovan-benefit')
                            )
                        }

                        else {

                            console.log('desca nema');
                        }

                    })
                })
            }

        })
    }

});
