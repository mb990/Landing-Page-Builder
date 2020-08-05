$(document).ready(function () {

    window.storeProjectTestimonialSection = function(e) {

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

            let template_name = $('.js-project-template-name').val();
            let page_element_type_id = $('.js-project-page-element-type-id').val();
            let project_id = $('.js-project-id').val();
            let project_slug = $('.js-project-slug').val();
            let project_name = $('.js-project-name').val();

            let modelType = 'App\\TestimonialSection';

            $.post(route('project.testimonial-section.store', project_slug),

                {
                    // blade_file: 'page_elements.testimonials'
                }

            ).done(function (data) {

                let section_id = data.section.id;

                $.post(route('project.page-element.store', project_slug),
                    {
                        project_id: project_id,
                        page_element_type_id: page_element_type_id,
                        page_elementable_id: section_id,
                        page_elementable_type: modelType,
                        blade_file: 'templates.' + template_name + '.page_elements.testimonials'
                    })
                    .done(function (elementData) {

                        $('.js-project-testimonial-page-element-id').val(elementData.element.id);

                        // let page_element_id = elementData.element.id;
                        // $.get(route('project.page-element.render-single', data.element.id)
                        //
                        // ).done(function (data) {
                        //
                        //     setTimeout(function () {
                        //         console.log(data);
                        //         // $('.js-project-preview-elements').append(data.view);
                        //     }, 3500);
                        // })
                    })
                    .fail(console.log('failed element'));

                $('.js-project-testimonial').each(function (e, i) {

                    let customer = $('#project-testimonial-customer_name-' + (e + 1)).val();
                    let testimonial_text = $('#project-testimonial_text-' + (e + 1)).val();
                    let title = $('#project-testimonial_title-' + (e + 1)).val();

                    if (customer !== '' && testimonial_text !== '' && title !== '') {

                        if (document.getElementById('js-project-testimonial-image-' + (e + 1)).validity.valid) {

                            $.post(route('project.testimonial-settings.store', project_slug),
                                {
                                    title: title,
                                    customer_name: customer,
                                    text: testimonial_text,
                                    testimonial_section_id: section_id,
                                    blade_file: 'templates.' + template_name + '.page_elements.testimonial-single'
                                }
                            ).done(function (data) {

                                let form_data = new FormData();
                                form_data.append('image', $('#js-project-testimonial-image-' + (e + 1))[0].files[0]);
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

                            })
                        }

                        else {

                            alert('Please add testimonial image');
                        }
                    }
                })

                // saving new testimonial section element
                // $.post(route('project.page-element.store', project_slug),
                //     {
                //         project_id: project_id,
                //         page_element_type_id: page_element_type_id,
                //         page_elementable_id: section_id,
                //         page_elementable_type: modelType,
                //         blade_file: 'templates.' + template_name + '.page_elements.testimonials'
                //     })
                //     .done(function (data) {
                        setTimeout(function () {

                        console.log($('.js-project-testimonial-page-element-id').val());

                        $.get(route('project.page-element.render-single', $('.js-project-testimonial-page-element-id').val())

                        ).done(function (data) {

                                console.log(data);
                                $('.js-project-preview-elements').append(data.view);
                            });
                        }, 3500);
                //     })
                //     .fail(console.log('failed element'));

            })
        }
    }

});
