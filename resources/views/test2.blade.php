<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/page_elements1.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page_elements2.css') }}">
    <link rel="stylesheet" href="{{ asset('js/example.js') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body class="body-t2">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top navbar-shrink" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger text-primary" href="#page-top">LOGO NAME</a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link js-scroll-trigger text-white bg-dark" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger text-white bg-dark" href="#projects">Projects</a></li>
                    <li class="nav-item"><a class="nav-link js-scroll-trigger text-white bg-dark" href="#signup">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-block w-100 hero-image-t2">
                    <img class="hero-background" src="/img/bgd1.jpg">
                    <div class="hero-text-t2 text-white">
                        <h1>Travel to Belgrade</h1>
                        <button class="btn btn-primary">Book weekend</button>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-block w-100 hero-image-t2">
                    <img class="hero-background d-block w-100" src="/img/bgd2.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <p class="text-white bg-dark">The first urban settlement was built here in the 3rd century 
                            BC by the Celts. Not far from Belgrade, is Vinca, a settlement older than the Mesopotamia.</p>
                    </div>
                </div>
                
            </div>
            <div class="carousel-item">
                <div class="d-block w-100 hero-image-t2">
                    <img class="hero-background" src="/img/bgd3.jpg">
                    <div class="carousel-caption d-none d-md-block">
                        <p class="text-white bg-dark">The original Slovene name of the city, “Beligrad”, which means “white city”, 
                            was first used in 878, and the city became the capital of Serbia in 1405.</p>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="about-section text-center" id="about">
        <div class="container about-t2">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-dark mb-4">About</h2>
                    <p class="text-dark-50">
                        Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
                        <a href="https://startbootstrap.com/template-overviews/grayscale/">the preview page</a>
                        . The theme is open source, and you can use it for any purpose, personal or commercial.
                    </p>
                </div>
            </div>
        </div>
    </section>

</body>