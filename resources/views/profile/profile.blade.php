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
        <style>
            .form-control:focus{border-color: #5cb85c;  box-shadow: none; -webkit-box-shadow: none;}
            .has-error .form-control:focus{box-shadow: none; -webkit-box-shadow: none;}
            .bootstrap-select.btn-group .dropdown-menu option:hover {
                color: whitesmoke !important;
                background: #5cb85c !important;
            }
        </style>
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
        <main style="display: flex;">
            <aside class="profile-aside">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">New project</a>
                    <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                    <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                    <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">All project</a>
                </div>
            </aside>
            <div class="profile-main js-profile-main">
                <input type="hidden" class="template-id-main">
                <input type="hidden" class="user-id" value="{{auth()->user()->id}}">
                <div class="tab-content" id="v-pills-tabContent">
                    <!-- TAB1 -->
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" style="padding: 20px; text-align: center;">
                        @include('profile.profile-tabs.templates-tab')
                    </div>
                    <!-- TAB2 -->
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">

                    </div>
                    <!-- TAB3 -->
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        @include('profile.profile-tabs.message-tab')
                    </div>
                    <!-- TAB4 -->
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" style="padding: 20px; text-align: center;">
                        @include('profile.profile-tabs.projects-tab')
                    </div>
                </div>
            </div>
        </main>
        <script>
            $(".js-mobile").click(function() {
                $(".js-profile-main").css('width','425px');
            });
            $(".js-desktop").click(function() {
                $(".js-profile-main").css('width','100vw');
            });

            $('.js-choose-template').change(function () {
                // let template_id = $(this).find()
                // $('.template-id-main').val() =
            });

            $('.js-chosen-template').click(storeProject());
        </script>
    </body>
</html>
