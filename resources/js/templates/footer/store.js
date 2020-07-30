$(document).ready(function () {

    window.storeTemplateFooter = function (e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        let creator = $('#footer_creator').val();
        let facebook = $('#facebook_url').val();
        let instagram = $('#instagram_url').val();
        let twitter = $('#twitter_url').val();

        $.post(route('template.footer-settings.store'),

            {
                creator: creator,
                facebook_url: facebook,
                instagram_url: instagram,
                twitter_url: twitter
            }
        ).done(function (data) {

            // saving new footer element
            $.post(route('template.page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: data.settings.id,
                    page_elementable_type: 'App\\FooterSettings',
                    blade_file: 'templates.' + template_name +'.page_elements.footer'
                })
        })

    }

});
