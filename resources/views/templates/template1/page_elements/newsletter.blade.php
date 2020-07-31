<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

</head>

<section class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="content">
                    <h2>{{$data->title}}</h2>
                    <div class="input-group">
                        <input type="hidden" class="js-subscriber-project-slug" value="{{Request()->slug}}">
                        <input type="email" class="form-control js-subscriber-email" placeholder="Enter your email">
                        <span class="input-group-btn">
                            <button class="btn btn-primary js-store-project-subscriber" type="submit">{{ $data->button_value }}</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>

    $(document).ready(function () {

        $('.js-store-project-subscriber').click(storeProjectSubscriber);

    })

</script>
