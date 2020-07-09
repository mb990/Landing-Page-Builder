$(document).ready(function () {

    window.storeTestimonialSection = function(e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let page_element_type_id = $('#page_element_type_id').val();

        $.post(route('testimonial-section.store'),

            {
                // blade_file: 'page_elements.testimonials'
            }

        ).done(function (data) {

            let section_id = data.section.id;

            // saving new testimonial section element
            $.post(route('page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: section_id,
                    page_elementable_type: 'TestimonialSection',
                    blade_file: 'page_elements.testimonials'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'))

            $('.js-testimonial').each(function (e, i) {
                let customer = $('#customer_name-' + (e + 1)).val();
                let testimonial_text = $('#testimonial_text-' + (e + 1)).val();

                $.post(route('testimonial-settings.store'),
                    {
                        customer_name: customer,
                        text: testimonial_text,
                        testimonial_section_id: section_id,
                        blade_file: 'page_elements.testimonial-single'
                    }
                )
            })
        })
    }

})
