$(document).ready(function () {

    window.storePageElement = function(e) {

        e.preventDefault();

        let template_id = $('#template_id').val();
        let page_element_type_id = $('#page_element_type_id').val();

console.log(template_id);
console.log(page_element_type_id);

        $.post('/top-menu-settings',
            {

            }
            ).done(function (data) {
            // saving new top menu element
            $.post('/page-element',
                {
                    template_id: template_id,
                    page_element_type_id: page_element_type_id,
                    page_elementable_id: data.settings.id,
                    page_elementable_type: 'TopMenuSettings'
                })
                .done(function (data) {
                    console.log(data);
                })
                .fail(console.log('failed element'))
            // saving top menu link
            $('.js-top-menu-link').each(function (e, i) {
                let url = $("#link-url-" + (e + 1)).val();
                let title = $("#title-" + (e + 1)).val();
                $.post('/link',
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
