<div>
    <div class="messages-tab">
        <div class="mail-div" style="margin:auto;">
            <h4>Send e-mail to users</h4>
            <textarea class="mail-area js-mail-area js-admin-notification-message" name="" id="" cols="60" rows="10" placeholder="Write an email to your subscribers"></textarea>
            <br>
            <label for="banner" style="margin-right: 10px;">Attach image</label><input style="max-width:60vw;" name="banner" class="js-admin-notification-image" type="file">
            <br>
            <br>
            <button class="btn btn-success js-send-admin-notification">Send email</button>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    // $.ajax({
    //         type: "GET",
    //         url: "ALL GROUP URL",
    //         success: function (data) {
    //             output = [];
    //             $.each(data.types, function (i, e) {
    //                 output += '<option data-id="'+ e.id +'" value="option'+e.id +'" id="'+ e.id+'" >'+ e.name + '</option>'
    //             });
    //             $(".js-get-subs-group").append(output)
    //         }
    //     });

    $('.js-send-admin-notification').click(sendEmailToUsers);

    //CLEAR FIELDS AFTER SEND
    // $(".js-send-mail").on("click", function(){
    //     $(".js-mail-area").val('');
    //     $(".js-get-subs-group").val("0");
    // })

})
</script>
