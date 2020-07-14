<div class="carousel-item">
    <div class="carousel-caption">
        <div class="row">
            <div class="col-sm-3">
                <img src="{{$images[$testimonial->id]}}" style="margin: auto;" class="rounded-circle img-fluid"/>
            </div>
            <div class="col-sm-9" style="margin: auto;">
                <h3>{{$testimonial->title}}</h3>
                <small>{{$testimonial->text}}</small>
                <small class="smallest mute">- {{$testimonial->customer_name}}</small>
            </div>
        </div>
    </div>
</div>
