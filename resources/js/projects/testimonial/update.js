$(document).ready(function () {

    window.updateProjectTestimonialSection = function(e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            // $('.js-testimonial').each(function (e, i) {
            //
            //     if (!document.getElementById('js-project-testimonial-image-' + (e + 1)).validity.valid) {
            //
            //         bool = false;
            //     }
            //
            // });

            return bool;
        }

        if (validate()) {

            let delay_time = 0;

            // delay time calculator
            $('.js-project-edit-testimonial').each(function (e, i) {

                let customer = $('.project-edit-testimonial-customer_name-' + (e + 1)).val();
                let testimonial_text = $('.project-edit-testimonial_text-' + (e + 1)).val();
                let title = $('.project-edit-testimonial_title-' + (e + 1)).val();

                if (customer !== '' && testimonial_text !== '' && title !== '') {

                    delay_time += 2000;
                }
            });

            let template_name = $('.js-project-template-name').val();
            let page_element_type_id = $('.js-project-page-element-type-id').val();
            let project_id = $('.js-project-id').val();
            let project_slug = $('.js-project-slug').val();
            let project_name = $('.js-project-name').val();

            let element_id = $('.js-selected-project-page-element-id').val();

            let modelType = 'App\\TestimonialSection';

            $.ajax({
                url: route('project.testimonial-section.get', element_id),
                type: 'get',
                success: function (data) {

                    // let section_id = data.section.id;

                    $('.js-project-edit-testimonial').each(function (e, i) {

                        let customer = $('.project-edit-testimonial-customer_name-' + (e + 1)).val();
                        let testimonial_text = $('.project-edit-testimonial_text-' + (e + 1)).val();
                        let title = $('.project-edit-testimonial_title-' + (e + 1)).val();

                        if (customer && testimonial_text && title) {

                            // if (document.getElementById('js-project-edit-testimonial-image-' + (e + 1)).validity.valid) {

                            let single_testimonial_id = $('.project-edit-testimonial_id-' + (e + 1)).val();

                                $.ajax({
                                    url: route('project.testimonial-settings.update', single_testimonial_id),
                                    type: 'put',
                                    data:
                                        {
                                            title: title,
                                            customer_name: customer,
                                            text: testimonial_text,
                                            // testimonial_section_id: section_id,
                                            // blade_file: 'templates.' + template_name + '.page_elements.testimonial-single'
                                        },
                                    success: function (data) {

                                        let image = $('.js-project-edit-testimonial-image-' + (e + 1))[0].files[0];

                                        let old_image_id = $('.js-project-edit-testimonial-image-filename-' + (e + 1)).data('id');

                                        if (image) {

                                            $.ajax({

                                                url: route('project.testimonial-image.delete', old_image_id),
                                                type: 'delete',
                                                success: function () {


                                                    let form_data = new FormData();
                                                    form_data.append('image', image);
                                                    form_data.append('project_name', project_name);
                                                    form_data.append('storing_path', 'projects/' + project_name + '_' + project_id + '/testimonials');
                                                    form_data.append('image_name', 'testimonial-' + data.settings.id);
                                                    form_data.append('imageable_type','App\\TestimonialSettings');
                                                    form_data.append('imageable_id', data.settings.id);

                                                    $.ajax({

                                                        url: route('project.testimonial-image.store'),
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
                                                }

                                            })

                                        }
                                    }
                                })
                            // }

                        }
                    })

                    $.get(route('project.page-element.render-single', element_id)

                    ).done(function (data) {

                        setTimeout(function () {

                            $('.js-project-preview-elements').replaceWith(data.view);
                            createButtons(data.element.id);

                            $("#select option[value='6']").attr("disabled","disabled");
                            $("#select option[value='6']").removeClass("btn-success");

                        }, delay_time);
                    })

                }

            })
        }
    }

});
