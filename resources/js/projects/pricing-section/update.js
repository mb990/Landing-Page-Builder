$(document).ready(function () {

    window.updateProjectPricingSection = function (e) {

        e.preventDefault();

        let element_id = $('.js-selected-project-page-element-id').val();
        let template_name = $('.js-project-template-name').val();

        $('input.js-project-edit-pricing-plan').each(function (e, i) {

            let name = $('.js-project-edit-pricing-name-' + (e + 1)).val();
            let y_price = $('.js-project-edit-pricing-year-' + (e + 1)).val();
            let m_price = $('.js-project-edit-pricing-month-' + (e + 1)).val();
            let discount = $('.js-project-edit-pricing-discount-' + (e + 1)).val();

            let settings_id = $('.js-project-edit-pricing-settings-id-' + (e + 1)).val();
            let section_id = $('.js-project-edit-pricing-section-id').val();

            console.log('ovo je settings id: ' + settings_id);

            if (name !== '' && y_price !== '' && m_price !== '') {

                console.log('u ifu za update pricing settingsa');

                $.ajax({
                    url: route('project.price-settings.update', settings_id),
                    type: 'put',
                    data:
                        {
                            name: name,
                            yearly_price: y_price,
                            monthly_price: m_price,
                            discount_amount: discount,
                            // blade_file: 'templates.' + template_name + '.page_elements.pricing-single',
                            // pricing_section_id: section_id
                    },
                    success: function (data) {

                        console.log(data.settings);

                        // set hidden settings id for edit modal
                        // $('.js-project-edit-pricing-settings-id-' + (e + 1)).val(data.settings.id);

                        // update benefits for settings
                        $('.js-project-edit-plan-benefit-' + (e + 1)).each(function (u, j) {

                            let desc = $('.project-edit-benefit-' + (e + 1) + '-' + (u + 1)).val();

                            if (desc !== '') {

                                let benefit_id = $('.project-edit-benefit-' + (e + 1) + '-' + (u + 1)).data('id');

                                $.ajax({

                                    url: route('project.price-settings-benefit.update', benefit_id),
                                    type: 'put',
                                    data:
                                        {
                                            description: desc,
                                            price_settings_id: settings_id
                                        },

                                }).done(console.log('updateovan-benefit'),
                                function () {
                                    $.get(route('project.page-element.render-single', element_id)
                        
                                    ).done(function (data) {
                                        setTimeout(function () {
                        
                                            $('*[data-elementid="'+element_id+'"]').replaceWith(data.view)
                        
                                            createButtons(element_id);

                                            $("#select option[value='8']").attr("disabled","disabled");
                                            $("#select option[value='8']").removeClass("btn-success");

                                        }, 1000);
                                    })
                                }
                                )
                            }

                        })

                    }
                })
            }

        })
    }

});
