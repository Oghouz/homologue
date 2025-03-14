<div class="container-fluid">
    <div class="row align-items-center" style="margin: 30px 0;">
        <div class="col-xl-4 col-lg-4">
            <div class="mainmenu d-flex">
                <div class="mainmenu__main d-flex align-items-center p-relative">
                    <div class="main-menu">
                        <nav id="mobile-menu sticky_header_menu">
                            {!! Menu::renderMenuLocation('main-menu', ['view' => 'menu']) !!}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4">
            @if($logo = theme_option('logo'))
                <div class="text-center">
                    <a href="{{ route('public.index') }}">
                        <sapn style="font-size: 4.5em;font-family: emoji;">HOMOLOG</sapn>
                        <hr style="color: transparent;margin: 5px 0;">
                        <span style="font-size: 2.3em;font-family: emoji;">PARIS</span>
                        {{--                                    {{ RvMedia::image($logo, theme_option('site_title')) }}--}}
                    </a>
                </div>
            @endif
        </div>
        @if(is_plugin_active('ecommerce'))
            <div class="col-xl-4 col-lg-4">
                <div class="header-meta-info d-flex justify-content-end">
{{--                    {!! Theme::partial('header-meta') !!}--}}
                </div>
            </div>
        @endif
    </div>
</div>
