<span>
    <input type="text" class="js-project-general-content-section-two-title" placeholder="Enter section title">
    <input type="text" class="js-project-general-content-section-two-text" placeholder="Enter section text">
    <input type="file" id="js-project-general-content-section-two-image" class="js-project-general-content-section-two-image" required>
    <input type="text" class="js-project-general-content-section-two-link-url" placeholder="Enter link url">
    <input type="text" class="js-project-general-content-section-two-button-value" placeholder="Enter link button text">
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-add-project-general-content-two-element-btn js-add-buttons js-disabled-4">Add element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-add-project-general-content-two-element-btn').click(storeProjectGeneralContentTwoSettings);

        $(document).on("click", ".js-disabled-4", function(){
        $("#select option[value='4']").attr("disabled","disabled");
        $("#select option[value='4']").removeClass("btn-success");
        console.log("clicked")
        })
        
    })

</script>
