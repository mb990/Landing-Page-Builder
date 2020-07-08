$(document).ready(function () {

    window.storeTestimonial = function(e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let page_element_type_id = $('#page_element_type_id').val();

        $('.js-testimonial').each(function (e, i) {
            let customer = $('#customer_name-' + (e + 1)).val();
            let testimonial_text = $('#testimonial_text-' + (e + 1)).val();

            $.post('/testimonial-settings',
                {
                    customer_name: customer,
                    text: testimonial_text,
                }
            ).done(function (data) {
                // saving new testimonial element
                $.post('/page-element',
                    {
                        template_id: template_id,
                        page_element_type_id: page_element_type_id,
                        page_elementable_id: data.settings.id,
                        page_elementable_type: 'Testimonial',
                        blade_file: 'page_elements.testimonial-single'
                    })
                    .done(function (data) {
                        console.log(data);
                    })
                    .fail(console.log('failed element'))
            })
        })
    }

})
