<div class="general-content width-limit" id="projects">
        <div class="bullets-div-t2">
            <div class="content center">
                @include('general-content-3-bullet.blade.php')
            </div>
        </div>

        <section>
            <div>
                <div>
                    <div>
                        <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 text-center" style="margin: 48px auto;">
                            <h1>{{TITLE}</h1>
                            <div class="mb32">
                                <p>{{TEXT}</p>
                            </div>
                            <a class="btn btn-lg btn-filled btn-primary" href="{{URL}">{{BTN TEXT}</a>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="row-container row-custom">
            @include('general-content-3-tile')
        </div>
    </div>