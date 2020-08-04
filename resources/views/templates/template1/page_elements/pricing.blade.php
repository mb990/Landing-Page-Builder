<section class="pricing py-5" style="background-color: lightgrey;font-size: 1.4rem;">
    <div class="container">
        <!-- switcher -->
        <div style="text-align: center;" class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitches">
            <label class="custom-control-label" for="customSwitches">Monthly / Annual</label>
        </div>
        <div class="row">

            @forelse($data->singleItems as $item)

                @include($item->blade_file, ['item' => $item])

            @empty

            @endforelse

        </div>
    </div>
</section>
<script>

    $(document).ready(function () {

        $("#customSwitches").on("click", function(){
        $(".js-month").toggleClass("d-none");
        $(".js-year").toggleClass("d-none");
        $(".js-month-text").toggleClass("text-primary");
        $(".js-year-text").toggleClass("text-primary");

    })})

</script>
