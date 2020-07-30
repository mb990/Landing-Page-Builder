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
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        @routes
    </head>
    <body>
        <header class="header-main-profile">
            <div style="flex-grow: 1;"><img style="width: 100px;transform: translateY(-25%);" src="{{ asset('img/logo.png') }}"></div>
            <!-- <div style="flex-grow: 1;">
                <button class="js-mobile">Mobile</button>
                <button class="js-desktop">Desktop</button>
            </div> -->
            <div class="js-link">
                <button class="head-link" id="js-info">Log out</button>
            </div>
        </header>

        <!-- <section class="newsletter project-element js-added-element">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <h2>{{ucfirst($project->name)}}</h2>
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit">value</button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <main><!--style="display: flex;" -->
            <input type="hidden" class="js-project-page-element-type-id">
            <input type="hidden" class="js-project-slug" name="js-project-slug" value="{{$project->slug}}">
            <input type="hidden" class="js-project-id" name="project-id" id="project-id" value="{{$project->id}}">
            <input type="hidden" class="js-project-name" name="project-name" id="project-name" value="{{$project->name}}">
            <input type="hidden" class="js-project-template-id" name="project-template-id" id="project-template-id" value="{{$project->template->id}}">
            <input type="hidden" class="js-project-template-name" name="template-name" id="template-name" value="{{$project->template->name}}">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Add element</button>

            <!-- <aside class="profile-aside">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">New project</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">All project</a>
                </div>
            </aside> -->
            <div class="profile-main js-profile-main">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- TAB1 -->
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <!-- <div class="card-columns">
                            <div class="card">
                                <img class="card-img-top" src="https://source.unsplash.com/2gYsZUmockw/100px160/" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Template1</h5>
                                    <a href="#" class="btn btn-primary">Use this template</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- TAB2 -->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                    <!-- TAB3 -->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                    <!-- TAB4 -->
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <span>YOUR PROJECTS</span>
                            <div class="card-columns">
                                <div class="card">
                                    <img class="card-img-top" src="https://source.unsplash.com/2gYsZUmockw/100px160/" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Template1</h5>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
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
                    $(".js-profile-main").css('width','425px');
                });
                $(".js-desktop").click(function() {
                    $(".js-profile-main").css('width','100vw');
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
                $('.js-added-element').each(function(index, value) {
                console.log(`div${index}: ${this.id}`);
                x = `${index}: ${this.id}`;
                $(this).append('<button id="'+ x +'" class="btn btn-secondary element-delete">Delete element</button>');
                $(this).append('<button class="btn btn-secondary element-edit">Edit element</button>');
                });
            });
        </script>
    </body>
</html>
