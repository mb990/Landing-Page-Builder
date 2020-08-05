$(document).ready(function () {

    window.storeProjectFooter = function (e) {

        e.preventDefault();

        let template_name = $('.js-project-template-name').val();
        let page_element_type_id = $('.js-project-page-element-type-id').val();
        let project_id = $('.js-project-id').val();
        let project_slug = $('.js-project-slug').val();
        // let project_name = $('.js-project-name').val();

        let creator = $('.js-project-footer-creator').val();
        let facebook = $('.js-project-footer-facebook').val();
        let instagram = $('.js-project-footer-instagram').val();
        let twitter = $('.js-project-footer-twitter').val();

        $.post(route('project.footer-settings.store', project_slug),

            {
                creator: creator,
                facebook_url: facebook,
                instagram_url: instagram,
                twitter_url: twitter
            }
        ).done(function (data) {

            // saving new footer element
            $.post(route('project.page-element.store', project_slug),
                {
                    project_id: project_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: data.settings.id,
                    page_elementable_type: 'App\\FooterSettings',
                    blade_file: 'templates.' + template_name +'.page_elements.footer'
                }).done(function (elementData) {

                    $.get(route('project.page-element.render-single', elementData.element.id)

                    ).done(function (data) {

                        $('.js-project-preview-elements').append(data.view);
                    })
            })
        })

    }

});
