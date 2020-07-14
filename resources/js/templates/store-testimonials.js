$(document).ready(function () {

    window.storeTestimonialSection = function(e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        let modelType = 'App\\TestimonialSection';

        $.post(route('testimonial-section.store'),

            {
                // blade_file: 'page_elements.testimonials'
            }

        ).done(function (data) {

            let section_id = data.section.id;

            // saving testimonial image

            $('.js-testimonial-image').each(function (e, i) {



            });

            // saving new testimonial section element
            $.post(route('page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: section_id,
                    page_elementable_type: modelType,
                    blade_file: 'templates.' + template_name + '.page_elements.testimonials'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'));

            $('.js-testimonial').each(function (e, i) {
                let customer = $('#customer_name-' + (e + 1)).val();
                let testimonial_text = $('#testimonial_text-' + (e + 1)).val();
                let title = $('#testimonial_title-' + (e + 1)).val();

                $.post(route('testimonial-settings.store'),
                    {
                        title: title,
                        customer_name: customer,
                        text: testimonial_text,
                        testimonial_section_id: section_id,
                        blade_file: 'templates.' + template_name + '.page_elements.testimonial-single'
                    }
                ).done(function (data) {

                    let form_data = new FormData();
                    form_data.append('image', $('#js-testimonial-image-' + (e + 1))[0].files[0]);
                    form_data.append('template_name', template_name);
                    form_data.append('image_name', 'testimonial-' + data.settings.id);
                    form_data.append('imageable_type','App\\TestimonialSettings');
                    form_data.append('imageable_id', data.settings.id);

                    $.ajax({

                        url: route('template.testimonial-image.store'),
                        type: "post",
                        data: form_data,
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: console.log('poslato'),
                        // error: console.log('greska pri uploadu slike')

                    }).done(function (data) {
                        console.log(data.image);
                    });

                })
            })
        })
    }

});
