<header class="text-center visible mt-50 d-none d-sm-block" id="main-header">
    <div class="row">
        <div class="col">
            <div class="menu-icon" onclick="toggleMenu()">
                <i class="bi bi-list" style="font-size: 1.6em"></i>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{ route('public.index') }}" id="header-logo" @if(\Request::route()->getName() != 'public.index') class="text-dark" @endif>
                <sapn style="font-size: 4em;font-family: emoji;">HOMOLOG</sapn>
                <hr style="color: transparent;margin: 5px 0;">
                <span style="font-size: 2em;font-family: emoji;">PARIS</span>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            {!! Menu::renderMenuLocation('main-menu', ['view' => 'menu']) !!}
        </div>
        <div class="col-10">
            <div class="menu-icon-search" onclick="toggleSearch()">
                <i class="bi bi-search" style="display: none;"></i>
            </div>
            <ul id="nav-right" style="display: none;">
                <li><a href="#" onclick="toggleSearch()">Recherche</a></li>
                <li><a href="{{route('customer.login')}}">Compte</a></li>
                <li><a href="#">Ma Sélection</a></li>
            </ul>
        </div>
    </div>
</header>
<div class="menu-overlay" id="menuOverlay">
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-1" style="max-width: 10px;padding: 0;">
                <div class="vertical-line"></div>
            </div>
            <div class="col-md-10">
                <div class="image-container">
                    <img src="https://homolog.fr/storage/2025/menu/menu-1.jpg">
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SEARCH OVERLAY --}}
<div class="search-overlay d-flex justify-content-center align-items-center vh-100" id="searchOverlay">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6"> <!-- Réduction de la largeur -->
                <form action="/products" method="get">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control search-input" placeholder="Rechercher" autocomplete="off">
                        <button class="btn border-0" type="submit">
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <header>
    {!! Theme::partial('header-top') !!}
    <div class="mainmenuarea d-none d-xl-block divAnime">
        <div class="container-fluid">
            <div class="row align-items-center mt-50">
                <div class="col-xl-4 col-lg-4">
                    <div class="mainmenu d-flex">
                        <div class="mainmenu__main d-flex align-items-center p-relative">
                            <div class="main-menu">
                                <nav id="mobile-menu">
                                    {!! Menu::renderMenuLocation('main-menu', ['view' => 'menu']) !!}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 logo-container">
                    @if($logo = theme_option('logo'))
                        <div class="text-center logo-overlay">
                            <a href="{{ route('public.index') }}" id="home_page_logo_text">
                                <sapn style="font-size: 4.2em;font-family: emoji;">HOMOLOG</sapn>
                                <hr style="color: transparent;margin: 5px 0;">
                                <span style="font-size: 2.3em;font-family: emoji;">PARIS</span>
                            </a>
                        </div>
                    @endif
                </div>
                @if (is_plugin_active('ecommerce'))
                    <div class="col-xl-4 col-lg-4">
                        <div class="header-meta justify-content-end">
                            {!! Theme::partial('header-meta') !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header> --}}

{!! Theme::partial('navbar') !!}
