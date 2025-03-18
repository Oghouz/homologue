<ul id="nav-left">
    @foreach ($menu_nodes as $key => $node)
        @if($node->parent_id == 0)
        <li>
            <a href="{{ url($node->url) }}" @if ($node->target !== '_self') target="{{ $node->target }}" @endif>
                {{ $node->title }}
            </a>
        </li>
        @endif
    @endforeach
</ul>