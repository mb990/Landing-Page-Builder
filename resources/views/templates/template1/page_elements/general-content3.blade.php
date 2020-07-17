<div class="general-content">

    <div class="row row-pad-all">
        <div class="column col-mar-bot">
            @include('general-content3-tile.blade.php')
        </div>
    </div>

    <section>
        <div>
            <div>
                <div>
                    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center" style="margin: 48px auto;">
                        <h1>{{$data->title}}</h1>
                        <div class="mb32">
                            <p>{{$data->text}}</p>
                        </div>
                        <a class="btn btn-lg btn-filled btn-secondary" href="//{{$data->link_url}}">{{$data->button_value}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div style=" padding: 20vh;">
        <div class="content center" style="display: flex;">

            @foreach($data->bulletPoints as $bulletPoint)

                @include($bulletPoint->blade_file, ['data' => $bulletPoint])

            @endforeach
        </div>
    </div>
</div>
