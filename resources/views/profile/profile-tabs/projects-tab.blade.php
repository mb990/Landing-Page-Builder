<span>YOUR PROJECTS</span>
<div class="card-columns">
    @forelse(auth()->user()->projects as $project)

    <!-- <div class="col-sm-6" style="max-width: 25vw; margin-bottom: 10px;"> -->

            <div class="card">
                <img class="card-img-top" src="https://source.unsplash.com/2gYsZUmockw/100px160/" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ucfirst($project->name)}}</h5>
                    <a href="{{route('user.project.show', [auth()->user()->slug, $project->slug])}}" class="btn btn-success">Open project</a>
                    <a type="btn" class="btn btn-secondary text-white">Delete</a>
                </div>
            </div>
    <!-- </div> -->

    @empty

            <p style="width:300px">You dont have projects yet.</p>

    @endforelse

</div>
