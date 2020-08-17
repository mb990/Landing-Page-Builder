<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Creator name</span>
    </div>
    <input type="text" class="form-control js-edit-footer-creator"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Add company name">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizewing-sm">Facebook</span>
    </div>
    <input type="text" class="form-control js-edit-footer-facebook" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Add link">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Twitter</span>
    </div>
    <input type="text" class="form-control js-edit-footer-twitter" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Add link">
</div>
<div class="input-group input-group-sm mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">Instagram</span>
    </div>
    <input type="text" class="form-control js-edit-footer-instagram"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Add link">
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-edit-project-footer">Edit element</button>
</div>

<script>

    $(document).ready(function () {

        $('.js-edit-project-footer').click(updateProjectFooter);

    })

</script>
