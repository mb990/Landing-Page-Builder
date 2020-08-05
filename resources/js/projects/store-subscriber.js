$(document).ready(function () {

    window.storeProjectSubscriber = function(e) {

        e.preventDefault();

        function validate() {

            let bool = true;

            if (!document.getElementById('js-subscriber-email').validity.valid) {

                bool = false;
            }

            return bool;
        }

        if (validate()) {

            let project_slug = $('.js-subscriber-project-slug').val();
            let email = $('.js-subscriber-email').val();
            let name = $('.js-subscriber-name').val();

            $.ajax({
                url: route('project.subscriber.store', project_slug),
                type: 'post',
                data: {
                    email: email,
                    name: name,
                    project_slug: project_slug
                }
            }).done(function (data) {
                console.log(data.subscriber);
            })
        }

        else {

            alert('Please enter your email');
        }
    }

});
