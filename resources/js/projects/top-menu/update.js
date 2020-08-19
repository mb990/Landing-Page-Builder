$(document).ready(function () {

    window.updateProjectTopMenuSettings = function(e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            // if (!document.getElementById('project-top-menu-image').validity.valid) {
            //
            //     bool = false;
            // }

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

            let element_id = $('.js-selected-project-page-element-id').val();

            $.ajax({
                url: route('project.top-menu-settings.get', element_id),
                type: 'get',
                success: function (data) {

                    let image = $('.js-project-edit-top-menu-image')[0].files[0];

                    if (image) {

                        let old_image_id = $('.js-project-edit-top-menu-image-filename').data('id');

                        $.ajax({

                            url: route('project.top-menu-image.delete', old_image_id),
                            type: 'delete',
                            success: function () {

                                // saving new top menu image
                                let form_data = new FormData();
                                form_data.append('image', image);
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
                                    //
                                });
                            }
                        })
                    }

                    // update top menu links
                    $('.js-project-top-menu-link').each(function (e, i) {
                        let url = $(".top-menu-edit-link-" + (e + 1)).val();
                        let title = $(".top-menu-edit-title-" + (e + 1)).val();

                        let link_id = $(".top-menu-edit-title-" + (e + 1)).data('id');

                        if (url && title) {

                            $.ajax({
                                url: route('project.top-menu-link.update', link_id),
                                type: 'put',
                                data:
                                    {
                                        url: url,
                                        title: title,
                                        // top_menu_settings_id: data.settings.id
                                    },
                                success: function (data) {
                                    console.log('link je updateovan');
                                }
                            })
                        }
                    })

                }
            }).done(function (data) {
                //
            })
        }

        else {

            alert('You need to add top menu image');
        }
    }
});
