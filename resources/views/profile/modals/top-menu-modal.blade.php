<div class="js-top-menu">
    <label for="img">Add your Logo</label>
    <input type="file" id="project-top-menu-image" name="img" required>
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
        <input name="title-1" id="title-1" type="text" placeholder="Link title">
        <input type="text" id="link-url-1" name="link-url-1" placeholder="Link URL">
    </span>
    <span class="js-project-top-menu-link js-link-2 d-none">
            <input name="title-2" id="title-2" type="text" placeholder="Link title">
            <input type="text" id="link-url-2" name="link-url-2" placeholder="Link URL">
        </span>
    <span class="js-project-top-menu-link js-link-3 d-none">
        <input name="title-3" id="title-3" type="text" placeholder="Link title">
        <input type="text" id="link-url-3" name="link-url-3" placeholder="Link URL">
    </span>
    <span class="js-project-top-menu-link js-link-4 d-none">
        <input name="title-4" id="title-4" type="text" placeholder="Link title">
        <input type="text" id="link-url-4" name="link-url-4" placeholder="Link URL">
    </span>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-add-project-top-menu-element-btn">Add element</button>
</div>
<script>
$(document).ready(function(){
    $('.js-link-number').on('change', function(){
        if($(this).val()==1){
            $('.js-top-menu-link').addClass('d-none')
            $('.js-link-1').removeClass('d-none')
        }
        if($(this).val()==2){
            $('.js-top-menu-link').addClass('d-none')
            $('.js-link-1, .js-link-2').removeClass('d-none')
        }
        if($(this).val()==3){
            $('.js-top-menu-link').addClass('d-none')
            $('.js-link-1, .js-link-2, .js-link-3').removeClass('d-none')
        }
        if($(this).val()==4){
            $('.js-top-menu-link').addClass('d-none')
            $('.js-link-1, .js-link-2, .js-link-3, .js-link-4').removeClass('d-none')
        }
        if($(this).val()==0){
            $('.js-top-menu-link').addClass('d-none')
        }
    })

    $('.js-add-project-top-menu-element-btn').click(storeProjectTopMenuSettings);

})
</script>
