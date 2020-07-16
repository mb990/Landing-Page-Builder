<div class="container">
    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">Gallery</h1>
    <hr class="mt-2 mb-5">
    <div class="row text-center text-lg-left">
        @foreach($image_items as $imageItem)

            @include($imageItem->blade_file, ['image_url' => $images[$imageItem->id]])

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
