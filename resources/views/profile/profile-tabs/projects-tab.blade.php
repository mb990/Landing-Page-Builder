<span>YOUR PROJECTS</span>
<div class="row">
    <div class="col-sm-6" style="max-width: 25vw; margin-bottom: 10px;">

        @forelse(auth()->user()->projects as $project)

            <div class="card">
                <img class="card-img-top" src="https://source.unsplash.com/2gYsZUmockw/100px160/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ucfirst($project->name)}}</h5>
                    <a href="#" class="btn btn-success">Go somewhere</a>
                </div>
            </div>

        @empty

            <p style="transform: translateX(100%)">You dont have projects yet.</p>

        @endforelse

    </div>
</div>
