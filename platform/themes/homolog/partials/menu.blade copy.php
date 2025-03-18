<div class="menu-icon" onclick="toggleMenu()">
    <i class="fal fa-bars"></i>
</div>

<div class="menu-overlay">
    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <ul id="nav-left">
                @foreach ($menu_nodes as $key => $node)
                @php($hasMegaMenu = $node->has_child && count($node->child) > 12)
                <li>
                    <a href="{{ url($node->url) }}" @if ($node->target !== '_self') target="{{ $node->target }}" @endif
                        class="{{ $hasMegaMenu ? 'mega-menu-title' : '' }}">
                        {{ $node->title }}
                    </a>

                    @if ($node->has_child)
                        <ul class="submenu">
                            @foreach ($node->child as $child)
                                <li>
                                    <a href="{{ url($child->url) }}" @if ($child->target !== '_self')
                                    target="{{ $child->target }}" @endif>
                                        {{ $child->title }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>

        <div class="col-xl-4 col-lg-4 text-center">
            <img src="http://homolog.test/storage/2024/menu-img.jpg" alt="Logo" width="100" height="100">
        </div>

        <div class="col-xl-4 col-lg-4 text-end">
            <ul>
                <li><a href="#">Recherche</a></li>
                <li><a href="#">Compte</a></li>
                <li><a href="#">Ma Sélection</a></li>
            </ul>
        </div>
    </div>
</div>




{{-- <ul {!! $options !!}>
    @foreach ($menu_nodes as $key => $node)
        @php($hasMegaMenu = $node->has_child && count($node->child) > 12)
        <li @if($node->has_child) onclick="openNavMenu('{{ $node->title }}', '{{ $node->id }}')" @endif>
            <a href="{{ url($node->url) }}" @if ($node->target !== '_self') target="{{ $node->target }}" @endif @class(['mega-menu-title' => $hasMegaMenu])>
                {{ $node->title }}
            </a>

            @if ($node->has_child)
                @if ($hasMegaMenu)
                    {!! Menu::generateMenu([
                'menu' => $node,
                'menu_nodes' => $node->child,
                'view' => 'mega-menu',
                'options' => ['class' => 'submenu mega-menu'],
            ]) !!}
        </li>
    @endforeach
</ul> --}}
<div id="navMenuSidebar" class="nav-menu-sidebar">
    <div class="nav-menu-content">
        <div class="text-end mr-25">
            <button class="btn btn-link text-secondary" onclick="closeNavMenu()"><i class="fas fa-times"></i></button>
        </div>
        <div class="row">
            <div class="col-2" style="margin-left: 31px;margin-top: 14px;">
                <ul {!! $options !!}>
                    @foreach ($menu_nodes as $key => $node)
                        @php($hasMegaMenu = $node->has_child && count($node->child) > 12)
                        <li onclick="openNavMenu('{{ $node->title }}', '{{ $node->id }}')">
                            <a href="{{ url($node->url) }}" @if ($node->target !== '_self') target="{{ $node->target }}" @endif @class(['mega-menu-title' => $hasMegaMenu])>
                                {{ $node->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-2">
                <h1 id="nav-menu-title" style="color: gray;font-size: 21px;margin-bottom: 50px;font-family: monospace;"></h1>
                @foreach ($menu_nodes as $key => $node)
                    <div class="nav-menu-childs" id="nav-menu-child-{{ $node->id }}" style="display: none">
                        @if ($node->has_child)
                            <ul>
                                @foreach($node->child as $child)
                                    <li>
                                        <a href="#" style="font-size: 14px;font-weight: 100">{{ $child->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="col-6">
                <div class="float-end">
                    <img class="img-fluid" src="http://localhost/homolog/public/storage/general/nav-menu-bg-02.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
