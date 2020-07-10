<header class="header-addon">
    <div style="flex-grow: 1;"><img class="header-logo" src="#" ></div>
    <div class="header-links">

        @forelse($items as $link)

        <a href="{{$link->url}}">{{$link->title}}</a>

        @empty

        @endforelse

    </div>
</header>
