$(document).ready(function () {

    window.getFooterData = function (e, elementId) {

        e.preventDefault();

        $.ajax({

            url: route('project.page-element.show', elementId),
            type:'get',
            success: function (data) {

                console.log(data);

                $('.js-edit-footer-creator').val(data.settings.page_elementable.creator);
                $('.js-edit-footer-facebook').val(data.settings.page_elementable.facebook_url);
                $('.js-edit-footer-twitter').val(data.settings.page_elementable.twitter_url);
                $('.js-edit-footer-instagram').val(data.settings.page_elementable.instagram_url);
            }

        })

    }

})
