<span class="js-project-edit-gallery-span">
</span>
<span class="js-project-edit-gallery-span-2">
    <input type="hidden" class="js-project-edit-gallery-current-number-of-items">
    <label>Add images and/or videos</label>
    <input type="file" class="js-project-edit-gallery-image" multiple>
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-project-edit-gallery-save-button">Add element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-project-edit-gallery-save-button').click(updateProjectGallery);

        $(document).on("click", ".js-delete-gallery-item", function(){

            let item_id = $(this).data('id');
            let type = $(this).data('type');
            let element_id = $(this).data('element');

            deleteProjectGallerySingleItem(item_id, type, element_id);

            $('.js-project-edit-gallery-current-number-of-items').get(0).value -= 1;

            //obrisi item + ako moze smanji broj current itema u galeriji za 1
        });

    })

</script>
