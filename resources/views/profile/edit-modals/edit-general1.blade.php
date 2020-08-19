<span>
    <input type="text" class="js-project-edit-general-content-one-title" placeholder="Enter section title">
    <input type="text" class="js-project-edit-general-content-one-text" placeholder="Enter section text">
    <input type="file" class="js-project-edit-general-content-one-image">
    <input type="text" disabled class="js-project-edit-general-content-one-image-filename" >
    <input type="text" class="js-project-edit-general-content-one-link-url" placeholder="Enter link url">
    <input type="text" class="js-project-edit-general-content-one-button-value" placeholder="Enter link button text">
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-project-edit-general-content-one-save-button">Edit element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-project-edit-general-content-one-save-button').click(updateaProjectGeneralContentOneSettings);

    })

</script>
