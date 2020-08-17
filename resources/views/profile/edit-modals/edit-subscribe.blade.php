<span>
    <input type="text" class="js-edit-newsletter-title" placeholder="Enter subscribe title">
    <input type="text" class="js-edit-newsletter-button-value" placeholder="Enter button text like 'Subscribe now'">
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-edit-project-newsletter">Edit element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-edit-project-newsletter').click(updateProjectNewsletter);

    })

</script>
