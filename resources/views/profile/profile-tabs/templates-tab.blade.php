<span>OUR TEMPLATES</span>

<div class="card-columns">
    @forelse($templates as $template)

        <div class="card">
{{--            <input type="hidden" class="template-id" id="template-id" value="{{$template->id}}">--}}
            <img class="card-img-top" src="https://source.unsplash.com/2gYsZUmockw/100px160/" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{ucfirst($template->name)}}</h5>
                <a type="button" data-id="{{$template->id}}" class="btn btn-success text-white js-choose-template" data-toggle="modal" data-target="#exampleModal">
                    Choose
                </a>
                <a href="{{route('user.template.show', $template->slug)}}" type="button" class="btn btn-secondary" target="blank">
                    Preview
                </a>
            </div>
        </div>

    @empty

        <p style="width:300px;">No templates.</p>

    @endforelse

</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Project name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <input class="form-control form-control-lg js-project-name" type="text" placeholder="Enter project name">                                </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success js-chosen-template">Continue</button>
        </div>
    </div>
    </div>
</div>
