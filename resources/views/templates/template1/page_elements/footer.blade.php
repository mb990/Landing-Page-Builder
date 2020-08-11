<div class="page-content page-container js-added-element js-footer-var" id="page-content" style="background-color: lightgrey;">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
                <div class="card-body">{{$data->creator}} {{$data->year_made}}</div>
                <div>
                    <div class="card-body">
                        @if($data->facebook_url || $data->twitter_url || $data->instagram_url)

                            <h4 class="card-title">Visit us on social media</h4>

                        <div class="template-demo">
                            @if($data->facebook_url)
                                <a href="//{{$data->facebook_url}}" type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-facebook"></i></a>
                            @endif

                            @if($data->twitter_url)
                                <a href="//{{$data->twitter_url}}" type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-twitter"></i></a>
                            @endif

                            @if($data->instagram_url)
                                <a href="//{{$data->instagram_url}}" type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-instagram"></i></a>
                            @endif
                        </div>

                        @endif
                    </div>
                </div>
        </div>
    </div>
</div>
