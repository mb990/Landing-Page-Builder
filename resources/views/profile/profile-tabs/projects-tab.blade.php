<span>YOUR PROJECTS</span>
<div class="card-columns">
    @forelse(auth()->user()->projects as $project)

            <div class="card js-project-delete-test{{$project->slug}}">
                <img class="card-img-top" src="https://source.unsplash.com/2gYsZUmockw/100px160/" alt="Card image cap">
                <div class="card-body">
                    <input type="hidden" class="js-project-delete-slug" value="{{$project->slug}}">
                    <h5 class="card-title">{{ucfirst($project->name)}}</h5>
                    <a href="{{route('user.project.show', [auth()->user()->slug, $project->slug])}}" class="btn btn-success" target="blank">Open project</a>
                    <a type="btn" data-slug="{{$project->slug}}" class="btn btn-secondary text-white js-delete-project">Delete</a>
                </div>
            </div>

    @empty

            <p style="width:300px">You dont have projects yet.</p>

    @endforelse

</div>

<script>

    $(document).ready(function () {

        $('.js-delete-project').click(function (e) {
            let project_slug = $(this).data('slug');
            $('.js-project-delete-slug').val(project_slug);
            deleteProject(e);
            $('.js-project-delete-test'+project_slug).remove();

        });

    })

</script>
