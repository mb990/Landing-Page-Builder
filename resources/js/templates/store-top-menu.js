$(document).ready(function () {

    window.storeTopMenuSettings = function(e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let template_name = $('#template_name').val();
        let page_element_type_id = $('#page_element_type_id').val();

        $.post(route('top-menu-settings.store'),
            {
                //
            }
            ).done(function (data) {
            // saving new top menu element
            $.post(route('page-element.store'),
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: data.settings.id,
                    page_elementable_type: 'App\\TopMenuSettings',
                    blade_file: 'templates.' + template_name +'.page_elements.top_menu'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'))
            // saving top menu link
            $('.js-top-menu-link').each(function (e, i) {
                let url = $("#link-url-" + (e + 1)).val();
                let title = $("#title-" + (e + 1)).val();
                $.post(route('top-menu-link.store'),
                    {
                        url: url,
                        title: title,
                        top_menu_settings_id: data.settings.id
                    }
                ).done(function (data) {
                    console.log('link je dodat')
                    $(".modal").modal('hide');
                })
                    .fail(console.log('link nije dodat'))
            })

            })
            .fail(console.log('failed settings'))
    }
});
