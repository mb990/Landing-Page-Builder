$(document).ready(function () {

    window.storePageElement = function(e) {

        e.preventDefault();

        let type = e.target.getAttribute('id');
        let template_id = e.target.getAttribute('id');
        $.post('/top-menu-settings',
            {

            }
            ).done(function (data) {
            // saving new top menu element
            $.post('/page-element',
                {
                    // template_id: template_id,
                    template_id: 1,
                    // page_element_type_id: type,
                    page_element_type_id: 7,
                    page_elementable_id: data.settings.id,
                    page_elementable_type: 'TopMenuSettings'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'))
            // saving top menu link
            $('.js-top-menu-link').each(function (e, i) {
                $.post('/link',
                    {
                        url: 'nesto',
                        title: 'nesto',
                        top_menu_settings_id: data.settings.id
                    }
                ).done(function (data) {
                    console.log('link je dodat')
                })
                    .fail(console.log('link nije dodat'))
            })

            })
            .fail(console.log('failed settings'))
    }
});
