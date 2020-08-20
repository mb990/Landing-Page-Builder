<span>
    <label>Add image</label>
    <input type="file" class="js-project-hero-section-image" id="js-project-hero-section-image" required>
    <input type="text" class="js-project-hero-section-title" placeholder="Enter title">
    <br>
    <input type="text" class="js-project-hero-section-subtitle" placeholder="Enter subtitle">
    <br>
    <input type="text" class="js-project-hero-section-button" placeholder="Enter button text">
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-add-project-hero-section-element-btn js-add-buttons js-disabled-6">Add element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-add-project-hero-section-element-btn').click(storeProjectHeroSectionSettings);

        $(document).on("click", ".js-disabled-6", function(){
        $("#select option[value='6']").attr("disabled","disabled");
        $("#select option[value='6']").removeClass("btn-success");
        console.log("clicked")
        })

    })

</script>
