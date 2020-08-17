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

        })

    }

});
