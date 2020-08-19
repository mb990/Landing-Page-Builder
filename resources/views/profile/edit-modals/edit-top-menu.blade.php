<div class="js-top-menu">
    <label for="img">Add your Logo</label>
    <input type="file" class="js-project-edit-top-menu-image" name="img">
    <input type="text" disabled class="js-project-edit-top-menu-image-filename" name="img-filename">
    <br>
    <hr>
    <select class="js-link-number">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <span>Select number of links</span>
    <br>
    <span class="js-project-top-menu-link js-link-1 d-none">
        <input name="title-1" class="top-menu-edit-title-1" type="text" placeholder="Link title">
        <input type="text" class="top-menu-edit-link-1" name="link-url-1" placeholder="Link URL">
    </span>
    <span class="js-project-top-menu-link js-link-2 d-none">
            <input name="title-2" class="top-menu-edit-title-2" type="text" placeholder="Link title">
            <input type="text" class="top-menu-edit-link-2" name="link-url-2" placeholder="Link URL">
        </span>
    <span class="js-project-top-menu-link js-link-3 d-none">
        <input name="title-3" class="top-menu-edit-title-3" type="text" placeholder="Link title">
        <input type="text" class="top-menu-edit-link-3" name="link-url-3" placeholder="Link URL">
    </span>
    <span class="js-project-top-menu-link js-link-4 d-none">
        <input name="title-4" class="top-menu-edit-title-4" type="text" placeholder="Link title">
        <input type="text" class="top-menu-edit-link-4" name="link-url-4" placeholder="Link URL">
    </span>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-project-edit-top-menu-save-button">Edit element</button>
</div>
<script>
$(document).ready(function(){
    $('.js-link-number').on('change', function(){
        if($(this).val()==1){
            $('.js-project-top-menu-link').addClass('d-none')
            $('.js-link-1').removeClass('d-none')
        }
        if($(this).val()==2){
            $('.js-project-top-menu-link').addClass('d-none')
            $('.js-link-1, .js-link-2').removeClass('d-none')
        }
        if($(this).val()==3){
            $('.js-project-top-menu-link').addClass('d-none')
            $('.js-link-1, .js-link-2, .js-link-3').removeClass('d-none')
        }
        if($(this).val()==4){
            $('.js-project-top-menu-link').addClass('d-none')
            $('.js-link-1, .js-link-2, .js-link-3, .js-link-4').removeClass('d-none')
        }
        if($(this).val()==0){
            $('.js-project-top-menu-link').addClass('d-none')
        }
    })

    $('.js-project-edit-top-menu-save-button').click(updateProjectTopMenuSettings);

})
</script>
