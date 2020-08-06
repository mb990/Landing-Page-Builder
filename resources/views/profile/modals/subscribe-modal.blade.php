<span>
    <input type="text" class="js-project-newsletter-title" placeholder="Enter subscribe title">
    <input type="text" class="js-project-newsletter-button-value" placeholder="Enter button text like 'Subscribe now'">
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-add-project-newsletter-element-btn js-add-buttons">Add element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-add-project-newsletter-element-btn').click(storeProjectNewsletter);
    })

</script>
