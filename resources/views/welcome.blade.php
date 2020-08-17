<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type='text/javascript' src="{{ asset('js/master.js') }}"></script>
    </head>
    <body>
        <a class="js-back-to-top" id="button"></a>
        <header class="header-main">
            <div style="flex-grow: 1;"><img style="width: 100px;transform: translateY(-25%);" src="{{ asset('img/logo.png') }}"></div>
            <div class="js-link">
                <button class="head-link" id="js-about">About</button>
                <button class="head-link" id="js-info">Info ++</button>
            </div>
        </header>
        <main class="main-content">
            <div class="media-centre">
                <h1>Your future
                    <span class="main-word1">landing page is here</span>
                </h1>
                <div style="text-align: center;">
                    <a class="btn create-btn" href="login" >Create landing page</a>
                </div>
            </div>
        </main>
        <main class="main-content2 link-js-about">
            <div class="text2">
                <h3>What is this about?</h3>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec mattis ipsum erat,
                et porta ipsum auctor eget. Cras euismod tortor eget commodo sagittis.
                Pellentesque ut tor egestas est. Praesent urna
                risus, dictum eget euismod et, fere cursus aliquam
                sodales. Quisque dignissim est ut diam euismod, ornare tempus risus vulputate
            </div>
            <div style="width: fill-available;">
                <img style="width:90%; height:90%;" class="star" src="{{ asset('img/code.jpg') }}">
            </div>
        </main>
        <main class="main-content2 link-js-info media-revers">
            <div style="width: fill-available;">
                <img style="width:90%; height:90%;" class="star" src="{{ asset('img/people.jpg') }}">
            </div>
            <div class="text2">
                <h3>More about us?</h3>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed pretium diam. Quisque feugiat ac nisi a molestie.
                Praesent sed urna suscipit, volutpat magna vel, condimentum arcu. Maecenas euismod eu metus sed sollicitudin. Nunc sit
                amet bibendum orci. In magna nunc, faucibus quis interdum rutrum, pretiuma in volutpat.
                Etiam congue id urna id suscipit. Proin pellentesque risus a neque facilisis placerat. Aliquam at finibus eros.
            </div>
        </main>
        <footer class="footer-main">
            <span>
                Copyright 2020 © Future Web
            </span>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>
