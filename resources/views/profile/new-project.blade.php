<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/drag&drop.js')}}"></script>
        <link rel="stylesheet" href="{{ asset('css/page_elements1.css') }}">



        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
        $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
        } );
        </script>
        @routes
    </head>
    <body>
        <header class="header-main-profile" style="background-color: white;">
            <div style="flex-grow: 1;"><img style="width: 100px;transform: translateY(-25%);" src="{{ asset('img/logo.png') }}">
            </div>
            <div style="flex-grow: 1;">
                <a type="button" class="btn" href="{{route('user.profile', auth()->user()->slug)}}">Profile</a>

                <button class="btn btn-secondary js-mobile">Mobile</button>
                <button class="btn btn-secondary js-desktop">Desktop</button>
            </div>
            <div class="js-link">
                <button class="head-link" id="js-info">Log out</button>
            </div>
        </header>


<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit element</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>














        <main class="js-project-preview-elements" id="sortable" style="background-color: white;"><!--style="display: flex;" -->

            <!-- <section class="newsletter project-element js-added-element ui-state-default">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="content">
                                <h2>test11</h2>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">test1</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="newsletter project-element js-added-element">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="content">
                                <h2>test22</h2>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">test2</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section><section class="newsletter project-element js-added-element">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="content">
                                <h2>test33</h2>
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Enter your email">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">test3</button>
                                    </span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="page-content page-container project-element js-added-element" id="page-content" style="background-color: lightgrey;">
                <div class="padding">
                    <div class="row container d-flex justify-content-center">
                            <div class="card-body">Powered by FutureWeb</div>
                            <div>
                                <div class="card-body">
                                    <h4 class="card-title">Visit us on social media</h4>
                                    <div class="template-demo">
                                        <a type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-facebook"></i></a>
                                        <a type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-twitter"></i></a>
                                        <a type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-linkedin"></i></a>
                                        <a type="button" class="btn btn-social-icon btn-rounded"><i class="fa fa-instagram"></i></a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div> -->


        </main>
        <input type="hidden" class="js-project-page-element-type-id">
        <input type="hidden" class="js-project-testimonial-page-element-id">
        <input type="hidden" class="js-project-slug" name="js-project-slug" value="{{$project->slug}}">
        <input type="hidden" class="js-project-id" name="project-id" id="project-id" value="{{$project->id}}">
        <input type="hidden" class="js-project-name" name="project-name" id="project-name" value="{{$project->name}}">
        <input type="hidden" class="js-project-template-id" name="project-template-id" id="project-template-id" value="{{$project->template->id}}">
        <input type="hidden" class="js-project-template-name" name="template-name" id="template-name" value="{{$project->template->name}}">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add element</button>


        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Element name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <span>Select element</span>
            <select id="select" class="js-get-elements-types-project">
                <option value="" selected disabled>Choose element</option>
{{--                <option value="1">Top menu</option>--}}
{{--                <option value="2">Hero section</option>--}}
{{--                <option value="3">General content 1</option>--}}
{{--                <option value="4">General content 2</option>--}}
{{--                <option value="5">General content 3</option>--}}
{{--                <option value="6">Pricing</option>--}}
{{--                <option value="7">Testimonials</option>--}}
{{--                <option value="8">Gallery</option>--}}
{{--                <option value="9">Subscribe</option>--}}
{{--                <option value="10">Footer</option>--}}
            </select>

            <div class="js-modal-content js-content-10">
                @include('profile.modals.top-menu-modal')
            </div>

            <div class="js-modal-content js-content-6">
                @include('profile.modals.hero-modal')
            </div>

            <div class="js-modal-content js-content-3">
                @include('profile.modals.general1-modal')
            </div>

            <div class="js-modal-content js-content-4">
                @include('profile.modals.general2-modal')
            </div>

            <div class="js-modal-content js-content-5">
                @include('profile.modals.general3-modal')
            </div>

            <div class="js-modal-content js-content-8">
                @include('profile.modals.pricing-modal')
            </div>

            <div class="js-modal-content js-content-9">
                @include('profile.modals.testimonials-modal')
            </div>

            <div class="js-modal-content js-content-2">
                @include('profile.modals.gallery-modal')
            </div>

            <div class="js-modal-content js-content-7">
                @include('profile.modals.subscribe-modal')
            </div>

            <div class="js-modal-content js-content-1">
                @include('profile.modals.footer-modal')
            </div>




            </div>

        </div>
    </div>

