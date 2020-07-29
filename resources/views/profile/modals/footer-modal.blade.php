<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Creator name</span>
    </div>
    <input type="text" class="form-control js-project-footer-creator" id="footer_creator" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Add company name">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Facebook</span>
    </div>
    <input type="text" class="form-control js-project-footer-facebook" id="facebook_url" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Add link">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Twitter</span>
    </div>
    <input type="text" class="form-control js-project-footer-twitter" id="twitter_url" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Add link">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Instagram</span>
    </div>
    <input type="text" class="form-control js-project-footer-instagram" id="instagram_url" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Add link">
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-add-project-footer-element-btn">Add element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-add-project-footer-element-btn').click(storeProjectFooter);
    })

</script>
