<div>
    <div class="messages-tab">
        <div style="padding: 60px 20px;text-align:center;">
            <h4>Choose group</h4>
            <select class="js-get-subs-group js-select-project-subscribers" name="" id="">
                <option value="0" selected disabled>Select subscribers group</option>
                @forelse(auth()->user()->projects as $project)

                    <option value="{{$project->id}}">{{$project->name}}</option>

                @empty

                @endforelse
            </select>
        </div>
        <div class="mail-div">
            <h4>Send newsletter e-mail</h4>
            <input type="hidden" class="js-project-subscribers-email-project-id">
            <textarea class="mail-area js-mail-area js-project-subscribers-email-message" name="" id="" cols="60" rows="10" placeholder="Write an email to your subscribers"></textarea>
            <br>
            <label for="banner" style="margin-right: 10px;">Attach image</label><input style="max-width:60vw;" name="banner" type="file">
            <br>
            <br>
            <button class="btn btn-success js-send-mail js-send-project-subscribers-email">Send email</button>
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

    $('.js-select-project-subscribers').click(function () {
        let project_id = $(this).val();
        $('.js-project-subscribers-email-project-id').val(project_id);
        console.log(project_id);
    });

    $('.js-send-project-subscribers-email').click(sendEmailToProjectSubscribers)

    //CLEAR FIELDS AFTER SEND
    $(".js-send-mail").on("click", function(){
        $(".js-mail-area").val('');
        $(".js-get-subs-group").val("0");
    })

})
</script>
