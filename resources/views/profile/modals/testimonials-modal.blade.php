<hr>
<span>Select number of testimonials</span>
<select class="js-testimonial-number">
        <option value="0" selected>0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
<hr>
<span class="js-testimonial js-testimonial-1 d-none" style="display:flex; flex-direction:column;">
    <input type="file" id="js-testimonial-image-1" required>
    <input type="text" id="customer_name-1" placeholder="Enter user name">
    <input type="text" id="testimonial_title-1" placeholder="Review title">
    <input type="text" id="testimonial_text-1" placeholder="Enter user review">
</span>
    <br>
<span class="js-testimonial js-testimonial-2 d-none" style="display:flex; flex-direction:column;">
    <input type="file" id="js-testimonial-image-2" required>
    <input type="text" id="customer_name-2" placeholder="Enter user name">
    <input type="text" id="testimonial_title-2" placeholder="Review title">
    <input type="text" id="testimonial_text-2" placeholder="Enter user review">
</span>
    <br>
<span class="js-testimonial js-testimonial-3 d-none" style="display:flex; flex-direction:column;">
    <input type="file" id="js-testimonial-image-3" required>
    <input type="text" id="customer_name-3" placeholder="Enter user name">
    <input type="text" id="testimonial_title-3" placeholder="Review title">
    <input type="text" id="testimonial_text-3" placeholder="Enter user review">
</span>
    <br>
<span class="js-testimonial js-testimonial-4 d-none" style="display:flex; flex-direction:column;">
    <input type="file" id="js-testimonial-image-4" required>
    <input type="text" id="customer_name-4" placeholder="Enter user name">
    <input type="text" id="testimonial_title-4" placeholder="Review title">
    <input type="text" id="testimonial_text-4" placeholder="Enter user review">
</span>
<script>
$(document).ready(function(){
    $('.js-testimonial-number').on('change', function(){
        if($(this).val()==1){
            $('.js-testimonial').addClass('d-none')
            $('.js-testimonial-1').removeClass('d-none')
        }
        if($(this).val()==2){
            $('.js-top-menu-link').addClass('d-none')
            $('.js-testimonial-1, .js-testimonial-2').removeClass('d-none')
        }
        if($(this).val()==3){
            $('.js-top-menu-link').addClass('d-none')
            $('.js-testimonial-1, .js-testimonial-2, .js-testimonial-3').removeClass('d-none')
        }
        if($(this).val()==4){
            $('.js-top-menu-link').addClass('d-none')
            $('.js-testimonial-1, .js-testimonial-2, .js-testimonial-3, .js-testimonial-4').removeClass('d-none')
        }
        if($(this).val()==0){
            $('.js-testimonial').addClass('d-none')
        }
    })
})
</script>