<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/page_elements1.css') }}">
    <link rel="stylesheet" href="{{ asset('js/elements.js') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<div class="card col-md-6 mt-5 mb-5 my-0 mx-auto" style="background-color: lightgrey;">
    <div style="text-align: center;"><h3>Testimonials</h3></div>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="100000">
            <div class="w-100 carousel-inner js-reviews" role="listbox">

                @forelse($items as $item)

                    @include($item->blade_file, ['testimonial' => $item, 'images' => $images])

                @empty

                @endforelse

            </div>
            <div class="float-right navi" style="margin-bottom: 24px;">
                <a class="btn btn-secondary" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon ico" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="btn btn-secondary" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon ico" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    <script>
        $(document).ready(function () {
            $('.js-reviews div:first').addClass('active');
        })

    </script>
</div>
