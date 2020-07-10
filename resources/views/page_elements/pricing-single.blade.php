<div class="col-lg-4">
    <div class="card mb-5 mb-lg-0">
        <div class="card-body">
            <h5 class="card-title text-muted text-uppercase text-center">{{$item->name}}</h5>
            <h6 class="card-price text-center price-tag js-month">{{$item->monthly_price}}<span class="period">/Monthly </span></h6>
            <h6 class="card-price text-center price-tag d-none js-year">{{$item->yearly_price}}<span class="period">/Annual @if($item->discount_amount) <h6>{{$item->discount_amount}}% off</h6> @endif</span></h6>
            <hr>
            <ul class="fa-ul">

                @forelse($item->benefits as $benefit)

                    <li><span class="fa-li"><i class="fas fa-check"></i></span>{{$benefit->description}}</li>

                @empty

                    <li><span class="fa-li"><i class="fas fa-check"></i></span>No benefits for this plan</li>

                @endforelse

            </ul>
            <a href="#" class="btn btn-block btn-primary btn-lg">Get Plan</a>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {

        $("#customSwitches").on("click", function(){
            $(".js-month").toggleClass("d-none");
            $(".js-year").toggleClass("d-none");
            $(".js-month-text").toggleClass("text-primary");
            $(".js-year-text").toggleClass("text-primary");
        })

    })

</script>
