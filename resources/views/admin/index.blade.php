<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">

        @routes

        <script src="{{asset('js/app.js')}}"></script>
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
    <header class="header-main-profile">
        <div style="flex-grow: 1;"><img style="width: 100px;transform: translateY(-25%);" src="{{ asset('img/logo.png') }}"></div>
        <div style="flex-grow: 1;"><button class="menu-btn-mobile js-get-sidebar">Menu</button></div>
        <div style="flex-grow: 1;" class="js-link">
            <a href="{{route('logout')}}" style="float: right;"><button class="head-link">Logout</button></a>
        </div>
    </header>
    <main class="main-container"  >
        <aside class="profile-aside js-side-content">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-template-tab" data-toggle="pill" href="#v-pills-template" role="tab" aria-controls="v-pills-template" aria-selected="true">New template</a>
                <a class="nav-link" id="v-pills-users-tab" data-toggle="pill" href="#v-pills-users" role="tab" aria-controls="v-pills-users" aria-selected="false">Users</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
            </div>
        </aside>
        <div class="profile-main js-main-content">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-template" role="tabpanel" aria-labelledby="v-pills-template-tab" style="padding: 20px;">
                    @include('admin.add-template')
                </div>

                <div class="tab-pane fade" id="v-pills-users" role="tabpanel" aria-labelledby="v-pills-users-tab" style="padding: 20px; text-align: center;">
                    @include('admin.users')
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-users-messages" style="padding: 20px; text-align: center;">
                    @include('admin.messages')
                </div>
            </div>
        </div>
    </main>
    <script>
        $('.js-get-sidebar').on("click", function(){
            $(".js-main-content").slideToggle()
            $(".js-side-content").slideToggle()
            console.log("test")
        })
        function checkWidth() {
                if ($(window).width() <= 525) {
                    console.log("width: "+$(window).width())
                    $(".js-side-content").hide();
                    $('.nav-link').addClass('js-media-nav-link');
                    $(".js-main-content").css("width", "100vw");
                    $(".js-side-content").css("width", "100vw");
                        $('.js-media-nav-link').on("click", function(){
                            $(".js-main-content").slideToggle();
                            $(".js-side-content").slideToggle();
                        })
                } else{
                    $('.nav-link').removeClass('js-media-nav-link');
                    $(".js-main-content").css("width", "80vw");
                    $(".js-side-content").css("width", "20vw");
                    $(".js-main-content").show();
                    $(".js-side-content").show();
                }
            }
// checkWidth();
            $(document).ready(function(){
                checkWidth();
                $(window).resize(checkWidth);
            })
    </script>
    </body>
</html>
