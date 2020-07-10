<div class="page-content page-container" id="page-content" style="background-color: lightgrey;">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
                <div class="card-body">{{$element->creator}}</div>
                <div>
                    <div class="card-body">
                        <h4 class="card-title">Visit us on social media</h4>
                        <div class="template-demo">
                            @if($element->facebook_url)
                                <a href="//{{$element->facebook_url}}" type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-facebook"></i></a>
                            @endif

                            @if($element->twitter_url)
                                    <a href="//{{$element->twitter_url}}" type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-twitter"></i></a>
                            @endif

                            @if($element->instagram_url)
                                    <a href="//{{$element->instagram_url}}" type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
