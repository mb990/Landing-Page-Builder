<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{asset('js/store-top-menu.js')}}"></script>
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
                <option selected>Select element</option>

            </select>
        </div>
    </div>


    <!-- Modal7 TOP MENU -->
    <div class="modal fade js-modal7"  aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Top Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <label for="img">Add your Logo</label>
                    <input type="file" name="img">
                    <br>
                    <span class="js-top-menu-link">
                        <input name="title-1" id="title-1" type="text" placeholder="Link title">
                        <input type="text" id="link-url-1" name="link-url-1" placeholder="Link URL">
                    </span>
                    <span class="js-top-menu-link">
                        <input name="title-2" id="title-2" type="text" placeholder="Link title">
                        <input type="text" id="link-url-2" name="link-url-2" placeholder="Link URL">
                    </span>
                    <span class="js-top-menu-link">
                        <input name="title-3" id="title-3" type="text" placeholder="Link title">
                        <input type="text" id="link-url-3" name="link-url-3" placeholder="Link URL">
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary js-save-changes">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal6 TESTIMONIALS-->
<div class="modal fade js-modal6"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Top Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>
                    <input type="text" placeholder="Enter user name">
                    <input type="text" placeholder="Enter user review">
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary js-save-changes">Save changes</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade js-modal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal7">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Top Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>
                        <input type="text" placeholder="Enter plan price tag">
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary js-save-changes">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade js-modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal7">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Top Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>
                    <input type="text" placeholder="Enter creator name">
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary js-save-changes">Save changes</button>
            </div>
        </div>
    </div>
</div>

    <div class="modal fade js-modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal7">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Top Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>
                        <input type="text" placeholder="Enter creator name">
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary js-save-changes">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade js-modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal7">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Top Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>
                    <input type="text" placeholder="Enter creator name">
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary js-save-changes">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade js-modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal7">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Top Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span>
                    <input type="text" placeholder="Enter creator name">
                </span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary js-save-changes">Save changes</button>
            </div>
        </div>
    </div>
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
                        output += '<option value="option'+e.id +'" id="'+ e.id+'" >'+ e.name + '</option>'
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
                        $.each(data.templates, function (i, e) {
                        output += '<option data-id="'+ e.id +'" class="template'+ e.id+'">'+ e.name + '</option>'
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
                }
            })
            .done(function(data){
                $(".js-get-templates").append('<option data-id="'+ data.template.id +'" class="template'+ data.template.id +'" >'+ name + '</option>')


            }

            );

        })

        $('.js-save-changes').click(storePageElement);
        $('.js-get-elements').change(function() {
            var opval = $(this).val();
            if(opval=="option7"){
                console.log('modal7')
                $('.js-modal7').modal("show");
            }
            if(opval=="option6"){
                $('.js-modal6').modal("show");
            }
            if(opval=="option5"){
                $('.js-modal5').modal("show");
            }
            if(opval=="option4"){
                $('.js-modal4').modal("show");
            }
            if(opval=="option3"){
                $('.js-modal3').modal("show");
            }
            if(opval=="option2"){
                $('.js-modal2').modal("show");
            }
            if(opval=="option1"){
                $('.js-modal1').modal("show");
            }
        });

    })

</script>
</body>
</html>