</div>

        <script>
            $(document).ready(function(){

                $(".js-mobile").click(function() {
                    $("main").css('width','425px');
                    $("main").css('margin','auto');
                    $("body").css('background-color','black');
                });
                $(".js-desktop").click(function() {
                    $("main").css('width','100vw');
                    $("body").css('background-color','white');
                    $("main").css('margin','0px');
                });
                $('.js-modal-content').hide();
                $('#select').on("change",function () {
                    var title = $('#select').find(":selected").text();
                    var ide = $('#select').find(":selected").val();
                    let type = $(this).find(':selected').data('id');
                    $('.js-project-page-element-type-id').val(type);
                    $('#exampleModalLabel').text(title)
                    $('.js-modal-content').hide();
                    $('.js-content-'+ide).show();
                });
                $("#exampleModal").on("hidden.bs.modal", function () {
                    $('.js-modal-content').hide();
                    $('#exampleModalLabel').text("Element name")
                    var select = $("#select");
                    select.val(select[0].options[0].value);
                    // $(document).find("select").val("0");
                });
            })

            $(document).ready(function () {

                $.ajax({
                    type: "GET",
                    url: route('page-element-types.show'),
                    success: function (data) {
                        output = [];
                        console.log(data.types);
                        $.each(data.types, function (i, e) {
                            output += '<option data-value="'+ e.id + '" data-id="'+ e.id +'" value="'+e.id +'" id="'+ e.id+'" class="btn-success test1" >'+ e.name + '</option>'
                        });
                        $(".js-get-elements-types-project").append(output)
                    }
                });

            })

            $(document).ready(function() {
                // $(".ui-state-default").mousedown(selectElement())
                // $(".ui-state-default").mouseup(dropElement())



                // $('.js-add-buttons').on("click", function(){
                    
                //     $('.js-added-element').each(function () {
                //         // console.log(`div${index}: ${this.id}`);
                //         // x = `${index}: ${this.id}`;
                //         console.log($('button.element-delete'))
                //         console.log('delay done')
                //         $('.js-added-element').addClass('ui-state-default')
                //         $('.js-added-element').addClass('project-element')
                //         $('button.element-delete').remove();
                //         $('button.element-edit').remove();
                //         $('span.ui-icon-arrowthick-2-n-s').remove();
                //         $('.js-added-element').append('<button class="btn btn-secondary element-delete" style="z-index:+2;">Delete element</button>');
                //         $('.js-added-element').append('<button class="btn btn-secondary element-edit" data-toggle="modal" data-target="#editModal" style="z-index:+2;">Edit element</button>');
                //         $('.js-added-element').append('<span class="ui-icon ui-icon-arrowthick-2-n-s" title="move element" style="position:absolute; top:10px;">');
                        
                //     });
                // })
                
                window.createButtons = function(){
                    $('.js-added-element').each(function () {
                        // console.log(`div${index}: ${this.id}`);
                        // x = `${index}: ${this.id}`;
                        // console.log($('button.element-delete'))
                        // console.log('delay done')
                        $('.js-added-element').addClass('ui-state-default')
                        $('.js-added-element').addClass('project-element')
                        $('button.element-delete').remove();
                        $('button.element-edit').remove();
                        $('span.ui-icon-arrowthick-2-n-s').remove();
                        $('.js-added-element').append('<button class="btn btn-secondary element-delete" style="z-index:+2;">Delete element</button>');
                        $('.js-added-element').append('<button class="btn btn-secondary element-edit" data-toggle="modal" data-target="#editModal" style="z-index:+2;">Edit element</button>');
                        $('.js-added-element').append('<span class="ui-icon ui-icon-arrowthick-2-n-s" title="move element" style="position:absolute; top:10px;">');
                        
                    });
                }


                // $('.js-move-up').on("click", function(e){
                //     e.preventDefault();
                //     $(".move-up-2").insertBefore(".move-up-1");

                // });
                // $('ui-state-default').mousedown(function(){
                //     $('ui-state-default').css('background-color', 'red')
                // })

                // $(".ui-state-default").mousedown(function(){
                //     $(".ui-state-default").css('height', '10vh');
                // });

                // $(".ui-state-default").mousedown(function(){
                //     if($(this).is('.btn')){
                //         return;
                //     }
                //     $(".js-added-element").addClass("moving-element");
                //     $(".js-added-element").children().addClass("d-none");
                //     $(".ui-state-default").prepend("<p class='js-moving'>Test</p>");
                //     console.log("mouse down")
                // });
                // $(".ui-state-default").mousedown(function(){

                //     $(".js-added-element").removeClass("moving-element");
                //     $(".js-added-element").children().removeClass("d-none");
                //     $(".js-moving").remove();
                //     console.log("mouse up")

                // });

            });
            // $(document).ready(function(){
            //     $(".ui-state-default").mousedown(selectElement())
            //     $(".ui-state-default").mouseup(dropElement())
            //     // $(".ui-state-default").mouseup(function(){
            //     //     $(".js-added-element").removeClass("moving-element");
            //     //     $(".js-added-element").children().removeClass("d-none");
            //     //     $(".js-moving").remove();

            //     // });
            // })
            $('.js-reviews div:first').addClass('active');
            $(document).on("mouseup", ".ui-state-default", dropElement);
            $(document).on("mousedown", ".ui-state-default", selectElement);
        </script>
    </body>
</html>
