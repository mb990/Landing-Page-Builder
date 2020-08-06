$(document).ready(function () {

    window.storeProjectTopMenuSettings = function(e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            if (!document.getElementById('project-top-menu-image').validity.valid) {

                bool = false;
            }

            return bool;
        }

        if (validate()) {

            // let template_id = $('.js-project-template-id').val();
            let template_name = $('.js-project-template-name').val();
            let page_element_type_id = $('.js-project-page-element-type-id').val();
            let project_id = $('.js-project-id').val();
            let project_slug = $('.js-project-slug').val();
            let project_name = $('.js-project-name').val();

            let modelType = 'App\\TopMenuSettings';

            $.post(route('project.top-menu-settings.store', project_slug),
                {
                    //np
                }
            ).done(function (data) {

                // saving top menu image
                let form_data = new FormData();
                form_data.append('image', $('#project-top-menu-image')[0].files[0]);
                form_data.append('project_name', project_name);
                form_data.append('storing_path', 'projects/' + project_name + '_' + project_id);
                form_data.append('image_name', 'top-menu');
                form_data.append('imageable_type', modelType);
                form_data.append('imageable_id', data.settings.id);

                $.ajax({

                    url: route('project.top-menu-image.store'),
                    type: "post",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: console.log('poslato'),
                    // error: console.log('greska pri uploadu slike')

                }).done(function (data) {
                    console.log('ispod ovoga treba da je ispis slike');
                    console.log(data.image);
                    console.log('iznad ovoga treba da je ispis slike');
                });

                // saving top menu link
                $('.js-project-top-menu-link').each(function (e, i) {
                    let url = $("#link-url-" + (e + 1)).val();
                    let title = $("#title-" + (e + 1)).val();

                    if (url !== '' && title !== '') {

                        $.post(route('project.top-menu-link.store', project_slug),
                            {
                                url: url,
                                title: title,
                                top_menu_settings_id: data.settings.id
                            }
                        ).done(function (data) {
                            console.log('link je dodat');
                            // $(".modal").modal('hide');
                        })
                            .fail(console.log('link nije dodat'))
                    }

                })

                // saving new top menu element
                $.post(route('project.page-element.store', project_slug),
                    {
                        project_id: project_id,
                        page_element_type_id: page_element_type_id,
                        page_elementable_id: data.settings.id,
                        page_elementable_type: modelType,
                        blade_file: 'templates.' + template_name +'.page_elements.top_menu'
                    })
                    .done(function (data) {
                        $.get(route('project.page-element.render-single', data.element.id)

                        ).done(function (data) {

                            setTimeout(function () {

                                $('.js-project-preview-elements').append(data.view);
                                createButtons();
                            }, 1000);
                        })
                    })
                    .fail(console.log('failed element'));

            })
                .fail(console.log('failed settings'))
        }

        else {

            alert('You need to add top menu image');
        }
    }
});
