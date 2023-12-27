@props(['links'])

<div class="flex items-center gap-3">
    <div>
        Home
    </div>
    @foreach (links as link)
    <div class="flex items-center gap-2">
        <span>
            >
        </span>
        <a href="{{link['href']}}">
            <span>
                link['name']
            </span>
        </a>

    </div>
    @endforeach
</div>
