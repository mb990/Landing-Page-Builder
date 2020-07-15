<div class="general-content" style="background-color: lightgrey;">
    <section style="padding: 64px 0px;">
        <div class="container">
            <div class="row row-col">
                <div class="col-md-4 col-md-offset-1 col-sm-5 col-sm-offset-1" style="margin: auto;">
                    <div class="content-text">
                        <h3>{{$data->title}}</h3>
                        <div class="mb32">
                            <p>{{$data->text}}</p>
                        </div>
                        <a class="btn" style="background-color: rgb(103, 103, 238); color: white;" href="//{{$data->link_url}}">{{$data->button_value}}</a>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 text-center mb-xs-24"><img class="img-responsive" style="max-width: 560px;" src="{{$image_url}}"></div>
            </div>
        </div>
    </section>
</div>
