<hr>
<span>Select number of testimonials</span>
<select class="js-project-edit-testimonial-number">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
<hr>
<span class="js-project-edit-testimonial js-project-edit-testimonial-1 d-none" style="display:flex; flex-direction:column;">
    <input type="file" id="js-project-edit-testimonial-image-1">
    <input type="text" disabled id="js-project-edit-testimonial-image-filename-1">
    <input type="text" id="project-edit-testimonial-customer_name-1" placeholder="Enter user name">
    <input type="text" id="project-edit-testimonial_title-1" placeholder="Review title">
    <input type="text" id="project-edit-testimonial_text-1" placeholder="Enter user review">
</span>
    <br>
<span class="js-project-edit-testimonial js-project-edit-testimonial-2 d-none" style="display:flex; flex-direction:column;">
    <input type="file" id="js-project-edit-testimonial-image-2">
    <input type="text" disabled id="js-project-edit-testimonial-image-filename-2">
    <input type="text" id="project-edit-testimonial-customer_name-2" placeholder="Enter user name">
    <input type="text" id="project-edit-testimonial_title-2" placeholder="Review title">
    <input type="text" id="project-edit-testimonial_text-2" placeholder="Enter user review">
</span>
    <br>
<span class="js-project-edit-testimonial js-project-edit-testimonial-3 d-none" style="display:flex; flex-direction:column;">
    <input type="file" id="js-project-edit-testimonial-image-3" required>
    <input type="text" disabled id="js-project-edit-testimonial-image-filename-3">
    <input type="text" id="project-edit-testimonial-customer_name-3" placeholder="Enter user name">
    <input type="text" id="project-edit-testimonial_title-3" placeholder="Review title">
    <input type="text" id="project-edit-testimonial_text-3" placeholder="Enter user review">
</span>
    <br>
<span class="js-project-edit-testimonial js-project-edit-testimonial-4 d-none" style="display:flex; flex-direction:column;">
    <input type="file" id="js-project-edit-testimonial-image-4" required>
    <input type="text" disabled id="js-project-edit-testimonial-image-filename-4">
    <input type="text" id="project-edit-testimonial-customer_name-4" placeholder="Enter user name">
    <input type="text" id="project-edit-testimonial_title-4" placeholder="Review title">
    <input type="text" id="project-edit-testimonial_text-4" placeholder="Enter user review">
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-project-edit-testimonials-save-button">Edit element</button>
</div>
<script>
$(document).ready(function(){
    $('.js-project-edit-testimonial-number').on('change', function(){
        if($(this).val()==1){
            $('.js-project-edit-testimonial').addClass('d-none')
            $('.js-project-edit-testimonial-1').removeClass('d-none')
        }
        if($(this).val()==2){
            $('.js-project-edit-testimonial').addClass('d-none')
            $('.js-project-edit-testimonial-1, .js-project-edit-testimonial-2').removeClass('d-none')
        }
        if($(this).val()==3){
            $('.js-project-edit-testimonial').addClass('d-none')
            $('.js-project-edit-testimonial-1, .js-project-edit-testimonial-2, .js-project-edit-testimonial-3').removeClass('d-none')
        }
        if($(this).val()==4){
            $('.js-project-edit-testimonial').addClass('d-none')
            $('.js-project-edit-testimonial-1, .js-project-edit-testimonial-2, .js-project-edit-testimonial-3, .js-project-edit-testimonial-4').removeClass('d-none')
        }
        if($(this).val()==0){
            $('.js-project-edit-testimonial').addClass('d-none')
        }
    })

    $('.js-project-edit-testimonials-save-button').click(updateProjectTestimonialSection);
})
</script>
