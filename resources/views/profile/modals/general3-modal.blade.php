<span>
    <input type="text" class="js-project-general-content-three-title" placeholder="Enter section title">
    <input type="text" class="js-project-general-content-three-text" placeholder="Enter section text">
    <input type="text" class="js-project-general-content-three-link-url" placeholder="Enter link url">
    <input type="text" class="js-project-general-content-three-button-value" placeholder="Enter link button text">
</span>
<span class="js-project-general-content-three-bullets">
    <input type="text" id="js-project-general-content-three-bullet-point-title-1" class="js-project-general-content-three-bullet-point-title-1" placeholder="Bullet 1 title">
    <input type="text" id="js-project-general-content-three-bullet-point-text-1" class="js-project-general-content-three-bullet-point-text-1" placeholder="Bullet 1 text">
</span>
<span class="js-project-general-content-three-bullets">
    <input type="text" id="js-project-general-content-three-bullet-point-title-2" class="js-project-general-content-three-bullet-point-title-2" placeholder="Bullet 2 title">
    <input type="text" id="js-project-general-content-three-bullet-point-text-2" class="js-project-general-content-three-bullet-point-text-2" placeholder="Bullet 2 text">
</span>
<span class="js-project-general-content-three-bullets">
    <input type="text" id="js-project-general-content-three-bullet-point-title-3" class="js-project-general-content-three-bullet-point-title-3" placeholder="Bullet 3 title">
    <input type="text" id="js-project-general-content-three-bullet-point-text-3" class="js-project-general-content-three-bullet-point-text-3" placeholder="Bullet 3 text">
</span>
<p>Add tiles</p>
<span class="js-project-general-content-three-tiles">
    <input type="text" id="js-project-general-content-three-tile-title-1" class="js-project-general-content-three-tile-title-1" placeholder="Tile1 title">
    <input type="text" id="js-project-general-content-three-tile-text-1" class="js-project-general-content-three-tile-text-1" placeholder="Tile1 short text">
</span>
<span class="js-project-general-content-three-tiles">
    <input type="text" id="js-project-general-content-three-tile-title-2" class="js-project-general-content-three-tile-title-2" placeholder="Tile2 title">
    <input type="text" id="js-project-general-content-three-tile-text-2" class="js-project-general-content-three-tile-text-2" placeholder="Tile2 short text">
</span>
<span class="js-project-general-content-three-tiles">
    <input type="text" id="js-project-general-content-three-tile-title-3" class="js-project-general-content-three-tile-title-3" placeholder="Tile3 title">
    <input type="text" id="js-project-general-content-three-tile-text-3" class="js-project-general-content-three-tile-text-3" placeholder="Tile3 short text">
</span>
<span class="js-project-general-content-three-tiles">
    <input type="text" id="js-project-general-content-three-tile-title-4" class="js-project-general-content-three-tile-title-4" placeholder="Tile4 title">
    <input type="text" id="js-project-general-content-three-tile-text-4" class="js-project-general-content-three-tile-text-4" placeholder="Tile4 short text">
</span>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-success js-add-project-general-content-section-three-element-btn">Add element</button>
</div>

<script>

    $(document).ready(function () {

        // add dropdown to every tile with unique class
        $('.js-project-general-content-three-tiles').each(function (e, i) {

            let select = "<select class='js-project-awesome-icons-tile-"+ (e + 1) +"'></select><br>";

            $(this).append(select);

            // get awesome icons
            $.ajax({
                type: "GET",
                url: route('awesome-icons.show'),
                success: function (data) {
                    output = [];
                    $.each(data.awesomeIcons, function (e, i) {
                        output += '<option value="'+ i.id +'" data-id="'+ i.id +'">'+ i.name + '</option>'
                    });
                    $(".js-project-awesome-icons-tile-" + (e + 1)).append(output)
                }
            });
        });

        $('.js-add-project-general-content-section-three-element-btn').click(storeProjectGeneralContentThreeSettings);

    })

</script>
