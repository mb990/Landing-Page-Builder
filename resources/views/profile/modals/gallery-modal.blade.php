<span>
    <input type="file" class="js-project-gallery-image" multiple>
    <label>Add images and/or videos</label>
</span>
{{--                <span>                    --}}
{{--                    <input type="file" class="js-video-image" multiple>--}}
{{--                    <label>Add videos</label>--}}
{{--                </span>--}}
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-add-project-gallery-element-btn">Add element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-add-project-gallery-element-btn').click(storeProjectGallery);

    })

</script>
