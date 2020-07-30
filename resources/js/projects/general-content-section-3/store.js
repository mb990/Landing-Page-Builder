$(document).ready(function () {

    window.storeProjectGeneralContentThreeSettings = function (e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            //check if any bullet point has missing inputs
            $('.js-project-general-content-three-bullets').each(function (e, i) {

                let input_bullet_title = $('.js-project-general-content-three-bullet-point-title-' + (e + 1)).val();

                let input_bullet_text = $('.js-project-general-content-three-bullet-point-text-' + (e + 1)).val();

                if (input_bullet_title !== '' || input_bullet_text !== '') {

                    if (input_bullet_title === '') {

                        bool = false;
                    }

                    else if(input_bullet_text === '') {

                        bool = false;
                    }
                }

            });

            //check if any bullet point has missing inputs
            $('.js-project-general-content-three-tiles').each(function (e, i) {

                let input_tile_title = $('.js-project-general-content-three-tile-title-' + (e + 1)).val();

                let input_tile_text = $('.js-project-general-content-three-tile-text-' + (e + 1)).val();

                if (input_tile_title !== '' || input_tile_text !== '') {

                    if (input_tile_title === '') {

                        bool = false;
                    }

                    else if(input_tile_text === '') {

                        bool = false;
                    }
                }

            });

            return bool;
        }

        if (validate()) {

            let template_name = $('.js-project-template-name').val();
            let page_element_type_id = $('.js-project-page-element-type-id').val();
            let project_id = $('.js-project-id').val();
            let project_slug = $('.js-project-slug').val();
            // let project_name = $('.js-project-name').val();

            let modelType = 'App\\GeneralContentThreeSettings';

            let title = $('.js-project-general-content-three-title').val();
            let text = $('.js-project-general-content-three-text').val();
            let link_url = $('.js-project-general-content-three-link-url').val();
            let button_value = $('.js-project-general-content-three-button-value').val();

            $.post(route('project.general-content-three-settings.store', project_slug),

                {
                    title: title,
                    text: text,
                    link_url: link_url,
                    button_value: button_value
                }
            ).done(function (data) {

                let element_id = data.settings.id;

                // saving new general content three section element
                $.post(route('project.page-element.store', project_slug),
                    {
                        project_id: project_id,
                        page_element_type_id: page_element_type_id,
                        page_elementable_id: element_id,
                        page_elementable_type: modelType,
                        blade_file: 'templates.' + template_name + '.page_elements.general-content3'
                    })
                    .done(function (data) {
                        console.log(data);
                    })
                    .fail(console.log('failed element'));

                // saving section's bullet points
                $('.js-project-general-content-three-bullets').each(function (e, i) {

                    let title = $(".js-project-general-content-three-bullet-point-title-" + (e + 1)).val();
                    let text = $(".js-project-general-content-three-bullet-point-text-" + (e + 1)).val();

                    if (title !== '' && text !== '') {

                        $.post(route('project.general-content-three-bullet-point.store', project_slug),
                            {
                                title: title,
                                text: text,
                                general_content_three_settings_id: element_id,
                                blade_file: 'templates.' + template_name +'.page_elements.general-content3-bullet'
                            }
                        ).done(function (data) {
                            console.log('bullet point added');
                            $(".modal").modal('hide');
                        })
                    }
                });

                // saving section's tiles
                $('.js-project-general-content-three-tiles').each(function (e, i) {

                    let title = $(".js-project-general-content-three-tile-title-" + (e + 1)).val();
                    let text = $(".js-project-general-content-three-tile-text-" + (e + 1)).val();
                    let awesome_icon_id = $(".js-project-awesome-icons-tile-" + (e + 1)).val();

                    if (title !== '' && text !== '') {

                        $.post(route('project.general-content-three-tile.store', project_slug),
                            {
                                title: title,
                                text: text,
                                general_content_three_settings_id: element_id,
                                awesome_icon_id: awesome_icon_id,
                                blade_file: 'templates.' + template_name +'.page_elements.general-content3-tile'
                            }
                        ).done(function (data) {
                            console.log('tile added');
                            $(".modal").modal('hide');
                        })
                    }
                })

            })
        }

        else {

            alert('Bullet points and tiles added need to have title and text/awesome icon.');
        }
    }

});
