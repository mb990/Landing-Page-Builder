<div class="container">
    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Gallery</h1>
    <hr class="mt-2 mb-5">
    <div class="row text-center text-lg-left">
        @foreach($image_items as $imageItem)

            @include($imageItem->blade_file, ['image_url' => $images[$imageItem->id]])

        @endforeach

            @foreach($video_items as $videoItem)

                @include($videoItem->blade_file, ['video_url' => $videos[$videoItem->id]])

            @endforeach
    </div>
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <img src="" class="imagepreview" style="width: 100%;" >
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.js-reviews div:first').addClass('active');
    $(document).ready(function(){
        $("#customSwitches").on("click", function(){
            $(".js-month").toggleClass("d-none");
            $(".js-year").toggleClass("d-none");
            $(".js-month-text").toggleClass("text-primary");
            $(".js-year-text").toggleClass("text-primary");
        })
        $(function() {
            $('.pop').on('click', function() {
                if($(this).find('img').attr('src') == "/img/video-logo.png"){
                    $('.videopreview').attr('src', $(this).find('source').attr('src'));
                    $('.imagepreview').hide();
                    $('.videopreview').show();


                } else if($(this).find('img').attr('src') != "/img/video-logo.png"){
                    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                    $('.imagepreview').show();
                    $('.videopreview').hide()


                }
                $('#imagemodal').modal('show');
            });
        });
    })
</script>
