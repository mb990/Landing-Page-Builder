$(document).ready(function () {

    window.setTestimonialSettingsValues = function (data) {

        if (data.settings.page_elementable_type === 'App\\TestimonialSection') {

            $.each(data.settings.page_elementable.single_items, function (e, i) {

                $('#project-edit-testimonial-customer_name-' + (e + 1)).val(i.customer_name);
                $('#project-edit-testimonial_text-' + (e + 1)).val(i.text);
                $('#project-edit-testimonial_title-' + (e + 1)).val(i.title);
                $('#js-project-edit-testimonial-image-filename-' + (e + 1)).val(i.image.filename);

            })

        }

    }

})
