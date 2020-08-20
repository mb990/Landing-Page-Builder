<span>
    <input type="text" class="js-project-general-content-section-one-title" placeholder="Enter section title">
    <input type="text" class="js-project-general-content-section-one-text" placeholder="Enter section text">
    <input type="file" id="js-project-general-content-section-one-image" class="js-project-general-content-section-one-image" required>
    <input type="text" class="js-project-general-content-section-one-link-url" placeholder="Enter link url">
    <input type="text" class="js-project-general-content-section-one-button-value" placeholder="Enter link button text">
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-add-project-general-content-section-one-element-btn js-add-buttons">Add element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-add-project-general-content-section-one-element-btn').click(storeProjectGeneralContentOneSettings);

    })

</script>
