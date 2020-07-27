<div>
    <div style="display: flex;">
        <div style="padding: 60px 20px;">
            <h4>Choose group</h4>
            <select class="js-get-subs-group" name="" id="">
                <option value="0" selected disabled>Select subscribers group</option>
                <option value="">Site 1</option>
                <option value="">Site 2</option>
                <option value="">Site 3</option>
            </select>
        </div>
        <div style="text-align: center;padding: 20px;">
            <h4>Send newsletter e-mail</h4>
            <textarea class="js-mail-area" style="resize: none;padding: 20px;" name="" id="" cols="60" rows="10" placeholder="Write an email to your subscribers"></textarea>
            <br>
            <label for="banner" style="margin-right: 10px;">Attach image</label><input name="banner" type="file">
            <br>
            <button class="btn btn-success js-send-mail">Send email</button>
        </div>
        </div>
</div>
<script>
$(document).ready(function(){
    $.ajax({
            type: "GET",
            url: "ALL GROUP URL",
            success: function (data) {
                output = [];
                $.each(data.types, function (i, e) {
                    output += '<option data-id="'+ e.id +'" value="option'+e.id +'" id="'+ e.id+'" >'+ e.name + '</option>'
                });
                $(".js-get-subs-group").append(output)
            }
        });
    //CLEAR FIELDS AFTER SEND
    $(".js-send-mail").on("click", function(){
        $(".js-mail-area").val('');
        $(".js-get-subs-group").val("0");
    })

})
</script>