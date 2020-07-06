<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>
<body>
    <div style="width: 50vw;margin-top: 100px;">
        <div class="input-group mb-3">
            <input type="text" class="form-control js-new-template-name" placeholder="Enter new template name" aria-label="" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
                <button class="btn btn-outline-secondary js-add-template" type="button">Button</button>
            </div>
        </div>
    </div>
    <div>
        <div style="width: 50vw;margin-top: 100px;">
            <select class="form-control form-control-lg js-get-templates">
            </select>
        </div>
    </div>

    <div>
        <div style="width: 50vw;margin-top: 100px;">
            <select class="form-control form-control-lg js-get-elements">

            </select>
        </div>
        <button class="btn btn-primary">
            GET ELEMENT
        </button>
    </div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){

        $.ajax({
            type: "GET",
            url: "/page-element-types",
            success: function (data) {
                output = []
                    console.log(data.types)
                        $.each(data.types, function (i, e) {
                        output += '<option id="'+ e.id+'" >'+ e.name + '</option>'
                        });
                        $(".js-get-elements").append(output)
            }
        });



        $.ajax({
                type: "GET",
                url: "/templates",
                success: function (data) {
                    output = []
                    console.log(data.templates)
                    // $(".js-get-templates").append($('<option>'+data+'</option'));
                        $.each(data.templates, function (i, e) {
                        output += '<option id="'+ e.id+'">'+ e.name + '</option>'
                        });
                        $(".js-get-templates").append(output)
                }
            });
        $(".js-add-template").click(function(){
            let name = $(".js-new-template-name").val();
            console.log(name)
            $.ajax({
                type: "POST",
                url: "/template",
                data: {
                    name: name
                },
                success: function (data) {
                    console.log(data)
                    alert(data.success)
                    $(".js-get-templates").append('<option id="'+ id+'" >'+ name + '</option>')
                }
            });

        })
    })

</script>
</body>
</html>
