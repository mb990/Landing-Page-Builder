$(document).ready(function () {

    window.updateProjectFooter = function (e) {

        e.preventDefault();

        let element_id = $('.js-selected-project-page-element-id').val();

        let creator = $('.js-edit-footer-creator').val();
        let facebook = $('.js-edit-footer-facebook').val();
        let instagram = $('.js-edit-footer-instagram').val();
        let twitter = $('.js-edit-footer-twitter').val();

        $.ajax({

            url: route('project.footer-settings.update', element_id),
            type: 'put',
            data: {
                creator: creator,
                facebook_url: facebook,
                instagram_url: instagram,
                twitter_url: twitter
            }

        }).done(function () {
            $.get(route('project.page-element.render-single', element_id)

            ).done(function (data) {
                setTimeout(function () {

                    $('*[data-elementid="'+element_id+'"]').replaceWith(data.view)

                    setTimeout(function(data) {
                        createButtons(data.element_id);
                    }, 3000);

                }, 1000);
            })
        })

    }

});
