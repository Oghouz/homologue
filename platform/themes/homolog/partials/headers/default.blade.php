<header>
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
</header>

{!! Theme::partial('navbar') !!}
