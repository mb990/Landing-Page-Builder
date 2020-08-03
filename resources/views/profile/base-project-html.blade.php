<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ asset('css/page_elements1.css') }}">
        <link rel="stylesheet" href="{{ asset('js/example.js') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('js/app.js') }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        @routes
    </head>
    <body>

    <input type="hidden" class="js-show-project-project-slug" value="{{request()->projectSlug}}">

    <div class="main-project-div">

    </div>

    <script>

        $(document).ready(function () {

            console.log('otvoren base project view');
            // showProject();

            let slug = $('.js-show-project-project-slug').val();

            console.log(slug);

            $.get(route('project.show', slug), function (data) {
                console.log(data);
            })
                .done(function (data) {
                    // console.log(data.views);
                    // $('.main-div').append(data.views[2]);

                    jQuery.each(data.views, function (e, i) {
                        $('.main-project-div').append(i);
                        console.log(i);
                    })
                })

        })

    </script>

    </body>
</html>
