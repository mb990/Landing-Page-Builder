<header class="header-addon js-added-element">
    <div style="flex-grow: 1;"><img class="header-logo" src="{{$image_url}}" ></div>
    <div class="header-links">

        @forelse($data->pageElementable->links as $link)

        <a href="{{$link->url}}">{{$link->title}}</a>

        @empty

        @endforelse

    </div>
</header>
