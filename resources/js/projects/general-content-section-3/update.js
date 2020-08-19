$(document).ready(function () {

    window.updateProjectGeneralContentThreeSettings = function (e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            //check if any bullet point has missing inputs
            $('.js-project-edit-general-content-three-bullets').each(function (e, i) {

                let input_bullet_title = $('.js-project-edit-general-content-three-bullet-point-title-' + (e + 1)).val();

                let input_bullet_text = $('.js-project-edit-general-content-three-bullet-point-text-' + (e + 1)).val();

                if (input_bullet_title !== '' || input_bullet_text !== '') {

                    if (input_bullet_title === '') {

                        bool = false;
                    }

                    else if(input_bullet_text === '') {

                        bool = false;
                    }
                }

            });

            //check if any tile has missing inputs
            $('.js-project-edit-general-content-three-tiles').each(function (e, i) {

                let input_tile_title = $('.js-project-edit-general-content-three-tile-title-' + (e + 1)).val();

                let input_tile_text = $('.js-project-edit-general-content-three-tile-text-' + (e + 1)).val();

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

            let title = $('.js-project-edit-general-content-three-title').val();
            let text = $('.js-project-edit-general-content-three-text').val();
            let link_url = $('.js-project-edit-general-content-three-link-url').val();
            let button_value = $('.js-project-edit-general-content-three-button-value').val();

            let element_id = $('.js-selected-project-page-element-id').val();

            let settings_id = $('.js-project-edit-general-content-three-settings-id').val();

            $.ajax({
                url: route('project.general-content-three-settings.update', settings_id),
                type: 'put',
                data: {
                        title: title,
                        text: text,
                        link_url: link_url,
                        button_value: button_value,
                    }
            }).done(function (data) {

                // let element_id = data.settings.id;

                // update section's bullet points
                $('.js-project-general-content-three-bullets').each(function (e, i) {

                    let title = $(".js-project-edit-general-content-three-bullet-point-title-" + (e + 1)).val();
                    let text = $(".js-project-edit-general-content-three-bullet-point-text-" + (e + 1)).val();

                    let bullet_id = $(".js-project-general-content-three-bullet-point-title-" + (e + 1)).data('id');

                    if (title !== '' && text !== '') {

                        $.ajax({
                            url: route('project.general-content-three-bullet-point.update', bullet_id),
                            type: 'put',
                            data:
                                {
                                    title: title,
                                    text: text,
                                    // general_content_three_settings_id: element_id,
                                    // blade_file: 'templates.' + template_name +'.page_elements.general-content3-bullet'
                                }
                    }).done(function (data) {

                        })
                    }
                });

                // update section's tiles
                $('.js-project-general-content-three-tiles').each(function (e, i) {

                    let title = $(".js-project-edit-general-content-three-tile-title-" + (e + 1)).val();
                    let text = $(".js-project-edit-general-content-three-tile-text-" + (e + 1)).val();
                    let awesome_icon_id = $(".js-project-edit-awesome-icons-tile-" + (e + 1)).val();

                    let tile_id = $(".js-project-general-content-three-tile-title-" + (e + 1)).data('id');

                    if (title !== '' && text !== '') {

                        $.ajax({
                            url: route('project.general-content-three-tile.update', tile_id),
                            type:"put",
                            data:
                                {
                                    title: title,
                                    text: text,
                                    // general_content_three_settings_id: element_id,
                                    awesome_icon_id: awesome_icon_id,
                                    // blade_file: 'templates.' + template_name +'.page_elements.general-content3-tile'
                                }
                        }).done(function (data) {



                        })
                    }
                })

                $.get(route('project.page-element.render-single', element_id)

                ).done(function (data) {

                    setTimeout(function () {

                        $('*[data-elementid="'+element_id+'"]').replaceWith(data.view)

                        createButtons(element_id);

                    }, 1000);
                })

            })
        }

        else {

            alert('Bullet points and tiles added need to have title and text/awesome icon.');
        }
    }

});
