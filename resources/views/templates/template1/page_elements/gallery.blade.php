<div class="container js-added-element js-gallery-var">
    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Gallery</h1>
    <hr class="mt-2 mb-5">
    <div class="row text-center text-lg-left">
        @foreach($data['data']->imageItems as $imageItem)

            @include($imageItem->blade_file, ['image_url' => $data['images'][$imageItem->id]])

        @endforeach

            @foreach($data['data']->videoItems as $videoItem)

                @include($videoItem->blade_file, ['video_url' => $data['videos'][$videoItem->id]])

            @endforeach
    </div>
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span class="js-close-preview" aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <img src="" class="imagepreview" style="width: 100%;" >
                    <video class="videopreview" controls style="width: 100%;">
                        <source src="" class="videopreview" style="width: 100%;" type="video/mp4">
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

            $("#imagemodal").on("hidden.bs.modal", function () {
                $('.videopreview').attr('src', "/");
            });
        })
    </script>
</div>


