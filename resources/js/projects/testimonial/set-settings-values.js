$(document).ready(function () {

    window.setTestimonialSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\TestimonialSection') {

            $.each(data.settings.page_elementable.single_items, function (e, i) {

                console.log('ovo je i.title: '+ i.title);

                $('.project-edit-testimonial-customer_name-' + (e + 1)).val(i.customer_name);
                $('.project-edit-testimonial_text-' + (e + 1)).val(i.text);
                $('.project-edit-testimonial_title-' + (e + 1)).val(i.title);
                $('.project-edit-testimonial_id-' + (e + 1)).val(i.id);
                $('.js-project-edit-testimonial-image-filename-' + (e + 1)).val(i.image.filename);
                $('.js-project-edit-testimonial-image-filename-' + (e + 1)).data('id', i.image.id);

            })

        }

    }

})
